<!-- Preloader -->
	<!-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> -->
	<!-- End Preloader -->


<!-- Header -->
<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +57 601 311 474 92</li>
								<li><i class="ti-email"></i> soporte@realshoes.com.co</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-7 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-face-smile"></i>Bienvenido! <strong>"<?php echo $usuario;?>" </strong></li>
								<li><i class="ti-user"></i><a href="?c=Login">Iniciar sesión</a></li>
								<li><i class="ti-write"></i><a href="?c=Registrarse">Registrarse</a></li>
								<?php
								if($usuario=='USUARIOLOGUEADO'){
										/* Acá va el menú USUARIO LOGUEADO */
								}else{
									/* Acá va el menú USUARIO INVITADO */	
								}
								?>
								<li><i class="ti-desktop"></i> <a href="?c=Dashboard">Dashboard</a></li>
								<li><i class="ti-lock"></i> <a href="?c=Logout">Cerrar Sesión</a></li>
								
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="?"><img src="assets/img/tienda/logo.png" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Buscar productos" name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-7 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<select>
									<option selected="selected">Productos</option>
									<option>Colecciones</option>
									<option>Damas</option>
									<option>Caballeros</option>
									<option>Infantil</option>
								</select>
								<form>
									<input name="search" placeholder="Que desea buscar" type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<!-- <div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Cerrar sesión</a>
							</div> -->
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?php echo $nproductos;?></span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span><?php echo $nproductos?> Elementos</span>
										<a href="?c=Tiendas&a=carrito">Ver Carrito</a>
									</div>
									<ul class="shopping-list">
										<li>
											<a href="#" class="remove" title="Eliminar este producto"><i class="fa fa-trash" aria-hidden="true"></i></a>
											<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
											<h4><a href="#">Tenis Damas</a></h4>
											<p class="quantity">1x - <span class="amount">$99.000</span></p>
										</li>
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount">$134.000</span>
										</div>
										<a href="?c=Tiendas&a=caja" class="btn animate">Comprar</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							<div class="all-category">
								<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>Productos</h3>
								<ul class="main-category">
									<li><a href="?c=Tiendas&a=colecciones">Colecciones</a></li>
									<li><a href="?c=Tiendas&a=damas">Damas</a></li>
									<li><a href="?c=Tiendas&a=caballeros">Caballeros</a></li>
									<li><a href="?c=Tiendas&a=infantil">Infantil</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="?">Inicio</a></li>											
													<li><a href="?c=Tiendas&a=quienes">¿Quienes Somos?</a></li>
													<li><a href="?c=Tiendas&a=contactenos">contáctenos</a></li>
													<li><a href="#">Compras<i class="ti-angle-down"></i><span class="new">Nuevo</span></a>
														<ul class="dropdown">
															<li><a href="?c=Tiendas&a=productos">Productos</a></li>
															<li><a href="?c=Tiendas&a=carrito">Carrito de Compras</a></li>
															<li><a href="?c=Tiendas&a=caja">Caja</a></li>
														</ul>
													</li>
													<!-- <li><a href="#">Pages</a></li>									
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.../../l">Blog Single Sidebar</a></li>
														</ul>
													</li> -->
													
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

	<!-- Breadcrumbs -->
	<!-- <div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li>Inicio<i class="ti-arrow-right"></i></a></li>
							<li><?php echo $pagina;?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- End Breadcrumbs -->