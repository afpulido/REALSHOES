use real_shoes;
### Eliminando Comprobacion de llave foranea
SET FOREIGN_KEY_CHECKS = 0;

### Truncate Borra la tabla y vuelve a crear una con la misma estructura
### es un drop y create table simultaneo
truncate persona;
truncate producto;
truncate inventario;
truncate persona_trabaja_sede;

### Datos tabla Metodo de pago
insert into Metodo_pago(IdMetodo_Pago,Tipo_pago) values (1,'Efectivo');
insert into Metodo_pago(IdMetodo_Pago,Tipo_pago) values (2,'Tarjeta Debito');
insert into Metodo_pago(IdMetodo_Pago,Tipo_pago) values (3,'Tarjeta Crédito');
insert into Metodo_pago(IdMetodo_Pago,Tipo_pago) values (4,'QR');

### Actualización de la columna descripcion de la tabla tipo persona
UPDATE tipo_persona SET descripcion_tp = 'Todos los individuos de la especie humana.' WHERE id_tp =1;
UPDATE tipo_persona SET descripcion_tp = 'Org. formada por varias personas físicas.' WHERE id_tp =2;

### Insercion de rol cliente para realizar pruebas
insert into rol(nombre_rol,descripcion_rol) values('Cliente','Cliente de Real Shoes');



### Datos tabla persona con datos del equipo de desarrollo
insert into persona(idpersona,nombre,apellidos,usuario,contraseña,email,idtipodocp,idtipopersona,idrolp) 
values (1022968811,'Omar Fernando','Bohorquez Preciado','ofbohorquez1','1234','ofbohorquez1@misena.edu.co',1,1,1);
insert into persona(idpersona,nombre,apellidos,usuario,contraseña,email,idtipodocp,idtipopersona,idrolp) 
values (1023976365,'Andres Felipe','Pulido Rios','andfpulido1','1234','andfpulido1@misena.edu.co',1,1,2);
insert into persona(idpersona,nombre,apellidos,usuario,contraseña,email,idtipodocp,idtipopersona,idrolp) 
values (1013594945,'Diego Alexander','Diaz Triana','diego.diaz949','1234','diego.diaz949@misena.edu.co',1,1,2);
insert into persona(idpersona,nombre,apellidos,usuario,contraseña,email,idtipodocp,idtipopersona,idrolp) 
values (1012453759,'Deiver Giovanny','Morales Duarte','deiver.morales','1234','deiver.morales@misena.edu.co',1,1,2);
insert into persona(idpersona,nombre,apellidos,usuario,contraseña,email,idtipodocp,idtipopersona,idrolp) 
values (1022972233,'Jaime','Olaya Hernandez','jolaya3','1234','jolaya3@misena.edu.co',1,1,2);

### Datos tabla persona con los diferentes actores
insert into persona(idpersona,nombre,apellidos,usuario,contraseña,email,idtipodocp,idtipopersona,idrolp) 
values (1,'Gerente1','Prueba1','gerenteprueba','1234','gerenteprueba@hotmail.com',1,1,3);
insert into persona(idpersona,nombre,apellidos,usuario,contraseña,email,idtipodocp,idtipopersona,idrolp) 
values (2,'Operador1','Prueba1','operadorprueba','1234','operadorprueba@hotmail.com',1,1,4);
insert into persona(idpersona,nombre,apellidos,usuario,contraseña,email,idtipodocp,idtipopersona,idrolp) 
values (3,'Proveedor1','Prueba1','proveedorprueba','1234','proveedorprueba@hotmail.com',1,2,5);
insert into persona(idpersona,nombre,apellidos,usuario,contraseña,email,idtipodocp,idtipopersona,idrolp) 
values (4,'Cliente1','Prueba1','clienteprueba','1234','clienteprueba@hotmail.com',1,2,6);


### Datos tabla rompimiento persona_producto_pedido
insert into persona_producto_pedido(idpersonapp,idproductopp) values (9,1010);
insert into pedido(Tipo_Factura,Cantidad,IdMetodopago,Idppp) values('Venta',3,1,1);
insert into sede(nombresede,idciudadsede) values('Restrepo',4);



### Eliminacion de llave foranea de inventario a producto
ALTER TABLE `producto` DROP FOREIGN KEY `fk_producto_inv`;

### Eliminacion de la columna que contenía la llave foranea de inventario a producto
ALTER TABLE producto DROP COLUMN idplacainventario;



### Eliminacion llave foranea de sede a inventario
ALTER TABLE `inventario` DROP FOREIGN KEY `fk_inventario_sede`;

### Eliminacion de la columna que contenía la llave foranea de sede a inventario
ALTER TABLE inventario DROP COLUMN idsede;


### Creacion tabla rompimiento Placa_Producto_Sede
create table Placa_Producto_Sede (
Idpps int primary key auto_increment, 
IdPlaca int(10), 
IdProducto int(10),
IdSede int(11),
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);

### Llaves foraneas de la tabla de rompimiento Placa_Producto_Sede
ALTER TABLE Placa_Producto_Sede ADD CONSTRAINT fk_PPS_placa FOREIGN KEY (IdPlaca) REFERENCES Inventario(idplacainventario);
ALTER TABLE Placa_Producto_Sede ADD CONSTRAINT fk_PPS_pro FOREIGN KEY (IdProducto) REFERENCES Producto(idproducto);
ALTER TABLE Placa_Producto_Sede ADD CONSTRAINT fk_PPS_Sede FOREIGN KEY (IdSede) REFERENCES Sede(idsede);

### Datos tabla inventario "Placa"
insert into inventario(bodega) values('Seccion 1');

### Datos tabla sede
insert into sede(nombresede,idciudadsede) values('Venecia',4);

### Datos tabla rompimiento Placa_Producto_Sede
insert into Placa_Producto_Sede(Idplaca,idproducto,idsede) values(1,1,1);

### Eliminacion Columna Stock de inventario
ALTER TABLE inventario DROP COLUMN Stock;

### Añadiendo columna Stock a la tabla de rompimiento Placa_Producto_Sede
ALTER TABLE Placa_Producto_Sede ADD COLUMN Stock int(11);

### Datos tabla producto
insert into producto(tipo,Marca,Coleccion_temporada,genero,idtalla) values ('Zapatilla','Adidas','Verano','Femenino',2);


select * from ciudad;
select * from factura;
select * from inventario;
select * from metodo_pago;
select * from pais;
select * from pedido;
select * from persona;

select * from persona_producto_pedido;
select * from persona_trabaja_sede;
select * from placa_producto_sede;
select * from producto;
select * from rol;
select * from sede;
select * from talla;

describe pedido;