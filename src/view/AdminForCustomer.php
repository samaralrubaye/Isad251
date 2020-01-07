<html>
<head>    
    <title>ItemsManagment</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("../model/DbContext.php");
include_once ("../model/requestCustomer.php");

if (!isset($db)) {
    $db=new DbContext();
}
if (isset($_post['submit'])) {

    $requestCustomer=new requestCustomer($_POST('UserFirstName'), $_POST('UserLastName'), $_POST('UserEmail'));
    $success=$db->getCustomers($requestCustomer);
}
 
//fetching data in descending order (lastest entry first)


?>
<h2>customer editing</h2>
<a href="AddCustomer.php">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>customer first Name</td>
        <td>customer last name</td>
        <td>customer email</td>
        <td>Update</td>
    </tr>
    <?php
    $Custmers=$db->allCusromers();
   foreach($Custmers as $row) {
        echo"<tr>";
        echo "<td>".$row['UserFirstName']."</td>";
        echo "<td>".$row['UserLastName']."</td>";
        echo "<td>".$row['UserEmail']."</td>";    
        echo "<td><a href=\"editCustomers.php?id=$row[UserID]\">Edit</a> | <a href=\"deleteCustomer.php?id=$row[UserID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
   }
    ?>
    </table>
</body>
</html>