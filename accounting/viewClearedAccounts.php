<?php 
  require_once 'accounting_header.php';
?>

<div class="main">
	<div id="navigation">
		<center><h1>CLEARED ACCOUNTABILITIES</h1></center>
	  <ul>
			<li><a href="accountingAddAccountabilitySearch.php?search_option=&search_query=">Add Accountability</a></li>
			<li><a href="viewClearedAccounts.php">View Already Cleared</a></li>
            <li><a href="generateSLB.php">Generate Student Accountabilities</a></li>
			<li><a href="accounting.php">Return</a></li>
		</ul>

<br>
	</div>
    
    <div id="right_side">
    <br><br><br><br><br><br><br><br><br>
<p>
<center>
  <?php
	include('connect.php');
	include('accountabilityClass.php');
	$accountability = new Accountability();
	$accountability->acctg_viewClearedAccounts();
?>
</p>

<p>&nbsp;</p>
</div>
</body>
</html>


<?php 
  require_once 'cashier_footer.php';
?>
