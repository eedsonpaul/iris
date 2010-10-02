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
</style>	<title>Clear Accountability</title>
</head>

<body>
<div id="container">
<p><img src="banner.jpg" width="950" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="/iris/admin_transact_user.php?action=Logout"><img src="mblogout.gif" width="120" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="657" height="30"><img src="mb1.4.gif" width="950" height="33"></p>
</div>
<body>

<p>&nbsp;</p>
<center>

<?php
	include('connect.php');
	$id = $_GET['id'];
	$query = "Select student_number from accountability WHERE accountability_id='".$id."';";
	$result = mysql_query($query);
	$student_number = mysql_result($result,0,"student_number");
?>

<html>

	<body>
		<form action="clearScholarship.php" method="post">
		<input type="hidden" name="student_number" value="<?php echo $student_number;?>"/>
		<input type="hidden" name="id" value="<?php echo $id;?>"/>
		<table>
			<tr>
				<td>OR number: </td>
				<td><input type="text" name="or_number"/></td>
			</tr>
			<tr>
				<td>Amount Paid: </td>
				<td><input type="text" name="amount_paid"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
		<table width="62">
		  <tr>
		    <td width="54"><input type="submit" value="Clear" /></td>
	      </tr>
		  </table>
		<table width="59">
		  <tr>
		    <td width="51"><a href="cahierSAM.php"><input type=button value="Cancel"></a></td>
	      </tr>
		  </table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<table>
		  <tr>
		    <td>&nbsp;</td>
	      </tr>
		  </table>
		<p>&nbsp;</p>
        </form>
		
	</body>
</html>