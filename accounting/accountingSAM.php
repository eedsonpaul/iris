<?php 
  require_once 'accounting_header.php';
?>


	<div id="navigation">
		
	  <ul>
			<li><a href="accountingAddAccountabilitySearch.php?search_option=&search_query=">Add Accountability</a></li>
			<li><a href="viewClearedAccounts.php">View Already Cleared</a></li>
            <li><a href="generateSLB.php">Generate Student Accountabilities</a></li>
			<li><a href="accounting.php">Return</a></li>
		</ul>

		<center>
		<h4><form action="searchAccountability.php" method="post" name="accountingform">
		Enter Last name:<input type="text" name="last_name" />
		<input type="submit" value="Search" /> &nbsp;
		</form>
		
	<script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("accountingform");
    
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("last_name","req","Last Name required.");
    frmvalidator.addValidation("last_name","alpha","Last Name contains invalid characters.");
   
    </script>
		
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
