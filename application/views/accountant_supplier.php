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
		<div class="content" style="background: #f0f0f0;height: auto;" id="inventory">
			<h2 class="mont" style="padding: 25px 20px 0;">Manage Suppliers</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			<div class="w3-row-padding" style="padding-top: 20px;padding-bottom: 20px;">
				<div class="w3-col l12 m12" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;">
					<h3 class="mont" style="padding: 20px 20px 15px;color: rgba(0,0,0,0.7);">All Suppliers Table</h3>
					<table id="example1" class="table table-striped table-bordered" style="width:100%;margin: 10px 0 5px 0;">
				        <thead>
				            <tr>
				            	<th>Supplier ID</th>
				                <th>Supplier Name</th>
				                <th>Address</th>
				                <th>Phone</th>
				                <th>Fax</th>
				                <th>Email</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php if (isset($supplierData)){?>
							<?php foreach ($supplierData as $row) {?>
				        	<tr>
				            	<td><?php echo $row->id ?></td>
				                <td><?php echo $row->name ?></td>
				                <td><?php echo $row->no; ?>,<?php echo $row->lane1; ?>,<?php if($row->lane2){echo $row->lane2; } ?>,<?php echo $row->city ?></td>
				                <td><?php echo $row->phone ?></td>
				                <td><?php echo $row->fax ?></td>
				                <td><?php echo $row->email ?></td>
				            </tr>
				            <?php } ?>
							<?php } ?>
				        </tbody>
				    </table>
				</div>
			</div>
			<div class="w3-row-padding">
				<div class="w3-col" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right:16px;width: 55%">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Overview</h3>
					<form method="post" action="../accountant/search_supplier">
						<div class="w3-row-padding">
							<div class="w3-col" style="width: 40%">
								<div class="w3-col" style="width: 50%">
									<label>Supplier ID</label>
								</div>
								<div class="w3-col" style="width: 50%;color: red;margin-top: -15px;">
									<?php echo form_error('s_id'); ?>
								</div>
								<input class="w3-input w3-border w3-round" type="text" name="s_id" placeholder="" value="<?php echo set_value('s_id',(isset($id)) ? $id : ''); ?>" onfocus="this.value=''" id="s_id">
							</div>
							<div class="w3-col" style="width: 40%">
								<div class="w3-col" style="width: 50%">
									<label>Supplier Name</label>
								</div>
								<div class="w3-col" style="width: 50%;color: red;margin-top: -15px;">
									<?php echo form_error('s_name'); ?>
								</div>
								<input class="w3-input w3-border w3-round" type="text" name="s_name" placeholder="" value="<?php echo set_value('s_name',(isset($name)) ? $name : ''); ?>" onfocus="this.value=''" id="s_name">
							</div>
							<div class="w3-col" style="width: 10%">
								<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 33px 0 10px;padding: 10px 20px;">Search</button>
							</div>
						</div>
					</form>
					<?php if (isset($supplier)){?>
					<?php foreach ($supplier as $row) {?>
					<form method="post" action="../accountant/update_supplier">
						<input type="hidden" name="s_id" id="sup_id">
						<input type="hidden" name="s_name" id="sup_name">
						<div class="w3-row-padding">
							<div class="w3-col">
								<label>Address</label>
								<div class="w3-row">
									<div class="w3-col" style="width:70%">
										<input class="w3-input w3-border w3-round" type="text" name="no" placeholder="" value="<?php echo $row->no ?>" onfocus="this.value=''">
									</div>
									<div class="w3-col" style="width:30%;color: red;">
										<?php echo form_error('no'); ?>
									</div>
								</div>
								<div class="w3-row">
									<div class="w3-col" style="width:70%">
										<input class="w3-input w3-border w3-round" type="text" name="lane1" placeholder="" value="<?php echo $row->lane1 ?>" onfocus="this.value=''">
									</div>
									<div class="w3-col" style="width:30%;color: red;">
										<?php echo form_error('lane1'); ?>
									</div>
								</div>
								<div style="width: 70%">
									<input class="w3-input w3-border w3-round " type="text" name="lane2" placeholder="" value="<?php echo $row->lane2 ?>" onfocus="this.value=''">
								</div>
								<div class="w3-row">
									<div class="w3-col" style="width:70%">
										<input class="w3-input w3-border w3-round " type="text" name="city" placeholder="" value="<?php echo $row->city ?>" onfocus="this.value=''">
									</div>
									<div class="w3-col" style="width:30%;color: red;">
										<?php echo form_error('city'); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col" style="width: 50%">
								<div class="w3-col" style="width: 50%;">
									<label>Phone Number</label>
								</div>
								<div class="w3-col" style="width: 50%;color: red;margin-top: 0px;">
									<?php echo form_error('phone'); ?>
								</div>
								<input class="w3-input w3-border w3-round" type="text" name="phone" placeholder="" value="<?php echo $row->phone ?>" style="width: 90%" onfocus="this.value=''">
							</div>
							<div class="w3-col" style="width: 50%">
								<div class="w3-col" style="width: 50%;">
									<label>Fax</label>
								</div>
								<div class="w3-col" style="width: 50%;color: red;margin-top: 0px;">
									<?php echo form_error('fax'); ?>
								</div>
								<input class="w3-input w3-border w3-round" type="text" name="fax" placeholder="" value="<?php echo $row->fax ?>" style="width: 90%" onfocus="this.value=''">

							</div>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col">
								<div class="w3-col" style="width: 50%;">
									<label>Email</label>
								</div>
								<div class="w3-col" style="width: 50%;color: red;margin-top: 0px;">
									<?php echo form_error('email'); ?>
								</div>
								<input class="w3-input w3-border w3-round" type="email" name="email" placeholder="" value="<?php echo $row->email ?>" style="width: 70%" onfocus="this.value=''">
							</div>
						</div>
						<div class="w3-center">
							<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Update</button>
						</div>
					</form>
					<?php } ?>		
					<?php } else {?>
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
							<span style="color: green;margin-left: 20px;"><?php echo $this->session->flashdata('supUpsuc');?></span>
							<span style="color: red;margin-left: 20px;"><?php echo $this->session->flashdata('supUperr');?></span>
						</div>
						<div class="w3-center">
							<button class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Update</button>
						</div>
					<?php } ?>	
				</div>
				<div class="w3-col m12" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;width: 40%">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Add new Supplier</h3>
					<form method="post" action="../accountant/add_supplier" autocomplete="off">
						<div class="w3-row-padding" >
							<div class="w3-col" style="width: 70%">
								<label>Supplier Name<span style="color: red;"> *</span></label>
								<input class="w3-input w3-border w3-round"type="text" name="sname" placeholder="" value="" style="width: 100%">
							</div>
							<div class="w3-col" style="width: 30%;margin:30px 0 0 -3px">
								<span class="" style="color: red"><?php echo form_error('sname'); ?></span>
							</div>
							
						</div>
						<div class="w3-row-padding">
							<div class="w3-col" style="width:100%">
								<label>Address<span style="color: red;"> *</span></label>
								<div class="w3-row">
									<div class="w3-col" style="width: 70%">
										<input class="w3-input w3-border w3-round" type="text" name="no1" placeholder="" value="">
									</div>
									<div class="w3-col" style="width: 30%;padding-left: 10px;">
										<span style="color: red;"><?php echo form_error('no1'); ?></span>
									</div>
								</div>
								<div class="w3-row">
									<div class="w3-col" style="width: 70%">
										<input class="w3-input w3-border w3-round" type="text" name="lane11" placeholder="" value="">
									</div>
									<div class="w3-col" style="width: 30%;padding-left: 10px;">
										<span style="color: red;"><?php echo form_error('lane11'); ?></span>
									</div>
								</div>
								<div class="w3-row">
									<div class="w3-col" style="width: 70%">
										<input class="w3-input w3-border w3-round" type="text" name="lane21" placeholder="" value="">
									</div>
								</div>
								<div class="w3-row">
									<div class="w3-col" style="width: 70%">
										<input class="w3-input w3-border w3-round" type="text" name="city1" placeholder="" value="">
									</div>
									<div class="w3-col" style="width: 30%;padding-left: 10px;">
										<span style="color: red;"><?php echo form_error('city1'); ?></span>
									</div>
								</div>	
							</div>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col" style="width: 50%">
								<div class="w3-row">
									<div class="w3-col" style="width: 40%">
										<label>Phone <span style="color: red;"> *</span></label>
									</div>
									<div class="w3-col" style="width: 55%;margin-top: 0px;">
										<span style="color: red;"><?php echo form_error('phone1'); ?></span>
									</div>
								</div>
								<input class="w3-input w3-border w3-round" type="text" name="phone1" placeholder="" value="" style="width: 90%;">
							</div>
							<div class="w3-col" style="width: 50%">
								<label>Fax</label>
								<input class="w3-input w3-border w3-round" type="text" name="fax1" placeholder="" value="" style="width: 90%">
							</div>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col">
								<label>Email</label>
								<input class="w3-input w3-border w3-round" type="email" name="email1" placeholder="" value="" style="width: 70%">
							</div>
						</div>
						<div class="w3-center">
							<span style="color: green;margin-left: 20px;"><?php echo $this->session->flashdata('sup_succ');?></span>
							<span style="color: red;margin-left: 20px;"><?php echo $this->session->flashdata('sup_err');?></span>
						</div>
						<div class="w3-center">
							
							<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Add Supplier</button>
						</div>
						
					</form>
				</div>
			</div>
			
			<div class="w3-row-padding" style="padding-top: 20px;padding-bottom: 20px;">
				<div class="w3-col l12 m12" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;">
					<h3 class="mont" style="padding: 20px 20px 15px;color: rgba(0,0,0,0.7);">Supplier Stock Table</h3>
					<table id="example2" class="table table-striped table-bordered" style="width:100%;margin: 10px 0 5px 0;">
				        <thead>
				            <tr>
				            	<th>Stock ID</th>
				                <th>Date</th>
				                <th>Item</th>
				                <th>Brand</th>
				                <th>Quantity added</th>
				                <th>Purchase Price</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php if (isset($supstockData)){?>
							<?php foreach ($supstockData as $row) {?>
				        	<tr>
				            	<td><?php echo $row->id ?></td>
				                <td><?php echo $row->date ?></td>
				                <td><?php echo $row->item_code; ?></td>
				                <td><?php echo $row->brand ?></td>
				                <td><?php echo $row->quantity_added ?></td>
				                <td><?php echo $row->purchase_price ?></td>
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
	var id=document.getElementById("s_id").value;
	var name=document.getElementById("s_name").value;
	if(id!=''){
		document.getElementById("sup_id").value=id;
	}
	if(name!=''){
		document.getElementById("sup_name").value=name;
	}
	$(document).ready(function() {
	   $('#example1').DataTable();
	   $('#example2').DataTable();
	});
</script>
</html>