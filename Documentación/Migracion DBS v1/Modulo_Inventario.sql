use real_shoes;
### TABLAS
    ### TABLA TALLA, ALMACENA LAS TALLAS Y SU ORIGEN. 
    create table talla(
        talla_id int primary key auto_increment,
        pais_id int,
        numero int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );
    ### TABLA productoS, INFORMACIÓN SOBRE LOS productoS
    Create table producto(
        producto_id int(10) primary key auto_increment, 
        tipo varchar(45),
        marca varchar(45) , 
        coleccion_temporada varchar(45),
        genero varchar(45),
        valor_compra float,
        valor_venta float,
        talla_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );
    ### TABLA inventario, MUESTRA EL CODIGO DEL inventario Y SU RESPECTIVA SEDE.
    create table inventario(
        inventario_id int(10) primary key auto_increment, 
        sede_id int UNIQUE,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA contenido_inventario, ALMACENA LAS EXISTENCIAS DE UN RESPECTIVO inventario.
    create table contenido_inventario(
        contenido_inventario_id int primary key auto_increment,
        inventario_id int (10),
        producto_id int(10),
        stock int default 0,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime

    );

### TABLAS CON DATOS ANTIGUOS
    ### TABLA ANTIGUO_PERSONA, ALMACENA LOS DATOS ANTIGUOS DE LA TABLA productoS.
    Create table antiguo_producto(
        producto_id int(10) primary key auto_increment, 
        tipo varchar(45),
        marca varchar(45) , 
        coleccion_temporada varchar(45),
        genero varchar(45),
        valor_compra float,
        valor_venta float,
        talla_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### TABLA ANTIGUO_contenido_inventario, ALMACENA LOS DATOS ANTIGUOS DE LA TABLA contenido_inventario.
    create table antiguo_contenido_inventario(
        contenido_inventario_id int primary key auto_increment,
        inventario_id int (10),
        producto_id int(10),
        stock int default 0,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime

    );


### LLAVES FORANEAS

    alter table talla add constraint fk_talla_pais foreign key (pais_id) references pais(pais_id);

    alter table producto add constraint fk_producto_talla foreign key(talla_id) references talla(talla_id);

    alter table inventario add constraint fk_inventario_sede foreign key (sede_id) references sede(sede_id);

    alter table contenido_inventario add constraint fk_contenidoinventario_inventario foreign key (inventario_id) references inventario(inventario_id);
    alter table contenido_inventario add constraint fk_contenidoinventario_producto foreign key (producto_id) references producto(producto_id);

### LLAVES FORANEAS DATOS ANTIGUOS

    alter table antiguo_producto add constraint fk_antiguo_producto_talla foreign key(talla_id) references talla(talla_id);

    alter table antiguo_contenido_inventario add constraint fk_antiguo_contenido_inventario_inventario foreign key (inventario_id) references inventario(inventario_id);
    alter table antiguo_contenido_inventario add constraint fk_antiguo_contenido_inventario_producto foreign key (producto_id) references producto(producto_id);

### DATOS

    ### DATOS TALLA
    insert into talla (pais_id,numero) values 
        (41,38),
        (41,39),
        (41,40),
        (41,41),
        (60,38),
        (60,39),
        (60,40),
        (60,41),
        (59,38),
        (59,39),
        (59,40),
        (59,41);

    ### DATOS producto
    /* insert into producto(tipo,marca,coleccion_temporada,genero,valor_compra,valor_venta,talla_id) values
        ('Zapatilla','Adidas','Verano','Femenino',1,2,2),
        ('Tenis','Brahma','Verano','Masculino',1,2,3); */

    ### DATOS inventario
    insert into inventario(sede_id) values
        (1),
        (2);
    
### TRIGGERS
    /* TRIGGER QUE AÑADE AL contenido_inventario UN NUEVO producto REGISTRADO CON STOCK 0 */
        DROP TRIGGER if exists after_añadir_producto_insert_contenido_inventario;

        DELIMITER //

        CREATE TRIGGER after_añadir_producto_insert_contenido_inventario
        AFTER INSERT ON producto
        FOR EACH ROW
            BEGIN
                SET @inventarios = (SELECT COUNT(inventario_id) FROM inventario);
                SET @contador = 1;
                WHILE @contador <= @inventarios DO    
                    INSERT INTO contenido_inventario(inventario_id,producto_id) values (@contador,new.producto_id);
                    SET @contador = @contador + 1;
                END WHILE;
            END;
            //

        DELIMITER ;
    
    /* TRIGGER QUE INSERTA DATOS ANTIGUOS A LA TABLA ANTIGUO_producto, DESPUES DE UNA ACTUALIZACION 
    EN LA TABLA producto */

        DROP TRIGGER if exists after_update_producto

        DELIMITER //

        CREATE TRIGGER after_update_producto
        AFTER UPDATE ON producto
        FOR EACH ROW
            BEGIN 
                INSERT INTO antiguo_producto (producto_id,tipo,marca,coleccion_temporada,genero,valor_compra,valor_venta,talla_id,fecha_creacion,ultima_modificacion)
                    values(old.producto_id,old.tipo,marca,old.coleccion_temporada,old.genero,old.valor_compra,old.valor_venta,old.talla_id,old.fecha_creacion,now());
            END;
            //

        DELIMITER ;   

    /* TRIGGER QUE INSERTA DATOS ANTIGUOS A LA TABLA ANTIGUO_contenido_inventario, DESPUES DE UNA ACTUALIZACION
    EN LA TABLA contenido_inventario */     

        DROP TRIGGER if exists after_update_contenido_inventario

        DELIMITER //

        CREATE TRIGGER after_update_contenido_inventario
        AFTER UPDATE ON contenido_inventario
        FOR EACH ROW
            BEGIN
                INSERT INTO antiguo_contenido_inventario(inventario_id,producto_id,stock,fecha_creacion,ultima_modificacion)
                    values(old.inventario_id,old.producto_id,old.stock,old.fecha_creacion, now());
            END;
            //
        
        DELIMITER ;
    

### VISTAS
    /* VISTA QUE MUESTRA LOS productoS CON STOCK BAJO */
        CREATE OR REPLACE VIEW stock_bajo_vw AS 
         SELECT c.inventario_id AS Codigo_inventario,c.producto_id AS Codigo_producto, 
                    CONCAT(p.tipo," ", p.marca," ", p.coleccion_temporada," ", p.genero) AS producto,
                        pa.nombre AS Origen, t.numero AS Talla, c.stock  
                            FROM contenido_inventario AS c
                                INNER JOIN producto AS p ON
                                 c.producto_id = p.producto_id
                                    INNER JOIN talla AS t ON
                                        t.talla_id = p.talla_id
                                            INNER JOIN pais AS pa ON
                                                pa.pais_id = t.pais_id
                                                    WHERE c.stock <= 3 AND c.stock > 0;
    /* VISTA QUE MUESTRA LOS productoS CON STOCK 0 */
        CREATE OR REPLACE VIEW stock_cero_vw AS 
         SELECT c.inventario_id AS Codigo_inventario,c.producto_id AS Codigo_producto, 
                    CONCAT(p.tipo," ", p.marca," ", p.coleccion_temporada," ", p.genero) AS producto,
                        pa.nombre AS Origen, t.numero AS Talla, c.stock  
                            FROM contenido_inventario AS c
                                INNER JOIN producto AS p ON
                                 c.producto_id = p.producto_id
                                    INNER JOIN talla AS t ON
                                        t.talla_id = p.talla_id
                                            INNER JOIN pais AS pa ON
                                                pa.pais_id = t.pais_id
                                                 WHERE c.stock = 0;
    /* VISTA QUE MUESTRA LOS productoS QUE CAMBIARON DE PRECIO */
        CREATE OR REPLACE VIEW variacion_precios_vw AS
            SELECT p.producto_id, CONCAT(p.tipo," ", p.marca," ", p.coleccion_temporada," ", p.genero) AS producto,
                    a.valor_venta AS Precio_Anterior, p.valor_venta AS Precio_Actual, 
                        a.ultima_modificacion AS Fecha_Modificacion 
                            FROM producto AS p
                                INNER JOIN antiguo_producto AS a ON
                                    p.producto_id = a.producto_id
                                        ORDER BY a.ultima_modificacion DESC;
                    
    



