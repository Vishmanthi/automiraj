<!DOCTYPE html>
<html>
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
<body>

<h3>Update Your Password</h3>
<p>How to use CSS to create a stacked form:</p>

<div class="container">
  <form action="<?php echo base_url();?>users/update_password" method="post">
    <label for="fname">Email</label>
    <?php if(isset($email_hash,$email_code)){?>
    <input type="hidden" id="fname" name="email_hash" value="<?php echo $email_hash;?>">
    <input type="hidden" id="fname" name="email_code" value="<?php echo $email_code;?>">
    <?php }?>
    <label for="fname">Email</label>
    <input type="text" id="fname" name="email" placeholder="Your name..">


    <label for="fname">New Password</label>
    <input type="password" id="fname" name="password" placeholder="Your name..">   

>
    <label for="fname">New Password Again</label>
    <input type="password" id="fname" name="password_conf" placeholder="Your name..">   
  
  
    <input type="submit" value="Submit">
  </form>
  <?php echo validation_errors();?>
</div>

</body>
</html>
