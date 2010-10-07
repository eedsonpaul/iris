
<?php
	require_once 'student_header.php';
	require_once 'query_student.php';

?>

<?php 
	 $student_number = $_SESSION['student_number'];	 
	
	$academic_year=$_POST['academic_year']; 
	$semester=$_POST['semester']; 
?>


<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="JavaScript" src="masks.js"></script>

<script language="JavaScript">
	
	function init(){
		document.form1.reset();

		oStringMask = new Mask("#########");
		oStringMask.attach(document.form1.personalincome);
		
		oStringMask = new Mask("#########");
		oStringMask.attach(document.form1.familyincome);
		
		oStringMask = new Mask("####-##-##");
		oStringMask.attach(document.form1.birthdate);
		
		oStringMask = new Mask("(###)###-####");
		oStringMask.attach(document.form1.employer_number);
		
		oStringMask = new Mask("#####");
		oStringMask.attach(document.form1.employer_zipcode);

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
  <form name="form1" method="post" action="student_update_enrolldata1.php">
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
	<input type="radio" name="student-type" value="A" >Cross-registrant(from a non-UP unit)<br>
	<input type="radio" name="student-type" value="B" >Cross-registrant(from UP unit)<br>
	<input type="radio" name="student-type" value="C" >Non-degree<br>
	<input type="radio" name="student-type" value="D" >Regular<br>
	<input type="radio" name="student-type" value="E" >Shiftee<br>
	<input type="radio" name="student-type" value="F" >Special<br>
	<input type="radio" name="student-type" value="G" >Transferee<br> 
	
	<br><strong>GRADUATING THIS TERM? *</strong><br>
	<input type="radio" name="graduating" value="yes" >Yes<br>
	<input type="radio" name="graduating" value="no" >No<br>

	<br>EMPLOYED? *<br>
	<input type="radio" name="employed" value="full-time" >Full-time
	<input type="radio" name="employed" value="part-time" >Part-time
	<input type="radio" name="employed" value="no" />No<br>

	<br>EMPLOYER INFORMATION:<br>
	Name:    <br><input type="text" name="employer_name" 	><br>
	Address: <br><input type="text" name="employer_address" ><br>
	Zipcode: <br><input type="text" name="employer_zipcode" ><br>
	Phone#:  <br><input type="text" name="employer_number" ><br>
	
	</td>
	 <td class="nohover" width="33%">
	<p align="left"><strong>REGISTRATION STATUS *</strong><br>
	<input type="radio" name="reg-status" value="A" >Continuing<br>
	<input type="radio" name="reg-status" value="B" >New Cross Registrant/non-degree<br>
	<input type="radio" name="reg-status" value="C" >New Doctornal<br>
	<input type="radio" name="reg-status" value="D" >New Freshman(including Cert/Dip)<br>
	<input type="radio" name="reg-status" value="E" >New Master's(including Grad Cert/Dip)<br>
	<input type="radio" name="reg-status" value="F" >New Transfer(from a non-UP unit)<br>
	<input type="radio" name="reg-status" value="G" >New Transfer(from UP unit)<br>
	<input type="radio" name="reg-status" value="H" >Old Returning<br>	

	<br><strong>FOREIGN STUDENT? *</strong><br>
	<input type="radio" name="foreign" value="yes" >Yes<br>
	<input type="radio" name="foreign" value="no" >No<br>
	
	<br><strong>COUNTRY OF CITIZENSHIP *</strong><br>
	<input type="radio" name="country" value="philippines" >Philippines<br>
	<input type="radio" name="country" value="usa" >USA<br>
	<input type="radio" name="country" value="dual" >Philippines and USA (dual)<br>
	<input type="radio" name="country" value="others" >Other..specify full country name: <br><input type="text" name="country?" /><br>
	
	<br><strong>RESIDENT OF PHILIPPINES? *</strong><br>
	<input type="radio" name="resident" value="yes" >Yes<br>
	<input type="radio" name="resident" value="no" >No<br>
	<br>
	</td>
	<td class="nohover" width = "33%" >
	<p align="left">
	<br>MAJOR &nbsp; &nbsp;<input type="text" name="major" size="10" value = <?php echo getMajor($student_number) ?> ><br>
	<br>MINOR &nbsp; &nbsp; <input type="text" name="minor" size="10" value = <?php echo getMinor($student_number) ?> ><br></strong>
	<br>DEGREE LEVEL *<br>
	<input type="radio" name="degree-level" value="undergrad" >Undergraduate<br>
	<input type="radio" name="degree-level" value="grad" >Graduate<br>
	
	<br>ANNUAL FAMILY GROSS INCOME *<br>
	PhP: <input type="text" name="familyincome" value= <?php echo getFamilyIncome($student_number) ?> >
	<br>ANNUAL PERSONAL GROSS INCOME *<br>
	PhP: <input type="text" name="personalincome" value= <?php echo getPersonalIncome($student_number) ?> >
	<br><br>
	<p align="left"><strong>ADDITIONAL INFORMATION </strong><br>
	Birthdate:(yyyy-mm-dd)*<input type="text" name="birthdate" value = <?php echo getBirthdate($student_number) ?> ><br>
	Birth Place: * <br><input type="text" name="birthplace" value = <?php echo getBirthplace($student_number) ?> ><br> 
	Email Address: *<br><input type="text" name="emailadd" value = <?php echo getEmailAdd($student_number) ?> ><br><br><br><br><br><br><br>
	</td>
	
	<td class="nohover"  width = "33%"  colspan="2">
	<p align="left">	
	YEAR LEVEL *<br>
	<input type="radio" name="year-level" value=1 >1st<br>
	<input type="radio" name="year-level" value=2 >2nd<br>
	<input type="radio" name="year-level" value=3 >3rd<br>
	<input type="radio" name="year-level" value=4 >4th<br>
	<br>SEX *<br>
	<input type="radio" name="sex" value="female" >Female<br>
	<input type="radio" name="sex" value="male" >Male<br>
	
	<br>CIVIL STATUS *<br>
	<input type="radio" name="civilstat" value="separated" >Separated<br>
	<input type="radio" name="civilstat" value="divorced" >Divorced<br>
	<input type="radio" name="civilstat" value="married" >Married<br>
	<input type="radio" name="civilstat" value="single" >Single<br>
	<input type="radio" name="civilstat" value="widow" >Widow<br>
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
  
  
</script>
  


  
  
</p>
  <p>&nbsp;
  </p>
</div>
</div>

</body>
</html>




