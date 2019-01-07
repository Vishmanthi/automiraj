<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body class="w3-container">

<style>
body {
  font-family: Arial;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>


<h3>Reset Password</h3>
<!-- <p>How to use CSS to create a stacked form:</p> -->

<div class="container">
  <form action="<?php echo base_url();?>users/resetPassword" method="post">
    <label for="fname">Email</label>
    <input type="text" id="fname" name="email" placeholder="Your name..">

    
  
    <input type="submit" value="Send">
  </form>
  <?php 
  echo validation_errors();
  if (isset($error)){
      echo "<p >".$error."</p>";
  }
      ?>
  
</div>

</body>
</html>
