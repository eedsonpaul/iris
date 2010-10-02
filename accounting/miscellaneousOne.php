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
					
					//miscellaneous start
					$athletics = 55;
					$cultural = 50;
					$energy = 250;
					$internet = 260;
					$library = 700;
					$medical = 50;
					$registration = 40;
					
					$athletics_less_stfap = 0;
					$cultural_less_stfap = 0;
					$energy_less_stfap = 0;
					$internet_less_stfap = 0;
					$library_less_stfap = 0;
					$medical_less_stfap = 0;
					$registration_less_stfap = 0;
					
					if($stfap_bracket_id == 6){
						$athletics_less_stfap = 55;
						$cultural_less_stfap = 50;
						$energy_less_stfap = 250;
						$internet_less_stfap = 260;
						$library_less_stfap = 700;
						$medical_less_stfap = 50;
						$registration_less_stfap = 40;
					}
					
					$athletics_amount_shouldered = 0;
					$cultural_amount_shouldered = 0;
					$energy_amount_shouldered = 0;
					$internet_amount_shouldered = 0;
					$library_amount_shouldered = 0;
					$medical_amount_shouldered = 0;
					$registration_amount_shouldered = 0;
					
					$athletics_total_less = $athletics_less_stfap + $athletics_amount_shouldered;
					$cultural_total_less = $cultural_less_stfap + $cultural_amount_shouldered;
					$energy_total_less = $energy_less_stfap + $energy_amount_shouldered;
					$internet_total_less = $internet_less_stfap + $internet_amount_shouldered;
					$library_total_less = $library_less_stfap + $library_amount_shouldered;
					$medical_total_less = $medical_less_stfap + $medical_amount_shouldered;
					$registration_total_less = $registration_less_stfap + $registration_amount_shouldered;
					
					
					
					$athletics_to_pay = $athletics - $athletics_total_less;
					$cultural_to_pay = $cultural - $cultural_total_less;
					$energy_to_pay = $energy - $energy_total_less;
					$internet_to_pay = $internet - $internet_total_less;
					$library_to_pay= $library - $library_total_less;
					$medical_to_pay = $medical - $medical_total_less;
					$registration_to_pay = $registration - $registration_total_less;
					
					$miscellaneous_1_total = $athletics_to_pay + $cultural_to_pay + $energy_to_pay + $internet_to_pay + $library_to_pay + $medical_to_pay + $registration_to_pay;
					$miscellaneous_1_less_stfap = $athletics_less_stfap + $cultural_less_stfap + $energy_less_stfap + $internet_less_stfap	+ $library_less_stfap + $medical_less_stfap + $registration_less_stfap;
					$miscellaneous_1_amount_shouldered = $athletics_amount_shouldered + $cultural_amount_shouldered + $energy_amount_shouldered + $internet_amount_shouldered + $library_amount_shouldered + $medical_amount_shouldered + $registration_amount_shouldered;
					$miscellaneous_1_total_less = $miscellaneous_1_less_stfap + $miscellaneous_1_amount_shouldered;
					$miscellaneous_1_total_to_pay = $miscellaneous_1_total - $miscellaneous_1_total_less;
					//miscellaneous end
					
					echo "<h3>Breakdown of Miscellaneous Payment</h3>";
					echo "<table border=1>";
					echo "<tr>";
					echo "<td><h5>PAYMENT NAME</td>";
					echo "<td><h5>AMOUNT DUE</td>";
					echo "<td><h5>LESS(STFAP)</td>";
					echo "<td><h5>LESS(Scholarship)</td>";
					echo "<td><h5>TOTAL LESS</td>";
					echo "<td><h5>TO PAY</td>";
					
					echo "<tr>";
					echo "<td>Atheltics</td>";
					echo "<td>".$athletics."</td>";
					echo "<td>".$athletics_less_stfap."</td><td>".$athletics_amount_shouldered."</td><td>".$athletics_total_less."</td>";
					echo "<td>".$athletics_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Cultural</td>";
					echo "<td>".$cultural."</td>";
					echo "<td>".$cultural_less_stfap."</td><td>".$cultural_amount_shouldered."</td><td>".$cultural_total_less."</td>";
					echo "<td>".$cultural_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Energy</td>";
					echo "<td>".$energy."</td>";
					echo "<td>".$energy_less_stfap."</td><td>".$energy_amount_shouldered."</td><td>".$energy_total_less."</td>";
					echo "<td>".$energy_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Internet</td>";
					echo "<td>".$internet."</td>";
					echo "<td>".$internet_less_stfap."</td><td>".$internet_amount_shouldered."</td><td>".$internet_total_less."</td>";
					echo "<td>".$internet_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Library</td>";
					echo "<td>".$library."</td>";
					echo "<td>".$library_less_stfap."</td><td>".$library_amount_shouldered."</td><td>".$library_total_less."</td>";
					echo "<td>".$library_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Medical</td>";
					echo "<td>".$medical."</td>";
					echo "<td>".$medical_less_stfap."</td><td>".$medical_amount_shouldered."</td><td>".$medical_total_less."</td>";
					echo "<td>".$medical_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Registration</td>";
					echo "<td>".$registration."</td>";
					echo "<td>".$registration_less_stfap."</td><td>".$registration_amount_shouldered."</td><td>".$registration_total_less."</td>";
					echo "<td>".$registration_to_pay."</td></tr>";
					
					echo "<tr>";
					echo "<td>Total</td>";
					echo "<td>".$miscellaneous_1_total."</td>";
					echo "<td>".$miscellaneous_1_less_stfap."</td><td>".$miscellaneous_1_amount_shouldered."</td><td>".$miscellaneous_1_total_less."</td>";
					echo "<td>".$miscellaneous_1_total_to_pay."</td></tr>";
					echo "</table>";
					
					echo "<input type=button value=\"Back\" onClick=\"history.go(-1)\">";
?>
</center>
</body>
</html>