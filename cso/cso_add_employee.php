<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Add Employee Record</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
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
    <p class="headfont"><strong>Add Employee Record</strong></p>
    <p>&nbsp;</p>
  <form action="cso_process_add_employee_personal_info.php?action=ADD EMPLOYEE ID" method="post" name="csoform">
    <table width="494" border="0" align="center">
      <tr>
        <td width="181"><div align="right"><strong>Enter Employee ID:</strong></div></td>
        <td width="12">&nbsp;</td>
        <td width="287"><input type="text" name="employee_id" id="employee_id"></td>
      </tr>
    </table>
    <p>
      <center><input type="submit" name="add_employee_record" id="add_employee_record" value="ADD"></center>
    </p>
  </form>
  
  <script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("csoform");
    
  frmvalidator.EnableMsgsTogether();

  frmvalidator.addValidation("employee_id","req","Please enter an Employee ID");
  frmvalidator.addValidation("employee_id","maxlen=11", "Maximum of 11 characters.");
  
  
</script>
  
  <p>&nbsp;</p>
</div>
<div id="container">
</body>
</html>
