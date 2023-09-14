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
                  <li class="nav-item"><a class="nav-link " id="#todos" href="?c=Roles&a=consultarTodosClientes" >Mostrar todos los Usuarios</a></li>
                  <li class="nav-item"><a class="nav-link active" id="#actualizar" href="?c=Roles&a=actualizarRoles" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  <div class="active tab-pane" id="actualizar">

                    <h2><?= $pagina?></h2>
                    <br> <!-- ?c=Roles&a=actualizarRoles -->
                    <form class="form-horizontal" action="" method="POST"> 
                      <input type="hidden" name="id" value="">
                      <div class="form-group row">
                          <input type="hidden" name="rol_id" value="<?php echo $rolesc->getRolId()?>">
                          <input type="hidden" name="created" value="<?php echo $rolesc->getFechaCreacion()?>">
                          <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control"  name="nombre" id="nombre" placeholder="" value="<?php echo $rolesc->getNombre()?>" required>
                          </div>
                          <div class="col-sm-3">
                            <label for="inputName" class="col-form-label">Estado <span>*</span></label> 
                                <select  class="form-control"id="estado" name="estado"placeholder="Seleccione uno rol:" required>
                                  <?php if(is_null($rolesc->getFechaEliminacionDesactivacion())){?>
                                      <option value="1">Activo</option>
                                      <option value="2">Inactivo</option>
                                  <?php }else{?>
                                      <option value="2">Inactivo</option>
                                      <option value="1">Activo</option>
                                  <?php }?>
                                </select>
                            </div>
                      </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Descripción</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="" value="<?php echo $rolesc->getDescripcion()?>" required>
                          </div>
                       </div>
                       
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-2">
                          <button type="submit" class="btn btn-info">Actualizar Rol</button>
                        </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class=" tab-pane" id="todos">
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