use real_shoes;
### TABLAS
    ### TABLA TALLA, ALMACENA LAS TALLAS Y SU ORIGEN. 
    create table talla(
        Talla_Id int primary key auto_increment,
        pais_id int,
        numero int,
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

    ### TABLA CONTENIDO_INVENTARIO, ALMACENA LAS EXISTENCIAS DE UN RESPECTIVO INVENTARIO.
    create table Contenido_inventario(
        Contenido_inventario_Id int primary key auto_increment,
        Inventario_Id int (10),
        Producto_Id int(10),
        stock int default 0,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime

    );

### TABLAS CON DATOS ANTIGUOS
    ### TABLA ANTIGUO_PERSONA, ALMACENA LOS DATOS ANTIGUOS DE LA TABLA PRODUCTOS.
    Create table antiguo_producto(
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

    ### TABLA ANTIGUO_CONTENIDO_INVENTARIO, ALMACENA LOS DATOS ANTIGUOS DE LA TABLA CONTENIDO_INVENTARIO.
    create table antiguo_contenido_inventario(
        Contenido_inventario_Id int primary key auto_increment,
        Inventario_Id int (10),
        Producto_Id int(10),
        stock int default 0,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime

    );


### LLAVES FORANEAS

    alter table talla add constraint fk_talla_pais foreign key (pais_id) references pais(pais_id);

    alter table producto add constraint fk_producto_talla foreign key(Talla_Id) references talla(Talla_Id);

    alter table inventario add constraint fk_inventario_sede foreign key (Sede_Id) references sede(Sede_Id);

    alter table contenido_Inventario add constraint fk_contenidoinventario_inventario foreign key (Inventario_Id) references inventario(Inventario_Id);
    alter table contenido_Inventario add constraint fk_contenidoinventario_producto foreign key (Producto_Id) references producto(Producto_Id);

### LLAVES FORANEAS DATOS ANTIGUOS

    alter table antiguo_producto add constraint fk_antiguo_producto_talla foreign key(Talla_Id) references talla(Talla_Id);

    alter table antiguo_contenido_Inventario add constraint fk_antiguo_contenido_Inventario foreign key (Inventario_Id) references inventario(Inventario_Id);
    alter table antiguo_contenido_Inventario add constraint fk_antiguo_contenido_Inventario foreign key (Producto_Id) references producto(Producto_Id);

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

    ### DATOS PRODUCTO
    /* insert into producto(tipo,Marca,Coleccion_temporada,genero,Valor_Compra,Valor_Venta,talla_id) values
        ('Zapatilla','Adidas','Verano','Femenino',1,2,2),
        ('Tenis','Brahma','Verano','Masculino',1,2,3); */

    ### DATOS INVENTARIO
    insert into inventario(Sede_Id) values
        (1),
        (2);
    
### TRIGGERS
    /* TRIGGER QUE AÑADE AL CONTENIDO_INVENTARIO UN NUEVO PRODUCTO REGISTRADO CON STOCK 0 */
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
    
    /* TRIGGER QUE INSERTA DATOS ANTIGUOS A LA TABLA ANTIGUO_PRODUCTO, DESPUES DE UNA ACTUALIZACION 
    EN LA TABLA PRODUCTO */

        DROP TRIGGER if exists after_update_producto

        DELIMITER //

        CREATE TRIGGER after_update_producto
        AFTER UPDATE ON producto
        FOR EACH ROW
            BEGIN 
                INSERT INTO antiguo_producto (Producto_id,Tipo,Marca,Coleccion_Temporada,Genero,Valor_Compra,Valor_Venta,Talla_Id,fecha_creacion,ultima_modificacion)
                    values(old.Producto_id,old.Tipo,Marca,old.Coleccion_Temporada,old.Genero,old.Valor_Compra,old.Valor_Venta,old.Talla_Id,old.fecha_creacion,now());
            END;
            //

        DELIMITER ;   

    /* TRIGGER QUE INSERTA DATOS ANTIGUOS A LA TABLA ANTIGUO_CONTENIDO_INVENTARIO, DESPUES DE UNA ACTUALIZACION
    EN LA TABLA CONTENIDO_INVENTARIO */      

        DROP TRIGGER if exists after_update_contenido_inventario

        DELIMITER //

        CREATE TRIGGER after_update_contenido_inventario
        AFTER UPDATE ON contenido_inventario
        FOR EACH ROW
            BEGIN
                INSERT INTO antiguo_contenido_Inventario(inventario_id,producto_id,stock,fecha_creacion,ultima_modificacion)
                    values(old.inventario_id,old.producto_id,old.stock,old.fecha_creacion, now());
            END;
            //
        
        DELIMITER ;
                     

