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
			<a class="" href=""><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add new Item </a>
		    <a class="" href="manage_inventory"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Manage Inventory</a>
		    <a class="" href="manage_supplier"><i class="fa fa-car" style="padding-right: 10px"></i>Manage Suppliers</a>
		    <a class="" href=""><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Reports</a>
		    
		</div>
		<div class="content" style="background: #f0f0f0;height: 1000px;" id="inventory">
			<h2 class="mont" style="padding: 10px 20px 0;">Manage Suppliers</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			<div class="w3-row-padding">
				<div class="w3-col" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right:16px;width: 55%">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Overview</h3>
					<div class="w3-row-padding">
						<div class="w3-col" style="width: 40%">
							<label>Supplier ID</label>
							<input class="w3-input w3-border w3-round" type="text" name="s_id" placeholder="" value="">
						</div>
						<div class="w3-col" style="width: 40%">
							<label>Supplier Name</label>
							<input class="w3-input w3-border w3-round" type="text" name="s_name" placeholder="" value="">
						</div>
						<div class="w3-col" style="width: 10%">
							<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 33px 0 10px;padding: 10px 20px;">Search</button>
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col">
							<label>Address</label>
							<div style="width:70%">
								<input class="w3-input w3-border w3-round" type="text" name="no" placeholder="" value="">
								<input class="w3-input w3-border w3-round" type="text" name="lane1" placeholder="" value="">
								<input class="w3-input w3-border w3-round " type="text" name="lane2" placeholder="" value="">
								<input class="w3-input w3-border w3-round " type="text" name="city" placeholder="" value="">
							</div>
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col" style="width: 50%">
							<label>Phone Number</label>
							<input class="w3-input w3-border w3-round" type="text" name="phone" placeholder="" value="" style="width: 90%">
						</div>
						<div class="w3-col" style="width: 50%">
							<label>Fax</label>
							<input class="w3-input w3-border w3-round" type="text" name="fax" placeholder="" value="" style="width: 90%">
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col">
							<label>Email</label>
							<input class="w3-input w3-border w3-round" type="email" name="email" placeholder="" value="" style="width: 70%">
						</div>
					</div>
					<div class="w3-center">
						<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Update</button>
						<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Delete</button>
					</div>
				</div>
				<div class="w3-col" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;width: 40%">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Add new Supplier</h3>
					<div class="w3-row-padding" >
						<div class="w3-col" style="width: 50%">
							<label>Supplier ID</label>
							<input class="w3-input w3-border w3-round" type="text" name="sid" placeholder="" value="" style="width: 90%">
						</div>
						<div class="w3-col" style="width: 50%">
							<label>Supplier Name<span style="color: red;"> *</span></label>
							<input class="w3-input w3-border w3-round"type="text" name="sname" placeholder="" value="" style="width: 90%">
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col">
							<label>Address<span style="color: red;"> *</span></label>
							<div style="width:70%">
								<input class="w3-input w3-border w3-round" type="text" name="no" placeholder="" value="">
								<input class="w3-input w3-border w3-round" type="text" name="lane1" placeholder="" value="">
								<input class="w3-input w3-border w3-round " type="text" name="lane2" placeholder="" value="">
								<input class="w3-input w3-border w3-round " type="text" name="city" placeholder="" value="">
							</div>
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col" style="width: 50%">
							<label>Phone <span style="color: red;"> *</span></label>
							<input class="w3-input w3-border w3-round" type="text" name="phone" placeholder="" value="" style="width: 90%">
						</div>
						<div class="w3-col" style="width: 50%">
							<label>Fax</label>
							<input class="w3-input w3-border w3-round" type="text" name="fax" placeholder="" value="" style="width: 90%">
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col">
							<label>Email</label>
							<input class="w3-input w3-border w3-round" type="email" name="email" placeholder="" value="" style="width: 70%">
						</div>
					</div>
					<div class="w3-center">
						<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Add Supplier</button>
					</div>
				</div>
			</div>
			
			<div class="w3-row-padding" >
				<div class="w3-col" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-top: 10px;width: 96.5%">
					<div class="w3-row-padding">
						<div class="w3-col" style="width:3.5%">
							<label>Show</label>
						</div>
						<div class="w3-col" style="width:7%">
							<input class="w3-input w3-border w3-round" type="number" name="entry" placeholder="10" value="">
						</div>
						<div class="w3-col" style="width:4%">
							<label>entries</label>
						</div>
						<div class="w3-col" style="width:15%;float: right;">
							<input class="w3-input w3-border w3-round" type="text" name="search" placeholder="" value="">
						</div>
						<div class="w3-col" style="width:4.5%;float: right;">
							<label>Search</label>
						</div>
						
					</div>
					<table class="w3-table-all" style="margin-top: 20px;">
						<tr>
							<th>Date</th>
							<th>Item code</th>
							<th>Item name</th>
							<th>Quantity</th>
							<th>Unit Price</th>
							<th>Total Price</th>
						</tr>
					</table>

				</div>
			</div>
		</div>
	</div>
</body>