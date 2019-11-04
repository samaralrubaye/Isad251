<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit']))
	{    
    $fname = (isset($_POST['UserFirstName']));
    $Lname = (isset($_POST['UserLastName']));
    $email = (isset($_POST['UserEmail']));
        
		
    // checking empty fields
    if(empty($fname) || empty($Lname) || empty($email)) {
                
        if(empty($UserFirstName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($UserLastName)){
            echo "<font color='red'>Lnamefield is empty.</font><br/>";
        }
        
        if(empty($UserEmail)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database        
        $sql = "INSERT INTO users(UserFirstName, UserLastName, UserEmail) VALUES(:fname, :Lname, :email)";
        $query = $dbConn->prepare($sql);
         PDO::query(array(':UserFirstName' => $UserFirstName, ':UserLastName' => $UserLastName, ':UserEmail' => $UserEmail));
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='test.php'>View Result</a>";
    }
}
?>
</body>
</html>