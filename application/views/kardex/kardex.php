<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-success">
					<!--Panel heading-->
					<div class="panel-heading">
						<div class="panel-control">
							<!--Nav tabs-->
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#kadexx">Inventario</a></li>
							</ul>
						</div>
						<h3 class="panel-title">Resultado</h3>
					</div>
		
					<!--Panel body-->
					<div class="panel-body">
						<!--Tabs content-->
						<div class="tab-content">
							<div id="kadexx" class="tab-pane fade in active">
								<div class="panel">
									<!--===================================================-->
									<div class="form-horizontal">
										<div class="row">
											<div class="col-sm-2">
												<div class="input-group mar-btm">
													<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
													<input type="text" class="form-control add-tooltip" placeholder="Fecha Inicio" id="fechaI" name="fechaI" 
													readonly="true" data-placement="bottom" data-toggle="tooltip" data-original-title="Fecha Inicio">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="input-group mar-btm">
													<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
													<input type="text" class="form-control add-tooltip" placeholder="Fecha Fin" id="fechaF" name="fechaF" 
													readonly="true" data-placement="bottom" data-toggle="tooltip" data-original-title="Fecha Fin">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<select class="form-control" id="cboTodos" name="cboTodos" data-placement="bottom" data-toggle="tooltip" data-original-title="Tipo Operación">
														<option value="Todos">Todos</option>
														<option value="Ingreso">Ingreso</option>
														<option value="Salida">Salida</option>
													</select>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<button class="btn btn-info" id="btn-buscar" type="button"><i class="fa fa-search"></i>&nbsp;&nbsp;BUSCAR</button>
												</div>
											</div>
											<div class="col-sm-2">
											</div>
										</div>
									</div>
									<!--===================================================-->
								</div>
							</div>
						</div>

						<table id="tbl_kardex" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Documento</th>
									<th>Detalle</th>
									<th>Producto</th>
									<th>Tipo</th>
									<th>Cantidad</th>
									<th>P. Unitario</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
					            <tr>
					                <th colspan="2" style="text-align:right">Total Ingresos:</th>
					                <th id="cant_total_ing"></th>
					                <th style="text-align:right">Total Salidas:</th>
					                <th id="cant_total_sal"></th>
					                <th style="text-align:right">Total :</th>
					                <th id="cant_total"></th>
					            </tr>
					        </tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->