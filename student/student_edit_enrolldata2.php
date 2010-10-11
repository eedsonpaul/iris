 
<?php
	require_once 'student_header.php';
	require_once 'query_student.php';
?>

<?php 
	$student_number = $_SESSION['student_number'];	 
//		$academic_year=$_POST['academic_year']; 
//	$semester=$_POST['semester']; 
?>
<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="JavaScript" src="masks.js"></script>

<script language="JavaScript">
	
	function init(){
		document.form2.reset();
		
		oStringMask = new Mask("##########");

		oStringMask.attach(document.form2.guardian_house_number);
		oStringMask.attach(document.form2.guardian_contact_number);
		oStringMask.attach(document.form2.number);
		oStringMask.attach(document.form2.housenum);
		oStringMask.attach(document.form2.recipient_phone);

		oStringMask = new Mask("#####");
		oStringMask.attach(document.form2.recipient_zipcode);

	}
	
</script>

 <div class = "main">

<div id="right_side2">
 
 <form name="form2" method="post" action="student_update_enrolldata2.php">
   <table width="900" class="tablestyle">
  
  <tr>
    <th width='250' colspan="2">STUDENT NUMBER<BR><?php echo $student_number ?> </th>
    <th width='240' colspan="2">NAME(Last,Given,Middle)<br><?php echo getFirstName($student_number) . " " . getMiddleName($student_number)  . " " . getLastName($student_number)?></th>
    <th width='200'>COLLEGE<br>UPCC</th>
    <th width='200'>DEGREE<br><?php echo getDegreeProgram($student_number) ?></th>

  </tr>
  

 <tr>
    <td class="nohover" colspan="2" width="33%"> 
	<p align="left"><strong>PARENTS AND CONTACT PERSON DATA </strong><br>
	Parents:<br> 
	 &nbsp; &nbsp;Father:<br> &nbsp; &nbsp;<input type="text" name="father_name"  value = <?php echo getFatherName($student_number) ?> ><br>
	 &nbsp; &nbsp;Mother: <br> &nbsp; &nbsp;<input type="text" name="mother_name"  value = <?php echo getFatherName($student_number) ?> ><br> <br>

	CURRENT GUARDIAN:<br>
	 &nbsp; &nbsp;Name:* <br> &nbsp; &nbsp;<input type="text" name="guardian"  value = <?php echo getGuardian($student_number) ?>><br>
	ADDRESS:<br>
	&nbsp; &nbsp;House#:*<br>&nbsp; &nbsp;<input type="text" name="guardian_house_number" value = <?php echo getGuardianHouseNum($student_number) ?>><br>
	&nbsp; &nbsp;Street:*<br>&nbsp; &nbsp;<input type="text" name="guardian_street"  value = <?php echo getGuardianStreet($student_number) ?>><br>
	&nbsp; &nbsp;Barangay:*<br>&nbsp; &nbsp;<input type="text" name="guardian_barangay"  value = <?php echo getGuardianBarangay($student_number) ?> ><br>
	&nbsp; &nbsp;City/Municipality:*<br>&nbsp; &nbsp;
			<input type="text" name="guardian_city_municipality" value =<?php echo getGuardianCityMunicipality($student_number) ?> ><br>
	&nbsp; &nbsp;Province:*<br>&nbsp; &nbsp;
			<input type="text" name="guardian_province" value =<?php echo getGuardianProvince($student_number) ?> ><br>
	&nbsp; &nbsp;Landline/Mobile Phone #:*<br>
				&nbsp; &nbsp;
				<input type="text" name="guardian_contact_number" value = <?php echo getGuardianContactNum($student_number) ?> ><br><br>
	</td>
    <td class="nohover" colspan="2" width="33%">
	<p align="left"><strong>STUDENT'S ADDRESS WHILE STUDYING AT UPV: </strong><br>
	Housing Type: *<br><select name="house_type">
		 <option>Apartment</option>
		 <option>Dorm</option>
		 <option>Condo</option>
      </select><br>
	Is this present address below same as your home/provincial address?<br>
	<input type="radio" name="sameaddress" value="yes" checked >Yes  
	<input type="radio" name="sameaddress" value="no">No<br>
	House #: <br>
			<input type="text" name="housenum"  value = <?php echo getPresentHomeNum($student_number) ?> ><br>
	Street:  <br>
			 <input type="text" name="street"  value = <?php echo getPresentStreet($student_number) ?> ><br>
	Barangay/Subdivision:* 
			<input type="text" name="barangay"  value = <?php echo getPresentBarangay($student_number) ?> ><br>
	City/Municipality:* 
			<input type="text" name="city"  value = <?php echo getPresentCityMunicipality($student_number) ?> ><br>
	Province:* 
			<input type="text" name="province"  value = <?php echo getPresentProvince($student_number) ?> ><br>
	Landline/Mobile Phone #:<br> <input type="text" name="number"  value = <?php echo getPresentContactNum($student_number) ?>><br><br>
	</td>
	</td>
	<td class="nohover" colspan="2" width="33%">
	<p align="left">
	WHERE TO SEND DOCUMENTS/TO CONTACT IN CASE OF EMERGENCY<br>
	(Put your mother,father,spouse or guardian's name and address here)<br><br>
	Recipient's Name:*<br><input type="text" name="recipient_name" value = <?php echo getRecipientName($student_number) ?> ><br>
	Street/Subdivision/Barangay/Village:*<input type="text" name="recipient_street" value = <?php echo getRecipientStreet($student_number) ?> ><br>
	City/Municipality/Province/Country:*<input type="text" name="recipient_city" value = <?php echo getRecipientCity($student_number) ?> ><br>
	Zipcode:*<br><input type="text" name="recipient_zipcode" value = <?php echo getRecipientZipcode($student_number) ?> ><br>
	Phone #:*<br><input type="text" name="recipient_phone" value = <?php echo getRecipientPhone($student_number) ?> ><br>
	</p>
	</td>
  </tr> 	
  </table>
  <p align="center">	I hereby certify that all the information given in this form are true and correct. In consideration of my admission to the UNIVERSITY OF THE PHILIPPINES and of the privileges of a student in this institution, I hereby promise and pledge to abide by and comply with all the rules and regulations laid down by competent authority in the University and in the College in which I am enrolled.

Save to Database and proceed to the next page<br>
</p>
  <p align="left">
  <input type="submit" name="update" value="SAVE TO DATABASE">
</form>   
 <form name="form3" method="post" action="student_edit_enrolldata1.php">
<input type="submit" name="back"  value="BACK">
</form>

<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("form2");
    
  frmvalidator.EnableMsgsTogether();
  
  frmvalidator.addValidation("guardian","req","Please input Guardian's Name.");  
  frmvalidator.addValidation("guardian","alpha","Guardian's Name: Alpha only.");
  frmvalidator.addValidation("guardian_house_number","req","Please input Guardian's House Number.");  
  frmvalidator.addValidation("guardian_street","req","Please input Guardian's Street.");  
  frmvalidator.addValidation("guardian_barangay","req","Please input Guardian's Barangay.");  
  frmvalidator.addValidation("guardian_city_municipality","req","Please input Guardian's City/Municipality.");  
  frmvalidator.addValidation("guardian_province","req","Please input Guardian's Province.");  
  frmvalidator.addValidation("guardian_contact_number","req","Please input Guardian's contact number.");
  frmvalidator.addValidation("recipient_name","req","Please input Recipient's Name.");
  frmvalidator.addValidation("housenum","req","Please input present house #.");
  frmvalidator.addValidation("street","req","Please input present street.");
  frmvalidator.addValidation("barangay","req","Please input present barangay.");
  frmvalidator.addValidation("city","req","Please input present city.");
  frmvalidator.addValidation("number","req","Please input contact number.");
  frmvalidator.addValidation("recipient_name","alpha","Recipients's Name: Alpha only.");
  frmvalidator.addValidation("recipient_street","req","Please input Recipients's street.");
  frmvalidator.addValidation("recipient_city","req","Please input Recipients's city.");
  frmvalidator.addValidation("recipient_zipcode","req","Please input Recipients's zipcode.");
  frmvalidator.addValidation("recipient_phone","req","Please input Recipients's contact number.");
 
</script>

