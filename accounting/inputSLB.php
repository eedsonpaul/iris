<?php 
 	 require_once 'accounting_header.php';
?>
<?php
	include('connect.php');
	include('accountabilityClass.php');
	$accountability = new Accountability();
	$term_incurred = $_POST['term_incurred'];
	$accountability->acctg_inputStudentLoan();
?>