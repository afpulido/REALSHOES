insert into tipo_docs (nombre, descripcion, created_at,updated_at) values
        ('Cédula Ciudadanía','Id Colombianos mayores de 18 años.',NOW(),NOW()),
        ('Tarjeta Identidad','Id Colombianos menores de 18 años.',NOW(),NOW()),
        ('Cédula Extranjería','Id expedida por Migración Colombia.',NOW(),NOW()),
        ('Permiso Especial Permanencia','Id para los nacionales venezolanos.',NOW(),NOW()),
        ('Registro Civil','Doc detallado de hechos relativos al id.',NOW(),NOW());

insert into rol (nombre, descripcion, created_at,updated_at) values
        ('Administrador_ARP','Administrador root con todos los privilegios.', now(), now()),
        ('Administrador_APM','Administrador privilegios medios.', now(), now()),
        ('Gerente','Usuario con vistas privilegiadas.', now(), now()),
        ('Operador','Empleado de Real Shoes.', now(), now()),
        ('Proveedores','Proveedores de Real Shoes', now(), now()),
	('Cliente','Cliente de Real Shoes', now(), now());

insert into metodo_pagos(tipo_pago, descripcion, created_at,updated_at) values
        ('Efectivo','Pago realizado en dinero en efectivo',NOW(),NOW()),
	('Tarjeta Débito','Pago realizado con tarjeta débito',NOW(),NOW()),
	('Tarjeta de Credito','Pago realizado con tarjeta de credito',NOW(),NOW()),
	('Cheque','Pago realizado con cheque',NOW(),NOW()),
	('Nequi','Pago realizado en transacción electrónica',NOW(),NOW()),
	('Daviplata','Pago realizado en transacción electrónica',NOW(),NOW());

insert into productos (tipo, marca,coleccion,genero, talla, valor_compra, valor_venta, created_at, updated_at) values
('deportivo', 'adidas','verano', 'femenino', 30, 20000, 40000, now(), now()),
('deportivo', 'adidas','verano', 'masculino', 42, 20000, 40000, now(), now()),
('deportivo', 'adidas','verano', 'infantil', 18, 20000, 40000, now(), now()),
('linea fina (ejecutivo)', 'puma','primavera', 'femenino', 18, 20000, 40000, now(), now()),
('linea fina (ejecutivo)', 'puma','primavera', 'masculino', 18, 20000, 40000, now(), now()),
('linea fina (ejecutivo)', 'puma','primavera', 'infantil', 18, 20000, 40000, now(), now()),
('linea pesada (botas)', 'nike','invierno', 'femenino', 18, 20000, 40000, now(), now()),
('linea pesada (botas)', 'nike','invierno', 'masculino', 18, 20000, 40000, now(), now()),
('linea pesada (botas)', 'nike','invierno', 'infantil', 18, 20000, 40000, now(), now()),
('tenis', 'allstars','otoño', 'femenino', 30, 20000, 40000, now(), now()),
('tenis', 'allstars','otoño', 'masculino', 42, 20000, 40000, now(), now()),
('tenis', 'allstars','otoño', 'infantil', 18, 20000, 40000, now(), now());

#### rol 6 ###tipo_docs 5
insert into  personas (users_id, personas_id, name, apellidos, direccion, telefono, tipo_doc_id, rol_id, created_at, updated_at) values
(1,1, 'clark','Kent','calle falsa 123',123456789, 1,1, NOW(), now()),
(2,2, 'bruce','Kent','calle falsa 123',123456789, 2,2, NOW(), now()),
(3,3, 'diana','Kent','calle falsa 123',123456789, 3,3, NOW(), now()),
(4,4, 'tony','Kent','calle falsa 123',123456789, 4,4, NOW(), now()),
(5,5, 'carlos','Kent','calle falsa 123',123456789, 5,5, NOW(), now()),
(6,6, 'alberto','Kent','calle falsa 123',123456789, 1,6, NOW(), now()),
(7,7, 'camilo','Kent','calle falsa 123',123456789, 2,2, NOW(), now()),
(8,8, 'clark','Kent','calle falsa 123',123456789, 3,1, NOW(), now()),
(9,9, 'laura','Kent','calle falsa 123',123456789, 4,4, NOW(), now()),
(10,10, 'rubi','Kent','calle falsa 123',123456789, 5,1, NOW(), now()),
(11,11, 'jade','Kent','calle falsa 123',123456789, 1,1, NOW(), now());

   insert into ventas (facturas_id, created_at,updated_at) values
   	(1,NOW(),NOW()),
   	(2,NOW(),NOW()),
   	(3,NOW(),NOW()),
   	(4,NOW(),NOW()),
   	(5,NOW(),NOW()),
   	(6,NOW(),NOW()),
   	(7,NOW(),NOW()),
	(8,NOW(),NOW()),
	(9,NOW(),NOW()),
	(10,NOW(),NOW());

insert into compras(factura_compras_id, created_at,updated_at) values
   	(1,NOW(),NOW()),
   	(2,NOW(),NOW()),
   	(3,NOW(),NOW()),
   	(4,NOW(),NOW()),
   	(5,NOW(),NOW()),
   	(6,NOW(),NOW()),
   	(7,NOW(),NOW()),
	(8,NOW(),NOW()),
	(9,NOW(),NOW()),
	(10,NOW(),NOW());

insert into contenido_inventarios(productos_id,stock,  created_at,updated_at) values
   	(1,1000,NOW(),NOW()),
   	(2,1000,NOW(),NOW()),
   	(3,1000,NOW(),NOW()),
   	(4,1000,NOW(),NOW()),
   	(5,1000,NOW(),NOW()),
   	(6,1000,NOW(),NOW()),
   	(7,1000,NOW(),NOW()),
	(8,1000,NOW(),NOW()),
	(9,1000,NOW(),NOW()),
	(10,1000,NOW(),NOW());

insert into empleado_productos(personas_id,productos_id, estado, created_at,updated_at) values
   	(1,1,'SELECCIONADO',NOW(),NOW()),
   	(2,3,'CANCELADO',NOW(),NOW()),
   	(3,6,'FACTURADO',NOW(),NOW()),
   	(4,9,'CANCELADO',NOW(),NOW()),
   	(5,2,'FACTURADO',NOW(),NOW()),
   	(6,5,'SELECCIONADO',NOW(),NOW()),
   	(7,7,'FACTURADO',NOW(),NOW()),
	(8,10,'CANCELADO',NOW(),NOW()),
	(9,4,'FACTURADO',NOW(),NOW()),
	(10,8,'SELECCIONADO',NOW(),NOW());

insert into facturas(pedidos_id, descuento, impuesto, created_at, updated_at)values
(1,10000,2000,now(),now()),
(2,5000,1200,now(),now()),
(3,9000,1800,now(),now()),
(4,1000,200,now(),now()),
(5,15000,2500,now(),now()),
(6,7000,1000,now(),now()),
(7,30000,1200,now(),now()),
(8,40000,2000,now(),now()),
(9,70000,2000,now(),now()),
(10,8000,2000,now(),now());

insert into factura_compras(pedido_compras_id, descuento, impuesto, created_at, updated_at)values
(1,10000,2000,now(),now()),
(2,5000,1200,now(),now()),
(3,9000,1800,now(),now()),
(4,1000,200,now(),now()),
(5,15000,2500,now(),now()),
(6,7000,1000,now(),now()),
(7,30000,1200,now(),now()),
(8,40000,2000,now(),now()),
(9,70000,2000,now(),now()),
(10,8000,2000,now(),now());

insert into pedidos (metodo_pagos_id, persona_productos_id, cantidad, valor_total,created_at,updated_at) values
(1,1,20,200000,now(),now()),
(2,2,10,100000,now(),now()),
(3,3,20,200000,now(),now()),
(4,4,20,200000,now(),now()),
(5,5,20,200000,now(),now()),
(6,6,20,200000,now(),now()),
(1,7,20,200000,now(),now()),
(2,8,20,200000,now(),now()),
(3,9,20,200000,now(),now()),
(4,10,20,200000,now(),now()),
(5,1,20,200000,now(),now()),
(6,2,20,200000,now(),now());

insert into pedido_compras (metodo_pagos_id, empleado_productos_id, cantidad, valor_total, created_at,updated_at) values
(1,1,20,200000,now(),now()),
(2,2,10,100000,now(),now()),
(3,3,20,200000,now(),now()),
(4,4,20,200000,now(),now()),
(5,5,20,200000,now(),now()),
(6,6,20,200000,now(),now()),
(1,7,20,200000,now(),now()),
(2,8,20,200000,now(),now()),
(3,9,20,200000,now(),now()),
(4,10,20,200000,now(),now()),
(5,1,20,200000,now(),now()),
(6,2,20,200000,now(),now());

insert into persona_productos (personas_id, productos_id, estado, created_at,updated_at) values
(1,1,'SELECCIONADO',NOW(),NOW()),
   	(2,3,'CANCELADO',NOW(),NOW()),
   	(3,6,'FACTURADO',NOW(),NOW()),
   	(4,9,'CANCELADO',NOW(),NOW()),
   	(5,2,'FACTURADO',NOW(),NOW()),
   	(6,5,'SELECCIONADO',NOW(),NOW()),
   	(7,7,'FACTURADO',NOW(),NOW()),
	(8,10,'CANCELADO',NOW(),NOW()),
	(9,4,'FACTURADO',NOW(),NOW()),
	(10,8,'SELECCIONADO',NOW(),NOW());
