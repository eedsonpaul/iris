<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Subject Management Module</title>
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
</head>

<body>
<div id="container">
<p><img src="banner.jpg" width="1024" height="163">
<img src="mb1.1.jpg" width="140" height="30"><a href="index.htm"></a><a href="index.htm"><img src="mblogout.gif" width="121" height="30" border="0"></a><img src="mb1.2.jpg" width="33" height="30"><img src="mb1.3.jpg" width="730" height="30"><img src="mb1.4.gif" width="1024" height="33"></p>

<div id="headlabel">
	<p>
    	<b>Employee ID :</b> &nbsp; 101135299 <br>
      	<b>Name &nbsp; :</b> &nbsp; OMPAD, ANECITA T <br>
      	<b>Designation :</b> &nbsp; Clerk IV <br>
        <b>Unit: </b> 	</p>
</div>
<div id="contentcolumn1">
  

  <table width="650" border="0" align="center">
    <tr><form action="" method="post">
      <td width="624"><div align="center"><strong>Look for</strong> 
        <input name="search_subject" type="text" id="search_subject" size="50">
        <input type="submit" name="search_subject_button" id="search_subject_button" value="Submit">
      </div></td></form>
    </tr>
  </table>
  <table width="650" border="0" align="center">
    <tr>
      <td height="50"class="tab"><p align="left"><strong><center>
        ALL | A | B | C | D | E | F | G | H | I | J | K | L | M | N | O | P | Q | R | S | T | U | V | W | X | Y | Z
      </center></strong></p>      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <form action="" method="post">
    <table width="797" border="0" align="center" class="tab">
      <tr>
        <th width="75" height="36"><div align="center"><strong>Subject Rcode</strong></div></td>
        <th width="271"><div align="center"><strong>Subject Name / Title</strong></div></td>
        <th width="46"><div align="center"><strong>Units</strong></div></td>
        <th width="86"><div align="center"><strong>Minimum Year Level</strong></div></td>
        <th width="81"><div align="center"><strong>Degree Level</strong></div></td>
        <th width="87"><div align="center"><strong>Pre-requisites</strong></div></td>
      	<th width="121"><div align="center"><strong>Action</strong></div></td>      </tr>
      
        <?php
			include("connect_to_database.php");
			$query = "SELECT *from subject";
			$result = mysql_query($query);
        	while ($row = mysql_fetch_array($result)) {
				extract($row);       
			?>
      <tr>
        <td><div align="right"><strong><?php echo $course_code;?></strong></div></td>
        <td><strong><?php echo $subject_title;?></strong><br>
        <strong>Full Name:</strong> <?php echo $subject_title;?><br>
        <strong>Title:</strong> <?php echo $subject_title;?><br>
        <strong>Credited?:</strong> true<br>
        <strong>Numeric Grades?:</strong> true<br>
        <strong>Repeatable To:</strong> <?php echo $repeatable_to;?><br>
        <strong>Date Proposed:</strong> <?php echo $date_proposed;?><br>
        <strong>Date Approved:</strong> <?php echo $date_approved;?><br>
        <strong>Date First Implemented:</strong> <?php echo $date_first_implemented;?><br>
        <strong>Date Revision Implemented:</strong> <?php echo $date_revision_implemented;?><br>
        <strong>Date Abolished in Offerings:</strong> <br>
        <strong>Unit In-charged:</strong> <?php echo $unit_in_charge;?><br>
        <strong>Laboratory Fee:</strong> <?php echo $laboratory_fee;?><br>
        <strong>RGEP/NSTP/P.E. Name:</strong> <br>
        <strong>Description:</strong> </td>
        <td><div align="center"><?php echo $units;?></div></td>
        <td><div align="center"><?php echo $minimum_year_level;?></div></td>
        <td><div align="center"><?php echo $degree_level;?></div></td>
        <td><div align="center"><?php echo $pre_requisites;?></div></td>
        <td><strong>Edit Remove</strong></td>
      </tr>
      <?php } ?>
    </table>
    <p>
      <center>
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
</div>
</body>
</html>
