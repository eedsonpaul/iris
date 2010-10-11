<?php 
  require_once 'accounting_header.php';
?>


<title></title>
<p><center>
  <?php
	include('connect.php');
	include('accountabilityClass.php');
	$accountability = new Accountability();
	$accountability->acctg_searchAccountability();
?>
</p>
<p>&nbsp;</p>
<p><center>
  <input type=button value="Back" onClick="history.go(-1)">
</p>
</body>
</html>
</div>

<?php 
  require_once 'cashier_footer.php';
?>
