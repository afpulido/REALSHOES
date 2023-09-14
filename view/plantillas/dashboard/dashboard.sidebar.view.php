 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-collapse sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="?c=Dashboard" class="brand-link">
      <img src="assets/dashboard/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> Real Shoes</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dashboard/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Bienvenido!</a>
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!--- start menu perfil user-->
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active bg-lime">
              <i class="fas fa-user-cog"></i>
              <p>
                <?php echo $usuario ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="?c=Dashboard&a=perfiles" class="nav-link">
                  <i class="fas fa-tools"></i>
                    <p> Perfil</p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="?c=Logout" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>Cerrar Sesión</p>
                </a>
              </li>
            </ul>
          </li>
          <!--- end menu user perfil-->
             <hr>
          <!--- start menu users-->
          <li class="nav-item menu-close">
            <a href="?c=Dashboard&a=usuarios" class="nav-link active bg-warning">
              <i class="nav-icon fas fa-users-cog"></i>
    
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="?c=Personas&a=registrarPersonas" class="nav-link">
                  <i class="nav-icon fa fa-user-plus"></i>
                  <p>Nuevo Usuario</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="?c=Personas&a=consultarTodosPersonas" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>Mostrar Todos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?c=Personas&a=consultarTodosEmpleados" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>Mostrar Empleados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?c=Personas&a=consultarTodosClientes" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>Mostrar Clientes</p>
                  </a>
                </li>
              <!-- <li class="nav-item">
                <a href="?c=Dashboard&a=usuarios#actualizar" class="nav-link">
                  <i class="nav-icon fas fa-user-edit"></i>
                  <p>Actualizar Usuario</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!--- end menu users-->

          <!-- start menu roles -->
          <li class="nav-item menu-close">
            <a href="?c=Roles" class="nav-link active bg-danger">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Permisos & Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="?c=Roles&a=consultarTodosRoles" class="nav-link">
                  <i class="nav-icon fas fa-user-clock"></i>
                    <p>Mostrar Roles</p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="?c=Roles&a=registrarRoles" class="nav-link">
                <i class="nav-icon fas fa-user-nurse"></i>
                  <p>Nuevo Rol</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="?c=Dashboard&a=roles#actualizar" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Actualizar Rol</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- end Roles menu -->

          <!-- start menu products -->
          <li class="nav-item menu-close">
            <a href="?c=Productos" class="nav-link active bg-success">
              <i class="nav-icon fas fa-shoe-prints"></i>
    
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="?c=Productos&a=consultarTodosProductos" class="nav-link">
                  <i class="nav-icon fas fa-suitcase-rolling"></i>
                    <p>Mostrar Productos</p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="?c=Productos&a=registrarProductos" class="nav-link">
                <i class="nav-icon fas fa-suitcase"></i>
                  <p>Nuevo Producto</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="?c=Dashboard&a=productos#actualizar" class="nav-link">
                  <i class="nav-icon fas fa-luggage-cart"></i>
                  <p>Actualizar Producto</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- end products menu -->

          <!-- start menu inventory -->
          <li class="nav-item menu-close">
            <a href="?c=Inventariosd" class="nav-link active bg-purple">
              <i class="nav-icon fas fa-warehouse"></i>
    
              <p>
                Inventarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="?c=Inventarios&a=consultarTodosInventarios" class="nav-link">
                  <i class="nav-icon fas fa-suitcase-rolling"></i>
                    <p>Mostrar Inventarios</p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="?c=Inventarios&a=registrarInventarios" class="nav-link">
                <i class="nav-icon fas fa-suitcase"></i>
                  <p>Nuevo Inventario</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="nav-icon fas fa-luggage-cart"></i>
                  <p>Actualizar Inventario</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- end inventory menu -->

          <!-- start menu sales -->
          <li class="nav-item menu-close">
            <a href="?c=Pedidos" class="nav-link active bg-orange">
              <i class="nav-icon fas fa-shopping-cart"></i>
    
              <p>
                Pedidos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="?c=Pedidos&a=consultarTodosPedidos" class="nav-link">
                  <i class="nav-icon fas fa-suitcase-rolling"></i>
                    <p>Mostrar Pedidos</p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="?c=Pedidos&a=registrarPedidos" class="nav-link">
                <i class="nav-icon fas fa-suitcase"></i>
                  <p>Nueva Venta</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-luggage-cart"></i>
                  <p>Actualizar Venta</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- end sales menu -->

          <!-- start menu shops -->
          <li class="nav-item menu-close">
            <a href="?c=Facturas" class="nav-link active bg-info">
              <i class="nav-icon fas fa-shopping-bag"></i>
    
              <p>
                Facturas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="?c=Facturas&a=consultarTodasFacturas" class="nav-link">
                  <i class="nav-icon fas fa-suitcase-rolling"></i>
                    <p>Mostrar Facturas</p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="?c=Facturas&a=registrarFacturas" class="nav-link">
                <i class="nav-icon fas fa-suitcase"></i>
                  <p>Nueva Compra</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-luggage-cart"></i>
                  <p>Actualizar Compra</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- end shop menu -->

          <!-- start menu reports -->
          <li class="nav-item menu-close">
            <a href="?c=Reportes" class="nav-link active bg-pink">
              <i class="nav-icon fas fa-chart-bar"></i>
    
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="?c=Reportes&a=consultarTodosReportes" class="nav-link">
                  <i class="nav-icon fas fa-suitcase-rolling"></i>
                    <p>Mostrar Reportes</p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="?c=Reportes&a=registrarReportes" class="nav-link">
                <i class="nav-icon fas fa-suitcase"></i>
                  <p>Nuevo Reporte</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="nav-icon fas fa-luggage-cart"></i>
                  <p>Actualizar Reporte</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- end reports menu -->
          <hr>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>