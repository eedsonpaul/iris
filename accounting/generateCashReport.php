<?php 
  require_once 'accounting_header.php';
?>
<div class="main">
	<div id="navigation">
		
	  <ul>
			<li><a href="accounting.php">Return</a></li>
		</ul>

	<br>
	</div>

	<div id="right_side">
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<body>
<br>
<br>
<br>
<br>
<br>
<center>
<?php
	include('connect.php');
	include('accountabilityClass.php');
	$accountability = new Accountability();
	$accountability->acctg_generateCashReport();
?>
</center>
<body>
</body>
</html>
</div>

<?php 
  require_once 'cashier_footer.php';
?>