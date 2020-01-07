<?php
include_once('../../public/header.php');
include_once('../model/DbContext.php');
include_once('../model/requestItems.php');
session_start();
try {
    $db=new DbContext();

    $page_title='CART addition';

    if (isset($_GET['ItemID'])) {
        $ItemID=$_GET['ItemID'];
    }



    $item=($db->getProduct($ItemID));

    if($item['stock'] < 0){
        die('There is no stock');
    }

    if (array_key_exists($ItemID, $_SESSION['cart'])) {
        $existingStock = $_SESSION['cart'][$ItemID]['stock'];
        if($item['stock'] > $existingStock) {
            $_SESSION['cart'][$ItemID]['stock']=$existingStock + 1;

            echo '<P> Another ' . $item["ProductName"] . ' has been added to your Card</p>';
        }else {
            die('There is no stock <br>');
        }

    } else {
        $_SESSION['cart'][$ItemID] = array('stock'=>1, 'cost' => $item['ProductCost']);
        echo '<p> A ' . $item["ProductName"] . ' has been added to your cart</p><br>';
    }


    //var_dump($_SESSION['cart']);

} catch (PDOException $err) {
    echo 'Error:' . $err->getMessage();
}


include_once('../../public/footer.php')

?>