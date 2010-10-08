<?php 
  require_once 'accounting_header.php';
  include('connect.php');
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
    <br><br><br><br><br><br><br><br><br>
<body>
<p>&nbsp;</p>

<?php
	include('connect.php');
	$id = $_GET['id'];
	$query = "Select * from accountability WHERE accountability_id='".$id."';";
	$result = mysql_query($query);
	
	$student_number = mysql_result($result,0,"student_number");
    $year_incurred = mysql_result($result,0,"year_incurred");
    $semester_incurred = mysql_result($result,0,"semester_incurred");
	$details = mysql_result($result,0,"details");
	$date_added = mysql_result($result,0,"date_added");
    $amount_due = mysql_result($result,0,"amount_due");
	//$id = mysql_result($result,0,"accountability_type_id");

?>

<html>
<head>
	<title>Edit Accountability</title>
</head>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta name="Content-Script-Type" content="text/javascript"> 
<form action="editAccountability.php?id=<?php echo $id;?>" method="post" name="accoutingform">
	<input type="hidden" name="accountability_id" value="<?php echo $id; ?>"/>
<table>
	<tr>
		<td>Student Number:</td>
		<td><input type="text" name="student_number" onFocus="this.blur()" readonly value="<?php echo $student_number; ?>">
		</td>
	</tr>
	<tr>
		<td>Accountability:</td>
		<td>
		<select name="accountability_type">
		<option value="1"> Scholarship</option>
		<option value="3">  Underassessment/ Lab Fees</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>Accountability Details:</td>
		<td><input type="text" name="details" value="<?php echo $details; ?>"> </td>
	</tr>
	<tr>
		<td>Amount Due:</td>
		<td><input type="text" name="amount_due" value="<?php echo $amount_due; ?>" ></td>
	</tr>
	<tr>
		<td>Academic Year Incurred:</td>
		<td>
		<select name="year_incurred">
		<?php
		if($year_incurred==2009){
			echo "<option value=\"2009\">2009-2010</option>";
			echo "<option value=\"2010\">2010-2011</option>";
		}
		else if($year_incurred == 2010){
			echo "<option value=\"2010\">2010-2011</option>";
			echo "<option value=\"2009\">2009-2010</option>";
		}
		?>
		</select>
		</td>
	</tr>
	<tr>
		<td>Semester Incurred:</td>
		<td>
		<select name="semester_incurred">
		<?php
		if($semester_incurred == 1){
			echo	"<option value=\"1\">first semester</option>";
			echo	"<option value=\"2\">second semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 2){
			echo	"<option value=\"2\">second semester</option>";
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 3){
			echo "<option value=\"3\">first trimester</option>";
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"2\">second semester</option>";
			echo "<option value=\"4\">second trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 4){
			echo "<option value=\"4\">second trimester</option>";
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"2\">second semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"5\">third trimester</option>";
		}
		if($semester_incurred == 5){
			echo "<option value=\"5\">third trimester</option>";
			echo	"<option value=\"1\">first semester</option>";
			echo "<option value=\"2\">second semester</option>";
			echo "<option value=\"3\">first trimester</option>";
			echo "<option value=\"4\">second trimester</option>";
		}
		?>
		</select>
		</td>
	</tr>
	<tr>
		<td>
		<input type="submit" value="Save" />&nbsp;
		<a href="accountingSAM.php"><input type=button value="Back"></a>
		</td>
	</tr>
	</table>
</form>

<script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("accountingform");
    
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("details","req","Account Details required.");
    frmvalidator.addValidation("amount_due","req","Amount Due required.");
   
    </script>

</body>
</html>
<option id="<?php $returned_value; ?>" select><?php $returned_value; ?></option></select>	
	</div>	
<?php 
  require_once 'cashier_footer.php';
?>