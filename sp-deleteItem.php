<?php
require_once'config.php';

try
{
	$pdo=getconect();
	#<!--excute the stored procedure-->
	$sql='CALL sp_ItemDelete';
	#--<!--call stored procedure-->
	$quer=$pdo->query($sql);
	$quer->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $err)
{
	echo 'Error:'.$err->getMessage();
}

?>