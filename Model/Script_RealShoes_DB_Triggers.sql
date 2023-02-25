use real_shoes;

DROP TRIGGER if exists after_compra_actualizacion_inventario;

DELIMITER //

CREATE TRIGGER after_compra_actualizacion_inventario
AFTER INSERT ON factura
FOR EACH ROW
BEGIN 
    /* 1. saber el tipo de factura
        2. la sede que la expide
        3. el id del producto
        4. las cantidades*/
   SET @idpedido = (SELECT  idpedido FROM factura 
        ORDER BY fecha_creacion DESC limit 1);

    /* Tipo de factura */
    SELECT  Tipo_Factura FROM pedido
        INNER JOIN factura ON factura.idpedido = pedido.idpedido WHERE factura.idpedido =(@idpedido);

    /* Sede */
    SET @Idppp = (SELECT  Idppp FROM pedido
        INNER JOIN factura ON factura.idpedido = pedido.idpedido WHERE factura.idpedido =(@idpedido));
    
    SET @Idpersona = (SELECT ppp.idpersonapp FROM persona_producto_pedido AS ppp
        INNER JOIN pedido AS p ON p.Idppp = ppp.Idppp WHERE p.Idppp = (@Idppp));

    SET @sede = (SELECT pts.idsede FROM persona_trabaja_sede AS pts
        INNER JOIN persona_producto_pedido AS ppp ON pts.idpersona = ppp.idpersonapp WHERE ppp.idpersonapp =(@Idpersona) limit 1);
END;
//

DELIMITER ;