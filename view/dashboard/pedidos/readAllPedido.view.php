<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
     
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" >
                <ul class="nav nav-pills">
                
                    <li class="nav-item"><a class="nav-link" id="#nuevo" href="?c=Pedidos&a=registrarPedidos" >Nuevo </a></li>
                  <li class="nav-item"><a class="nav-link active " id="#todos" href="?c=Pedidos&a=consultarTodosPedidos" >Mostrar Todos</a></li>
                  <li class="nav-item"><a class="nav-link disabled" id="#activos" href="?c=Pedidos&a=actualizarPedidos" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
      

                  <div class="active tab-pane" id="todos">
                    <table id="tablamostraractivos" class="display table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>No. Pedido</th>
                                <th>Cant. Productos</th>
                                <th>Subtotal</th>
                                <th>Metodo Pago</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Creación</th>
                                <th>Actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Se usa if para validar el estatus de un pedido -->

                            
                            <?php
                            if($pedidosc===null){
                              header("Location: ?c=Pedidos&a=registrarPedidos");
                            }                       
                            foreach ($pedidosc as $pedido) :?>
                            <tr>
                                <td>P00<?= $pedido->getPedidoId();?></td>
                                <td><?= $pedido->getCantidad();?></td>
                                <td>$<?= $pedido->getSubtotal();?></td>
                                <td><?php if($pedido->getMetodoPagoId()==1){
                                      echo "Efectivo";
                                    } elseif($pedido->getMetodoPagoId()==2){
                                      echo "Tarjeta de Crédito";
                                    } elseif($pedido->getMetodoPagoId()==3){
                                      echo "Tarjeta Débito";
                                    } elseif($pedido->getMetodoPagoId()==4){
                                      echo "Mercado Pago";
                                    } else?></td>
                                <td>
                                    <?php if($pedido->getFechaEliminacionDesactivacion() == null){ ?>
                                        <a href="?c=Pedidos&a=actualizarStatusPedidos&pedido_id=<?php echo $pedido->getPedidoId()?>&deleted=<?php echo $pedido->getFechaEliminacionDesactivacion()?>" class="btn btn-success" alt="Rol Activo">
                                            <i class="fas fa-check-circle"></i>
                                        </a>
                                    <?php  }else{ ?>    
                                        <a href="?c=Pedidos&a=actualizarStatusPedidos&pedido_id=<?php echo $pedido->getPedidoId()?>&deleted=<?php echo $pedido->getFechaEliminacionDesactivacion()?>" class="btn btn-danger" alt="Rol Inactivo">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    <?php  }?>                                  
                                </td>
                                <td><?= $pedido->getFechaEliminacionDesactivacion();?></td>
                                <td><?= $pedido->getFechaCreacion();?></td>
                                <td><?= $pedido->getUltimaModificacion();?></td>
                                <td>
                                    <!-- <button type="button" class="btn btn-primary"> -->
                                        <a href="?c=Pedidos&a=actualizarPedidos&pedido_id=<?php echo $pedido->getPedidoId() ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a> 
                                    <!-- </button> -->
                                        <a href="?c=Pedidos&a=eliminarPedidos&pedido_id=<?php echo $pedido->getPedidoId()?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                </td>
                            
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                              <th>No. Pedido</th>
                              <th>Cant. Productos</th>
                              <th>Subtotal</th>
                              <th>Metodo Pago</th>
                              <th>Estado</th>
                              <th>Fecha</th>
                              <th>Creación</th>
                              <th>Actualización</th>
                              <th>Acciones</th>
                          </tr>
                        </tfoot>
                    </table>




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
     
     
     
     
     