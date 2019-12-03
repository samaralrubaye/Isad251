
<?php
//including the database connection file
require_once('config.php');
 
//getting id of the data from url
$UserID = $_GET['UserID'];
 
//deleting the row from table
$sql = "DELETE FROM users WHERE UserID=:UserID";
$query = $dbConn->prepare($sql);
$query->execute(array(':UserID' => UserID));
 
//redirecting to the display page (index.php in our case)
header("Location:test.php");
?>