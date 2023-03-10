use real_shoes;

SET FOREIGN_KEY_CHECKS = 0;

truncate pais; 
truncate ciudad;
truncate factura;
truncate inventario;
truncate metodo_pago;
truncate pedido; 
truncate persona;
truncate persona_producto;
truncate persona_trabaja_sede;
truncate producto;
truncate rol;
truncate sede;
truncate talla;
truncate tipo_doc;
truncate tipo_persona;
truncate contenido_inventario;

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

### DATOS TABLAS
### DATOS ROL
insert into rol (nombre, descripcion) values
    ('Administrador_ARP','Administrador root con todos los privilegios.'),
    ('Administrador_APM','Administrador privilegios medios.'),
    ('Gerente','Usuario con vistas privilegiadas.'),
    ('Operador','Empleado de Real Shoes.'),
    ('Proveedor','Aliados estratégicos de Real Shoes.'),
    ('Cliente','Cliente de Real Shoes');

## DATOS TIPO DOC
insert into tipo_doc (nombre, descripcion) values
    ('Cédula Ciudadanía','Id Colombianos mayores de 18 años.'),
    ('Tarjeta Identidad','Id Colombianos menores de 18 años.'),
    ('Cédula Extranjería','Id expedida por Migración Colombia.'),
    ('Permiso Especial Permanencia','Id para los nacionales Venezolanos.'),
    ('Registro Civil','Doc detallado de hechos relativos al id.');

### DATOS TIPO PERSONA
insert into tipo_persona (nombre,descripcion) values 
    ('Natural', 'Todos los individuos de la especie humana.'),
    ('Jurídica', 'Org. formada por varias personas físicas.');

### DATOS PERSONA con datos del equipo de desarrollo
insert into persona(Persona_Id,nombre,apellidos,usuario,contraseña,email,Tipo_doc_id,Tipo_persona_id,rol_id) values 
    (1022968811,'Omar Fernando','Bohorquez Preciado','ofbohorquez1','1234','ofbohorquez1@misena.edu.co',1,1,1),
    (1023976365,'Andres Felipe','Pulido Rios','andfpulido1','1234','andfpulido1@misena.edu.co',1,1,2),
    (1013594945,'Diego Alexander','Diaz Triana','diego.diaz949','1234','diego.diaz949@misena.edu.co',1,1,2),
    (1012453759,'Deiver Giovanny','Morales Duarte','deiver.morales','1234','deiver.morales@misena.edu.co',1,1,2),
    (1022972233,'Jaime','Olaya Hernandez','jolaya3','1234','jolaya3@misena.edu.co',1,1,2);

insert into persona(Persona_Id,nombre,apellidos,usuario,contraseña,email,Tipo_doc_id,Tipo_persona_id,rol_id) values 
    (1,'Gerente1','Prueba1','gerenteprueba','1234','gerenteprueba@hotmail.com',1,1,3),
    (2,'Operador1','Prueba1','operadorprueba','1234','operadorprueba@hotmail.com',1,1,4),
    (3,'Proveedor1','Prueba1','proveedorprueba','1234','proveedorprueba@hotmail.com',1,2,5),
    (4,'Cliente1','Prueba1','clienteprueba','1234','clienteprueba@hotmail.com',1,2,6);

### Datos tabla sede
insert into sede(nombre,ciudad_id) values
    ('Restrepo',4),
    ('Venecia',4);


### DATOS PERSONA SEDE
insert into Persona_trabaja_sede(Persona_Id,Sede_Id)values 
    (1,2),
    (2,1),
    (3,2);

### Datos tabla Metodo de pago
insert into Metodo_pago(Metodo_pago_Id,Tipo_pago) values
    (1,'Efectivo'),
    (2,'Tarjeta Debito'),
    (3,'Tarjeta Crédito'),
    (4,'QR');

### DATOS TALLA
insert into talla (origen_talla,numero) values 
    ("nacional",38),
    ("nacional",39),
    ("nacional",40),
    ("nacional",41),
    ("USA",38),
    ("USA",39),
    ("USA",40),
    ("USA",41),
    ("Europea",38),
    ("Europea",39),
    ("Europea",40),
    ("Europea",41);


### DATOS PRODUCTO
insert into producto(tipo,Marca,Coleccion_temporada,genero,Valor_Compra,Valor_Venta,talla_id) values
    ('Zapatilla','Adidas','Verano','Femenino',1,2,2),
    ('Tenis','Brahma','Verano','Masculino',1,2,3);


### DATOS INVENTARIO
insert into inventario(Sede_Id) values
    (1),
    (2);

/* INSERT INTO persona_producto(Persona_id,Producto_id) values (1,1);
INSERT INTO pedido(Tipo_factura,cantidad,metodo_pago_id,persona_producto_id) values ('COMPRA',10,2,1);
INSERT INTO factura(pedido_id) values (1);

INSERT INTO persona_producto(Persona_id,Producto_id,Tipo_Factura) values (1,1,1);
INSERT INTO pedido(cantidad,metodo_pago_id,persona_producto_id) values (10,2,1);
INSERT INTO factura(pedido_id) values (1);*/
SET FOREIGN_KEY_CHECKS = 1;