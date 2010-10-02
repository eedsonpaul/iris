<?php
	require_once 'student_header.php';
?>
<!--
<?php

	/*
	require 'dbconnect.php';
	session_start();
	*/
    $student_number = $_SESSION['student_number'];
?>

<html>
<head>
<title>University of the Philippines - Integrated Registration Information System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("default.css");

   body {
	width:102%;
	background-color: #FFF4F4;
	margin-left: 5px;
	margin-top: 5px;
   }
#Layer1 {
	position:absolute;
	width:200px;
	height:auto;
	z-index:1;
	left: 10px;
	top: 250px;
}
.style4 {color: #FF0000}
</style>
</head>

<body>
<div id="container">
<p><img src="images/banner.gif" width="1024" height="163">
<img src="images/mb1.1.jpg" width="140" height="30"><a href="../admin_transact_user.php?action=Logout"><img src="images/mblogout.gif" width="121" height="30" border="0"></a><img src="images/mb1.2.jpg" width="33" height="30"><img src="images/mb1.3.jpg" width="730" height="30"><img src="images/mb1.4.gif" width="1024" height="33"></p>
-->

<div class="main">
<div id="navigation">
<ul>
  <li> <a href="#"> PERSONAL DATA </a>

  	<ul>
  		<ul>
  		  <li><a href="student.php">student profile </a><a href="student_edit_login_account.php">Edit login account</a></li>
        </ul>
  		<li><a href="student_add_editpersonal_data.php">add/edit personal data</a></li>
	  </ul>
	</li>
	
	<li> <a href="#">registration</a>

  	  <ul>
  		<li> <a href="student_View accountabilities.php">View accountabilities </a></li>
  		<li><a href="student_view study plan.php">view study plan </a>
  		  <ul>
  		    <ul>
  		      <li><a href="student_view Grades per semester.php">view Grades per semester </a></li>
	        </ul>
  		  </ul>
  		</li>
	  </ul>
	</li>
	
	<li>
	  <ul>
  		<li><a href="student_confirm subject here.php">edit subject here </a></li>
	  </ul>
	</li>
  </ul>

</div>
<div id="right_side">
  <p>
  <table width="500" class="tablestyle">
  <tr>
    <th width="125">Accountability</th>
    <th width="125">Details</th>
    <th width="125">Amount Due </th>
    <th width="125">Date AY/sem Inccurred </th>
  </tr>
  <?php

	$query = mysql_query("SELECT details,amount_due,year_incurred,semester_incurred,accountability_type_id from accountability where student_number='$student_number'");
	$index=0;	
	while($row = mysql_fetch_array($query)){
			$details[$index] = $row['details'];	
			$amount_due[$index] = $row['amount_due'];
			$year_incurred[$index] = $row['year_incurred'];	
			$semester_incurred[$index] = $row['semester_incurred'];	
			$accountability_type_id[$index] = $row['accountability_type_id'];	
			$index++;
		}
	
		echo "<table>";
		for($i = 0;$i < $index; $i++){
				echo "<tr>";
				echo "<td width='125'>" . checkAccountability($accountability_type_id[$i]) . "</td>";
				echo "<td width='125'>" . $details[$i] . "</td>";
				echo "<td width='125'>" . $amount_due[$i] . "</td>";
				echo "<td width='125'>" . $year_incurred[$i] . "/" . $semester_incurred[$i] . "</td>";
				echo "</tr>";
		}
		echo "</table>";


function checkAccountability($accountability_type_id){
	$query = mysql_query("SELECT accountability_type from accountability_type where accountability_type_id='$accountability_type_id'");
	while($row = mysql_fetch_array($query)){		
			$accountability_type_id = $row['accountability_type'];	
		}
		return $accountability_type_id;
}

?>
	
   <tr>
    <td></td>
	<td></td>
	
 
</table>

  
  
  </p>
  <p>&nbsp;
  </p>
</div>
</div>
</div>

<!--
</body>
</html>
-->

<?php
	require_once 'student_footer.php';
?>