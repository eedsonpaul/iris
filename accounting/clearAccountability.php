<?php 
 	 require_once 'accounting_header.php';
?>
<?php
	include('connect.php');
	include('accountabilityClass.php');
	$accountability = new Accountability();
	$accountability->acctg_clearAccountability();
?>