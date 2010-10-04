
<?php
	require_once 'student_header.php';
?>

<?php 

	 $student_number = $_SESSION['student_number'];	 
	
	$academic_year=$_POST['academic_year']; 
	$semester=$_POST['semester']; 
?>



<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="JavaScript" src="masks.js"></script>

<script language="JavaScript">

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
	
	</script>

<div class = "main">

<div id="right_side2">
<?php
	 $res=mysql_query("SELECT student_number,first_name,middle_name,last_name,degree_program,year_level,
	 stfap_bracket_id,scholarship_id from student where student_number=$student_number");
	 
	 while($row = mysql_fetch_array($res)){		
		$id = $row['student_number'];
		$name = $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			
	 }
  ?>
  
  <p>
  <form name="form1" method="post" action="student_update_enrollment_data.php?academic_year='.$academic_year.'&semester='.$semester.'">
  <table width="900" class="tablestyle">
  
  <tr>
    <th width="20%">STUDENT NUMBER<BR><?php echo $id ?> </th>
    <th width="20%">NAME(Last,Given,Middle)<br><?php echo $name ?></th>
    <th width="20%">COLLEGE<br>UPVCC</th>
    <th width="20%">DEGREE<br>B.S. COMPUTER SCIENCE</th>
    <th width="20%">TERM/AY<br><?php echo $semester." ".$academic_year ?></th>
  </tr>
  <tr>
    <td class="nohover" width="33%">
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
	Name:    <br><input type="text" name="employer" /><br>
	Address: <br><input type="text" name="employer-address" /><br>
	Zipcode: <br><input type="text" name="employer-zipcode" /><br>
	Phone#: <br><input type="text" name="employer-phonenum" /><br>
	
	</td>
	 <td class="nohover" width="33%">
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
	<input type="radio" name="country" value="others" />Other..specify full country name: <br><input type="text" name="country?" /><br>
	
	<br><strong>RESIDENT OF PHILIPPINES? *</strong><br>
	<input type="radio" name="resident" value="yes" />Yes<br>
	<input type="radio" name="resident" value="no" />No<br>
	<br>
	</td>
	<td class="nohover" width = "33%">
	<p align="left">
	<br>MAJOR &nbsp; &nbsp;<input type="text" name="major" size="10" /><br>
	<br>MINOR &nbsp; &nbsp; <input type="text" name="minor" size="10" /><br></strong>
	<br>DEGREE LEVEL *<br>
	<input type="radio" name="degree-level" value="undergrad" />Undergraduate<br>
	<input type="radio" name="degree-level" value="grad" />Graduate<br>
	
	<br>ANNUAL FAMILY GROSS INCOME *<br>
	PhP: <input type="text" name="familyincome" value="0"/>
	<br>ANNUAL PERSONAL GROSS INCOME *<br>
	PhP: <input type="text" name="personalincome" value="0"/>
	<br><br>
	<p align="left"><strong>ADDITIONAL INFORMATION </strong><br>
	Birthdate:(yyyy-mm-dd)*<input type="text" name="birthdate" /><br>
	Birth Place: * <br><input type="text" name="birthplace" /><br> 
	Email Address: *<br> <input type="text" name="emailadd" /><br><br><br><br><br><br><br>
	</td>
	
	<td class="nohover">
	<p align="left">	
	YEAR LEVEL *<br>
	<input type="radio" name="year-level" value="first" />1st<br>
	<input type="radio" name="year-level" value="second" />2nd<br>
	<input type="radio" name="year-level" value="third" />3rd<br>
	<input type="radio" name="year-level" value="fourth" />4th<br>
	<br>SEX *<br>
	<input type="radio" name="sex" value="female" />Female<br>
	<input type="radio" name="sex" value="male" />Male<br>
	
	<br>CIVIL STATUS *<br>
	<input type="radio" name="civilstat" value="separated" />Separated<br>
	<input type="radio" name="civilstat" value="divorced" />Divorced<br>
	<input type="radio" name="civilstat" value="married" />Married<br>
	<input type="radio" name="civilstat" value="single" />Single<br>
	<input type="radio" name="civilstat" value="widow" />Widow<br>
	<br><br><br><br><br><br><br><br><br>
	</p>
	</td>
  </tr>
  <tr>
    <td class="nohover"> 
	<p align="left"><strong>PARENTS AND CONTACT PERSON DATA </strong><br>
	Parents:<br> 
	 &nbsp; &nbsp;Father:<br> &nbsp; &nbsp;<input type="text" name="father_name" /><br>
	 &nbsp; &nbsp;Mother: <br> &nbsp; &nbsp;<input type="text" name="mother_name" /><br> <br>

	CURRENT GUARDIAN:<br>
	 &nbsp; &nbsp;Name:* <br> &nbsp; &nbsp;<input type="text" name="guardian" /><br>
	ADDRESS:<br>
	&nbsp; &nbsp;House#:*<br>&nbsp; &nbsp;<input type="text" name="guardian_house_number" /><br>
	&nbsp; &nbsp;Street:*<br>&nbsp; &nbsp;<input type="text" name="guardian_street" /><br>
	&nbsp; &nbsp;Barangay:*<br>&nbsp; &nbsp;<input type="text" name="guardian_barangay" /><br>
	&nbsp; &nbsp;City/Municipality:*<br>&nbsp; &nbsp;
			<input type="text" name="guardian_city_municipality" /><br>
	&nbsp; &nbsp;Landline/Mobile Phone #:*<br>
				&nbsp; &nbsp;
				<input type="text" name="guardian_contact_number" /><br><br>
	</td>
    <td class="nohover">
	<p align="left"><strong>STUDENT'S ADDRESS WHILE STUDYING AT UPV: </strong><br>
	Housing Type: *<br><select name="semester">
		 <option>Apartment</option>
		 <option>Dorm</option>
		 <option>Condo</option>
      </select><br>
	<input type="checkbox" name="sameaddress[]"/>..Check this if present address below is the same as your
	home/provincial address<br>
	House #: <br />
			<input type="text" name="housenum" /><br />
	Street:  <br />
			 <input type="text" name="street" /><br />
	Barangay/Subdivision:* 
			
			<input type="text" name="barangay" /><br>
	City/Municipality: * <br><select name="city">
		 <option>Cebu City</option>
		 <option>Mandaue City</option>
		 <option>Consolaction</option>
		 <option>Lapu-lapu</option>
		 <option>Liloan</option>
		 <option>Talisay</option>
      </select><br>
	Landline/Mobile Phone #:<br> <input type="text" name="number" /><br><br>
	</td>
	</td>
	<td class="nohover" colspan="1">
	<p align="left">
	WHERE TO SEND DOCUMENTS/TO CONTACT IN CASE OF EMERGENCY<br>
	(Put your mother,father,spouse or guardian's name and address here)<br><br>
	Recepient's Name:*<br><input type="text" name="recipient_name" /><br>
	Street/Subdivision/Barangay/Village:*<input type="text" name="recipient_street" /><br>
	City/Municipality/Province/Country:*<input type="text" name="recipient_city" /><br>
	Zipcode:*<br><input type="text" name="recipient_zipcode" /><br>
	Phone #:*<br><input type="text" name="recipient_phone" /><br>
	</p>
	</td>
  </tr> 	
</table>
<p align="center">	I hereby certify that all the information given in this form are true and correct. In consideration of my admission to the UNIVERSITY OF THE PHILIPPINES and of the privileges of a student in this institution, I hereby promise and pledge to abide by and comply with all the rules and regulations laid down by competent authority in the University and in the College in which I am enrolled.

Save to Database and proceed to the next page<br>
</p>
  <p align="left"><input type="submit" name="update" value="SAVE TO DATABASE">

</form>   
<form name="form1" method="post" action="student_add_editpersonal_data.php">
<input type="submit" name="back" value="BACK">
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




