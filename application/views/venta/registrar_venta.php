	<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel">
					<!--Panel heading-->
					<div class="panel-heading">
						<div class="panel-control">
							<div class="form-group">
								<input type="text" class="form-control" id="documento-emision" name="documento-emision" readonly="true" style="text-align: center;font-weight: bold;font-size: medium;">
							</div>
						</div>
						<h3 class="panel-title">Venta</h3>
					</div>
					<!--Panel body-->
					<div class="panel-body">
						<div class="panel" id="panel_formulario">
							<!--===================================================-->
							<form class="form-horizontal" id="frm-registro" name="frm-registro" 
							action-1="<?php echo base_url();?>venta/registrar_venta/registrar">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group" style="margin-left: 0.2%;margin-bottom: -1%;">
												<div class="input-group mar-btm">
													<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
													<input type="text" class="form-control" id="cod_cliente" placeholder="0" name="cod_cliente" readonly="true" style="width: 20%;">
													<input type="text" class="form-control" placeholder="Cliente" id="cliente" name="cliente" style="width: 80%;">
													<span class="input-group-btn">
														<button id="btn-modal-cliente" class="btn btn-primary" data-target="#modal-cliente" data-toggle="modal" type="button">
															<i class="fa fa-search fa-lg"></i>
														</button>
														<button id="btn-limpiartxt-cliente" class="btn btn-danger" type="button">
															<i class="fa fa-trash fa-lg"></i>
														</button>
													</span>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="btn-group mar-btm">
												<a target="_blank" href="<?php echo base_url();?>view/cliente/" class="btn btn-mint btn-labeled fa fa-info fa-lg" id="btn-nuevocli">Nuevo</a>
												
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
									<div class="row">
										<div class="col-sm-12">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-table fa-lg"></i></span>
												<input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group" style="margin-left: 0.2%;margin-bottom: 0%;">
												<div class="input-group mar-btm">
													<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
													<select class="selectpicker" id="cboTipoDocumento" name="cboTipoDocumento">
														<option value="1">DNI</option>
														<option value="2">RUC</option>
													</select>
													<input type="text" class="form-control" placeholder="Nro Documento" id="nro_documento" name="nro_documento">
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
											<!--<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
												<input type="text" class="form-control add-tooltip" placeholder="Fecha Vencimiento" id="fechaVencimiento" name="fechaVencimiento"
												readonly="true" data-placement="bottom" data-toggle="tooltip" data-original-title="Fecha Vencimiento">		
											</div>-->
										</div>
										<div class="col-sm-3">
											<!--<div class="input-group mar-btm">
												<input type="text" class="form-control add-tooltip" placeholder="Guia de Remisión" id="guia_remision" name="guia_remision" 
												data-placement="bottom" data-toggle="tooltip" data-original-title="Guía de Remisión" readonly="true">
												<span class="input-group-btn">
													<button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
												</span>
											</div>-->
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
											<div class="modal fade" id="modal-producto" role="dialog" tabindex="-1" aria-labelledby="Producto" aria-hidden="true" >
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
																		<!-- <th>Estado</th>
																		<th>Usuario</th> -->
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
													<span class="input-group-addon"><i style="font-weight: bold;"><?php echo $signo;?></i></span>
													<input type="text" class="form-control add-tooltip" placeholder="Precio Venta" id="precio_venta" name="precio_venta" 
													data-placement="bottom" data-toggle="tooltip" data-original-title="Precio Venta">
												</div>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-lg">#</i></span>
												<input type="text" class="form-control add-tooltip" placeholder="Stock Disponible" id="stock_disponible" name="stock_disponible"
												readonly="true" data-placement="bottom" data-toggle="tooltip" data-original-title="Stock Disponible">		
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
														<th>Precio Unid</th>
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
										<div class="col-sm-2">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-table fa-lg"></i></span>
												<select class="selectpicker SelectAjax" id="cboTipoDocumentoVenta" name="cboTipoDocumentoVenta"
													data-source="<?php echo base_url();?>venta/registrar_venta/get_constante_tipoDocumento/" attrval="valor" attrdesc="descripcion">
												</select>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-table fa-lg"></i></span>
												<select class="selectpicker SelectAjax" 
													data-source="<?php echo base_url();?>venta/registrar_venta/get_constante_formapago2/" attrval="valor" attrdesc="descripcion"
													id="cboFormaPago" name="cboFormaPago">
												</select>
												<?php if (!empty($_GET)) {?>
												<input type="hidden" id="tipo_pago" value=<?php echo $_GET["formapago"];?>>
												<?php }?>
											</div>
										</div>
										<div class="col-sm-2" id="div_fecha_primerpago">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
												<input type="text" class="form-control add-tooltip" placeholder="Fecha Primer Pago" id="fecha_primerpago" name="fecha_primerpago" 
												data-placement="bottom" data-toggle="tooltip" data-original-title="Fecha PrimerPago" readonly="true">
											</div>
										</div>
										<div class="col-sm-2" id="div_nro_cuota">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-lg">#</i></span>
												<input type="text" class="form-control add-tooltip" placeholder="Nro Cuota" id="nro_cuota" name="nro_cuota"  
												data-placement="bottom" data-toggle="tooltip" data-original-title="Nro Cuota">
											</div>
										</div>
										<div class="col-sm-2" id="div_monto_cuota">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa-lg"><?php echo $signo;?></i></span>
												<input type="text" class="form-control add-tooltip" placeholder="Monto Cuota" id="monto_cuota" name="monto_cuota"  
												data-placement="bottom" data-toggle="tooltip" data-original-title="Monto Cuota" readonly="true">
											</div>
										</div>
										<div class="col-sm-2" id="div_nro_dias">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-lg">#</i></span>
												<select class="selectpicker" id="cboNroDias" name="cboNroDias">
													<option value="15">15 días</option>
													<option value="30">30 días</option>
													<option value="45">45 días</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa-lg"><?php echo $signo;?></i></span>
												<input type="text" class="form-control add-tooltip" placeholder="SubTotal" id="subtotal" name="subtotal" 
												data-placement="bottom" data-toggle="tooltip" data-original-title="SubTotal" readonly="true">
											</div>
										</div>
										<div class="col-sm-2">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-lg"><?php echo number_format($igvVentaImp, 0)."%";?></i></span>
												<input type="text" class="form-control add-tooltip hidden" id="igv_venta" name="igv_venta" value="<?php echo $igvVentaImp;?>" 
												data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $nombreVentaImp;?> Venta" readonly="true">
												<input type="text" class="form-control add-tooltip" id="igv_monto_venta" name="igv_monto_venta" value="" 
												data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $nombreVentaImp;?> Venta" readonly="true">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa-lg"><?php echo $signo;?></i></span>
												<input type="text" class="form-control add-tooltip" placeholder="Total a Pagar" id="tota_apagar" name="tota_apagar"
												readonly="true" data-placement="bottom" data-toggle="tooltip" data-original-title="Total a Pagar">		
											</div>
										</div>
										<div class="col-sm-2">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa-lg"><?php echo $signo;?></i></span>
												<input type="text" class="form-control add-tooltip" placeholder="Importe" id="importe_producto" name="importe_producto" 
												data-placement="bottom" data-toggle="tooltip" data-original-title="Importe/Acuenta Producto">
											</div>
										</div>
										<div class="col-sm-2" id="div_vuelto">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa-lg"><?php echo $signo;?></i></span>
												<input type="text" class="form-control add-tooltip" placeholder="Vuelto" id="vuelto" name="vuelto" 
												data-placement="bottom" data-toggle="tooltip" data-original-title="Vuelto" readonly="true">
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
<!--===================================================-->
<!--END CONTENT CONTAINER-->
