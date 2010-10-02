<?php
	include ('cso_accountability.php');
	include('connect_to_database.php');
	$account = new Accountability();
	$account->searchStudentAccountability();
?>