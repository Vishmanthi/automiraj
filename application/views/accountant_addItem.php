<!DOCTYPE html>
<html>
<head>
	<title>Accountant dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'header.php';?>
	<?php include 'sidebar.php';?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<style type="text/css">
		body {font-family: "Lato", sans-serif}
		.mont{
  		font-family: "Montserrat", sans-serif;
		}
		.calib{
	  		font-family: "Calibri", sans-serif;
		}
		label {font-family: "Lato", sans-serif;margin-top: 7px;margin-bottom: 7px;display: block;color: rgba(0,0,0,0.8);}
		.label1 {font-family: "Lato", sans-serif;display: inline-block;color: rgba(0,0,0,0.6);padding: 10px 0 10px 5px;}
		.label2	{font-family: "Lato", sans-serif;display: inline-block;color: rgba(0,0,0,0.9);padding: 10px 20px}
		input {margin-bottom: 10px;}
		a {text-decoration: none;}
		
	</style>
</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="sidebar">
			<a class="" onclick=""><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px"></i>Online</a>
			<a class="" href="add_new"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add new Item </a>
		    <a class="" href="manage_inventory"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Manage Inventory</a>
		    <a class="" href="manage_supplier"><i class="fa fa-car" style="padding-right: 10px"></i>Manage Suppliers</a>
		    <a class="" href=""><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Reports</a>
		    
		</div>
		<div class="content" style="background: #f0f0f0;height: 1000px;">
			<h2 class="mont" style="padding: 10px 20px 0;">Add new Item</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			<div class="w3-row-padding">
				<div class="w3-col" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right:16px;width: 70%">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Add Item</h3>
					<div class="w3-row-padding">
						<div class="w3-col" style="width: 15%">
							<span class="label1">Item Code</span>
						</div>
						<div class="w3-col" style="width:35%">
							<input class="w3-input w3-border w3-round" name="itemcode" placeholder="" value="" type="text">
						</div>
						<div class="w3-col" style="width: 15%">
							<span class="label1">Item Name</span>
						</div>
						<div class="w3-col" style="width:35%">
							<input class="w3-input w3-border w3-round" name="itemname" placeholder="" value="" type="text">
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col" style="width: 15%">
							<span class="label1">Brand</span>
						</div>
						<div class="w3-col" style="width:35%">
							<input class="w3-input w3-border w3-round" name="brand" placeholder="" value="" type="text">
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col" style="width: 15%">
							<span class="label1">Reorder Level</span>
						</div>
						<div class="w3-col" style="width:35%">
							<input class="w3-input w3-border w3-round" name="reorder" placeholder="" value="" type="text">
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col" style="width: 15%">
							<span class="label1">Selling Price</span>
						</div>
						<div class="w3-col" style="width:35%">
							<input class="w3-input w3-border w3-round" name="sprice" placeholder="" value="" type="text">
						</div>
					</div>
					<div class="w3-center">
						<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Add Item</button>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>