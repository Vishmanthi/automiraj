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
			<a class="" href="dashboard" style="text-decoration: none;color: white;"><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px"></i>Online</a>
			<a class="" href="add_new" style="text-decoration: none;"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add new Item </a>
		    <a class="" href="manage_inventory" style="text-decoration: none;"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Manage Inventory</a>
		    <a class="" href="manage_supplier" style="text-decoration: none;"><i class="fa fa-car" style="padding-right: 10px"></i>Manage Suppliers</a>
		    <a class="" href="manage_report" style="text-decoration: none;"><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Reports</a>
		    
		</div>
		<div class="content" style="background: #f0f0f0;height: auto;min-height: 670px;">
			<h2 class="mont" style="padding: 25px 20px 0;">Add new Item</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			<div class="w3-row-padding">
				<div class="w3-col" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right:16px;width: 50%">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Add Item</h3>
					<form action="../accountant/add_item" method="post">
						<div class="w3-row-padding" style="padding: 6px;">
							<div class="w3-col" style="width: 25%">
								<span class="label1">Item Code</span>
							</div>
							<div class="w3-col" style="width:50%">
								<input class="w3-input w3-border w3-round" name="itemcode" placeholder="" value="<?php echo set_value('itemcode'); ?>" type="text">
							</div>
							<span style="color: red;"><?php echo form_error('itemcode'); ?></span>
						</div>
						<div class="w3-row-padding" style="padding: 6px;">
							<div class="w3-col" style="width: 25%">
								<span class="label1">Item Name</span>
							</div>
							<div class="w3-col" style="width:50%">
								<input class="w3-input w3-border w3-round" name="itemname" placeholder="" value="<?php echo set_value('itemname'); ?>" type="text">
							</div>
							<span style="color: red;"><?php echo form_error('itemname'); ?></span>
						</div>
						
						<div class="w3-row-padding" style="padding: 6px;">
							<div class="w3-col" style="width: 25%">
								<span class="label1">Brand Name</span>
							</div>
							<div class="w3-col" style="width:50%">
								<input class="w3-input w3-border w3-round" name="brand" placeholder="" value="<?php echo set_value('brand'); ?>" type="text">
							</div>
							<span style="color: red;"><?php echo form_error('brand'); ?></span>
						</div>
						<div class="w3-row-padding" style="padding: 6px;">
							<div class="w3-col" style="width: 25%">
								<span class="label1">Reorder Level</span>
							</div>
							<div class="w3-col" style="width:50%">
								<input class="w3-input w3-border w3-round" name="reorder" placeholder="" value="<?php echo set_value('reorder'); ?>" type="number">
							</div>
							<span style="color: red;"><?php echo form_error('reorder'); ?></span>
						</div>
						<div class="w3-row-padding" style="padding: 6px;">
							<div class="w3-col" style="width: 25%">
								<span class="label1">Selling Price</span>
							</div>
							<div class="w3-col" style="width:50%">
								<input class="w3-input w3-border w3-round" name="sprice" placeholder="" value="<?php echo set_value('sprice'); ?>" type="text">
							</div>
							<span style="color: red;"><?php echo form_error('sprice'); ?></span>
						</div>
						<div class="w3-center">
							<span style="color: green;margin-left: 20px;"><?php echo $this->session->flashdata('addsuc');?></span>
							<span style="color: red;margin-left: 20px;"><?php echo $this->session->flashdata('adderr');?></span>
						</div>
						<div class="w3-center">
							<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Add Item</button>
						</div>
					</form>
				</div>
			</div>
			<div class="w3-row-padding" style="padding-top: 20px;">
				<div class="w3-col l12 m12" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
				        <thead>
				            <tr>
				            	<th>Item Code</th>
				                <th>Item Name</th>
				                <th>Brand Name</th>
				                <th>Selling Price</th>
				                <th>Quantity</th>
				                <th>Reorder Level</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php if (isset($item)){?>
							<?php foreach ($item as $row) {?>
				        	<tr>
				            	<td><?php echo $row->spare_id ?></td>
				                <td><?php echo $row->name ?></td>
				                <td><?php echo $row->brand_name ?></td>
				                <td><?php echo $row->unit_price ?></td>
				                <td><?php echo $row->quantity ?></td>
				                <td><?php echo $row->reorder_level ?></td>
				            </tr>
				            <?php } ?>
							<?php } ?>
				        </tbody>
				    </table>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function() {
	   $('#example').DataTable();
	});
</script>
</html>