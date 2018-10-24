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
			<a class="" onclick=""><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px"></i>Online</a>
			<a class="" href=""><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add new Item </a>
		    <a class="" href="manage_inventory"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Manage Inventory</a>
		    <a class="" href="manage_supplier"><i class="fa fa-car" style="padding-right: 10px"></i>Manage Suppliers</a>
		    <a class="" href=""><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Reports</a>
		    
		</div>
		<div class="content" style="background: #f0f0f0" id="inventory">
			<h2 class="mont" style="padding: 10px 20px 0;">Manage Inventory</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			<div class="w3-row-padding">
						<div class="w3-col w3-container" style="width: 25%;">
							<label>Item name</label>
							<input class="w3-input w3-border w3-round" type="text" name="title" placeholder="" value="">
						</div>
						<div class="w3-col w3-container" style="width: 25%;">
							<label>Brand</label>
							<input class="w3-input w3-border w3-round" type="text" name="title" placeholder="" value="">
						</div>
						<div class="w3-col w3-container" style="width: 20%;">
							<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 40px 0;padding: 12px 20px;">Search</button>
							
						</div>
			</div>
			<div class="w3-row-padding">
				<div class="w3-col m5" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right:16px">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Overview</h3>
					
					<div class="w3-row-padding" >
						<div class="w3-col" style="width: 30%">
							<span class="label1">Item code</span>
						</div>
						<div class="w3-col" style="width: 25%">
							<span class="label2"></span>
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col" style="width: 30%">
							<span class="label1">Available Quantity</span>
						</div>
						<div class="w3-col" style="width: 25%">
							<span class="label2" ></span>
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col w3-container" style="width: 30%">
							<span class="label1">Reorder Level</span>
						</div>
						<div class="w3-col" style="width: 25%">
							<span class="label2"></span>
						</div>
						<div class="w3-col" style="width: 10%">
							<div class="popup">
							<a href="#reOrder"><i class="fa fa-pencil" aria-hidden="true" id="myBtn"></i></a>
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
											<span class="w3-left" style="font-size: 14px;color: red;margin-top: 5px;">Set Re-Order Level</span>
										</div>
										<form>
											<div class="w3-row-padding">
												<input class="w3-input w3-border w3-round" type="number" name="reorder" style="margin-top: 10px;">
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
						<div class="w3-col" style="width: 30%">
							<span class="label1" style="margin-bottom: 20px;">Selling Price</span>
						</div>
						<div class="w3-col" style="width: 25%">
							<span class="label2" ></span>
						</div>
						<div class="w3-col" style="width: 10%">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</div>
					</div>
				</div>
				<div class="w3-col m6" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;">
					<h3 class="mont" style="padding: 15px 20px 7px;color: rgba(0,0,0,0.7);">Add Stock</h3>
					<div class="w3-container">
						<span class="label1">Date</span>
						<span class="label2" style="padding-left: 3cm" id="date">78</span>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col w3-container" style="width: 25%">
							<span class="label1" style="padding-top: 10px;">Quantity</span>
						</div>
						<div class="w3-col w3-container" style="width: 50%">
							<input class="w3-input w3-border w3-round" name="qty" placeholder="" value="" type="number">
						</div>
					</div>
					<h6 class="mont" style="padding: 20px 20px 0px;color: rgb(0,0,0);">Purchase Information</h6>
					<div class="w3-row-padding">
						<div class="w3-col w3-container" style="width: 25%">
							<span class="label1" style="padding-top: 10px;">Purchase Price</span>
						</div>
						<div class="w3-col w3-container" style="width: 50%">
							<input class="w3-input w3-border w3-round" name="p_price" placeholder="" value="" type="text">
						</div>
					</div>
					<div class="w3-row-padding">
						<div class="w3-col w3-container" style="width: 25%">
							<span class="label1" style="padding-top: 10px;">Supplier Name</span>
						</div>
						<div class="w3-col w3-container" style="width: 50%">
							<input class="w3-input w3-border w3-round" name="supp_name" placeholder="" value="" type="text">
						</div>
					</div>
					<div class="w3-center" style="margin-bottom: 20px">
						<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="padding: 15px 30px;">Add</button>
					</div>
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
	
</script>

</html>