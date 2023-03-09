use real_shoes;
### TABLAS
    ### TABLA Metodo_Pago, ALMACENA LOS DIFERENTES METODOS DE PAGO ACEPTADOS POR LA ORGANIZACION.
    create table Metodo_Pago (
        Metodo_pago_Id int primary key, 
        Tipo_pago varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA Persona_Producto, ALMACENA EL PRODUCTO SELECCIONADO POR UN USUARIO.     
    create table persona_producto(
        persona_producto_id int primary key AUTO_INCREMENT, 
        Persona_Id int, 
        Producto_Id int,
        Estado SET('SELECCIONADO','CANCELADO','FACTURADO') default'SELECCIONADO',
        Tipo_Factura SET('COMPRA','VENTA') default 'VENTA',
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime 
    );

    ### TABLA Pedido, ALMACENA LA LISTA DE PRODUCTOS SELECCIONADOS POR UN USUARIO.
    create table Pedido (   
        Pedido_Id int primary key AUTO_INCREMENT,
        Cantidad int, 
        Valor_Total float default 0,
        Metodo_pago_Id int default 1, 
        persona_producto_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA FACTURA, ALMACENA LOS PEDIDOS PAGOS.
    create table factura(
        Factura_Id int primary key auto_increment,
        descuento float,
        impuesto float,
        Pedido_Id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA VENTA, ALMACENA LAS VENTAS REALIZADAS.
    create table venta(
        Venta_Id int primary key auto_increment,
        Factura_Id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );

### TABLAS CON DATOS ELIMINADOS.
    ### TABLA ELIMINADO_METODO_PAGO, ALMACENA METODOS DE PAGO ELIMINADOS.
    create table Eliminado_Metodo_Pago (
        Metodo_pago_Id int primary key, 
        Tipo_pago varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA ELIMINADO_FACTURA, ALMACENA FACTURAS O TRANSACCIONES CANCELADAS.
    create table Eliminado_factura(
        Factura_Id int primary key auto_increment,
        descuento float,
        impuesto float,
        Pedido_Id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );
    ### TABLA ELIMINADO_venta, ALMACENA VENTAS CANCELADAS.
    create table Eliminado_venta(
        Venta_Id int primary key auto_increment,
        Factura_Id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );

### LLAVES FORANEAS
    
    alter table persona_producto add constraint fk_persona_producto_persona foreign key (Persona_Id) references persona(Persona_Id);
    alter table persona_producto add constraint fk_persona_producto_producto foreign key (Producto_Id) references producto(Producto_Id);

    alter table pedido add constraint fk_pedido_metodo_pago foreign key(Metodo_pago_Id) references metodo_pago(Metodo_pago_Id);
    alter table pedido add constraint fk_pedido_persona_producto_pedido foreign key(persona_producto_id) references persona_producto(persona_producto_id);
    
    alter table factura add constraint fk_factura_pedido foreign key(Pedido_Id) references pedido(Pedido_Id);

    alter table venta add constraint fk_venta_factura foreign key (Factura_Id) references factura(Factura_Id);
### LLAVES FORANEAS DATOS ELIMINADOS

    alter table eliminado_factura add constraint fk_eliminado_factura_pedido foreign key(Pedido_Id) references pedido(Pedido_Id);

    alter table eliminado_venta add constraint fk_eliminado_venta_factura foreign key (Factura_Id) references factura(Factura_Id);

### DATOS 
    ### DATOS TABLA Metodo_pago
    insert into Metodo_pago(Metodo_pago_Id,Tipo_pago) values
        (1,'Efectivo'),
        (2,'Tarjeta Debito'),
        (3,'Tarjeta Crédito'),
        (4,'QR');

### TRIGGERS
    /* TRIGGER QUE ACTUALIZA EL ESTADO DE LOS PRODUCTOS SELECCIONADOS */
        DROP TRIGGER if exists after_insert_factura_update_estado;

        DELIMITER //

        CREATE TRIGGER after_insert_factura_update_estado
        AFTER INSERT ON factura
        FOR EACH ROW
        BEGIN
            SET @persona_id = (SELECT persona_Id FROM persona_producto AS pp
                                INNER JOIN pedido AS p ON
                                    pp.persona_producto_id = p.persona_producto_id
                                        INNER JOIN factura AS f ON
                                            p.pedido_id = f.pedido_id
                                                ORDER BY f.fecha_creacion DESC
                                                    LIMIT 1);
            UPDATE persona_producto SET estado = 'FACTURADO', 
                                        ultima_modificacion = now()
                                            WHERE persona_Id = @persona_id 
                                                AND estado = 'SELECCIONADO'
                                                    AND Tipo_Factura = 'VENTA';
        END;
        //

        DELIMITER ;
    /* TRIGGER QUE DESPUES DE UNA VENTA ACTUALIZA EL INVENTARIO */  

        DROP TRIGGER if exists after_update_estado_facturado;

        DELIMITER //

        CREATE TRIGGER after_update_estado_facturado
        AFTER UPDATE ON persona_producto
        FOR EACH ROW
        BEGIN
            SET @inventario_id = (SELECT Inventario_Id FROM Inventario AS i
                                    INNER JOIN persona_trabaja_sede AS pts ON
                                        i.sede_id = pts.sede_id 
                                            INNER JOIN persona_producto AS pp ON
                                                pts.persona_Id = pp.persona_Id 
                                                    ORDER BY pp.ultima_modificacion DESC
                                                        LIMIT 1);
            SET @producto_id = (SELECT producto_id FROM persona_producto AS pp
                                    ORDER BY pp.ultima_modificacion DESC 
                                        LIMIT 1);

            IF new.estado = 'FACTURADO' THEN
                UPDATE contenido_inventario SET stock = stock - 1
                    WHERE Inventario_id = @inventario_id AND producto_id = @producto_id;
            ELSE 
                UPDATE contenido_inventario SET stock = stock + 1
                    WHERE Inventario_id = @inventario_id AND producto_id = @producto_id;
            END IF;
        END;
        //

        DELIMITER ; 

    /* TRIGGER PARA REGISTRAR UNA VENTA DESPUES DE REALIZAR FACTURA */
        DROP TRIGGER if exists after_compra_insertar_registro_venta;

        DELIMITER //

        CREATE TRIGGER after_compra_insertar_registro_venta
        AFTER INSERT ON factura    
        FOR EACH ROW 
        BEGIN
            SET @factura_id = (SELECT factura_id 
                                 FROM factura 
                                    ORDER BY fecha_creacion DESC 
                                        LIMIT 1);
            INSERT INTO VENTA (factura_id)
                    values(@factura_id);
        END;
        //

        DELIMITER ;



    /* TRIGGER QUE ACTUALIZA EL VALOR DEL PEDIDO DEPENDIENDO DE LAS CANTIDADES Y EL PRODUCTO SELECCIONADO */

        DROP TRIGGER if exists after_persona_producto_actualizar_pedido;

        DELIMITER //

        CREATE TRIGGER after_persona_producto_actualizar_pedido
        AFTER INSERT on persona_producto
        FOR EACH ROW
        BEGIN
            SET @Cantidad = (SELECT Count(CASE WHEN Persona_id AND Estado = 'SELECCIONADO' AND Tipo_Factura ='VENTA' THEN 1 END) 
                                        AS contador FROM persona_producto 
                                            GROUP BY Persona_id LIMIT 1);
            SET @persona_id = (SELECT pp.Persona_Id FROM persona_producto AS pp
                                        INNER JOIN pedido AS p on 
                                            p.persona_producto_id = pp.persona_producto_id
                                                ORDER BY pp.fecha_creacion DESC
                                                    LIMIT 1);

            SET @persona_producto_id = (SELECT persona_producto_id FROM persona_producto 
                                            WHERE persona_id = (@persona_id) 
                                                AND Estado = 'SELECCIONADO' 
                                                    ORDER BY fecha_creacion DESC
                                                        Limit 1); 

            SET @valor_total = (SELECT SUM(Valor_Venta) FROM producto AS p
                                    INNER JOIN persona_producto AS pp on
                                        p.producto_id = pp.producto_id
                                            WHERE pp.persona_id = (@persona_id) 
                                                AND Estado = 'SELECCIONADO' 
                                                    AND Tipo_Factura = 'VENTA');
            IF @Cantidad = 1 THEN
                INSERT INTO pedido(Cantidad,Valor_Total,persona_producto_id) 
                                values(1,@valor_total,new.persona_producto_id);
            ELSE
                UPDATE pedido SET VALOR_TOTAL = (@valor_total) 
                    WHERE pedido_id = (SELECT pedido_id FROM pedido
                                            ORDER BY pedido_id DESC 
                                                LIMIT 1);
                
                UPDATE pedido SET Cantidad =(@cantidad) 
                    WHERE pedido_id = (SELECT pedido_id FROM pedido
                                            ORDER BY pedido_id DESC 
                                                LIMIT 1);
            END IF;   
        END;
        //

        DELIMITER ;

    /* TRIGGER QUE AL ELIMINAR UN METODO DE PAGO, ALMACENA EL METODO DE PAGO ELIMINADO */
        DROP TRIGGER if exists after_delete_metodo_pago

        DELIMITER //

        CREATE TRIGGER after_delete_metodo_pago
        AFTER DELETE ON metodo_pago
        FOR EACH ROW
        BEGIN
            INSERT INTO Eliminado_metodo_pago 
                values(old.Metodo_pago_Id,old.tipo_pago,old.fecha_creacion,old.ultima_modificacion,now());
        END;
        //

        DELIMITER ;
    /* TRIGGER QUE AL ELIMINAR UNA FACTURA, ALMACENA LA FACTURA CANCELADA */
        DROP TRIGGER if exists after_delete_factura

        DELIMITER //

        CREATE TRIGGER after_delete_factura
        AFTER DELETE ON factura
        FOR EACH ROW
        BEGIN
            INSERT INTO eliminado_factura 
                values(old.factura_id,old.descuento,old.impuesto,old.pedido_id,old.fecha_creacion,old.ultima_modificacion,now());
           
            DELETE FROM venta 
                WHERE factura_id = old.factura_id;
        END;
        //

        DELIMITER ;
    /* TRIGGER QUE AL CANCELAR UNA VENTA, ALMACENA LA VENTA CANCELADA */
        DROP TRIGGER if exists after_delete_venta

        DELIMITER //

        CREATE TRIGGER after_delete_venta
        AFTER DELETE ON venta
        FOR EACH ROW
        BEGIN
            INSERT INTO eliminado_venta 
                values(old.venta_id,old.factura_id,old.fecha_creacion,now());
        END;
        //

        DELIMITER ;
    /* TRIGGER QUE ACTUALIZA EL ESTADO DE LOS PRODUCTOS FACTURADOS A CANCELADOS AL ELIMINAR UNA FACTURA */

        DROP TRIGGER if exists after_eliminar_factura_retornar_inventario

        DELIMITER //
        CREATE TRIGGER after_eliminar_factura_retornar_inventario
        AFTER INSERT ON Eliminado_factura
        FOR EACH ROW
        BEGIN
            SET @persona_id = (SELECT persona_Id FROM persona_producto AS pp
                                INNER JOIN pedido AS p ON
                                    pp.persona_producto_id = p.persona_producto_id
                                        INNER JOIN eliminado_factura AS e ON
                                            p.pedido_id = e.pedido_id
                                                ORDER BY e.fecha_creacion DESC
                                                    LIMIT 1);
            UPDATE persona_producto SET estado = 'CANCELADO', 
                                        ultima_modificacion = now()
                                            WHERE persona_Id = @persona_id 
                                                AND estado = 'FACTURADO'
                                                    AND Tipo_Factura = 'VENTA';
        END;
        //

        DELIMITER ;

### VISTAS
    /* VISTA QUE MUESTRA LOS DATOS DE LAS PERSONAS CON VENTAS */
        CREATE OR REPLACE VIEW persona_ventas_vw AS
            SELECT pp.persona_id, CONCAT(p.nombre, " ",p.apellidos) AS Nombre, 
                    COUNT(pp.persona_id) AS Transacciones, SUM(pe.Valor_Total) AS Venta 
                        FROM persona AS p
                         INNER JOIN persona_producto AS pp ON
                            p.persona_Id = pp.persona_id
                                INNER JOIN pedido AS pe ON
                                    pp.persona_producto_id = pe.persona_producto_id
                                        INNER JOIN factura AS f ON
                                            pe.pedido_id = f.pedido_id
                                                INNER JOIN venta AS v ON
                                                    f.factura_id = v.factura_id
                                                        GROUP BY pp.persona_id;
    /* VISTA QUE MUESTRA LOS DATOS DE UN PEDIDO */
    /* VISTA QUE MUESTRA LOS DATOS DE UNA FACTURA */
    /* VISTA QUE MUESTRA LOS DATOS DE UNA FACTURA CANCELADA */
    /* VISTA QUE MUESTRA TODAS LAS FACTURAS CANCELADAS EN EL DIA */
    


