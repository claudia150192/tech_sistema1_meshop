<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel">
					<!--Panel heading-->
					<div class="panel-heading">
						<h3 class="panel-title">Pagos pendientes</h3>
					</div>
					<!--Panel body-->
					<div class="panel-body">
						<div class="panel">
							<div class="panel-body">
								<div class="row">
									<div class="form-horizontal">
										<div class="row">
											<div class="col-sm-3">
											</div>
											<div class="col-sm-4">
												<div class="input-group mar-btm">
													<!--<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
													<input type="text" class="form-control add-tooltip" placeholder="Fecha Busqueda" id="fechaDia" name="fechaDia" 
													readonly="true" data-placement="bottom" data-toggle="tooltip" data-original-title="Fecha Búsqueda">-->
													<div class="input-daterange input-group" id="datepicker">
														<input type="text" class="form-control add-tooltip" name="start" 
														data-placement="bottom" data-toggle="tooltip" data-original-title="Fecha Inicio"/>
														<span class="input-group-addon">to</span>
														<input type="text" class="form-control add-tooltip" name="end" data-placement="bottom" data-toggle="tooltip" data-original-title="Fecha Fin"/>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<button class="btn btn-info" id="btn-dia" type="button"><i class="fa fa-search"></i>&nbsp;&nbsp;Seleccionar Cliente</button>
												</div>
											</div>
											<!-- Seccion Modal -->
											<div class="modal fade" id="modal-cliente" role="dialog" tabindex="-1" aria-labelledby="Cliente" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button id="btn-close-modal-cliente" data-dismiss="modal" class="close" type="button">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title">Buscar Cliente</h4>
														</div>
														<div class="modal-body">
															<!-- table table-striped table-bordered bootstrap-datatable datatable -->
															<table id="tbl_cliente" class="table table-striped table-bordered" cellspacing="0" width="100%">
																<thead>
																	<tr>
																		<th>DNI</th>
																		<th>RUC</th>
																		<th>Cliente</th>
																	</tr>
																</thead>
																<tbody>
																</tbody>
															</table>
														</div>
														<div class="modal-footer">
															<button data-dismiss="modal" class="btn btn-default" id="btnSalir-modal-cliente" type="button">Salir</button>
															<button data-dismiss="modal" class="btn btn-primary" id="btn_seleccionar_cliente" type="button">Seleccionar</button>
														</div>
													</div>
												</div>
											</div>
											<!-- fin -->
										</div>
									</div>
									<hr/>
									<div class="col-xs-12 table-responsive">
			                            <table id="tabla_resumen_productos" class="table table-striped table-bordered">
											<thead >
												<tr>
													<th>Nro Venta</th>
													<th>Cliente</th>
													<th>Personal</th>
													<th>Fecha Emisión&nbsp;&nbsp;</th>
													<th>Monto Total&nbsp;&nbsp;</th>
													<th>Monto Cancelado&nbsp;</th>
													<th>Saldo Pendiente&nbsp;&nbsp;</th>
													<th>Documento&nbsp;&nbsp;</th>
													<th>Forma Pago&nbsp;&nbsp;&nbsp;</th>
													<th>Estado&nbsp;&nbsp;</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<a href="<?php echo base_url() ?>view/registro_venta/" class="btn btn-success btn-flat"> <i class="fa fa-reply"></i>
									Volver
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->