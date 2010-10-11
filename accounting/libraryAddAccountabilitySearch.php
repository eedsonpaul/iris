<?php 
  require_once 'library_header.php';
?>

<div class="main">
<body>
<br><center><h1>ADD ACCOUNTABILITY</h1></center>
<br><br><br><br>
<center>
<form action="libraryAddAccountabilitySearch.php?search_option=<?php $_GET['search_option'];?>&search_query=<?php $_GET['search_query'];?>" method="get" name="accountingform">
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
		<a href="library.php"><input type=button value="Back"></a>
		</td>
	</tr>
    </table>
	</form>
<?php 
	include('connect.php');
	include('libraryClass.php');
	$accountability = new Accountability();
	$accountability->acctg_addAccountabilitySearch();
?>


<script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("accountingform");
    
    frmvalidator.EnableMsgsTogether();
	
    frmvalidator.addValidation("search_query","req","Missing input.");
    frmvalidator.addValidation("search_query","alnum_s","Input invalid.");


  </script>

</body>
</title>
</div>

<?php 
  require_once 'cashier_footer.php';
?>
