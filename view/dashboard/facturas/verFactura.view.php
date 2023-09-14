
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> NOTA:</h5>
              Esta pagina ha sido adaptada para imprimir. Da click en el boton "Imprimir".
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <img src="assets/img/tienda/favicon.png" alt="" sizes="100" srcset=""> Real Shoes
                    <!-- <small class="text-center">FACTURA DE VENTA</small> -->
                    <small class="float-right"><?= date("Y-m-d H:i:s");?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Vendedor
                  <address>
                    <strong>Real Shoes S.A.S</strong><br>
                    Diagonal 23 A Sur 14 - 7<br>
                    Bogotá, Colombia<br>
                    Teléfono:(+57) (601) 123-5432<br>
                    Email: ventas@realshoes.com.co
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Cliente
                  <address>
                    <strong>John Doe</strong><br>
                    Direccion<br>
                    Bogotá, Colombia<br>
                    Teléfono: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>FACTURA DE VENTA <br>FV00<?=$idf?></b><br>
                  <br>
                  <b>No. Pedido:</b> P00<?=$fv->getPedidoId()?><br>
                  <b>Fecha de Creación:</b> <?=$fv->getFechaCreacion()?><br>
                  <b>Identificación:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Descripción</th>
                      <th>Cantidad</th>
                      <th>Precio Unitario</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
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
                        
                        foreach($nproductos as $factura):
                          $ctotal =$ctotal+$factura->getCantidad();
                          $subtotal = $subtotal + ($factura->getCantidad()*$factura->getPrecioUnitario());
                          $subtotalPedido = number_format($subtotal, 2, ',', '.');  
                      ?>
                    <tr>
                      <td></td>
                      <td>El snort testosterone trophy driving gloves handsome</td>
                      <td><?= $factura->getCantidad() ?></td>
                      <td>$<?= $factura->getPrecioUnitario()?></td>
                      <td>$<?php echo $factura->getCantidad()*$factura->getPrecioUnitario()?> </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Estado de Pago: <strong><?=$fv->getEstado()?></strong></p>
                  <p class="lead">Metodos de Pago: </p>
                  <img src="../../../assets/dashboard/dist/img/credit/visa.png" alt="Visa">
                  <img src="../../../assets/dashboard/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../../assets/dashboard/dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../../assets/dashboard/dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   <br>
                   <strong>Gracias por su Compra!</strong>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Fecha: <strong><?=$fv->getUltimaModificacion()?></strong></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Cantidad Productos:</th>
                        <td><?php echo $ctotal?></td>
                      </tr>
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>(+) $<?php echo $subtotalPedido;?></td>
                      </tr>
                      <tr>
                        <th>Descuento (<?=$descuento?> %)</th>
                        <td>(-) $<?php $descuentototal = ($subtotal* $descuento)/100;
											    echo $subtotalPedido = number_format($descuentototal, 2, ',', '.');?>
                        </td>
                      </tr>
                      <tr>
                        <th>IVA (<?=$iva?> %)</th>
                        <td>(+) $<?php $ivatotal=($subtotal*$iva)/100;
											    echo $subtotalPedido = number_format($ivatotal, 2, ',', '.');?>
                        </td>
                      </tr>
                      
                      <tr>
                        <th>Total a pagar:</th>
                        <td><strong>$
                            <?php 
                            $totalPago = $subtotal - $descuentototal + $ivatotal;
                            echo $subtotalPedido = number_format($totalPago, 2, ',', '.');
                            ?>
											</strong>

                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="?c=Facturas&a=imprimirFacturas&facturas_id=<?=$idf?>" rel="noopener" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-print"></i> Imprimir
                  </a>
                  
                  <button type="button" class="btn btn-danger float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generar PDF
                  </button>
                  
                  <a href="?c=Facturas&a=consultarTodasFacturas" class="btn btn-success float-right" style="margin-right: 5px;">
                  <i class="fas fa-arrow-alt-circle-left"></i> Átras
                  </a>

                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>