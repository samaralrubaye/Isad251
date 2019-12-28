<?php


//including the database connection file
require_once('../model/DbContext.php');
require_once('../model/requestItems.php');

if (!isset($db)) {
    $db=new DbContext();
}
//getting id of the data from url
$UserID=$_GET['UserID'];

if (isset($_post['submit'])) {

    $request=new request($_POST('UserID'), $_POST('UserFirstName'), $_POST('UserLastNamr'), $_POST('UserEmail'));
    $success=$db->sp_ItemDelete($request);
}


//eleting the row from table
$q="select * from items where ItemID =ItemID";
$sql=$db->sp_ItemDelete($q);
$query=$db->prepare($sql);
$query->execute(array(':UserID'=>UserID));

//redirecting to the display page (index.php in our case)
header("Location:AdminForItem.php");
