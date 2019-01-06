<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0px;
  padding: 0;
  width: 200px;
  background-color: rgba(255,255,255,0.6);
  position: fixed;
  height: 100%;
  overflow: auto;
}
.bg-image {
  background-image: url("<?php echo base_url(); ?>/assests/images/carcare4.jpg");
  width: 200px;
}

.sidebar a {
  display: block;
  color:black;
  padding: 34px 30px ;
  text-decoration: none;
  cursor: pointer;
  transition: 0.6s;
  border-bottom: 1px solid #ddd;

}
 
.sidebar a.active {
  background-color: rgb(0,0,0);
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: rgba(255,234,0,0.5);;
  border-radius: 8px;

  color: black;
}

div.content {
  margin-left: 200px;
  background-color: white;
  padding: 1px 16px;
  height: 670px;
}



@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>
  <div class="w3-content" style="max-width:2000px;margin-top:49px;">
    
    <div class="sidebar" >
      <div class="w3-center">    
          <a href="http://[::1]/cis/customer/reserveService" class=" w3-hover-shadow" style="text-decoration: none;"><img src="<?php echo base_url(); ?>/assests/images/add2.png"><br>Reserve Service</a>
          <a href="http://[::1]/cis/customer/serviceHistory" class=" w3-hover-shadow" style="text-decoration: none;"><img src="<?php echo base_url(); ?>/assests/images/car2.png"><br>Service History</a>
          <a href="http://[::1]/cis/customer/editProfile" class=" w3-hover-shadow" style="text-decoration: none;"><img src="<?php echo base_url(); ?>/assests/images/user.png"><br>Edit Profile</a>
        </div>
    </div>
  </div>
</body>
</html>