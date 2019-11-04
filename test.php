<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM users ORDER BY UserID DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td> FIRST NAME</td>
        <td>SECOND NAME</td>
        <td>Email</td>
        <td>Update</td>
    </tr>
    <?php     
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td>".$row['UserFirstName']."</td>";
        echo "<td>".$row['UserLastName']."</td>";
        echo "<td>".$row['UserEmail']."</td>";    
        echo "<td><a href=\"edit.php?id=$row[UserID]\">Edit</a> | <a href=\"delete.php?UserID=$row[UserID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>
</body>
</html>