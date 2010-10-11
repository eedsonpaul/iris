 
<?php
	session_start();
	//require_once 'cso_header.php';
	require_once 'query_student.php';
?>

<?php 
	$student_number = $_SESSION['student_number'];	 
//		$academic_year=$_POST['academic_year']; 
//	$semester=$_POST['semester']; 
  //require_once 'cso_header.php';
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
 
 <form name="form2" method="post" action="cso_update_enrolldata2.php">
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

