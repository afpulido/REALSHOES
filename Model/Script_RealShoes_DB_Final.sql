###Base de datos Real_Shoes
create Database real_shoes;
use real_shoes;
### TABLA ROL, DESCRIBE EL ROL DESDE EL CUAL EL USUARIO VA A INTERACTUAR CON EL SISTEMA.
create table rol(
idrol int(2) auto_increment primary key,
nombre_rol varchar(45),
descripcion_rol varchar(45),
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp

);
### TABLA TIPO DOC, DESCRIBE EL DOCUMENTO DESDE EL CUAL EL USUARIO SE PUEDE IDENTIFICAR.
create table tipo_doc(
idtd int(2) auto_increment primary key,
nombre_td varchar(45),
descripcion_td varchar(45),
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
### TABLA TIPO PERSONA DESCRIBE EL TIPO DE USUARIO (natural, jurídico, proveedor).
create table tipo_persona(
id_tp int(2) auto_increment primary key,
nombretp varchar(45),
descripcion_tp varchar(45),
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
); 

### TABLA PERSONA, ALMACENA LOS DATOS DEL LOG-IN.
create table persona(
id int primary key auto_increment,
idpersona int, ### revisar llave forenea
nombre varchar(45),
apellidos varchar(45),
direccion varchar(45),
usuario varchar(45),
contraseña varchar(45),
telefono varchar(15),
email varchar(45),
idtipodocp int,
idtipopersona int,
idrolp int,
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
### select * from persona;
### TABLA PERSONA TRABAJA SEDE, ASOCIA UN EMPLEADO A UNA SEDE.
create table Persona_trabaja_sede(
idpersonasede int primary key auto_increment,
idpersona int,
idsede int,
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
### TABLA PRODUCTOS, INFORMACIÓN SOBRE LOS PRODUCTOS
Create table Producto(
Idproducto int(10) primary key, 
Tipo varchar(45),
Marca varchar(45) , 
Coleccion_Temporada varchar(45),
Genero varchar(45),
idplacainventario int,
idtalla int,
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
### TABLA INVENTARIO, MUESTRA EL CODIGO INTERNO DEL PRODUCTO Y LA CANTIDAD DE EXISTENCIAS
create table Inventario(
idplacainventario int(10) primary key auto_increment, 
stock int(6), 
bodega varchar(45),
idsede int,
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
### TABLA Metodo_Pago, En esta tabla se muestra el método de pago empleado por el cliente
create table Metodo_Pago (
IdMetodo_Pago int primary key, 
Tipo_pago varchar(45),
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
### TABLA Persona_Producto_Pedido, En esta tabla se muestra la relación y como se asocia la el cliente con el producto adquirido.
create table Persona_Producto_Pedido (
Idppp int primary key, 
IdPersonapp int, 
IdProductopp int,
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
### TABLA Pedido, En esta tabla se muestra la información del pedido realizado por el cliente con su facturación
create table Pedido 
(IdPedido int primary key, 
Tipo_Factura varchar(45), 
Cantidad int, 
IdMetodopago int, 
Idppp int,
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp);
### TABLA talla
create table talla(
idtalla int primary key auto_increment,
origen_talla varchar(45),
notalla int,
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
### TABLA FACTURA
create table factura(
idfactura int primary key auto_increment,
fechacompraventa datetime,
cantidadproducto int,
valorunitario float,
valorcompleto float,
descuento float,
impuesto float,
preciototal float,
idpedido int,
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
### tabla sede
create table sede (
idsede int primary key auto_increment,
nombresede varchar(45),
direccionsede varchar(45),
telefonosede varchar(45),
emailsede varchar(45),
idciudadsede int,
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
### tabla pais
create table pais(
idpais int primary key auto_increment,
nombrepais varchar(45),
capitalpais varchar(45),
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);
##tabla ciudad
create table ciudad(
idciudad int primary key auto_increment,
nombreciudad varchar(45),
idpaisc int,
fecha_creacion datetime default current_timestamp,
ultima_modificacion datetime,
fecha_eliminacion datetime default current_timestamp
);

### LLAVES FORANEAS

ALTER table PERSONA ADD constraint fk_persona_rol foreign key(idrolp) references  rol(idrol);
ALTER table PERSONA ADD constraint fk_persona_tp foreign key(idtipopersona) references  tipo_persona(id_tp);
ALTER table PERSONA ADD constraint fk_persona_td foreign key(idtipodocp) references  tipo_doc(idtd);

alter table persona_producto_pedido add constraint fk_ppp_per foreign key (IdPersonapp) references persona(id);
alter table persona_producto_pedido add constraint fk_ppp_ped foreign key (IdProductopp) references pedido(idpedido);

alter table pedido add constraint fk_pedido_mp foreign key(idmetodopago) references metodo_pago(IdMetodo_Pago);
alter table pedido add constraint fk_pedido_ppp foreign key(idppp) references persona_producto_pedido(idppp);

alter table  factura add constraint fk_factura_ped foreign key(idpedido) references pedido(idpedido);

alter table producto add constraint fk_producto_inv foreign key (idplacainventario) references inventario(idplacainventario);
alter table producto add constraint fk_producto_talla foreign key(idtalla) references talla(idtalla);

alter table inventario add constraint fk_inventario_sede foreign key (idsede) references sede(idsede);

alter table sede add constraint fk_sede_ciudad foreign key (idciudadsede) references ciudad(idciudad);

alter table ciudad add constraint fk_ciudad_pais foreign key (idpaisc) references pais(idpais);