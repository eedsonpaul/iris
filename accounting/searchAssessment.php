<?php 
  require_once 'accounting_header.php';
  include('connect.php');
?>


	<div id="navigation">
    
		
	  <ul>
			<li><a href="accountingEM.php">Return</a></li>
		</ul>

	<br>
	</div>
	
	<div id="right_side">
    <br><br><br><br><br><br><br><br><br><br>
    <center><h1>STUDENT ASSESSMENT</h1></center>
    
<?php
	include('connect.php');
	include('accountabilityClass.php');
	$accountability = new Accountability();
	$accountability->acctg_feeAssessment();
?>
</div>

<?php 
  require_once 'cashier_footer.php';
?>