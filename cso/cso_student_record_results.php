<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Student Record Management</title>
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
  <p class="head"><strong>Student Record Management</strong></p>
  <p class="head">&nbsp;</p>
  <table width="650" border="0" align="center">
    <?php
		$count = 0;
		include("cso_views.php");
			if($count==1) {
	?>
    <tr>
      <td><div align="center">Check/Fill-up field(s) below to filter the search results</div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>sort results by course</strong> by this course 
          <input type="text" name="this_course" id="this_course"> 
          by this unit 
          <input type="text" name="this_unit" id="this_unit"> 
          by this degree level (G/U) 
          <input type="text" name="this_degree_level" id="this_degree_level">
      </div></td>
    </tr>
    <?php
	}
	?>
        <tr><form action="cso_student_record_results.php" method="post">
      <td width="624"><div align="center">Search by ID / Lastname / Firstname : 
        <input name="search_name" type="text" id="search_name" size="50">
        <input type="submit" name="search" id="search" value="GO">
      </div></td></form>
    </tr>
  </table>
    <?php
			if($count==1) {
	?>
  <table width="650" border="0" align="center">
    <tr>
      <td height="50"class="tab"><p align="left"><strong><center>
        ALL | A | B | C | D | E | F | G | H | I | J | K | L | M | N | O | P | Q | R | S | T | U | V | W | X | Y | Z
      </center></strong></p>      </td>
       <?php 
		}
	?>
    </tr>
  </table>
  <p><center>
    <strong>    Search Result(s)    </strong>
  </center>
  </p>
  <br>
  <form action="" method="post">
    <table width="796" border="0" align="center" cellpadding="0" cellspacing="0" class="tab">
      <tr>
        <td width="32">&nbsp;</td>
        <th width="60" height="36"><div align="center" class="style1">ID</div></th>
        <th width="123"><div align="center" class="style1">Name</div></th>
        <th width="86"><div align="center" class="style1">Course</div></th>
        <th width="81"><div align="center" class="style1">Campus</div></th>
        <td width="111">&nbsp;</th>
        <td width="105">&nbsp;</th>
        <td width="99">&nbsp;</th>
      <td width="99">&nbsp;</th>      </tr>
      <?php
	  	$count = 0;
		if ($count==1) { 
	  ?>
      <tr>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td width="123">&nbsp;</td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td width="111"><div align="center">
          <table width="101" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="95">Login Account</td>
            </tr>
            <tr>
              <td>Accountability</td>
            </tr>
            <tr>
              <td>Enrollment Info</td>
            </tr>
            <tr>
              <td>Personal Data</td>
            </tr>
            <tr>
              <td>Student Directory</td>
            </tr>
          </table>
        </div></td>
        <td><table width="95" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="95">Grades/Sched</td>
          </tr>
          <tr>
            <td><a href="cso_vi">Grade Summary</a></td>
          </tr>
          <tr>
            <td>Study Plan</td>
          </tr>
          <tr>
            <td><a href="cso_enroll_student.php">Enroll</a></td>
          </tr>
          <tr>
            <td><a href="cso_edit_view_student_course.php">Course</a></td>
          </tr>
        </table></td>
        <td width="99"><table width="89" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="89"><a href="cso_add_delete_view_graduation_data.php">Graduation Data</a></td>
          </tr>
          <tr>
            <td>Scholarship</td>
          </tr>
          <tr>
            <td>STFAP Bracket</td>
          </tr>
          <tr>
            <td>Adviser</td>
          </tr>
          
        </table></td>
        <td width="99"><table width="89" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>Edit Academic Standing</td>
          </tr>
          <tr>
            <td width="99">Edit Yr. Level &amp; Max. Units</td>
          </tr>
          <tr>
            <td>Edit Student #</td>
          </tr>
          <tr>
            <td>Delete Record/Account</td>
          </tr>
          
        </table></td>
      </tr>
      <?php }?>
      <?php
	  	$query = new Query();
		$query->viewSearchResults();
	  ?>
    </table>
    <p>
      <center>
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
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
