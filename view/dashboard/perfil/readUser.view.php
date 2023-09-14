<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
     
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                
                  <li class="nav-item"><a class="nav-link active" href="#nuevo" data-toggle="tab">Nuevo </a></li>
                  <li class="nav-item"><a class="nav-link" href="#buscar" data-toggle="tab">Buscar </a></li>
                  <li class="nav-item"><a class="nav-link" href="#actualizar" data-toggle="tab">Actualizar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activos" data-toggle="tab">Mostrar activos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#inactivos" data-toggle="tab">Mostrar Inactivos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#todos" data-toggle="tab">Mostrar Todos</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="nuevo">
                    <h2>Registrar <?= $pagina?></h2>
                    <br>


                  </div>
                  <!-- /.tab-pane -->

                  <div class=" tab-pane" id="buscar">
                    <h2>Buscar <?= $pagina?></h2>
                    <br> 


                  </div>
                  <!-- /.tab-pane -->
                  <div class=" tab-pane" id="actualizar">
                    
                    <h2>Actualizar <?= $pagina?></h2>
                    <br>
                    <form class="form-horizontal">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  name="Direccion" id="Direccion" placeholder="Dirección">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Teléfono</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="Teléfono">
                        </div>
                      </div>

                      <!-- <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Apellidos</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Apellidos" id="Nombre" placeholder="Apellidos">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="Email" id="Email" placeholder="Email">
                        </div>
                      </div> -->
                    
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                      </div>
                    </form>

                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="activos">
                      <h2>Mostrar <?= $pagina?> Activos</h2>
                      <br>
                    <form class="form-horizontal">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Documento</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  name="Documento" id="Documento" placeholder="Documento Identidad">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Apellidos</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Apellidos" id="Nombre" placeholder="Apellidos">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="Email" id="Email" placeholder="Email">
                        </div>
                      </div>
                    <!--  
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-warning">Guardar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="inactivos">
                    <h2>Mostrar <?= $pagina?> Inactivos</h2>
                    <br>
                    
                    
                  </div>
                  <!-- /.tab-pane -->

                  <div class=" tab-pane" id="todos">
                    <h2>Mostrar Todos los <?= $pagina?> (Activos e Inactivos)</h2>
                    <br> 
                    
                 
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
              
                