<?php
	session_start();
?>
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
p><img src="banner.jpg" width="950" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="/iris/admin_transact_user.php?action=Logout"><img src="mblogout.gif" width="120" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="657" height="30"><img src="mb1.4.gif" width="950" height="33"></p>
</div>
<body>
<br>
<br>
<br>
<br>
<br>
<center>

<form action="generateCashReport.php" method="post">
	<table>
		<tr>
			<td>Select Academic Year:</td>
			<td><select name="academic_year">
				<option value="2010"> 2010-2011</option>
				<option value="2011"> 2011-2012</option>
				</select>
			</td>
		</tr>
        <tr>
			<td>Select Semester:</td>
			<td><select name="semester">
				<option value="1"> 1st Semester</option>
				<option value="2"> 2nd Semester</option>
                <option value="3"> 1st Trimester</option>
                <option value="4"> 2nd Trimester</option>
                <option value="5"> 3rd Trimester</option>
				</select>
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<table width="288">
	  <tr>
	    <td width="54">&nbsp;</td>
	    <td width="104"><input type="submit" value="Proceed" /></td>
	    <td width="55"><a href="accounting.php"><input type="submit" value='Back'></a></td>
	    <td width="55">&nbsp;</td>
      </tr>
  </table>
	<p>&nbsp;</p>
</form>
</body>
</html>

