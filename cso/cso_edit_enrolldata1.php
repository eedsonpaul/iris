
<?php
	session_start();
	//require_once 'cso_header.php';
	require_once 'query_student.php';

?>

<?php 
	 $student_number = $_SESSION['student_number'];	 
	
    //$academic_year=$_POST['academic_year']; 
	//$semester=$_POST['semester']; 
  require_once '../admin_db_connect.php';
  require_once '../admin_http.php';
	if($_SESSION['access_level_id'] != 7 and $_SESSION['access_level_id'] != 3) 
	  redirect('../error.php');
?>

<html>
<head>
  <title>CSO | UP Cebu IRIS</title>
  <link rel="icon" href="../img/seal2.png" type="image/x-icon">
  
  <script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <style type="text/css">
  @import url("../css/cso.css");
  </style>

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
		
		oStringMask = new Mask("########");
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
</head>

<body onLoad="init();">
  <div id="banner">
    <?php if (!isset($_SESSION['employee_id'])) { ?>
      <a href="index.php"><img src="../img/banner.jpg" width="950" height="163" border="0"></a>
    <?php } else { ?>
      <a href="index.php?action=Logs"><img src="../img/banner.jpg" width="950" height="163" border="0"></a>
    <?php } ?>
  </div>
  </div>

  <div id="stud_menu">
    <?php if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number'])) { ?>
      <img src="../img/mb1.1.jpg" width="140" height="30"><a href="cso.php"><img src="../img/mbhome.jpg" width="121" height="30" border="0"></a><img src="../img/mb1.2.jpg" width="33" height="30"><a href="../admin_transact_user.php?action=Logout"><img src="../img/mblogout.gif" width="121" height="30" border="0"></a><img src="../img/mb1.2.jpg" width="33" height="30"><img src="../img/mb1.3.jpg" width="502" height="30">
    <?php } else { ?>
      <img src="../img/mb1.1.jpg" width="140" height="30"><a href="login.php?action=Admin"><img src="../img/mbadmin.jpg" width="123" height="30" border="0"></a><img src="../img/mb1.2.jpg" width="33" height="30"><a href="login.php?action=Employee"><img src="../img/mbfaculty.jpg" width="123" height="30" border="0"></a><img src="../img/mb1.2.jpg" width="39" height="30" border="0"><a href="login.php?action=Student"><img src="../img/mbstudent.jpg" width="123" height="30" border="0"></a><img src="../img/mb1.2.jpg" width="39" height="30"><img src="../img/mb1.3.jpg" width="330" height="30">
  <?php } ?>
      <img src="../img/mb1.4.gif" width="950" height="33">
  </div>

  <div class="main">

    <?php if ($_SESSION['access_level_id'] == 3) { ?>
    <div id="admin_nav" class="left">
        <a href="../index.php?action=Logs"><span class="left">&larr;Back to Admin Account</span></a>
    </div>

    <div id="admin_nav" class="right">
      <?php
      if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number']))
      {
        echo '<a href="index.php?action=SearchAcct">Search Account &raquo;';
        echo '</a>';
        if ($_SESSION['access_level_id'] == 3) {
          echo ' | <a href="index.php?action=Logs">Logs</a> | ';
          echo ' <a href="admin_panel.php">' . $_SESSION['username'];
        } else if ($_SESSION['access_level_id'] == 1) {
          echo ' | <a href="admin_accountpanel.php">' . $_SESSION['student_number'];
        }
        echo '</a>';
      }
      ?>
    </div><br/><br/>
    <?php } ?>
<?php
	// require_once 'cso_header.php';
	
	$employee_id = "";
	$employee_name = "";
	$designation = "";
	require_once '../admin_db_connect.php';
	//session_start();
	if ($_SESSION['employee_id'] == NULL) header("Location: index.php");
	$employee_id = $_SESSION['employee_id'];
	$access_level_id = $_SESSION['access_level_id'];
	$res = mysql_query("SELECT last_name, first_name, middle_name, designation_id, unit_id FROM employee WHERE employee_id='$employee_id'");
	$data = mysql_fetch_array($res);
	$employee_name = $data['last_name'] . ', ' . $data['first_name'] . ' ' . $data['middle_name'][0].'.';
	$unit_id = $data['unit_id'];
	$designation_id = $data['designation_id'];
	$res2= mysql_query("SELECT designation FROM designation WHERE designation_id='$designation_id'");
	$data2 = mysql_fetch_array($res2);
	$designation = $data2['designation'];
	$res1 = mysql_query("SELECT unit_name FROM unit WHERE unit_id='$unit_id'");
	$data1 = mysql_fetch_array($res1);
	$unit = $data1['unit_name'];
?>
<div class = "main">

<div id="right_side2">

	<p><a href='javascript:history.go(-1)'>&larr;Back</a></p>
  
  <p>
  <form name="form1" method="post" action="cso_update_enrolldata1.php?academic_year=$academic_year&semester=$semester">
  <table width="900" class="tablestyle">
  
  <tr>
    <th width='200'>STUDENT NUMBER<BR><?php echo $student_number ?> </th>
    <th width='200'>NAME(Last,Given,Middle)<br><?php echo getFirstName($student_number) . " " . getMiddleName($student_number)  . " " . getLastName($student_number)?></th>
    <th width='200' colspan='2'>COLLEGE<br>UPCC</th>
    <th width='300'>DEGREE<br><?php echo getDegreeProgram($student_number) ?></th>

  </tr>
  <tr>
    <td class="nohover" width="30%">
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
	Name:    <br><input type="text" name="employer_name"  value = <?php echo getEmployerName($student_number) ?> ><br>
	Address: <br><input type="text" name="employer_address"  value = <?php echo getEmployerAddress($student_number) ?> ><br>
	Zipcode: <br><input type="text" name="employer_zipcode"  value = <?php echo getEmployerZipcode($student_number) ?> ><br>
	Phone#:  <br><input type="text" name="employer_number"   value = <?php echo getEmployerNum($student_number) ?> ><br>
	
	</td>
	 <td class="nohover" width="30%">
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
	<input type="text" name="other_country"  value= <?php  if(getCitizenship($student_number)!='philippines' && getCitizenship($student_number)!='usa' && getCitizenship($student_number)!='dual') echo getCitizenship($student_number) ?> ><br>
	
	<br><strong>RESIDENT OF PHILIPPINES? *</strong><br>
	<input type="radio" name="resident" value="yes" <?php if(getResidency($student_number)=='yes'){echo 'checked';} ?>>Yes<br>
	<input type="radio" name="resident" value="no" <?php if(getResidency($student_number)=='no'){echo 'checked';} ?>>No<br>
	<br>
	</td>
	<td class="nohover" width = "25%" >
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
	Birthdate:(YyyyMmDd)*<input type="text" name="birthdate" value = <?php echo getBirthdate($student_number) ?> ><br>
	Birth Place: * <br><input type="text" name="birthplace" value = <?php echo getBirthplace($student_number) ?> ><br> 
	Email Address: *<br><input type="text" name="emailadd" value = <?php echo getEmailAdd($student_number) ?>  ><br><br><br><br><br><br><br>
	</td>
	
	<td class="nohover"  width = "15%"  colspan="2">
	<p align="left">	
	YEAR LEVEL *<br>
	<input type="radio" name="year-level" disabled="true" value=1 <?php if(getYearLevel($student_number)==1){echo 'checked';} ?>>1st<br>
	<input type="radio" name="year-level" disabled="true" value=2 <?php if(getYearLevel($student_number)==2){echo 'checked';} ?>>2nd<br>
	<input type="radio" name="year-level" disabled="true" value=3 <?php if(getYearLevel($student_number)==3){echo 'checked';} ?>>3rd<br>
	<input type="radio" name="year-level" disabled="true" value=4 <?php if(getYearLevel($student_number)==4){echo 'checked';} ?>>4th<br>
	<br>SEX *<br>
	<input type="radio" name="sex" disabled="true" value="Female" <?php if(getGender($student_number)=='Female'){echo 'checked';} ?>>Female<br>
	<input type="radio" name="sex" disabled="true" value="Male" <?php if(getGender($student_number)=='Male'){echo 'checked';} ?>>Male<br>
	
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
 
 // frmvalidator.addValidation("employer_name","req","Please input employer name."); 
 // frmvalidator.addValidation("employer_address","req","Please input employer address."); 
 // frmvalidator.addValidation("employer_zipcode","req","Please input employer zipcode."); 
 // frmvalidator.addValidation("employer_number","req","Please input employer number.");   
  
  
  
</script>
  


  
  
</p>
  <p>&nbsp;
  </p>
</div>
</div>

</body>
</html>




