<head>
    <title>Add Data</title>
</head>

<?php
include_once("../model/DbContext.php");
include_once("../model/requestCustomer.php");


?>


<body>


<br/><br/>
<?php if (!isset($db)) {
    $db=new DbContext();
}

//var_dump($_POST);

if (isset($_POST['submit'])) {

    $ProductCost=$_POST['ProductCost'];
    $ProductName=$_POST['ProductName'];
    $Type=$_POST['Type'];
    $desicription=$_POST['desicription'];
    $Image=$_POST['image'];



    if (empty($ProductCost)) {
        echo "<span style=\"color: red; \">Product Costfield is empty.</span><br/>";
    }

    if (empty($ProductName)) {
        echo "<span style=\"color: red; \">product name field is empty.</span><br/>";
    }
    if (empty($Type)) {
        echo "<span style=\"color: red; \">type field is empty.</span><br/>";
    }

    if (empty($desicription)) {
        echo "<span style=\"color: red; \">decicription is empty.</span><br/>";
    }

    if (empty($Image)) {
        echo "<span style=\"color: red; \">Image field is empty.</span><br/>";
    }

    echo "Adding item: ";
   // var_dump($_POST);
    $success=$db->addItem( $ProductName, $ProductCost,$Type, $desicription, $Image );

  //  var_dump($success);
}


?>
//link to the previous page
echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";


//display success message
echo "<span \ green; style=\"color:">Data added successfully.";echo "<br/><a href='AdminForItem.php'>View Result</a>";


</body>

</html>