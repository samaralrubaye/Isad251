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

        $request = new request( $_POST('UserFirstName') ,$_POST('UserLastName'),$_POST('UserEmail'));
    $success=$db->Sp_insertCustomer($request);
    }
?>



    <form action="addCustomerFunctin.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>firstName</td>
                <td><input type="text" name="UserFirstName"></td>
            </tr>
            <tr>
                <td>last name</td>
                <td><input type="text" name="UserLastName"></td>
            </tr>

			<tr>
                <td>email</td>
                <td><input type="text" name="UserEmail"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>

            </tr>
        </table>
    </form>
echo "added customer";
</body>
</html>