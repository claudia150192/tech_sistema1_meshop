<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MeShop</title>
	
 	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/nifty.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/animate-css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/morris-js/morris.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/switchery/switchery.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/chosen/chosen.min.css" rel="stylesheet">

	<link href="<?php echo base_url();?>assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.tableTools.css" />
	<!-- <script src="<?php echo base_url();?>assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.css"></script>-->
	<link href="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/datatables.actions.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/css/themes/type-c/theme-dark.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/morris-js/morris.min.css" rel="stylesheet">
	

</head>

<body>
	<div id="container" class="effect mainnav-lg">
		
		<!--NAVBAR-->
		<!--===================================================-->
		<header id="navbar">
			<div id="navbar-container" class="boxed">
				<!--Brand logo & name-->
				<!--================================-->
				<div class="navbar-header">
					<a href="" class="navbar-brand">
						<img alt="Nifty Admin" src="<?php echo base_url();?>upload/thumbs/fotoEmpresa_thumb.png" class="brand-icon"
						style="width: 50px;height: 35px;margin-left: 5px;margin-top: 7px;">
						<div class="brand-title">
							<span class="brand-text">&nbsp;&nbsp;MeShop</span>
						</div>
					</a>
				</div>
				<!--================================-->
				<div class="navbar-content clearfix">
					<ul class="nav navbar-top-links pull-left">

						<!--Navigation toogle button-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="tgl-menu-btn">
							<a class="mainnav-toggle" href="#">
								<i class="fa fa-navicon fa-lg"></i>
							</a>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End Navigation toogle button-->

					</ul>
					<ul class="nav navbar-top-links pull-right">

						<!--User dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="dropdown">
							<a id="demo-lang-switch" class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
								<span class="lang-selected">
									<span class="lang-name">Total al Contado : </span>
									<span class="lang-name"><?php echo $this->session->userdata('signo'); ?>&nbsp;<?php echo $this->session->userdata('total_contado');?></span>&nbsp;
									<i class="fa fa-money fa-lg"></i>
									<span class="lang-name">|</span>
									<span class="lang-name">Total al Credito : </span>
									<span class="lang-name"><?php echo $this->session->userdata('signo'); ?>&nbsp;<?php echo $this->session->userdata('total_credito');?></span>&nbsp;
									<i class="fa fa-money fa-lg"></i>
								</span>
							</a>
						</li>

						<li id="dropdown-user" class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
								<span class="pull-right">
									<img class="img-circle img-user media-object" src="<?php echo base_url();?>assets/img/av1.png" alt="Profile Picture">
								</span>
								<div class="username hidden-xs"><?php echo $this->session->userdata('persona')["name"];?></div>
							</a>

							<div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">
							
								<!-- User dropdown menu -->
								<!--<ul class="head-list">
									<li>
										<a href="#">
											<i class="fa fa-user fa-fw fa-lg"></i> Profile
										</a>
									</li>
									<li>
										<a href="#">
											<span class="badge badge-danger pull-right">9</span>
											<i class="fa fa-envelope fa-fw fa-lg"></i> Messages
										</a>
									</li>
									<li>
										<a href="#">
											<span class="label label-success pull-right">New</span>
											<i class="fa fa-gear fa-fw fa-lg"></i> Settings
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-question-circle fa-fw fa-lg"></i> Help
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-lock fa-fw fa-lg"></i> Lock screen
										</a>
									</li>
								</ul>-->

								<!-- Dropdown footer -->
								<div class="pad-all text-right">
									<a href="<?php echo base_url();?>welcome/logout" class="btn btn-primary">
										<i class="fa fa-sign-out fa-fw"></i> Salir
									</a>
								</div>
							</div>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End user dropdown-->
					</ul>
				</div>
				<!--================================-->
				<!--End Navbar Dropdown-->
			</div>
		</header>
		<!--===================================================-->
		<!--END NAVBAR-->

		<div class="boxed">
			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">