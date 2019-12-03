<!DOCTYPE html>
<html>
<head>
<?php

 include_once("cafe.css ") 
?>
</head>
<body>




<?php
 include_once("header.php") 
?>
<?php require_once("admin_process.php");?>
< div class="w3-container" id="admin" >
<div class="w3-content" style="max-width:700px">
 <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">admin</span></h5>
 <form action="/action_page.php">
  <div class="container">
    <h1>admin</h1>
	</div>

<form action="admin_process.php" method="post">
<div class="container">
<lable> Name</lable>
<input type="text" name="name" value="enter the customer name">
</div>
<div class="container">
<input type="text" name="name" value="enter the customer email name">
</div>

<a href="#" class="w3-button w3-black">save</a>

</form>

</body>
</html