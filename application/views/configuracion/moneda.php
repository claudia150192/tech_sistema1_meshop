<!--<div id="page-title">
		<h1 class="page-header text-overflow">Empresa</h1>
</div>-->
		<div id="page-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Moneda Local</h3>
						</div>
						<!--===================================================-->
						<form class="form-horizontal" id="frm-registro2" name="frm-registro2" action-1="<?php echo base_url();?>configuracion/moneda/actualizar">
							<div class="panel-body">
								<div class="input-group mar-btm">
									<span class="input-group-addon">Descripción</span>
									<input type="text" class="form-control" placeholder="Descripción" id="descripcion" name="descripcion" value="<?php echo $moneda['descripcion'];?>">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon">Signo</span>
									<input type="text" class="form-control" placeholder="Signo es los montos" id="signo" name="signo" value="<?php echo $moneda['signo'];?>">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon">Valor Vigente</span>
									<input type="text" class="form-control" placeholder="Valor vigente a la moneda local" id="valor_vigente" name="valor_vigente" value="<?php echo $moneda['valor_vigente'];?>">
								</div>
								<div class="input-group mar-btm">
									<input type="text" class="form-control" id="idmoneda" name="idmoneda" style="display:none;" value="<?php echo $moneda['idmoneda'];?>">
								</div>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-sm-9 col-sm-offset-3">
										<button class="btn btn-primary btn-labeled fa fa-save fa-lg" id="btn-guardar2">Guardar</button>
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
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
				</div>
			</div>
		</div>
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->