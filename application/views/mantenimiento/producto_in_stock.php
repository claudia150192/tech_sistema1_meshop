	<!--<div id="page-title">
		<h1 class="page-header text-overflow">Producto</h1>
	</div>-->
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
						<h3 class="panel-title">Producto</h3>
					</div>
					<!--Panel body-->
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="lista">
								<table id="tbl_producto" class="table table-striped table-bordered" cellspacing="0" width="100%"
								data-source="<?php echo base_url();?>mantenimiento/producto/get_producto_in_stock/">
									<thead>
										<tr>
											<th>Cod producto</th>
											<th>Nombre</th>
											<th>Unidad Medida</th>
											<th>Marca</th>
											<th>Categoria</th>
											<th>Stock</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="registro">
								<div class="panel">
									<!--===================================================-->
									<form class="form-horizontal" id="frm-registro" name="frm-registro" action-1="<?php echo base_url();?>mantenimiento/producto/registrar"
									action-2="<?php echo base_url();?>mantenimiento/producto/actualizar" 
									action-3="<?php echo base_url();?>mantenimiento/producto/eliminar" >
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
														<input type="text" class="form-control" placeholder="Cod Proveedor" id="codproveedor" name="codproveedor">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
														<select class="form-control SelectAjax" 
															data-source="<?php echo base_url();?>mantenimiento/producto/get_constante_unidadmedida/" 
															attrval="valor" attrdesc="descripcion"
															 id="cboUnidadMedida" name="cboUnidadMedida"  >
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
														<input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-comment fa-lg"></i></span>
														<textarea class="form-control" placeholder="Descripción" id="descripcion" name="descripcion"></textarea>
														<input type="text" class="form-control" id="id_producto" name="id_producto" style="display:none;">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-envelope fa-lg"></i></span>
														<input type="text" class="form-control" placeholder="Marca" id="marca" name="marca">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
														<select class="form-control SelectAjax" 
															data-source="<?php echo base_url();?>mantenimiento/categoria/get_categorias_all/" attrval="nCatCodigo" attrdesc="descripcion"
															id="cboCategoria" name="cboCategoria">
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
														<input type="text" class="form-control" placeholder="Stock" id="stock" name="stock">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
														<input type="text" class="form-control" placeholder="Stock Minimó" id="stock_minimo" name="stock_minimo">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
														<input type="text" class="form-control" placeholder="Precio Compra" id="precio_compra" name="precio_compra">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
														<input type="text" class="form-control" placeholder="Precio Venta" id="precio_venta" name="precio_venta">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
														<input type="text" class="form-control" placeholder="Utilidad %" id="utilidad_porcentaje" name="utilidad_porcentaje">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="input-group mar-btm">
														<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
														<input type="text" class="form-control" placeholder="Utilidad Monetaria" id="utilidad_monetaria" name="utilidad_monetaria">
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->