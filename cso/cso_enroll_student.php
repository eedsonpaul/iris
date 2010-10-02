<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Enroll Student</title>
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
.style1 {
	font-size: 12px;
	font-weight: bold;
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
<div id="contentcolumn1">
    <p class="headfont">&nbsp;</p>
  <p class="head"><strong>General Registration</strong></p>
  <p class="head"><strong>Semester goes here</strong></p>
  <p class="head">&nbsp;</p>
  <?php
  	include("connect_to_database.php");
	include("sql_queries.php");
	include("cso_views.php");
	
		$stud_num = $_GET['id'];
	
	$query = new SqlQueries();
	$result = $query->querysql("SELECT * from student WHERE student_number = '$stud_num'");
	while ($row = mysql_fetch_array($result)) {
			extract($row);
  ?>
  <table width="804" border="0" align="center">
    <tr>
      <td><div align="center">
        <table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="134"><strong>STUDENT NAME</strong></td>
            <td width="14"><strong>:</strong></td>
            <td width="169"><?php echo $first_name." ".$middle_name[0].". ".$last_name;?></td>
            <td width="154"><div align="right"><strong>DEGREE PROGRAM</strong></div></td>
            <td width="13"><strong>:</strong></td>
            <td width="135">BSCS</td>
            <td width="161"><div align="left"><a href="cso_print_form_5.php">Print Form 5</a></div></td>
          </tr>
          <tr>
            <td><strong>STUDENT NUMBER</strong></td>
            <td><strong>:</strong></td>
            <td><?php $stud_num = $student_number; echo $student_number;?></td>
            <td><div align="right"><strong>YEAR LEVEL</strong></div></td>
            <td><strong>:</strong></td>
            <td><?php echo $year_level;?></td>
            <td><div align="left">View Study Plan</div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><div align="right"><strong>ACADEMIC STANDING</strong></div></td>
            <td><strong>:</strong></td>
            <td><?php echo $row['academic_standing'];?></td>
            <td><div align="left">View Grade Summary</div></td>
          </tr>
        </table>
        <?php }?>
      </div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
    </tr>
    <tr><form action="" method="post">
      <td width="798"><div align="center"></div></td></form>
    </tr>
  </table>
  <p><center>
  </center>
  </p>
<?php
    $_SESSION['student_number'] = $stud_num;?>
  <form action="" method="post">
    <table width="772" border="0" align="center" cellpadding="0" cellspacing="0" class="tab">
      <tr>
        <td width="57">&nbsp;</td>
        <th width="103" height="36"><div align="center" class="style1">Subject</div></th>
        <th width="75"><div align="center" class="style1">Section</div></th>
        <th width="58"><div align="center" class="style1">Units</div></th>
        <th width="201"><div align="center" class="style1">Schedule</div></th>
        <th width="127"><div align="center"><strong>Status</strong></div></th>
        <th width="151"><div align="center"><strong>Action</strong></div></th>
      </tr>
       <?php
	  	$query = new Query();
		$units = $query->viewStudentRegistration($stud_num);
	  ?>
    </table>
    <p>
      <center>
        <table width="703" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="202">Total Units Earned:</td>
            <td width="178">Total Units Confirmed: <?php echo $units;?></td>
            <td width="163">&nbsp;</td>
            <td width="160"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="5"><a href="cso_print_form_5.php">Print Paid Form5 Here</a></td>
              </tr>
              <tr>
                <td height="5">View Assessment Here</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><div align="center">
              <input type="submit" name="add_student_subject" id="add_student_subject" value="ADD SUBJECT" onclick="addSubject();">
            </div></td>
            <td><div align="center">
              <input type="submit" name="check_conflict" id="check_conflict" value="CHECK CONFLICT">
            </div></td>
            <td><div align="center">
              <input type="submit" name="check_accountability" id="check_accountability" value="CHECK ACCOUNTABILITY">
            </div></td>
            <td><div align="center">
              <input type="submit" name="edit_enrollment_data" id="edit_enrollment_data" value="EDIT ENROLLMENT DATA">
            </div></td>
          </tr>
        </table>
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
<script type="text/javascript">
	function addSubject(){
		window.open("../student/student_search_subject.php", "info", "width=600,scrollbars=0,resizable=0");
	}
		
</script>
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
