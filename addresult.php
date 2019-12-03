<html>
<head>    
    <title>addingresult</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("admin_process.php");
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
//$result = $dbConn->query("SELECT * FROM users ORDER BY id DESC");
?>
<a href="add.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>customer first Name</td>
        <td>customer last name</td>
        <td>customer email</td>
        <td>Update</td>
    </tr>
    <?php     
   // while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td>".$row['UserFirstName']."</td>";
        echo "<td>".$row['UserLastName']."</td>";
        echo "<td>".$row[' UserEmail']."</td>";    
        echo "<td><a href=\"edit.php?id=$row[UserID]\">Edit</a> | <a href=\"delete.php?id=$row[UserID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
   // }
    ?>
    </table>
</body>
</html>