<?php 
  require_once 'cashier_header.php';
?>
<body>
<br>
<br>
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
	<br><br><td width="51"><a href="cashierSAM.php"><input type=button value="Back"></a></td>
</center>
<br>
<br>
<br>
</body>
</html>
<?php 
  require_once 'cashier_footer.php';
?>