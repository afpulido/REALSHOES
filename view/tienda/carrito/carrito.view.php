<!-- Breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="?">Tienda<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="#">Carrito de Compras</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
				
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
								<th>DESCRIPCIÓN</th>
								<th class="text-center">CANTIDAD</th>
								<th class="text-center">PRECIO UNITARIO</th>
								<th class="text-center">SUBTOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							<!--- inicio primer producto-->
							<?php 
							/* calculando valores de pedido y factura */
								$ctotal=0;
								$subtotal=0;
								$subtotalPedido = 0;
								$descuento = 10;
								$descuentototal = 0;
								$iva= 19 ;
								$ivatotal=0;
								$totalPago = 0;
								

								foreach($productosCarrito as $carrito):
									$ctotal =$ctotal+$carrito->getCantidad();
									$subtotal = $subtotal + ($carrito->getCantidad()*$carrito->getPrecioUnitario());
									$subtotalPedido = number_format($subtotal, 2, ',', '.');
									
									
							?>

							<input type="number" hidden name="psp_id" value="<?=$carrito->getPersonaSeleccionaProductoId()?>">
							<tr>
								<td class="image" data-title="No"><img src="../../assets/img/dashboard/img/productos" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#"></a></p>
									<p class="product-des">Botas en cuero para damas color "Negro", Talla 36</p>
								</td>
								
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
									
										<!-- <input type="numeric" class="input-number" name="cantidad" id="cantidad"  value=""> -->
								
										<!-- <div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div> -->
										<input type="text" name="quant[1]" id="cantidad" class="input-number"  data-min="1" data-max="1000" value="<?= $carrito->getCantidad()?>">
										<!-- <div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button> -->
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="price" data-title="Price" id="punitario"><span>$<?= $carrito->getPrecioUnitario()?> </span></td>
								<td class="total-amount" data-title="Total" id="subtotal"><span>$<?php echo $carrito->getCantidad()*$carrito->getPrecioUnitario()?></span></td>
								<td class="action" data-title="Remove"><a href="?c=Carritos&a=quitarProductoCarritos&psp=<?= $carrito->getPersonaSeleccionaProductoId()?>"><i class="ti-trash remove-icon"></i></a></td>
							</tr>

							<!--- Fin primer producto-->
							<?php endforeach ?>
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
										<li>Total Productos<span><?php echo $ctotal?></span>
										</li>
										<li>Subtotal<span>$<?php echo $subtotalPedido;?></span></li>
										<li>Descuento (<?=$descuento?> %)<span>(-) $<?php 
											$descuentototal = ($subtotal* $descuento)/100;
											echo $subtotalPedido = number_format($descuentototal, 2, ',', '.');?></span>
										</li>
										<li>IVA (<?=$iva?> %)<span>(+) $<?php
											$ivatotal=($subtotal*$iva)/100;
											echo $subtotalPedido = number_format($ivatotal, 2, ',', '.');?></span>
										</li>
										<li class="last">Total a Pagar<span>
											<strong>$
											<?php 
											$totalPago = $subtotal - $descuentototal + $ivatotal;
											echo $subtotalPedido = number_format($totalPago, 2, ',', '.');
											?>
											</strong></span></li>
									</ul>
									<div class="button5">
										<a href="checkout.php" class="btn">PAGAR</a>
										<a href="?" class="btn">CONTINUAR COMPRANDO</a>
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
		<!-- End Shop Services Area  -->
		
	
	<!-- Modal -->
    <!-- Modal end -->


