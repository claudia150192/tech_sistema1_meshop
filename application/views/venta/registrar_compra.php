	<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel">
					<!--Panel heading-->
					<div class="panel-heading">
						<div class="panel-control">
							<ul class="nav nav-tabs">
								<li class="active" id="ind_1"><a href="#lista" data-toggle="tab" >Lista</a></li>
								<li id="ind_2"><a href="#registro" data-toggle="tab" >Registro</a></li>
							</ul>
						</div>
						<h3 class="panel-title">Compras</h3>
					</div>
					<!--Panel body-->
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="lista">
								<table id="tbl_compras" class="table table-striped table-bordered" cellspacing="0" width="100%"
								data-source="<?php echo base_url();?>venta/registrar_compra/get_compras_all/">
									<thead>
										<tr>
											<th>#</th>
											<th>Fec. Registro</th>
											<th>Fec. Emisión</th>
											<th>Documento</th>
											<th>Número</th>
											<th>SubTotal</th>
											<th>IGV %</th>
											<th>Monto Total</th>
											<th>Proveedor</th>
											<th>Trabajador</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="registro">
								<div class="panel">
									<!--===================================================-->
									<form class="form-horizontal" id="frm-registro" name="frm-registro" 
							action-1="<?php echo base_url();?>venta/registrar_compra/registrar">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group" style="margin-left: 0.2%;margin-bottom: -1%;">
														<div class="input-group mar-btm">
															<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
															<input type="text" class="form-control" id="cod_proveedor" placeholder="0" name="cod_proveedor" readonly="true" style="width: 20%;">
															<input type="text" class="form-control" placeholder="Proveedor" id="proveedor" name="proveedor" style="width: 80%;">
															<span class="input-group-btn">
																<button id="btn-modal-proveedor" class="btn btn-primary" data-target="#modal-proveedor" data-toggle="modal" type="button">
																	<i class="fa fa-search fa-lg"></i>
																</button>
																<button id="btn-limpiartxt-proveedor" class="btn btn-danger" type="button">
																	<i class="fa fa-trash fa-lg"></i>
																</button>
															</span>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="btn-group mar-btm">
														<a target="_blank" href="<?php echo base_url();?>view/proveedor/" class="btn btn-mint btn-labeled fa fa-info fa-lg" id="btn-nuevoproveedor">Nuevo</a>
													</div>
												</div>
												<!-- Seccion Modal -->
												<div class="modal fade" id="modal-proveedor" role="dialog" tabindex="-1" aria-labelledby="Proveedor" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button id="btn-close-modal-proveedor" data-dismiss="modal" class="close" type="button">
																	<span aria-hidden="true">&times;</span>
																</button>
																<h4 class="modal-title">Buscar Proveedor</h4>
															</div>
															<div class="modal-body">
																<!-- table table-striped table-bordered bootstrap-datatable datatable -->
																<table id="tbl_proveedor" class="table table-striped table-bordered" cellspacing="0" width="100%">
																	<thead>
																		<tr>
																			<th>RUC</th>
																			<th>Nombre</th>
																			<th>Dirección</th>
																		</tr>
																	</thead>
																	<tbody>
																	</tbody>
																</table>
															</div>
															<div class="modal-footer">
																<button data-dismiss="modal" class="btn btn-default" id="btnSalir-modal-proveedor" type="button">Salir</button>
																<button data-dismiss="modal" class="btn btn-primary" id="btn_seleccionar_proveedor" type="button">Seleccionar</button>
															</div>
														</div>
													</div>
												</div>
												<!-- fin -->
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group" style="margin-left: 0.2%;margin-bottom: 0%;">
														<div class="input-group mar-btm">
															<span class="input-group-addon"><i class="fa fa-table fa-lg"></i></span>
															<select class="selectpicker SelectAjax" id="cboTipoDocumentoVenta" name="cboTipoDocumentoVenta"
																data-source="<?php echo base_url();?>venta/registrar_venta/get_constante_tipoDocumento/" attrval="valor" attrdesc="descripcion">
															</select>
															<input type="text" class="form-control" placeholder="Serie Documento" id="serie_documento" name="serie_documento" style="width: 40%;">
															<input type="text" class="form-control" placeholder="Número Documento" id="numero_documento" name="numero_documento" style="width: 60%;">
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
														<input type="text" class="form-control add-tooltip" placeholder="Fecha Emisión" id="fechaEmision" name="fechaEmision" 
														readonly="true" data-placement="bottom" data-toggle="tooltip" data-original-title="Fecha Emision">
													</div>
												</div>
												<div class="col-sm-3">
													
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<hr>
												</div>
												<div class="col-sm-3">
													<div class="input-group mar-btm">
														<input type="text" class="form-control hidden" id="cod_producto" name="cod_producto">
														<input type="text" class="form-control add-tooltip" placeholder="Producto" id="nombre_producto" name="nombre_producto" 
														data-placement="bottom" data-toggle="tooltip" data-original-title="Producto" readonly="true">
														<span class="input-group-btn">
															<button class="btn btn-info" id="btn-modal-producto" data-target="#modal-producto" data-toggle="modal" type="button"><i class="fa fa-search"></i></button>
														</span>
													</div>
													<!-- Seccion Modal -->
													<div class="modal fade" id="modal-producto" role="dialog" tabindex="-1" aria-labelledby="Producto" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button id="btn-close-modal-producto" data-dismiss="modal" class="close" type="button">
																		<span aria-hidden="true">&times;</span>
																	</button>
																	<h4 class="modal-title">Buscar Producto</h4>
																</div>
																<div class="modal-body">
																	<table id="tbl_producto" class="table table-striped table-bordered" cellspacing="0" width="100%">
																		<thead>
																			<tr>
																				<th>Cod-Proveedor</th>
																				<th>Producto</th>
																				<th>Marca</th>
																				<th>Categoria</th>
																				<th>Stock</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
																<div class="modal-footer">
																	<button data-dismiss="modal" class="btn btn-default" id="btnSalir-modal-producto" type="button">Salir</button>
																	<button data-dismiss="modal" class="btn btn-primary" id="btn_seleccionar_producto" type="button">Seleccionar</button>
																</div>
															</div>
														</div>
													</div>
													<!-- fin -->
												</div>
												<div class="col-sm-2">
													<div class="form-group" style="margin-bottom: 0%;">
														<div class="input-group mar-btm">
															<span class="input-group-addon"><i class="fa fa-dollar fa-lg"></i></span>
															<input type="text" class="form-control add-tooltip" placeholder="Precio Compra" id="precio_venta" name="precio_venta" 
															data-placement="bottom" data-toggle="tooltip" data-original-title="Precio Compra">
														</div>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="form-group" style="margin-bottom: 0%;">
														<div class="input-group mar-btm">
															<span class="input-group-addon"><i class="fa fa-lg">#</i></span>
															<input type="text" class="form-control add-tooltip" placeholder="0.0" id="cant_producto" name="cant_producto" 
															data-placement="bottom" data-toggle="tooltip" data-original-title="Nro Productos a Vender">
														</div>
													</div>
													<!--<div class="input-group mar-btm">
													</div>-->
												</div>
												<div class="col-sm-3">
													<div class="input-group mar-btm">
														<button class="btn btn-danger btn-labeled fa fa-plus fa-lg" id="btn-agregar-detalle">Agregar Producto</button>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<h4>Detalle Producto</h4>
													<table id="tbl_detalle" class="table table-striped table-bordered" cellspacing="0" width="100%">
														<thead>
															<tr>
																<th>Producto</th>
																<th>Precio Compra</th>
																<th>Cantidad</th>
																<th>Importe</th>
															</tr>
														</thead>
														<tbody>
														</tbody>
													</table>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<hr>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-dollar fa-lg"></i></span>
														<input type="text" class="form-control add-tooltip" placeholder="SubTotal" id="subtotal" name="subtotal" 
														data-placement="bottom" data-toggle="tooltip" data-original-title="SubTotal" readonly="true">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-lg">%</i></span>
														<input type="text" class="form-control add-tooltip" id="igv_venta" name="igv_venta" value="18.0"
														data-placement="bottom" data-toggle="tooltip" data-original-title="Impuesto de Venta" style="width: 30%;">
														<input type="text" class="form-control add-tooltip" id="monto_igvventa" name="monto_igvventa"
														data-placement="bottom" data-toggle="tooltip" data-original-title="Monto Impuesto de Venta" readonly="true"
														style="width: 70%;">
													</div>
												</div>
												<div class="col-sm-3">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-usd fa-lg"></i></span>
														<input type="text" class="form-control add-tooltip" placeholder="Total a Pagar" id="tota_apagar" name="tota_apagar"
														readonly="true" data-placement="bottom" data-toggle="tooltip" data-original-title="Total a Pagar">		
													</div>
												</div>
											</div>
										</div>
										<div class="panel-footer">
											<div class="row">
												<div class="col-sm-9 col-sm-offset-3">
													<button class="btn btn-primary btn-labeled fa fa-save fa-lg" id="btn-guardar">Guardar</button>
													<button class="btn btn-danger btn-labeled fa fa-repeat fa-lg" id="btn-cancelar" type="reset">Cancelar</button>
												</div>
											</div>
										</div>
									</form>
									<!--===================================================-->
								</div>
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