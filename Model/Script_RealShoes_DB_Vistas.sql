/* Vista que retorna  el valor de las ventas realizadas en el día /*

/* Necesitamos el Inventario_ID, la sede, el vendedor */


CREATE OR REPLACE VIEW vendedores_vw AS

SELECT Venta.Persona_Id AS Cédula, CONCAT(Persona.nombre, ' ',Persona.apellidos) AS Nombre, 
COUNT(Venta.Persona_Id) AS Número_Ventas
FROM Persona 
INNER JOIN venta ON Venta.Persona_Id= Persona.Persona_Id GROUP BY Venta.persona_id;


CREATE OR REPLACE VIEW ranking_vendedores_vw AS

SELECT Sede_Id, vendedores_vw.Cédula, vendedores_vw.Nombre, vendedores_vw.Número_Ventas FROM persona_trabaja_sede
INNER JOIN vendedores_vw ON Cédula = persona_trabaja_sede.persona_id ORDER BY vendedores_vw.Número_Ventas ASC;

/* SELECT Cantidad AS Valor_Ventas FROM producto   
INNER JOIN venta ON Venta.Producto_Id = Producto.producto_id ORDER BY Persona_Id; */