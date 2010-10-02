<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Remove Employee Record</title>
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
        <b>Unit: </b>
 	</p>
</div>
<?php 
	$act = $_GET['action'];?>
<div id="contentcolumn1">
	  <p class="head"><strong>Employee Record</strong></p>
    <p class="headfont"><strong>Remove Employee Record</strong></p>
    <p>&nbsp;</p>
  <form action="cso_remove_employee_record.php?action=FILTER" method="post">
    <table width="494" border="0" align="center">
      <tr>
        <td width="208"><div align="right"><strong>Search First Name/Last Name:</strong></div></td>
        <td width="11">&nbsp;</td>
        <td width="261"><input type="text" name="employee_first_name" id="employee_first_name"></td>
      </tr>
    </table>
    <p>
      <center><input title="Remove" type="submit" name="search_remove_employee" id="search_remove_employee" value="SEARCH"></a>
      </center>
    </p>
  </form>
  <br>
	<div class="head"><center><b><a href="cso_remove_employee_record.php?action=NORMAL">ALL</a></b></center></div>
	<br>
  <?php 
		if($act == "NORMAL") {
		?>
  <table width="614" border="0" align="center" cellpadding="0" cellspacing="0" class="tab">
      <tr>
        <th width="450" height="36"><div align="center" class="style1">Employee</div></th>
        <th width="164"><div align="center"><strong>Action</strong></div></th>
      </tr>
      <?php
  	include("connect_to_database.php");
	include("sql_queries.php");
	include("cso_views.php");	
	$count = 0;
	$query = new SqlQueries();
	$result = $query->querysql("SELECT * from employee order by last_name");
	while ($row = mysql_fetch_array($result)){
		extract($row);
		?>
		<tr>
        <td width="450" height="36"><div class="style1"><?php echo $row['last_name'].", ".$row['first_name'];?></div></td>
        <td width='164'><div align='center'><strong><a href="cso_process_remove_employee_record.php?action=REMOVE&id=<?php echo $row['employee_id'];?>" onclick=" return getconfirm('Are you sure you want to delete this room?')";>Remove</a></strong></div></td>
      	</tr>
	  <?php 
	  } ?>
    </table>
	<?php 
	} else if($act=="FILTER"){
	?>
	<table width="614" border="0" align="center" cellpadding="0" cellspacing="0" class="tab">
      <tr>
        <th width="450" height="36"><div align="center" class="style1">Employee</div></th>
        <th width="164"><div align="center"><strong>Action</strong></div></th>
      </tr>
      <?php
  	include("connect_to_database.php");
	include("sql_queries.php");
	include("cso_views.php");	
	$count = 0;
	$emp_name = $_POST['employee_first_name'];
	$query = new SqlQueries();
	$result = $query->querysql("SELECT employee_id from employee where first_name = '$emp_name' || last_name = '$emp_name'");
	while ($row = mysql_fetch_array($result)){
		extract($row);
		$emp_id = $row['employee_id'];
 
	  	$sql = "select * from employee where employee_id = '$emp_id'";
		$res = mysql_query($sql);
		while($row = mysql_fetch_array($res)){
		?>
		<tr>
        <td width="450" height="36"><div class="style1"><?php echo $row['first_name']." ".$row['last_name'];?></div></td>
        <td width='164'><div align='center'><strong><a href="cso_process_remove_employee_record.php?action=REMOVE&id=<?php echo $emp_id;?>" onclick=" return getconfirm('Are you sure you want to delete this room?')";>Remove</a></strong></div></td>
      	</tr>
	  <?php }
	  } ?>
    </table>
	<?php } ?>
  <p>&nbsp;</p>
</div>
</div>
</body>
</html>
