<!DOCTYPE html>
<html>
<head>
	<title>Cashier dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'header.php';?>
	<?php include 'sidebar.php';?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/w3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/dashboard.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/checkbox.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/combobox.css"> 

	<style type="text/css">
		body {font-family: "Lato", sans-serif}
		
		/*the container must be positioned relative:*/
		.label1 {font-family: "Lato", sans-serif;display: inline-block;color: rgba(0,0,0,0.6);padding: 10px 0 10px 5px;}
		.label2	{font-family: "Lato", sans-serif;display: inline-block;color: rgba(0,0,0,0.9);padding: 10px 20px}
		.custom-select {
		  position: relative;
		  font-family: Arial;
		}
		.custom-select select {
		  display: none; /*hide original SELECT element:*/
		}
		.select-selected {
		  background-color: #ccc;
		}
		/*style the arrow inside the select element:*/
		.select-selected:after {
		  position: absolute;
		  content: "";
		  top: 14px;
		  right: 10px;
		  width: 0;
		  height: 0;
		  border: 6px solid transparent;
		  border-color: rgba(0,0,0,0.7) transparent transparent transparent;
		}
		/*point the arrow upwards when the select box is open (active):*/
		.select-selected.select-arrow-active:after {
		  border-color: transparent transparent rgba(0,0,0,0.7 ) transparent;
		  top: 7px;
		}
		/*style the items (options), including the selected item:*/
		.select-items div,.select-selected {
		  color: rgba(0,0,0,0.8);
		  padding: 8px 16px;
		  border: 1px solid transparent;
		  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
		  cursor: pointer;
		  user-select: none;
		}
		/*style items (options):*/
		.select-items {
		  position: absolute;
		  background-color: #ccc;
		  top: 100%;
		  left: 0;
		  right: 0;
		  z-index: 99;
		}
		/*hide the items when the select box is closed:*/
		.select-hide {
		  display: none;
		}
		.select-items div:hover, .same-as-selected { 
		  background-color: rgba(0, 0, 0, 0.1);
		}

		 
	</style>
</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="sidebar">
			<a class="" onclick=""><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px"></i>Online</a>
		    <!-- <a class="" href="customers"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add Customer</a> -->
		    <!-- <a class="" href="vehicle"><i class="fa fa-car" style="padding-right: 10px"></i>Add Vehicle</a> -->
		    <a class="" href="<?php echo base_url(); ?>Manager/dailyServices"><i class="fa fa-pie-chart" style="padding-right: 10px"></i>Daily services analysis</a>
			<a class="" href="<?php echo base_url(); ?>Manager/salesAnalysis"><i class="fa fa-line-chart" style="padding-right: 10px"></i>Revenue analysis</a>
		    <a class="" href="<?php echo base_url(); ?>Manager/dailySpares"><i class="fa fa-wrench" style="padding-right: 10px"></i>Spares usage</a>
		    <a class="" href="<?php echo base_url(); ?>Manager/addUser"><i class="fa fa-address-card-o" style="padding-right: 10px"></i>Add User</a>
		    <a class="" href="<?php echo base_url(); ?>Manager/customercare"><i class="fa fa-user" style="padding-right: 10px"></i>Customer care</a>
			<a class="" href="<?php echo base_url(); ?>Manager/sentPromotions"><i class="fa fa-money" style="padding-right: 10px"></i>Promotions</a>
		</div>
		<div class="content" style="background: #f0f0f0;height: auto;min-height: 670px;">
			<h2 class="mont" style="padding: 25px 20px 0;">Customer Care</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			<div class="w3-row-padding" style="padding-bottom: 20px;padding-top: 20px;">
				<div class="w3-col" style="width: 20%;">
					<div class="mont" style="border: 1px solid lightgrey;border-radius: 10px;background-color:white;padding: 10px 20px;font-size: 30px;padding: 20px 20px;">
						Messages
						
					</div>
				</div>
				<div class="w3-col" style="width: 10%">
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle fa-stack-2x" style="color: red;font-size: 2.1em;top: -8px;right: 1px;position: relative;left: -30px;"><span class="fa fa-stack-1x" style="color: white;font-size:17px;top: 5px;"><?php echo $count; ?></span></i>
						
					</span>
				</div>
			</div>
			<div class="w3-row-padding" style="padding-top: 20px;padding-bottom: 20px;">
				<div class="w3-col" style="border: 1px solid lightgrey;border-radius: 3px;background-color:white;margin-right:16px;width: 55%;padding: 10px 10px;">
					
					<?php if (isset($cus)){?>
					<?php foreach ($cus as $row) {?>
					<div style="padding: 10px 10px 5px 10px;">
						<div class="mont w3-col" style="border: 1px solid lightgrey;border-radius: 5px;background-color: #d6e0f5;padding: 10px 20px;width: 80%;margin-bottom: 10px;">Name : <?php echo $row->name ?><br>Email : <?php echo $row->email ?><br>Message : <?php echo $row->message ?></div>
						
						<div class="w3-col" style="width: 10%">
							<button onclick="setEmail()" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="padding: 10px 10px;margin:20px 0 0 10px;">Reply</button>
						</div>
						<form method="post" action="../manager/removeMessage">
						<input type="hidden" name="name" value="<?php echo $row->name ?>">
						<input type="hidden" name="email" value="<?php echo $row->email ?>" id="email">
						<input type="hidden" name="message" value="<?php echo $row->message ?>">
						<div class="w3-col" style="width: 10%">
							<button type="submit" class="w3-button w3-red w3-round w3-hover-shadow w3-hover-red" style="padding: 10px 5px;margin:20px 0 0 10px;">Remove</button>
						</div>
						</form>
					</div>
					<?php } ?>	
					<?php } ?>	
				</div>
				<div class="w3-col" style="border: 1px solid lightgrey;border-radius: 3px;background-color:white;margin-right:16px;width: 40%;padding: 10px 10px;">
					<form action="../manager/email" method="post">
						<div class="w3-row-padding" style="padding: 10px;">
								<div class="w3-col w3-container" style="width: 35%">
									<span class="label1" style="padding-top: 10px;">To<span style="color: red;margin-left: 4px;">*</span></span>
								</div>
								<div class="w3-col w3-container" style="width: 65%">
									<div class="w3-col" style="width: 100%">
										<input class="w3-input w3-border w3-round" name="to" placeholder="" value="" type="email" id="semail">
									</div>
									<div class="w3-col" style="width: 60%;color: red;margin-left:10px;">
											<?php echo form_error('to'); ?>
									</div>
								</div>
						</div>
						<div class="w3-row-padding" style="padding: 10px;">
								<div class="w3-col w3-container" style="width: 35%">
									<span class="label1" style="padding-top: 10px;">Subject<span style="color: red;margin-left: 4px;">*</span></span>
								</div>
								<div class="w3-col w3-container" style="width: 65%">
									<div class="w3-col" style="width: 100%">
										<input class="w3-input w3-border w3-round" name="subject" placeholder="" value="" type="text">
									</div>
								</div>
						</div>
						<div class="w3-row-padding" style="padding: 10px;">
								<div class="w3-col w3-container" style="width: 35%">
									<span class="label1" style="padding-top: 10px;">Message<span style="color: red;margin-left: 4px;">*</span></span>
								</div>
								<div class="w3-col w3-container" style="width: 65%">
									<div class="w3-col" style="width: 100%">
										<textarea class="w3-input w3-border w3-round" name="message" placeholder="" value="" type=""></textarea>
									</div>
									<div class="w3-col" style="width: 60%;color: red;margin-left:10px;">
											<?php echo form_error('message'); ?>
									</div>
								</div>
						</div>
						<div class="w3-center">
							<span style="color: green;margin-left: 20px;"><?php echo $this->session->flashdata('success');?></span>
							<span style="color: red;margin-left: 20px;"><?php echo $this->session->flashdata('error');?></span>
						</div>
						<div class="w3-center">
							<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="padding: 15px 20px;margin-top: 10px;">Send Email</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</body>
<script>
	function setEmail(){
		var email=document.getElementById("email").value;
		document.getElementById("semail").value=email;
	}
</script>
</html>