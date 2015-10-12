<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MiniVenta</title>

	<!--Open Sans Font [ OPTIONAL ] -->
 	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">

	<!--Bootstrap Stylesheet [ REQUIRED ]-->
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

	<!--Nifty Stylesheet [ REQUIRED ]-->
	<link href="<?php echo base_url();?>assets/css/nifty.min.css" rel="stylesheet">
	
	<!--Font Awesome [ OPTIONAL ]-->
	<link href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
	<div id="container" class="cls-container">
		
		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay" class="bg-img img-balloon" style="background-color: #32404e;background-image: none;"></div>
		
		<!-- HEADER -->
		<!--===================================================-->
		<div class="cls-header cls-header-lg">
			<div class="cls-brand">
				<a class="box-inline" href="#">
					<img alt="Nifty Admin" src="<?php echo base_url();?>assets/img/logo.png" class="brand-icon">
					<span class="brand-title">Sistema de Facturación <span class="text-thin">EL VENTON</span></span>
				</a>
			</div>
		</div>
		<!--===================================================-->
		
		
		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<?php if($message != ""): ?>
                    	<div class="alert alert-warning">
                        <?php echo $this->session->flashdata('message');?></div>
                    <?php endif ?>
					<p class="pad-btm"><b>Iniciar Sesion<b/></p>
					<form role="form" method="post" action="<?php echo base_url();?>welcome/login">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" placeholder="Username"
								name="username" type="text" value="" autofocus>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
								<input type="password" class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
						</div>
						<!--<div class="row">
							<div class="col-xs-8 text-left checkbox">
							</div>
							<div class="col-xs-4">
								<div class="form-group text-right">
								<button class="btn btn-success text-uppercase" type="submit">Sign In</button>
								</div>
							</div>
						</div>
						<div class="mar-btm"><em>- or -</em></div>-->
						<button type="submit" class="btn btn-primary btn-lg btn-block">
							INGRESAR
						</button>
					</form>
				</div>
			</div>
		</div>
		<!--===================================================-->	
		
	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->

	<!--JAVASCRIPT-->
	<!--=================================================-->
	<!--jQuery [ REQUIRED ]-->
	<script src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<!--Fast Click [ OPTIONAL ]-->
	<script src="<?php echo base_url();?>assets/plugins/fast-click/fastclick.min.js"></script>
	<!--Nifty Admin [ RECOMMENDED ]-->
	<script src="<?php echo base_url();?>assets/js/nifty.min.js"></script>

</body>
</html>
