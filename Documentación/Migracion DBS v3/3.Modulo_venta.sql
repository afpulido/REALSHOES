use realshoes;
### Tablas

    ### Tabla metodo_pago, almacena los diferentes metodos de pago aceptados por la organizacion.
    create table metodo_pago (
        metodo_pago_id int primary key, 
        tipo_pago varchar(45),
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### Tabla persona_producto, almacena el producto seleccionado por un usuario.    
    create table persona_producto(
        persona_producto_id int primary key auto_increment, 
        persona_id int, 
        producto_id int,
        estado SET('SELECCIONADO','CANCELADO','FACTURADO') default'SELECCIONADO',
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime 
    );

    ###  Tabla pedido, almacena la lista de productos seleccionados por un usuario.
    create table pedido (   
        pedido_id int primary key auto_increment,
        cantidad int, 
        valor_total float default 0,
        metodo_pago_id int default 1, 
        persona_producto_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### Tabla factura, almacena los pedidos pagos.
    create table factura(
        factura_id int primary key auto_increment,
        descuento float,
        impuesto float,
        pedido_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### Tabla venta, almacena las ventas realizadas.
    -- Nueva Tabla
    create table venta(
        venta_id int primary key auto_increment,
        factura_id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );

### Llaves Foraneas
    alter table persona_producto add constraint fk_persona_producto_persona foreign key (persona_id) references persona(persona_id);
    alter table persona_producto add constraint fk_persona_producto_producto foreign key (producto_id) references producto(producto_id);
    alter table pedido add constraint fk_pedido_metodo_pago foreign key(metodo_pago_id) references metodo_pago(metodo_pago_id);
    alter table pedido add constraint fk_pedido_persona_producto foreign key(persona_producto_id) references persona_producto(persona_producto_id);
    alter table factura add constraint fk_factura_pedido foreign key(pedido_id) references pedido(pedido_id);
    alter table venta add constraint fk_venta_factura foreign key (factura_id) references factura(factura_id);

### Datos 
    ### Datos tabla metodo_pago
    insert into metodo_pago(metodo_pago_id,tipo_pago) values
        (1,'Efectivo'),
        (2,'Tarjeta Debito'),
        (3,'Tarjeta Crédito'),
        (4,'QR');
    
    ### Datos tabla persona_producto -- seleccion de producto
    -- insert into persona_producto (persona_id,producto_id) VALUES (1,1);

    

    
    
