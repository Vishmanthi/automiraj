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
		    <a class="" href="customers"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add Customer</a>
		    <a class="" href="vehicle"><i class="fa fa-car" style="padding-right: 10px"></i>Add Vehicle</a>
		    <a class="" href="jobCard"><i class="fa fa-file-text" style="padding-right: 10px"></i>Generate Job card</a>
		    <a class="" href="serviceHistory"><i class="fa fa-history" style="padding-right: 10px"></i>View Service history</a>
		</div>
		
		<div id="jobcard" class="content">
		<h2 style="padding: 20px 20px 7px;">Generate Job Card</h2>
		<hr/>
		<p><?php if($this->session->flashdata('job_success')): ?>
				<div class="w3-panel w3-pale-green w3-display-container">
				<span onclick="this.parentElement.style.display='none'"
 				class="w3-button w3-large w3-display-topright">&times;</span>
				<h4>Success!</h4>
				<?php echo $this->session->flashdata('job_success'); ?>
				</div>
				<?php endif; ?></p>
				
				<p><?php if($this->session->flashdata('job_failure')): ?>
				<div class="w3-panel w3-pale-red w3-display-container">
				<span onclick="this.parentElement.style.display='none'"
 				class="w3-button w3-large w3-display-topright">&times;</span>
				<h4>Sorry!!</h4>
				<?php echo $this->session->flashdata('job_failure'); ?>
				</div>
				<?php endif; ?></p>
				
		<div class="w3-container" style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: #f0f0f0;">
			<form action="jobCard/genJobcard" method="post">
				<div class="w3-row">
					<div class="w3-col m6">
						<label for="cardno">Job card No</label>
            			<input class="dinput" type="text" id="cardno" name="jobcardno" placeholder="" >
            			<label for="">Odometer read </label>
            			<input class="dinput" type="text" id="" name="odometerR" placeholder="">


					</div>
					<div class="w3-col m6">
						<label for="vno">Vehicle Registration No</label>
            			<input class="dinput" type="text" id="vno" name="vehicleno" placeholder="" >
            			

            		</div>
						
				</div>
	
				<label style="margin-bottom: 12px;"><b>Services</b></label>
				<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
					<div style="margin-bottom: 19px;float:left;"></div>
					<div style="float: right;margin-bottom: 19px;"></div>
					<table class="w3-card-4">
					  <tr>
					    <th>Service</th>
					    <th>Description</th>
					    <th>Amount</th>
					    <th>Select</th>
					  </tr>
					  <?php foreach ($service as $va) { ?>
					  	<tr>
						    <td><?php echo $va->service_name ?></td>
						    <td><?php echo $va->description ?></td>
						    <td><?php echo $va->price ?></td>
						    <td>
						    	<label class="containerC">
	  							<input type="checkbox" name="<?php echo $va->service_id;?>" value="<?php echo $va->service_id;?>" id="<?php echo $va->service_id;?>">
	  							<span class="checkmark"></span>
								</label>
							</td>
					  	</tr>
					  <?php } ?>
					</table> 
				</div>


				<label style="margin-bottom: 12px;margin-top: 20px;"><b>Spare parts</b></label>
				<div class="w3-container " style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
					<div style="margin-bottom: 15px;float: left;">records per page</div>
					<div style="float: right;margin-bottom: 19px;">Search</div>
					<table class="w3-card-4" id="table">
					  <tr>
					    <th>Spare Item</th>
					    <th>Brand</th>
					    <th>Unit Price</th>
					    <th>Quantity</th>
					    <th>Total Price</th>
					    <th>Select</th>
					  </tr>
					  <?php foreach ($spare as $va){ ?> 
				
					  <tr>
					  	
					    <td><?php echo $va->name;?></td>
					    
					   	<td >
					   		<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
							<!-- <div class="custom-select" style="width:150px;background-color: #ccc;color: rgba(0,0,0,0.6);"> -->

					   		 <select id="spares" onchange="myFunct(this)" name="<?php echo $va->name ?>">
							    <option value="0">Select brand</option>
							    <?php foreach ($spare_brand as $sp){ ?>
								<?php if($sp->name==$va->name){ ?> 
							    <option value="<?php echo $sp->brand_name ?>" id=""><?php echo $sp->brand_name; ?></option>
          						<?php } ?>
							    <?php } ?>
					   		
							  </select>
							  <!-- </div> -->
						 
							
					   	</td>
					   
					   
					   	<td></td>
					   	<td><input onchange="totPrice(this)" oninput="this.value = Math.abs(this.value)" class="dinput" type="number" id="quantity" name="<?php echo "q".$va->spare_id ?>" placeholder="1" style="width: 50px;margin-bottom: 0;margin-left: 0"></td>
					   	<td></td>
					   	<td>
					   		<label class="containerC">
  								<input type="checkbox" name="<?php echo $va->spare_id;?>" value="<?php echo $va->spare_id;?>" id="<?php echo $va->spare_id;?>">
  								<span class="checkmark"></span>
							</label>
						</td>
					  </tr>
					  <?php } ?>
					  
					</table>
				</div>
				<div style="text-align: center;">
					<button class="button-green" type="submit" style="width: 20%;margin-top: 20px;"><i class="fa fa-plus"></i>  Add Jobcard</button>
				</div> 
			</form>
		</div>
	</div>
	</div>
		<script type="text/javascript">
					  
					   	function myFunct(t){
					   
					   	var valC=t.options[t.selectedIndex].text;
					   	<?php foreach ($spare_brand as $sp){ ?>
					   	if(t.parentElement.previousElementSibling.innerHTML=='<?php echo $sp->name; ?>'){
					   		if(valC=='<?php echo $sp->brand_name ?>' ) {
					   			console.log(valC);
					   			t.parentElement.nextElementSibling.innerHTML="<?php echo $sp->unit_price; ?>";
					   		
					   	}
					   	}
			
					   	<?php } ?>
					   }
					
						</script>
	<script type="text/javascript">
					   	function myFunct1(t){
					   	//t = document.createElement("spares");
					   	//var cbo = document.getElementById("spares");
					   	var valC=t.options[t.selectedIndex].text;
					   	console.log(valC);
					   	var a=t.parentElement;
					   	console.log(a);
					   	console.log(a.previousElementSibling.innerHTML);
					   	a.nextElementSibling.innerHTML="hhh";	
					   	}

					   	function totPrice(t){
					   		var q=Number(t.value);
					   		var p=Number(t.parentElement.previousElementSibling.innerHTML);
					   		console.log(p*q);
					   		t.parentElement.nextElementSibling.innerHTML=q*p;
					   	}
					   	</script>	 

</body>
</html>