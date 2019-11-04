

<?php


function getconect()
{
	$servername = "proj-mysql.uopnet.plymouth.ac.uk";
	$username = "ISAD251_SAlRubaye";
	$password = "ISAD251_22212855";
	$dbname = "isad251_salrubaye";
	try
	{
		// http://php.net/manual/en/pdo.connections.php
		$dbConn = new PDO("mysql:host={$servername};dbname={$dbname}", $username, $password);
		
		$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
		// More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
	} catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	return $dbConn;
}
