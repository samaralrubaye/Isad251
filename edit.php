<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $UserID= (isset($_POST['UserID']));
    $UserFirstName=(isset($_POST['UserFirstName']));
    $UserLastName =(isset($_POST['UserLastName']));
    $UserEmail=(isset($_POST['UserEmail']));    
    
    // checking empty fields
    if(empty($UserFirstName) || empty($UserLastName) || empty($email)) {    
            
        if(empty($UserFirstName)) {
            echo "<font color='red'>UserFirstName field is empty.</font><br/>";
        }
        
        if(empty($UserLastName)) {
            echo "<font color='red'>UserLastName field is empty.</font><br/>";
        }
        
        if(empty($UserEmail)) {
            echo "<font color='red'>UserEmail field is empty.</font><br/>";
        }        
         } else 
		 {    
        //updating the table
        $sql = "UPDATE users SET UserFirstName=:UserFirstName, UserSecondName=:UserSecondName, UserEmail=:UserEmail WHERE UserID=:UserID";
        $query = $dbConn->prepare($sql);
                
        //$query->bindparam(':UserID', $UserID);
        //$query->bindparam(':UserFirstName', $UserFirstName);
        //$query->bindparam(':UserSecondName', $UserLastName);
        //$query->bindparam(':UserEmail', $UserEmail);
        //$query->execute();
        
        // Alternative to above bindparam and execute
         $query->execute(array(':UserID' => $UserID, ':UserFirstName' => $UserFirstName, ':UserLastName' => $UserLastName, ':UserEmail' => $UserEmail));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: test.php");
    }


//getting id from url
$UserID =(isset($_GET['UserID']));
 
//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE UserID=:UserID";
$query = $dbConn->prepare($sql);
$query->execute(array(':UserID' => $UserID));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $UserFirstName = $row['UserFirstName'];
    $UserLastName = $row['UserLastName'];
    $UserEmail= $row['UserEmail'];
}
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td> First Name</td>
                <td><input type="text" name="First Name" value="<?php echo $UserFirstName;?>"></td>
            </tr>
            <tr> 
                <td>Last Name</td>
                <td><input type="text" name="Last Name" value="<?php echo $UserLastName;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $UserEmail;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="UserID" value=<?php echo $_GET['UserID'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
