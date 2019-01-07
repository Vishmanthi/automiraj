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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/af-2.3.2/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
 
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/af-2.3.2/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>
	<style type="text/css">
		body {font-family: "Lato", sans-serif}
		
	</style>
</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="sidebar">
			<a class="" onclick="" style="color: white;"><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px;"></i>Online</a>
		    <a class="" href="../customers/customer" style="text-decoration: none;"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add Customer</a>
		    <a class="" href="../vehicle/vehicle_view" style="text-decoration: none;"><i class="fa fa-car" style="padding-right: 10px"></i>Add Vehicle</a>
		    <a class="" href="../jobCard/job" style="text-decoration: none;"><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Job card</a>
		    <a class="" href="../serviceHistory/servicehist" style="text-decoration: none;"><i class="fa fa-history" style="padding-right: 10px"></i>View Service history</a>
		</div>
		<div id="vehicle" class="content" style="background-color: #f0f0f0;height: auto;min-height: 670px;">
			<h2 style="padding: 20px 20px 7px;">Service History</h2>
			<hr/>
		  	<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: white;">
		  		<form method="post" action="../serviceHistory/find_jobcard">
		  			<label for="">Vehicle Registration number</label><br>
	            	<input class="dinput" type="text" id="" name="vehicle" placeholder="" style="width: 30%;" value="<?php echo set_value('vehicle',(isset($vehicle)) ? $vehicle : '');?>">
	            	<button class="button-green" type="submit" style="width: 10%;padding: 8px 8px;margin-left: 10px;"> Search</button> 
	            </form>
	            	<!--Table -->
	            <label style="margin-bottom: 12px;"><b>Service history</b></label>
				<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
					    <thead>
					        <tr>
					            <th>Date</th>
					            <th>Jobcard ID</th>
					            <th>Services</th>
					            <th>Spare Parts Used</th>
					            
					        </tr>
					    </thead>
					    <tbody>
					        <?php if (isset($jobcard)){?>
							<?php foreach ($jobcard as $row) {?>
					        <tr>
					            <td><?php echo $row[0][0]; ?></td>
								<td><?php echo $row[0][1]; ?></td>
								<td><?php
								if(isset($row[1])){

								 echo implode(',',$row[1]);} ?></td>

								<td><?php
								if(isset($row[2])){

								 echo implode(',',$row[2]);} ?></td>

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

	
	