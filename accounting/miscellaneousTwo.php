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
<p><img src="banner.jpg" width="1024" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="index.htm"></a><a href="index.htm"><img src="mblogout.gif" width="121" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="730" height="30"><img src="mb1.4.gif" width="1024" height="33"></p>
</div>
<body>

<p>&nbsp;</p>
<center>

<?php
					include('connect.php');
					
					$student_number = $_GET['student_number'];
					$query_student = "select * from student WHERE student_number = $student_number;";
					$result_student = mysql_query($query_student);
					$stfap_bracket_id = mysql_result($result_student, 0, "stfap_bracket_id");
					$scholarship_id = mysql_result($result_student, 0, "scholarship_id");
					$query_stfap = "select * from stfap where stfap_bracket_id = $stfap_bracket_id;";
					$result_stfap = mysql_query($query_stfap);
					$amount_per_unit = mysql_result($result_stfap, 0, "amount_per_unit");
					
					$query_assessment = "SELECT * FROM assessment_table;";
					$result_assessment = mysql_query($query_assessment);
					
						//student fund start
					$community_chest = mysql_result($result_assessment,0,"community_chest");
					$publication = mysql_result($result_assessment,0,"publication");
					$student_council = mysql_result($result_assessment,0,"student_council");
					
					$community_chest_less_stfap = 0;
					$publication_less_stfap= 0;
					$student_council_less_stfap = 0;
					
					$community_chest_amount_shouldered = 0;
					$publication_amount_shouldered = 0;
					$student_council_amount_shouldered = 0;
					
					$community_chest_total_less = $community_chest_less_stfap + $community_chest_amount_shouldered;
					$publication_total_less= $publication_less_stfap + $publication_amount_shouldered;
					$student_council_total_less = $student_council_less_stfap + $student_council_amount_shouldered;	
					
					$community_chest_to_pay = $community_chest - $community_chest_total_less;
					$publication_to_pay = $publication - $publication_total_less;
					$student_council_to_pay = $student_council - $student_council_total_less;
					//student fund end
					
					$miscellaneous_2 = $community_chest + $publication + $student_council;
					$miscellaneous_2_total = $community_chest + $publication + $student_council;
					$miscellaneous_2_less_stfap = $community_chest_less_stfap + $publication_less_stfap + $student_council_less_stfap;
					$miscellaneous_2_amount_shouldered = $community_chest_amount_shouldered + $publication_amount_shouldered + $student_council_amount_shouldered;
					$miscellaneous_2_total_less = $community_chest_less_stfap + $publication_less_stfap + $student_council_less_stfap + $community_chest_amount_shouldered + $publication_amount_shouldered + $student_council_amount_shouldered;
					$miscellaneous_2_to_pay = $miscellaneous_2 - $miscellaneous_2_total_less;
					$miscellaneous_2_total_to_pay = $miscellaneous_2_total - $miscellaneous_2_total_less;
					
					echo "<h3>Breakdown of Student Fund Payment</h3>";
					echo "<table border=1>";
					echo "<tr>";
					echo "<td><h5>PAYMENT NAME</td>";
					echo "<td><h5>AMOUNT DUE</td>";
					echo "<td><h5>LESS(STFAP)</td>";
					echo "<td><h5>LESS(Scholarship)</td>";
					echo "<td><h5>TOTAL LESS</td>";
					echo "<td><h5>TO PAY</td>";
					
					echo "<tr>";
					echo "<td>Community Chest</td>";
					echo "<td>".$community_chest."</td>";
					echo "<td>".$community_chest_less_stfap."</td><td>".$community_chest_amount_shouldered."</td><td>".$community_chest_total_less."</td>";
					echo "<td>".$community_chest_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Publication</td>";
					echo "<td>".$publication."</td>";
					echo "<td>".$publication_less_stfap."</td><td>".$publication_amount_shouldered."</td><td>".$publication_total_less."</td>";
					echo "<td>".$publication_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Student Council</td>";
					echo "<td>".$student_council."</td>";
					echo "<td>".$student_council_less_stfap."</td><td>".$student_council_amount_shouldered."</td><td>".$student_council_total_less."</td>";
					echo "<td>".$student_council_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Total</td>";
					echo "<td>".$miscellaneous_2_total."</td>";
					echo "<td>".$miscellaneous_2_less_stfap."</td><td>".$miscellaneous_2_amount_shouldered."</td><td>".$miscellaneous_2_total_less."</td>";
					echo "<td>".$miscellaneous_2_total_to_pay."</td></tr>";
					echo "</table>";
					
					echo "<input type=button value=\"Back\" onClick=\"history.go(-1)\">";
					
?>


</center>
</body>
</html>