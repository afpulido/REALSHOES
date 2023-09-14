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
                  <li class="nav-item"><a class="nav-link " id="#todos" href="?c=Personas&a=consultarTodosPersonas" >Mostrar todos los Usuarios</a></li>
                  <li class="nav-item"><a class="nav-link active" id="#actualizar" href="?c=Personas&a=actualizarPersonas" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class=" active tab-pane" id="actualizar">
                  <h2><?= $pagina?></h2>
                    <br>
                    <form class="form-horizontal" action="?c=Personas&a=actualizarPersonas" method="POST" enctype="multipart/form-data"> 
                      <div class="form-group row">
                          <input type="hidden" name="persona_id" value="<?php echo $personac->getPersonaId()?>">
                          <input type="hidden" name="created" value="<?php echo $personac->getFechaCreacion?>">
                          
                          <?php 
                          if($personac->getRolId()==1 || $personac->getRolId()==2 ){ ?>
                            <div class="col-sm-3">
                              <label for="inputName" class="col-form-label">Cédula <span>*</span></label>
                              <input type="number" class="form-control"  name="cedula" id="cedula" placeholder="" value="<?php echo $personac->getCedula()?>" required>
                          </div>
                          <?php }else{?>
                            <div class="col-sm-3">
                              <label for="inputName" class="col-form-label">Cédula <span>*</span></label>
                              <input type="number" class="form-control"  name="cedula" id="cedula" placeholder="" value="<?php echo $personac->getCedula()?>" disabled required>
                            </div>
                          <?php }?>
                                      
                          <div class="col-sm-3">
                          <label for="inputName" class="col-form-label">Rol <span>*</span></label> 
                              <select  class="form-control"id="rol_id" name="rol_id"placeholder="Seleccione uno rol:" required>
                                  <!-- mostrar el rol del usuario -->
                                  <?php if($personac->getRolId()== $rolid->getRolId()){?>
                                      <option value="<?=$rolid->getRolId()?>"><?=$rolid->getNombre()?> </option>
                                  <?php }?>
                                   <!-- validar que el rol no se vuelva a repetir  -->
                                  <?php foreach ($rolesc as $rol) :?>
                                    <?php if($personac->getRolId()== $rol->getRolId()){?>
                                    <?php }else{?>
                                      <option value="<?=$rol->getRolId()?>"><?=$rol->getNombre()?> </option>
                                      <?php }?>
                                    
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="col-sm-3">
                            <label for="inputName" class="col-form-label">Estado <span>*</span></label> 
                                <select  class="form-control"id="estado" name="estado"placeholder="Seleccione uno rol:" required>
                                    <!-- Mostrar el estado de acuerdo con la DB -->
                                  <?php if($personac->getFechaEliminacionDesactivacion=== null){?>
                                          <option value="1">Activo</option>
                                          <option value="2">Inactivo</option>
                                        <?php }else{ ?>
                                          <option value="2">Inactivo</option>
                                          <option value="2">Inactivo</option>
                                        <?php }?>
                                </select>
                            </div>
                      </div>
                      <div class="form-group row">
                          
                          <div class="col-sm-3">
                            <label for="inputName" class="col-form-label">Nombres<span>*</span></label>
                            <input type="text" class="form-control"  name="nombre" id="nombre" placeholder="" value="<?php echo $personac->getNombre()?>" required>
                          </div>
                          
                          <div class="col-sm-3">
                            <label for="inputName" class="col-form-label">Apellidos<span>*</span></label>
                            <input type="text" class="form-control"  name="apellido" id="apellido" placeholder="" value="<?php echo $personac->getApellido()?>" required>
                          </div>
                          <div class="col-sm-4">
                            <label for="inputName" class="col-form-label">Imagen de Perfil*</label>
                            <input type="file" class="form-control-file btn-success" name="perfil" id="perfil" accept=".jpg, .jpeg, .png" placeholder="" value="<?php echo $personac->getImagen()?>" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-3">
                            <label for="inputName" class="col-form-label">Teléfono*</label>
                            <input type="number" class="form-control" name="telefono" id="telefono" placeholder="" value="<?php echo $personac->getTelefono()?>" required>
                          </div>
                          <div class="col-sm-6">
                          <label for="inputName" class="col-form-label">Dirección<span>*</span></label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="" value="<?php echo $personac->getDireccion()?>" required>
                          </div>                         
                      </div>                       
                      <div class="form-group row">
                          <div class="col-sm-3">
                          <label for="inputName" class="col-form-label">Correo<span>*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="" value="<?php echo $personac->getEmail()?>" required>
                          </div>
                          
                          <div class="col-sm-3">
                            <label for="inputName" class="col-form-label">Contraseña*</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="**********" value="" required>
                          </div>

                          <div class="col-sm-3">
                          <label for="inputName" class="col-form-label">Confirmar Contraseña<span>*</span></label>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="*******" value="" required>
                          </div>
                       </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-2">
                          <button type="submit" class="btn btn-info">Actualizar Usuario</button>
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