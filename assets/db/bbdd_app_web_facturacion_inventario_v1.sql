### Configuracion
    DROP DATABASE IF EXISTS realshoes;
    CREATE DATABASE realshoes;
    USE realshoes;
### Modulo Usuario
    ### Tablas

        ### Tabla rol, describe el rol del usuario.
            create table rol(
            rol_id int primary key auto_increment,
            nombre varchar(45),
            descripcion varchar(45),
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime
            );

        ### Tabla persona, almacena los datos de los usuarios.
            create table persona(
            persona_id int primary key auto_increment, 
            cedula int,
            nombre varchar(45),
            apellido varchar(45),
            direccion varchar(45),
            contraseña varchar(45),
            telefono varchar(15) UNIQUE,
            email varchar(45) UNIQUE,
            imagen varchar(255),
            rol_id int,
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime
            );

    ### Llaves foraneas
        alter table persona add constraint fk_persona_rol foreign key(rol_id) references  rol(rol_id);
    
    ### Datos 
        insert into rol (nombre, descripcion) values
            ('Administrador_ARP','Administrador root con todos los privilegios.'),
            ('Administrador_APM','Gerente.'),
            ('Empleado','Empleado de Real Shoes.'),
            ('Estándar','Cliente de Real Shoes');

        insert into persona(persona_id,nombre,apellido,direccion,contraseña,telefono,email,rol_id) values 
            (1022968811,'Omar Fernando','Bohorquez Preciado','Calle 5','1234','749-47-38792','ofbohorquez1@misena.edu.co',1),
            (1023976365,'Andres Felipe','Pulido Rios','Calle 6','1234','657-05-22070','andfpulido1@misena.edu.co',1),
            (1013594945,'Diego Alexander','Diaz Triana','Calle 7','1234','440-26-99791','diego.diaz949@misena.edu.co',1),
            (1012453759,'Deiver Giovanny','Morales Duarte','Calle 8','1234','932-90-80481','deiver.morales@misena.edu.co',1),
            (1022972233,'Jaime','Olaya Hernandez','Calle 9','1234','261-24-13860','jolaya3@misena.edu.co',1);
        
        insert into persona(persona_id,nombre,apellido,direccion,contraseña,telefono,email,rol_id) values 
            (1,'Gerente1','Prueba1','Calle 1','1234','777-89-97313','gerenteprueba@hotmail.com',2),
            (2,'Gerente2','Prueba2','Avenida Siempre viva','1234','189-97-48657','gerente2prueba@hotmail.com',2),
            (3,'Operador1','Prueba1','Calle 2','1234','963-86-36768','operadorprueba@hotmail.com',3),
            (4,'Operador2','Prueba2','Calle 3','1234','143-05-97333','operador2prueba@hotmail.com',3),
            (5,'Cliente1','Prueba1','Calle 4','1234','805-66-30405','clienteprueba@hotmail.com',4);
### Modulo Inventario
    ### Tablas

        ### Tabla productos, almacena la información de los productos.
        create table producto(
            producto_id int primary key auto_increment, 
            tipo varchar(45),
            descripcion varchar(255),
            marca varchar(45) , 
            coleccion varchar(45),
            genero varchar(45),
            talla int,
            unidades int unsigned,
            valor_compra float,
            valor_venta float,
            ganancia int,
            imagen varchar(255),
            inventario_id int,
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime
        );

        
        ### Tabla inventario, almacena el código y el nombre de la bodega.
        create table inventario(
            inventario_id int primary key auto_increment,
            bodega varchar(45)            
        );

    ### Llaves Foraneas 
        alter table producto add constraint fk_producto_inventario foreign key (inventario_id) references inventario(inventario_id);
    ### Datos
        ### Datos inventario
            insert into inventario(bodega) values ('Restrepo');
        ### Datos producto
            /* insert into producto(tipo,descripcion,marca,coleccion,genero,talla,unidades,valor_compra,valor_venta,inventario_id) values
            ('tipo_var','descripcion_var','marca_var','coleccion_var','genero_var',talla_int,unidades_int,valor_compra_float,valor_venta_float,ganancia_int,
            inventario_id_int);*/
### Modulo Venta 
   
    ### Tablas

        ### Tabla metodo_pago, almacena los diferentes metodos de pago aceptados por la organizacion.
        create table metodo_pago (
            metodo_pago_id int primary key, 
            tipo_pago varchar(45),
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime
        );

        ### Tabla persona_selecciona_producto, almacena el producto seleccionado por un usuario.    
        create table persona_selecciona_producto(
            persona_selecciona_producto_id int primary key auto_increment, 
            persona_id int, 
            producto_id int,
            cantidad int,
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime 
        );

        ###  Tabla pedido, almacena la lista de productos seleccionados por un usuario.
        create table pedido (   
            pedido_id int primary key auto_increment,
            cantidad int, 
            precio_unitario float,
            subtotal float,
            metodo_pago_id int, 
            persona_selecciona_producto_id int,
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime
        );

        ### Tabla factura, almacena los pedidos pagos.
        create table factura(
            factura_id int primary key auto_increment,
            pedido_id int,
            monto_total float,
            estado varchar(45),
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime
        );

    ### Llaves Foraneas
        alter table persona_selecciona_producto add constraint fk_persona_selecciona_producto_persona foreign key (persona_id) references persona(persona_id);
        alter table persona_selecciona_producto add constraint fk_persona_selecciona_producto_producto foreign key (producto_id) references producto(producto_id);
        alter table pedido add constraint fk_pedido_metodo_pago foreign key(metodo_pago_id) references metodo_pago(metodo_pago_id);
        alter table pedido add constraint fk_pedido_persona_selecciona_producto foreign key(persona_selecciona_producto_id) references persona_selecciona_producto(persona_selecciona_producto_id);
        alter table factura add constraint fk_factura_pedido foreign key(pedido_id) references pedido(pedido_id);
        
    ### Datos 
        ### Datos tabla metodo_pago
        insert into metodo_pago(metodo_pago_id,tipo_pago) values
            (1,'Efectivo'),
            (2,'Tarjeta Debito'),
            (3,'Tarjeta Crédito'),
            (4,'QR');


    

    
    

    
    