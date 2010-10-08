<?php 
  require_once 'accounting_header.php';
?>


<div class="main">
	<div id="navigation">
		
	  <ul>
			<li><a href="accountingAddAccountabilitySearch.php?search_option=&search_query=">Add Accountability</a></li>
			<li><a href="viewClearedAccounts.php">View Already Cleared</a></li>
            <li><a href="generateSLB.php">Generate Student Accountabilities</a></li>
			<li><a href="accounting.php">Return</a></li>
		</ul>

<br>
	</div>

	<div id="right_side">

		<br><br><br><br><br><br><br><br><br><br><br><br>
		<h4><form action="searchAccountability.php" method="post">
		Enter Last name:<input type="text" name="last_name" />
		<input type="submit" value="Search" /> &nbsp;
		</form>
		<br><br><br>
	<?php
		include('connect.php');
		include('accountabilityClass.php');
		$accountability = new Accountability();
		$accountability->acctg_displayAccountabilities(0,0);
	?>
    </div>

<br>
<br>
</body>
</html>



<?php 
  require_once 'cashier_footer.php';
?>
