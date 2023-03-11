use real_shoes;
### TABLAS
    ### TABLA metodo_pago, ALMACENA LOS DIFERENTES METODOS DE PAGO ACEPTADOS POR LA ORGANIZACION.
    create table metodo_pago (
        metodo_pago_id int primary key, 
        tipo_pago varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA Persona_Producto, ALMACENA EL PRODUCTO SELECCIONADO POR UN USUARIO.     
    create table persona_producto(
        persona_producto_id int primary key AUTO_INCREMENT, 
        persona_id int, 
        producto_id int,
        estado SET('SELECCIONADO','CANCELADO','FACTURADO') default'SELECCIONADO',
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime 
    );

    ### TABLA pedido, ALMACENA LA LISTA DE PRODUCTOS SELECCIONADOS POR UN USUARIO.
    create table pedido (   
        pedido_id int primary key AUTO_INCREMENT,
        cantidad int, 
        valor_total float default 0,
        metodo_pago_id int default 1, 
        persona_producto_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA FACTURA, ALMACENA LOS pedidoS PAGOS.
    create table factura(
        factura_id int primary key auto_increment,
        descuento float,
        impuesto float,
        pedido_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA VENTA, ALMACENA LAS VENTAS REALIZADAS.
    create table venta(
        venta_id int primary key auto_increment,
        factura_id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );

### TABLAS CON DATOS ELIMINADOS.
    ### TABLA eliminado_metodo_pago, ALMACENA METODOS DE PAGO ELIMINADOS.
    create table eliminado_metodo_pago (
        metodo_pago_id int primary key, 
        tipo_pago varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA eliminado_factura, ALMACENA FACTURAS O TRANSACCIONES CANCELADAS.
    create table eliminado_factura(
        factura_id int primary key auto_increment,
        descuento float,
        impuesto float,
        pedido_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );
    ### TABLA eliminado_venta, ALMACENA VENTAS CANCELADAS.
    create table eliminado_venta(
        venta_id int primary key auto_increment,
        factura_id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );

### LLAVES FORANEAS
    
    alter table persona_producto add constraint fk_persona_producto_persona foreign key (persona_id) references persona(persona_id);
    alter table persona_producto add constraint fk_persona_producto_producto foreign key (producto_id) references producto(producto_id);

    alter table pedido add constraint fk_pedido_metodo_pago foreign key(metodo_pago_id) references metodo_pago(metodo_pago_id);
    alter table pedido add constraint fk_pedido_persona_producto_pedido foreign key(persona_producto_id) references persona_producto(persona_producto_id);
    
    alter table factura add constraint fk_factura_pedido foreign key(pedido_id) references pedido(pedido_id);

    alter table venta add constraint fk_venta_factura foreign key (factura_id) references factura(factura_id);
### LLAVES FORANEAS DATOS ELIMINADOS

    alter table eliminado_factura add constraint fk_eliminado_factura_pedido foreign key(pedido_id) references pedido(pedido_id);

    alter table eliminado_venta add constraint fk_eliminado_venta_factura foreign key (factura_id) references factura(factura_id);

### DATOS 
    ### DATOS TABLA metodo_pago
    insert into metodo_pago(metodo_pago_id,tipo_pago) values
        (1,'Efectivo'),
        (2,'Tarjeta Debito'),
        (3,'Tarjeta Crédito'),
        (4,'QR');

### TRIGGERS
    /* TRIGGER QUE ACTUALIZA EL estado DE LOS PRODUCTOS SELECCIONADOS */
        DROP TRIGGER if exists after_insert_factura_update_estado;

        DELIMITER //

        CREATE TRIGGER after_insert_factura_update_estado
        AFTER INSERT ON factura
        FOR EACH ROW
        BEGIN
            SET @persona_id = (SELECT persona_id FROM persona_producto AS pp
                                INNER JOIN pedido AS p ON
                                    pp.persona_producto_id = p.persona_producto_id
                                        INNER JOIN factura AS f ON
                                            p.pedido_id = f.pedido_id
                                                ORDER BY f.fecha_creacion DESC
                                                    LIMIT 1);
            UPDATE persona_producto SET estado = 'FACTURADO', 
                                        ultima_modificacion = now()
                                            WHERE persona_id = @persona_id 
                                                AND estado = 'SELECCIONADO';
        END;
        //

        DELIMITER ;
    /* TRIGGER QUE DESPUES DE UNA VENTA ACTUALIZA EL inventario */  

        DROP TRIGGER if exists after_update_estado_facturado;

        DELIMITER //

        CREATE TRIGGER after_update_estado_facturado
        AFTER UPDATE ON persona_producto
        FOR EACH ROW
        BEGIN
            SET @inventario_id = (SELECT inventario_id FROM inventario AS i
                                    INNER JOIN persona_trabaja_sede AS pts ON
                                        i.sede_id = pts.sede_id 
                                            INNER JOIN persona_producto AS pp ON
                                                pts.persona_id = pp.persona_id 
                                                    ORDER BY pp.ultima_modificacion DESC
                                                        LIMIT 1);
            SET @producto_id = (SELECT producto_id FROM persona_producto AS pp
                                    ORDER BY pp.ultima_modificacion DESC 
                                        LIMIT 1);

            IF new.estado = 'FACTURADO' THEN
                UPDATE contenido_inventario SET stock = stock - 1
                    WHERE inventario_id = @inventario_id AND producto_id = @producto_id;
            ELSE 
                UPDATE contenido_inventario SET stock = stock + 1
                    WHERE inventario_id = @inventario_id AND producto_id = @producto_id;
            END IF;
        END;
        //

        DELIMITER ; 

    /* TRIGGER PARA REGISTRAR UNA VENTA DESPUES DE REALIZAR FACTURA */
        DROP TRIGGER if exists after_venta_insertar_registro_venta;

        DELIMITER //

        CREATE TRIGGER after_venta_insertar_registro_venta
        AFTER INSERT ON factura    
        FOR EACH ROW 
        BEGIN
            SET @factura_id = (SELECT factura_id 
                                 FROM factura 
                                    ORDER BY fecha_creacion DESC 
                                        LIMIT 1);
            INSERT INTO venta(factura_id)
                    values(@factura_id);
        END;
        //

        DELIMITER ;



    /* TRIGGER QUE ACTUALIZA EL VALOR DEL pedido DEPENDIENDO DE LAS CANTIDADES Y EL PRODUCTO SELECCIONADO */

        DROP TRIGGER if exists after_persona_producto_actualizar_pedido;

        DELIMITER //

        CREATE TRIGGER after_persona_producto_actualizar_pedido
        AFTER INSERT on persona_producto
        FOR EACH ROW
        BEGIN
            SET @cantidad = (SELECT Count(CASE WHEN persona_id AND estado = 'SELECCIONADO' THEN 1 END) 
                                        AS contador FROM persona_producto 
                                            GROUP BY persona_id
                                                ORDER BY fecha_creacion DESC
                                                    LIMIT 1);
            SET @persona_id = (SELECT persona_id FROM persona_producto
                                    ORDER BY fecha_creacion DESC
                                        LIMIT 1);

            SET @persona_producto_id = (SELECT persona_producto_id FROM persona_producto 
                                            WHERE persona_id = (@persona_id) 
                                                AND estado = 'SELECCIONADO' 
                                                    ORDER BY fecha_creacion DESC
                                                        Limit 1); 

            SET @valor_total = (SELECT SUM(Valor_Venta) FROM producto AS p
                                    INNER JOIN persona_producto AS pp on
                                        p.producto_id = pp.producto_id
                                            WHERE pp.persona_id = (@persona_id) 
                                                AND estado = 'SELECCIONADO');
            IF @cantidad = 1 THEN
                INSERT INTO pedido(cantidad,valor_total,persona_producto_id) 
                                values(1,@valor_total,new.persona_producto_id);
            ELSE
                UPDATE pedido SET valor_total = (@valor_total) 
                    WHERE pedido_id = (SELECT pedido_id FROM pedido
                                            ORDER BY pedido_id DESC 
                                                LIMIT 1);
                
                UPDATE pedido SET cantidad =(@cantidad) 
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
            INSERT INTO eliminado_metodo_pago 
                values(old.metodo_pago_id,old.tipo_pago,old.fecha_creacion,old.ultima_modificacion,now());
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
    /* TRIGGER QUE ACTUALIZA EL estado DE LOS PRODUCTOS FACTURADOS A CANCELADOS AL ELIMINAR UNA FACTURA */

        DROP TRIGGER if exists after_eliminar_factura_retornar_inventario

        DELIMITER //
        CREATE TRIGGER after_eliminar_factura_retornar_inventario
        AFTER INSERT ON eliminado_factura
        FOR EACH ROW
        BEGIN
            SET @persona_id = (SELECT persona_id FROM persona_producto AS pp
                                INNER JOIN pedido AS p ON
                                    pp.persona_producto_id = p.persona_producto_id
                                        INNER JOIN eliminado_factura AS e ON
                                            p.pedido_id = e.pedido_id
                                                ORDER BY e.fecha_creacion DESC
                                                    LIMIT 1);
            UPDATE persona_producto SET estado = 'CANCELADO', 
                                        ultima_modificacion = now()
                                            WHERE persona_id = @persona_id 
                                                AND estado = 'FACTURADO';
        END;
        //

        DELIMITER ;

### VISTAS
    /* VISTA QUE MUESTRA LOS DATOS DE LAS PERSONAS CON VENTAS */
        CREATE OR REPLACE VIEW persona_ventas_vw AS
            SELECT pp.persona_id, CONCAT(p.nombre, " ",p.apellidos) AS Nombre, 
                    COUNT(pp.persona_id) AS Transacciones, SUM(pe.valor_total) AS Venta 
                        FROM persona AS p
                         INNER JOIN persona_producto AS pp ON
                            p.persona_id = pp.persona_id
                                INNER JOIN pedido AS pe ON
                                    pp.persona_producto_id = pe.persona_producto_id
                                        INNER JOIN factura AS f ON
                                            pe.pedido_id = f.pedido_id
                                                INNER JOIN venta AS v ON
                                                    f.factura_id = v.factura_id
                                                        GROUP BY pp.persona_id;
    /* VISTA QUE MUESTRA LOS DATOS DE UN pedido */
    /* VISTA QUE MUESTRA LOS DATOS DE UNA FACTURA */
    /* VISTA QUE MUESTRA LOS DATOS DE UNA FACTURA CANCELADA */
    /* VISTA QUE MUESTRA TODAS LAS FACTURAS CANCELADAS EN EL DIA */
    


