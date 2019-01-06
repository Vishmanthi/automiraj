<!DOCTYPE html>
<html>
<head>
	<title>Manager dashboard</title>
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

    
* {
  box-sizing: border-box;
}

input[type=text],input[type=password], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

		 
	</style>
</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="sidebar">
			<a class="" onclick=""><img src="<?php echo base_url(); ?>/assests/images/user.png"><i class="fa fa-circle" style="color: green;font-size: 0.8em;padding-right: 5px"></i>Online</a>
		    <!-- <a class="" href="customers"><i class="fa fa-plus-circle" style="padding-right: 10px"></i>Add Customer</a> -->
		    <!-- <a class="" href="vehicle"><i class="fa fa-car" style="padding-right: 10px"></i>Add Vehicle</a> -->
		    <a class="" href="<?php echo base_url(); ?>Manager/dailyServices"><i class="fa fa-pie-chart" style="padding-right: 10px"></i>Daily services analysis</a>
			<a class="" href="<?php echo base_url(); ?>Manager/salesAnalysis"><i class="fa fa-line-chart" style="padding-right: 10px"></i>Revenue analysis</a>
		    <a class="" href="<?php echo base_url(); ?>Manager/dailySpares"><i class="fa fa-wrench" style="padding-right: 10px"></i>Spares usage</a>
      <a class="" href="<?php echo base_url(); ?>Manager/addUser"><i class="fa fa-address-card-o" style="padding-right: 10px"></i>Add User</a>
      <a class="" href="<?php echo base_url(); ?>Manager/customercare"><i class="fa fa-user" style="padding-right: 10px"></i>Customer care</a>
      <a class="" href="<?php echo base_url(); ?>Manager/sentPromotions"><i class="fa fa-money" style="padding-right: 10px"></i>Promotions</a>
		</div>
		
		<div id="jobcard" class="content">
		<h2 style="padding: 20px 20px 7px;"></h2>
        
		<hr/>
		<div class="w3-container" style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: #f0f0f0;">
<h1>Create Promotions</h1>
<form action="<?php echo base_url();?>Manager/getdataPromotions" method="POST" >
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class = "row">
                <div class="w3-half">
                    <p><h3>Item</h3> <input class="w3-input w3-border" type="text" placeholder="spare item" required name="Item" required></p>
                </div>
            </div>
                <div class="row">
                    <div class="w3-half">
                    <p><h3>Brand</h3><input class="w3-input w3-border" type="text" placeholder="product brand" required name="Brand" required></p>
                    </div>
                 </div>
            <div class="row">  
                <div class="w3-half">    
                    <p><h3>Promotion</h3><input class="w3-input w3-border" type="text" placeholder="discount or promotion" required name="Promotion" required></p>
                </div>
            </div>
            <button class="w3-btn w3-black w3-hover-green w3-section w3-center w3-hover-shadow" type="submit">SEND</button>
        </form>
</div>
<div class="container">
    <form action="<?php echo base_url();?>Manager/deletPromotion" method="POST">
    <div class = "row">
                <div class="w3-half">
                    <p><h3>Enter DIS_CORD</h3> <input class="w3-input w3-border" type="text" placeholder="cord no." required name="cord" required></p>
                </div>
            </div>
            <input type='submit' class='btn btn-danger' value='Delete'>
    </form>
</div>
</div>
	

    </body>
    </html>