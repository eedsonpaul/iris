
<?php 
  require_once 'library_header.php';
?>



	<div id="navigation">
		
	  <ul>
	  <li><a href="../admin_useraccount.php?editlogin=<?php echo $_SESSION['employee_id'] ?>">Edit Login Details</a></li>
			<li><a href="../admin_useraccount.php?userid=<?php echo $_SESSION['employee_id']?>">Edit Employee Profile</a></li><br>
			<li><a href="libraryAddAccountabilitySearch.php?search_option=&search_query=">Add Accountability</a><br></li>
		</ul>

	
	</div>
	<div id="right_side">
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
		<center><form action="searchLibraryAccountability.php" method="post">
	Enter Last name:<input type="text" name="last_name" />
	<input type="submit" value="Search" />&nbsp;
	</form></center><br>
<?php
	include('connect.php');
	include('libraryClass.php');
	$accountability = new Accountability();
	$accountability->acctg_displayAccountabilities();
?>

</div>

<br>
<br>
</body>
</html>



<?php 
  require_once 'cashier_footer.php';
?>




