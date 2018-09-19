<!DOCTYPE html>
<html>
<head>
	<title>Service Advisor dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'header.php';?>
	<?php include 'sidebar.php';?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/w3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/dashboard.css">
	<style type="text/css">
		body {font-family: "Lato", sans-serif}
	</style>
</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="sidebar">
			<a class="" onclick=""><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px"></i>Online</a>
		    <a class="" href="customers"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add Customer</a>
		    <a class="" href="vehicle"><i class="fa fa-car" style="padding-right: 10px"></i>Add Vehicle</a>
		    <a class="" href="jobCard"><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Job card</a>
		    <a class="" href="serviceHistory"><i class="fa fa-history" style="padding-right: 10px"></i>View Service history</a>
		</div>
		<div id="vehicle" class="content">
			<h2 style="padding: 20px 20px 7px;">Service History</h2>
			<hr/>
		  	<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: #f0f0f0;">
		  		<form>
		  			<label for="">Vehicle Registration number</label>
	            	<input class="dinput" type="text" id="" name="" placeholder="" style="width: 30%;">
	            	<button class="button-green" type="submit" style="width: 20%;float: right;"><i class="fa fa-search"></i>  Search</button> 

	            	<!--Table -->
	            	<label style="margin-bottom: 12px;"><b>Service history</b></label>
					<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
						<div style="margin-bottom: 19px;float:left;">records per page</div>
						<div style="float: right;margin-bottom: 19px;">Search</div>
						<table>
						  <tr>
						    <th>Date</th>
						    <th>Services</th>
						    <th>Spare parts used</th>
						    <th>Service Advisor Incharge</th>
						  </tr>
						  <tr>
						    <td>Jill</td>
						    <td>Smith</td>
						    <td>50</td>
						    <td></td>
						  </tr>
						</table>
					</div>

		  		</form>

		  	</div>
		</div>
	</div>
</body>
</html>

	
	