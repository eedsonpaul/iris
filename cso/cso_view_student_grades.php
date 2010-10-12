<?php 
  session_start();
  include("cso_functions.php");
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
  
<script language="JavaScript" src="masks.js" type="text/JavaScript"></script>

<script language="JavaScript">

	function init(){
		document.csoform.reset();
		
		oStringMask = new Mask("#########");
		oStringMask.attach(document.csoform.student_id);
		
		oStringMask = new Mask("####");
		oStringMask.attach(document.csoform.start_ay);
		
		oStringMask = new Mask("#########");
		oStringMask.attach(document.csoform.search_subject);
	
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

<!-- ako gidagdag nalang manually ang naa sa taas na codes. from cso_header.php
		since dili man siya mag-need sa [navigation] na div .. -->
		
<?php
//File: CSO Student Grades Page
//Version 1: Date: October 06, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

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

<div class="main">
<?php
	$stud_num = $_GET['id'];
	$first_name = "";
	$last_name = "";
	$middle_name = " ";
	$degree_id = "";
	$degree = "";
	$name = "";
	$ay = "";
	$cur_ay = $_SESSION['academic_year'];
	$cur_sem = $_SESSION['semester'];
	
	$query = "SELECT * FROM student WHERE student_number = '$stud_num'";
	$result = mysql_query($query);
	while($student = mysql_fetch_array($result)) {
		$first_name = $student['first_name'];
		$last_name = $student['last_name'];
		$middle_name = $student['middle_name'];
		$degree_id = $student['degree_program'];
	}
	
	$name = $last_name.", ".$first_name." ".$middle_name[0];
	 
	$query = "SELECT * FROM degree_program WHERE degree_program_id = '$degree_id'";
	$result = mysql_query($query);
	while($deg = mysql_fetch_array($result)) {
		$degree = $deg['degree_name'];
	}
?>
<div id="whole">
	<p><a href='javascript:history.go(-1)'>&larr;Back</a></p>
    <table width="350" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="133" class="normaltext"><div align="right"><b>Student Number</b></div></td>
        <td width="10"><div align="center"><b>:</b></div></td>
        <td width="207" class="tab"><?php echo $stud_num; ?></td>
      </tr>
      <tr>
        <td><div align="right" class="normaltext"><b>Name </b></div></td>
        <td><div align="center"><b>:</b></div></td>
        <td class="tab"><?php echo $name; ?></td>
      </tr>
      <tr>
        <td><div align="right" class="normaltext"><b>Degree Program</b></div></td>
        <td><div align="center"><b>:</b></div></td>
        <td class="tab"><?php echo $degree; ?></td>
      </tr>
    </table>
    <p align="center" class="head"><b>VIEW GRADES</b><br>
    </p>

	<form action="" method="post">
		<table width="800" border="0" align="center" class="tab">
			<tr>
			  <th width="30">              
				<div align="center">#</div>
			  <th width="119" height="36"><div align="center"><strong>Academic Year</strong></div></td>
				<th width="104"><div align="center"><strong>Semester</strong></div></td>
				<th width="148"><div align="center"><strong>Previous Semester <br />Class Standing</strong></div></td>
				<th width="143"><div align="center"><strong>Current Semester <br />
				  Class Standing</strong></div>
				<th width="134">        <div align="center">G.W.A</div>
				<th width="92"><div align="center"><strong>Action</strong></div></td>      	</tr>
      
        <?php
			include("connect_to_database.php");
			$count = 1;
			$semester = $_SESSION['sem'];
			$academic_year = $_SESSION['ay'];
			$ay = "";
			$sem = "";
			$standing = "";
			$semname = "";
			$cgrade = 0;
			$grade = 0;
			$grades = 0;
			$units = 0;
			$unit = 0;
			$index = 0;
			$c = 1;
			$cc = 0;
			$prev_ay = "";
			$prev_sem = "";
			$bleh = 0;
			$que = "SELECT academic_year, semester FROM grade WHERE student_number = '$stud_num' order by academic_year";
			$resu = mysql_query($que);
			/*while( $row = mysql_fetch_array($resu)) {
				$bleh++;
			}
			
			echo "<script> alert('$bleh'); </script>";*/
				
		
			while( $row = mysql_fetch_array($resu)) {
				$ayz = $row['academic_year'];
				$semzz = $row['semester'];
				if($prev_ay != $ayz || $prev_sem != $semzz) {
				
					$query1 = "SELECT * FROM semester WHERE semester_id = '$semzz'";
					$result1 = mysql_query($query1);
					while($sems = mysql_fetch_array($result1)) {
						$semname = $sems['semester_type'];
					}

					$grades = getGWA($stud_num,$ayz, $semzz);
					$_SESSION['prev_standing'] = $standing;
					$standing = getClassStanding($stud_num,$ayz, $semzz);
				
		?>
			<tr>
			  <td><center><?php echo $count;?>.</center></td>
				<td><div align="center"><?php echo $start = ($ayz-1).' - '.$ayz;?></div></td>
				<td><div align="center"><?php echo $semname;?></div></td>
				<td><div align="center"><?php if($count==1){ echo 'N/A'; } else { echo $_SESSION['prev_standing'];}?></div></td>
				<td><div align="center"><?php echo $standing;?></div></td>
				<td><div align="center"><?php echo number_format($grades, 2, '.', '');?></div></td>
				<td><div align="center"><a href="cso_view_student_grade_ind.php?id=<?php echo $stud_num;?>&sem=<?php echo $semzz;?>&ay=<?php echo $ayz;?>">VIEW</a></div></td>
			</tr>
		<?php 	 
				$count++;
				}
				$prev_ay = $ayz;
				$prev_sem = $semzz;

				}		
		?>
		</table>
    <p>
      <center>
      </center>
    </p>
	</form>
	<p>&nbsp;</p>
</div>
<?php
//Page Footer
	require_once 'cso_footer.php';
?>

