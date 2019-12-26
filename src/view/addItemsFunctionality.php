
<head>
    <title>Add Data</title>
</head>

<?php
include_once("../model/DbContext.php");
include_once("../model/requestCustomer.php");


?>



<body>


<br/><br/>
<?php  if (!isset($db)) {
    $db =new DbContext();
}
if(isset( $_post['submit'])) {

    $request = new request( $_POST('ItemID') ,$_POST('ProductCost'), $_POST('ProductName') ,$_POST('Type'), $_POST('decicription') ,$_POST('Image'));
    $success=$db->Sp_insertCustomer($request);
}


if(isset($_POST['Submit'])) {
    $ItemID=(isset($_POST['ItemID']));
    $ProductCost=(isset($_POST['ProductCost']));
    $ProductName=(isset($_POST['ProductName']));
    $Type=(isset($_POST['Type']));
    $discryption=(isset($_POST['decicription']));
    $Image=(isset($_POST['Image']));


// checking empty fields
    if (empty($ItemID) || empty($ProductCost) || empty($ProductName)  || empty( $Type) || empty( $discryption) || empty($email)) {

        if (empty($ItemID)) {
            echo "<span style=\"color: red; \">product ID field is empty.</span><br/>";
        }

        if (empty( $ProductCost)) {
            echo "<span style=\"color: red; \">Product Costfield is empty.</span><br/>";
        }

        if (empty($ProductName)) {
            echo "<span style=\"color: red; \">product name field is empty.</span><br/>";
        }
        if (empty($Type)) {
            echo "<span style=\"color: red; \">type field is empty.</span><br/>";
        }

        if (empty($decicription)) {
            echo "<span style=\"color: red; \">decicription is empty.</span><br/>";
        }

        if (empty($Image)) {
            echo "<span style=\"color: red; \">Image field is empty.</span><br/>";
        }
    }
}
?>
//link to the previous page
echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";




//display success message
echo "<span \ green; style=\"color:">Data added successfully.";echo "<br/><a href='AdminForCustomer.php'>View Result</a>";




</body>

</html>