<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
     
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" >
                <ul class="nav nav-pills">
                
                    <li class="nav-item"><a class="nav-link active" id="#nuevo" href="?c=Productos&a=registrarProductos" >Nuevo </a></li>
                  <li class="nav-item"><a class="nav-link " id="#todos" href="?c=Productos&a=consultarTodosProductos" >Mostrar Todos</a></li>
                  <li class="nav-item"><a class="nav-link disabled" id="#activos" href="?c=Productos&a=actualizarProductos" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class=" active tab-pane" id="nuevo">
                                  <!-- ?c=Productos&a=registrarProductos -->
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data"> 
                      <input type="hidden" name="id" value="">
                      <div class="form-group row">
                          <input type="hidden" name="id" value="">
                          <div class="col-sm-3">
                            <label for="inputName" class="col-form-label">Nombre</label>
                            <input type="text" class="form-control"  name="nombre" id="nombre" placeholder="" value="" required>
                          </div>
                          <div class="col-sm-7">
                            <label for="inputName" class="col-sm col-form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="" value="" required>
                          </div>
                      </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Estado <span>*</span></label> 
                            <select  class="form-control" id="estado" name="estado" placeholder="Seleccione:" required>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                          </div>

                          <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Tipo <span>*</span></label> 
                                <select  class="form-control" id="tipo" name="tipo" placeholder="Seleccione:" required>
                                    
                                    <option value="0">Seleccione Tipo:</option>
                                    <option value="1">Tenis</option>
                                    <option value="2">Sandalia</option>
                                    <option value="3">Bota</option>
                                    <option value="4">Zapato en Gamusa</option>
                                    <option value="5">Zapato en Cuero</option>
                                    <option value="6">Zapato Informal</option>
                                    <option value="7">Zapato Formal</option>
                                </select>
                          </div>
                          <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Marca<span>*</span></label> 
                                <select  class="form-control" id="marca" name="marca" placeholder="" required>
                                    <option value="1">Real Shoes</option>
                                    <option value="2">Adidas</option>
                                </select>
                          </div>
                          <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Colección<span>*</span></label> 
                                <select  class="form-control"id="coleccion" name="coleccion" placeholder="" required>
                                    <option value="0">Seleccione Colección:</option>
                                    <option value="1">Primavera</option>
                                    <option value="2">Verano</option>
                                    <option value="3">Otoño</option>
                                    <option value="4">Invierno</option>
                                </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Genero<span>*</span></label> 
                                <select  class="form-control" id="genero" name="genero" placeholder="" required>
                                    <option value="0">Seleccione Genero:</option>
                                    <option value="1">Damas</option>
                                    <option value="2">Caballeros</option>
                                    <option value="3">Infantil</option>
                                    
                                </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Talla<span>*</span></label> 
                                <select  class="form-control" id="talla" name="talla" placeholder="" required>
                                    <option value="0">Seleccione Talla:</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                </select>
                        </div>
                      </div>
                      <div class="form-group row">
                      <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Inventario<span>*</span></label> 
                                <select  class="form-control" id="inventario" name="inventario" placeholder="" required>
                                    <option value="0">Seleccione Inventario:</option>
                                    <option value="1">Productos</option>
                                    <option value="2">Heramientas</option>
                                    <option value="3">Accesorios</option>
                                    
                                </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="inputName" class="col-form-label">Cantidad</label>
                            <input type="number" class="form-control"  name="cantidad" id="cantidad" placeholder="" value="" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="pcompra" class="col-form-label">Precio de Compra</label>
                            <input type="number" class="form-control"  name="pcompra" id="pcompra" placeholder="" value="0" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="ganancia" class="col-form-label">% Ganancia</label>
                            <input type="number" class="form-control"  name="ganancia" id="ganancia" placeholder="" value="30" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="pventa" class="col-form-label">Precio de Venta</label>
                            <input type="number" class="form-control"  name="pventa" id="pventa" placeholder="" value="" readonly required>
                        </div>
                      </div>
                      
                      <fieldset>
                          <legend>Imagenes del producto <h6>(Ingrese al menos una imagen del producto )</h6></legend>
                      <div class="form-group row">
                        
                            <div class="col-sm-5">
                              <label for="inputName" class="col-form-label">Imagen Producto Frontal*</label>
                              <input type="file" class="form-control-file btn btn-outline-warning" name="imagen1" id="imagen1" accept=".jpg, .jpeg, .png" placeholder="" value="" required>
                            </div>
                            <div class="col-sm-5">
                              <label for="inputName" class="col-form-label">Imagen Producto Lateral</label>
                              <input type="file" class="form-control-file btn btn-outline-warning" name="imagen2" id="imagen2" accept=".jpg, .jpeg, .png" placeholder="" value="">
                            </div>
                            <div class="col-sm-5">
                              <label for="inputName" class="col-form-label">Imagen Producto superior</label>
                              <input type="file" class="form-control-file btn btn-outline-warning" name="imagen3" id="imagen3" accept=".jpg, .jpeg, .png" placeholder="" value="">
                            </div>
                            <div class="col-sm-5">
                              <label for="inputName" class="col-form-label">Imagen Producto Inferior</label>
                              <input type="file" class="form-control-file btn btn-outline-warning" name="imagen4" id="imagen4" accept=".jpg, .jpeg, .png" placeholder="" value="">
                            </div>
                      </div>
                      </fieldset>
                        
                      
                      
                      
                      <div class="form-group row">
                        <div class="offset-sm-1 col-sm-1">
                          <button type="submit" class="btn btn-info">Nuevo</button>
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