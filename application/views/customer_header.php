<!DOCTYPE html>
<html>
<head>
<title>Auto Miraj</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
.mukta{
  font-family: "Mukta", sans-serif;
}
.mont{
  font-family: "Montserrat", sans-serif;
}
.buttonop:hover{opacity:0.5;}
</style>
</head>
<body>
	<!-- Navbar -->
	<div class="w3-top">
	  <div class="w3-bar w3-card w3-black" style="opacity: 0.8">
	    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right buttonop" href="javascript:void(0)" onclick="navigation()" title="Toggle Navigation Menu" style="padding: 13px 20px"><i class="fa fa-bars"></i></a>
	    <a class="w3-bar-item w3-button w3-hide-small w3-hide-large w3-right buttonop" href="javascript:void(0)" onclick="navigation1()" title="Toggle Navigation Menu" style="padding: 13px 20px"><i class="fa fa-bars"></i></a>
	    <img class="w3-bar-item" style="padding: 0px 0px;height:45px;width: 209px" src="<?php echo base_url(); ?>/assests/images/logo2.png">
	    <div class="w3-right">
	      <a href="../welcome" class="w3-bar-item w3-button w3-hover-yellow w3-hide-small " style="padding: 13px 16px">HOME</a>
	      <a href="../welcome#about" class="w3-bar-item w3-button  w3-hide-small w3-hover-yellow w3-hide-medium" style="padding: 13px 16px">ABOUT US</a>
	      <a href="../welcome#contact" class="w3-bar-item w3-button  w3-hide-small w3-hover-yellow w3-hide-medium" style="padding: 13px 16px">SERVICES</a>
	      <a href="../welcome#contact" class="w3-bar-item w3-button  w3-hide-small w3-hover-yellow" style="padding: 13px 16px">CONTACT</a>
	      <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-yellow w3-hide-medium" style="padding: 13px 16px">PROMOTIONS</a>
	      <a href="../customer/reserveService" class="w3-bar-item w3-button w3-hide-small w3-hover-yellow w3-hide-medium" style="padding: 13px 16px">DASHBOARD</a>
	      <a href="<?php echo base_url(); ?>users/logout" class="w3-bar-item w3-button w3-hover-yellow w3-hide-small" style="padding: 13px 16px;width: auto;">LOGOUT</a>
	      
	    </div>
	  </div>
	</div>

	<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
	<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
	  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">HOME</a>
	  <a href="#about" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">ABOUT US</a>
	  <a href="#tour" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">SERVICES</a>
	  <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">CONTACT</a>
	  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">PROMOTIONS</a>
	  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">LOGIN</a>
	</div>

	<!-- Navbar on tablets,medium screens -->
	<div id="navDemoM" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-small w3-top" style="margin-top:46px">
	  <a href="#about" class="w3-bar-item w3-button w3-padding-large" onclick="navigation1()">ABOUT US</a>
	  <a href="#tour" class="w3-bar-item w3-button w3-padding-large" onclick="navigation1()">SERVICES</a>
	  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="navigation1()">PROMOTIONS</a>
	</div>
</body>
</html>