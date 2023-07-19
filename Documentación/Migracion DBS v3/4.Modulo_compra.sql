use NewVersion;
### Tablas

    ### Tabla empleado_producto, almacena el producto seleccionado por un usuario.    
    create table empleado_producto(
        empleado_producto_id int primary key auto_increment, 
        persona_id int, 
        producto_id int,
        estado SET('SELECCIONADO','CANCELADO','FACTURA_compraDO') default'SELECCIONADO',
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime 
    );

    ###  Tabla pedido_compra, almacena la lista de productos seleccionados por un usuario.
    create table pedido_compra (   
        pedido_compra_id int primary key auto_increment,
        cantidad int, 
        valor_total float default 0,
        metodo_pago_id int default 1, 
        empleado_producto_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### Tabla factura_compra, almacena los pedido_compras pagos.
    create table factura_compra(
        factura_compra_id int primary key auto_increment,
        descuento float,
        impuesto float,
        pedido_compra_id int,
        fecha_creacion datetime default current_timestamp,
        ultima_modificacion datetime default current_timestamp,
        fecha_eliminacion datetime
    );

    ### Tabla venta, almacena las ventas realizadas.
    -- Nueva Tabla
    create table compra(
        compra_id int primary key auto_increment,
        factura_compra_id int,
        fecha_creacion DATETIME default current_timestamp,
        fecha_eliminacion datetime
    );

### Llaves Foraneas
    alter table empleado_producto add constraint fk_empleado_producto_persona foreign key (persona_id) references persona(persona_id);
    alter table empleado_producto add constraint fk_empleado_producto_producto foreign key (producto_id) references producto(producto_id);
    alter table pedido_compra add constraint fk_pedido_compra_metodo_pago foreign key(metodo_pago_id) references metodo_pago(metodo_pago_id);
    alter table pedido_compra add constraint fk_pedido_compra_empleado_producto foreign key(empleado_producto_id) references empleado_producto(empleado_producto_id);
    alter table factura_compra add constraint fk_factura_compra_pedido_compra foreign key(pedido_compra_id) references pedido_compra(pedido_compra_id);
    alter table compra add constraint fk_venta_factura_compra foreign key (factura_compra_id) references factura_compra(factura_compra_id);
    
    ### Datos tabla empleado_producto -- seleccion de producto
    -- insert into empleado_producto (persona_id,producto_id) VALUES (1,1);

    

    
    
