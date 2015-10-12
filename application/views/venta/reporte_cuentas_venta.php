<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Reporte Cuentas</h3>
					</div>
					<div class="panel-body">
						<div class="panel">
							<div class="panel-body">
								<div class="row">
									<div class="form-horizontal">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-4">
												<div class="input-group mar-btm">
													<div class="input-daterange input-group" id="datepicker">
														<input type="text" class="form-control add-tooltip" id="start" name="start" 
														data-placement="top" data-toggle="tooltip" data-original-title="Fecha Inicio"/>
														<span class="input-group-addon">a</span>
														<input type="text" class="form-control add-tooltip" id="end" name="end" data-placement="top" data-toggle="tooltip" data-original-title="Fecha Fin"/>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<select class="selectpicker" data-live-search="true" data-width="100%" id="cboCliente">
														<option value="-1">Todos</option>
														<?php 
															foreach ($lista_clientes as $key => $row) {
																echo "<option value='".$row->id."'>".trim($row->cliente)."</option>";
															}
														?>
													</select>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<button class="btn btn-info" id="btn-buscar" type="button"><i class="fa fa-search"></i>&nbsp;&nbsp;Consultar</button>
												</div>
											</div>
										</div>
									</div>
									<hr/>
									<div class="col-xs-12 table-responsive">
			                            <table id="tabla_cuentas_ventas" class="table table-striped table-bordered">
											<thead >
												<tr>
													<th>Nro Venta</th>
													<th>Cliente</th>
													<th>Personal</th>
													<th>Fecha Reg.&nbsp;&nbsp;</th>
													<th>Monto Tot. $.&nbsp;&nbsp;</th>
													<th>Monto Canc. $.&nbsp;</th>
													<th>Saldo Pend. $.&nbsp;&nbsp;</th>
													<th>Documento&nbsp;&nbsp;</th>
													<th>Forma Pago&nbsp;&nbsp;&nbsp;</th>
													<th>Estado&nbsp;&nbsp;</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>

									<!-- Seccion Modal -->
									<div class="modal fade" id="modal-pago" role="dialog" tabindex="-1" aria-labelledby="Detalle Pagos" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button id="btn-close-modal-cliente" data-dismiss="modal" class="close" type="button">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title">Detalle Pago</h4>
												</div>
												<div class="modal-body">
													<div class="col-sm-2">
														<div class="form-group">
															<input type="text" class="form-control hidden" id="id" name="id"/>
															<input type="text" class="form-control add-tooltip" id="nro_cuota" placeholder="Nro"
															 name="nro_cuota" data-placement="top" data-toggle="tooltip" data-original-title="Nro Cuota" readonly="true" />
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<input type="text" class="form-control add-tooltip" id="pago_cuota" name="pago_cuota" 
															placeholder="0.0"
															data-placement="top" data-toggle="tooltip" data-original-title="Pago Cuota"/>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<button class="btn btn-dark" id="btn-pagar" type="button"><i class="fa fa-money"></i>&nbsp;&nbsp;Pagar</button>
														</div>
													</div>
													<table id="tbl_detalle_pago" class="table table-striped table-bordered" cellspacing="0" width="100%">
														<thead>
															<tr>
																<th>Nro Cuota</th>
																<th>Fecha Inicio</th>
																<th>Fecha Pago</th>
																<th>Cuota</th>
																<th>A Cuenta</th>
															</tr>
														</thead>
														<tbody>
														</tbody>
													</table>
												</div>
												<div class="modal-footer">
													<button data-dismiss="modal" class="btn btn-default" id="btnSalir-modal-pago" type="button">Salir</button>
												</div>
											</div>
										</div>
									</div>
									<!-- fin -->

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