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
		    <a class="" href="../customers/customer"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add Customer</a>
		    <a class="" href="../vehicle/vehicle_view"><i class="fa fa-car" style="padding-right: 10px"></i>Add Vehicle</a>
		    <a class="" href="../jobCard/job"><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Job card</a>
		    <a class="" href="../serviceHistory/servicehist"><i class="fa fa-history" style="padding-right: 10px"></i>View Service history</a>
		</div>
		<div id="vehicle" class="content" style="background-color: #f0f0f0;height: auto;min-height: 670px;">
			<h2 style="padding: 20px 20px 7px;">Register Vehicle</h2>
			<hr/>
			<div class="w3-pale-red">
			<p>
			    <?php if($this->session->flashdata('errors')):?>
			    <?php echo $this->session->flashdata('errors');?>
			    <?php endif;?>
			</p>
			</div>
			<p class="w3-light-green">
        	<?php if($this->session->flashdata('vehReg_success')):?>
        	<?php echo $this->session->flashdata('vehReg_success');?>
        	<?php endif;?>
        	</p>
			<p class="w3-light-red">
        	<?php if($this->session->flashdata('vehReg_failure')):?>
        	<?php echo $this->session->flashdata('vehReg_failure');?>
        	<?php endif;?>
        	</p>
			<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: white;">
			
		  		<form action="../vehicle/find_customer" method="post">
		  			<label for="">NIC Number</label>
					 
	            	<input class="dinput" type="text" id="" name="nic" placeholder="" style="width: 30%;" id="snic" >
					
	            	<button class="button-green" onclick="myNic()" type="submit" style="width: 10%;margin-left: 10px;" id="search">Search</button> 

	            	<!--Table -->
	          
	            	<label style="margin-bottom: 12px;"><b>Customer Details</b></label>
					<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
						<div style="margin-bottom: 19px;float:left;"></div>
						<div style="float: right;margin-bottom: 19px;"></div>
						<table>
						  <tr>
						    <th>Title</th>
						    <th>First Name</th>
						    <th>Last Name</th>
						    <th>Address</th>
						  </tr>
						   <?php if($this->session->flashdata('cus_det')):?>
			    			<?php foreach ($this->session->flashdata('cus_det') as $v) {?>
						  <tr>
						    <td><?php echo $v->title; ?></td>
						    <td><?php echo $v->first_name; ?></td>
						    <td><?php echo $v->last_name; ?></td>
						    <td><?php echo $v->address; ?></td>
						  </tr>
						
						   <?php } ?>
			    		<?php endif;?>
						  <!--  <?php foreach ($this->session->flashdata('cus_det') as $v) {?>
						  <tr>
						    <td><?php echo $v->title; ?></td>
						    <td><?php echo $v->first_name; ?></td>
						    <td><?php echo $v->last_name; ?></td>
						    <td><?php echo $v->address; ?></td>
						  </tr>
						   <?php } ?> -->
						</table>
					</div>
		  		</form>

		  	</div>
		
			<div class="w3-container" style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: white;">
				<form action="../vehicle/registerVehicle" method="post">
					<div class="w3-row">
						<div class="w3-col m6">
						<?php if($this->session->flashdata('cus_det')):?>
			    			<?php foreach ($this->session->flashdata('cus_det') as $v) {?>
							<!-- <label for="cardno">NIC No</label> -->
	            			<input class="dinput" type="hidden" id="cardno" name="nic" placeholder="" id="nic" value="<?php echo $v->nic;?>" >
							<?php } ?>
			    		<?php endif;?>
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
	            			<!-- <label for="">Additional Information </label>
	            			<input class="dinput" type="" id="" name="additional" placeholder=""> -->

	            		</div>
							
					</div>
		
					
					<button class="button-green" type="submit" style="width: 15%;margin-top: 20px;margin-left: 15px;"> Add Vehicle</button> 
				</form>
			</div>
		</div>
	</div>
</body>
</html>

	  	
