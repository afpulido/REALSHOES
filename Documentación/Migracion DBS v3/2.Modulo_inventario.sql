use realshoes;

### Tablas

    ### Tabla productos, almacena la información de los productos.
    create table producto(
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

    
    ### Tabla contenido_inventario, almacena las existencias de un respectivo inventario.
    -- Nueva Tabla
    create table contenido_inventario(
        contenido_inventario_id int primary key auto_increment,
        producto_id int(10),
        stock int default 0,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

### Llaves Foraneas 
    alter table contenido_inventario add constraint fk_contenidoinventario_producto foreign key (producto_id) references producto(producto_id);

### Datos 
    ### Datos producto
    /* insert into producto(tipo,marca,coleccion_temporada,genero,valor_compra,valor_venta,talla_id) values
        ('Zapatilla','Adidas','Verano','Femenino',1,2,37),
        ('Tenis','Brahma','Verano','Masculino',1,2,38); */


    