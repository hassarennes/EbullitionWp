<!DOCTYPE html>
<html <?php language_attributes(); ?>lang="fr">
<head>
	<title>Ebullition marque de vêtements</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	
	<!--::::::::::::::::::::::: Styles :::::::::::::::::::::::
	::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
	<link rel="icon" type="image/jpg" href="images/E.jpg" />
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
	<!-- Plugin CSS -->
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!--::::::::::::::::::::::: Js :::::::::::::::::::::::
	::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="js/jquery.lettering.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
   <?php wp_head(); ?>
</head>
<body>
<div id="container-fluid">

	

	<nav class="menu navbar navbar-default navbar-fixed-top" role="navigation">
  

			<div class="navbar-header">
      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
      	</button>
      	<a class="navbar-brand" href="#"><img class="logoH" src="../images/logoNav.png">
    	</div>


    		<div class="collapse navbar-collapse navbar-right " id="myNavbar">
      			<ul class="nav navbar-nav">
        			<li>
                <?php  wp_nav_menu(array('theme_location' => 'nav')); ?>
              </li>
				
        </ul>
        </div>
		</nav>

<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::
::::::::::::::::::::::: Header :::::::::::::::::::::::::::
:::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<header class="row" id="header">

	    <div class="text-center logoHeader">
	       <a href="index.html"><img id="imgLogoHeader" src="wp-content/themes/EbullitionTest/images/logo.png"></a>
	       <p class="presentation">Vêtements, Accesoires et Décoration</p>
	    </div>
</header>


