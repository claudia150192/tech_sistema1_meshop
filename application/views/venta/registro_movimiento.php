	<!--<div id="page-title">
		<h1 class="page-header text-overflow">Producto</h1>
	</div>-->
	<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel">
					<!--Panel heading-->
					<div class="panel-heading">
						<h3 class="panel-title">Movimiento</h3>
					</div>
					<!--Panel body-->
					<div class="panel-body">
						<!--===================================================-->
							<form class="form-horizontal" id="frm-registro" name="frm-registro" 
							action-1="<?php echo base_url();?>venta/movimiento/registrar"
							action-2="<?php echo base_url();?>venta/movimiento/actualizar"
							action-3="<?php echo base_url();?>venta/movimiento/eliminar">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-comment fa-lg"></i></span>
												<input type="text" class="form-control" placeholder="" id="idmovimiento" name="idmovimiento" style="display:none;">
												<textarea class="form-control" placeholder="Descripción" id="descripcion" name="descripcion"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
												<input type="text" class="form-control" placeholder="Monto" id="monto" name="monto">
											</div>
										</div>
										<div class="col-sm-6">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
												<select class="form-control SelectAjax" 
													data-source="<?php echo base_url();?>venta/movimiento/get_constante_formapago/" attrval="valor" attrdesc="descripcion"
													id="cboMedioPago" name="cboMedioPago">
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-group mar-btm">
												<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
												<select class="form-control SelectAjax" 
													data-source="<?php echo base_url();?>venta/movimiento/get_constante_tipoOperacion/" attrval="valor" attrdesc="descripcion"
													id="cboTipoIngreso" name="cboTipoIngreso">
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-9 col-sm-offset-3">
											<button class="btn btn-info btn-labeled fa fa-save fa-lg" id="btn-actualizar">Actualizar</button>
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
			<div class="col-lg-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Detalle Movimiento</h3>
					</div>
					<!--===================================================-->
					<div class="panel-body">
						<table id="tbl_movimiento" class="table table-striped table-bordered" cellspacing="0" width="100%"
						data-source="<?php echo base_url();?>venta/movimiento/get_select_all">
							<thead>
								<tr>
									<th>Descripción</th>
									<th>Monto</th>
									<th>Fecha</th>
									<th>Medio Pago</th>
									<th>Tipo Operación</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<!--===================================================-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->