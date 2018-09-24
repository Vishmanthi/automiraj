<!DOCTYPE html>
<html>
<head>
<title>Service Advisor dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'customer_header.php';?>
<?php include 'customer_sidebar.php';?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Calibri">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/checkbox.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
	body {font-family: "Lato", sans-serif}
	.mont{
  		font-family: "Montserrat", sans-serif;
	}
	.calib{
  		font-family: "Calibri", sans-serif;
	}
	label {font-family: "Lato", sans-serif;margin-top: 15px;margin-bottom: 7px;display: block;color: rgba(0,0,0,0.8);}
	input {margin-bottom: 15px;}
</style>
</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="content" style="background: #f0f0f0" id="editProfile">
			<h2 class="mont" style="padding: 10px 20px 0;">Edit Profile</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			<div class="w3-row-padding">
				<div class="w3-col m7" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right: 16px">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Edit Basic Information</h3>
					<div class="w3-row-padding">
						<div class="w3-col w3-container" style="width: 10%;">
							<label>Title</label>
							<input class="w3-input w3-border w3-round" type="" name="" placeholder="">
						</div>
						<div class="w3-col w3-container" style="width: 45%;">
							<label>First Name</label>
							<input class="w3-input w3-border w3-round" type="" name="" placeholder="">
						</div>
						<div class="w3-col w3-container" style="width: 45%;">
							<label>Last Name</label>
							<input class="w3-input w3-border w3-round" type="" name="" placeholder="">
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col w3-container" style="width: 100%;">
							<label>NIC No</label>
							<input class="w3-input w3-border w3-round w3-disabled" style="background-color: rgba(0,0,0,0.1);" type="" name="" placeholder="">
						</div>						
					</div>
					<div class="w3-row-padding">
						<div class="w3-col w3-container" style="width: 100%;">
							<label>Address</label>
							<input class="w3-input w3-border w3-round" type="" name="" placeholder="">
						</div>						
					</div>
					<div class="w3-row-padding">
						<div class="w3-col w3-container" style="width: 50%;">
							<label>Contact Number</label>
							<input class="w3-input w3-border w3-round" type="" name="" placeholder="">
						</div>
						<div class="w3-col w3-container" style="width: 50%;">
							<label>Email</label>
							<input class="w3-input w3-border w3-round" type="" name="" placeholder="">
						</div>
						
					</div>
					<div class="w3-center">
						<button class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Update Profile</button>
						
					</div>
					
				</div>
				<div class="w3-col m4 " style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Change Password</h3>
						<div class="w3-container" style="width: 100%;">
							<label>Current Password</label>
							<input class="w3-input w3-border w3-round" type="Password" name="" placeholder="">
							<label>New Password</label>
							<input class="w3-input w3-border w3-round" type="Password" name="" placeholder="">
							<label>Repeat New Password</label>
							<input class="w3-input w3-border w3-round" type="Password" name="" placeholder="">
						</div>
						<div class="w3-center">
							<button class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Change Password</button>
						</div>
				</div>
			</div>
		</div>
	</div>
</body>