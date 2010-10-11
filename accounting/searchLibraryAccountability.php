<?php 
  require_once 'library_header.php';
?>

<div class="main">
<center>

  <?php
	include('connect.php');
	include('libraryClass.php');
	$accountability = new Accountability();
	$accountability->acctg_searchAccountability();
?>
</p>
<p>&nbsp;</p>
<p>
  <center>
  <table>
  <input type=button value="Back" onClick="history.go(-1)">
  </table>
</p>
</body>
</html>
</div>

<?php 
  require_once 'cashier_footer.php';
?>
