<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UPC IRIS FORM 5</title>
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; }
.style4 {font-size: 9px}
.style5 {
	font-size: 16px;
	font-weight: bold;
}
.style7 {
	font-size: 11px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.style9 {font-size: 10; font-weight: bold; }
.style10 {font-family: Arial, Helvetica, sans-serif; font-size: 9px; font-weight: bold; }
.style12 {font-family: Arial, Helvetica, sans-serif; font-size: 7px; }
.style16 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; }
.style20 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style23 {font-size: 7}
.style25 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	font-style: italic;
	font-weight: bold;
}
.style27 {font-size: 8px}
.style30 {font-family: Arial, Helvetica, sans-serif; font-size: 8px; }
.style31 {font-size: 8.5px}
.style32 {font-family: Arial, Helvetica, sans-serif; font-size: 8.5px; }
-->
</style></head>
<?php
	$student_id = $_GET['id'];
	$semester = 0;
	$academic_year = 0;
	session_start();
	$_SESSION['student_number'] = $student_id;
	$_SESSION['current_semester'] = $semester;
	$_SESSION['current_year'] = $academic_year;
?>
<body>
<table width="1056" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><span class="style5">UPC IRIS Form 5</span></td>
    <td width="117" class="style5"><div align="right"></div></td>
  </tr>
  <tr>
    <td width="32" height="27"><span class="style7"><img src="logo.jpg" width="30" height="25" /></span></td>
    <td width="907"><span class="style7"> UP FORM 5. UNIVERSITY OF THE PHILIPPINES VISAYAS CERTIFICATE OF REGISTRATION (REV. 05-2010)</span></td>
    <td class="style7">Semester, AY</td>
  </tr>
</table>

<table width="1056" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">
    <div align="center" class="style3">
      	<table width="680" border="1" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="99"><div align="center">STUDENT NUMBER</div></td>
          		<td colspan="4">NAME (Last, Given, Middle)</td>
          		<td width="95">COLLEGE</td>
          		<td width="182">DEGREE</td>
        	</tr>
        	<tr>
          		<td>NATIONALITY</td>
          		<td width="65">GENDER</td>
          		<td width="77">CIVIL STATUS</td>
          		<td width="76">DATE OF BIRTH</td>
          		<td width="84">PLACE OF BIRTH</td>
          		<td>DEGREE LEVEL</td>
          		<td>STUDENT TYPE</td>
        	</tr>
      	</table>
    </div>
    </td>
    <td colspan="4">
    <div align="center" class="style3">
    	<table width="372" border="1" cellspacing="0" cellpadding="0">
        	<tr>
          		<td width="148">MAJOR</td>
          		<td width="139">MINOR</td>
          		<td width="85">YR LEVEL</td>
        	</tr>
        	<tr>
          		<td colspan="2">REGISTRATION STATUS</td>
          		<td>GRADUATING?</td>
        	</tr>
      	</table>
    </div>
    </td>
  </tr>
  <tr height="300">
    <td height="300" colspan="3"><div align="center"><span class="style1"><span class="style4"><span class="style4"><span class="style4"><span class="style1"></span></span></span></span></span>
      <table height="350" width="680" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td width="112" class="style3"><div align="center" class="style9">SUBJECTS</div></td>
          <td width="65" class="style3"><div align="center" class="style9">SEC</div></td>
          <td width="69" class="style3"><div align="center" class="style9">UNITS</div></td>
          <td width="82" class="style3"><div align="center" class="style9">DAYS</div></td>
          <td width="82" class="style3"><div align="center" class="style9">TIME</div></td>
          <td width="82" class="style3"><div align="center" class="style9">ROOM</div></td>
          <td width="82" class="style3"><div align="center" class="style9">CLASS TYPE</div></td>
          <td width="88" class="style3"><div align="center" class="style9">LAB FEE</div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
        </tr>
        <tr>
          <td class="style10">&nbsp;</td>
          <td class="style3">&nbsp;</td>
          <td class="style3">&nbsp;</td>
          <td class="style3">&nbsp;</td>
          <td class="style3">&nbsp;</td>
          <td class="style3">&nbsp;</td>
          <td class="style3">&nbsp;</td>
          <td class="style3">&nbsp;</td>
        </tr>
      </table>
    </div>
    </td>
    <td colspan="4" height="300"  valign="top"><div align="center">
      <table width="372" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td width="130" class="style12">&nbsp;</td>
          <td width="126" class="style12"><div align="center" class="style10">AMOUNT DUE</div></td>
          <td width="109" class="style12"><div align="center" class="style10">AMOUNT LESS</div></td>
        </tr>
        <tr>
          <td class="style30 style31">Tuition</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">Miscellaneous</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">&nbsp;&nbsp;&nbsp;&nbsp;Athletics</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">&nbsp;&nbsp;&nbsp;&nbsp;Cultural</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">&nbsp;&nbsp;&nbsp;&nbsp;Energy</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">&nbsp;&nbsp;&nbsp;&nbsp;Internet</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">&nbsp;&nbsp;&nbsp;&nbsp;Library</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">&nbsp;&nbsp;&nbsp;&nbsp;Medical</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">&nbsp;&nbsp;&nbsp;&nbsp;Registration</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">Student Fund</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">&nbsp;&nbsp;&nbsp;&nbsp;Community Chest</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">&nbsp;&nbsp;&nbsp;&nbsp;Publication</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">&nbsp;&nbsp;&nbsp;&nbsp;Student Council</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">Laboratory Fee</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">NSTP-CWTS / MS</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">Non-Citizen Fee</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">Entrance</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">Deposit</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">I.D. Fee</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">In Residence</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td class="style32">TOTAL</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td colspan="3" class="style32"><div align="right"></div>            <div align="right"></div></td>
          </tr>
        <tr>
          <td class="style32">LOAN</td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
          <td class="style16"><div align="right"><span class="style20"><span class="style23"><span class="style23"><span class="style1"><span class="style27"><span class="style4"></span></span></span></span></span></span></div></td>
        </tr>
        <tr>
          <td height="21" class="style32">AMOUNT PAYABLE</td>
          <td colspan="2" class="style10"><div align="center"></div>
            <div align="right"></div></td>
          </tr>
      </table>
		</div></td>
  </tr>
  <tr>
    <td width="277" height="41" class="style10" valign="top">TOTAL NUMBER OF UNITS</td>
    <td colspan="2" class="style10" valign="top">IF UNDERLOAD, SPECIFY REASON</td>
    <td width="70" class="style10"><div align="center">O.R. No.</div></td>
    <td width="109" class="style10"><div align="center">Date</div></td>
    <td width="75" class="style10"><div align="center">Amount Paid</div></td>
    <td width="112" class="style10"><div align="center">Collected By</div></td>
  </tr>
  <tr>
    <td height="37" rowspan="2" class="style10" valign="top">ADVISER: (Name and Signature)</td>
    <td width="132" height="27" class="style10" valign="top">STFAP BRACKET NUMBER</td>
    <td width="267" class="style10">&nbsp;</td>
    <td colspan="4" class="style10" valign="top">SCHOLARSHIP/PRIVILEGE</td>
  </tr>
  <tr>
    <td height="23" class="style10" valign="bottom">ENCODED BY</td>
    <td height="23" class="style10">&nbsp;</td>
    <td colspan="4" class="style10" valign="bottom">ENCODED BY</td>
  </tr>
  <tr>
    <td height="18" colspan="3" class="style10">PRESENT ADDRESS</td>
    <td colspan="4" rowspan="9" class="style9">
    <div align="center">
      <div align="center" class="style25">
        <table width="277" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><p align="center" class="style3">I hereby certify that all the information given in this form are true and correct. In consideration of my admission to the UNIVERSITY OF THE PHILIPPINES and of the priveleges of a student in this institution, I hereby promise and pledge to abide by and comply with all the rules and regulations laid down by competent authority in the University and in the College in which I am enrolled.</p>
                <p align="center" class="style3">Signature:_______________________</p></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            </tr>
          </table>
        </div>
    </div>
    </td>
  </tr>
  <tr>
    <td height="17" colspan="3" class="style10">TEL. NO.</td>
  </tr>
  <tr>
    <td height="16" colspan="3" class="style10">EMAIL ADDRESS</td>
  </tr>
  <tr>
    <td height="17" colspan="3" class="style10">PARENT/GUARDIAN/SPOUSE</td>
  </tr>
  <tr class="style10">
    <td height="17" colspan="3" class="style9">ADDRESS</td>
  </tr>
  <tr class="style10">
    <td height="15" colspan="3" class="style9">TEL. NO.</td>
  </tr>
  <tr class="style10">
    <td height="15" colspan="3" class="style9">NAME OF EMPLOYER</td>
  </tr>
  <tr class="style10">
    <td height="15" colspan="3" class="style9">ADDRESS</td>
  </tr>
  <tr class="style10">
    <td height="14" colspan="3" class="style9">TEL. NO.</td>
  </tr>
</table>

<p>_________________________________________________________________________________________________________________________________________</p>
</body>
</html>
