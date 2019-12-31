<?php
// including the database connection file
include_once("../model/DbContext.php");
include_once("../model/requestCustomer.php");
if (!isset($db)) {
    $db=new DbContext();
}


if (isset($_POST['update'])) {

    $UserID=$_POST['UserID'];
    $UserFirstName=$_POST['UserFirstName'];
    $UserLastName=$_POST['UserLastName'];
    $UserEmail=$_POST['UserEmail'];


    // checking empty fields
    if (empty($UserID) || empty($UserFirstName) || empty($UserLastName) || empty($UserEmail)) {
        if (empty($UserID)) {
            echo "<span style=\"color: red; \">UserID field is empty.</span><br/>";
        }
        if (empty($UserFirstName)) {
            echo "<span style=\"color: red; \">UserFirstName field is empty.</span><br/>";
        }

        if (empty($UserLastName)) {
            echo "<span style=\"color: red; \">UserLastName is empty.</span><br/>";
        }

        if (empty($UserID)) {
            echo "<span style=\"color: red; \">UserEmail field is empty.</span><br/>";
        }

    } else {
        //updating the table



        $success=$db->editCustomer($UserID, $UserFirstName, $UserLastName, $UserEmail);

        //redirectig to the display page. In our case, it is index.php
        header("Location: AdminForCustomer.php");
    }


//getting id from url


} else {
    $UserID=$_GET['id'];
    $user=$db->getCustomer($UserID);

    ?>
    <html>
    <head>
        <title>Edit Data</title>
    </head>

    <body>
    <a href="../../public/index.php">Home</a>
    <br/><br/>

    <form name="form1" method="post" action="editCustomers.php" id="editform">
        <table border="0">
            <tr>
                <td> UserID</td>
                <td><input type="text" name="UserID" id="UserID" value="<?php echo $item['UserID']; ?>"></td>
            </tr>
            <tr>
                <td>UserFirstName</td>
                <td><input type="text" name="UserFirstName" id="UserFirstName" value="<?php echo $item['UserFirstName']; ?>">
                </td>
            </tr>
            <tr>
                <td>UserLastName</td>
                <td><input type="text" name="UserLastName" ID="UserLastName" value="<?php echo $item['UserLastName']; ?>">
                </td>
            </tr>
            <tr>
                <td>UserEmail</td>
                <td><input type="text" name="UserEmail" ID="UserEmail" value="<?php echo $item['UserEmail']; ?>">
                </td>
            </tr>



                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </body>
    </html>
<?php } ?>