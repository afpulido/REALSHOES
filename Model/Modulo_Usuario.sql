###Base de datos Real_Shoes

Drop Database if exists real_shoes;
create Database real_shoes;
use real_shoes;

### TABLAS
    
    ### TABLA PAIS, ALMACENA LOS DATOS DE LOS PAISES.
    create table pais(
        pais_id int primary key auto_increment,
        nombre varchar(45),
        capital varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ## TABLA CIUDAD, ALMACENA LOS DATOS DE LAS CIUDADES.
    create table ciudad(
        ciudad_id int primary key auto_increment,
        nombre varchar(45),
        pais_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA ROL, DESCRIBE EL ROL DEL USUARIO.
    create table rol(
        rol_id int(2) primary key auto_increment,
        nombre varchar(45),
        descripcion varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime

    );

    ### TABLA TIPO DOC, DESCRIBE EL DOCUMENTO DEL USUARIO.
    create table tipo_doc(
        tipo_doc_id int(2) primary key auto_increment,
        nombre varchar(45),
        descripcion varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA TIPO persona DESCRIBE EL TIPO DE USUARIO (natural, jurídico, proveedor).
    create table tipo_persona(
        tipo_persona_id int(2) primary key auto_increment,
        nombre varchar(45),
        descripcion  varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    ); 

    ### TABLA persona, ALMACENA LOS DATOS DE LOS USUARIOS.
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
        tipo_persona_id int,
        rol_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA SEDE, DESCRIBE LAS SEDES DE LA ORGANIZACIÓN.
    create table sede (
        sede_id int primary key auto_increment,
        nombre varchar(45),
        direccion varchar(45),
        telefono varchar(45),
        email varchar(45),
        ciudad_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA persona TRABAJA SEDE, ALMACENA LOS EMPLEADOS DE UNA SEDE.
    create table persona_trabaja_sede(
        persona_sede_id int primary key auto_increment,
        persona_id int,
        sede_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

### TABLAS CON DATOS ANTIGUOS

    ### TABLA persona, ALMACENA LOS DATOS ANTIGUOS DE LOS USUARIOS.
    create table antiguo_persona(
        id int primary key auto_increment,
        persona_id int, 
        nombre varchar(45),
        apellidos varchar(45),
        direccion varchar(45),
        usuario varchar(45),
        contraseña varchar(45),
        telefono varchar(15),
        email varchar(45),
        tipo_doc_id int,
        tipo_persona_id int,
        rol_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA persona TRABAJA SEDE, ALMACENA LA ANTERIOR SEDE DE UN EMPLEADO.
    create table antiguo_persona_trabaja_sede(
        persona_sede_id int primary key auto_increment,
        persona_id int,
        sede_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

### LLAVES FORANEAS

    alter table ciudad add constraint fk_ciudad_pais foreign key (pais_id) references pais(pais_id);

    alter table persona add constraint fk_persona_rol foreign key(rol_id) references  rol(rol_id);
    alter table persona add constraint fk_persona_tipo_persona foreign key(tipo_persona_id) references  tipo_persona(tipo_persona_id);
    alter table persona add constraint fk_persona_tipo_doc foreign key(tipo_doc_id) references  tipo_doc(tipo_doc_id);

    alter table sede add constraint fk_sede_ciudad foreign key (ciudad_id) references ciudad(ciudad_id);

    alter table persona_trabaja_sede add constraint fk_persona_trabaja_sede_sede foreign key (sede_id) references sede(sede_id);

### LLAVES FORANEAS DATOS ANTIGUOS

    alter table antiguo_persona add constraint fk_antiguo_persona_rol foreign key(rol_id) references  rol(rol_id);
    alter table antiguo_persona add constraint fk_antiguo_persona_tipo_persona foreign key(tipo_persona_id) references  tipo_persona(tipo_persona_id);
    alter table antiguo_persona add constraint fk_antiguo_persona_tipo_doc foreign key(tipo_doc_id) references  tipo_doc(tipo_doc_id);

    alter table antiguo_persona_trabaja_sede add constraint fk_antiguo_persona_trabaja_sede_sede foreign key (sede_id) references sede(sede_id);

### DATOS

    insert into pais(nombre,capital) values
        ("Afganistán","Kabul"),
        ("Albania","Tirana"),
        ("Alemania","Berlín"),
        ("Andorra","Andorra la Vieja"),
        ("Angola","Luanda"),
        ("Antigua y Barbuda","Saint John"),
        ("Arabia Saudita","Riad"),
        ("Argelia","Argel"),
        ("Argentina","Buenos Aires"),
        ("Armenia","Ereván"),
        ("Australia","Canberra"),
        ("Austria","Viena"),
        ("Azerbaiyán","Bakú"),
        ("Bahamas","Nasáu"),
        ("Bangladés","Daca"),
        ("Barbados","Bridgetown"),
        ("Baréin","Manama"),
        ("Bélgica","Bruselas"),
        ("Belice","Belmopán"),
        ("Benín","Porto-Novo"),
        ("Bielorrusia","Minsk"),
        ("Birmania","Naipyidó"),
        ("Bolivia","Sucre"),
        ("Bosnia-Herzegovina","Sarajevo"),
        ("Botsuana","Gaborone"),
        ("Brasil","Brasilia"),
        ("Brunéi","Bandar Seri Begawan"),
        ("Bulgaria","Sofía"),
        ("Burkina Faso","Uagadugú"),
        ("Burundi","Buyumbura"),
        ("Bután","Thimphu"),
        ("Cabo Verde","Praia"),
        ("Camboya","Nom Pen"),
        ("Camerún","Yaundé"),
        ("Canadá","Ottawa"),
        ("Catar","Doha"),
        ("Chad","Yamena"),
        ("Chile","Santiago"),
        ("China","Pekín"),
        ("Chipre","Nicosia"),
        ("Colombia","Bogotá"),
        ("Comoras","Moroni"),
        ("Congo","Brazzaville"),
        ("Corea del Norte","Pionyang"),
        ("Corea del Sur","Seúl"),
        ("Costa de Marfil","Yamusukro"),
        ("Costa Rica","San José"),
        ("Croacia","Zagreb"),
        ("Cuba","La Habana"),
        ("Dinamarca","Copenhague"),
        ("Dominica","Roseau"),
        ("Ecuador","Quito"),
        ("Egipto","El Cairo"),
        ("El Salvador","San Salvador"),
        ("Emiratos Árabes Unidos","Abu Dabi"),
        ("Eritrea","Asmara"),
        ("Eslovaquia","Bratislava"),
        ("Eslovenia","Liubliana"),
        ("España","Madrid"),
        ("Estados Unidos","Washington D. C."),
        ("Estonia","Tallin"),
        ("Esuatini","Mbabane"),
        ("Etiopía","Adís Abeba"),
        ("Filipinas","Manila"),
        ("Finlandia","Helsinki"),
        ("Fiyi","Suva"),
        ("Francia","París"),
        ("Gabón","Libreville"),
        ("Gambia","Banjul"),
        ("Georgia","Tiflis"),
        ("Ghana","Accra"),
        ("Granada","Saint George"),
        ("Grecia","Atenas"),
        ("Guatemala","Guatemala"),
        ("Guinea","Conakri"),
        ("Guinea Ecuatorial","Malabo"),
        ("Guinea-Bisáu","Bisáu"),
        ("Guyana","Georgetown"),
        ("Haití","Puerto Príncipe"),
        ("Honduras","Tegucigalpa"),
        ("Hungría","Budapest"),
        ("India","Nueva Delhi"),
        ("Indonesia","Yakarta"),
        ("Irak","Bagdad"),
        ("Irán","Teherán"),
        ("Irlanda","Dublín"),
        ("Islandia","Reikiavik"),
        ("Islas Marshall","Majuro"),
        ("Islas Salomón","Honiara"),
        ("Israel","Jerusalén"),
        ("Italia","Roma"),
        ("Jamaica","Kingston"),
        ("Japón","Tokio"),
        ("Jordania","Amán"),
        ("Kazajistán","Astaná"),
        ("Kenia","Nairobi"),
        ("Kirguistán","Biskek"),
        ("Kiribati","Tarawa"),
        ("Kosovo","Pristina"),
        ("Kuwait","Kuwait City"),
        ("Laos","Vientián"),
        ("Lesoto","Maseru"),
        ("Letonia","Riga"),
        ("Líbano","Beirut"),
        ("Liberia","Monrovia"),
        ("Libia","Trípoli"),
        ("Liechtenstein","Vaduz"),
        ("Lituania","Vilna"),
        ("Luxemburgo","Luxemburgo"),
        ("Macedonia del Norte","Skopie"),
        ("Madagascar","Antananarivo"),
        ("Malasia","Kuala Lumpur"),
        ("Malaui","Lilongüe"),
        ("Maldivas","Malé"),
        ("Malí","Bamako"),
        ("Malta","La Valeta"),
        ("Marruecos","Rabat"),
        ("Mauricio","Port Louis"),
        ("Mauritania","Nuakchot"),
        ("México","México"),
        ("Micronesia","Palikir"),
        ("Moldavia","Chisináu"),
        ("Mónaco","Mónaco"),
        ("Mongolia","Ulán Bator"),
        ("Montenegro","Podgorica"),
        ("Mozambique","Maputo"),
        ("Namibia","Windhoek"),
        ("Nauru","Yaren"),
        ("Nepal","Katmandú"),
        ("Nicaragua","Managua"),
        ("Níger","Niamey"),
        ("Nigeria","Abuya"),
        ("Noruega","Oslo"),
        ("Nueva Zelanda","Wellington"),
        ("Omán","Mascate"),
        ("Países Bajos","Ámsterdam"),
        ("Pakistán","Islamabad"),
        ("Palaos","Melekeok"),
        ("Palestina","Jerusalén Este"),
        ("Panamá","Panamá"),
        ("Papúa Nueva Guinea","Puerto Moresby"),
        ("Paraguay","Asunción"),
        ("Perú","Lima"),
        ("Polonia","Varsovia"),
        ("Portugal","Lisboa"),
        ("Reino Unido","Londres"),
        ("República Centroafricana","Bangui"),
        ("República Checa","Praga"),
        ("República Democrática del Congo","Kinsasa"),
        ("República Dominicana","Santo Domingo"),
        ("Ruanda","Kigali"),
        ("Rumania","Bucarest"),
        ("Rusia","Moscú"),
        ("Samoa","Apia"),
        ("San Cristóbal y Nieves","Basseterre"),
        ("San Marino","San Marino"),
        ("San Vicente y las Granadinas","Kingstown"),
        ("Santa Lucía","Castries"),
        ("Santo Tomé y Príncipe","Santo Tomé"),
        ("Senegal","Dakar"),
        ("Serbia","Belgrado"),
        ("Seychelles","Victoria"),
        ("Sierra Leona","Freetown"),
        ("Singapur","Singapur"),
        ("Siria","Damasco"),
        ("Somalia","Mogadiscio"),
        ("Sri Lanka","Sri Jayawardenapura Kotte"),
        ("Sudáfrica","Pretoria"),
        ("Sudán","Jartum"),
        ("Sudán del Sur","Yuba"),
        ("Suecia","Estocolmo"),
        ("Suiza","Berna"),
        ("Surinam","Paramaribo"),
        ("Tailandia","Bangkok"),
        ("Taiwán","Taipéi"),
        ("Tanzania","Dodoma"),
        ("Tayikistán","Dusambé"),
        ("Timor Oriental","Dili"),
        ("Togo","Lomé"),
        ("Tonga","Nukualofa"),
        ("Trinidad y Tobago","Puerto España"),
        ("Túnez","Túnez"),
        ("Turkmenistán","Asjabad"),
        ("Turquía","Ankara"),
        ("Tuvalu","Funafuti"),
        ("Ucrania","Kiev"),
        ("Uganda","Kampala"),
        ("Uruguay","Montevideo"),
        ("Uzbekistán","Taskent"),
        ("Vanuatu","Port Vila"),
        ("Vaticano","Vaticano"),
        ("Venezuela","Caracas"),
        ("Vietnam","Hanói"),
        ("Yemen","Saná"),
        ("Yibuti","Yibuti"),
        ("Zambia","Lusaka"),
        ("Zimbabue","Harare");

    insert into ciudad (nombre,pais_id) values 
        ("Arauca",41),
        ("Armenia",41),
        ("Barranquilla",41),
        ("Bogotá",41),
        ("Bucaramanga",41),
        ("Cali",41),
        ("Cartagena de Indias",41),
        ("Florencia",41),
        ("Ibagué",41),
        ("Inírida",41),
        ("Leticia",41),
        ("Manizales",41),
        ("Medellín",41),
        ("Mitú",41),
        ("Mocoa",41),
        ("Montería",41),
        ("Neiva",41),
        ("Pereira",41),
        ("Popayán",41),
        ("Puerto Carreño",41),
        ("Quibdó",41),
        ("Riohacha",41),
        ("San Andrés",41),
        ("San José de Cúcuta",41),
        ("San José del Guaviare",41),
        ("San Juan de Pasto",41),
        ("Santa Marta",41),
        ("Sincelejo",41),
        ("Tunja",41),
        ("Valledupar",41),
        ("Villavicencio",41),
        ("Yopal",41);

    insert into rol (nombre, descripcion) values
        ('Administrador_ARP','Administrador root con todos los privilegios.'),
        ('Administrador_APM','Administrador privilegios medios.'),
        ('Gerente','Usuario con vistas privilegiadas.'),
        ('Operador','Empleado de Real Shoes.'),
        ('Cliente','Cliente de Real Shoes');

    insert into tipo_doc (nombre, descripcion) values
        ('Cédula Ciudadanía','Id Colombianos mayores de 18 años.'),
        ('Tarjeta Identidad','Id Colombianos menores de 18 años.'),
        ('Cédula Extranjería','Id expedida por Migración Colombia.'),
        ('Permiso Especial Permanencia','Id para los nacionales Venezolanos.'),
        ('Registro Civil','Doc detallado de hechos relativos al id.');

    insert into tipo_persona (nombre,descripcion) values 
        ('Natural', 'Todos los individuos de la especie humana.'),
        ('Jurídica', 'Org. formada por varias personas físicas.');

    insert into persona(persona_id,nombre,apellidos,usuario,contraseña,email,tipo_doc_id,tipo_persona_id,rol_id) values 
        (1022968811,'Omar Fernando','Bohorquez Preciado','ofbohorquez1','1234','ofbohorquez1@misena.edu.co',1,1,1),
        (1023976365,'Andres Felipe','Pulido Rios','andfpulido1','1234','andfpulido1@misena.edu.co',1,1,2),
        (1013594945,'Diego Alexander','Diaz Triana','diego.diaz949','1234','diego.diaz949@misena.edu.co',1,1,2),
        (1012453759,'Deiver Giovanny','Morales Duarte','deiver.morales','1234','deiver.morales@misena.edu.co',1,1,2),
        (1022972233,'Jaime','Olaya Hernandez','jolaya3','1234','jolaya3@misena.edu.co',1,1,2);

    insert into persona(persona_id,nombre,apellidos,usuario,contraseña,email,tipo_doc_id,tipo_persona_id,rol_id) values 
        (1,'Gerente1','Prueba1','gerenteprueba','1234','gerenteprueba@hotmail.com',1,1,3),
        (2,'Gerente2','Prueba2','gerente2prueba','1234','gerente2prueba@hotmail.com',1,1,3),
        (3,'Operador1','Prueba1','operadorprueba','1234','operadorprueba@hotmail.com',1,1,4),
        (4,'Operador2','Prueba2','operador2prueba','1234','operador2prueba@hotmail.com',1,1,4),
        (5,'Cliente1','Prueba1','clienteprueba','1234','clienteprueba@hotmail.com',1,2,5);

    insert into sede(nombre,ciudad_id) values
        ('Restrepo',4),
        ('Venecia',4);

    insert into Persona_trabaja_sede(persona_id,sede_id)values 
        (1,1),
        (2,2),
        (3,1),
        (4,2);

### TRIGGERS

    /* TRIGGER QUE INSERTA DATOS ANTIGUOS A LA TABLA ANTIGUO_PERSONA, DESPUES
    DE UNA ACTUALIZACION EN LA TABLA PERSONA */
        DROP TRIGGER if exists after_update_datos_persona

        DELIMITER //
        CREATE TRIGGER after_update_datos_persona
        AFTER UPDATE on persona 
        FOR EACH ROW 
            BEGIN
                INSERT INTO antiguo_persona(persona_id,nombre,apellidos,direccion,usuario,contraseña,telefono,email,tipo_doc_id,tipo_persona_id,rol_id,fecha_creacion,ultima_modificacion)
                    values(old.persona_id,old.nombre,old.apellidos,old.direccion,old.usuario,old.contraseña,old.telefono,old.email,old.tipo_doc_id,old.tipo_persona_id,old.rol_id,old.fecha_creacion,now());      
            END;
            //
        DELIMITER ;

    /* TRIGGER QUE INSERTA SEDE ANTIGUA DE UN EMPLEADO A LA TABLA ANTIGUO_PERSONA_TRABAJA_SEDE, DESPUES
    DE UNA ACTUALIZACION EN LA TABLA PERSONA_TRABAJA_SEDE */
        DROP TRIGGER if exists after_update_sede_empleado

        DELIMITER //
        CREATE TRIGGER after_update_sede_empleado
        AFTER UPDATE on persona_trabaja_sede
        FOR EACH ROW 
            BEGIN
                INSERT INTO antiguo_persona_trabaja_sede(persona_id,sede_id,fecha_creacion,ultima_modificacion)
                    values(old.persona_id,old.sede_id,old.fecha_creacion,now());
            END;
            //
        DELIMITER ;