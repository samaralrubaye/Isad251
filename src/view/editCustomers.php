<?php

// including the database connection file
include_once("DbContext.php");
include_once("requestCustomer");
if (!isset($db)) {
    $db =new DbContext();
}


if(isset($_POST['update']))
{   $fname = (isset($_POST['UserFirstName']));
    $Lname = (isset($_POST['UserLastName']));

    $email = (isset($_POST['UserEmail']));


    // checking empty fields
    if(empty($fname) || empty($Lname) ||empty($email)) {

        if(empty($fname)) {
            echo "<span style=\"color: red; \">Name field is empty.</span><br/>";
        }

        if(empty($Lname)){
            echo "<span style=\"color: red; \">Lnamefield is empty.</span><br/>";
        }




        if(empty($email)) {
            echo "<span style=\"color: red; \">Email field is empty.</span><br/>";
        }
		 if(empty($upword)) {
            echo "<span style=\"color: red; \">Email field is empty.</span><br/>";
        }
         } else
		 {
        //updating the table

             if(isset( $_post['update'])) {

                 $request = new request( $_POST('UserFirstName') ,$_POST('UserLastName'),$_POST('UserEmail'));
                 $success=$db->Sp_insertCustomer($request);
             }




        //redirectig to the display page. In our case, it is index.php
        header("Location: AdminForItem.php");
    }


//getting id from url
$UserID =(isset($_GET['UserID']));


}

?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
    <a href="../../public/index.php">Home</a>
    <br/><br/>

    <form name="form1" method="post" action="../model/spr_updateCustomer-config.php" id="editform">
        <table border="0">
            <tr>
                <td> First Name</td>
                <td><input type="text" name="First Name" id="UserFirstName" value="<?php echo $fname;?>"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="Last Name" id="UserLastName"   value="<?php echo $Lname;?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" ID="UserEmail"  value="<?php echo $email;?>"></td>
            </tr>
            <tr>

                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
