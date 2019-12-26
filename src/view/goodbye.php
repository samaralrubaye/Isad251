<?php
session_start();
$page_title='goodbye';
include_once ('../model/DbContext.php');
$_SESSION =array();
session_destroy();
echo '<p>GoodBye</p>';
?>
