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
                  <li class="nav-item"><a class="nav-link active " id="#todos" href="?c=Productos&a=consultarTodosProductos" >Mostrar Todos</a></li>
                  <li class="nav-item"><a class="nav-link disabled" id="#activos" href="?c=Productos&a=actualizarProductos" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
      

                  <div class="active tab-pane" id="todos">
                    <table id="tablamostraractivos" class="display table-responsive" style="width:100%">
                        <thead>
                            <tr>
                              <th>ID</th>
                              <th>Cant</th>
                              <th>Nombre</th>
                              <th>Descripción</th>
                              <th>Tipo</th>
                              <th>Marca</th>
                              <th>Colección</th>
                              <th>Genero</th>
                              <th>Talla</th>
                              <th>Inv.</th>
                              <th>PCompra</th>
                              <th>%</th>
                              <th>Pventa</th>
                              <th>Estado</th>
                              <th>Fecha</th>
                              <th>Creación</th>
                              <th>Actualización</th>
                              <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productosc as $producto) :?>
                            <tr>
                                <td><?= $producto->getProductoId();?></td>
                                <td><?= $producto->getUnidades();?></td>
                                <td><?= $producto->getNombre();?></td>
                                <td><?= $producto->getDescripcion();?></td>
                                <td><?php if( $producto->getTipo()== 1){
                                      echo "Tenis";
                                    }elseif( $producto->getTipo()== 2){
                                      echo "Sandalia";
                                    }elseif( $producto->getTipo()== 3){
                                      echo "Bota";
                                    }elseif( $producto->getTipo()== 4){
                                      echo "Zapato en Gamusa";
                                    }elseif( $producto->getTipo()== 5){
                                      echo "Zapato en Cuero";
                                    }elseif( $producto->getTipo()== 6){
                                      echo "Zapato Informal";
                                    }elseif( $producto->getTipo()== 7){
                                      echo "Zapato Formal";
                                    }
                                    ?>
                                </td>
                                <td><?php if($producto->getMarca()==1){
                                      echo "Realshoes";
                                    }else{
                                      echo "Adidas";
                                    }?>
                                </td>
                                <td><?php if($producto->getColeccion()==1){
                                      echo "Primavera";
                                    }elseif($producto->getColeccion()==2){
                                      echo "Verano";
                                    }elseif($producto->getColeccion()==3){
                                      echo "Otoño";
                                    }elseif($producto->getColeccion()==4){
                                      echo "Invierno";
                                    }else
                                    ?>
                                </td>
                                <td><?php if($producto->getGenero()==1){
                                    echo "Damas";
                                  }elseif($producto->getGenero()==2){
                                    echo "Caballeros";
                                  }elseif($producto->getGenero()==3){
                                    echo "Infantil";
                                  }else
                                  ?>
                                </td>
                                <td><?= $producto->getTalla();?></td>
                                <td><?= $producto->getInventarioId();?></td>
                                <td>$<?= $producto->getValorCompra();?></td>
                                <td><?= $producto->getGanancia();?></td>
                                <td>$<?= $producto->getValorVenta();?></td>
                                <td>
                                    <?php if($producto->getFechaEliminacionDesactivacion() == null){ ?>
                                        <a href="?c=Productos&a=actualizarStatusProductos&producto_id=<?php echo $producto->getProductoId()?>&deleted=<?php echo $producto->getFechaEliminacionDesactivacion()?>" class="btn btn-success" alt="Rol Activo">
                                            <i class="fas fa-check-circle"></i>
                                        </a>
                                    <?php  }else{ ?>    
                                        <a href="?c=Productos&a=actualizarStatusProductos&producto_id=<?php echo $producto->getProductoId()?>&deleted=<?php echo $producto->getFechaEliminacionDesactivacion()?>" class="btn btn-danger" alt="Rol Inactivo">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    <?php  }?>                                  
                                </td>
                                <td><?= $producto->getFechaEliminacionDesactivacion();?></td>
                                <td><?= $producto->getFechaCreacion();?></td>
                                <td><?= $producto->getUltimaModificacion();?></td>
                                <td>
                                    <!-- <button type="button" class="btn btn-primary"> -->
                                        <a href="?c=Productos&a=actualizarProductos&producto_id=<?php echo $producto->getProductoId() ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a> 
                                    <!-- </button> -->
                                        <a href="?c=Productos&a=eliminarProductos&producto_id=<?php echo $producto->getProductoId()?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                </td>
                            
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th>ID</th>
                              <th>Cant</th>
                              <th>Nombre</th>
                              <th>Descripción</th>
                              <th>Tipo</th>
                              <th>Marca</th>
                              <th>Colección</th>
                              <th>Genero</th>
                              <th>Talla</th>
                              <th>Inv.</th>
                              <th>PCompra</th>
                              <th>%</th>
                              <th>Pventa</th>
                              <th>Estado</th>
                              <th>Fecha</th>
                              <th>Creación</th>
                              <th>Actualización</th>
                              <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>




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
     
     
     
     
     