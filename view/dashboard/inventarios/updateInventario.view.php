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
                  <li class="nav-item"><a class="nav-link " id="#todos" href="?c=Inventarios&a=consultarTodosInventarios" >Mostrar todos los Usuarios</a></li>
                  <li class="nav-item"><a class="nav-link active" id="#actualizar" href="?c=Inventarios&a=actualizarInventarios" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  <div class="active tab-pane" id="actualizar">
                    <!-- ?c=Inventarios&a=actualizarInventarios -->
                    <form class="form-horizontal" action="" method="POST"> 
                      <div class="form-group row">
                          <input type="hidden" name="inventario_id" value="<?php echo $inventariosc->getInventarioId()?>">
                          <input type="hidden" name="created" value="<?php echo $inventariosc->getFechaCreacion()?>">
                          <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Bodega</label>
                            <input type="text" class="form-control"  name="bodega" id="bodega" placeholder="" value="<?php echo $inventariosc->getBodega()?>" required>
                          </div>
                          <div class="col-sm-3">
                            <label for="inputName" class="col-form-label">Estado <span>*</span></label> 
                                <select  class="form-control"id="estado" name="estado"placeholder="Seleccione un Inventario:" required>
                                  <?php if(is_null($inventariosc->getFechaEliminacionDesactivacion())){?>
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
                            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="" value="<?php echo $inventariosc->getDescripcion()?>" required>
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