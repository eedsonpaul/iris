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
  <p class="head"><strong>LOG-IN INFORMATION</strong></p>
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
  <?php
	$empID = $_GET['id'];
	
  ?>
  <form action="cso_process_add_employee_personal_info.php?action=ADD LOGIN INFO&id=<?php echo $empID;?>" method="post" name="csoform">
    <table width="542" border="0" align="center" class="tab">
      <tr>
        <td width="199"><div align="right"></div></td>
        <td width="12">&nbsp;</td>
        <td width="317">&nbsp;</td>
      </tr>
      <?php 
	  	include("connect_to_database.php");
		$query = "SELECT * from employee WHERE employee_id = $empID";
		$result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
	?> 
      <tr>
        <td><div align="right">Last Name:</div></td>
        <td>*</td>
        <td><input type="text" name="last_name" id="last_name" value="<?php echo $row['last_name'];?>" readonly ></td>
      </tr>
      <tr>
        <td><div align="right">First Name:</div></td>
        <td>*</td>
        <td><input type="text" name="first_name" id="first_name" value="<?php echo $row['first_name'];?>" readonly></td>
      </tr>
      <tr>
        <td><div align="right">Middle Name:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="middle_name" id="middle_name" value="<?php echo $row['middle_name'];?>" readonly></td>
      </tr>
      <tr>
        <td height="32"><div align="right">Gender:</div></td>
        <td>*</td>
        <td><select  name="gender" id="gender">
            <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
          </select></td>
      </tr>
      <tr>
        <td><div align="right">Login Name:</div></td>
        <td>*</td>
        <td><input type="text" name="login_name" id="login_name" value="<?php echo str_replace(" ",'',strtolower($first_name[0].$last_name));?>"></td>
      </tr>
      <?php 
	  	$query = "SELECT password from employee WHERE employee_id = '$empID'";
		$result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
			extract($row);
			$pass = $password;
		}
		if($pass!=NULL) {?>
      <tr>
        <td><div align="right">Password:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="password" id="password" value="<?php echo $password;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Re-typed Password:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="retyped_password" id="retyped_password" value="<?php echo $password;?>"></td>
      </tr>
      <tr>
        <td><div align="left"><strong>In case you forget your password</strong></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?php 
	  	} else {?>
        <tr>
        <td><div align="right">Password:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="password" id="password"></td>
      </tr>
      <tr>
        <td><div align="right">Re-typed Password:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="retyped_password" id="retyped_password"></td>
      </tr>
      <tr>
        <td><div align="left"><strong>In case you forget your password</strong></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <?php }
	  }?>
      <tr>
        <td><div align="right">Security Question.:</div></td>
        <td>*</td>
        <td><select name="security_question" id="security_question">
          <option value="0"></option>
          <option value="What was the name of your first school?">What was the name of your first school?</option>
          <option value="What is your favorite past-time?">What is your favorite past-time?</option>
          <option value="Who is your favorite teacher?">Who is your favorite teacher?</option>
          <option value="What is your father's middle name?">What is your father's middle name?</option>
          <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
          <option value="What is your pet's name?">What is your pet's name?</option>
          <option value="Who was your childhood hero?">Who was your childhood hero?</option>
          <option value="What is your bestfriend's name?">What is your bestfriend's name?</option>
          <option value="Where is your home town?">Where is your home town?</option>
          </select>        </td>
      </tr>
      <tr>
        <td><div align="right">Answer to Security Question:</div></td>
        <td>*</td>
        <td><input type="text" name="answer" id="answer"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td colspan="2"><a href="cso_process_generate_new_password.php?action=EMPLOYEE&id=<?php echo $empID;?>"><strong>Click Here to Generate New Password</strong></a></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>
      <center><input type="submit" name="add_student_record" id="add_student_record" value="UPDATE">
      </center>
    </p>
  </form>
  
  <script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("csoform");
    
  frmvalidator.EnableMsgsTogether();

  frmvalidator.addValidation("security_question","dontselect=0");
  frmvalidator.addValidation("answer","req","Please enter an Answer.");

  
</script>
  
  <p>&nbsp;</p>
</div>
</div>
</body>
</html>
