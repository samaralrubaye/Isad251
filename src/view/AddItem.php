



<html>
<head>
    <title>Add Data</title>
	<?php
  include_once("../model/DbContext.php");
  include_once("../model/requestCustomer.php");


?>
</head>



<body>


    <br/><br/>
  <?php  if (!isset($db)) {
    $db =new DbContext();
    }
    if(isset( $_post['submit'])) {

        $request = new request( $_POST('ItemID') ,$_POST('ProductCost'),$_POST('ProductName'), $_POST('Type') ,$_POST('decicription'),$_POST('Image'));
    $success=$db->Sp_insertCustomer($request);
    }
?>



    <form action="addItemsFunctionality.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>productID</td>
                <td><input type="text" name="ItemID"></td>
            </tr>
            <tr>
                <td>product cost</td>
                <td><input type="text" name="ProductCost"></td>
            </tr>

			<tr>
                <td>Product Name</td>
                <td><input type="text" name="ProductName"></td>
            </tr>


            <tr>
                <td>Type</td>
                <td><input type="text" name="Type"></td>
            </tr>

            <tr>
                <td>decicription</td>
                <td><input type="text" name="decicription"></td>
            </tr>


            <tr>
                <td>image </td>
                <td><input type="text" name="image"></td>
            </tr>


            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>

            </tr>

        </table>
    </form>
echo "added Item";
</body>
</html>