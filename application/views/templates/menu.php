			<!--MAIN NAVIGATION-->
			<!--===================================================-->
			<nav id="mainnav-container">
				<div id="mainnav">
					<!--Menu-->
					<!--================================-->
					<div id="mainnav-menu-wrap">
						<div class="nano">
							<div class="nano-content">
								<ul id="mainnav-menu" class="list-group">
									<!--Menu list item-->
									<li class="active-link">
										<a href="<?php echo base_url()."home";?>">
											<i class="fa fa-dashboard"></i>
											<span class="menu-title">
												<strong>Dashboard</strong>
												<span class="label label-success pull-right">Ir</span>
											</span>
										</a>
									</li>

									<li class="list-divider"></li>
									<!--Category name-->
									<li class="list-header">Menu Principal</li>
									<!--Menu list item-->
									<?php 
										$cliente=false;
										$personal=false;
										$usuario=false;
										$categoria=false;
										$producto=false;
										$proveedor=false;
										$generarventa=false;
										$ventasanuladas=false;
										$registromovimiento = false;
										$consutaventas = false;
										$registrocompras = false;
										$empresa=false;
										$impuesto=false;
										$moneda=false;
										$cajachica=false;
										$lista_menu = $this->session->userdata('perfiles');
										
										for ($i=1; $i <= $lista_menu; $i++) { 
											switch ($i) {
												case 1:
													$cliente = true;
													break;
												case 2:
													$categoria = true;
													break;
												case 3:
													$personal = true;
													break;
												case 4:
													$producto = true;
													break;
												case 5:
													$proveedor = true;
													break;
												case 6:
													$usuario = true;
													break;
												case 7:
													$generarventa = true;
													break;
												case 8:
													$ventasanuladas = true;
													break;
												case 9:
													$registromovimiento = true;
													break;
												case 10:
													$consutaventas = true;
													break;
												case 11:
													$registrocompras = true;
													break;
												case 12:
													$empresa = true;
													break;
												case 13:
													$impuesto = true;
													break;
												case 14:
													$moneda = true;
													break;
												case 15:
													$cajachica=true;
													break;
											}
										}

									?>
						           
									<!--Menu list item-->
									<li class="active">
										<a href="#">
											<i class="fa fa-edit"></i>
											<span class="menu-title">Ventas<?php echo $this->session->userdata('persona2'); ?></span>
											<i class="arrow"></i>
										</a>
										<!--Submenu class="collapse" -->
										<ul class="collapse in" aria-expanded="true">
											<?php 
												if($generarventa){ ?>
											<li><a href="<?php echo base_url();?>view/registro_venta/">
												<span class="menu-title">
													<strong>Generar Venta</strong>
													<span class="label label-warning pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } 
												if($ventasanuladas){ ?>
											<li><a href="<?php echo base_url();?>view/anular_venta/">
												<span class="menu-title">
													<strong>Ventas Anuladas</strong>
													<span class="label label-warning pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } 
												if($registromovimiento){ ?>
											<li><a href="<?php echo base_url();?>view/registro_movimiento/">
												<span class="menu-title">
													<strong>Registro Movimiento</strong>
													<span class="label label-warning pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } 
												if($consutaventas){ ?>
											<li><a href="<?php echo base_url();?>view/consultar_venta/">
												<span class="menu-title">
													<strong>Consulta de Ventas</strong>
													<span class="label label-warning pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } ?>
										</ul>
									</li>

									<li>
										<a href="#">
											<i class="fa fa-briefcase"></i>
											<span class="menu-title">
												<strong>Inventario</strong>
											</span>
											<i class="arrow"></i>
										</a>
										<!--Submenu-->
										<ul class="collapse">
											<li><a href="<?php echo base_url();?>view/kardex/">
												<span class="menu-title">
													<strong>Movimiento</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<li><a href="<?php echo base_url();?>view/saldosactuales/">
												<span class="menu-title">
													<strong>Saldos Actuales</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php if($registrocompras){ ?>
											<li><a href="<?php echo base_url();?>view/registro_compra/">
												<span class="menu-title">
													<strong>Ingresos</strong>
													<span class="label label-warning pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php }?>
											<!--<li><a href="<?php echo base_url();?>view/cliente/">
												<span class="menu-title">
													<strong>Salidas</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>-->
										</ul>
									</li>

									<li>
										<a href="#">
											<i class="fa fa-briefcase"></i>
											<span class="menu-title">
												<strong>Mantenimiento</strong>
											</span>
											<i class="arrow"></i>
										</a>
										<!--Submenu-->
										<ul class="collapse">
											<?php if($categoria){ ?>
											<li><a href="<?php echo base_url();?>view/categoria/">
												<span class="menu-title">
													<strong>Categoria</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php }
												if($cliente){ ?>
											<li><a href="<?php echo base_url();?>view/cliente/">
												<span class="menu-title">
													<strong>Cliente</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } 
												if($personal){ ?>
											<li><a href="<?php echo base_url();?>view/personal/">
												<span class="menu-title">
													<strong>Trabajador</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } 
												if($producto){ ?>
											<li><a href="<?php echo base_url();?>view/producto/">
												<span class="menu-title">
													<strong>Producto</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } 
												if($proveedor){ ?>
											<li><a href="<?php echo base_url();?>view/proveedor/">
												<span class="menu-title">
													<strong>Proveedor</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } 
												if($usuario){ ?>
											<li><a href="<?php echo base_url();?>view/usuario/">
												<span class="menu-title">
													<strong>Usuario</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } ?>
										</ul>
									</li>
									
									<!--Menu list item-->
									<li>
										<a href="#">
											<i class="fa fa-edit"></i>
											<span class="menu-title">Configuraciones</span>
											<i class="arrow"></i>
										</a>
										<!--Submenu-->
										<ul class="collapse">
											<?php
												if($empresa){ ?>
											<li><a href="<?php echo base_url();?>view/conf_empresa/">
												<span class="menu-title">
													<strong>Empresa</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } 
												if($impuesto){ ?>
											<li><a href="<?php echo base_url();?>view/conf_impuesto/">
												<span class="menu-title">
													<strong>Impuesto</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } 
												if($moneda){ ?>
											<li><a href="<?php echo base_url();?>view/conf_moneda/">
												<span class="menu-title">
													<strong>Moneda</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } 
											
												if($cajachica){ ?>
											<li><a href="<?php echo base_url();?>view/conf_cajachica/">
												<span class="menu-title">
													<strong>Caja chica</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
											<?php } ?>
											<li><a href="<?php echo base_url();?>view/conf_unidmedida/">
												<span class="menu-title">
													<strong>Unidad Medida</strong>
													<span class="label label-danger pull-right">Ir</span>
												</span>
												</a>
											</li>
										</ul>
									</li>
									
								</ul>

							</div>
						</div>
					</div>
					<!--================================-->
					<!--End menu-->
				</div>
			</nav>
			<!--===================================================-->
			<!--END MAIN NAVIGATION-->