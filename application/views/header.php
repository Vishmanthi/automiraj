<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.bar:hover{background-color: #fff;opacity: 0.5;}
.buttonop:hover{background-color: #555;}
.search input[type=text] {
  padding: 4px;
  margin-top: 7px;
  font-size: 17px;
  border: none;
}
a {text-decoration: none;}
</style>
<body>

	<div class="w3-top">
  		<div class="w3-bar w3-card w3-black" style="opacity: 1.0">
		    <img class="w3-bar-item" style="padding: 0px 0px;height:45px;width: 209px" src="<?php echo base_url(); ?>/assests/images/logo2.png">
		    <div class="w3-right w3-bar-item buttonop" style="padding: 13px;color: white;text-decoration: none;">
				<a href="../users/logout" style="color: white;text-decoration: none;">LOGOUT</a>
	      	</div>
	      	<a href="" class="w3-bar-item w3-left buttonop" style="padding: 13px 15px"><i class="fa fa-bars" style="color: white"></i></a>
	      	
		</div>
	</div>
</body>
</html>