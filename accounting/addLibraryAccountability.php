<?php 
  require_once 'library_header.php';
  include('connect.php');
?>
<?php
	include('connect.php');
	include('libraryClass.php');
	$accountability = new Accountability();
	$accountability->acctg_addAccountability();
?>