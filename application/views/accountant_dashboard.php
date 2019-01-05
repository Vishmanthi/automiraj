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
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/af-2.3.2/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
 
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/af-2.3.2/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>
	<style type="text/css">
		body {font-family: "Lato", sans-serif}
		.mont{
  		font-family: "Montserrat", sans-serif;
		}
		.calib{
	  		font-family: "Calibri", sans-serif;
		}
		label {font-family: "Lato", sans-serif;margin-top: 7px;margin-bottom: 7px;display: block;color: rgba(0,0,0,0.6);}
		.label1 {font-family: "Lato", sans-serif;display: inline-block;color: rgba(0,0,0,0.6);padding: 10px 0 10px 5px;}
		.label2	{font-family: "Lato", sans-serif;display: inline-block;color: rgba(0,0,0,0.9);padding: 10px 20px}
		input {margin-bottom: 10px;}
		a {text-decoration: none;}
		
	</style>
</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="sidebar">
			<a class="" href="dashboard" style="text-decoration: none;color: white;"><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px"></i>Online</a>
			<a class="" href="add_new" style="text-decoration: none"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add new Item </a>
		    <a class="" href="manage_inventory" style="text-decoration: none"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Manage Inventory</a>
		    <a class="" href="manage_supplier" style="text-decoration: none"><i class="fa fa-car" style="padding-right: 10px"></i>Manage Suppliers</a>
		    <a class="" href="" style="text-decoration: none"><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Reports</a>
		    
		</div>
		<div class="content" style="background: #f0f0f0;height: auto;min-height: 670px;" id="inventory">
			<h2 class="mont" style="padding: 25px 20px 0;">Dashboard</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			<div class="w3-row-padding" style="padding-bottom: 20px;padding-top: 20px;">
				<div class="w3-col" style="width: 20%;">
					<div class="mont" style="border: 1px solid lightgrey;border-radius: 10px;background-color:white;padding: 10px 20px;font-size: 30px;padding: 20px 20px;">
						Notifications
						
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
					
					<?php if (isset($reorder)){?>
					<?php foreach ($reorder as $row) {?>
					<div style="padding: 10px 10px 5px 10px;">
						<div class="mont" style="border: 1px solid lightgrey;border-radius: 5px;background-color: #ffcccc;padding: 10px 20px;margin-right: 70px"><b><?php echo $row->spare_id ?>,<?php echo $row->brand_name ?></b> item is in critical level.<br><span style="padding-right: 10px;">Available Quantity - <?php echo $row->quantity ?></span>Reorder Level - <?php echo $row->reorder_level ?></div>
					</div>
					<?php } ?>	
					<?php } ?>	
				</div>
			</div>
		</div>

	</div>
</body>
</html>