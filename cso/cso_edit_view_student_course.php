<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Edit/View Student Course</title>
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
	include("connect_to_database.php");
	
	$change = $_GET['c'];
	if($change=="NOT") {
		$student_ID = $_GET['id'];
	} else if($change=="NA"){
		$student_ID = $_POST['student_id'];
	}
	$pass = "";
	$count = 0;
	$query = "SELECT * from student WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$count++;
	}
	
	if($count==0){
		echo "<script> alert('Student number does not exist. Please input another student number.'); window.location.href = 'cso_change_students_degree_program.php';</script>";
	} else {
  ?>
<div id="contentcolumn1">
    <p class="headfont">&nbsp;</p>
  <p class="head"><strong>Select Degree Program</strong></p>
  <table width="650" border="0" align="center">
    <tr>
      <td colspan="6"><div align="center">COURSE OF STUDENT</div></td>
    </tr>
    <tr>
      <td width="188"><div align="center">Course</div></td>
      <td width="94"><div align="center">Unit/Campus</div></td>
      <td width="108"><div align="center">AY Shifted</div></td>
      <td width="95"><div align="center">Sem Shifted</div></td>
      <td width="93"><div align="center">Encoded By</div></td>
      <td width="46"><div align="center">Action</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table width="650" border="0" align="center">
    <tr>
      <td class="tab"><p>The latest course based on the student's latest record that will be used in the OTR and the other records of the student is on the topmost course entry in the list. Other previous course(s) of the student will also be displayed on the list with the corresponding AY and Semester the student started with the degree program.</p>
      <p>To specify the course of the student, enter required information on the fields below and click the Save button. Be sure to select the correct degree program. Indicate whether the student belongs to the OLD or NEW curriculum. Check the revision date of the program after the programme on the choices below.</p>
      <p>Just click on the link opposite the degree program item to change the entry and select the correct course from the list. To edit an entry on the above list, just specify the correct degree or AY and sem then enter new values in other fields and click Save. The previous data will just be overwritten.</p></td>
    </tr>
  </table>
  <?php
	$query = "SELECT * from student WHERE student_number = '$student_ID'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
			$last_name = $row['last_name'];
			$first_name = $row['first_name'];
	}
			
	?>
  <p>&nbsp;</p>
  <form action="cso_process_add_student_record.php?action=ADD COURSE&id=<?php echo $student_ID;?>" method="post">
    <table width="506" border="0" align="center" class="tab">
      <tr>
        <td width="181"><div align="right">Student ID:</div></td>
        <td width="12">&nbsp;</td>
        <td width="299"><input type="text" name="student_id" id="student_id" value="<?php echo $student_ID;?>" readonly></td>
      </tr>
      <tr>
        <td><div align="right">Student Name:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="student_name" id="student_name" value="<?php echo $last_name.", ".$first_name;?>" readonly></td>
      </tr>
      <tr>
        <td><div align="right">Current Course:</div></td>
        <td>&nbsp;</td>
        <td><?php 
			if($change=="SAME") { 
			$degree_program_ID = "";
			$query = "SELECT * from students_degree WHERE student_number = '$student_ID'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
				$degree_program_ID = $degree_program_id;
				}
			$query = "SELECT * from degree_program WHERE degree_program_id = '$degree_program_ID'";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
				$prog_name = $degree_name;
				}?><input name="current_course" type="text" id="current_course" value="<?php echo $prog_name;?>" size="30"><?php } else if($change=="NOT"){?> 
          <label>
          <select name="course_list" id="course_list">
            <option value="0">Choose Course</option>
           <?php 
		 	$query = "SELECT * from degree_program";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
			?>
            <option value="<?php echo $degree_program_id;?>"><?php echo $degree_name;?></option>
          </select>
          </label><?php }
		  }?>
        <a href="cso_edit_view_student_course.php?c=NOT&id=<?php echo $student_ID;?>">Click Here to Change</a></td>
      </tr>
      <tr>
        <td><div align="right">Start A.Y:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="start_ay" id="start_ay"> 
          (yyyyyyyy)</td>
      </tr>
      <tr>
        <td><div align="right">Start Semester::</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="start_semester" id="start_semester"></td>
      </tr>
    </table>
    <p>
      <center><input type="submit" name="edit_view_student_course" id="edit_view_student_course" value="UPDATE Student's Course">
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
<?php } ?>

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
