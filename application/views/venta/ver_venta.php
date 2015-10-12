	<div id="page-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Visualizar Venta</h3>

					</div>
					<div class="panel-body">
						<div class="panel" id="panel_documento">
							<div class="panel-body">
								<div class="row">
									<div class="box">
										<div class="box-body">
											<section id="resumen_venta" class="content invoice">
												<div class="row">
													<div class="col-xs-8 col-lg-8">
							                            <div class="col-sm-4" style="text-align: center;font-size: small;">
							                            	<h2 class="page-header">
								                                <img alt="Nifty Admin" src="<?php echo base_url();?>upload/thumbs/fotoEmpresa_thumb.png" class="brand-icon"
								                                style="width: 70px;height: 48px;  margin-top: -5px;margin-bottom: 5px;margin-right: 5px">
							                            	</h2>
							                            </div>
							                            <div class="col-sm-8" style="text-align: center;font-size: small;">
															<strong id="razonsocial_emp"></strong><br>
														</div>
														<div class="col-sm-8" style="text-align: center;font-size: small;">
															<i class="fa fa-envelope"></i>&nbsp<label id="Email_emp"></label> /
															<i class="fa fa-phone"></i>&nbsp<label id="Telefono_emp"></label><br/>
														</div>
														<div class="col-sm-8" style="text-align: center;font-size: small;">
															<label id="direccion_emp"></label><br>
														</div>
													</div>
													<div class="col-xs-4 col-lg-4">
														<div class="col-sm-12" style="text-align: center;font-size: medium;border: 1px solid black;">
															<strong> R.U.C <label id="ruc_emp">&nbsp</label></strong><br>
														</div>
														<div class="col-sm-12" style="text-align: center;font-size: medium;border: 1px solid black;background-color: black;color: #fff;">
															<strong id="tipdocR"></strong><br>
														</div>
														<div class="col-sm-12" style="text-align: center;font-size: medium;border: 1px solid black;">
															<strong id="sercomR"></strong><br>
														</div>
													</div>
													<div class="col-sm-12">
														<br/><br/>
													</div>
													<div class="col-xs-9 col-lg-9">
														<div class="col-sm-12" style="border: 1px solid black;font-size: small;"><!-- border: 1px solid black; -->
															<strong> Señores <label id="clienteR">&nbsp</label></strong><br>
														</div>
														<div class="col-sm-12" style="border: 1px solid black;font-size: small;">
															<strong> Dirección <label id="clienteR_direccion">&nbsp</label></strong><br>
														</div>
														<div class="col-sm-6" style="border: 1px solid black;font-size: small;">
															<strong id="rucR"></strong><br>
														</div>
														<div class="col-sm-6" style="border: 1px solid black;font-size: small;">
															<strong> Guia de Remisión</strong><br>
														</div>
						                                <!--<b>Vendedor: </b><label id="vendedorR"></label><br/>
							                            <b>Tipo Pago: </b><label id="tipoPagoR"></label><br/><br/>-->
													</div>
													<div class="col-xs-3 col-lg-3">
														<div class="col-sm-12" style="border: 1px solid black;text-align: center;font-size: medium;">
															<strong>Fecha</strong>
														</div>
														<div class="col-xs-4 col-lg-4" style="border: 1px solid black;text-align: center;font-size: 14px;">
															<br><label id="fechaEmisionR_dia">&nbsp</label><br>
														</div>
														<div class="col-xs-4 col-lg-4" style="border: 1px solid black;text-align: center;font-size: 14px;">
															<br><label id="fechaEmisionR_mes">&nbsp</label><br>
														</div>
														<div class="col-xs-4 col-lg-4" style="border: 1px solid black;text-align: center;font-size: 14px;">
															<br><label id="fechaEmisionR_anio">&nbsp</label><br>
														</div>
													</div>
												</div>
												<div class="col-xs-12 col-lg-12">
													<br/>
												</div>
							                    <div class="row">
							                        <div class="col-xs-12 table-responsive">
							                            <table id="tabla_resumen_productos" class="table table-striped">
															<thead style="background-color: black;color: #fff;">
																<tr>
																	<th style="width: 5%;">CANT.</th>
																	<th style="width: 5%;">UNID.</th>
																	<th>DESCRIPCIÓN</th>
																	<th style="width: 10%;">P. UNIT.</th>
																	<th style="width: 10%;">IMPORTE</th>
																</tr>
															</thead>
															<tbody id="detalle_contenido_producto">
															</tbody>
														</table>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-xs-8 col-lg-8">
														<div class="col-xs-9 col-lg-9" style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;font-size: 13px;">
															<strong>Son : 
															<b id="texto_letra"></b>
															</strong>
														</div>
														<div class="col-xs-3 col-lg-3" style="text-align: center;border-bottom: 1px solid black;border-top: 1px solid black;border-right: 1px solid black;font-size: 13px;">
															<strong id="descripcion_moneda"></strong>
														</div>
													</div>
													<div class="col-xs-4 col-lg-4">
														<div class="col-xs-12 col-lg-12" id="tr_subtotal">
															<div class="col-xs-6 col-lg-6" style="border: 1px solid black;font-size: 13.5px;background-color: black;color: #fff;">
																<strong>Subtotal</strong>
															</div>
															<div class="col-xs-6 col-lg-6" style="border: 1px solid black;font-size: 13.5px;text-align: center;">
																<strong class="signo_moneda"></strong><strong id="subtotalR"></strong>
															</div>
														</div>
														<div class="col-xs-12 col-lg-12" id="tr_igv">
															<div class="col-xs-6 col-lg-6" style="border: 1px solid black;font-size: 13.5px;background-color: black;color: #fff;">
																<strong id="nombimpuesto"></strong><b id="igvR"></b><b>%</b>
															</div>
															<div class="col-xs-6 col-lg-6" style="border: 1px solid black;font-size: 13.5px;text-align: center;">
																<strong class="signo_moneda"></strong><strong id="montoR"></strong>
															</div>
														</div>
														<div class="col-sm-12" >
															<div class="col-xs-6 col-lg-6" style="border: 1px solid black;font-size: 13.5px;background-color: black;color: #fff;">
																<strong>Total</strong>
															</div>
															<div class="col-xs-6 col-lg-6" style="border: 1px solid black;font-size: 13.5px;text-align: center;">
																<strong class="signo_moneda"></strong><strong id="totalR"></strong>
															</div>
														</div>
													</div>
												</div>
											</section>
										</div>
										<div class="col-xs-12 col-lg-12">
											&nbsp
										</div>
										<div class="box-footer">
											<a href="#" id="imprimir" class="btn btn-success btn-flat" style="float: right;"> <i class="fa fa-print"></i>
												Imprimir
											</a>
											<button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#compose-modal" > <i class="fa fa-envelope"></i>  Enviar</button>
										</div>
										<!--MODALS-->
										<div class="modal fade" id="compose-modal">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
						                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                              <h4 class="modal-title"><i class="fa fa-envelope-o"></i>  Enviar Mensaje de Facturación</h4>
						                            </div>
						                            <div class="modal-body">
						                            	<form id="EnviarForm" class="form-horizontal" action-1="<?php echo base_url();?>mensaje/facturacion/sendemail_fact">  
						                                    <div class="form-group">
						                                        <div class="col-lg-12">
						                                            <div class="input-group">
						                                                <span class="input-group-addon">TO:</span>
						                                                <input type="hidden" name="nVenta_id" id="nVenta_id" value="<?php echo $venta_id;?>" >                         
						                                                <input name="email_to" id="email_to" type="text" class="form-control">
						                                            </div>
						                                        </div>
						                                    </div>
						                                    <div class="form-group">
						                                    	<div class="col-lg-12">
															    	<textarea id="email_message" class="form-control" style="height: 120px;" placeholder="Message" name="message"></textarea>
																</div>
															</div>  
						                                    <div class="modal-footer clearfix">
																<button type="button" class="btn btn-flat" data-dismiss="modal">Cancelar</button>
						                                        <button id="btn_enviar_correo" type="button" class="btn btn-primary btn-flat"> Enviar</button>
						                                	</div>
						                            	</form>
						                            </div>
												</div>
											</div>
										</div>
									</div>
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