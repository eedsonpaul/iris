 
<?php
	require_once 'student_header.php';
?>

<?php 
	$student_number = $_SESSION['student_number'];	 
	//$academic_year=$POST['academic_year']; 
	//$semester=$POST['semester']; 
?>

<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>

 <div class = "main">

<div id="right_side2">
 
 <form name="form1" method="post" action="student_update_enrolldata2.php?academic_year='.$academic_year.'&semester='.$semester.'">
 <table width="900" class="tablestyle">
  

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
    <td class="nohover" colspan="1">
	<p align="left"><strong>STUDENT'S ADDRESS WHILE STUDYING AT UPV: </strong><br>
	Housing Type: *<br><select name="house_type">
		 <option>Apartment</option>
		 <option>Boarding House</option>
		 <option>Dormitory</option>
		 <option>Owned</option>
		  <option>Condo</option>
      </select><br>
	<input type="checkbox" name="sameaddress[]"/>..Check this if present address below is the same as your
	home/provincial address<br>
	House #: * <br />
			<input type="text" name="housenum" /><br />
	Street:  *<br />
			 <input type="text" name="street" /><br />
	Barangay/Subdivision: * 			
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
  <p align="left">
  <input type="submit" name="update" value="SAVE TO DATABASE">

<input type="submit" name="back"  onclick= history.go(-1) value="BACK">
</form>   

<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("form1");
    
  frmvalidator.EnableMsgsTogether();
  
  frmvalidator.addValidation("guardian","req","Please input Guardian's Name.");  
  frmvalidator.addValidation("guardian","alpha","Guardian's Name: Alpha only.");
  frmvalidator.addValidation("guardian_house_number","req","Please input Guardian's House Number.");  
  frmvalidator.addValidation("guardian_street","req","Please input Guardian's Street.");  
  frmvalidator.addValidation("guardian_barangay","req","Please input Guardian's Barangay.");  
  frmvalidator.addValidation("guardian_city_municipality","req","Please input Guardian's City/Municipality.");  
  
  frmvalidator.addValidation("recipient_name","req","Please input Recepient's Name.");
  
</script>

