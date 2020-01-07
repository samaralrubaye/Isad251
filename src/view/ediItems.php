<?php
// including the database connection file
include_once("../model/DbContext.php");
include_once("../model/requestItems.php");
if (!isset($db)) {
    $db=new DbContext();
}


if (isset($_POST['update'])) {

    $ItemID=$_POST['ItemID'];
    $ProductCost=$_POST['ProductCost'];
    $ProductName=$_POST['ProductName'];
    $Type=$_POST['Type'];
    $desicription=$_POST['desicription'];
    $image=$_POST['image'];

    // checking empty fields
    if (empty($ItemID) || empty($ProductCost) || empty($ProductName) || empty($Type) || empty($desicription) || empty($image)) {
        if (empty($ItemID)) {
            echo "<span style=\"color: red; \">ItemID field is empty.</span><br/>";
        }
        if (empty($ProductCost)) {
            echo "<span style=\"color: red; \">ProductCost field is empty.</span><br/>";
        }

        if (empty($ProductName)) {
            echo "<span style=\"color: red; \">Productname is empty.</span><br/>";
        }

        if (empty($Type)) {
            echo "<span style=\"color: red; \">Type field is empty.</span><br/>";
        }
        if (empty($desicription)) {
            echo "<span style=\"color: red; \">desicription field is empty.</span><br/>";
        }
        if (empty($image)) {
            echo "<span style=\"color: red; \">Image field is empty.</span><br/>";
        }
    } else {
        //updating the table


        // $request=new request($_POST('ItemID'), $_POST('ProductCost'), $_POST('ProductName'), $_POST('Type'), $_POST('desicription'), $_POST('image'));
        $success=$db->editItem($ItemID, $ProductName, $ProductCost, $Type, $desicription, $image);

        //redirectig to the display page. In our case, it is index.php
        header("Location: AdminForItem.php");
    }


//getting id from url


} else {
    $ItemId=$_GET['id'];
    $item=$db->getProduct($ItemId);

    ?>
    <html>
    <head>
        <title>Edit Data</title>
    </head>

    <body>
    <a href="../../public/index.php">Home</a>
    <br/><br/>

    <form name="form1" method="post" action="ediItems.php" id="editform">
        <table border="0">
            <tr>
                <td> ItemID</td>
                <td><input type="text" name="ItemID" id="ItemID" value="<?php echo $item['ItemID']; ?>"></td>
            </tr>
            <tr>
                <td>ProductCost</td>
                <td><input type="text" name="ProductCost" id="ProductCost" value="<?php echo $item['ProductCost']; ?>">
                </td>
            </tr>
            <tr>
                <td>ProductName</td>
                <td><input type="text" name="ProductName" ID="UserEmail" value="<?php echo $item['ProductName']; ?>">
                </td>
            </tr>

            <tr>
                <td> Type</td>
                <td><input type="text" name="Type" id="Type" value="<?php echo $item['Type']; ?>"></td>
            </tr>
            <tr>
                <td>desicription</td>
                <td><input type="text" name="desicription" id="desicription"
                           value="<?php echo $item['desicription']; ?>">
                </td>
            </tr>
            <tr>
                <td>image</td>
                <td><input type="text" name="image" ID="image" value="<?php echo $item['image']; ?>"></td>
            </tr>
            <tr>

                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </body>
    </html>
<?php } ?>