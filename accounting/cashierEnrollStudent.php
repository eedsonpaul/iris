<?php
	include('connect.php');
	include('cashierClass.php');
	$accountability = new Accountability();
	$accountability->acctg_enrollStudent();
?>