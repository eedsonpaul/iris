<?php
	include("connect_to_database.php");
	include("cso_accountability.php");
	
	$stud_num = $_GET['id'];
	$acc_id = $_GET['acc_id'];

	$account = new Accountability();
	$account->editAccountability($stud_num, $acc_id);

?>