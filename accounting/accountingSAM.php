<?php 
  require_once 'accounting_header.php';
?>
<?php
	//session_start();
?>

<!--
<center>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Welcome to UP Cebu IRIS!</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<style type="text/css">
@import url("default.css");

   body {
	width:102%;
	background-color: #FFF4F4;
	margin-left: 0px;
	margin-top: 0px;
   }
#Layer1 {
	position:absolute;
	width:200px;
	height:auto;
	z-index:1;
	left: 10px;
	top: 250px;
}
</style>
</head>

<body>
<div id="container">
<p><img src="banner.jpg" width="950" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="/iris/admin_transact_user.php?action=Logout"><img src="mblogout.gif" width="120" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="657" height="30"><img src="mb1.4.gif" width="950" height="33"></p>
-->

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
