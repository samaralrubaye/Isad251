
<!DOCTYPE html>
<html>
<head>
<title>register</title>
</head>
<?php
 include_once("cafe.css ") 
?>
<body>
<?php
include_once("header.php")
?>
<!--registion form-->
<div class="w3-container" id="register">
<div class="w3-content" style="max-width:700px">
 <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Register</span></h5>
 <form action="registerFunction.php">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>

</div>

<?php

include_once("footer.php")
?>
</body>
</html>


