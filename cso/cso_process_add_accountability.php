<?php
	include("connect_to_database.php");
	include("cso_accountability.php");
	
	$stud_num = $_GET['id'];
	$account = new Accountability();
	$account->addAccountability($stud_num);
?>