<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
     
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" >
                <ul class="nav nav-pills">
                
                  <li class="nav-item"><a class="nav-link active" id="#nuevo" href="?c=Personas&a=registrarPersonas" >Nuevo </a></li>
                  <li class="nav-item"><a class="nav-link " id="#empleados" href="?c=Personas&a=consultarTodosEmpleados" >Mostrar Empleados</a></li>
                  <li class="nav-item"><a class="nav-link " id="#clientes" href="?c=Personas&a=consultarTodosClientes" >Mostrar Clientes</a></li>
                  <li class="nav-item"><a class="nav-link " id="#todos" href="?c=Personas&a=consultarTodosPersonas" >Mostrar todos los Usuarios</a></li>
                  <li class="nav-item"><a class="nav-link disabled" id="#activos" href="?c=Personas&a=actualizarPersonas" >Actualizar</a></li>

                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="nuevo">

                  <h1> En esta area de <?=$pagina?> puede hacer todo lo relacionado:</h1>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="actualizar">
    
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