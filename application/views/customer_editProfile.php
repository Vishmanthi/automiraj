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
		<div class="content" style="background: #f0f0f0" id="editProfile">
			<h2 class="mont" style="padding: 10px 20px 0;">Edit Profile</h2>
			<hr style="border-color: rgba(0,0,0,0.2);">
			<div class="w3-row-padding">
				<div class="w3-col m7" style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;margin-right: 16px">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Edit Basic Information</h3>
					<form method="post" action="../customer/editProfileDetails">
						<?php foreach ($cusData as $row) {?>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 10%;">
								<label>Title</label>
								<input class="w3-input w3-border w3-round" type="text" name="title" placeholder="<?php echo $row->title ?>" value="<?php echo $row->title ?>">
							</div>
							<div class="w3-col w3-container" style="width: 45%;">
								<label>First Name</label>
								<input class="w3-input w3-border w3-round" type="text" name="fname" placeholder="<?php echo $row->first_name; ?>" value="<?php echo $row->first_name; ?>">
							</div>
							<div class="w3-col w3-container" style="width: 45%;">
								<label>Last Name</label>
								<input class="w3-input w3-border w3-round" type="text" name="lname" placeholder="<?php echo $row->last_name; ?>" value="<?php echo $row->last_name; ?>">
							</div>
						</div>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 100%;">
								<label>NIC No</label>
								<input class="w3-input w3-border w3-round w3-disabled" style="background-color: rgba(0,0,0,0.1);" type="text" name="nic" placeholder="" value="<?php echo $row->nic; ?>">
							</div>						
						</div>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 100%;">
								<label>Address</label>
								<input class="w3-input w3-border w3-round" type="text" name="add" placeholder="<?php echo $row->address; ?>" value="<?php echo $row->address; ?>">
							</div>						
						</div>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 50%;">
								<label>Contact Number</label>
								<input class="w3-input w3-border w3-round" type="text" name="cno" placeholder="<?php echo $row->phone; ?>" value="<?php echo $row->phone; ?>">
							</div>
							<div class="w3-col w3-container" style="width: 50%;">
								<label>Email</label>
								<input class="w3-input w3-border w3-round" type="text" name="email" placeholder="<?php echo $row->email; ?>" value="<?php echo $row->email; ?>">
							</div>
							
						</div>
						<?php } ?>
						<div class="w3-row-padding">
							<div class="w3-col w3-container" style="width: 20%;">
								<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Update Profile</button>
							</div>
							<div class="w3-col w3-right" style="width: 40%;">
									<div class="w3-light-green" style="border-radius: 3px;margin-top: 20px;">
							        	<?php if($this->session->flashdata('customerUpdate_success')):?>
							        	<?php echo $this->session->flashdata('customerUpdate_success');?>
							        	<?php endif;?>
							        </div>
							</div>
						</div>
						</form>
				</div>
				<div class="w3-col m4 " style="border: 1px solid lightgrey;border-radius: 3px;background-color: white;">
					<h3 class="mont" style="padding: 20px 20px 7px;color: rgba(0,0,0,0.7);">Change Password</h3>
					<form method="post" action="../customer/changePassword">
						<div class="w3-container" style="width: 100%;">
							<label>Current Password</label>
							<input class="w3-input w3-border w3-round" type="Password" name="old" placeholder="">
							<label>New Password</label>
							<input class="w3-input w3-border w3-round" type="Password" name="new" placeholder="">
							<label>Repeat New Password</label>
							<input class="w3-input w3-border w3-round" type="Password" name="repNew" placeholder="">
						</div>
						<div class="w3-center">
							<button type="submit" class="w3-button w3-green w3-round w3-hover-shadow w3-hover-green" style="margin: 10px 0;padding: 15px 20px;">Change Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>