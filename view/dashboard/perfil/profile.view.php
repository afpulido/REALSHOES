
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="assets/dashboard/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div> 

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <!-- <p class="text-muted text-center">Tipo Usuario</p> -->

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Telefono</b> <a class="float-right">123456789</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                
                  <li class="nav-item"><a class="nav-link active" href="#hola" data-toggle="tab">Hola!</a></li>
                  <li class="nav-item"><a class="nav-link" href="#imagen" data-toggle="tab">Imagen</a></li>
                  <li class="nav-item"><a class="nav-link" href="#personal" data-toggle="tab">Personal</a></li>
                  <li class="nav-item"><a class="nav-link" href="#compra" data-toggle="tab">Datos de Compra</a></li>
                  <li class="nav-item"><a class="nav-link" href="#seguridad" data-toggle="tab">Seguridad</a></li>
                  <li class="nav-item"><a class="nav-link" href="#cuenta" data-toggle="tab">Cuenta</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="hola">
                    <h2>Bienvenid@</h2>
                    <br>
                  </div>
                  <!-- /.tab-pane -->

                  <div class=" tab-pane" id="imagen">
                    <h2>Imagen de Perfil</h2>
                    <br> 
                    <form class="form-horizontal" action="?c=Perfiles&a=cambiarImagenPerfiles" method="POST" enctype="multipart/form-data">
                      <div id="imagenPerfil" class="form-group">
                        <input type="hidden" name="persona_id" value="1">
                        <label for="imagen"><strong>* </strong>Cargar una Imagen (JPG,JPEG, PNG) (No se aceptan otros Formatos)</label>
                        <input type="file" class="form-control-file btn btn-warning" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg" required>
                      </div>    
                      <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-secondary">Cambiar Foto</button>
                          </div>
                      </div>
                    </form>        
                  </div>
                  <!-- /.tab-pane -->
                  <div class=" tab-pane" id="compra">
                    <!-- The timeline -->
                    <h2>Datos de Compra</h2>
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

                  <div class="tab-pane" id="personal">
                      <h2>Información Personal</h2>
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

                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="seguridad">
                    <h2>Información de seguridad</h2>
                    <br>
                    <h4>¿Quieres cambiar tú contraseña?</h4>
                    <br>
                    <form class="form-horizontal">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Contraseña Antiguo</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control"  name="passold" id="passold" placeholder="*******">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Contraseña Nueva</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="passnew" id="passnew" placeholder="*******">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Repite Contraseña</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="passnew2" id="passnew2" placeholder="*********">
                        </div>
                      </div>                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Cambiar Contraseña</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class=" tab-pane" id="cuenta">
                    <h2>¿Qué desea hacer con su cuenta?</h2>
                    <br> 
                    
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-warning">Desactivar Cuenta</button>
                        </div>
                    </div>    
                    
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
                        </div>
                    </div> 
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
  