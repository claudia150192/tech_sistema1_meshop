		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow">Dashboard</h1>
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->

		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
						<div class="col-sm-6 col-md-4">
							<div class="panel panel-dark panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Visit Today</p>
									<i class="fa fa-users fa-5x"></i>
									<hr>
									<p class="h2 text-thin">254,487</p>
									<small><span class="text-semibold">7%</span> Higher than yesterday</small>
								</div>
							</div>
						</div>
						~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<div class="col-sm-12 col-md-3" style="cursor:pointer" id="generar_venta">
							<div class="panel panel-primary panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Generar Venta</p>
									<i class="fa fa-shopping-cart fa-5x"></i>
									<hr>
									<p class="h2 text-thin"><?php echo $nro_venta;?></p>
									<small><span class="text-semibold"><i class="fa fa-shopping-cart fa-fw"></i><?php echo $nro_venta;?></span> Número de ventas Realizadas</small>
								</div>
							</div>
						</div>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
						<div class="col-sm-6 col-md-3" style="cursor:pointer" id="stock_producto">
							<div class="panel panel-danger panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Inventario</p>
									<i class="fa fa-dropbox fa-5x"></i>
									<hr>
									<p class="h2 text-thin"><?php echo $cant_producto;?></p>
									<small><span class="text-semibold"><i class="fa fa-dropbox fa-fw"></i> <?php echo $cant_producto;?></span> productos en stock</small>
								</div>
							</div>
						</div>
						~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<?php if($this->session->userdata('rol')=='1'){?>
						<div class="col-sm-6 col-md-3" style="cursor:pointer" id="reporte_cuentas">
							<div class="panel panel-success panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Estado Cuentas</p>
									<i class="fa fa-file-text fa-5x"></i>
									<hr>
									<p class="h2 text-thin">Ir a</p>
									<small><span class="text-semibold"><i class="fa fa-file-text fa-fw"></i></span>lista de cuentas</small>
								</div>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-3" style="cursor:pointer" id="pagos_pendientes">
							<div class="panel panel-warning panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Creditos</p>
									<i class="fa fa-money fa-5x"></i>
									<hr>
									<p class="h2 text-thin"><?php echo $nro_credito;?></p>
									<small><span class="text-semibold"><i class="fa fa-money fa-fw"></i><?php echo $nro_credito;?></span> Número de ventas Realizadas</small>
								</div>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-3" style="cursor:pointer" id="cuadre_caja">
							<div class="panel panel-dark panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Cuadre Caja</p>
									<i class="fa fa-5x"><?php echo $signo;?></i>
									<hr>
									<p class="h2 text-thin">Ir a</p>
									<small><span class="text-semibold"><i class="fa fa-fw"><?php echo $signo;?></i></span> Generar Cuadre Caja</small>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-3" style="cursor:pointer" id="estadistica">
							<div class="panel panel-purple panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Estadistica</p>
									<i class="fa fa-th-large fa-5x"></i>
									<hr>
									<p class="h2 text-thin">Ir</p>
									<small><span class="text-semibold"><i class="fa fa-dollar fa-fw"></i></span> Generar Gráficos</small>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12">
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
						</div>
					</div>
                    <?php }?>

					<!-- Seccion Modal -->
					<div class="modal fade" id="modal-cuadrecaja" role="dialog" tabindex="-1" aria-labelledby="Cuadre Caja" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button data-dismiss="modal" class="close" type="button">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title">Cuadre Caja</h4>
								</div>
								<div class="modal-body">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-5">
										<div class="input-group mar-btm">
											<input type="text" class="form-control add-tooltip" id="fecha" name="fecha"
											data-placement="top" data-toggle="tooltip" data-original-title="Fecha Busqueda"/>
											<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<button class="btn btn-dark" id="btn-generar" type="button"><i class="fa fa-money"></i>&nbsp;&nbsp;Generar</button>
										</div>
									</div>
								</div>
								<!--<div class="modal-footer">
									<button data-dismiss="modal" class="btn btn-default" id="btnSalir-Modal" type="button">Salir</button>
								</div>-->
							</div>
						</div>
					</div>
					
					<!-- fin -->

				</div>
			</div>
		</div>
		<!--===================================================-->
		<!--End page content-->
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->