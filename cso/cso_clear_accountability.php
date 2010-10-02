<?php
	include("cso_accountability.php");
	include('connect_to_database.php');
	$student_num = $_GET['id'];
	$acc_type_id = $_GET['acct'];

	$account = new Accountability();
	$account->clearAccountability($student_num, $acc_type_id);

?>