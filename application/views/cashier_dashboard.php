<!DOCTYPE html>
<html>
<head>
	<title>Cashier dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'header.php';?>
	<?php include 'sidebar.php';?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/w3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/dashboard.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/checkbox.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/combobox.css"> 
	
	<style type="text/css">
		body {font-family: "Lato", sans-serif}
		/*the container must be positioned relative:*/
		.custom-select {
		  position: relative;
		  font-family: Arial;
		}
		.custom-select select {
		  display: none; /*hide original SELECT element:*/
		}
		.select-selected {
		  background-color: #ccc;
		}
		/*style the arrow inside the select element:*/
		.select-selected:after {
		  position: absolute;
		  content: "";
		  top: 14px;
		  right: 10px;
		  width: 0;
		  height: 0;
		  border: 6px solid transparent;
		  border-color: rgba(0,0,0,0.7) transparent transparent transparent;
		}
		/*point the arrow upwards when the select box is open (active):*/
		.select-selected.select-arrow-active:after {
		  border-color: transparent transparent rgba(0,0,0,0.7 ) transparent;
		  top: 7px;
		}
		/*style the items (options), including the selected item:*/
		.select-items div,.select-selected {
		  color: rgba(0,0,0,0.8);
		  padding: 8px 16px;
		  border: 1px solid transparent;
		  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
		  cursor: pointer;
		  user-select: none;
		}
		/*style items (options):*/
		.select-items {
		  position: absolute;
		  background-color: #ccc;
		  top: 100%;
		  left: 0;
		  right: 0;
		  z-index: 99;
		}
		/*hide the items when the select box is closed:*/
		.select-hide {
		  display: none;
		}
		.select-items div:hover, .same-as-selected {
		  background-color: rgba(0, 0, 0, 0.1);
		}
		 
	</style>
</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="sidebar">
			<a class="" onclick=""><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px"></i>Online</a>
		    <!-- <a class="" href="customers"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add Customer</a> -->
		    <!-- <a class="" href="vehicle"><i class="fa fa-car" style="padding-right: 10px"></i>Add Vehicle</a> -->
		    <a class="" href="<?php echo base_url(); ?>Cashier/jobcardview"><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Invoice</a>
				<a class="" href="<?php echo base_url(); ?>Cashier/jobcardview"><i class="fa fa-file-text" style="padding-right: 10px"></i>Add Discount</a>
		    <!-- <a class="" href="serviceHistory"><i class="fa fa-history" style="padding-right: 10px"></i>View Service history</a> -->
		</div>
		
		<div id="jobcard" class="content">
		<h2 style="padding: 20px 20px 7px;">Job Card</h2>
		<hr/>
		<div class="w3-container" style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: #f0f0f0;">
		
			<form action="<?php echo base_url();?>Cashier/searchJobCard/<?php if($this->session->flashdata('jobid')){echo $this->session->flashdata('jobid');} ?>" method="post">
				<div class="w3-row">
					<div class="w3-col m2">
						<label for="cardno">Job card No</label>
						</div>
						<div class="w3-col m6">
            			<input class="dinput" type="text" id="cardno" name="jobcardno" placeholder="" value="<?php if (isset($jobid)){ echo $jobid;}?>" >
            			

 
					</div>
					<div class="w3-col m3">
					
          	<button class="w3-button w3-green" type="submit" id="vno" name="search" placeholder="" >Search</button>
            			

            		</div>
								
					<div class="w3-row">
					<div class="w3-col m2">
						<label for="cardno">Vehicle No</label>
						</div>
						<div class="w3-col m6">
					
            			<input class="dinput" type="text" id="cardno" name="vehno" placeholder="" value="<?php if (isset($jobid)){ echo $jobid;}?>" >
            			
					
					</div>
					<div class="w3-row">
					<div class="w3-col m2">
						<label for="cardno">Date</label>
						</div>
						<div class="w3-col m6">
            			<input class="dinput" type="text" id="cardno" name="date" placeholder="" >
            			


					</div>
				</div>
	
				<label style="margin-bottom: 12px;"><b>Services</b></label>
			
  		
  			<p><?php if($this->session->flashdata('update_success')): ?>
				<div class="w3-panel w3-pale-green w3-display-container">
				<span onclick="this.parentElement.style.display='none'"
 				class="w3-button w3-large w3-display-topright">&times;</span>
				<h4>Success!</h4>
				<?php echo $this->session->flashdata('update_success'); ?>
				</div>
				<?php endif; ?></p>
				
			
  		
			
				<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
					<div style="margin-bottom: 19px;float:left;"></div>
					<div style="float: right;margin-bottom: 19px;"></div>
					<table class="w3-card-4">
					  <tr>
					    <th>Service</th>
					    <th>Description</th>
					    <th>Amount</th>
							<th>Discount</th>
							<th>Action</th>
						</tr>
						
						<tr>
    <td></td>
      <td></td>
      <td></td>
      <form action="<?php echo base_url();?>?>" method="get">
      <td></td>
    </form> 
    </tr>
					 <?php if (isset($services)): ?> 
					  <?php foreach($services as $ser):?>
						
					  	<tr>
						    <td><?php echo $ser->service_name; ?></td>
						    <td><?php echo $ser->description; ?></td>
								<td><?php echo $ser->price; ?></td>
								<td>
								
						   
								<!-- <select name="discount" > -->
								<!-- <input name="discount" type="number"> -->
								<form action="<?php echo base_url();?>Cashier/updateDisc" method="post">
								<select name="discount">
									<option value="0">Select</option>
									<option value="5">5</option>
									<option value="10">10</option> 
									<option value="15">15</option>
									<option value="20">20</option>
									<option value="25">25</option>
									<option value="30">30</option>
									<input name="jid" type="hidden" value="<?php echo $jobid; ?>">
									<input name="sid" type="hidden" value="<?php echo $ser->service_id;?>">

						</td>
						  
      					<td><button class="w3-button w3-round w3-teal"  type="submit">Add</button></td>
								</form> 
								
					  	</tr>
						<?php endforeach; ?>
						<?php endif; ?> 
						 
					</table>
				</div>


				<label style="margin-bottom: 12px;margin-top: 20px;"><b>Spare parts</b></label>
				<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
					<div style="margin-bottom: 15px;float: left;"></div>
					<div style="float: right;margin-bottom: 19px;"></div>
					<table class="w3-card-4" id="table">
					  <tr>
					    <th>Spare Item</th>
					    <th>Brand</th>
					    <th>Unit Price</th>
					    <th>Quantity</th>
					    <th>Total Price</th>
					   
					  </tr>
						<?php if (isset($spares)){ ?> 
					  <?php foreach($spares as $spare){ ?> 
					  <tr>
					  	
					    <td><?php echo $spare->name;?></td>
					    
					   	<td ><?php echo $spare->brand;?></td>
					   
							
					   	<td><?php echo $spare->unit_price;?></td>
							
					   	<td><?php echo $spare->qty;?></td>
					   	<td><?php echo $spare->qty*$spare->unit_price;?></td>
					   
					  </tr>
						<?php } ?>
						<?php } ?>
					  
					</table>
				</div>
				</form>
			<form method="post" action="<?php echo base_url();?>Pdf_Controller/genPDFInvoice" target="_blank"	>
				<input class="dinput" type="hidden" id="cardno" name="jobcardno" placeholder="" value="<?php if (isset($jobid)){ echo $jobid;}?>" >
				<div style="text-align: center;">
					<button class="button-green" type="submit" style="width: 20%;margin-top: 20px;" name="genInvoice" >Generate Invoice</button>
				</div> 
		</form>
		</div>
	</div>
	</div>
	

</body>
</html>