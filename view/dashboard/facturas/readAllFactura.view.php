<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
     
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" >
                <ul class="nav nav-pills">
                
                    <li class="nav-item"><a class="nav-link" id="#nuevo" href="?c=Facturas&a=registrarFacturas" >Nuevo </a></li>
                  <li class="nav-item"><a class="nav-link active " id="#todos" href="?c=Facturas&a=consultarTodosFacturas" >Mostrar Todos</a></li>
                  <li class="nav-item"><a class="nav-link disabled" id="#activos" href="?c=Facturas&a=actualizarFacturas" >Actualizar</a></li>
                 
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
      

                  <div class="active tab-pane" id="todos">
                    <table id="tablamostraractivos" class="display compact " style="width:100%">
                        <thead>
                            <tr>
                                <th>Factura</th>
                                <th>Pedido</th>
                                <th>Descuento %</th>
                                <th>IVA %</th>
                                <th>Monto</th>
                                <th>Status</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Creación</th>
                                <th>Actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Se usa if para validar el estatus de un mostrar -->

                            
                            <?php
                            if($mostrarc===null){
                              header("Location: ?c=Facturas&a=registrarFacturas");
                            }                       
                            foreach ($mostrarc as $mostrar) :?>
                            <tr>
                                <td>FV00<?= $mostrar->getFacturaId();?></td>
                                <td>P00<?= $mostrar->getPedidoId();?></td>
                                <td>10</td>
                                <td>19</td>
                                <td>$<?= $mostrar->getMontoTotal();?></td>
                                <td><?= $mostrar->getEstado();?></td>
                                <td>
                                    <?php if($mostrar->getFechaEliminacionDesactivacion() == null){ ?>
                                        <a href="?c=Facturas&a=actualizarStatusFacturas&facturas_id=<?php echo $mostrar->getFacturaId()?>&deleted=<?php echo $mostrar->getFechaEliminacionDesactivacion()?>" class="btn btn-success" alt="Rol Activo">
                                            <i class="fas fa-check-circle"></i>
                                        </a>
                                    <?php  }else{ ?>    
                                        <a href="?c=Facturas&a=actualizarStatusFacturas&facturas_id=<?php echo $mostrar->getFacturaId()?>&deleted=<?php echo $mostrar->getFechaEliminacionDesactivacion()?>" class="btn btn-danger" alt="Rol Inactivo">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    <?php  }?>                                  
                                </td>
                                <td><?= $mostrar->getFechaEliminacionDesactivacion();?></td>
                                <td><?= $mostrar->getFechaCreacion();?></td>
                                <td><?= $mostrar->getUltimaModificacion();?></td>
                                <td>
                                    <a href="?c=Facturas&a=actualizarFacturas&facturas_id=<?php echo $mostrar->getFacturaId() ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a> 
                                
                                    <a href="?c=Facturas&a=verFacturas&facturas_id=<?php echo $mostrar->getFacturaId()?>" class="btn btn-warning">
                                      <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="?c=Facturas&a=imprimirFacturas&facturas_id=<?php echo $mostrar->getFacturaId()?>" class="btn btn-success">
                                      <i class="fas fa-print"></i>
                                    </a>
                                    <a href="?c=Facturas&a=eliminarFacturas&facturas_id=<?php echo $mostrar->getFacturaId()?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Factura</th>
                                <th>Pedido</th>
                                <th>Descuento %</th>
                                <th>IVA %</th>
                                <th>Monto</th>
                                <th>Status</th>
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
     
     
     
     
     