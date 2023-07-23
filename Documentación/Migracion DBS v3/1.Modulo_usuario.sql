### Configuracion
    DROP DATABASE IF EXISTS NewVersion;
    CREATE DATABASE NewVersion;
    USE NewVersion;

### Tablas

    ### Tabla rol, describe el rol del usuario.
    create table rol(
        rol_id int(2) primary key auto_increment,
        nombre varchar(45),
        descripcion varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### Tabla tipo documento, describe el documento del usuario.
    create table tipo_doc(
        tipo_doc_id int(2) primary key auto_increment,
        nombre varchar(45),
        descripcion varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### Tabla persona, almacena los datos de los usuarios.
        create table persona(
        id int primary key auto_increment,
        persona_id int NOT NULL UNIQUE, 
        nombre varchar(45),
        apellidos varchar(45),
        direccion varchar(45),
        usuario varchar(45) UNIQUE,
        contraseña varchar(45),
        telefono varchar(15) UNIQUE,
        email varchar(45) UNIQUE,
        tipo_doc_id int,
        rol_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

### Llaves foraneas
    alter table persona add constraint fk_persona_rol foreign key(rol_id) references  rol(rol_id);
    alter table persona add constraint fk_persona_tipo_doc foreign key(tipo_doc_id) references  tipo_doc(tipo_doc_id);
   
### Datos 
     insert into rol (nombre, descripcion, created_at,updated_at) values
        ('Administrador_ARP','Administrador root con todos los privilegios.',NOW(),NOW()),
        ('Administrador_APM','Administrador privilegios medios.',NOW(),NOW()),
        ('Gerente','Usuario con vistas privilegiadas.',NOW(),NOW()),
        ('Operador','Empleado de Real Shoes.',NOW(),NOW()),
        ('Cliente','Cliente de Real Shoes',NOW(),NOW());
    
    
    insert into tipo_doc (nombre, descripcion, created_at,updated_at) values
        ('Cédula Ciudadanía','Id Colombianos mayores de 18 años.',NOW(),NOW()),
        ('Tarjeta Identidad','Id Colombianos menores de 18 años.',NOW(),NOW()),
        ('Cédula Extranjería','Id expedida por Migración Colombia.',NOW(),NOW()),
        ('Permiso Especial Permanencia','Id para los nacionales Venezolanos.',NOW(),NOW()),
        ('Registro Civil','Doc detallado de hechos relativos al id.',NOW(),NOW());

    insert into persona(persona_id,nombre,apellidos,direccion,usuario,contraseña,telefono,email,tipo_doc_id,rol_id) values 
        (1022968811,'Omar Fernando','Bohorquez Preciado','Calle 5','ofbohorquez1','1234','749-47-38792','ofbohorquez1@misena.edu.co',1,1),
        (1023976365,'Andres Felipe','Pulido Rios','Calle 6','andfpulido1','1234','657-05-22070','andfpulido1@misena.edu.co',1,2),
        (1013594945,'Diego Alexander','Diaz Triana','Calle 7','diego.diaz949','1234','440-26-99791','diego.diaz949@misena.edu.co',1,2),
        (1012453759,'Deiver Giovanny','Morales Duarte','Calle 8','deiver.morales','1234','932-90-80481','deiver.morales@misena.edu.co',1,2),
        (1022972233,'Jaime','Olaya Hernandez','Calle 9','jolaya3','1234','261-24-13860','jolaya3@misena.edu.co',1,2);
    
    insert into persona(persona_id,nombre,apellidos,direccion,usuario,contraseña,telefono,email,tipo_doc_id,rol_id) values 
        (1,'Gerente1','Prueba1','Calle 1','gerenteprueba','1234','777-89-97313','gerenteprueba@hotmail.com',1,3),
        (2,'Gerente2','Prueba2','Avenida Siempre viva','gerente2prueba','1234','189-97-48657','gerente2prueba@hotmail.com',1,3),
        (3,'Operador1','Prueba1','Calle 2','operadorprueba','1234','963-86-36768','operadorprueba@hotmail.com',1,4),
        (4,'Operador2','Prueba2','Calle 3','operador2prueba','1234','143-05-97333','operador2prueba@hotmail.com',1,4),
        (5,'Cliente1','Prueba1','Calle 4','clienteprueba','1234','805-66-30405','clienteprueba@hotmail.com',1,5);

    
