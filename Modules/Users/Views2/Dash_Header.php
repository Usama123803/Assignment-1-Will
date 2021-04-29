<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Refix - Fridge & Freezer Repair Company HTML Template</title>
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon.png">
    <!-- Lib & Custom Stylesheet Included -->
    <link rel="stylesheet" href="Modules/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Modules/Assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="Modules/Assets/css/fontello.css">
    <link rel="stylesheet" href="Modules/Assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="Modules/Assets/css/magnific.min.css">
    <link rel="stylesheet" href="Modules/Assets/css/animate.css">
    <link rel="stylesheet" href="Modules/Assets/source/jquery.fancybox.css" media="screen" />
    <link rel="stylesheet" href="Modules/Assets/css/style.css">
    <link rel="stylesheet" href="Modules/Assets/css/responsive.css">
</head>
<body>

	<!-- Start PreLoader -->
	<!-- <div class="preloader">
        <div class="loader cf">
            <div class="span">
                <div class="dashboard"></div>
            </div>
        </div>
    </div> -->
	<!-- End PreLoader -->

	<!--start header section -->
	<div class="main_menu_area">
		<div class="container-fluid">
			<div class="row">
				<div class="header_nav">
					<nav class="navbar navbar-default">
					    <!-- mobile display -->
					    <div class="logo_flex">
					      <button type="button" class="navbar-toggle">
					        <span class="icon-menu">M</span>
					      </button>
						  <img src="Modules/Assets/images/favicon.png"><br>My Virtual Repair <br> Hello <?= session()->get('myname'); ?>!
					      <!-- <a class="logo" href="index.html">
							<img src="Modules/Assets/images/logo.png" alt="logo">	
					      </a> -->
					    </div>
					    <div class="navbar_flex responsive_menu">
					    	<div class="navbar-collapse">
						      <ul class="nav navbar-nav">
                                <li><a href="<?= site_url('user_profile'); ?>">My Profile</a></li>
                                <li><a href="<?= site_url('logout'); ?>">Logout</a></li>
						      </ul>
						    </div><!-- /.navbar-collapse -->
					    </div>

					    <!-- <div class="social_icon_flex">
					    	<div class="header-social-right">
					    		<ul>
					    			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					    			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					    			<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					    			<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
					    		</ul>
				    			<span class="contact_us">
				    				Call us today<br>
				    				<span>666 888 0000</span>
				    			</span>
					    	</div> -->
							<!--end .header-social-right-->
					    </div><!--end .col-md-4-->
                    </nav><!--end .navbar-->
				</div><!--end .header_nav-->
			</div><!--end .row-->
		</div><!--end .container-fluid-->
	</div><!--end .main_menu_area-->
	<!--end header section -->