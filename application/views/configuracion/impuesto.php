<!--<div id="page-title">
		<h1 class="page-header text-overflow">Empresa</h1>
</div>-->
		<div id="page-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Impuesto</h3>
						</div>
						<!--===================================================-->
						<form class="form-horizontal" id="frm-registro" name="frm-registro" action-1="<?php echo base_url();?>configuracion/impuesto/actualizar">
							<div class="panel-body">
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="Descripción" id="nombre" name="nombre"
									value="<?php echo $impuesto['nombre'];?>">
								</div>
								<div class="input-group mar-btm">
									<span class="input-group-addon"><i class="fa fa-credit-card fa-lg"></i></span>
									<input type="text" class="form-control" placeholder="" id="porcentaje" name="porcentaje" 
									value="<?php echo $impuesto['porcentaje'];?>">
								</div>
								<div class="input-group mar-btm">
									<span >Estado&nbsp;&nbsp;</span>
									<input type="checkbox"  placeholder="" id="estado" name="estado" value="<?php echo $impuesto['estado'];?>">
								</div>
								<div class="input-group mar-btm">
									<input type="text" class="form-control" id="id_impuesto" name="id_impuesto" style="display:none;" value="<?php echo $impuesto['idimpuesto'];?>">
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