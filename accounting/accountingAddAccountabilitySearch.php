<?php
	session_start();
?>
<center>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Add Accountability</title>
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
p><img src="banner.jpg" width="950" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="/iris/admin_transact_user.php?action=Logout"><img src="mblogout.gif" width="120" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="657" height="30"><img src="mb1.4.gif" width="950" height="33"></p>
</div>
<body>

<center>
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
	
<?php 
	include('connect.php');
	include('accountabilityClass.php');
	$accountability = new Accountability();
	$accountability->acctg_addAccountabilitySearch();
?>
</body>
</title>