<?php 
	 require 'dbconnect.php';
	 session_start();
	 $student_number = $_SESSION['student_number'];	 
	
	$academic_year=$_POST['academic_year']; 
	$semester=$_POST['semester']; 
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>University of the Philippines - Integrated Registration Information System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="JavaScript" src="masks.js"></script>

<script language="JavaScript">
	<!--//
	var bShowTests = true;
	var oResults = {
		"browser": {
			"userAgent": navigator.userAgent,
			"appName": navigator.appName,
			"appVersion": navigator.appVersion,
			"appCodeName": navigator.appCodeName
		},
		"string": [],
		"date": [],
		"number": []
	};
	
	function writeOutput(v){
		document.write(v + "<br />");
	}
	
	function updateResults(m, v, e){
		if( m.value != e ){
			var i = oResults[m.type].length;
			oResults[m.type][i] = {
				"supplied": v,
				"value": m.value,
				"expected": e,
				"error": m.error.join("|"),
				"mask": m.mask
			};
		}
	}
	
	function postResults(){
		if( oResults.string.length + oResults.date.length + oResults.number.length == 0 ) return alert("No errors to report!");
		// form object
		var oForm = document.frmReport;
		// create serializer object
		var oSerializer = new WddxSerializer();
		// serialize WDDX packet
		oForm.wddx.value = oSerializer.serialize(oResults);
		oForm.submit();
	}

	function stringTest(v, m, e){
		if( !bShowTests ) return false;
		var oMask = new Mask(m);
		
		writeOutput("<b>mask:</b> "  + m);
		writeOutput("<b>string:</b> " + v);
		var n = oMask.format(v);
		if( e != n ) document.write("<font color=red>");
		writeOutput("<b>result:</b> " + n);
		writeOutput("<b>expected:</b> " + e);
		if( e != n ) document.write("</font>");
		writeOutput("<b>error:</b> " + ((oMask.error.length == 0) ? "n/a" : oMask.error.join("<br>")));
		writeOutput("");
		updateResults(oMask, v, e);
	}

	function numberTest(v, m, e){
		if( !bShowTests ) return false;
		var oMask = new Mask(m, "number");

		writeOutput("<b>mask:</b> "  + m);
		writeOutput("<b>string:</b> " + v);
		var n = oMask.format(v);
		if( e != n ) document.write("<font color=red>");
		writeOutput("<b>result:</b> " + n);
		writeOutput("<b>expected:</b> " + e);
		if( e != n ) document.write("</font>");
		writeOutput("<b>error:</b> " + ((oMask.error.length == 0) ? "n/a" : oMask.error.join("<br>")));
		writeOutput("");
		updateResults(oMask, v, e);
	}

	function dateTest(v, m, e){
		if( !bShowTests ) return false;
		var oMask = new Mask(m, "date");

		writeOutput("<b>mask:</b> "  + m);
		writeOutput("<b>string:</b> " + v);
		var n = oMask.format(v);
		if( e != n ) document.write("<font color=red>");
		writeOutput("<b>result:</b> " + n);
		writeOutput("<b>expected:</b> " + e);
		if( e != n ) document.write("</font>");
		writeOutput("<b>error:</b> " + ((oMask.error.length == 0) ? "n/a" : oMask.error.join("<br>")));
		writeOutput("");
		updateResults(oMask, v, e);
	}

	function init(){
		document.form1.reset();

		oStringMask = new Mask("#########");
		oStringMask.attach(document.form1.personalincome);
		
		oStringMask = new Mask("#########");
		oStringMask.attach(document.form1.familyincome);
		
		oStringMask = new Mask("####-##-##");
		oStringMask.attach(document.form1.birthdate);
	}
	//-->
	</script>
<style type="text/css">
@import url("nohover.css");


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
<p><img src="images/banner.gif" width="1024" height="163">
<img src="images/mb1.1.jpg" width="140" height="30"><a href="index.htm"></a><a href="index.htm"><img src="images/mblogout.gif" width="121" height="30" border="0"></a><img src="images/mb1.2.jpg" width="33" height="30"><img src="images/mb1.3.jpg" width="730" height="30"><img src="images/mb1.4.gif" width="1024" height="33"></p>



<div id="contentcolumn1">
<?php
	 $res=mysql_query("SELECT student_number,first_name,middle_name,last_name,degree_program,year_level,
	 stfap_bracket_id,scholarship_id from student where student_number=$student_number");
	 
	 while($row = mysql_fetch_array($res)){		
		echo "Student ID:".$row['student_number'];
		echo "<br>Name:".$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
		echo "<br>Degree Program:".$row['degree_program'];
		echo "<br>Year Level:".$row['year_level'];
		echo "<br>STFAP Bracket:".$row['stfap_bracket_id'];
		echo "<br>Scholarship:".$row['scholarship_id'];
		
		$id = $row['student_number'];
		$name = $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			
	 }
  ?>
  
  <p>
  <form name="form1" method="post" action="student_update_enrollment_data.php?academic_year='.$academic_year.'&semester='.$semester.'">
  <table width="1150" class="tablestyle">
  <tr>
    <th width="300">STUDENT NUMBER<BR><?php echo $id ?> </th>

    <th width="300">NAME(Last,Given,Middle)<br><?php echo $name ?></th>
    <th width="90">COLLEGE<br>UPVCC</th>
    <th width="210">DEGREE<br>B.S. COMPUTER SCIENCE</th>
    <th width="150">TERM/AY<br><?php echo $semester." ".$academic_year ?></th>
  </tr>
  

  <tr >
    <td colspan="1.5">

	<p align="left"><strong>STUDENT TYPE *</strong><br>
	<input type="radio" name="student-type" value="A" />Cross-registrant(from a non-UP unit)<br>
	<input type="radio" name="student-type" value="B" />Cross-registrant(from UP unit)<br>
	<input type="radio" name="student-type" value="C" />Non-degree<br>
	<input type="radio" name="student-type" value="D" />Regular<br>
	<input type="radio" name="student-type" value="E" />Shiftee<br>
	<input type="radio" name="student-type" value="F" />Special<br>
	<input type="radio" name="student-type" value="G" />Transferee<br> 
	
	<br><strong>GRADUATING THIS TERM? *</strong><br>
	<input type="radio" name="graduating" value="yes" />Yes<br>
	<input type="radio" name="graduating" value="no" />No<br>
	
	<br>EMPLOYED? *<br>
	<input type="radio" name="employed" value="full-time" />Full-time
	<input type="radio" name="employed" value="part-time" />Part-time
	<input type="radio" name="employed" value="no" />No<br>
	
	<br>EMPLOYER INFORMATION:<br>
	Name: <input type="text" name="employer" /><br><br>
	Address: <input type="text" name="employer-address" /><br><br>
	Zipcode: <input type="text" name="employer-zipcode" /><br><br>
	Phone#: <input type="text" name="employer-phonenum" /><br><br>
	</p>

	</td>
	 <td colspan="2">

	<p align="left"><strong>REGISTRATION STATUS *</strong><br>
	<input type="radio" name="reg-status" value="A" />Continuing<br>
	<input type="radio" name="reg-status" value="B" />New Cross Registrant/non-degree<br>
	<input type="radio" name="reg-status" value="C" />New Doctornal<br>
	<input type="radio" name="reg-status" value="D" />New Freshman(including Cert/Dip)<br>
	<input type="radio" name="reg-status" value="E" />New Master's(including Grad Cert/Dip)<br>
	<input type="radio" name="reg-status" value="F" />New Transfer(from a non-UP unit)<br>
	<input type="radio" name="reg-status" value="G" />New Transfer(from UP unit)<br>
	<input type="radio" name="reg-status" value="H" />Old Returning<br>	
	
	<br><strong>FOREIGN STUDENT? *</strong><br>
	<input type="radio" name="foreign" value="yes" />Yes<br>
	<input type="radio" name="foreign" value="no" />No<br>
	
	<br><strong>COUNTRY OF CITIZENSHIP *</strong><br>
	<input type="radio" name="country" value="philippines" />Philippines<br>
	<input type="radio" name="country" value="usa" />USA<br>
	<input type="radio" name="country" value="dual" />Philippines and USA (dual)<br>
	<input type="radio" name="country" value="others" />Other..specify full country name: <input type="text" name="country?" /><br>
	
	<br><strong>RESIDENT OF PHILIPPINES? *</strong><br>
	<input type="radio" name="resident" value="yes" />Yes<br>
	<input type="radio" name="resident" value="no" />No<br>
	<br><br>
	</p>

	</td>
	
	<td colspan="0">

	<p align="left">
	<br>MAJOR<br><input type="text" name="major" /><br>
	<br>MINOR<br><input type="text" name="minor" /><br></strong>
	<br>YEAR LEVEL *<br>
	<input type="radio" name="year-level" value="first" />1st<br>
	<input type="radio" name="year-level" value="second" />2nd<br>
	<input type="radio" name="year-level" value="third" />3rd<br>
	<input type="radio" name="year-level" value="fourth" />4th<br>
	
	<br>DEGREE LEVEL *<br>
	<input type="radio" name="degree-level" value="undergrad" />Undergraduate<br>
	<input type="radio" name="degree-level" value="grad" />Graduate<br>
	
	<br>ANNUAL FAMILY GROSS INCOME *<br>
	PhP: <input type="text" name="familyincome" value="0"/>
	<br>ANNUAL PERSONAL GROSS INCOME *<br>
	PhP: <input type="text" name="personalincome" value="0"/>
	<br><br>
	</p>
	</td>
	
	<td colspan="1">
	<p align="left">
	<br>SEX *<br>
	<input type="radio" name="sex" value="female" />Female<br>
	<input type="radio" name="sex" value="male" />Male<br>
	
	<br>CIVIL STATUS *<br>
	<input type="radio" name="civilstat" value="separated" />Separated<br>
	<input type="radio" name="civilstat" value="divorced" />Divorced<br>
	<input type="radio" name="civilstat" value="married" />Married<br>
	<input type="radio" name="civilstat" value="single" />Single<br>
	<input type="radio" name="civilstat" value="widow" />Widow<br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>   
	</p>
	</td>
  </tr>
  <tr>
    <td colspan="1">
	<p align="left"><strong>ADDITIONAL INFORMATION </strong><br>
	Birthdate: *<input type="text" name="birthdate" /><br> (yyyy-mm-dd)<br>
	Birth Place: * <input type="text" name="birthplace" /><br> <br>
	Email Address: * <input type="text" name="emailadd" /><br><br>
	</p>
	</td>
    <td>
	<p align="left"><strong>STUDENT'S ADDRESS WHILE STUDYING AT UPV: </strong><br>
	Housing Type: *<select name="semester">
		 <option>Apartment</option>
		 <option>Dorm</option>
		 <option>Condo</option>
      </select><br>
	<input type="checkbox" name="sameaddress[]"/>..Check this if present address below is the same as your
	home/provincial address<br>
	House #:: <input type="text" name="housenum" /><br />
	Street: <input type="text" name="street" /><br />
	Barangay/Subdivision: * <input type="text" name="barangay" /><br><br>
	City/Municipality: * <select name="city">
		 <option>Cebu City</option>
		 <option>Mandaue City</option>
		 <option>Consolaction</option>
		 <option>Lapu-lapu</option>
		 <option>Liloan</option>
		 <option>Talisay</option>
      </select><br>
	Landline/Mobile Phone #: <input type="text" name="number" /><br><br>
	</td>
  </tr>
    	
</table>


	I hereby certify that all the information given in this form are true and correct. In consideration of my admission to the UNIVERSITY OF THE PHILIPPINES and of the privileges of a student in this institution, I hereby promise and pledge to abide by and comply with all the rules and regulations laid down by competent authority in the University and in the College in which I am enrolled.

Save to Database and proceed to the next page
  <input type="submit" name="continue" value="Continue">
</form>

<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("form1");
    
  frmvalidator.EnableMsgsTogether();

  frmvalidator.addValidation("student-type", "selone_radio");
  frmvalidator.addValidation("graduating", "selone_radio");
  frmvalidator.addValidation("reg-status", "selone_radio");
  frmvalidator.addValidation("employed", "selone_radio");
  frmvalidator.addValidation("foreign", "selone_radio");
  frmvalidator.addValidation("country", "selone_radio");
  frmvalidator.addValidation("resident", "selone_radio");
  frmvalidator.addValidation("year-level", "selone_radio");
  frmvalidator.addValidation("degree-level", "selone_radio");
  frmvalidator.addValidation("sex", "selone_radio");
  frmvalidator.addValidation("civilstat", "selone_radio");
  
  frmvalidator.addValidation("birthdate","req","Please input birthdate.");  
  frmvalidator.addValidation("birthplace","req","Please input birthplace.");
  
  frmvalidator.addValidation("emailadd", "req", "Input Email.");
  frmvalidator.addValidation("emailadd","email");
  
  
</script>
  


  
  
   </p>
  <p>&nbsp;
  </p>
</div>
</div>
</body>
</html>
