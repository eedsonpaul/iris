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
	

	
		<br><br><br><br><br><br><br><br><br><br>
		<form action="accountingAddAccountabilitySearch.php?search_option=<?php $_GET['search_option'];?>&search_query=<?php $_GET['search_query'];?>" method="get">
<table>
	<tr>
		<td>Enter <select name="search_option">
		<option value="last_name"> Last Name</option>
		<option value="student_number">Student Number</option>
		</select>
		</td>
		<td><input type="text" name="search_query">
		</td>
		<td>
		<input type="submit" value="Search" />&nbsp;
		<a href="accountingSAM.php"><input type=button value="Back"></a>
		</td>
	</tr>
    
	</table>
    <br>
    <?php
	include('connect.php');
	include('accountabilityClass.php');
	$accountability = new Accountability();
	$accountability->acctg_addAccountabilitySearch();
	?>

	</div>


<?php 
  require_once 'cashier_footer.php';
?>

