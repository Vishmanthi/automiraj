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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<style type="text/css">
	body {font-family: "Lato", sans-serif}
</style>
</head>
<body>
<div class="w3-content" style="max-width:2000px;margin-top:49px;">
	<div class="sidebar">
		<a class="links" onclick="openService(event, 'user')"><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px"></i>Online</a>
	    <a class="links" onclick="openService(event, 'customer')"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add Customer</a>
	    <a class="links" onclick="openService(event, 'vehicle')"><i class="fa fa-car" style="padding-right: 10px"></i>Add Vehicle</a>
	    <a class="links" onclick="openService(event, 'jobcard')"><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Job card</a>
	    <a class="links" onclick="openService(event, 'ser_his')"><i class="fa fa-history" style="padding-right: 10px"></i>View Service history</a>
	</div>
		
	<div id="user" class="content">
		
		<h2>User</h2>
	</div>

	<div id="customer" class="content">
		<?php $this->load->view('addCustomer_view');?>
	   <!--  <h2 style="padding: 20px 20px 7px;">Add Customer</h2> 
	    <hr/>
	    <p></p>
	    <p></p>
	    <h3></h3> -->
	</div>
	<div id="vehicle" class="content">
		<?php $this->load->view('addVehicle_view');?>
	  	
	</div>
	<div id="jobcard" class="content">
		<?php $this->load->view('jobCard_view');?>
		<!-- <h2 style="padding: 20px 20px 7px;">Generate Job Card</h2>
		<hr/>
		<div class="w3-container" style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: #f0f0f0;">
			<form>
				<div class="w3-row">
					<div class="w3-col m6">
						<label for="cardno">Job card No</label>
            			<input class="dinput" type="text" id="cardno" name="jobcardno" placeholder="" >
            			<label for="make">Vehicle Make</label>
            			<input class="dinput" type="text" id="make" name="make" placeholder="" >
            			<label for="model">Vehicle Model</label>
            			<input class="dinput" type="text" id="model" name="model" placeholder="" >


					</div>
					<div class="w3-col m6">
						<label for="vno">Vehicle Registration No</label>
            			<input class="dinput" type="text" id="vno" name="vehicleno" placeholder="" >
            			<label for="vno">Vehicle Type</label>
            			<input class="dinput" type="text" id="vtype" name="type" placeholder="" >
            			<label for="">Odometer read </label>
            			<input class="dinput" type="text" id="" name="" placeholder="">

            		</div>
						
				</div>
	
				<label style="margin-bottom: 12px;"><b>Services</b></label>
				<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
					<div style="margin-bottom: 19px;float:left;">records per page</div>
					<div style="float: right;margin-bottom: 19px;">Search</div>
					<table class="w3-card-4">
					  <tr>
					    <th>Service</th>
					    <th>Description</th>
					    <th>Amount</th>
					  </tr>
					  <?php foreach ($service as $va) {?>
					  	<tr>
					    <td><?php echo $va->service_name ?></td>
					    <td><?php echo $va->description ?></td>
					    <td><?php echo $va->price ?></td>
					  	<tr>
					  <?php } ?>
					</table>
				</div>


				<label style="margin-bottom: 12px;margin-top: 20px;"><b>Spare parts</b></label>
				<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
					<div style="margin-bottom: 15px;float: left;">records per page</div>
					<div style="float: right;margin-bottom: 19px;">Search</div>
					<table class="w3-card-4 w3-table-all">
					  <tr>
					    <th>Spare Item</th>
					    <th>Brand</th>
					    <th>Unit Price</th>
					    <th>Quantity</th>
					    <th>Total Price</th>
					  </tr>
					  <?php foreach ($spare as $va) {?>
					  <tr>
					    <td><?php echo $va->name ?></td>
					   	<td></td>
					   	<td></td>
					   	<td></td>
					   	<td></td>
					  </tr>
					  <?php } ?>
					</table>
				</div>
			
				<button class="button-green" type="submit" style="width: 20%;margin-top: 20px;"><i class="fa fa-plus"></i>  Add Jobcard</button> 
			</form>
		</div> -->
	</div>
	<div id="ser_his" class="content">
		<?php $this->load->view('serviceHistory_view');?>
<!-- 		<h2 style="padding: 20px 20px 7px;">Service History</h2>
		<hr/>
	  	<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: #f0f0f0;">
	  		<form>
	  			<label for="">Vehicle Registration number</label>
            	<input class="dinput" type="text" id="" name="" placeholder="" style="width: 30%;">
            	<button class="button-green" type="submit" style="width: 20%;float: right;"><i class="fa fa-search"></i>  Search</button>  -->

            	<!--Table -->
<!--             	<label style="margin-bottom: 12px;"><b>Service history</b></label>
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
	 -->
	</div>

	<script>
		function openService(evt, serviceName) {
		    var i, content, tablinks;
		    content = document.getElementsByClassName("content");
		    for (i = 0; i < content.length; i++) {
		        content[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("links");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    document.getElementById(serviceName).style.display = "block";
		    evt.currentTarget.className += " active";
		}

		// Get the element with id="defaultOpen" and click on it
		
	</script>
</div>
</body>
</html>