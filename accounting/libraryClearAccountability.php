<?php 
  require_once 'library_header.php';
?>

<div class="main">
<center><h1>CLEAR ACCOUNTABILITY</h1></center>
<body>

<p>&nbsp;</p>
<center>

<?php
	include('connect.php');
	$id = $_GET['id'];
	$query = "Select * from accountability WHERE accountability_id='".$id."';";
	$result = mysql_query($query);
	$student_number = mysql_result($result,0,"student_number");
?>
<html>
	<head><title>Clear Accountability</title></head>
	<body>
		<form action="clearLibraryAccountability.php" method="post">
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
				<td>&nbsp;
				  <a href="library.php"></a>
				</td>
			</tr>
		</table>
		<table width="314">
		  <tr>
		    <td width="68">&nbsp;</td>
		    <td width="90"><input type="submit" value="Clear" /></td>
		    <td width="140"><a href="library.php">
		      <input type=button value="Cancel">
		    </a></td>
	      </tr>
		  </table>
		<p>&nbsp;</p>
        </form>
		
	</body>
</html>

<?php 
  require_once 'cashier_footer.php';
?>






