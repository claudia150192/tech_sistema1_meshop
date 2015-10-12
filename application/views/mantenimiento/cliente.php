	<!--	<div id="page-title">
			<h1 class="page-header text-overflow">Cliente</h1>
		</div>-->

		<div id="page-content">
			<div class="row">
				<div class="col-lg-7">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Cliente</h3>
						</div>
						<div class="panel-body">
							<table id="tbl_cliente" class="table table-striped table-bordered" cellspacing="0" width="100%"
							data-source="<?php echo base_url();?>mantenimiento/cliente/get_cliente_all/">
								<thead>
									<tr>
										<th>DNI</th>
										<th>RUC</th>
										<th>Cliente</th>
										<th>Teléfono</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Registrar</h3>
						</div>
						<!--===================================================-->
						<form class="form-horizontal" id="frm-registro" name="frm-registro" action-1="<?php echo base_url();?>mantenimiento/cliente/registrar"
						action-2="<?php echo base_url();?>mantenimiento/cliente/actualizar" 
						action-3="<?php echo base_url();?>mantenimiento/cliente/eliminar" >
							<div class="panel-body">
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Ruc" id="ruc" name="ruc">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Doc. Identididad" id="dni" name="dni">
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
									<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-envelope fa-lg"></i></span>
									<input type="email" class="form-control" placeholder="Email" id="email" name="email">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-comment fa-lg"></i></span>
									<textarea class="form-control" placeholder="Otros Datos" id="otros" name="otros"></textarea>
									<input type="text" class="form-control" id="id_cliente" name="id_cliente" style="display:none;">
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