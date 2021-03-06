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
	<script type="text/javascript">
			$('.button-green').click(function(){
						
							document.getElementById('id03').style.display='block';
							nic=$('#nic').text();
							
						
							document.getElementById("pwd").value =nic;
							document.getElementById("cpwd").value =nic; 
						
					
					});
	
	</script>
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
		<div id="customer" class="content" style="background-color: #f0f0f0;">
			<h2 style="padding: 20px 20px 7px;">Register Customer</h2> 
			<hr/>
			<div class="w3-pale-red">
			<p>
			    <?php if($this->session->flashdata('errors')):?>
			    <?php echo $this->session->flashdata('errors');?>
			    <?php endif;?>
				<?php if($this->session->flashdata('nErr')):?>
			    <?php echo $this->session->flashdata('nErr');?>
			    <?php endif;?>
			</p>
			</div>
			<p class="w3-light-green">
        	<?php if($this->session->flashdata('cusReg_success')):?>
        	<?php echo $this->session->flashdata('cusReg_success');?>
        	<?php endif;?>
        	</p>
			
			<div class="w3-container" style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: white;">
				<form action="../customers/register" method="post">
					<div class="w3-row">
						<div class="w3-col m6">
							<label for="cardno">Title</label>
							<select class="w3-select dinput" name="title">
							<option value="0">Select</option>
							<option value="Mr">Mr</option>
							<option value="Mrs">Mrs</option>
							<option value="Miss">Miss</option>
							</select>
			            	<!-- <input class="dinput" type="text" id="cardno" name="title" placeholder="" > -->
			            	<label for="make">First Name</label>
			            	<input class="dinput" type="text" id="make" name="first_name" placeholder="" >
			            	<label for="model">Last Name</label>
			            	<input class="dinput" type="text" id="model" name="last_name" placeholder="" >
							<label for="model">Address</label>
			            	<input class="dinput" type="text" id="model" name="address" placeholder="" >
							<label for="vno">NIC</label>
			            	<input id="nic" class="dinput" type="text" id="vno" name="nic" placeholder="" >
						</div>
						<div class="w3-col m6">
							<label for="vno">Phone</label>
			            	<input class="dinput" type="text" id="vno" name="phone" placeholder="" >
							<label for="vno">Email</label>
			            	<input class="dinput" type="text" id="vno" name="email" placeholder="" >
							<label for="vno">Username</label>
			            	<input class="dinput" type="text" id="vno" name="username" placeholder="" >
			            	<!-- <label for="vno">Password</label> -->
			            	<input id="pwd" class="dinput" type="hidden" name="password" placeholder="" >
			            	<!-- <label for="">Confirm Password </label> -->
			            	<input class="dinput" type="hidden" id="cpwd" name="con_pass" placeholder="">

			            </div>
									
					</div>
				
							
					<button class="button-green" type="submit" style="width: 20%;margin-top: 20px;margin-left: 15px;">Register</button> 
				</form>
			</div>
		</div>
	</div>
</body>
</html>
	