<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
     
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" >
                <ul class="nav nav-pills">
                
                    <li class="nav-item"><a class="nav-link" id="#nuevo" href="?c=Inventarios&a=registrarInventarios" >Nuevo </a></li>
                  <li class="nav-item"><a class="nav-link active " id="#todos" href="?c=Inventarios&a=consultarTodosInventarios" >Mostrar Todos</a></li>
                  <li class="nav-item"><a class="nav-link disabled" id="#activos" href="?c=Inventarios&a=actualizarInventarios" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
      

                  <div class="active tab-pane" id="todos">
                    <table id="tablamostraractivos" class="display table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bodega</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Creación</th>
                                <th>Actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Se usa if para validar el estatus de un inventario -->

                            
                            <?php
                            if($inventariosc===null){
                              header("Location: ?c=Inventarios&a=registrarInventarios");
                            }                       
                            foreach ($inventariosc as $inventario) :?>
                            <tr>
                                <td><?= $inventario->getInventarioId();?></td>
                                <td><?= $inventario->getBodega();?></td>
                                <td><?= $inventario->getDescripcion();?></td>
                                <td>
                                    <?php if($inventario->getFechaEliminacionDesactivacion() == null){ ?>
                                        <a href="?c=Inventarios&a=actualizarStatusInventarios&inventario_id=<?php echo $inventario->getInventarioId()?>&deleted=<?php echo $inventario->getFechaEliminacionDesactivacion()?>" class="btn btn-success" alt="Rol Activo">
                                            <i class="fas fa-check-circle"></i>
                                        </a>
                                    <?php  }else{ ?>    
                                        <a href="?c=Inventarios&a=actualizarStatusInventarios&inventario_id=<?php echo $inventario->getInventarioId()?>&deleted=<?php echo $inventario->getFechaEliminacionDesactivacion()?>" class="btn btn-danger" alt="Rol Inactivo">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    <?php  }?>                                  
                                </td>
                                <td><?= $inventario->getFechaEliminacionDesactivacion();?></td>
                                <td><?= $inventario->getFechaCreacion();?></td>
                                <td><?= $inventario->getUltimaModificacion();?></td>
                                <td>
                                    <!-- <button type="button" class="btn btn-primary"> -->
                                        <a href="?c=Inventarios&a=actualizarInventarios&inventario_id=<?php echo $inventario->getInventarioId() ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a> 
                                    <!-- </button> -->
                                        <a href="?c=Inventarios&a=eliminarInventarios&inventario_id=<?php echo $inventario->getInventarioId()?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                </td>
                            
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Bodega</th>
                                <th>Descripción</th>
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
     
     
     
     
     