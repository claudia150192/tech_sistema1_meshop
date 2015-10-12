<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-success">
					<!--Panel heading-->
					<div class="panel-heading">
						<div class="panel-control">
							<!--Nav tabs-->
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#mes">Saldo</a></li>
							</ul>
						</div>
						<h3 class="panel-title">Resultado</h3>
					</div>
		
					<!--Panel body-->
					<div class="panel-body">
						<!--Tabs content-->
						<div class="tab-content">
							<div id="mes" class="tab-pane fade in active">
								<div class="panel">
									<!--===================================================-->
									<div class="form-horizontal">
										<div class="row">
											<div class="col-sm-4">
												<div class="input-group mar-btm">
													<span class="input-group-addon">Producto</span>
													<input type="text" class="form-control add-tooltip" placeholder="Nombre y/o Descripción" id="producto" name="producto" 
													 data-placement="bottom" data-toggle="tooltip" data-original-title="Nombre y/o Descripción">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<select class="form-control" id="cboMarcas" name="cboMarcas">
														</select>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<select class="form-control" id="cboCategoria" name="cboCategoria">
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

						<table id="tbl_saldosactuales" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Cod.Proveedor</th>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Marca</th>
									<th>Categoria</th>
									<th>Precio Compra</th>
									<th>Precio Venta</th>
									<th>Stock</th>
								</tr>
							</thead>
							<thead>
								<tr>
									<th class="input">
										<input type="text" placeholder="Cod Prov" class="search_init form-control col-sm-3" style="width: 100%" />
									</th>
									<th class="input">
										<input type="text" placeholder="Nombre" class="search_init form-control col-sm-3" style="width: 100%"/>
									</th>
									<th class="input">
										<input type="text" placeholder="Descripcion" class="search_init form-control col-sm-3" style="width: 100%"/>
									</th>
									<th class="input">
										<input type="text" placeholder="Marca" class="search_init form-control col-sm-3" style="width: 100%" />
									</th>
									<th class="input">
										<input type="text" placeholder="Categoria" class="search_init form-control col-sm-3"  style="width: 100%"/>
									</th>
									<th class="input">
										<input type="text" placeholder="P. Compra" class="search_init form-control col-sm-3"  style="width: 100%"/>
									</th>
									<th class="input">
										<input type="text" placeholder="P. Venta" class="search_init form-control col-sm-3"  style="width: 100%"/>
									</th>
									<th class="input">
										<input type="text" placeholder="Stock" class="search_init form-control col-sm-3"  style="width: 100%"/>
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