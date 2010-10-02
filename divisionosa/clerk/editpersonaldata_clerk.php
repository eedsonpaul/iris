<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("../cssandstuff/default.css");

   body {
	width:102%;
	background-color: #FFF4F4;
	margin-left: 5px;
	margin-top: 5px;
   }
#Layer1 {
	position:absolute;
	width:200px;
	height:auto;
	z-index:1;
	left: 10px;
	top: 250px;
}
.style4 {color: #FF0000}
</style>
</head>

<div id="fixcontent">
<body>
<p><img src="../cssandstuff/banner.jpg" width="1024" height="163">
<img src="../cssandstuff/mb1.1.jpg" width="140" height="30"><a href="../index.htm"></a><a href="../index.htm"><img src="../cssandstuff/mblogout.gif" width="121" height="30" border="0"></a><img src="../cssandstuff/mb1.2.jpg" width="33" height="30"><img src="../cssandstuff/mb1.3.jpg" width="730" height="30"><img src="../cssandstuff/mb1.4.gif" width="1024" height="33"></p>
<div id="navigation">
<ul>
  <li> <a href="#"> PERSONAL DATA </a>
  	<ul>
    	<li><a href="clerk.php">division staff Profile </a></li>
        <li><a href="#">Edit login account</a></li>
        <li><a href="editpersonaldata_clerk.php">edit personal data</a></li>
	  </ul>
	</li>
	
	<li> <a href="#">Student's Concerns</a>
  	  <ul>
  		<li><a href="#">Add Student Record</a></li>
  		<li><a href="#">Student's Accountabilities Module</a></li>
        <li><a href="#">Change Student's Degree Module</a></li>
	  </ul>
	</li>
    <li> <a href="#">Subject</a>
  	  <ul>
  		<li><a href="subject_management_module.php">Subject Management Module</a></li>
	  </ul>
	</li>
    <li> <a href="#">Degree Programs</a>
  	  <ul>
  		<li><a href="degree_programs.php">Degree Programs Management Module</a></li>
	  </ul>
	</li>
    <li> <a href="#">Classes</a>
  	  <ul>
  		<li><a href="class_offering.php">Class Offerings Management Module</a></li>
        <li><a href="#">Print Class Offerings</a></li>
	  </ul>
	</li>
    <li> <a href="#">Registration/Enlistment</a>
  	  <ul>
  		<li><a href="#">View Room Utilization</a></li>
  		<li><a href="#">View All Offerings(including from Other Units)</a></li>
        <li><a href="student_record.php">Student Record Management</a></li>
        <li><a href="#">View Faculty Schedule</a></li>
	  </ul>
	</li>	    
</ul>

</div>
<div id="contentcolumn1">
    <p align="left" class="style4">employee's personal data content here </p>
  <h4 align="right">First Semester, &nbsp; A.Y.2010-2011 </h4>
    <h4>personal data</h4>
    <form action="" method="post">
    <table cellpadding="1" cellspacing="2">
      <tr>
        <td>First Name :</td>
        <td><input type="text" name="fname" value="Lai Zhen"/></td>
      </tr>
      <tr>
        <td>Middle Name</td>
        <td><input type="text" name="mname" value="Azumi"/></td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td><input type="text" name="lname" value="Azumi"/></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><input type="radio" name="gender" value="m"/>Male<input type="radio" name="gender" value="f"/>Female</td>
      </tr>
      <tr>
        <td>Housing Type</td>
        <td><select name="house_type">
        		<option value="0">House</option>
                <option value="1">Dorm</option>
                <option value="2">Hotel</option>
            </select>
        </td>
      </tr>
      <tr>
        <td>House number</td>
        <td><input type="text" name="house_num" value="497-B"/></td>
      </tr>
      <tr>
        <td>Street Address</td>
        <td><input type="text" name="street_add" value="Borbajo Street"/></td>
      </tr>
      <tr>
        <td>Barangay Address</td>
        <td><input type="text" name="bar_add" value="bacayan"/></td>
      </tr>
      <tr>
        <td>City Address</td>
        <td><input type="text" name="c_add" value="Cebu City"/></td>
      </tr>
      <tr>
        <td>Address Landline Contact Number</td>
        <td><input type="text" name="contact_num" value="321-4533"/></td>
      </tr>
      <tr>
        <td>Contact Number (cell no?)</td>
        <td><input type="text" name="cell_num" value="09288367153"/></td>
      </tr>
      <tr>
        <td>Civil Status</td>
        <td><select name="status">
        		<option value="0">Single</option>
                <option value="1">Married</option>
                <option value="2">Widowed</option>
                <option value="3">Divorced</option>
        	</select>
        </td>
      </tr>
      <tr>
        <td>Country of Citizenship</td>
        <td><input type="text" name="coc" value="Philippines"/></td>
      </tr>
      <tr>
        <td>Birthdate</td>
        <td><input type="text" name="bdate" value="January 30, 1977"/></td>
      </tr>
      <tr>
        <td>Birthplace</td>
        <td><input type="text" name="bplace" value="Bogo, Cebu"/></td>
      </tr>
      <tr>
        <td>Email Address</td>
        <td><input type="text" name="email" value="21121@yahoo.com"/></td>
      </tr>
      <tr>
        <td>Dependent</td>
        <td><input type="text" name="dname" value="Henry Sy"/></td>
      </tr>
      <tr>
        <td>Dependent contact no.</td>
        <td><input type="text" name="dcontact" value="765-3937"/></td>
      </tr>
      <tr>
        <td>Dependent address</td>
        <td><input type="text" name="dadd" value="Somewhere in the Middle..."/></td>
      </tr>
      <tr>
        <td>Emergency contact person</td>
        <td><input type="text" name="ename" value="Lucia Tan"/></td>
      </tr>
      <tr>
        <td>Emergency contact no.</td>
        <td><input type="text" name="econtact" value="675-8888"/></td>
      </tr>
      <tr>
        <td>Emergency address</td>
        <td><input type="text" name="eadd" value="Beyond the Box..."/></td>
      </tr>
      <tr>
        <td>Employee Designation</td>
        <td><select name="designation">
        	<option value="0">Newbie Teacher</option>
            <option value="0">Adept Professor</option>
            <option value="0">MASTER PROFESSOR 5000</option>
        	</select>
        </td>
      </tr>
      <tr>
        <td>Division</td>
        <td><input type="text" name="division" value="Computer Science"/></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Save Changes"></td>
      </tr>
    </table>
    </form>
</div>
</body>
</div>
</html>
