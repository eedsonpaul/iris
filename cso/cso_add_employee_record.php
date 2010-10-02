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
    <p class="headfont"><strong>Add Employee Record</strong></p>
  <p class="head"><strong>Personal Information</strong></p>
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
   include ("connect_to_database.php");
   include ("sql_queries.php");
   $empID = $_GET['id'];
  	$action = $_GET['action'];
	$value = "";
	$path = "";
	
	if ($action == "ADD") {
		$value = "ADD";
		$path = "cso_process_add_employee_personal_info.php?action=ADD PERSONAL INFO&id=$empID";
	} else if ($action == "EDIT") {
		$value = "UPDATE";
		$path = "cso_process_add_employee_personal_info.php?action=EDIT PERSONAL DATA&id=$empID";
	}
  ?>
	<form action="<?php echo $path;?>" method="post" name="csoform">
    <table width="504" border="0" align="center" class="tab">
     <tr>
        <td width="191"><div align="right"></div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right">Employee ID:</div></td>
        <td width="12">*</td>
        <td colspan="2"><?php echo $empID;?></td>
      </tr>
      <?php 
	    $query = new SqlQueries();
	    $result = $query->querysql("SELECT * from employee where employee_id = '$empID'");
	    while ($row = mysql_fetch_array($result)){
		extract($row);
      ?>
      <tr>
        <td><div align="right">Last Name:</div></td>
        <td width="12">*</td>
        <td colspan="2"><input name="last_name" type="text" id="last_name" value="<?php echo $row['last_name'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">First Name:</div></td>
        <td width="12">*</td>
        <td colspan="2"><input type="text" name="first_name" id="first_name" value="<?php echo $row['first_name'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Middle Name:</div></td>
        <td width="12">*</td>
        <td colspan="2"><input type="text" name="middle_name" id="middle_name" value="<?php echo $row['middle_name'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Maiden Name:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input type="text" name="maiden_name" id="maiden_name" value="<?php echo $row['maiden_name'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Gender:</div></td>
        <td width="12">*</td>
        <td colspan="2"><select name="gender" id="gender">
        	<?php 
				if($action=="EDIT"){
				?>
        		<option selected value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
                <option value="Female">Female</option>
          		<option value="Male">Male</option>
                <?php 
					} else if($action=="ADD") {?>
		  		<option value="" selected>Select Gender</option>
          		<option value="Female">Female</option>
          		<option value="Male">Male</option>
                <?php }?>
        </select></td>
      </tr>
      <tr>
        <td><div align="right">Unit:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><label>
          <select name="unit_id" id="unit_id">
            <option value="0">Choose Unit</option>
           <?php 
		 	$query = "SELECT * from unit";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
			?>
            <option value="<?php echo $unit_id;?>"><?php echo $unit_name;?></option>
			<?php }
			?>
          </select>
          </label>
		  </td>
      </tr>
      <tr>
        <td><div align="right">Designation:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><label>
          <select name="designation_list" id="designation_list">
            <option value="0">Choose Designation</option>
           <?php 
		 	$query = "SELECT * from designation";
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
				extract($row);
			?>
            <option value="<?php echo $designation_id;?>"><?php echo $designation;?></option>
			<?php }
			?>
          </select>
          </label>
		  </td>
      </tr>
      <tr>
        <td><div align="right">Employee Type:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input type="text" name="employee_type" id="employee_type" value="<?php echo $row['employee_type'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Housing Type:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="housing_type" id="housing_type" value="<?php echo $row['housing_type'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Citizenship:</div></td>
        <td>&nbsp;</td>
        <td colspan="2"><input type="text" name="citizenship" id="citizenship" value="<?php echo $row['citizenship'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Civil Status:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input type="text" name="civil_status" id="civil_status" value="<?php echo $row['civil_status'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Birthdate:</div></td>
        <td width="12">*</td>
        <td colspan="2"><input type="text" name="birthdate" id="birthdate" value="<?php echo $birthdate;?>">(yyyymmdd)</td>
      </tr>
      <tr>
        <td><div align="right">LandLine/Mobile Phone #:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input type="text" name="phone_no" id="phone_no" value="<?php echo $row['contact_number'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Email Address:</div></td>
        <td width="12">*</td>
        <td colspan="2"><input type="text" name="email_address" id="email_address" value="<?php echo $email_address;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Spouse's Name:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input type="text" name="spouse_name" id="spouse_name" value="<?php echo $row['spouse_name'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Spouse's Phone Number:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input type="text" name="spouse_phone_number" id="spouse_phone_number" value="<?php echo $row['spouse_contact_number'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Father's Name:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input type="text" name="fathers_name" id="fathers_name" value="<?php echo $row['father_name'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Mother's Name:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input type="text" name="mothers_name" id="mothers_name" value="<?php echo $row['mother_name'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Parent's Address:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input name="parents_address" type="text" id="parents_address" size="40" value="<?php echo $row['parents_address'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Present Address:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input name="present_address" type="text" id="present_address" size="40" value="<?php echo $row['present_address'];?>"></td>
      </tr>
      <tr>
        <td><div align="right">Contact Person/Guardian's Name:</div></td>
        <td width="12">*</td>
        <td colspan="2"><input type="text" name="contact_person_name" id="contact_person_name" value="<?php echo $guardian;?>"></td>
      </tr>
      <tr>
        <td><div align="right">Contact Person's Address:</div></td>
        <td width="12">&nbsp;</td>
        <td colspan="2"><input type="text" name="contact_person_address" id="contact_person_address" value="<?php echo $row['guardian_address'];?>"></td>
      </tr>
	<?php }?>
      <tr>
        <td>&nbsp;</td>
        <td width="12">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right">
          <input type="submit" name="add_personal_data" id="add_personal_data" value="<?php echo $value;?>">
        </div></td>
        <td>&nbsp;</td>
        <td width="62"><div align="center">
          
        </div></td>
        <td width="221"></td>
      </tr>
	</table>
  </form>
  
  <script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("csoform");
    
  frmvalidator.EnableMsgsTogether();

  frmvalidator.addValidation("last_name","req","Please enter a last name.");
  frmvalidator.addValidation("first_name","req","Please enter a first name.");
  frmvalidator.addValidation("middle_name","req","Please enter a middle name.");
  //frmvalidator.addValidation("maiden_name","req","Please enter a maiden name.");
  frmvalidator.addValidation("gender","dontselect=0");
  frmvalidator.addValidation("email_address","req","Email Required.");
  frmvalidator.addValidation("email_address","email","Email format: name@name.com.");
  frmvalidator.addValidation("contact_person_name","req","Contact Person Required.");
  frmvalidator.addValidation("birthdate","req","Please enter a birthdate.");

  

  
</script>
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</div>
</body>
</html>
