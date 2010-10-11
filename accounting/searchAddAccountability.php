<?php 
 	 require_once 'accounting_header.php';
?>
 <?php
	include('connect.php');
	include('accountabilityClass.php');
	$search_option = $_POST['search_option'];
	$search_query = $_POST['search_query'];
	$accountability = new Accountability();
	$accountability->acctg_searchAddAccountability($search_option, $search_query);
?>