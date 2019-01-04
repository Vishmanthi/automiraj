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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php 
          foreach($countSer as $service){
              echo "['".$service->name."', ".$service->con."],";
          }
          ?>
        ]);

        var options = {
          title: 'Indian Language Use',
          legend: 'none',
          pieSliceText: 'label',
          sliceVisibilityThreshold: .2,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
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
		    <a class="" href="<?php echo base_url(); ?>Manager/dailyServices"><i class="fa fa-file-text" style="padding-right: 10px"></i>Daily services analysis</a>
			<a class="" href="<?php echo base_url(); ?>Manager/salesAnalysis"><i class="fa fa-file-text" style="padding-right: 10px"></i>Revenue analysis</a>
		    <a class="" href="<?php echo base_url(); ?>Manager/dailySpares"><i class="fa fa-history" style="padding-right: 10px"></i>Spares usage</a>
		</div>
		
		<div id="jobcard" class="content">
		<h2 style="padding: 20px 20px 7px;"></h2>
		<hr/>
		<div class="w3-container" style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px; width:85%;background-color: #f0f0f0;">
        <div class="w3-col m2">
			<label for="date">Enter date</label>
		</div>
		<form class="form-inline" action="<?php echo base_url(); ?>Manager/dailySpares" method="post">
        <div class="w3-col m6">
            <input class="dinput" type="date" id="cardno" name="day" placeholder="" value="" >
		</div>
		<div class="w3-col m4">
            <input class="dinput w3-teal" type="submit" id="cardno" name="date" style="float:right;" value="Analyse" >
		</div>
	</form>
	
   

    <div class="w3-row">
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </div>
		</div>
	</div>
	</div>
	

</body>
</html>