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
		label {font-family: "Lato", sans-serif;margin-top: 15px;margin-bottom: 7px;display: block;color: rgba(0,0,0,0.8);}
		.label1 {font-family: "Lato", sans-serif;display: inline-block;color: rgba(0,0,0,0.6);padding: 10px 0 10px 5px;}
		.label2	{font-family: "Lato", sans-serif;display: inline-block;color: rgba(0,0,0,0.9);padding: 10px 20px}
		input {margin-bottom: 15px;}
		a {text-decoration: none;}
		/* Popup container - can be anything you want */
		.popup {
		    position: relative;
		    display: inline-block;
		    cursor: pointer;
		}

		/* The actual popup */
		.popup .popuptext {
		    
		    visibility: hidden;
		    background-color: #555;
		    color: #fff;
		    border-radius: 10px;
		    padding:0 0;
		    position: absolute;
		    z-index: 1;
		    top: 145%;
		    left: 50%;
		    margin-left: -80px;
		    text-align: center;
		    font-family: "Lato";
		}
		.popup .popuptext:target {
			visibility: visible;
		}
		/* Popup arrow */
		.popup .popuptext::after {
		    content: "";
		    position: absolute;
		    bottom: 100%;
		    left: 35%;
		    margin-left: -5px;
		    border-width: 5px;
		    border-style: solid;
		    border-color: transparent transparent #555 transparent;
		}
		/* The Close Button */
		.close {
		    color: #aaaaaa;
		    font-size: 18px;
		    font-weight: bold;
		}

		.close:hover,
		.close:focus {
		    color: #000;
		    text-decoration: none;
		    cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="sidebar">
			<a class="" href="dashboard" style="color: white;text-decoration: none;"><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px"></i>Online</a>
			<a class="" href="add_new" style="text-decoration: none"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add new Item </a>
		    <a class="" href="manage_inventory" style="text-decoration: none"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Manage Inventory</a>
		    <a class="" href="manage_supplier" style="text-decoration: none"><i class="fa fa-car" style="padding-right: 10px"></i>Manage Suppliers</a>
		    <a class="" href="" style="text-decoration: none"><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Reports</a>
		    
		</div>
		<div class="content" style="background: #f0f0f0;height: auto;" id="inventory">
			<h2 class="mont" style="padding: 25px 20px 0;">Manage Inventory</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			<form method="post" action="../accountant/accountant_search">
				<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 25%;">
								<div class="w3-row">
									<div class="w3-col" style="width:30%">
										<label>Item Code</label>
									</div>
									<div class="w3-col w3-right" style="width: 50%;color: red">
										<?php echo form_error('item_code'); ?>
									</div>
								</div>
								
								<input class="w3-input w3-border w3-round" type="text" name="item_code" id='item' placeholder="" value="<?php echo set_value('item_code',(isset($id)) ? $id : ''); ?>">
								
							</div>
							<div class="w3-col w3-container" style="width: 25%;">
								<div class="w3-row">
									<div class="w3-col" style="width:30%">
										<label>Brand</label>
									</div>
									<div class="w3-col w3-right" style="width: 50%;color: red">
										<?php echo form_error('brand'); ?>
									</div>
								</div>
								<input class="w3-input w3-border w3-round" type="text" name="brand" id='brand' placeholder="" value="<?php echo set_value('brand',(isset($brand)) ? $brand : ''); ?>">

							</div>
							<div class="w3-col w3-container" style="width: 20%;">
								<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 40px 0;padding: 12px 20px;">Search</button>
								
							</div>
				</div>
			</form>
			<div class="w3-row-padding">
				<div class="w3-col m6" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right:16px;width: 350px;">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Overview</h3>
					<?php if (isset($searchData)){?>
					<?php foreach ($searchData as $row) {?>
					<div class="w3-row-padding" >
						<div class="w3-col" style="width: 55%">
							<span class="label1">Item name</span>
						</div>
						<div class="w3-col" style="width: 45%">
							<span class="label2"><?php echo $row->name ?></span>
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col" style="width: 55%">
							<span class="label1">Available Quantity</span>
						</div>
						<div class="w3-col" style="width: 45%">
							<span class="label2" ><?php echo $row->quantity ?></span>
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col w3-container" style="width: 55%">
							<span class="label1">Reorder Level</span>
						</div>
						<div class="w3-col" style="width: 25%">
							<span class="label2"><?php echo $row->reorder_level ?></span>
						</div>
						<div class="w3-col" style="width: 20%">
							<div class="popup">
							<a href="#reOrder"><i class="fa fa-pencil" aria-hidden="true" id="myBtn" style="margin-top: 13px;"></i></a>
								<div class="popuptext w3-container" id="reOrder" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right:16px;width: 5.8cm">
									<div class="w3-row" style="background-color: #f0f0f0;padding: 7px 0">
										<div class="w3-col w3-center" style="width: 90%">
											
											<span class="mont w3-center" style="color: rgba(0,0,0,0.7);font-size:14px;">Reorder Level</span>
										</div>
										<div class="w3-col w3-center" style="width: 10%">
											<a href="#"><span class="close">&times;</span></a>
										</div>
									</div>
									<div class="w3-container" >
										<div class="w3-row-padding">
											<span class="w3-left" style="font-size: 14px;color: black;margin-top: 5px;">Set Re-Order Level</span>
										</div>
										<div class="w3-row" style="color: red;margin: -20px 0px -20px -25px;">
											<?php echo form_error('reorder'); ?>
										</div>
										<form method="post" action="../accountant/reorder_level">
											<input type="hidden" name="item_code" value="" id="reorder_id">
											<input type="hidden" name="brand" value="" id="reorder_brand">
											<div class="w3-row-padding">
												<input class="w3-input w3-border w3-round" type="number" name="reorder" style="margin-top: 10px;" placeholder="<?php echo $row->reorder_level ?>">
											</div>
											<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="padding: 10px 20px;margin-bottom: 15px;">Update</button>
										</form>	

									</div>
								</div>
							</div>
						</div>
					</div>
					<h6 class="mont" style="padding: 30px 20px 0px;color: rgb(0,0,0);">Sales Information</h6>
					<div class="w3-row-padding">
						<div class="w3-col" style="width: 55%">
							<span class="label1" style="margin-bottom: 20px;">Selling Price</span>
						</div>
						<div class="w3-col" style="width: 25%">
							<span class="label2" ><?php echo $row->unit_price ?></span>
						</div>
						<div class="w3-col" style="width: 20%">
							<div class="popup">
							<a href="#sellingPrice"><i class="fa fa-pencil" aria-hidden="true" id="myBtn" style="margin-top: 13px;"></i></a>
								<div class="popuptext w3-container" id="sellingPrice" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right:16px;width: 5.8cm">
									<div class="w3-row" style="background-color: #f0f0f0;padding: 7px 0">
										<div class="w3-col w3-center" style="width: 90%">
											
											<span class="mont w3-center" style="color: rgba(0,0,0,0.7);font-size:14px;">Selling Price</span>
										</div>
										<div class="w3-col w3-center" style="width: 10%">
											<a href="#"><span class="close">&times;</span></a>
										</div>
									</div>
									<div class="w3-container" >
										<div class="w3-row-padding">
											<span class="w3-left" style="font-size: 14px;color: black;margin-top: 5px;">Set Selling Price</span>
										</div>
										<div class="w3-row" style="color: red;margin: -20px 0px -20px -25px;">
											<?php echo form_error('selling'); ?>
										</div>
										<form method="post" action="../accountant/sellingPrice">
											<input type="hidden" name="item_code" id="selling_id">
											<input type="hidden" name="brand" id="selling_brand">
											<div class="w3-row-padding">
												<input class="w3-input w3-border w3-round" type="text" name="selling" style="margin-top: 10px;" placeholder="<?php echo $row->unit_price ?>">
											</div>
											<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="padding: 10px 20px;margin-bottom: 15px;">Update</button>
										</form>	

									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php } else {?>
						<div class="w3-row-padding" >
							<div class="w3-col" style="width: 55%">
								<span class="label1">Item name</span>
							</div>
							<div class="w3-col" style="width: 45%">
								<span class="label2"></span>
							</div>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col" style="width: 55%">
								<span class="label1">Available Quantity</span>
							</div>
							<div class="w3-col" style="width: 45%">
								<span class="label2" ></span>
							</div>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 55%">
								<span class="label1">Reorder Level</span>
							</div>
							<div class="w3-col" style="width: 25%">
								<span class="label2"></span>
							</div>
							<div class="w3-col" style="width: 20%">
								<div class="popup">
								<a href="#reOrder"><i class="fa fa-pencil" aria-hidden="true" id="myBtn" style="margin-top: 13px;"></i></a>
									<div class="popuptext w3-container" id="reOrder" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right:16px;width: 5.8cm">
										<div class="w3-row" style="background-color: #f0f0f0;padding: 7px 0">
											<div class="w3-col w3-center" style="width: 90%">
												
												<span class="mont w3-center" style="color: rgba(0,0,0,0.7);font-size:14px;">Reorder Level</span>
											</div>
											<div class="w3-col w3-center" style="width: 10%">
												<a href="#"><span class="close">&times;</span></a>
											</div>
										</div>
										<div class="w3-container" >
											<div class="w3-row-padding">
												<span class="w3-left" style="font-size: 14px;color: black;margin-top: 5px;">Set Re-Order Level</span>
											</div>
											<div class="w3-row" style="color: red;margin: -20px 0px -20px -25px;">
												<?php echo form_error('reorder'); ?>
											</div>
											<form method="post" action="../accountant/reorder_level">
												<input type="hidden" name="item_code" value="" id="reorder_id">
												<input type="hidden" name="brand" value="" id="reorder_brand">
												<div class="w3-row-padding">
													<input class="w3-input w3-border w3-round" type="number" name="reorder" style="margin-top: 10px;" placeholder="">
												</div>
												<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="padding: 10px 20px;margin-bottom: 15px;">Update</button>
											</form>	

										</div>
									</div>
								</div>
							</div>
						</div>
						<h6 class="mont" style="padding: 30px 20px 0px;color: rgb(0,0,0);">Sales Information</h6>
						<div class="w3-row-padding">
							<div class="w3-col" style="width: 55%">
								<span class="label1" style="margin-bottom: 20px;">Selling Price</span>
							</div>
							<div class="w3-col" style="width: 25%">
								<span class="label2" ></span>
							</div>
							<div class="w3-col" style="width: 20%">
								<div class="popup">
								<a href="#sellingPrice"><i class="fa fa-pencil" aria-hidden="true" id="myBtn" style="margin-top: 13px;"></i></a>
									<div class="popuptext w3-container" id="sellingPrice" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right:16px;width: 5.8cm">
										<div class="w3-row" style="background-color: #f0f0f0;padding: 7px 0">
											<div class="w3-col w3-center" style="width: 90%">
												
												<span class="mont w3-center" style="color: rgba(0,0,0,0.7);font-size:14px;">Selling Price</span>
											</div>
											<div class="w3-col w3-center" style="width: 10%">
												<a href="#"><span class="close">&times;</span></a>
											</div>
										</div>
										<div class="w3-container" >
											<div class="w3-row-padding">
												<span class="w3-left" style="font-size: 14px;color: black;margin-top: 5px;">Set Selling Price</span>
											</div>
											<div class="w3-row" style="color: red;margin: -20px 0px -20px -25px;">
												<?php echo form_error('selling'); ?>
											</div>
											<form method="post" action="../accountant/sellingPrice">
												<input type="hidden" name="item_code" id="selling_id">
												<input type="hidden" name="brand" id="selling_brand">
												<div class="w3-row-padding">
													<input class="w3-input w3-border w3-round" type="text" name="selling" style="margin-top: 10px;" placeholder="">
												</div>
												<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="padding: 10px 20px;margin-bottom: 15px;">Update</button>
											</form>	

										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="w3-col l4 m6" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right: 16px;">
					<h3 class="mont" style="padding: 15px 20px 7px;color: rgba(0,0,0,0.7);">Add Stock</h3>
					<form method="post" action="../accountant/add_stock">
						<input type="hidden" name="item_code" id="stock_id">
						<input type="hidden" name="brand" id="stock_brand">
						<input type="hidden" name="date" id="date1">
						<div class="w3-container">
							<span class="label1">Date</span>
							<span class="label2" style="padding-left: 3cm" id="date"></span>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 35%">
								<span class="label1" style="padding-top: 10px;">Quantity<span style="color: red;margin-left: 4px;">*</span></span>
							</div>
							<div class="w3-col w3-container" style="width: 65%">
								<div class="w3-col" style="width: 100%">
									<input class="w3-input w3-border w3-round" name="qty" placeholder="" value="" type="number">
								</div>
								<div class="w3-col" style="width: 60%;color: red;margin-left:10px;">
										<?php echo form_error('qty'); ?>
								</div>
							</div>
						</div>
						<h6 class="mont" style="padding: 20px 20px 0px;color: rgb(0,0,0);">Purchase Information</h6>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 35%">
								<span class="label1" style="padding-top: 10px;">Purchase Price<span style="color: red;margin-left: 4px;">*</span></span>
							</div>
							<div class="w3-col w3-container" style="width: 65%">
								<div class="w3-col" style="width: 100%">
									<input class="w3-input w3-border w3-round" name="p_price" placeholder="" value="" type="text">
								</div>
								<div class="w3-col" style="width: 70%;color: red;margin-left:10px;">
										<?php echo form_error('p_price'); ?>
								</div>
							</div>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 35%">
								<span class="label1" style="padding-top: 10px;">Supplier Name<span style="color: red;margin-left: 4px;">*</span></span>
							</div>
							<div class="w3-col w3-container" style="width: 65%">
								<div class="w3-col" style="width: 100%">
									<input class="w3-input w3-border w3-round" name="supp_name" placeholder="" value="" type="text">
								</div>
								<div class="w3-col" style="width: 70%;color: red;margin-left:10px;">
										<?php echo form_error('supp_name'); ?>
								</div>
							</div>
						</div>
						<div class="w3-right" style="margin-bottom: 20px;margin-right:20px; ">
							<span style="color: green;margin-left: 20px;"><?php echo $this->session->flashdata('success');?><span>
							<span style="color: red;margin-left: 20px;"><?php echo $this->session->flashdata('error');?><span>
							<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="padding: 15px 30px;">Add</button>
							
						</div>
					</form>
				</div>
				<div class="w3-col l4 m6" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;">
					<h3 class="mont" style="padding: 15px 20px 7px;color: rgba(0,0,0,0.7);">Edit Stock</h3>
					<form method="post" action="../accountant/search_stockid" autocomplete="off">
						<input type="hidden" name="item_code" id="search_id">
						<input type="hidden" name="brand" id="search_brand">
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 35%">
								<span class="label1" style="padding-top: 10px;">Stock ID<span style="color: red;margin-left: 4px;">*</span></span>
							</div>
							<div class="w3-col w3-container" style="width: 65%">
								<div class="w3-col" style="width: 100%">
									<input class="w3-input w3-border w3-round" name="stockid" placeholder="" value="<?php echo set_value('stockid',(isset($stockid)) ? $stockid : ''); ?>" type="text" id="stockid">
								</div>
								<div class="w3-col" style="width: 70%;color: red;margin-left:10px;">
										<?php echo form_error('stockid'); ?>
								</div>
							</div>
						</div>
						<button type="submit" style="display: none;" id="stock"></button>
					</form>
					<div class="w3-right">
						<span style="color: green;margin-left: 20px;"><?php echo $this->session->flashdata('s_edit');?></span>
						<span style="color: red;margin-left: 20px;"><?php echo $this->session->flashdata('e_edit');?></span>
					</div>
					<?php if (isset($stockData)){?>
					<?php foreach ($stockData as $row) {?>
					<form method="post" action="../accountant/edit_stock" autocomplete="off">
						<input type="hidden" name="edid" id="edid" value="">
						<input type="hidden" name="oldq" value="<?php echo $row->quantity_added; ?>">
						<input type="hidden" name="item_code" id="search_id1" value="">
						<input type="hidden" name="brand" id="search_brand1" value="">
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 35%">
								<span class="label1" style="padding-top: 10px;">Quantity</span>
							</div>
							<div class="w3-col w3-container" style="width: 65%">
								<div class="w3-col" style="width: 100%">
									<input class="w3-input w3-border w3-round" name="qty" placeholder="" value="<?php echo $row->quantity_added; ?>" type="number" onfocus="this.value=''">
								</div>
							</div>
						</div>
						<h6 class="mont" style="padding: 20px 20px 0px;color: rgb(0,0,0);">Purchase Information</h6>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 35%">
								<span class="label1" style="padding-top: 10px;">Purchase Price</span>
							</div>
							<div class="w3-col w3-container" style="width: 65%">
								<div class="w3-col" style="width: 100%">
									<input class="w3-input w3-border w3-round" name="p_price" placeholder="" value="<?php echo $row->purchase_price; ?>" type="text" onfocus="this.value=''">
								</div>
							</div>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 35%">
								<span class="label1" style="padding-top: 10px;">Supplier Name</span>
							</div>
							<div class="w3-col w3-container" style="width: 65%">
								<div class="w3-col" style="width: 100%">
									<input class="w3-input w3-border w3-round" name="supp_name" placeholder="" value="<?php echo $row->supplier_name ?>" type="text" onfocus="this.value=''">
								</div>
							</div>
						</div>
						<div class="w3-right" style="margin-bottom: 20px;margin-right:20px; ">
							
							<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="padding: 15px 20px;">Update</button>
							
						</div>
					</form>
					<?php } ?>
					<?php } ?>
				</div>
			</div>
			<div class="w3-row-padding" style="padding-top: 20px;">
				<div class="w3-col l12 m12" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
				        <thead>
				            <tr>
				            	<th>ID</th>
				                <th>Date</th>
				                <th>Quantity Added</th>
				                <th>Purchase Price</th>
				                <th>Supplier Name</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php if (isset($searchStock)){?>
							<?php foreach ($searchStock as $row) {?>
				        	<tr>
				            	<td><?php echo $row->id ?></td>
				                <td><?php echo $row->date ?></td>
				                <td><?php echo $row->quantity_added ?></td>
				                <td><?php echo $row->purchase_price ?></td>
				                <td><?php echo $row->supplier_name ?></td>
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
	n =  new Date();
	y = n.getFullYear();
	m = n.getMonth() + 1;
	d = n.getDate();
	document.getElementById("date").innerHTML = y + "-" + m + "-" + d;
	document.getElementById("date1").value = y + "-" + m + "-" + d;
	var item=document.getElementById("item").value;
	var brand=document.getElementById("brand").value;
    document.getElementById("reorder_id").value=item;
    document.getElementById("reorder_brand").value=brand;
    document.getElementById("selling_id").value=item;
    document.getElementById("selling_brand").value=brand;
    document.getElementById("stock_id").value=item;
    document.getElementById("stock_brand").value=brand;
    document.getElementById("search_id").value=item;
    document.getElementById("search_brand").value=brand;
	var id=document.getElementById("stockid").value;
    if(id!=""){
    	document.getElementById("edid").value=id;
    }
    if(item!="" && id!=""){
    	document.getElementById("search_id1").value=item;
    
    }
    if (brand!="" && id!="") {
    	document.getElementById("search_brand1").value=brand;
    }
    $(document).ready(function() {
	   $('#example').DataTable();
	   $('#stockid').bind('keyup', function(event) {
		  if (event.keyCode === 13) {
		    document.getElementById("stock").click();
		  }
		});
	} );
	

</script>
</html>