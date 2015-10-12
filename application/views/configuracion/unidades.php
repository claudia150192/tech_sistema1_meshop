		<!--<div id="page-title">
			<h1 class="page-header text-overflow">Categorias</h1>
		</div>-->

		<div id="page-content">
			<div class="row">
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Unidad Medida</h3>
						</div>
						<div class="panel-body">
							<table id="tbl_unidades" class="table table-striped table-bordered" cellspacing="0" width="100%"
							data-source="<?php echo base_url();?>mantenimiento/producto/get_constante_unidadmedida/">
								<thead>
									<tr>
										<th>ID</th>
										<th>Descripción</th>
                                        <th>Tipo de Dato</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Registrar</h3>
						</div>
						<!--===================================================-->
						<form class="form-horizontal" id="frm-registro" name="frm-registro" action-1="<?php echo base_url();?>configuracion/unidades/registrar"
						action-2="<?php echo base_url();?>configuracion/unidades/actualizar" >
							<div class="panel-body">
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-star fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Descripción" id="descripcion" name="descripcion">
								</div>
									<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-star fa-lg"></i></span>
									<select class="form-control" id="tipo" name="tipo" placeholder="Tipo"><option value="Entero">Entero</option><option value="Decimal">Decimal</option></select>
								</div>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-sm-9 col-sm-offset-3">
										<button class="btn btn-primary btn-labeled fa fa-save fa-lg" id="btn-guardar">Guardar</button>
										<button class="btn btn-danger btn-labeled fa fa-repeat fa-lg" type="reset">Cancelar</button>
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
<!--===================================================-->
<!--END CONTENT CONTAINER-->