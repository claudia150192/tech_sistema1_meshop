	<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-success">
					<!--Panel heading-->
					<div class="panel-heading">
						<div class="panel-control">
							<!--Nav tabs-->
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#dia">Por Día</a></li>
								<li><a data-toggle="tab" href="#mes">Por Mes</a></li>
								<li><a data-toggle="tab" href="#anio">Por Año</a></li>
							</ul>
						</div>
						<h3 class="panel-title">Consultar</h3>
					</div>
		
					<!--Panel body-->
					<div class="panel-body">
						<!--Tabs content-->
						<div class="tab-content">
							<div id="dia" class="tab-pane fade in active">
								<div class="panel">
									<!--===================================================-->
									<div class="form-horizontal">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-3">
												<div class="input-group mar-btm">
													<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
													<input type="text" class="form-control add-tooltip" placeholder="Fecha Busqueda" id="fechaDia" name="fechaDia" 
													readonly="true" data-placement="bottom" data-toggle="tooltip" data-original-title="Fecha Búsqueda">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="input-group mar-btm">
														<select class="selectpicker" id="cboTipoDia" name="cboTipoDia">
															<option value="1">Venta Contado</option>
															<option value="2">Venta Credito</option>
															<option value="3">Venta General</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<button class="btn btn-info" id="btn-dia" type="button"><i class="fa fa-search"></i>&nbsp;&nbsp;BUSCAR</button>
												</div>
											</div>
										</div>
									</div>
									<!--===================================================-->
								</div>
							</div>
							<div id="mes" class="tab-pane fade">
								<div class="panel">
									<!--===================================================-->
									<div class="form-horizontal">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-2">
												<div class="input-group mar-btm">
													<span class="input-group-addon"><i class="fa fa-table fa-lg"></i></span>
													<input type="text" class="form-control add-tooltip" placeholder="Año" id="fechaMesAnio" name="fechaMesAnio" 
													 data-placement="bottom" data-toggle="tooltip" data-original-title="Ingrese Año">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<div class="input-group mar-btm">
														<select class="selectpicker" id="cboSeleccionarMes" name="cboSeleccionarMes">
															<option value="1">Enero</option>
															<option value="2">Febrero</option>
															<option value="3">Marzo</option>
															<option value="4">Abril</option>
															<option value="5">Mayo</option>
															<option value="6">Junio</option>
															<option value="7">Julio</option>
															<option value="8">Agosto</option>
															<option value="9">Septiembre</option>
															<option value="10">Octubre</option>
															<option value="11">Noviembre</option>
															<option value="12">Diciembre</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<div class="input-group mar-btm">
														<select class="selectpicker" id="cboTipoMes" name="cboTipoMes">
															<option value="1">Venta Contado</option>
															<option value="2">Venta Credito</option>
															<option value="3">Venta General</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<button class="btn btn-info" id="btn-mes" type="button"><i class="fa fa-search"></i>&nbsp;&nbsp;BUSCAR</button>
												</div>
											</div>
											<div class="col-sm-2">
											</div>
										</div>
									</div>
									<!--===================================================-->
								</div>
							</div>
							<div id="anio" class="tab-pane fade">
								<div class="panel">
									<!--===================================================-->
									<div class="form-horizontal">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-3">
												<div class="input-group mar-btm">
													<span class="input-group-addon"><i class="fa fa-table fa-lg"></i></span>
													<input type="text" class="form-control add-tooltip" placeholder="Año" id="txt_anio" name="txt_anio" 
													 data-placement="bottom" data-toggle="tooltip" data-original-title="Ingrese Año">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<div class="input-group mar-btm">
														<select class="selectpicker" id="cboTipoAnio" name="cboTipoAnio">
															<option value="1">Venta Contado</option>
															<option value="2">Venta Credito</option>
															<option value="3">Venta General</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<button class="btn btn-info" id="btn-anio" type="button"><i class="fa fa-search"></i>&nbsp;&nbsp;BUSCAR</button>
												</div>
											</div>
										</div>
									</div>
									<!--===================================================-->
								</div>
							</div>
						</div>

						<table id="tbl_venta" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nro Venta</th>
									<th>Cliente</th>
									<th>Fecha Reg.</th>
									<th>Monto Total</th>
									<th>Documento</th>
									<th>Forma Pago</th>
									<th>Vendedor</th>
									<!--<th>Local</th>-->
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
									<!--<th>
									</th>-->
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
<!--===================================================-->
<!--END CONTENT CONTAINER-->