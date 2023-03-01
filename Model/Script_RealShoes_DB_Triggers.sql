use real_shoes;

/* TRIGGER QUE AÑADE AL INVENTARIO UN NUEVO PRODUCTO REGISTRADO CON STOCK 0 */
    DROP TRIGGER if exists after_añadir_producto_insert_contenido_inventario;

    DELIMITER //

    CREATE TRIGGER after_añadir_producto_insert_contenido_inventario
    AFTER INSERT ON producto
    FOR EACH ROW
        BEGIN
            INSERT INTO contenido_inventario(inventario_id,producto_id) values (1,new.producto_id),
                                                                        (2,new.producto_id);
        END;
        //

    DELIMITER ;

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

/* Trigger que actualiza el valor del pedido dependiendo de las cantidades y el producto seleccionado */

    DROP TRIGGER if exists after_persona_producto_actualizar_pedido;

    DELIMITER //

    CREATE TRIGGER after_persona_producto_actualizar_pedido
    AFTER INSERT on persona_producto
    FOR EACH ROW
    BEGIN
        SET @Cantidad = (SELECT Count(CASE WHEN Persona_id AND Estado = 'SELECCIONADO' AND Tipo_Factura ='VENTA' THEN 1 END) AS contador FROM persona_producto 
                                GROUP BY Persona_id );
        SET @persona_id = (SELECT pp.Persona_Id FROM persona_producto AS pp
                                    INNER JOIN pedido AS p on 
                                        p.persona_producto_id = pp.persona_producto_id);

        SET @persona_producto_id = (SELECT persona_producto_id FROM persona_producto 
                                        WHERE persona_id = (@persona_id) 
                                            AND Estado = 'SELECCIONADO' 
                                                ORDER BY fecha_creacion ASC
                                                    Limit 1); 

        SET @valor_total = (SELECT SUM(Valor_Venta) FROM producto AS p
                                INNER JOIN persona_producto AS pp on
                                    p.producto_id = pp.producto_id
                                        WHERE pp.persona_id = (@persona_id) 
                                            AND Estado = 'SELECCIONADO' 
                                                AND Tipo_Factura = 'VENTA');   
        IF @Cantidad > 1 THEN 
            UPDATE pedido SET VALOR_TOTAL = (@valor_total) 
                WHERE persona_producto_id =(@persona_producto_id);
            
            UPDATE pedido SET Cantidad =(@cantidad) 
            WHERE persona_producto_id =(@persona_producto_id); 
        END IF;
    END;
    //

    DELIMITER ;

/* TRIGGER QUE DESPUES DE UNA INSERCION A LA TABLA PEDIDO ACTUALIZA EL VALOR TOTAL */

    /* DROP TRIGGER if exists after_insert_pedido_actualizar_valor_pedido

    DELIMITER //    
    CREATE TRIGGER after_insert_pedido_actualizar_valor_pedido 
    AFTER INSERT on pedido
    FOR EACH ROW
    BEGIN
        SET @valor_venta = (SELECT VALOR_VENTA FROM producto 
            INNER JOIN persona_producto on
                producto.producto_id = persona_producto.producto_id
                    INNER JOIN pedido on
                        pedido.persona_producto_id = persona_producto.persona_producto_id
                            INNER JOIN persona on
                                persona.persona_id = persona_producto.persona_id
                                    WHERE persona_producto.persona_id = persona.persona_id 
                                        AND persona_producto.Tipo_Factura = 'VENTA' 
                                            AND persona_producto.Estado = 'SELECCIONADO'
                                                ORDER BY persona_producto.fecha_creacion DESC
                                                    LIMIT 1);
        SET @valor_compra = (SELECT VALOR_COMPRA FROM producto 
            INNER JOIN persona_producto on
                producto.producto_id = persona_producto.producto_id
                    INNER JOIN pedido on
                        pedido.persona_producto_id = persona_producto.persona_producto_id
                            INNER JOIN persona on
                                persona.persona_id = persona_producto.persona_id
                                    WHERE persona_producto.persona_id = persona.persona_id 
                                        AND persona_producto.Tipo_Factura = 'COMPRA' 
                                            AND persona_producto.Estado = 'SELECCIONADO'
                                                ORDER BY persona_producto.fecha_creacion DESC
                                                    LIMIT 1);
        SET @tipo_factura = (SELECT Tipo_Factura FROM persona_producto
            INNER JOIN pedido on 
                pedido.persona_producto_id = persona_producto.persona_producto_id
                    ORDER BY persona_producto.fecha_creacion DESC 
                        LIMIT 1);

        IF @Tipo_Factura = 'VENTA' THEN
            UPDATE pedido SET Valor_Total = (@valor_venta);
        ELSE 
            UPDATE pedido SET Valor_Total = (@valor_compra);
        END IF;
    END;
    //

    DELIMITER ; */

