		<!--<div id="page-title">
			<h1 class="page-header text-overflow">Usuario</h1>
		</div>-->

		<div id="page-content">
			<div class="row">
				<div class="col-lg-6">
					
					<div class="panel">
						<div class="panel-heading">
							<div class="panel-control">
								<ul class="nav nav-tabs">
									<li class="active" id="ind_1"><a href="#lista" data-toggle="tab">Lista</a></li>
									<li id="ind_2"><a href="#registro" data-toggle="tab" >Registro</a></li>
								</ul>
							</div>
							<h3 class="panel-title">Usuario</h3>
						</div>
						<div class="panel-body">
							<div class="tab-content">
								<div class="tab-pane fade in active" id="lista">
									<table id="tbl_usuario" class="table table-striped table-bordered" cellspacing="0" width="100%"
									data-source="<?php echo base_url();?>mantenimiento/usuario/get_usuario_all/">
										<thead>
											<tr>
												<th>ID Usuario</th>
												<th>Persona</th>
												<th>Cargo</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
								<div class="tab-pane fade" id="registro">
									<!--===================================================-->
										<form class="form-horizontal" id="frm-registro" name="frm-registro" action-1="<?php echo base_url();?>mantenimiento/usuario/registrar"
										action-2="<?php echo base_url();?>mantenimiento/usuario/actualizar" 
										action-3="<?php echo base_url();?>mantenimiento/usuario/eliminar" >
											<div class="panel-body">
												<div class="input-group mar-btm">
													<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
													<input type="text" class="form-control" placeholder="Usuario" id="name_usuario" name="name_usuario">
												</div>
												<div class="input-group mar-btm">
													<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
													<input type="password" class="form-control" placeholder="Contraseña" id="clave_usuario" name="clave_usuario">
												</div>
												<div class="input-group mar-btm col-sm-12">
													<select class="form-control SelectAjax" 
														data-source="<?php echo base_url();?>mantenimiento/personal/get_personal_all/" attrval="nPerCodigo" attrdesc="nombre"
														id="cboPersona" name="cboPersona">
													</select>
												</div>
												<div class="input-group mar-btm col-sm-12">
													<select class="form-control SelectAjax" 
														data-source="<?php echo base_url();?>mantenimiento/usuario/get_constante_cargo/" 
														attrval="valor" attrdesc="descripcion"
														 id="cboCargo" name="cboCargo"  >
													</select>
													<input type="text" class="hidden" id="id_usuario" name="id_usuario">
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
				<div class="col-lg-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Perfil de Acceso</h3>
						</div>
						<div class="panel-body">
							<table id="tbl_perfil" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Menu</th>
										<th>Sub-Menu</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-9 col-sm-offset-3">
									<button class="btn btn-primary btn-labeled fa fa-save fa-lg" id="btn-guardarperfil">Guardar</button>
									<button class="btn btn-danger btn-labeled fa fa-repeat fa-lg" id="btn-cancelarperfil" type="reset">Cancelar</button>
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