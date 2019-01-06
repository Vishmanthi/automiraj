<!DOCTYPE html>
<html>
<head>
<title>Customer dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'customer_header.php';?>
<?php include 'customer_sidebar.php';?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Calibri">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/checkbox.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
	body {font-family: "Lato", sans-serif}
	.mont{
  		font-family: "Montserrat", sans-serif;
	}
	.calib{
  		font-family: "Calibri", sans-serif;
	}
	label {font-family: "Lato", sans-serif;margin-top: 15px;margin-bottom: 7px;display: block;color: rgba(0,0,0,0.8);}
	input {margin-bottom: 15px;}
</style>
</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="content" style="background: #f0f0f0" id="service-history">
			<h2 class="mont" style="padding: 10px 20px 0;">View Service History</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			
			<div class="w3-container" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;">
				<form method="post" action="../customer/serviceHistory">
					<div class="w3-container">
					
					</div>
						<div class="w3-row-padding">
							<div class="w3-col" style="width: 40%;">
								<h4 class="mont" style="margin-bottom: 15px"><i class="fa fa-car" style="padding: 5px"></i>My Vehicles</h4>
					<?php foreach ($vehicleData as $row) {?>
						<div class="w3-hover-shadow w3-card" style="padding: 7px;width: 80%;cursor: pointer;border-radius: 5px;background-color: rgba(255,225,0,0.38);margin-bottom: 10px;">
							<?php echo $row->veh_reg_no; ?>
							<span style="margin-left: 10px;"><?php echo $row->make; ?></span>
							<span style="margin-left: 10px;"><?php echo $row->model; ?></span>
						</div>
					<?php } ?>

							</div>
							<div class="w3-col" style="width: 30%">
								<label>Enter Vehicle Number</label>
								<input class="w3-input w3-border w3-round" type="" name="vehicle_no" placeholder="">
							</div>
							<div class="w3-col" style="width: 20%">
								<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 40px 30px;padding: 12px 20px;">Search</button>
							</div>
							
						</div>
					
				</form>
				
				
				<div class="w3-container" style="margin-top: 20px;">
					<table class="w3-table-all">
						<tr>
							<th>Date</th>
							<th>JobCard ID</th>
							<th>Services</th>
							<th>Spare Parts Used</th>
						</tr>
						
						<?php if (is_array($service) || is_object($service)){?>
						<?php foreach ($service as $row) {?>
							<tr>
								<td><?php echo $row[0][0]; ?></td>
								<td><?php echo $row[0][1]; ?></td>
								<td><?php echo implode(',',$row[1]); ?></td>
								<td><?php echo implode(',',$row[2]); ?></td>		
							</tr>	
							
						
						<?php } ?>	
						<?php } ?>
						
					
					</table>
				</div>

			</div>
		</div>
	</div>
</body>
</html>