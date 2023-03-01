###Base de datos Real_Shoes

Drop Database if exists real_shoes;
create Database real_shoes;
use real_shoes;

### TABLA ROL, DESCRIBE EL ROL DESDE EL CUAL EL USUARIO VA A INTERACTUAR CON EL SISTEMA.
create table rol(
    Rol_Id int(2) primary key auto_increment,
    nombre varchar(45),
    descripcion varchar(45),
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime

);
### TABLA TIPO DOC, DESCRIBE EL DOCUMENTO DESDE EL CUAL EL USUARIO SE PUEDE IDENTIFICAR.
create table tipo_doc(
    Tipo_Doc_Id int(2) primary key auto_increment,
    nombre varchar(45),
    descripcion varchar(45),
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);
### TABLA TIPO PERSONA DESCRIBE EL TIPO DE USUARIO (natural, jurídico, proveedor).
create table tipo_persona(
    Tipo_persona_Id int(2) primary key auto_increment,
    nombre varchar(45),
    descripcion  varchar(45),
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
); 

### TABLA PERSONA, ALMACENA LOS DATOS DEL LOG-IN.
create table persona(
    id int primary key auto_increment,
    Persona_Id int NOT NULL UNIQUE, 
    nombre varchar(45),
    apellidos varchar(45),
    direccion varchar(45),
    usuario varchar(45) UNIQUE,
    contraseña varchar(45),
    telefono varchar(15) UNIQUE,
    email varchar(45) UNIQUE,
    Tipo_Doc_Id int,
    Tipo_persona_Id int,
    Rol_Id int,
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);

### TABLA PERSONA TRABAJA SEDE, ASOCIA UN EMPLEADO A UNA SEDE.
create table Persona_trabaja_sede(
    Persona_Idsede int primary key auto_increment,
    Persona_Id int,
    Sede_Id int,
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);
### TABLA PRODUCTOS, INFORMACIÓN SOBRE LOS PRODUCTOS
Create table Producto(
    Producto_Id int(10) primary key auto_increment, 
    Tipo varchar(45),
    Marca varchar(45) , 
    Coleccion_Temporada varchar(45),
    Genero varchar(45),
    Valor_Compra float,
    Valor_Venta float,
    Talla_Id int,
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);
### TABLA INVENTARIO, MUESTRA EL CODIGO DEL INVENTARIO Y SU RESPECTIVA SEDE.
create table Inventario(
    Inventario_Id int(10) primary key auto_increment, 
    Sede_Id int UNIQUE,
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);

### TABLA CONTENIDO_INVENTARIO, MUESTRA LAS EXISTENCIAS DE UN RESPECTIVO INVENTARIO.
create table Contenido_inventario(
    Contenido_inventario_Id int primary key auto_increment,
    Inventario_Id int (10),
    Producto_Id int(10),
    stock int default 0,
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime

);
### TABLA Metodo_Pago, En esta tabla se muestra el método de pago empleado por el cliente
create table Metodo_Pago (
    Metodo_pago_Id int primary key, 
    Tipo_pago varchar(45),
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);
### TABLA Persona_Producto, En esta tabla se muestra la relación y como se asocia el cliente con el producto adquirido.
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
### TABLA Pedido, En esta tabla se muestra la información del pedido realizado por el cliente con su facturación
create table Pedido (   
    Pedido_Id int primary key AUTO_INCREMENT,
    Cantidad int default 1, 
    Valor_Total float default 0,
    Metodo_pago_Id int default 1, 
    persona_producto_id int,
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);
### TABLA talla
create table talla(
    Talla_Id int primary key auto_increment,
    origen_talla varchar(45),
    numero int,
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);
### TABLA FACTURA
create table factura(
    Factura_Id int primary key auto_increment,
    descuento float,
    impuesto float,
    Pedido_Id int,
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);
### TABLA VENTA
create table venta(
    Venta_Id int primary key auto_increment,
    Factura_Id int,
    Persona_Id int,
    Producto_Id int(10),
    cantidad int,
    fecha_creacion DATETIME default current_timestamp
);
### TABLA compra
create table compra(
    Compras_Id int primary key auto_increment,
    Factura_Id int,
    Persona_Id int,
    Producto_Id int(10),
    cantidad int,
    fecha_creacion DATETIME default current_timestamp
);
### tabla sede
create table sede (
    Sede_Id int primary key auto_increment,
    nombre varchar(45),
    direccion varchar(45),
    telefono varchar(45),
    email varchar(45),
    Ciudad_Id int,
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);
### tabla pais
create table pais(
    Pais_Id int primary key auto_increment,
    nombre varchar(45),
    capital varchar(45),
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);
##tabla ciudad
create table ciudad(
    Ciudad_Id int primary key auto_increment,
    nombre varchar(45),
    Pais_Id int,
    fecha_creacion datetime default current_timestamp,
    ultima_modificacion datetime default current_timestamp,
    fecha_eliminacion datetime
);



### LLAVES FORANEAS

    ALTER table PERSONA ADD constraint fk_persona_rol foreign key(Rol_Id) references  rol(Rol_Id);
    ALTER table PERSONA ADD constraint fk_persona_tipo_persona foreign key(Tipo_persona_Id) references  tipo_persona(Tipo_persona_Id);
    ALTER table PERSONA ADD constraint fk_persona_tipo_doc foreign key(Tipo_Doc_Id) references  tipo_doc(Tipo_Doc_Id);

    alter table persona_producto add constraint fk_persona_producto_persona foreign key (Persona_Id) references persona(Persona_Id);
    alter table persona_producto add constraint fk_persona_producto_producto foreign key (Producto_Id) references producto(Producto_Id);

    alter table pedido add constraint fk_pedido_metodo_pago foreign key(Metodo_pago_Id) references metodo_pago(Metodo_pago_Id);
    alter table pedido add constraint fk_pedido_persona_producto_pedido foreign key(persona_producto_id) references persona_producto(persona_producto_id);
    

    alter table  factura add constraint fk_factura_pedido foreign key(Pedido_Id) references pedido(Pedido_Id);

    alter table producto add constraint fk_producto_talla foreign key(Talla_Id) references talla(Talla_Id);

    alter table inventario add constraint fk_inventario_sede foreign key (Sede_Id) references sede(Sede_Id);

    alter table sede add constraint fk_sede_ciudad foreign key (Ciudad_Id) references ciudad(Ciudad_Id);

    alter table ciudad add constraint fk_ciudad_pais foreign key (Pais_Id) references pais(Pais_Id);

    alter table contenido_Inventario add constraint fk_contenidoinventario_inventario foreign key (Inventario_Id) references inventario(Inventario_Id);
    alter table contenido_Inventario add constraint fk_contenidoinventario_producto foreign key (Producto_Id) references producto(Producto_Id);

    alter table venta add constraint fk_venta_factura foreign key (Factura_Id) references factura(Factura_Id);
    alter table venta add constraint fk_venta_persona foreign key (Persona_Id) references persona(Persona_Id);
    alter table venta add constraint fk_venta_producto foreign key (Producto_Id) references producto(Producto_Id);

    alter table compra add constraint fk_compra_factura foreign key (Factura_Id) references factura(Factura_Id);
    alter table compra add constraint fk_compra_persona foreign key (Persona_Id) references persona(Persona_Id);
    alter table compra add constraint fk_compra_producto foreign key (Producto_Id) references producto(Producto_Id);
