use real_shoes;
### TABLAS
    ### TABLA sede_compra, ALMACENA LOS PRODUCTOS SELECCIONADOS PARA UNA COMPRA POR UNA SEDE.     
    create table sede_compra(
        sede_compra_id int primary key AUTO_INCREMENT, 
        Sede_id int, 
        producto_id int,
        valor_compra float,
        cantidad int,
        estado SET('SELECCIONADO','CANCELADO','FACTURADO') default'SELECCIONADO',
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime 
    );

    ### TABLA pedido_compra, ALMACENA LA LISTA DE PRODUCTOS SELECCIONADOS PARA UNA COMPRA.
    create table pedido_compra (   
        pedido_compra_id int primary key AUTO_INCREMENT,
        cantidad int, 
        items int,
        valor_total float default 0,
        metodo_pago_id int default 1, 
        sede_compra_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA factura_compra, ALMACENA LOS Pedido_compraS PAGOS.
    create table factura_compra(
        factura_compra_id int primary key auto_increment,
        descuento float,
        impuesto float,
        pedido_compra_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA VENTA, ALMACENA LAS VENTAS REALIZADAS.
    create table compra(
        compra_Id int primary key auto_increment,
        factura_compra_id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );
### LLAVES FORANEAS
    alter table sede_compra add constraint fk_sede_compra_persona foreign key (sede_id) references sede(sede_id);
    
    alter table pedido_compra add constraint fk_Pedido_compra_metodo_pago foreign key(metodo_pago_id) references metodo_pago(metodo_pago_id);
    alter table pedido_compra add constraint fk_Pedido_compra_sede_compra foreign key(sede_compra_id) references sede_compra(sede_compra_id);
    
    alter table factura_compra add constraint fk_factura_compra_Pedido_compra foreign key(pedido_compra_id) references pedido_compra(pedido_compra_id);

    alter table compra add constraint fk_compra_factura_compra foreign key (factura_compra_id) references factura_compra(factura_compra_id);

### DATOS
    ### DATOS SEDE_COMPRA 
    /* INSERT INTO SEDE_COMPRA (Sede_id,producto_id,tipo,marca,coleccion_temporada,genero,valor_compra,cantidad)
        values (1,1,'Zapatilla','Adidas','Verano','Femenino',20000,10); */

    ### DATOS FACTURA_COMPRA
    /* insert into factura_compra(pedido_compra_id)values(1); */

### TRIGGERS
    /* TRIGGER QUE ACTUALIZA EL estado DE LOS PRODUCTOS SELECCIONADOS */
        DROP TRIGGER if exists after_insert_factura_compra_update_estado;

        DELIMITER //

        CREATE TRIGGER after_insert_factura_compra_update_estado
        AFTER INSERT ON factura_compra
        FOR EACH ROW
        BEGIN
            SET @sede_id = (SELECT sede_Id FROM sede_compra AS sc
                                INNER JOIN pedido_compra AS pc ON
                                    sc.sede_compra_id = pc.sede_compra_id
                                        INNER JOIN factura_compra AS fc ON
                                            pc.pedido_compra_id = fc.pedido_compra_id
                                                ORDER BY fc.fecha_creacion DESC
                                                    LIMIT 1);
            UPDATE sede_compra SET estado = 'FACTURADO', 
                                        ultima_modificacion = now()
                                            WHERE sede_Id = @sede_id 
                                                AND estado = 'SELECCIONADO';
        END;
        //

        DELIMITER ;
    
    /* TRIGGER QUE DESPUES DE UNA COMPRA ACTUALIZA EL INVENTARIO */  
     /*    DROP TRIGGER if exists after_compra_update_create_inventario;

        DELIMITER //
        
        CREATE TRIGGER after_compra_update_create_inventario
        AFTER INSERT ON factura_compra
        FOR EACH ROW
        BEGIN 
            SELECT COUNT(producto_id) AS Validador 
                FROM producto 
                    WHERE producto_id = @producto_id;

            IF Validador >= 1 THEN
                UPDATE contenido_inventario set stock = stock + @cantidad 
                    WHERE producto_id = @producto_id 
                        AND inventario_id = @inventario_id;
            ELSE 
                INSERT INTO producto(producto_id,)
        END;
        //

        DELIMITER ; */
    /* TRIGGER PARA REGISTRAR UNA COMPRA DESPUES DE REALIZAR FACTURA_COMPRA */
        DROP TRIGGER if exists after_compra_insertar_registro_venta;

        DELIMITER //

        CREATE TRIGGER after_compra_insertar_registro_venta
        AFTER INSERT ON factura_compra    
        FOR EACH ROW 
        BEGIN
            SET @factura_compra_id = (SELECT factura_compra_id 
                                        FROM factura_compra 
                                            ORDER BY fecha_creacion DESC 
                                                LIMIT 1);
            INSERT INTO COMPRA (factura_compra_id)
                    values(@factura_compra_id);
        END;
        //

        DELIMITER ;



    /* TRIGGER QUE ACTUALIZA EL VALOR DEL PEDIDO_COMPRA DEPENDIENDO DE LAS cantidadES Y EL PRODUCTO SELECCIONADO */

        DROP TRIGGER if exists after_sede_compra_actualizar_Pedido_compra;

        DELIMITER //

        CREATE TRIGGER after_sede_compra_actualizar_Pedido_compra
        AFTER INSERT on sede_compra
        FOR EACH ROW
        BEGIN
            SET @items = (SELECT Count(CASE WHEN sede_id AND estado = 'SELECCIONADO' THEN 1 END) 
                                        AS contador FROM sede_compra 
                                            GROUP BY sede_id
                                                ORDER BY fecha_creacion DESC
                                                    LIMIT 1);
            SET @sede_id = (SELECT sc.sede_id FROM sede_compra AS sc
                                ORDER BY sc.fecha_creacion DESC
                                    LIMIT 1);

            SET @sede_compra_id = (SELECT sede_compra_id FROM sede_compra 
                                            WHERE sede_id = (@sede_id) 
                                                AND estado = 'SELECCIONADO' 
                                                    ORDER BY fecha_creacion DESC
                                                        Limit 1); 

            SET @valor_total = (SELECT SUM(valor_compra * cantidad) FROM sede_compra
                                    WHERE sede_id = @sede_id AND estado = 'SELECCIONADO');

            SET @cantidad = (SELECT SUM(cantidad) FROM sede_compra
                                WHERE estado ='SELECCIONADO'
                                    GROUP BY Sede_id);
            
            IF @items = 1 THEN
                INSERT INTO pedido_compra(items,valor_total,sede_compra_id) 
                                values(1,@valor_total,new.sede_compra_id);
            ELSE
                UPDATE pedido_compra SET valor_total = (@valor_total) 
                    WHERE pedido_compra_id = (SELECT pedido_compra_id FROM pedido_compra
                                                ORDER BY pedido_compra_id DESC 
                                                    LIMIT 1);
                
                UPDATE pedido_compra SET cantidad =(@cantidad) 
                    WHERE pedido_compra_id = (SELECT pedido_compra_id FROM pedido_compra
                                                ORDER BY pedido_compra_id DESC 
                                                    LIMIT 1);
                UPDATE pedido_compra SET items = items + 1
                    WHERE pedido_compra_id = (SELECT pedido_compra_id FROM pedido_compra
                                                ORDER BY pedido_compra_id DESC 
                                                    LIMIT 1);
            END IF;   
        END;
        //

        DELIMITER ;

### VISTAS
     /* VISTA QUE MUESTRA LOS DATOS DE LAS COMPRAS DE LAS SEDES */
       CREATE OR REPLACE VIEW sede_compras_vw AS
            SELECT sc.sede_id, s.nombre AS Almacen,  
                    COUNT(sc.sede_id) AS Transacciones, SUM(pc.valor_total) AS valor_compra
                        FROM sede AS s
                            INNER JOIN sede_compra AS sc ON
                                s.sede_id = sc.sede_id
                                    INNER JOIN pedido_compra AS pc ON
                                        pc.sede_compra_id = sc.sede_compra_id
                                            INNER JOIN factura_compra AS fc ON
                                                pc.pedido_compra_id = fc.pedido_compra_id
                                                    GROUP BY sc.sede_id;
   
    