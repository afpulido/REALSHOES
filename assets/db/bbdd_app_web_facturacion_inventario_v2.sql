### Configuracion
    DROP DATABASE IF EXISTS realshoes;
    CREATE DATABASE realshoes;
    USE realshoes;
### Modulo Usuario
    ### Tablas

        ### Tabla rol, describe el rol del usuario.
            create table roles(
            rol_id int primary key auto_increment,
            nombre varchar(45),
            descripcion varchar(255),
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime
            );

        ### Tabla persona, almacena los datos de los usuarios.
            create table personas(
                persona_id int primary key auto_increment, 
                cedula int,
                nombre varchar(45),
                apellido varchar(45),
                direccion varchar(45),
                contrasena varchar(255),
                telefono varchar(15),
                email varchar(60),
                imagen varchar(255),
                rol_id int,
                fecha_creacion datetime default current_timestamp,
                ultima_modificacion datetime default current_timestamp,
                fecha_eliminaciondesactivacion datetime
            );

    ### Llaves foraneas
        alter table persona add constraint fk_persona_rol foreign key(rol_id) references  rol(rol_id);
    
    ### Datos 
        insert into roles (nombre, descripcion,fecha_creacion, ultima_modificacion, fecha_eliminaciondesactivacion) values
            ('Administrador_ARP','Administrador root con todos los privilegios.',NOW(),NOW(), NULL),
            ('Administrador_APM','Gerente.',NOW(),NOW(), null),
            ('Empleado','Empleado de Real Shoes.',NOW(),NOW(), null),
            ('Estándar','Cliente de Real Shoes.',NOW(),NOW(), null),
            ('Cliente','Cliente de Real Shoes',NOW(),NOW(), NULL),
			('Proveedor','Proveedor de Real Shoes',NOW(),NOW(), null);

        /* insert into persona(persona_id,nombre,apellido,direccion,contraseña,telefono,email,rol_id) values 
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
            (5,'Cliente1','Prueba1','Calle 4','1234','805-66-30405','clienteprueba@hotmail.com',4); */
### Modulo Inventario
    ### Tablas

        ### Tabla productos, almacena la información de los productos.
        create table productos(
            producto_id int primary key auto_increment, 
            nombre varchar(45),
            descripcion VARCHAR(255),
            tipo varchar(45),
            marca varchar(45) , 
            coleccion varchar(45),
            genero varchar(45),
            talla int,
            unidades int,
            valor_compra float,
            ganancia float,
            valor_venta float,
            imagen1 varchar(255),
            imagen2 varchar(255),
            imagen3 varchar(255),
            imagen4 varchar(255),
            inventario_id int,
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime
        );

        
        ### Tabla inventario, almacena el código y el nombre de la bodega.
        create table inventarios(
            inventario_id int primary key auto_increment,
            bodega varchar(45),
            descripcion varchar(100),
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime
            );

    ### Llaves Foraneas 
        alter table producto add constraint fk_producto_inventario foreign key (inventario_id) references inventario(inventario_id);
    ### Datos
        ### Datos inventario
            insert into inventario(bodega) values ('Restrepo', NOW(),NOW(), null );
        ### Datos producto
            /* insert into producto(tipo,descripcion,marca,coleccion,genero,talla,unidades,valor_compra,valor_venta,inventario_id) values
            ('tipo_var','descripcion_var','marca_var','coleccion_var','genero_var',talla_int,unidades_int,valor_compra_float,valor_venta_float,ganancia_int,
            inventario_id_int);*/
### Modulo Venta 
   
    ### Tablas

        ### Tabla metodo_pago, almacena los diferentes metodos de pago aceptados por la organizacion.
        /* create table metodo_pago (
            metodo_pago_id int primary key, 
            tipo_pago varchar(45),
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime
        ); */

        ### Tabla persona_selecciona_producto, almacena el producto seleccionado por un usuario.    
        create table persona_selecciona_productos(
            persona_selecciona_producto_id int primary key auto_increment, 
            persona_id int, 
            producto_id int,
	        pedido_id int,
            cantidad int,
	        precio_unitario float
            fecha_creacion datetime default current_timestamp,
            ultima_modificacion datetime default current_timestamp,
            fecha_eliminaciondesactivacion datetime 
        );

        ###  Tabla pedido, almacena la lista de productos seleccionados por un usuario.
        create table pedidos (   
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
        create table facturas(
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
        /* alter table pedido add constraint fk_pedido_metodo_pago foreign key(metodo_pago_id) references metodo_pago(metodo_pago_id); */
        alter table pedido add constraint fk_pedido_persona_selecciona_producto foreign key(persona_selecciona_producto_id) references persona_selecciona_producto(persona_selecciona_producto_id);
        alter table factura add constraint fk_factura_pedido foreign key(pedido_id) references pedido(pedido_id);
        
    ### Datos 
        ### Datos tabla metodo_pago
       /*  insert into metodo_pago(metodo_pago_id,tipo_pago) values
            (1,'Efectivo'),
            (2,'Tarjeta Debito'),
            (3,'Tarjeta Crédito'),
            (4,'QR'); */


    
####################################################
## consultas especiales                           ##
####################################################   
###    
SELECT COUNT(persona_selecciona_producto_id) as Nproducto 
FROM persona_selecciona_productos 
WHERE pedido_id = 1

###
SELECT ped.pedido_id, ped.cantidad,ped.subtotal, psp.producto_id, psp.persona_id, 
	FROM pedidos AS ped
		right JOIN persona_selecciona_productos AS psp AND facturas AS f
			ON ped.pedido_id = psp.pedido_id
			ON ped.pedido_id = f.pedido_id
			


#llamar todos los datos de una factura
SELECT 
	facturas.factura_id,
	pedidos.pedido_id, pedidos.cantidad, pedidos.subtotal, pedidos.metodo_pago_id,
	persona_selecciona_productos.precio_unitario,
	personas.persona_id, personas.cedula, personas.nombre, personas.apellido, personas.direccion, personas.email,
	productos.producto_id, productos.nombre, productos.descripcion
	
	FROM 
		persona_selecciona_productos
	INNER JOIN
		pedidos
	ON   pedidos.pedido_id = persona_selecciona_productos.pedido_id
	
	left JOIN 
		personas
	ON personas.persona_id = persona_selecciona_productos.persona_id
	
	LEFT JOIN 
		productos
	ON productos.producto_id = persona_selecciona_productos.producto_id
	
	LEFT join
		facturas
	ON facturas.pedido_id = pedidos.pedido_id
	
	WHERE facturas.factura_id =4

##mostrar toda una factura
SELECT 
	facturas.factura_id,
	pedidos.pedido_id, pedidos.cantidad, pedidos.subtotal, pedidos.metodo_pago_id,
	persona_selecciona_productos.precio_unitario,
	personas.persona_id, personas.cedula, personas.nombre, personas.apellido, personas.direccion, personas.email,
	productos.producto_id, productos.nombre, productos.descripcion
	
	FROM 
		persona_selecciona_productos
	INNER JOIN
		pedidos
	ON   pedidos.pedido_id = persona_selecciona_productos.pedido_id
	
	left JOIN 
		personas
	ON personas.persona_id = persona_selecciona_productos.persona_id
	
	LEFT JOIN 
		productos
	ON productos.producto_id = persona_selecciona_productos.producto_id
	
	LEFT join
		facturas
	ON facturas.pedido_id = pedidos.pedido_id
	
	ORDER BY facturas.pedido_id desc


### mostrar siguiente id de pedido
SELECT pedido_id +1 AS pedido_id 
	FROM pedidos 
	ORDER BY pedido_id DESC LIMIT 1;
	
    
    