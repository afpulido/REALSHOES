--- TABLAS
    --- TABLA metodo_pago, ALMACENA LOS DIFERENTES METODOS DE PAGO ACEPTADOS POR LA ORGANIZACION.
    create table metodo_pago (
        metodo_pago_id int primary key, 
        tipo_pago varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    --- TABLA Persona_Producto, ALMACENA EL PRODUCTO SELECCIONADO POR UN USUARIO.     
    create table persona_producto(
        persona_producto_id int primary key IDENTITY(1,1), 
        persona_id int, 
        producto_id int,
        estado varchar(50) default 'SELECCIONADO',
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime 
    );

    --- TABLA pedido, ALMACENA LA LISTA DE PRODUCTOS SELECCIONADOS POR UN USUARIO.
    create table pedido (   
        pedido_id int primary key IDENTITY(1,1),
        cantidad int, 
        valor_total float default 0,
        metodo_pago_id int default 1, 
        persona_producto_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    --- TABLA FACTURA, ALMACENA LOS pedidoS PAGOS.
    create table factura(
        factura_id int primary key IDENTITY(1,1),
        descuento float,
        impuesto float,
        pedido_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    --- TABLA VENTA, ALMACENA LAS VENTAS REALIZADAS.
    create table venta(
        venta_id int primary key IDENTITY(1,1),
        factura_id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );

--- TABLAS CON DATOS ELIMINADOS.
    --- TABLA eliminado_metodo_pago, ALMACENA METODOS DE PAGO ELIMINADOS.
    create table eliminado_metodo_pago (
        metodo_pago_id int primary key, 
        tipo_pago varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    --- TABLA eliminado_factura, ALMACENA FACTURAS O TRANSACCIONES CANCELADAS.
    create table eliminado_factura(
        factura_id int primary key IDENTITY(1,1),
        descuento float,
        impuesto float,
        pedido_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );
    --- TABLA eliminado_venta, ALMACENA VENTAS CANCELADAS.
    create table eliminado_venta(
        venta_id int primary key IDENTITY(1,1),
        factura_id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );

--- LLAVES FORANEAS
    
    alter table persona_producto add constraint fk_persona_producto_persona foreign key (persona_id) references persona(persona_id);
    alter table persona_producto add constraint fk_persona_producto_producto foreign key (producto_id) references producto(producto_id);

    alter table pedido add constraint fk_pedido_metodo_pago foreign key(metodo_pago_id) references metodo_pago(metodo_pago_id);
    alter table pedido add constraint fk_pedido_persona_producto_pedido foreign key(persona_producto_id) references persona_producto(persona_producto_id);
    
    alter table factura add constraint fk_factura_pedido foreign key(pedido_id) references pedido(pedido_id);

    alter table venta add constraint fk_venta_factura foreign key (factura_id) references factura(factura_id);
--- LLAVES FORANEAS DATOS ELIMINADOS

    alter table eliminado_factura add constraint fk_eliminado_factura_pedido foreign key(pedido_id) references pedido(pedido_id);

    alter table eliminado_venta add constraint fk_eliminado_venta_factura foreign key (factura_id) references factura(factura_id);

--- DATOS 
    --- DATOS TABLA metodo_pago
    insert into metodo_pago(metodo_pago_id,tipo_pago) values
        (1,'Efectivo'),
        (2,'Tarjeta Debito'),
        (3,'Tarjeta Crédito'),
        (4,'QR');

--- TRIGGERS
    /* TRIGGER QUE ACTUALIZA EL estado DE LOS PRODUCTOS SELECCIONADOS */
        GO
	    CREATE TRIGGER after_insert_factura_update_estado
        ON factura
        FOR INSERT 
        AS 
        BEGIN
            DECLARE @persona_id int
            SET @persona_id = (SELECT TOP 1 persona_id FROM persona_producto AS pp
                                    INNER JOIN pedido AS p ON pp.persona_producto_id = p.persona_producto_id
                                         INNER JOIN factura AS f ON p.pedido_id = f.pedido_id
                                            ORDER BY f.fecha_creacion DESC);

            UPDATE persona_producto SET estado = 'FACTURADO', 
                                        ultima_modificacion = GETDATE()
                                            WHERE persona_id = @persona_id 
                                                AND estado = 'SELECCIONADO';
        END;
    /* TRIGGER QUE DESPUES DE UNA VENTA ACTUALIZA EL inventario */  
        GO 
        CREATE TRIGGER after_update_estado_facturado
        ON persona_producto 
        FOR UPDATE 
        AS 
        BEGIN
            DECLARE @inventario_id int, @producto_id int
            SET @inventario_id = (SELECT i.inventario_id FROM inventario AS i
                                        INNER JOIN persona_trabaja_sede AS pts ON i.sede_id = pts.sede_id 
                                            INNER JOIN inserted AS ins ON pts.persona_id = ins.persona_id);
    
            SET @producto_id = (SELECT producto_id 
                                    FROM inserted);

            IF EXISTS (SELECT estado FROM inserted WHERE estado = 'FACTURADO')
            BEGIN    
                    UPDATE contenido_inventario SET stock = stock - 1
                    WHERE inventario_id = @inventario_id AND producto_id = @producto_id
            END
            ELSE 
            BEGIN
                UPDATE contenido_inventario SET stock = stock + 1
                    WHERE inventario_id = @inventario_id AND producto_id = @producto_id
            END
        END;
        


    /* TRIGGER PARA REGISTRAR UNA VENTA DESPUES DE REALIZAR FACTURA */
        GO
	    CREATE TRIGGER after_venta_insertar_registro_venta
        ON factura
        FOR INSERT 
        AS 
        BEGIN
            DECLARE @factura_id int
            SET @factura_id = (SELECT TOP 1 factura_id 
                                 FROM factura 
                                    ORDER BY fecha_creacion DESC);
            INSERT INTO venta(factura_id)
                    values(@factura_id);

        END;
    /* TRIGGER QUE ACTUALIZA EL VALOR DEL pedido DEPENDIENDO DE LAS CANTIDADES Y EL PRODUCTO SELECCIONADO */
        GO
        CREATE TRIGGER after_persona_producto_actualizar_pedido
        ON persona_producto
        AFTER INSERT 
        AS 
        BEGIN
            DECLARE @cantidad int, @persona_id int, @persona_producto_id int, @valor_total int
            SET @cantidad = (SELECT TOP 1 COUNT(CASE WHEN estado = 'SELECCIONADO' THEN 1 END) AS contador
						        FROM persona_producto 
							        GROUP BY persona_id)
            SET @persona_id = (SELECT TOP 1 persona_id FROM persona_producto
                                        ORDER BY fecha_creacion DESC)

            SET @persona_producto_id = (SELECT TOP 1 persona_producto_id FROM persona_producto 
                                                WHERE persona_id = (@persona_id) 
                                                    AND estado = 'SELECCIONADO' 
                                                        ORDER BY fecha_creacion DESC) 

            SET @valor_total = (SELECT SUM(p.valor_venta) FROM producto AS p
                                        INNER JOIN persona_producto AS pp on
                                            p.producto_id = pp.producto_id
                                                WHERE pp.persona_id = (@persona_id) 
                                                    AND pp.estado = 'SELECCIONADO')
            IF (@cantidad = 1)
            BEGIN
                INSERT INTO pedido(cantidad,valor_total,persona_producto_id) 
                                values(1,@valor_total,@persona_producto_id)
            END
            ELSE
            BEGIN 
                UPDATE pedido SET valor_total = (@valor_total) 
                    WHERE pedido_id = (SELECT TOP 1 pedido_id FROM pedido
                                            ORDER BY pedido_id DESC)
                
                UPDATE pedido SET cantidad =(@cantidad) 
                    WHERE pedido_id = (SELECT TOP 1 pedido_id FROM pedido
                                            ORDER BY pedido_id DESC)
            END
        END;
        

    /* TRIGGER QUE AL ELIMINAR UN METODO DE PAGO, ALMACENA EL METODO DE PAGO ELIMINADO */
        GO
	    CREATE TRIGGER after_delete_metodo_pago
        ON metodo_pago
        FOR DELETE
        AS 
        BEGIN
            INSERT INTO eliminado_metodo_pago (metodo_pago_id,tipo_pago,fecha_creacion,ultima_modificacion,fecha_eliminacion)
            SELECT metodo_pago_id,tipo_pago,fecha_creacion,ultima_modificacion, GETDATE()
            FROM deleted;
        END;
    /* TRIGGER QUE AL ELIMINAR UNA FACTURA, ALMACENA LA FACTURA CANCELADA */
        GO
	    CREATE TRIGGER after_delete_factura
        ON factura
        FOR DELETE 
        AS 
        BEGIN
            INSERT INTO eliminado_factura (factura_id,descuento,impuesto,pedido_id,fecha_creacion,ultima_modificacion,fecha_eliminacion)
            SELECT factura_id,descuento,impuesto,pedido_id,fecha_creacion,ultima_modificacion, GETDATE()
            FROM deleted;
        END;
    /* TRIGGER QUE AL CANCELAR UNA VENTA, ALMACENA LA VENTA CANCELADA */
        GO
	    CREATE TRIGGER after_delete_venta
        ON venta
        FOR DELETE 
        AS 
        BEGIN
            INSERT INTO eliminado_venta (venta_id,factura_id,fecha_creacion,fecha_eliminacion)
            SELECT venta_id,factura_id,fecha_creacion,GETDATE()
            FROM deleted;
        END;
    /* TRIGGER QUE ACTUALIZA EL estado DE LOS PRODUCTOS FACTURADOS A CANCELADOS AL ELIMINAR UNA FACTURA */
        GO
	    CREATE TRIGGER after_eliminar_factura_retornar_inventario
        ON eliminado_factura
        FOR INSERT 
        AS 
        BEGIN
            DECLARE @persona_id int
            SET @persona_id = (SELECT TOP 1 persona_id FROM persona_producto AS pp
                                INNER JOIN pedido AS p ON
                                    pp.persona_producto_id = p.persona_producto_id
                                        INNER JOIN eliminado_factura AS e ON
                                            p.pedido_id = e.pedido_id
                                                ORDER BY e.fecha_creacion DESC);
            UPDATE persona_producto SET estado = 'CANCELADO', 
                                        ultima_modificacion = GETDATE()
                                            WHERE persona_id = @persona_id 
                                                AND estado = 'FACTURADO';
        END;
--- VISTAS
    /* VISTA QUE MUESTRA LOS DATOS DE LAS PERSONAS CON VENTAS */
       GO
       CREATE VIEW persona_ventas_vw AS
            SELECT CONCAT(p.nombre, ' ', p.apellidos) AS Nombre,
                    pp.persona_id,
                        COUNT(pp.persona_id) AS Transacciones,
                            SUM(pe.valor_total) AS Venta
                                FROM persona AS p
                                    INNER JOIN persona_producto AS pp ON p.persona_id = pp.persona_id
                                        INNER JOIN pedido AS pe ON pp.persona_producto_id = pe.persona_producto_id
                                            INNER JOIN factura AS f ON pe.pedido_id = f.pedido_id
                                                INNER JOIN venta AS v ON f.factura_id = v.factura_id
                                                    GROUP BY pp.persona_id, CONCAT(p.nombre, ' ', p.apellidos);


    
    /* VISTA QUE MUESTRA LOS DATOS DE UN pedido */
    /* VISTA QUE MUESTRA LOS DATOS DE UNA FACTURA */
    /* VISTA QUE MUESTRA LOS DATOS DE UNA FACTURA CANCELADA */
    /* VISTA QUE MUESTRA TODAS LAS FACTURAS CANCELADAS EN EL DIA */


