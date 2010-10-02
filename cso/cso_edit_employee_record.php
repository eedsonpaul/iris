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
<div id="contentcolumn1">
	  <p class="head"><strong>Employee Record</strong></p>
    <p class="headfont"><strong>Edit Employee Record</strong></p>
    <p>&nbsp;</p>
    <?php $act = $_GET['action'];?>
  <form action="cso_edit_employee_results.php?action=<?php echo $act;?>" method="post">
    <table width="494" border="0" align="center">
      <tr>
        <td width="208"><div align="right"><strong>Enter Employee First Name:</strong></div></td>
        <td width="11">&nbsp;</td>
        <td width="261"><input type="text" name="employee_first_name" id="employee_first_name"></td>
      </tr>
      <tr>
        <td><div align="right"><strong>Enter Employee Last Name</strong></div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="employee_last_name" id="employee_last_name"></td>
      </tr>
    </table>
    <p>
      <center><input title="Remove" type="submit" name="search_edit_employee" id="search_remove_employee" value="SEARCH"></a>
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
</div>
</body>
</html>
