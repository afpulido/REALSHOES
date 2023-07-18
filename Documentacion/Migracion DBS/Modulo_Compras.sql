--- TABLAS
    --- TABLA sede_compra, ALMACENA LOS PRODUCTOS SELECCIONADOS PARA UNA COMPRA POR UNA SEDE.     
    create table sede_compra(
        sede_compra_id int primary key IDENTITY(1,1), 
        Sede_id int, 
        producto_id int,
        valor_compra float,
        cantidad int,
        estado varchar(50) default 'SELECCIONADO',
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime 
    );

    --- TABLA pedido_compra, ALMACENA LA LISTA DE PRODUCTOS SELECCIONADOS PARA UNA COMPRA.
    create table pedido_compra (   
        pedido_compra_id int primary key IDENTITY(1,1),
        cantidad int, 
        items int,
        valor_total float default 0,
        metodo_pago_id int default 1, 
        sede_compra_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    --- TABLA factura_compra, ALMACENA LOS Pedido_compraS PAGOS.
    create table factura_compra(
        factura_compra_id int primary key IDENTITY(1,1),
        descuento float,
        impuesto float,
        pedido_compra_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    --- TABLA VENTA, ALMACENA LAS VENTAS REALIZADAS.
    create table compra(
        compra_Id int primary key IDENTITY(1,1),
        factura_compra_id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );

--- TABLAS CON DATOS ELIMINADOS
    --- TABLA eliminado_factura_compra, ALMACENA LAS FACTURAS DE COMPRA CANCELADAS.
    create table eliminado_factura_compra(
        factura_compra_id int primary key IDENTITY(1,1),
        descuento float,
        impuesto float,
        pedido_compra_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    --- TABLA VENTA, ALMACENA LAS VENTAS REALIZADAS.
    create table eliminado_compra(
        compra_Id int primary key IDENTITY(1,1),
        factura_compra_id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );

--- LLAVES FORANEAS
    alter table sede_compra add constraint fk_sede_compra_sede foreign key (sede_id) references sede(sede_id);
    alter table sede_compra add constraint fk_sede_compra_producto foreign key (producto_id) references producto(producto_id);

    alter table pedido_compra add constraint fk_Pedido_compra_metodo_pago foreign key(metodo_pago_id) references metodo_pago(metodo_pago_id);
    alter table pedido_compra add constraint fk_Pedido_compra_sede_compra foreign key(sede_compra_id) references sede_compra(sede_compra_id);
    
    alter table factura_compra add constraint fk_factura_compra_Pedido_compra foreign key(pedido_compra_id) references pedido_compra(pedido_compra_id);

    alter table compra add constraint fk_compra_factura_compra foreign key (factura_compra_id) references factura_compra(factura_compra_id);

--- LLAVES FORANEAS DATOS ELIMINADOS
    alter table eliminado_factura_compra add constraint fk_eliminado_pedido_compra foreign key(pedido_compra_id) references pedido_compra(pedido_compra_id);

    alter table eliminado_compra add constraint fk_eliminado_compra_factura foreign key (factura_compra_id) references factura_compra(factura_compra_id);


--- DATOS
    --- DATOS SEDE_COMPRA 
    /* INSERT INTO SEDE_COMPRA (Sede_id,producto_id,valor_compra,cantidad)
        values (1,1,20000,10); */

    --- DATOS FACTURA_COMPRA
    /* insert into factura_compra(pedido_compra_id)values(1); */

--- TRIGGERS
    /* TRIGGER QUE ACTUALIZA EL estado DE LOS PRODUCTOS SELECCIONADOS */
        GO
        CREATE TRIGGER after_insert_factura_compra_update_estado
        ON factura_compra
        FOR INSERT
		AS
        BEGIN
            DECLARE @sede_id int
            SET @sede_id = (SELECT TOP 1 sede_Id FROM sede_compra AS sc
                                INNER JOIN pedido_compra AS pc ON
                                    sc.sede_compra_id = pc.sede_compra_id
                                        INNER JOIN factura_compra AS fc ON
                                            pc.pedido_compra_id = fc.pedido_compra_id
                                                ORDER BY fc.fecha_creacion DESC);
            UPDATE sede_compra SET estado = 'FACTURADO', 
                                        ultima_modificacion = GETDATE()
                                            WHERE sede_Id = @sede_id 
                                                AND estado = 'SELECCIONADO';
        END;
    /* TRIGGER QUE DESPUES DE UNA COMPRA ACTUALIZA EL INVENTARIO */ 
        GO
        CREATE TRIGGER after_compra_update_inventario
        ON sede_compra
        FOR UPDATE 
		AS
        BEGIN 
            DECLARE @inventario_id int, @producto_id int, @cantidad int
            SET @inventario_id = (SELECT TOP 1 inventario_id FROM inventario AS i
                                            INNER JOIN sede_compra AS sc ON
                                                i.sede_id = sc.sede_id  
                                                    ORDER BY sc.ultima_modificacion DESC);
            
            SET @producto_id =  (SELECT TOP 1 producto_id 
                                    FROM sede_compra AS sc 
                                        ORDER BY sc.ultima_modificacion DESC); 
            SET @cantidad = (SELECT TOP 1 cantidad 
                                FROM sede_compra AS sc
                                    WHERE sc.producto_id = @producto_id
                                        ORDER BY sc.ultima_modificacion 
                                            DESC);
            IF EXISTS (SELECT estado FROM inserted WHERE estado = 'FACTURADO')
            BEGIN 
                UPDATE contenido_inventario set stock = stock + @cantidad 
                    WHERE producto_id = @producto_id 
                        AND inventario_id = @inventario_id;
            END
            ELSE 
            BEGIN
                UPDATE contenido_inventario set stock = stock - @cantidad 
                    WHERE producto_id = @producto_id 
                        AND inventario_id = @inventario_id;
            END
		END;
    /* TRIGGER PARA REGISTRAR UNA COMPRA DESPUES DE REALIZAR FACTURA_COMPRA */
        GO
        CREATE TRIGGER after_compra_insertar_registro_compra
        ON factura_compra    
        FOR INSERT
		AS
        BEGIN
			DECLARE @factura_compra_id int
            SET @factura_compra_id = (SELECT TOP 1 factura_compra_id 
                                        FROM factura_compra 
                                            ORDER BY fecha_creacion DESC);
            INSERT INTO COMPRA (factura_compra_id)
            SELECT @factura_compra_id;
        END;
    /* TRIGGER QUE ACTUALIZA EL VALOR DEL PEDIDO_COMPRA DEPENDIENDO DE LAS cantidadES Y EL PRODUCTO SELECCIONADO */
        GO
        CREATE TRIGGER after_sede_compra_actualizar_Pedido_compra
        ON sede_compra
        FOR INSERT
		AS
        BEGIN
            DECLARE @items int, @sede_id int, @sede_compra_id int, @valor_total float, @cantidad int 
			SELECT @items = COUNT(CASE WHEN sede_id = @sede_id AND estado = 'SELECCIONADO' THEN 1 END)
								FROM sede_compra
									WHERE sede_id = @sede_id;

			SELECT @items AS contador;


            SET @sede_id = (SELECT TOP 1 sc.sede_id FROM sede_compra AS sc
                                ORDER BY sc.fecha_creacion DESC);

            SET @sede_compra_id = (SELECT TOP 1 sede_compra_id FROM sede_compra 
                                            WHERE sede_id = (@sede_id) 
                                                AND estado = 'SELECCIONADO' 
                                                    ORDER BY fecha_creacion DESC); 

            SET @valor_total = (SELECT SUM(valor_compra * cantidad) FROM sede_compra
                                    WHERE sede_id = @sede_id AND estado = 'SELECCIONADO');

            SET @cantidad = (SELECT SUM(cantidad) FROM sede_compra
                                WHERE estado ='SELECCIONADO'
                                    GROUP BY Sede_id);
            
            IF (@items = 1)
            BEGIN
                INSERT INTO pedido_compra(items,valor_total,sede_compra_id) 
                SELECT 1,@valor_total,sede_compra_id
                FROM inserted;
            END
            ELSE
            BEGIN
                UPDATE pedido_compra SET valor_total = (@valor_total) 
                    WHERE pedido_compra_id = (SELECT TOP 1 pedido_compra_id FROM pedido_compra
                                                ORDER BY pedido_compra_id DESC);
                
                UPDATE pedido_compra SET cantidad =(@cantidad) 
                    WHERE pedido_compra_id = (SELECT TOP 1 pedido_compra_id FROM pedido_compra
                                                ORDER BY pedido_compra_id DESC);
                UPDATE pedido_compra SET items = items + 1
                    WHERE pedido_compra_id = (SELECT TOP 1 pedido_compra_id FROM pedido_compra
                                                ORDER BY pedido_compra_id DESC );
            END
        END;
    /* TRIGGER QUE AL ELIMINAR UNA FACTURA_COMPRA, ALMACENA LA FACTURA CANCELADA */
        GO
        CREATE TRIGGER after_delete_factura_compra
        ON factura_compra
        FOR DELETE
		AS
        BEGIN
            INSERT INTO eliminado_factura_compra(factura_compra_id,descuento,impuesto,pedido_compra_id,fecha_creacion,ultima_modificacion,fecha_eliminacion)
            SELECT factura_compra_id,descuento,impuesto,pedido_compra_id,fecha_creacion,ultima_modificacion, GETDATE()
            FROM deleted;
            DELETE FROM compra
                WHERE factura_compra_id = factura_compra_id;
        END;
    /* TRIGGER QUE AL CANCELAR UNA VENTA, ALMACENA LA VENTA CANCELADA */
        GO
        CREATE TRIGGER after_delete_compra
        ON compra
        FOR DELETE
		AS
        BEGIN
            INSERT INTO eliminado_compra(compra_id,factura_compra_id,fecha_creacion,fecha_eliminacion)
            SELECT compra_id,factura_compra_id,fecha_creacion, GETDATE()
            FROM deleted;
        END;
    /* TRIGGER QUE ACTUALIZA EL estado DE LOS PRODUCTOS FACTURADOS A CANCELADOS AL ELIMINAR UNA FACTURA */
        GO
        CREATE TRIGGER after_eliminar_factura_compra_retornar_inventario
        ON eliminado_factura_compra
        FOR INSERT
		AS
        BEGIN
			DECLARE @sede_id int
            SET @sede_id = (SELECT TOP 1 sede_Id FROM sede_compra AS sc
                                INNER JOIN pedido_compra AS pc ON
                                    sc.sede_compra_id = pc.sede_compra_id
                                        INNER JOIN eliminado_factura_compra AS efc ON
                                            pc.pedido_compra_id = efc.pedido_compra_id
                                                ORDER BY efc.fecha_creacion DESC);
            UPDATE sede_compra SET estado = 'CANCELADO', 
                                        ultima_modificacion =  GETDATE()
                                            WHERE sede_id = @sede_id 
                                                AND estado = 'FACTURADO';
        END;

--- VISTAS
     /* VISTA QUE MUESTRA LOS DATOS DE LAS COMPRAS DE LAS SEDES */
       GO
	   CREATE VIEW sede_compras_vw AS
            SELECT sc.sede_id, s.nombre AS Almacen,  
                    COUNT(sc.sede_id) AS Transacciones, SUM(pc.valor_total) AS valor_compra
                        FROM sede AS s
                            INNER JOIN sede_compra AS sc ON
                                s.sede_id = sc.sede_id
                                    INNER JOIN pedido_compra AS pc ON
                                        pc.sede_compra_id = sc.sede_compra_id
                                            INNER JOIN factura_compra AS fc ON
                                                pc.pedido_compra_id = fc.pedido_compra_id
                                                    GROUP BY sc.sede_id, s.nombre;