<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Edit Student Personal/Enrollment Data</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body>
<div id="container">
<p><img src="banner.jpg" width="1024" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="index.htm"></a><a href="index.htm"><img src="mblogout.gif" width="121" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="730" height="30"><img src="mb1.4.gif" width="1024" height="33"></p>
<?php
	$employee_id = "";
	$employee_name = "";
	$designation = "";
	require_once '../admin_db_connect.php';
	session_start();
	if ($_SESSION['employee_id'] == NULL) header("Location: index.php");
	$employee_id = $_SESSION['employee_id'];
	$access_level_id = $_SESSION['access_level_id'];
	$res = mysql_query("SELECT last_name, first_name, middle_name, designation_id, unit_id FROM employee WHERE employee_id='$employee_id'");
	$data = mysql_fetch_array($res);
	$employee_name = $data['last_name'] . ', ' . $data['first_name'] . ' ' . $data['middle_name'];
	$unit_id = $data['unit_id'];
	$designation_id = $data['designation_id'];
	$res2= mysql_query("SELECT designation FROM designation WHERE designation_id='$designation_id'");
	$data2 = mysql_fetch_array($res2);
	$designation = $data2['designation'];
	$res1 = mysql_query("SELECT unit_name FROM unit WHERE unit_id='$unit_id'");
	$data1 = mysql_fetch_array($res1);
	$unit = $data1['unit_name'];
?>
<div id="navigation">
<p>
    	<b>&nbsp;&nbsp;Employee ID :</b> &nbsp; <?php echo $employee_id; ?> <br>
      	<b>&nbsp;&nbsp;Name &nbsp; :</b> &nbsp; <?php echo $employee_name; ?> <br>
      	<b>&nbsp;&nbsp;Designation :</b> &nbsp; <?php echo strtoupper($designation); ?> <br>
        <b>&nbsp;&nbsp;Unit: </b> &nbsp; <?php echo $unit; ?>
 	</p>
  <ul>
	  <li>
          <a href="cso.php"><center>CSO FUNCTIONS</center></a></li>
    <?php 
	$emp_id = "101135299";
	?>
        <li><a href="cso_personal_data_employee_login.php">PERSONAL DATA/EMPLOYEE LOGIN</a>
         </ul>

	<ul>
	<li><a href="cso_students_concerns.php">STUDENT'S CONCERNS</a>
	</li>
		<li><a href="cso_subject_module.php">SUBJECT</a>
	</li>
    
	<li><a href="cso_degree_programs.php">DEGREE PROGRAMS</a>
	</li>
	<li> <a href="cso_grades_menu.php">GRADES</a>
	</li>
	<li> <a href="cso_classes_menu.php">CLASSES</a>
		</li>
    </li>
	</ul>
	<ul>
	</ul>
	<ul>
	<li> <a href="#">REGISTRATION</a>
			<ul> <a href="cso_reports_utilities.php">&nbsp;&nbsp;&nbsp;REPORTS/UTILITIES</a>
			</ul>

			<ul> <a href="cso_preenlistment_module.php">&nbsp;&nbsp;&nbsp;Pre-enlistment Module</a>
			</ul>

			<ul> <a href="cso_confirmation_module.php">&nbsp;&nbsp;&nbsp;Confirmation Module</a>
			</ul>
            
            <ul>
            	<a href="cso_general_registration.php">&nbsp;&nbsp;&nbsp;General Registration Module</a>
            </ul>
	</li>
	</ul>
</div>
  <?php
	$student_ID = $_POST['student_id'];
	include("connect_to_database.php");
	
	$pass = "";
	$count = 0;
	$query = "SELECT * from student WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$count++;
	}
	
	if($count==0){
		echo "<script> alert('Student number does not exist. Please input another student number.'); window.location.href = 'cso_search_edit_student_personal_enrollment_data.php';</script>";
	} else {
  ?>
<div id="contentcolumn1">
    <p class="headfont"><strong>CHANGE PERSONAL DATA</strong></p>
  <p class="head"><strong>PERSONAL INFORMATION</strong></p>
    <table width="250" border="1" align="center">
      <tr>
        <td><div align="center"><strong>NOTICE</strong></div></td>
      </tr>
      <tr>
        <td class="notice"><ul>
          <li>fields with * should be filled up</li>
          <li>do not use apostrophe (')</li>
        </ul></td>
      </tr>
    </table>
  <p>&nbsp;</p>
  <form action="" method="post">
    <table width="494" border="0" align="center" class="tab">
     <tr>
        <td width="180"><div align="right">Student ID:</div></td>
        <td width="19">&nbsp;</td>
        <td colspan="2"><strong><?php echo $student_ID;?></strong></td>
      </tr>
   <?php 
   		//include("connect_to_database.php");
		$query = "SELECT *from student WHERE student_number = '$student_ID'";
		$result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
				$maiden_name = "";
			$last_name = $row['last_name'];
			$first_name = $row['first_name'];
			$middle_name = $row['middle_name'];
			$civil_status = $row['civil_status'];
			$gender = $row['gender'];
			$birthdate = $row['birthdate'];
				
		}
	?> 
      <tr>
        <td><div align="right">Last Name:</div></td>
        <td>*</td>
        <td colspan="2"><input name="last_name" type="text" id="last_name" value="<?php echo $last_name;?>"></td>
      </tr>
      <tr>
        <td><div align="right">First Name:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="first_name" id="first_name" value="<?php echo $first_name;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Middle Name:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="middle_name" id="middle_name" value="<?php echo $middle_name;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Gender:</div></td>
        <td>*</td>
        <td colspan="2"><select name="gender" id="gender">
        	<?php if($gender=="Female") {
			?>
          	<option value="Female" selected>Female</option>
          	<option value="Male">Male</option>
            <?php 
			} else if($gender=="Male") {
			?>
            <option value="Female">Female</option>
          	<option value="Male" selected>Male</option>
            <?php } else {?>
            <option value="Female">Female</option>
          	<option value="Male">Male</option>
            <?php } ?></select></td>
      </tr>
      <tr>
        <td><div align="right">Civil Status:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="civil_status" id="civil_status"></td>
      </tr>
      <tr>
        <td><div align="right">Birthdate:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="birthdate" id="birthdate"></td>
      </tr>
      <tr>
        <td><div align="right">LandLine/Mobile Phone #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="phone_no" id="phone_no"></td>
      </tr>
      <tr>
        <td><div align="right">Email Address:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="email_address" id="email_address"></td>
      </tr>
      <tr>
        <td><div align="right">Father's Name:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="fathers_name" id="fathers_name"></td>
      </tr>
      <tr>
        <td><div align="right">Mother's Name:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="mothers_name" id="mothers_name"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2"><div align="left"><strong>PARENT'S ADDRESS</strong></div></td>
      </tr>
      <tr>
        <td><div align="right">House/Bldg #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="parents_house_no" id="parents_house_no"></td>
      </tr>
      <tr>
        <td><div align="right">Street:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="parents_street" id="parents_street"></td>
      </tr>
      <tr>
        <td><div align="right">Barangay/District:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="parents_brgy" id="parents_brgy"></td>
      </tr>
      <tr>
        <td><div align="right">City/Municipality:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="paretns_city" id="paretns_city"></td>
      </tr>
      <tr>
        <td><div align="right">Landline/Mobile Phone #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="parents_phone_no" id="parents_phone_no"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>YOUR PRESENT ADDRESS</strong></td>
      </tr>
      <tr>
        <td><div align="right">House/Bldg #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="present_house_no" id="present_house_no"></td>
      </tr>
      <tr>
        <td><div align="right">Street:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="present_street" id="present_street"></td>
      </tr>
      <tr>
        <td><div align="right">Barangay/District:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="present_brgy" id="present_brgy"></td>
      </tr>
      <tr>
        <td><div align="right">City/Municipality:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="present_city" id="present_city"></td>
      </tr>
      <tr>
        <td><div align="right">Phone #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="present_phone_no" id="present_phone_no"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>YOUR HOME/PROVINCE ADDRESS</strong></td>
      </tr>
      <tr>
        <td><div align="right">House/Bldg #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="home_house_no" id="home_house_no"></td>
      </tr>
      <tr>
        <td><div align="right">Street:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="home_street" id="home_street"></td>
      </tr>
      <tr>
        <td><div align="right">Barangay/District:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="home_brgy" id="home_brgy"></td>
      </tr>
      <tr>
        <td><div align="right">City/Municipality:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="home_city" id="home_city"></td>
      </tr>
      <tr>
        <td><div align="right">Phone #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="home_phone_no" id="home_phone_no"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td colspan="2"><strong>PERSON TO CONTACT IN CASE OF EMERGENCY</strong></td>
      </tr>
      <tr>
        <td><div align="right">Contact Person/Guardian's Name:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="contact_person_name" id="contact_person_name"></td>
      </tr>
      <tr>
        <td><div align="right">Landline/Mobile Phone #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="contact_person_phone_no" id="contact_person_phone_no"></td>
      </tr>
      <tr>
        <td><div align="right">House/Bldg #:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="contact_person_house_no" id="contact_person_house_no"></td>
      </tr>
      <tr>
        <td><div align="right">Street:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="contact_person_street" id="contact_person_street"></td>
      </tr>
      <tr>
        <td><div align="right">Barangay/District:</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="contact_person_brgy" id="contact_person_brgy"></td>
      </tr>
      <tr>
        <td><div align="right">City/Municipality</div></td>
        <td>*</td>
        <td colspan="2"><input type="text" name="contact_person_city" id="contact_person_city"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right">
          <input type="submit" name="update_personal_enrollment_data" id="update_personal_enrollment_data" value="UPDATE">
        </div></td>
        <td>&nbsp;</td>
        <td width="137"><div align="center">
          <input type="submit" name="reset_personal_enrollment_data2" id="reset_personal_enrollment_data2" value="RESET">
        </div></td>
        <td width="140"><input type="submit" name="cancel_personal_enrollment_data3" id="cancel_personal_enrollment_data3" value="CANCEL"></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </form>
  <p>&nbsp;</p>
</div>
<?php }?>

<div id="footer"><a href="http://www.upv.edu.ph/" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image13','','foothover.gif',0)"><img src="foot.gif" name="Image13" width="1024" height="144" border="0"></a><img src="bgbordertop.gif" width="1024" height="12">
  <center>
  <a href="http://www.google.com">LINK 1</a> | <a href="http://www.google.com">LINK 2</a> | <a href="http://www.google.com">LINK 3</a>| <a href="http://www.google.com">LINK 3</a>| <a href="http://www.google.com">LINK 4</a><br>
  Copyright &copy; 2010-2012. All Rights Reserved. | <a href="http://www.google.com">Contact Chief Architect</a>.<br>
  Office of the University Registrar, University of the Philippines Visayas, Miagao, Iloilo, Philippines, 5023&nbsp;
    
    <br>
    Phone/Fax: +63 (33) 315 8556 &nbsp;|&nbsp; E-mail: our_upvisayas@yahoo.com&nbsp; 
    <br>
    
    <img src="bgborderbot.gif" width="1024" height="16"></div>
</div>
</body>
</html>
