

<!DOCTYPE html>
<html>
<?php


 include_once("cafe.css ") 
?>
<body>


<?php

include_once("header.php")
?>


<h2>Login Form</h2>

<form action="loginFunction.php" method="post">
  <div class="imgcontainer">
    <img src="img_avatar2.JPG" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    
  </div>
</form>

<?php

include_once("footer.php")
?>
</body>
</html>

