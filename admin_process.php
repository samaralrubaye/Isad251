

<?php
$servername = "proj-mysql.uopnet.plymouth.ac.uk";
$username = "ISAD251_SAlRubaye";
$password = " ISAD251_22212855";
$dbname = "isad251_sal-rubaye";


function getAll($users){$sql = "SELECT * FROM ".$tablename;    $con = getConnection();  $run = $con->prepare($sql);   $run->execute();
   $results = $run->fetchAll(PDO::FETCH_ASSOC);   return $results;}

function getConnection(){$mySQLConnection = new PDO("mysql:host=$domain;dbname=$db, 
$user, $password");
return $mySQLConnection;}



 ?>
