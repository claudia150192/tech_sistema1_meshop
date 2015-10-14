<div id="page-title">
			
		</div>

		<div id="page-content">
			<div class="row">
				<div class="col-lg-7">
					<div class="panel">
						<div class="panel-heading">
						<div class="panel-control">
							<ul class="nav nav-tabs">
								<li class="active" id="ind_1"><a href="#lista" data-toggle="tab" >Proveedor</a></li>
								<li id="ind_2"><a href="#registro" data-toggle="tab" >Marca</a></li>
							</ul>
						</div>
						<h3 class="panel-title">Lista</h3>
					</div>
						<div class="panel-body">
							<div class="tab-pane fade in active" id="lista_proveedor">
							<table id="tbl_proveedor" class="table table-striped table-bordered" cellspacing="0" width="100%"
							data-source="<?php echo base_url();?>mantenimiento/proveedor/get_proveedor_all/">
								<thead>
									<tr>
										<th>RUC</th>
										<th>Proveedor</th>
										<th>Teléfono</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							</div>
							<div class="tab-pane fade" id="lista_marca">
							<table id="tbl_marca" class="table table-striped table-bordered" cellspacing="0" width="100%"
							data-source="<?php echo base_url();?>mantenimiento/proveedor/get_proveedor_all/">
								<thead>
									<tr>
										<th>RUC</th>
										<th>Proveedor2</th>
										<th>Teléfono2</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Registrar</h3>
						</div>
						<!--===================================================-->
						<form class="form-horizontal" id="frm-registro" name="frm-registro" action-1="<?php echo base_url();?>mantenimiento/proveedor/registrar"
						action-2="<?php echo base_url();?>mantenimiento/proveedor/actualizar" 
						action-3="<?php echo base_url();?>mantenimiento/proveedor/eliminar" >
							<div class="panel-body">
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Ruc" id="ruc" name="ruc">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Nombre y Apellidos" id="apename" name="apename">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Teléfono" id="telefono" name="telefono">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Pagina Web" id="pageweb" name="pageweb">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-envelope fa-lg"></i></span>
									<input type="email" class="form-control" placeholder="Email" id="email" name="email">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-comment fa-lg"></i></span>
									<textarea class="form-control" placeholder="Observación" id="observacion" name="observacion"></textarea>
									<input type="text" class="form-control" id="id_proveedor" name="id_proveedor" style="display:none;">
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
<!--===================================================-->
<!--END CONTENT CONTAINER-->