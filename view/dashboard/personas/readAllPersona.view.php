<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
     
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" >
                <ul class="nav nav-pills">
                
                  <li class="nav-item"><a class="nav-link" id="#nuevo" href="?c=Personas&a=registrarPersonas" >Nuevo </a></li>
                  <li class="nav-item"><a class="nav-link " id="#empleados" href="?c=Personas&a=consultarTodosEmpleados" >Mostrar Empleados</a></li>
                  <li class="nav-item"><a class="nav-link " id="#clientes" href="?c=Personas&a=consultarTodosClientes" >Mostrar Clientes</a></li>
                  <li class="nav-item"><a class="nav-link active" id="#todos" href="?c=Personas&a=consultarTodosPersonas" >Mostrar todos los Usuarios</a></li>
                  <li class="nav-item"><a class="nav-link disabled" id="#activos" href="?c=Personas&a=actualizarPersonas" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
      

                  <div class="active tab-pane" id="todos">
                    <table id="tablamostraractivos" class="display table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Rol</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>teléfono</th>
                                <th>Dirección</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Creación</th>
                                <th>Actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                     
                            foreach ($usuariosc as $usuario) :?>
                        
                            <tr>
                                <td><?= $usuario->getCedula();?></td>
                                <td><?= $usuario->getRolId();?></td>
                                <td><?= $usuario->getNombre();?></td>
                                <td><?= $usuario->getApellido();?></td>
                                <td><?= $usuario->getTelefono();?></td>
                                <td><?= $usuario->getDireccion();?></td>
                                <td><?= $usuario->getEmail();?></td>
                                <td>
                                    <?php if($usuario->getFechaEliminacionDesactivacion() == null){ ?>
                                        <a href="?c=Personas&a=actualizarStatusPersonas&usuarios_id=<?php echo $usuario->getPersonaId()?>&deleted=<?php echo $usuarios->getFechaEliminacionDesactivacion()?>" class="btn btn-success" alt="Rol Activo">
                                            <i class="fas fa-check-circle"></i>
                                        </a>
                                    <?php  }else{ ?>    
                                        <a href="?c=Personas&a=actualizarStatusPersonas&usuarios_id=<?php echo $usuario->getPersonaId()?>&deleted=<?php echo $usuario->getFechaEliminacionDesactivacion()?>" class="btn btn-danger" alt="Rol Inactivo">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    <?php  }?>                                  
                                </td>
                                <td><?= $usuario->getFechaEliminacionDesactivacion();?></td>
                                <td><?= $usuario->getFechaCreacion();?></td>
                                <td><?= $usuario->getUltimaModificacion();?></td>
                                <td>
                                    <!-- <button type="button" class="btn btn-primary"> -->
                                        <a href="?c=Personas&a=actualizarPersonas&usuarios_id=<?php echo $usuario->getPersonaId() ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a> 
                                    <!-- </button> -->
                                        <a href="?c=Personas&a=eliminarPersonas&usuarios_id=<?php echo $usuario->getPersonaId()?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                </td>
                            
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cédula</th>
                                <th>Rol</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>teléfono</th>
                                <th>Dirección</th>
                                <th>Correo</th>
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
     
     
     
     
     