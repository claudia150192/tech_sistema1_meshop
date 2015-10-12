<!--<div id="page-title">
		<h1 class="page-header text-overflow">Empresa</h1>
</div>-->
		<div id="page-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Empresa</h3>
						</div>
						<!--===================================================-->
						<form class="form-horizontal" id="frm-registro" name="frm-registro" method="post" 
						action-1="<?php echo base_url();?>configuracion/empresa/actualizar" action-2="<?php echo base_url();?>configuracion/upload/do_upload"
						enctype="multipart/form-data">
							<div class="panel-body">
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Razón Social" id="razonsocial" name="razonsocial"
									value="<?php echo $empresa['RazonSocialEmpresa'];?>">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Ruc" id="ruc" name="ruc" value="<?php echo $empresa['RucEmpresa'];?>">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Teléfono Empresa" id="telefono" name="telefono" value="<?php echo $empresa['TelefonoEmpresa'];?>">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-envelope fa-lg"></i></span>
									<input type="email" class="form-control" placeholder="Email Empresa" id="email" name="email" value="<?php echo $empresa['EmailEmpresa'];?>">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-phone fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Dirección Empresa" id="direccion" name="direccion" value="<?php echo $empresa['DireccionEmpresa'];?>">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Representante Empresa" id="representante" name="representante" value="<?php echo $empresa['RepresentanteEmpresa'];?>">
									<input type="text" class="form-control" id="id_empresa" name="id_empresa" style="display:none;" value="<?php echo $empresa['CodigoEmpresa'];?>">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-picture-o fa-lg"></i></span>
									<input type="file" class="form-control" id="archivo_adjunto" name="archivo_adjunto" multiple="multiple">
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
				<div class="col-lg-12">
					<br/>
					<br/>
				</div>
			</div>
		</div>
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->