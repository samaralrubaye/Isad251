<?php
require_once'config.php';

try
{
	$pdo=getconect();
	#<!--excute the stored procedure-->
	$sql='CALL spr_updateitem()';
	#--<!--call stored procedure-->
	$quer=$pdo->query($sql);
	$quer->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $err)
{
	echo 'Error:'.$err->getMessage();
}

?>