<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
     
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" >
                <ul class="nav nav-pills">
                
                    <li class="nav-item"><a class="nav-link" id="#nuevo" href="?c=Roles&a=registrarRoles" >Nuevo </a></li>
                  <li class="nav-item"><a class="nav-link active " id="#todos" href="?c=Roles&a=consultarTodosRoles" >Mostrar Todos</a></li>
                  <li class="nav-item"><a class="nav-link disabled" id="#activos" href="?c=Roles&a=actualizarRoles" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
      

                  <div class="active tab-pane" id="todos">
                    <table id="tablamostraractivos" class="display table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Rol</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Creación</th>
                                <th>Actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Se usa if para validar el estatus de un rol -->

                            
                            <?php
                            if($rolesc===null){
                              header("Location: ?c=Roles&a=registrarRoles");
                            }                       
                            foreach ($rolesc as $rol) :?>
                            <tr>
                                <td><?= $rol->getRolId();?></td>
                                <td><?= $rol->getNombre();?></td>
                                <td><?= $rol->getDescripcion();?></td>
                                <td>
                                    <?php if($rol->getFechaEliminacionDesactivacion() == null){ ?>
                                        <a href="?c=Roles&a=actualizarStatusRoles&rol_id=<?php echo $rol->getRolId()?>&deleted=<?php echo $rol->getFechaEliminacionDesactivacion()?>" class="btn btn-success" alt="Rol Activo">
                                            <i class="fas fa-check-circle"></i>
                                        </a>
                                    <?php  }else{ ?>    
                                        <a href="?c=Roles&a=actualizarStatusRoles&rol_id=<?php echo $rol->getRolId()?>&deleted=<?php echo $rol->getFechaEliminacionDesactivacion()?>" class="btn btn-danger" alt="Rol Inactivo">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    <?php  }?>                                  
                                </td>
                                <td><?= $rol->getFechaEliminacionDesactivacion();?></td>
                                <td><?= $rol->getFechaCreacion();?></td>
                                <td><?= $rol->getUltimaModificacion();?></td>
                                <td>
                                    <!-- <button type="button" class="btn btn-primary"> -->
                                        <a href="?c=Roles&a=actualizarRoles&rol_id=<?php echo $rol->getRolId() ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a> 
                                    <!-- </button> -->
                                        <a href="?c=Roles&a=eliminarRoles&rol_id=<?php echo $rol->getRolId()?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                </td>
                            
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Rol</th>
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
     
     
     
     
     