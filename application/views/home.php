<!DOCTYPE html>
<html>
<title>Auto Miraj</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assests/log.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="jquery.simplyscroll.css" media="all" 
type="text/css">

<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
.mukta{
  font-family: "Mukta", sans-serif;
}
.buttonop:hover{opacity:0.5;}
.mont{
  font-family: "Montserrat", sans-serif;
}
/* css for login page */
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 0.5px solid #ccc;
    box-sizing: border-box;
    border-radius: 5px;

}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 40%;
}

button:hover {
    opacity: 1.0;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 9px 0 12px 0;
    position: relative;
    width:100%;
    height: 10%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 0;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height:100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(255,255,255,0.77); /* Black w/ opacity */
    padding-top: 60px;

}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 3% auto; /* 5% from the top, 5% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-card w3-black" style="opacity: 0.8">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right buttonop" href="javascript:void(0)" onclick="navigation()" title="Toggle Navigation Menu" style="padding: 13px 20px"><i class="fa fa-bars"></i></a>
    <a class="w3-bar-item w3-button w3-hide-small w3-hide-large w3-right buttonop" href="javascript:void(0)" onclick="navigation1()" title="Toggle Navigation Menu" style="padding: 13px 20px"><i class="fa fa-bars"></i></a>
    <img class="w3-bar-item " style="padding: 3px 0px" src="<?php echo base_url(); ?>/assests/images/logo1.jpg" style="max-width:100%">
    <div class="w3-right">
      <a href="#" class="w3-bar-item w3-button w3-hover-yellow w3-hide-small " style="padding: 13px 16px">HOME</a>
      <a href="#about" class="w3-bar-item w3-button  w3-hide-small w3-hover-yellow w3-hide-medium" style="padding: 13px 16px">ABOUT US</a>
      <a href="#contact" class="w3-bar-item w3-button  w3-hide-small w3-hover-yellow w3-hide-medium" style="padding: 13px 16px">SERVICES</a>
      <a href="#contact" class="w3-bar-item w3-button  w3-hide-small w3-hover-yellow" style="padding: 13px 16px">CONTACT</a>
      <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-yellow w3-hide-medium" style="padding: 13px 16px">PROMOTIONS</a>
      <a onclick="document.getElementById('login').style.display='block'" class="w3-bar-item w3-button  w3-hover-yellow w3-hide-small" style="padding: 13px 16px;width: auto;">LOGIN</a>
      
    </div>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">HOME</a>
  <a href="#about" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">ABOUT US</a>
  <a href="#tour" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">SERVICES</a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">CONTACT</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">PROMOTIONS</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="navigation()">LOGIN</a>
</div>

<!-- Navbar on tablets,medium screens -->
<div id="navDemoM" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-small w3-top" style="margin-top:46px">
  <a href="#about" class="w3-bar-item w3-button w3-padding-large" onclick="navigation1()">ABOUT US</a>
  <a href="#tour" class="w3-bar-item w3-button w3-padding-large" onclick="navigation1()">SERVICES</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="navigation1()">PROMOTIONS</a>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:49px;">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center" id="div1">
    <img class="w3-animate-fading" src="<?php echo base_url(); ?>/assests/images/carcare1.jpg" style="width:100%">
  </div>
  <div class="mySlides w3-display-container w3-center" id="div2">
    <img class="w3-animate-fading" src="<?php echo base_url(); ?>/assests/images/carcare2.jpg" style="width:100%">
  </div>
   

  <!-- About US section -->
  <div class="w3-container w3-content w3-padding-64 w3-center" style="max-width:800px;" id="about">
    <div class="w3-yellow w3-hover-amber w3-center "style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
      <h2 class="mukta" style="font-weight: 600;padding:5px 20px; text-align:left; "><i>About AUTOMIRAJ</i></h2>
    </div>
    <h3 style="text-align: left; font-weight: 400; padding-top:15px;">Our Vision</h3>
    <hr/>
    <p class="w3-justify">To become the obvious choice!</p>
    <h3 style="text-align: left; font-weight: 400; padding-top:15px;">Our Mission</h3>
    <hr/>
    <p class="w3-justify">To achieve unparalleled recognition as the premium auto care service provider by objectifying trust, convenience and uniqueness. Guiding our work force as a team striving “To become the obvious choice”.</p>
  </div>
  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64 " style="max-width:800px;" id="contact">
    <div class="w3-yellow w3-hover-amber w3-center "style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
      <h2 class="mukta" style="font-weight: 500;padding:5px 20px; text-align:left; "><i>Contact</i></h2>
    </div>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <h3 style="text-align: left; font-weight: 400; padding-top:15px;">Location</h3>
        <hr/>
        <i class="fa fa-map-marker" style="width:30px"></i>No 66,<br>Attidiya Road, <br>Ratmalana <br>
        <i class="fa fa-phone" style="width:30px"></i>: 94 11 5766041<br>
        <i class="fa fa-envelope" style="width:30px"> </i>: automiraj@mail.com<br>
        <i class="fa fa-clock-o" style="width:30px"> </i>: 7:30 AM to 10.30PM<br>
      </div>
      <div class="w3-col m6">
        <h3 style="text-align: left; font-weight: 400; padding-top:15px;">Let's get in touch!</h3>
        <hr/>
        <p>Feel free to contact us for more information or get in touch with our customer care executives at our office.</p>
        <form action="/action_page.php" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
          <button class="w3-btn w3-black w3-hover-green w3-section w3-center w3-hover-shadow" type="submit">SEND</button>
        </form>
      </div>
    </div>
  </div>
  
<!-- End Page Content -->
</div>

<!--Login -->
<div id="login" class="modal">
  
  <form class="modal-content animate" action="users/login" method="post" style="width:460px;background-color: rgba(0,0,0,0.68);border-radius: 3%">
    <div class="imgcontainer" style="height:150px;">
      <p class="w3-red">
      <?php if($this->session->flashdata('errors')):?>
      <?php echo $this->session->flashdata('errors');?>
      <?php endif;?>
      </p>
      <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="<?php echo base_url(); ?>/assests/images/log2.png" alt="Avatar" style="border-radius: 50%">
      <div class="w3-center mont" style="font-size: 40px;color: white">
        LOGIN
      </div>
    </div>
    
    <div class="container" >
      <label for="uname" style="color: white">Username</label>
      <input style="background:rgba(0,0,0,0.6);color: rgba(255,255,255,0.7);" type="text" placeholder="Enter Username" name="username" required>

      <label for="psw" style="color: white">Password</label>
      <input style="background:rgba(0,0,0,0.6); color: rgba(255,255,255,0.7);" type="password" placeholder="Enter Password" name="password" required>
      <div style="margin-top: 15px">
        <label style="color: rgba(255,255,255,0.8);">
          <input type="checkbox" checked="checked" name="remember" style="cursor: pointer;"> Remember me
        </label>
        <span class="psw" style="color: rgba(255,255,255,0.8);">Forgot <a href="#">password?</a></span>
      </div>
    </div>
  

    <div class="container" style="margin-top: 20px" >
      <div class="w3-center">
        <button  type="submit" class="w3-hover-shadow w3-hover-green" style="border-radius: 4px;">Login</button>
      </div>
    </div>
  </form>
</div>




<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<!-- Add Google Maps -->
<div id="googleMap" style="height:400px;" class="w3-grayscale-max"></div>
<script>
function myMap() {
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
<div class="w3-container" style="padding-top: 20px">
  <h3 class="w3-center mukta">We work with world renowned car care brands. </h3>
  <div class="w3-center">
    <img class="w3-padding-large" src="<?php echo base_url(); ?>/assests/images/3m.jpg">
    <img class="w3-padding-large" src="<?php echo base_url(); ?>/assests/images/wurth.jpg">
    <img class="w3-padding-large" src="<?php echo base_url(); ?>/assests/images/mobil.png">
    <img class="w3-padding-large" src="<?php echo base_url(); ?>/assests/images/bosch.png">  
  </div>
</div>

<!-- Footer -->
<footer class="w3-container w3-opacity w3-light-grey w3-xlarge" style="padding:10px">
  <i class="fa fa-facebook-official w3-hover-opacity w3-left" style="padding-right: 12px; padding-left: 15px"></i>
  <i class="fa fa-instagram w3-hover-opacity w3-left"></i>
  <i class="w3-medium w3-right">2018 Auto Miraj. All rights Reserved.</i>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 9000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function navigation() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

function navigation1() {
    var x = document.getElementById("navDemoM");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
