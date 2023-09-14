    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
						</div>
						<div class="modal-body">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<!-- Product Slider -->
										<div class="product-gallery">
										<div class="quickview-slider-active">
											<?php if($pcaballero->getProductoId()){
													$idproducto = $pcaballero->getProductoId() ?>
												<input type="hidden" name="producto_id" value="<?= $idproducto?>">

												<?php } elseif($pdama->getProductoId()){ 
													$idproducto = $pdama->getProductoId()?>
													<input type="hidden" name="producto_id" value="<?= $idproducto?>">
												
												<?php } elseif( $pinfantil->getProductoId()){
													$idproducto = $pinfantil->getProductoId()?>
													<input type="hidden" name="producto_id" value="<?= $idproducto?>">

												<?php }?>
												
												<div class="single-slider">
													<img src="../../assets/img/dashboard/productos/<?php echo $idproducto->getImagen1();?>" alt="#">
												</div>
												<div class="single-slider">
													<img src="../../assets/img/dashboard/productos/<?php echo $idproducto->getImagen2();?>" alt="#">
												</div>
												<div class="single-slider">
													<img src="../../assets/img/dashboard/productos/<?php echo $idproducto->getImagen3();?>" alt="#">
												</div>
												<div class="single-slider">
													<img src="../../assets/img/dashboard/productos/<?php echo $idproducto->getImagen4();?>" alt="#">
												</div>
											</div>
										</div>
									<!-- End Product slider -->
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="quickview-content">
										<h2>
											<?php $idproducto->getProductoId();?>
										</h2>
										<div class="quickview-ratting-review">
											
											<div class="quickview-stock">
												<span><i class="fa fa-check-circle-o"></i> En stock</span>
											</div>
										</div>
										<h3><?php echo "$". $idproducto->getValorVenta();?></h3>
										<div class="quickview-peragraph">
											<p><?php echo $pcaballero->getDescripcion();?></p>
											<br>
										</div>
										<div class="size">
											<div class="row">
												<div class="col-lg-6 col-12">
													<h5 class="title">Tamaño</h5>
													<input type="number" name="talla" min="18" max="42" required>
												</div>
												<div class="col-lg-6 col-12">
													<h5 class="title">Color</h5>
													<select>
														<option selected="selected">Negro</option>
														<option>Negro con Rojo</option>
														<option>Negro con Rojo</option>
														<option>Cafe</option>
														<option>Azul</option>
														<option>Rosado</option>
													</select>
												</div>
											</div>
										</div>
										<div class="quantity">
											<!-- Input Order -->
											<h5 class="title">Cantidad</h5>
											<div class="input-group">
												<div class="button minus">
													<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
														<i class="ti-minus"></i>
													</button>
												</div>
												<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
												<div class="button plus">
													<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
														<i class="ti-plus"></i>
													</button>
												</div>
											</div>
											<!--/ End Input Order -->
										</div>
										<div class="add-to-cart">
											<a href="#" class="btn">Agregar al Carrito</a>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>