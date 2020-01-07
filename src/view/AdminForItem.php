<?php
include_once("../model/DbContext.php");
include_once("../model/requestItems.php");

?>
</head>



<body>


<br/><br/>

?>


<html lang="en">
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="AddItem.php">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td> ItemID</td>
        <td>ProductCost</td>
        <td>ProductName</td>
        <td>Type</td>
        <td>decicription</td>
        <td>Image</td>

        <td>Update</td>
    </tr>
    <?php
    if(!isset($db)) {
        $db = new DbContext();
    }
    if(isset($_POST['submit'])) {
       $requestItems=new requestItems($_POST('$ItemID'), $_POST['ProductCost'], $_POST['ProductName'], $_POST['Type'], $_POST['decicription'], $_POST['image']);
       $success=$db->getItems($requestItems);
    }
    $products=$db->allProducts();
    foreach ($products as $row) {
        echo "<tr>";
        echo "<td>".$row['ItemID']."</td>";
        echo "<td>".$row['ProductCost']."</td>";
        echo "<td>".$row['ProductName']."</td>";
        echo "<td>".$row['Type']."</td>";
        echo "<td>".$row['desicription']."</td>";
        echo "<td>".$row['image']."</td>";
        echo "<td><a href=\"ediItems.php?id=$row[ItemID]\">Edit</a> | <a href=\"deleteItem.php?ItemID=$row[ItemID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
    </table>
</body>
</html>