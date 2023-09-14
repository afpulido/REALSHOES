<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
     
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" >
                <ul class="nav nav-pills">
                
                    <li class="nav-item"><a class="nav-link" id="#nuevo" href="?c=Productos&a=registrarProductos" >Nuevo </a></li>
                  <li class="nav-item"><a class="nav-link " id="#todos" href="?c=Productos&a=consultarTodosProductos" >Mostrar Todos</a></li>
                  <li class="nav-item"><a class="nav-link active" id="#activos" href="?c=Productos&a=actualizarProductos" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class=" active tab-pane" id="nuevo">
                                  <!-- ?c=Productos&a=registrarProductos -->
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data"> 
                      <input type="hidden" name="id" value="">
                      <div class="form-group row">
                          <input type="hidden" name="producto_id" value="<?= $productoc->getProductoId()?>">
                          <input type="hidden" name="created" value="<?= $productoc->getFechaCreacion()?>">
                          <div class="col-sm-3">
                            <label for="inputName" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control"  name="nombre" id="nombre" placeholder="" value="<?= $productoc->getNombre()?>" required>
                          </div>
                          <div class="col-sm-7">
                            <label for="inputName" class="col-sm col-form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="" value="<?= $productoc->getDescripcion()?>" required>
                          </div>
                      </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Estado <span>*</span></label> 
                            <select  class="form-control" id="estado" name="estado" placeholder="Seleccione:" required>
                                <?php if(is_null($productoc->getFechaEliminacionDesactivacion())){?>
                                      <option value="1">Activo</option>
                                      <option value="2">Inactivo</option>
                                  <?php }else{?>
                                      <option value="2">Inactivo</option>
                                      <option value="1">Activo</option>
                                  <?php }?>    
                            </select>
                          </div>

                          <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Tipo <span>*</span></label> 
                                <select  class="form-control" id="tipo" name="tipo" placeholder="Seleccione:" required>
                                  <?php 
                                    if($productoc->getTipo() ==1){?>
                                        <option value="<?=$productoc->getTipo()?>">Tenis</option>
                                        <option value="2">Sandalia</option>
                                        <option value="3">Bota</option>
                                        <option value="4">Zapato en Gamusa</option>
                                        <option value="5">Zapato en Cuero</option>
                                        <option value="6">Zapato Informal</option>
                                        <option value="7">Zapato Formal</option>
                                     <?php } else{?>
                                      <?php } 
                                    if($productoc->getTipo() ==2){?>
                                        <option value="<?=$productoc->getTipo()?>">Sandalia</option>
                                        <option value="1">Tenis</option>
                                        <option value="3">Bota</option>
                                        <option value="4">Zapato en Gamusa</option>
                                        <option value="5">Zapato en Cuero</option>
                                        <option value="6">Zapato Informal</option>
                                        <option value="7">Zapato Formal</option>
                                     <?php } else{?>
                                      <?php } 
                                    if($productoc->getTipo() ==3){?>
                                        <option value="<?=$productoc->getTipo()?>">Bota</option>
                                        <option value="1">Tenis</option>
                                        <option value="2">Sandalia</option>
                                        <option value="4">Zapato en Gamusa</option>
                                        <option value="5">Zapato en Cuero</option>
                                        <option value="6">Zapato Informal</option>
                                        <option value="7">Zapato Formal</option>
                                     <?php } else{?>
                                      <?php } 
                                      if($productoc->getTipo() ==4){?>
                                        <option value="<?=$productoc->getTipo()?>">Zapato en Gamusa</option>
                                        <option value="1">Tenis</option>
                                        <option value="2">Sandalia</option>
                                        <option value="3">Bota</option>                                        
                                        <option value="5">Zapato en Cuero</option>
                                        <option value="6">Zapato Informal</option>
                                        <option value="7">Zapato Formal</option>
                                     <?php } else{?>
                                      <?php } 
                                    if($productoc->getTipo() ==5){?>
                                        <option value="<?=$productoc->getTipo()?>">Zapato en Cuero</option>
                                        <option value="1">Tenis</option>
                                        <option value="2">Sandalia</option>
                                        <option value="3">Bota</option>
                                        <option value="4">Zapato en Gamusa</option>                                        
                                        <option value="6">Zapato Informal</option>
                                        <option value="7">Zapato Formal</option>
                                     <?php } else{?>
                                      <?php } 
                                    if($productoc->getTipo() ==6){?>
                                        <option value="<?=$productoc->getTipo()?>">Zapato Informal</option>
                                        <option value="1">Tenis</option>
                                        <option value="2">Sandalia</option>
                                        <option value="3">Bota</option>
                                        <option value="4">Zapato en Gamusa</option>
                                        <option value="5">Zapato en Cuero</option>
                                        
                                        <option value="7">Zapato Formal</option>
                                     <?php } else{?>
                                      <?php } 
                                      if($productoc->getTipo() ==7){?>
                                        <option value="<?=$productoc->getTipo()?>">Zapato formal</option>
                                        <option value="1">Tenis</option>
                                        <option value="2">Sandalia</option>
                                        <option value="3">Bota</option>
                                        <option value="4">Zapato en Gamusa</option>
                                        <option value="5">Zapato en Cuero</option>
                                        <option value="6">Zapato InFormal</option>
                                     <?php } else{?>
                                      <?php } 
                                      
                                    ?>
                                </select>
                          </div>
                          <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Marca<span>*</span></label> 
                                <select  class="form-control" id="marca" name="marca" placeholder="" required>
                                  <?php if ($productoc->getMarca()==1){?>
                                    <option value="1">Real Shoes</option>
                                    <option value="2">Adidas</option>
                                  <?php ;} else{?>
                                    <option value="2">Adidas</option>
                                    <option value="1">Real Shoes</option>
                                  <?php ;}?>
                                    
                                </select>
                          </div>
                          <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Colección<span>*</span></label> 
                                <select  class="form-control"id="coleccion" name="coleccion" placeholder="" required>
                                  <?php if($productoc->getColeccion()==1){?>
                                    <option value="<?=$productoc->getColeccion()?>">Primavera</option>
                                    <option value="2">Verano</option>
                                    <option value="3">Otoño</option>
                                    <option value="4">Invierno</option>
                                  <?php ;}elseif($productoc->getColeccion()==2){?>
                                    <option value="<?=$productoc->getColeccion()?>">Verano</option>
                                    <option value="1">Primavera</option>
                                    <option value="3">Otoño</option>
                                    <option value="4">Invierno</option>
                                  <?php ;}elseif($productoc->getColeccion()==3){?>
                                    <option value="<?=$productoc->getColeccion()?>">Otoño</option>
                                    <option value="1">Primavera</option>
                                    <option value="2">Verano</option>
                                    <option value="4">Invierno</option>
                                  <?php ;}elseif($productoc->getColeccion()==4){?>
                                    <option value="<?=$productoc->getColeccion()?>">Invierno</option>
                                    <option value="1">Primavera</option>
                                    <option value="2">Verano</option>
                                    <option value="3">Otoño</option>
                                  <?php ;}?>
              
                                    
                                </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Genero<span>*</span></label> 
                                <select  class="form-control" id="genero" name="genero" placeholder="" required>
                                    <?php if($productoc->getGenero()==1){?>
                                      <option value="<?=$productoc->getGenero()?>">Damas</option>
                                      <option value="2">Caballeros</option>
                                      <option value="3">Infantil</option>
                                    <?php } 
                                    if($productoc->getGenero()==2){?>
                                      <option value="<?=$productoc->getGenero()?>">Caballeros</option>
                                      <option value="1">Damas</option>
                                      <option value="3">Infantil</option>
                                    <?php } 
                                    if($productoc->getGenero()==3){?>
                                      <option value="<?=$productoc->getGenero()?>">Infantil</option> 
                                      <option value="1">Damas</option>
                                      <option value="2">Caballeros</option>
                                    <?php }?>
                                    
                                    
                                    
                                </select>
                        </div>
                        <div class="col-sm-1">
                            <label for="inputName" class="col-form-label">Talla<span>*</span></label> 
                            <input type="text" class="form-control" name="talla" id="talla" value="<?=$productoc->getTalla()?>">
                        </div>
                      </div>
                      <div class="form-group row">
                      <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Inventario<span>*</span></label> 
                                <select  class="form-control" id="inventario" name="inventario" placeholder="" required>
                                  <?php if($productoc->getInventarioId()==1){?>
                                        <option value="<?=$productoc->getInventarioId()?>">Productos</option>
                                        <option value="2">Heramientas</option>
                                        <option value="3">Accesorios</option>
                                  <?php }  
                                  if($productoc->getInventarioId()==2){?>
                                    <option value="<?=$productoc->getInventarioId()?>">Heramientas</option>
                                    <option value="1">Productos</option>
                                    <option value="3">Accesorios</option>
                                  <?php }  
                                  if($productoc->getInventarioId()==3){?>
                                      <option value="<?=$productoc->getInventarioId()?>">Accesorios</option>
                                      <option value="1">Productos</option>
                                      <option value="2">Heramientas</option>
                                  <?php }  ?>                                     
                                </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Cantidad</label>
                            <input type="number" class="form-control"  name="cantidad" id="cantidad" placeholder="" value="<?=$productoc->getUnidades()?>" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="pcompra" class="col-form-label">Precio de Compra</label>
                            <input type="number" class="form-control"  name="pcompra" id="pcompra" placeholder="" value="<?=$productoc->getValorCompra()?>" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="ganancia" class="col-form-label">% Ganancia</label>
                            <input type="number" class="form-control"  name="ganancia" id="ganancia" placeholder="" value="<?=$productoc->getGanancia()?>" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="pventa" class="col-form-label">Precio de Venta</label>
                            <input type="number" class="form-control"  name="pventa" id="pventa" placeholder="" value="<?=$productoc->getValorVenta()?>" readonly required>
                        </div>
                      </div>
                      
                      <fieldset>
                          <legend>Imágenes del producto <h6>(Ingrese al menos una imagen del producto )</h6></legend>
                      <div class="form-group row">
                        
                            <div class="col-sm-5">
                              <label for="inputName" class="col-form-label">Imagen Producto Frontal*</label>
                              <input type="file" class="form-control-file btn btn-outline-warning" name="imagen1" id="imagen1" accept=".jpg, .jpeg, .png" placeholder="<?=$productoc->getImagen1()?>" value="<?=$productoc->getImagen1()?>" required>
                            </div>
                            <div class="col-sm-5">
                              <label for="inputName" class="col-form-label">Imagen Producto Lateral</label>
                              <input type="file" class="form-control-file btn btn-outline-warning" name="imagen2" id="imagen2" accept=".jpg, .jpeg, .png" placeholder="" value="<?=$productoc->getImagen2()?>">
                            </div>
                            <div class="col-sm-5">
                              <label for="inputName" class="col-form-label">Imagen Producto superior</label>
                              <input type="file" class="form-control-file btn btn-outline-warning" name="imagen3" id="imagen3" accept=".jpg, .jpeg, .png" placeholder="" value="<?=$productoc->getImagen3()?>">
                            </div>
                            <div class="col-sm-5">
                              <label for="inputName" class="col-form-label">Imagen Producto Inferior</label>
                              <input type="file" class="form-control-file btn btn-outline-warning" name="imagen4" id="imagen4" accept=".jpg, .jpeg, .png" placeholder="" value="<?=$productoc->getImagen4()?>">
                            </div>
                      </div>
                      <br>
                      <br>
                      <br>
                      </fieldset>
                        
                      
                      
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-2">
                          <button type="submit" class="btn btn-success">Actualizar</button>
                          <button type="submit" class="btn btn-danger">Cancelar</button>
                        </div>
                        
                    </form>

                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

