<?php 
  require_once 'cashier_header.php';
?>

<br>
<p>&nbsp;</p>
<center>
<?php
	include('connect.php');
	include('cashierClass.php');
	$accountability = new Accountability();
	$accountability->acctg_feeAssessment();
?>
<br>
<br>
<br>
<br>

<?php 
  require_once 'cashier_footer.php';
?>