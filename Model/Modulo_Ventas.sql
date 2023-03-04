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

    ### TABLA FACTURA, ALMACENA LOS PEDIDOS CANCELADOS.
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
        Persona_Id int,
        Producto_Id int(10),
        cantidad int,
        fecha_creacion DATETIME default current_timestamp
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

### LLAVES FORANEAS
    
    alter table persona_producto add constraint fk_persona_producto_persona foreign key (Persona_Id) references persona(Persona_Id);
    alter table persona_producto add constraint fk_persona_producto_producto foreign key (Producto_Id) references producto(Producto_Id);

    alter table pedido add constraint fk_pedido_metodo_pago foreign key(Metodo_pago_Id) references metodo_pago(Metodo_pago_Id);
    alter table pedido add constraint fk_pedido_persona_producto_pedido foreign key(persona_producto_id) references persona_producto(persona_producto_id);
    
    alter table factura add constraint fk_factura_pedido foreign key(Pedido_Id) references pedido(Pedido_Id);

    alter table venta add constraint fk_venta_factura foreign key (Factura_Id) references factura(Factura_Id);
    alter table venta add constraint fk_venta_persona foreign key (Persona_Id) references persona(Persona_Id);
    alter table venta add constraint fk_venta_producto foreign key (Producto_Id) references producto(Producto_Id);

### LLAVES FORANEAS DATOS ELIMINADOS

    alter table eliminado_factura add constraint fk_eliminado_factura_pedido foreign key(Pedido_Id) references pedido(Pedido_Id);

### DATOS 
    ### DATOS TABLA Metodo_pago
    insert into Metodo_pago(Metodo_pago_Id,Tipo_pago) values
        (1,'Efectivo'),
        (2,'Tarjeta Debito'),
        (3,'Tarjeta Crédito'),
        (4,'QR');

### TRIGGERS
    /* TRIGGER QUE DESPUES DE UNA VENTA ACTUALIZA EL INVENTARIO */  

        DROP TRIGGER if exists after_compra_actualizacion_inventario;

        DELIMITER //

        CREATE TRIGGER after_compra_actualizacion_inventario
        AFTER INSERT ON factura
        FOR EACH ROW
        BEGIN 
        /* Para actualizar el inventario necesitamos saber si la factura es de 'COMPRA' o 'VENTA' para añadir
        o restar unidades, el inventario de la respectiva sede que realiza la operacion, el id del producto y
        las cantidades, en las siguientes lineas hallamos las respuestas */

        /* Query para hallar el id del pedido de la última factura */
            SET @pedido_id = (SELECT pedido_id FROM factura 
            ORDER BY fecha_creacion DESC limit 1);

        /* Tipo de factura */
            SET @tipo = (SELECT  Tipo_Factura FROM persona_producto
            INNER JOIN pedido ON pedido.persona_producto_id = persona_producto.persona_producto_id WHERE pedido.pedido_id =(@pedido_id));

        /* Inventario */
            SET @persona_producto_id = (SELECT  persona_producto_id FROM pedido
            INNER JOIN factura ON factura.pedido_id = pedido.pedido_id WHERE factura.pedido_id =(@pedido_id));
        
            SET @persona_id = (SELECT ppp.persona_id FROM persona_producto AS ppp
            INNER JOIN pedido AS p ON p.persona_producto_id = ppp.persona_producto_id WHERE p.persona_producto_id = (@persona_producto_id));

            SET @sede = (SELECT pts.sede_id FROM persona_trabaja_sede AS pts
            INNER JOIN persona_producto AS ppp ON pts.persona_id = ppp.persona_id WHERE ppp.persona_id =(@persona_id) limit 1);

            SET @Inventario_id = (SELECT inv.inventario_id FROM inventario AS inv
            INNER JOIN sede ON sede.sede_id = inv.sede_id WHERE sede.sede_id = (@sede));

        /* ID producto */
            SET @producto_id = (SELECT ppp.producto_id FROM persona_producto AS ppp
            INNER JOIN pedido AS p ON p.persona_producto_id = ppp.persona_producto_id WHERE p.persona_producto_id = (@persona_producto_id));
        
        /* Cantidades */
            SET @unidades = (SELECT  Cantidad FROM pedido
            INNER JOIN factura ON factura.pedido_id = pedido.pedido_id WHERE factura.pedido_id =(@pedido_id));

        /* condicional para añadir o restar unidades al inventario dependiendo del tipo_factura */
        IF @tipo = 'COMPRA' THEN 
            UPDATE contenido_inventario SET stock = stock + @unidades WHERE producto_id = @producto_id and Inventario_id = @Inventario_id;
        ELSE
            UPDATE contenido_inventario SET stock = stock - @unidades WHERE producto_id = @producto_id and Inventario_id = @Inventario_id; 
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
        /* Para hacer una inserción en la tabla venta necesitamos conocer la factura_id,
        la persona que registro la venta, la sede desde donde se realizo la transaccion el producto que se vendió y la cantidad */
            
        /* Factura_Id */ 
            SET @factura_id = (SELECT factura_id FROM factura ORDER BY fecha_creacion DESC limit 1);

        /* Tipo_factura */
            SET @pedido_id = (SELECT pedido_id from factura ORDER BY fecha_creacion DESC Limit 1);

            SET @tipo = (SELECT  Tipo_Factura FROM persona_producto
            INNER JOIN pedido ON pedido.persona_producto_id = persona_producto.persona_producto_id WHERE pedido.pedido_id =(@pedido_id));

        /* Inventario_Id */
            SET @persona_producto_id = (SELECT persona_producto_id FROM pedido
            INNER JOIN factura ON factura.pedido_id = pedido.pedido_id WHERE factura.pedido_id =(@pedido_id));
            
            SET @persona_id = (SELECT ppp.persona_id from persona_producto as ppp
            INNER JOIN pedido as p ON p.persona_producto_id = ppp.persona_producto_id WHERE p.persona_producto_id =(@persona_producto_id)); 

            SET @sede = (SELECT pts.sede_id FROM persona_trabaja_sede AS pts
            INNER JOIN persona_producto AS ppp ON pts.persona_id = ppp.persona_id WHERE ppp.persona_id =(@persona_id) limit 1);

            SET @Inventario_id = (SELECT inv.inventario_id FROM inventario AS inv
            INNER JOIN sede ON sede.sede_id = inv.sede_id WHERE sede.sede_id = (@sede));
            
        /* ID producto */
            SET @producto_id = (SELECT ppp.producto_id FROM persona_producto AS ppp
            INNER JOIN pedido AS p ON p.persona_producto_id = ppp.persona_producto_id WHERE p.persona_producto_id = (@persona_producto_id));

        /* Cantidades */
            SET @unidades = (SELECT  Cantidad FROM pedido
            INNER JOIN factura ON factura.pedido_id = pedido.pedido_id WHERE factura.pedido_id =(@pedido_id));
        
        /* condicional que registra la venta o la compra dependiendo del tipo_factura */
        IF @tipo = 'COMPRA' THEN
            INSERT INTO compra(Factura_Id,persona_id,producto_id,cantidad) values (@factura_id,@persona_id,@producto_id,@unidades);
        ELSE
            INSERT INTO venta(Factura_Id,persona_id,producto_id,cantidad) values (@factura_id,@persona_id,@producto_id,@unidades);
        END IF;
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
                                            GROUP BY Persona_id );
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




