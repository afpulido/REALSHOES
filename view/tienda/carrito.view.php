
				
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCTO</th>
								<th>DESCRIPCIÒN</th>
								<th class="text-center">PRECIO UNITARIO</th>
								<th class="text-center">CANTIDAD</th>
								<th class="text-center">SUBTOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							<!--- inicio primer producto-->
							<tr>
								<td class="image" data-title="No"><img src="https://via.placeholder.com/100x100" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#">Botàs dama</a></p>
									<p class="product-des">Botas en cuero para damas color "Negro", Talla 36</p>
								</td>
								<td class="price" data-title="Price"><span>$110.00 </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="1">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>$330.000</span></td>
								<td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
							<!--- inicio primer producto-->
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										
									</div>
									<div class="checkbox">
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Subtotal<span>$330.00</span></li>
										<li>Descuento<span>$10.000</span></li>
										<li>IVA<span>$20.00</span></li>
										<li class="last">Total a Pagar<span>$340.00</span></li>
									</ul>
									<div class="button5">
										<a href="checkout.php" class="btn">PAGAR</a>
										<a href="tienda.view.php" class="btn">CONTINUAR COMPRANDO</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Ofertas Especial</h4>
						<p>Nuestros clientes acceden a increibles descuentos</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Periodo de Garantìa</h4>
						<p>Puedes devolver el producto en antes de 7 dìas<p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Compra Segura</h4>
						<p>100% Confiable</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Los mejores Precios</h4>
						<p>Del mercado!</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
		<!-- End Shop Services Area  -->
		
	
	<!-- Modal -->
        <?php include_once '../plantillas/tienda/tienda.modal.view.php';?>
    <!-- Modal end -->


