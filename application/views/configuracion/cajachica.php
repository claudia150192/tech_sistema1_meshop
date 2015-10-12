<!--<div id="page-title">
		<h1 class="page-header text-overflow">Empresa</h1>
</div>-->
		<div id="page-content">
			<div class="row">
				<div class="col-lg-4">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Caja Chica</h3>
						</div>
						<!--===================================================-->
						<form class="form-horizontal" id="frm-registro" name="frm-registro" action-1="<?php echo base_url();?>configuracion/cajachica/actualizar">
							<div class="panel-body">
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-money fa-lg"></i>&nbsp;&nbsp;Monto Inicial</span>
									<input type="text" class="form-control" placeholder="0.0" id="montoinicial" name="montoinicial" value="<?php echo $cajachica==''?0.0:$cajachica['montoinicial'];?>">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-money fa-lg"></i>&nbsp;&nbsp;Monto Utilizado</span>
									<input type="text" class="form-control" placeholder="0.0" id="montoutilizado" name="montoutilizado" value="<?php echo $cajachica==''?0.0:$cajachica['montoutilizado'];?>" readonly="true">
								</div>
								<!--<div class="input-group mar-btm">
										<span class="input-group-addon"><i class="fa fa-money fa-lg"></i>&nbsp;&nbsp;Saldo</span>
										<input type="text" class="form-control" placeholder="0.0" id="saldo" name="saldo" value="<?php echo $cajachica==''?0.0:$cajachica['saldo'];?>" readonly="true">
									</div>
								-->
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-sm-9 col-sm-offset-3">
										<button class="btn btn-primary btn-labeled fa fa-save fa-lg" id="btn-guardar">Guardar</button>
									</div>
								</div>
							</div>
						</form>
						<!--===================================================-->
					</div>
				</div>
				<div class="col-lg-4">
					<br/>
					<br/>
				</div>
			</div>
		</div>
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->