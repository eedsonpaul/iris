<?php 
 	 require_once 'cashier_header.php';
?>
<?php
	include('connect.php');
	include('cashierClass.php');
	$accountability = new Accountability();
	$accountability->acct_clearSLB();
?>