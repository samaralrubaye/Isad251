
<?php
//including the database connection file
require_once('../model/DbContext.php');
require_once ('../model/requestItems.php');

if (!isset($db)) {
    $db=new DbContext();
}
//getting id of the data from url
$itemID = $_GET['ItemID'];

$sql = $db->deleteItem($itemID);

//redirecting to the display page (index.php in our case)
header("Location:AdminForItem.php");
?>