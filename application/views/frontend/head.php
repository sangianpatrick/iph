<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Online Book Store">
    <meta name="author" content="Patrick Maurits Sangian">
    <title><?php echo $title;?></title>
    <link href="<?php echo base_url('assets/frontend/');?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/');?>css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/frontend/');?>css/main.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/frontend/');?>css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url('assets/frontend/');?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/frontend/');?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/frontend/');?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/frontend/');?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/frontend/');?>images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> (022) 603 0392</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@iph.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php if ($this->session->userdata('c_log_stts')===TRUE) {?>
								<li><a href="<?php echo site_url('order_list');?>"><i class="fa fa-crosshairs"></i> Order List</a></li>
								<li><a href="<?php echo site_url('cart');?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="<?php echo site_url('customer/logout');?>"><i class="fa fa-lock"></i> Logout</a></li>
								<?php }else{?>
								<li><a href="<?php echo site_url('customer');?>"><i class="fa fa-lock"></i> Login</a></li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url();?>">Shop</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="pull-right">
							<form action="#" class="searchform">
								<input type="text" placeholder="Search item" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							</form>
						</div>
					</div>
				</div>
				</div>
			</div>
	</header>

	
				