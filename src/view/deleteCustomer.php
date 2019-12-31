<?php
//including the database connection file
require_once('../model/DbContext.php');
require_once ('../model/requestCustomer.php');

if (!isset($db)) {
    $db=new DbContext();
}
//getting id of the data from url
$UserID = $_GET['UserID'];

$sql = $db->deleteCustomer($UserID);

//redirecting to the display page (index.php in our case)
header("Location:AdminForCustomer.php");
?>