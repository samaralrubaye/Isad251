<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
//require_once("Sp_insertCustomer-config.php");

$dbConn = getconect();
if(isset($_POST['Submit']))
	 
{    
    $fname = (isset($_POST['UserFirstName']));
    $Lname = (isset($_POST['UserLastName']));
	
    $email = (isset($_POST['UserEmail']));
       
		
    // checking empty fields
    if(empty($fname) || empty($Lname) ||empty($email)) {
                
        if(empty($fname)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($Lname)){
            echo "<font color='red'>Lnamefield is empty.</font><br/>";
		}
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
		
		
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 
		
        // if all the fields are filled (not empty) 
          //$sql='CALL Sp_insertCustomer(?,?,?)';
        //insert data to database        
        $sql = 'INSERT INTO users(UserFirstName, UserLastName,,UserEmail,) VALUES(:$fname, :$Lname, :$email)';
		var_dump($uname);
        $query = $dbConn->prepare($sql);
		$query->execute(['UserFirstName'=>$fname,'UserLastName'=>$Lname,'UserEmail'=>$email]);
		var_dump($uname);
		//while($row=$quer->fetch()){
        // PDO::query(array(':UserFirstName' => $, ':UserLastName' => $UserLastName, ,':UserEmail' => $UserEmail,);
		
		
      
          //display success message
         echo "<font color='green'>Data added successfully.";
         echo "<br/><a href='test.php'>View Result</a>";
	 
        
	
	}
	

	 
?>

 
</body>
</html>