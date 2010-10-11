<?php 
  require_once 'cashier_header.php';
?>

<div id="navigation">
<center>
<br>
<br>
<br>
<center>
<?php
	include('connect.php');
	include('cashierClass.php');
	$accountability = new Accountability();
	$accountability->acct_inputSLBPayment();
?>
</center>
</div>

<center>
<br>


	<br><br><td width="51"><a href="cashierSAM.php"><input type=button value="Back"></a></td>
</center>
</center>

<?php 
  require_once 'cashier_footer.php';
?>