
<?php
	require_once 'student_header.php';
	require_once 'query_student.php';

?>

<?php 
	 $student_number = $_SESSION['student_number'];	 
	
//	echo $academic_year=$_POST['academic_year']; 
//	echo $semester=$_POST['semester']; 
?>


<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="JavaScript" src="masks.js"></script>

<script language="JavaScript">
	
	function init(){
		document.form1.reset();

		oStringMask = new Mask("###########");
		oStringMask.attach(document.form1.personalincome);
		
		oStringMask = new Mask("###########");
		oStringMask.attach(document.form1.familyincome);
		oStringMask.attach(document.form1.employer_number);
		
		oStringMask = new Mask("####-##-##");
		oStringMask.attach(document.form1.birthdate);
		


		
		oStringMask = new Mask("#####");
		oStringMask.attach(document.form1.employer_zipcode);

	}
	function disableCountryField()
	{
	document.form1.other_country.disabled=true;
	document.form1.other_country.value="";
	}
	function enableCountryField()
	{
	document.form1.other_country.disabled=false;
	}
	function disableEmployerField()
	{
	document.form1.employer_name.disabled=true;
	document.form1.employer_address.disabled=true;
	document.form1.employer_zipcode.disabled=true;
	document.form1.employer_number.disabled=true;
	document.form1.employer_name.value="";
	document.form1.employer_address.value="";
	document.form1.employer_zipcode.value="";
	document.form1.employer_number.value="";
	}
	function enableEmployerField()
	{
	document.form1.employer_name.disabled=false;
	document.form1.employer_address.disabled=false;
	document.form1.employer_zipcode.disabled=false;
	document.form1.employer_number.disabled=false;
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
  <form name="form1" method="post" action="student_update_enrolldata1.php?academic_year=$academic_year&semester=$semester">
  <table width="900" class="tablestyle">
  
  <tr>
    <th width="20%">STUDENT NUMBER<BR><?php echo $id ?> </th>
    <th width="20%">NAME(Last,Given,Middle)<br><?php echo $name ?></th>
    <th width="20%">COLLEGE<br>UPVCC</th>
    <th width="20%">DEGREE<br>B.S. COMPUTER SCIENCE</th>
    <th width="20%">TERM/AY<br><?php //echo $semester." ".$academic_year ?></th>
  </tr>
  <tr>
    <td class="nohover" width="33%">
	<p align="left"><strong>STUDENT TYPE *</strong><br>
	<input type="radio" name="student-type" value="A" <?php if(getStudentType($student_number)=='A'){echo 'checked';} ?> >Cross-registrant(from a non-UP unit)<br>
	<input type="radio" name="student-type" value="B" <?php if(getStudentType($student_number)=='B'){echo 'checked';} ?> >Cross-registrant(from UP unit)<br>
	<input type="radio" name="student-type" value="C" <?php if(getStudentType($student_number)=='C'){echo 'checked';} ?> >Non-degree<br>
	<input type="radio" name="student-type" value="D" <?php if(getStudentType($student_number)=='D'  || getStudentType($student_number)==null ){echo 'checked';} ?> >Regular<br>
	<input type="radio" name="student-type" value="E" <?php if(getStudentType($student_number)=='E'){echo 'checked';} ?> >Shiftee<br>
	<input type="radio" name="student-type" value="F" <?php if(getStudentType($student_number)=='F'){echo 'checked';} ?> >Special<br>
	<input type="radio" name="student-type" value="G" <?php if(getStudentType($student_number)=='G'){echo 'checked';} ?> >Transferee<br> 
	
	<br><strong>GRADUATING THIS TERM? *</strong><br>
	<input type="radio" name="graduating" value="yes" <?php if(getGraduationInfo($student_number)=='yes'){echo 'checked';} ?> >Yes<br>
	<input type="radio" name="graduating" value="no"  <?php if(getGraduationInfo($student_number)=='no' ){echo 'checked';} ?>  >No<br>

	<br>EMPLOYED? *<br>
	<input type="radio" name="employed" value="full-time" onclick=enableEmployerField()  <?php if(getEmployment($student_number)=='full-time'){echo 'checked';} ?> >Full-time
	<input type="radio" name="employed" value="part-time" onclick=enableEmployerField() <?php if(getEmployment($student_number)=='part-time'){echo 'checked';} ?> >Part-time
	<input type="radio" name="employed" value="no" onclick=disableEmployerField() <?php if(getEmployment($student_number)=='no'){echo 'checked';} ?> >No<br>

	<br>EMPLOYER INFORMATION:<br>
	Name:    <br><input type="text" name="employer_name" disabled=<?php if(getEmployment($student_number)=='no'){ echo "true";} else { echo "false"; } ?>  value = <?php echo getEmployerName($student_number) ?> ><br>
	Address: <br><input type="text" name="employer_address" disabled=<?php if(getEmployment($student_number)=='no'){ echo "true";} else { echo "false"; } ?> value = <?php echo getEmployerAddress($student_number) ?> ><br>
	Zipcode: <br><input type="text" name="employer_zipcode" disabled=<?php if(getEmployment($student_number)=='no'){ echo "true";} else { echo "false"; } ?> value = <?php echo getEmployerZipcode($student_number) ?> ><br>
	Phone#:  <br><input type="text" name="employer_number"  disabled=<?php if(getEmployment($student_number)=='no'){ echo "true";} else { echo "false"; } ?> value = <?php echo getEmployerNum($student_number) ?> ><br>
	
	</td>
	 <td class="nohover" width="33%">
	<p align="left"><strong>REGISTRATION STATUS *</strong><br>
	<input type="radio" name="reg-status" value="A" <?php if(getRegStat($student_number)=='A' || getRegStat($student_number)==null){echo 'checked';} ?> >Continuing<br>
	<input type="radio" name="reg-status" value="B" <?php if(getRegStat($student_number)=='B'){echo 'checked';} ?> >New Cross Registrant/non-degree<br>
	<input type="radio" name="reg-status" value="C" <?php if(getRegStat($student_number)=='C'){echo 'checked';} ?> >New Doctornal<br>
	<input type="radio" name="reg-status" value="D" <?php if(getRegStat($student_number)=='D'){echo 'checked';} ?> >New Freshman(including Cert/Dip)<br>
	<input type="radio" name="reg-status" value="E" <?php if(getRegStat($student_number)=='E'){echo 'checked';} ?> >New Master's(including Grad Cert/Dip)<br>
	<input type="radio" name="reg-status" value="F" <?php if(getRegStat($student_number)=='G'){echo 'checked';} ?> >New Transfer(from a non-UP unit)<br>
	<input type="radio" name="reg-status" value="G" <?php if(getRegStat($student_number)=='G'){echo 'checked';} ?> >New Transfer(from UP unit)<br>
	<input type="radio" name="reg-status" value="H" <?php if(getRegStat($student_number)=='H'){echo 'checked';} ?> >Old Returning<br>	

	<br><strong>FOREIGN STUDENT? *</strong><br>
	<input type="radio" name="foreign" value="y" <?php if(getForeignInfo($student_number)=='y'){echo 'checked';} ?> >Yes<br>
	<input type="radio" name="foreign" value="n"  <?php if(getForeignInfo($student_number)=='n' || getForeignInfo($student_number)==null){echo 'checked';} ?> >No<br>
	
	<br><strong>COUNTRY OF CITIZENSHIP *</strong><br>
	<input type="radio" name="country" value="philippines" onclick=disableCountryField() <?php if(getCitizenship($student_number)=='philippines'){echo 'onclick=disableCountryField() checked';} ?> >Philippines<br>
	<input type="radio" name="country" value="usa" onclick=disableCountryField() <?php if(getCitizenship($student_number)=='usa'){echo 'onclick=disableCountryField() checked';} ?> >USA<br>
	<input type="radio" name="country" value="dual" onclick=disableCountryField() <?php if(getCitizenship($student_number)=='dual'){echo ' onclick=disableCountryField() checked';} ?> >Philippines and USA (dual)<br>
	<input type="radio" name="country" value="others" onclick=enableCountryField() <?php if(getCitizenship($student_number)!='philippines' && getCitizenship($student_number)!='usa' && getCitizenship($student_number)!='dual'   ){echo 'checked';} ?> >Other..specify full country name: <br>
	<input type="text" name="other_country" disabled=<?php if(getCitizenship($student_number)!='philippines' && getCitizenship($student_number)!='usa' && getCitizenship($student_number)!='dual'){ echo "false";} ?> value= <?php  if(getCitizenship($student_number)!='philippines' && getCitizenship($student_number)!='usa' && getCitizenship($student_number)!='dual') echo getCitizenship($student_number) ?> ><br>
	
	<br><strong>RESIDENT OF PHILIPPINES? *</strong><br>
	<input type="radio" name="resident" value="yes" <?php if(getResidency($student_number)=='yes'){echo 'checked';} ?>>Yes<br>
	<input type="radio" name="resident" value="no" <?php if(getResidency($student_number)=='no'){echo 'checked';} ?>>No<br>
	<br>
	</td>
	<td class="nohover" width = "33%" >
	<p align="left">
	<br>MAJOR &nbsp; &nbsp;<input type="text" name="major" size="10" disabled="true" value = <?php echo getMajor($student_number) ?> ><br>
	<br>MINOR &nbsp; &nbsp; <input type="text" name="minor" size="10" disabled="true" value = <?php echo getMinor($student_number) ?> ><br></strong>
	<br>DEGREE LEVEL *<br>
	<input type="radio" name="degree-level" value="undergraduate"  <?php if(getDegreeLevel($student_number)=='undergraduate'){echo 'checked';} ?> >Undergraduate<br>
	<input type="radio" name="degree-level" value="graduate"<?php if(getDegreeLevel($student_number)=='graduate'){echo 'checked';} ?> >Graduate<br>
	
	<br>ANNUAL FAMILY GROSS INCOME *<br>
	PhP: <input type="text" name="familyincome" value= <?php echo getFamilyIncome($student_number) ?> >
	<br>ANNUAL PERSONAL GROSS INCOME *<br>
	PhP: <input type="text" name="personalincome" value= <?php echo getPersonalIncome($student_number) ?> >
	<br><br>
	<p align="left"><strong>ADDITIONAL INFORMATION </strong><br>
	Birthdate:(yyyy-mm-dd)*<input type="text" name="birthdate" value = <?php echo getBirthdate($student_number) ?> ><br>
	Birth Place: * <br><input type="text" name="birthplace" value = <?php echo getBirthplace($student_number) ?> ><br> 
	Email Address: *<br><input type="text" name="emailadd" value = <?php echo getEmailAdd($student_number) ?>  ><br><br><br><br><br><br><br>
	</td>
	
	<td class="nohover"  width = "33%"  colspan="2">
	<p align="left">	
	YEAR LEVEL *<br>
	<input type="radio" name="year-level"  value=1 <?php if(getYearLevel($student_number)==1){echo 'checked';} ?>>1st<br>
	<input type="radio" name="year-level" disabled="true" value=2 <?php if(getYearLevel($student_number)==2){echo 'checked';} ?>>2nd<br>
	<input type="radio" name="year-level" disabled="true" value=3 <?php if(getYearLevel($student_number)==3){echo 'checked';} ?>>3rd<br>
	<input type="radio" name="year-level" disabled="true" value=4 <?php if(getYearLevel($student_number)==4){echo 'checked';} ?>>4th<br>
	<br>SEX *<br>
	<input type="radio" name="sex" disabled="true" value="female" <?php if(getGender($student_number)=='female'){echo 'checked';} ?>>Female<br>
	<input type="radio" name="sex" disabled="true" value="male" <?php if(getGender($student_number)=='male'){echo 'checked';} ?>>Male<br>
	
	<br>CIVIL STATUS *<br>
	
	<input type="radio" name="civilstat" value="separated"  <?php if(getCivilStatus($student_number)=='separated'){echo 'checked';} ?>>Separated<br>
	<input type="radio" name="civilstat" value="divorced"  <?php if(getCivilStatus($student_number)=='divorced'){echo 'checked';} ?>>Divorced<br>
	<input type="radio" name="civilstat" value="married" <?php if(getCivilStatus($student_number)=='married'){echo 'checked';} ?> >Married<br>
	<input type="radio" name="civilstat" value="single"  <?php if(getCivilStatus($student_number)=='single'){echo 'checked';} ?>>Single<br>
	<input type="radio" name="civilstat" value="widowed"  <?php if(getCivilStatus($student_number)=='widowed'){echo 'checked';} ?>>Widowed<br>
	<br><br><br><br><br><br><br><br><br>
	</p>
	</td>
  </tr>
 
</table>
<br>
<input type="submit" name="back" value="CONTINUE"> 
</form>
<p align="center">
<input type="submit" name="back"  onclick= history.go(-1) value="BACK">
</p>


   


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
  
  
  
  frmvalidator.addValidation("employer_name","req","Please input employer name."); 
  frmvalidator.addValidation("employer_address","req","Please input employer address."); 
  frmvalidator.addValidation("employer_zipcode","req","Please input employer zipcode."); 
  frmvalidator.addValidation("employer_number","req","Please input employer number.");   
  
  
  
</script>
  


  
  
</p>
  <p>&nbsp;
  </p>
</div>
</div>

</body>
</html>




