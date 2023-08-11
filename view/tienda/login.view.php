
<?php include('../plantillas/tienda/tienda.head.view.php'); ?>


<?php include('../plantillas/tienda/tienda.header.view.php');?>

<!-- Start login -->
<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-3 col-12">
							
						</div>
						<div class="col-lg-6 col-12">
							<div class="form-main">
								<div class="title">
									<h1 style="color: orange;">Iniciar sesión</h1>
									<br>
									<h3>Digite sus credenciales</h3>
								</div>
								<form class="form" method="post" action="">
									<div class="row">
										<div class="col-lg-8 col-12">
											<div class="form-group">
												<label>Correo<span>*</span></label>
												<input name="email" type="email" placeholder="Ingrese su Correo" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-8 col-12">
											<div class="form-group">
												<label>Contraseña<span>*</span></label>
												<input name="password" type="password" placeholder="Ingrese su contraseña" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-5 col-12">
											<div class="form-group">
												<a href="olvido.view.php">¿Olvido su contraseña?</a>
											</div>
										</div>
									
										<div class="col-lg-1 col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Ingresar</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-3 col-12">
							
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End login -->




<?php include('../plantillas/tienda/tienda.footer.view.php');?>
	

