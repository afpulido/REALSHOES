--- TABLAS
    --- TABLA TALLA, ALMACENA LAS TALLAS Y SU ORIGEN. 
    create table talla(
        Talla_Id int primary key IDENTITY(1,1),
        pais_id int,
        numero int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );
    --- TABLA PRODUCTOS, INFORMACIÓN SOBRE LOS PRODUCTOS
    Create table producto(
        Producto_Id int primary key IDENTITY(1,1), 
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
    --- TABLA INVENTARIO, MUESTRA EL CODIGO DEL INVENTARIO Y SU RESPECTIVA SEDE.
    create table inventario(
        Inventario_Id int primary key IDENTITY(1,1), 
        Sede_Id int UNIQUE,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    --- TABLA CONTENIDO_INVENTARIO, ALMACENA LAS EXISTENCIAS DE UN RESPECTIVO INVENTARIO.
    create table contenido_inventario(
        contenido_inventario_Id int primary key IDENTITY(1,1),
        Inventario_Id int,
        Producto_Id int,
        stock int default 0,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime

    );

--- TABLAS CON DATOS ANTIGUOS
    --- TABLA ANTIGUO_PERSONA, ALMACENA LOS DATOS ANTIGUOS DE LA TABLA PRODUCTOS.
    Create table antiguo_producto(
        Producto_Id int primary key IDENTITY(1,1), 
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

    --- TABLA ANTIGUO_CONTENIDO_INVENTARIO, ALMACENA LOS DATOS ANTIGUOS DE LA TABLA CONTENIDO_INVENTARIO.
    create table antiguo_contenido_inventario(
        Contenido_inventario_Id int primary key IDENTITY(1,1),
        Inventario_Id int,
        Producto_Id int,
        stock int default 0,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime

    );


--- LLAVES FORANEAS

    alter table talla add constraint fk_talla_pais foreign key (pais_id) references pais(pais_id);

    alter table producto add constraint fk_producto_talla foreign key(Talla_Id) references talla(Talla_Id);

    alter table inventario add constraint fk_inventario_sede foreign key (Sede_Id) references sede(Sede_Id);

    alter table contenido_Inventario add constraint fk_contenidoinventario_inventario foreign key (Inventario_Id) references inventario(Inventario_Id);
    alter table contenido_Inventario add constraint fk_contenidoinventario_producto foreign key (Producto_Id) references producto(Producto_Id);

--- LLAVES FORANEAS DATOS ANTIGUOS

    alter table antiguo_producto add constraint fk_antiguo_producto_talla foreign key(Talla_Id) references talla(Talla_Id);

    alter table antiguo_contenido_Inventario add constraint fk_antiguo_contenido_inventario_inventario foreign key (Inventario_Id) references inventario(Inventario_Id);
    alter table antiguo_contenido_Inventario add constraint fk_antiguo_contenido_inventario_producto foreign key (Producto_Id) references producto(Producto_Id);

--- DATOS

    --- DATOS TALLA
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

    --- DATOS PRODUCTO
    /* insert into producto(tipo,Marca,Coleccion_temporada,genero,Valor_Compra,Valor_Venta,talla_id) values
        ('Zapatilla','Adidas','Verano','Femenino',1,2,2),
        ('Tenis','Brahma','Verano','Masculino',1,2,3); */

    --- DATOS INVENTARIO
    insert into inventario(Sede_Id) values
        (1),
        (2);
    
--- TRIGGERS
    /* TRIGGER QUE AÑADE AL CONTENIDO_INVENTARIO UN NUEVO PRODUCTO REGISTRADO CON STOCK 0 */
       GO
	   CREATE TRIGGER after_añadir_producto_insert_contenido_inventario
        ON producto
        FOR INSERT 
        AS 
        BEGIN
            DECLARE @inventarios INT, @contador INT
            SELECT @inventarios = COUNT(inventario_id) FROM inventario
            SET @contador = 1;
            WHILE @contador <= @inventarios
            BEGIN    
                INSERT INTO contenido_inventario(inventario_id, producto_id)
                SELECT @contador, producto_id
                FROM inserted;
                SET @contador = @contador + 1;
            END;
        END;    
    /* TRIGGER QUE INSERTA DATOS ANTIGUOS A LA TABLA ANTIGUO_PRODUCTO, DESPUES DE UNA ACTUALIZACION 
    EN LA TABLA PRODUCTO */

        GO
        CREATE TRIGGER after_update_producto
        ON producto
        FOR UPDATE 
        AS 
        BEGIN
            INSERT INTO antiguo_producto (Producto_id,Tipo,Marca,Coleccion_Temporada,Genero,Valor_Compra,Valor_Venta,Talla_Id,fecha_creacion,ultima_modificacion)
            SELECT Producto_id,Tipo,Marca,Coleccion_Temporada,Genero,Valor_Compra,Valor_Venta,Talla_Id,fecha_creacion, GETDATE()
            FROM deleted;
        END;

    /* TRIGGER QUE INSERTA DATOS ANTIGUOS A LA TABLA ANTIGUO_CONTENIDO_INVENTARIO, DESPUES DE UNA ACTUALIZACION
    EN LA TABLA CONTENIDO_INVENTARIO */     

        GO
        CREATE TRIGGER after_update_contenido_inventario
        ON contenido_inventario
        FOR UPDATE 
        AS 
        BEGIN
            INSERT INTO antiguo_contenido_Inventario(inventario_id,producto_id,stock,fecha_creacion,ultima_modificacion)
            SELECT inventario_id,producto_id,stock,fecha_creacion, GETDATE()
            FROM deleted;
        END;
--- VISTAS
	/* VISTA QUE MUESTRA LOS PRODUCTOS CON STOCK BAJO */
        GO
		CREATE VIEW stock_bajo_vw AS 
            SELECT c.Inventario_Id AS Codigo_Inventario, c.Producto_id AS Codigo_producto, 
                        p.tipo + ' ' + p.marca + ' ' + p.Coleccion_temporada + ' ' + p.genero AS producto,
                            pa.nombre AS Origen, t.numero AS Talla, c.stock  
                                FROM contenido_Inventario AS c
                                    INNER JOIN producto AS p ON c.producto_id = p.producto_id
                                        INNER JOIN talla AS t ON t.talla_id = p.talla_id
                                            INNER JOIN pais AS pa ON pa.pais_id = t.pais_id
                                                WHERE c.stock <= 3 AND c.stock > 0;

    /* VISTA QUE MUESTRA LOS PRODUCTOS CON STOCK 0 */
        GO
		CREATE VIEW stock_cero_vw AS 
            SELECT c.Inventario_Id AS Codigo_Inventario, c.Producto_id AS Codigo_producto, 
                p.tipo + ' ' + p.marca + ' ' + p.Coleccion_temporada + ' ' + p.genero AS producto,
                    pa.nombre AS Origen, t.numero AS Talla, c.stock  
                        FROM contenido_Inventario AS c
                            INNER JOIN producto AS p ON c.producto_id = p.producto_id
                                INNER JOIN talla AS t ON t.talla_id = p.talla_id
                                    INNER JOIN pais AS pa ON pa.pais_id = t.pais_id
                                        WHERE c.stock = 0;

    /* VISTA QUE MUESTRA LOS PRODUCTOS QUE CAMBIARON DE PRECIO */
        GO      
        CREATE VIEW variacion_precios_vw AS
            SELECT TOP 100 PERCENT
                p.producto_id, CONCAT(p.tipo, ' ', p.marca, ' ', p.Coleccion_temporada, ' ', p.genero) AS producto,
                    a.Valor_Venta AS Precio_Anterior, p.Valor_Venta AS Precio_Actual,
                        a.ultima_modificacion AS Fecha_Modificacion
                            FROM producto AS p
                                INNER JOIN antiguo_producto AS a ON p.producto_id = a.producto_id
                                    ORDER BY a.ultima_modificacion DESC;
                    
    



