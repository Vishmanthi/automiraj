<!DOCTYPE html>
<html>
<head>
<title>Customer dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'customer_header.php';?>
<?php include 'customer_sidebar.php';?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Calibri">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/checkbox.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}
	.calendar{
		font-family:Arial;font-size:12px;
	}
	table.calendar{
		margin:Auto;border-collapse:collapse;
	}
	.calendar .days td{
		width:80px;height:80px;padding:4px;
		border:1px solid #999;
		vertical-align:top;
		background-color:#DEF;
	}
	.cont{
		width:80px;height:40px;padding:4px;
		border:1px solid #999;
		vertical-align:top;
		background-color:#F66F74
 
 
 ;
	}

	.NA{
		width:80px;height:80px;padding:4px;
		border:1px solid #999;
		vertical-align:top;
		background-color:#F66F74
 ;
	}
	
	.calendar .days td:hover{
		background-color: #FFF;
	}
	.calendar .highlight{
		font-weight:bold; color:#00F;
	}
	.nCont{
		width:80px;height:80px;padding:4px;
	}


</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<div class="w3-content" style="max-width:2000px;margin-top:49px;">
		<div class="content" style="background: #f0f0f0" id="reserve-service">
			<h2 class="mont" style="padding: 10px 20px 0;">Reserve Service</h2>

					<p><?php if($this->session->flashdata('reservation_failure')): ?>
				<div class="w3-panel w3-pale-red w3-display-container">
				<span onclick="this.parentElement.style.display='none'"
 				class="w3-button w3-large w3-display-topright">&times;</span>
				<h4>Sorry!!</h4>
				<?php echo $this->session->flashdata('reservation_failure'); ?>
				</div>
				<?php endif; ?></p>

		
			<hr style="border-color: rgba(0,0,0,0.2);">
			<div class="w3-row-padding">
		    <div class="w3-col m10" style="border: 1px solid lightgrey;border-radius: 3px;margin-right: 16px">
				<?php echo $calendar;?>
				<script type="text/javascript">

			
				$(document).ready(function(){
					$('.calendar .day .nCont').click(function(){
						day_num=$(this).html();
						if(day_num.length<2){
							day_num="0"+day_num;
						}
					
						comDate="<?php echo $year.'/'.$month.'/';?>"+day_num;
						
						today="<?php echo date("Y/m/d");?>";
						if(comDate>today){
							document.getElementById('id02').style.display='block';
							document.getElementById("date").value = "<?php echo $year.'/'.$month.'/';?>"+day_num;
							
						}
						
					});
					$('.cont').click(function(){
						if($(this).text()!="N/A"){
							document.getElementById('id03').style.display='block';
							day_num1=$(this).parent().find('.day_num').text();
							if(day_num1.length<2){
							day_num1="0"+day_num1;
						}
							document.getElementById("date1").value = "<?php echo $year.'/'.$month.'/';?>"+day_num1; 
						}
					
					});
					$('#reserve').click(function(){
						document.getElementById('id03').style.display='none';
						document.getElementById('id02').style.display='block';
					});
					$('#reschedule').click(function(){
						document.getElementById('id03').style.display='none';
						document.getElementById('id01').style.display='block';
					});
				});
				
				
				</script>
			</div>
			</div>
			<?php
			
				?>
		</div>
	</div>
	<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>
			<div class="w3-container">
			<table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-light-grey">
        <th>Res ID</th>
        <th>Reservation Date</th>
        <th>Service</th>
      </tr>
    </thead>
	
		<?php foreach( $detRes as $row){ ?>
	
		<tr>
      <td><?php echo $row->id;?></td>
      <td><?php echo $row->reservation_date;?></td>
      <td><?php echo $row->title;?></td>
    </tr>
	
		<?php } ?>
		
		</table>
		</div>

      <form class="w3-container" action="<?php echo base_url();?>customer/Reschedule" method="post">
        <div class="w3-section">
		<label><b>Reservation id</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" name="id"  required>
          <label><b>Service</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" name="title" required>
          <label><b>Reschedule To</b></label>
          <input class="w3-input w3-border" type="text" placeholder="YYYY/mm/dd" name="re_date" required>
					<label><b>Time Slot</b></label>
					<select class="w3-select" name="time">
  						<option value="0">Choose your option</option>
  						<option value="7am to 9am">7am to 9am</option>
  						<option value="9am to 11am">9am to 11am</option>
  						<option value="11am to 1pm">11am to 1pm</option>
							<option value="1pm to 3pm">1pm to 3pm</option>
  						<option value="3pm to 5pm">3pm to 5pm</option>
  						<option value="5pm to 7pm">5pm to 7pm</option>
					</select>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Reschedule</button>
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>

    </div>
  </div>

<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

      <form class="w3-container" action="<?php echo base_url();?>Customer/Reservation" method="post">
        <div class="w3-section">
		<label><b>Vehicle No</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" name="veh_no"  required>
          <label><b>Service</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="" name="title" required>
          <label><b>Reserved Date</b></label>
          <input id="date" class="w3-input w3-border" type="text" placeholder="" name="res_date" required>
					<label><b>Time Slot</b></label>
					<select class="w3-select" name="time">
  						<option value="0">Choose your option</option>
  						<option value="7am to 9am">7am to 9am</option>
  						<option value="9am to 11am">9am to 11am</option>
  						<option value="11am to 1pm">11am to 1pm</option>
							<option value="1pm to 3pm">1pm to 3pm</option>
  						<option value="3pm to 5pm">3pm to 5pm</option>
  						<option value="5pm to 7pm">5pm to 7pm</option>
					</select>
          
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Reserve</button>
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>

    </div>
  </div>

	<div id="id03" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id03').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2></h2>
      </header>
			<br>
			<br>
			<br>
			
      <div class="w3-container">
			<p class="w3-right w3-row" style="float: right;">
				<form method="post" action="<?php echo base_url(); ?>Customer/deleteRes">
				<input id="date1" class="w3-input" type="hidden" placeholder="" name="date" required>
			<button class="w3-button w3-ripple w3-red" id="delete">Delete</button>
		</form>
  		<button class="w3-button w3-ripple w3-yellow" id="reschedule">Reschedule</button>
      </p>
			</div>
			<footer class="w3-container w3-teal">
        <p></p>
      </footer>
    </div>
  </div>

 
</body>
</html>