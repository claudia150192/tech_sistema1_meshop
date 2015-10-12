	<!--<div id="page-title">
		<h1 class="page-header text-overflow">Producto</h1>
	</div>-->
	<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel">
					<!--Panel heading-->
					<div class="panel-heading">
						<h3 class="panel-title">Ventas Anuladas</h3>
					</div>
					<!--Panel body-->
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="lista">
								<table id="tbl_venta" class="table table-striped table-bordered" cellspacing="0" width="100%"
								data-source="<?php echo base_url();?>venta/anular_venta/get_ventas_anuladas/">
									<thead>
										<tr>
											<th>Nro Venta</th>
											<th>Cliente</th>
											<th>Fecha Reg.</th>
											<th>Monto Total</th>
											<th>Documento</th>
											<th>Forma Pago</th>
											<th>Usuario</th>
											<th>Estado</th>
										</tr>
									</thead>
									<thead>
										<tr>
											<th class="input">
												<input type="text" placeholder="Nro" class="search_init form-control col-sm-3" style="width: 100%" />
											</th>
											<th class="input">
												<input type="text" placeholder="Cliente" class="search_init form-control col-sm-3" style="width: 100%"/>
											</th>
											<th class="input">
												<input type="text" placeholder="Fecha Reg" class="search_init form-control col-sm-3" style="width: 100%"/>
											</th>
											<th class="input">
												<input type="text" placeholder="Monto Total" class="search_init form-control col-sm-3" style="width: 100%" />
											</th>
											<th class="input">
												<input type="text" placeholder="Documento" class="search_init form-control col-sm-3"  style="width: 100%"/>
											</th>
											<th class="customselect">
												<select class="form-control col-sm-3">
													<option value="">Todos</option>
													<option value="Credito">Credito</option>
													<option value="Contado">Contado</option>
												</select>
											</th>
											<th>
											</th>
											<th>
											</th>									
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
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