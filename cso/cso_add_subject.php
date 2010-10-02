<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CSO Add Subject</title>
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
    <p class="headfont">&nbsp;</p>
  <p class="head"><strong>Add Subject</strong></p>
  <table width="650" border="0" align="center">
    <tr>
      <td class="tab">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <form action="cso_process_add_subject.php" method="post">
    <table width="506" border="0" align="center" class="tab">
      <tr>
        <td width="181"><div align="right">Subject RCode:</div></td>
        <td width="12">&nbsp;</td>
        <td width="299"><input type="text" name="subject_rcode" id="subject_rcode"></td>
      </tr>
      <tr>
        <td><div align="right">Subject Name/Title:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="subject_name" id="subject_name"></td>
      </tr>
      <tr>
        <td><div align="right">Full Name:</div></td>
        <td>&nbsp;</td>
        <td><input name="subject_full_name" type="text" id="subject_full_name" size="30"></td>
      </tr>
      <tr>
        <td><div align="right">Title:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="subject_title" id="subject_title"></td>
      </tr>
      <tr>
        <td><div align="right">Credited?:</div></td>
        <td>&nbsp;</td>
        <td><select name="credited_boolean" id="credited_boolean">
          <option value="0" selected>True</option>
          <option value="1">False</option>
        </select>        </td>
      </tr>
      <tr>
        <td><div align="right">Numeric Grades?:</div></td>
        <td>&nbsp;</td>
        <td><select name="numeric_grades_boolean" id="numeric_grades_boolean">
          <option value="0" selected>True</option>
          <option value="1">False</option>
        </select></td>
      </tr>
      <tr>
        <td><div align="right">Repeatable To:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="repeatable_to" id="repeatable_to"></td>
      </tr>
      <tr>
        <td><div align="right">Date Proposed:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="date_proposed" id="date_proposed"></td>
      </tr>
      <tr>
        <td><div align="right">Date Approved</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="date_approved" id="date_approved"></td>
      </tr>
      <tr>
        <td><div align="right">Date First Implemented:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="date_first_implemented" id="date_first_implemented"></td>
      </tr>
      <tr>
        <td><div align="right">Date Revision Impemented:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="date_revision_implemented" id="date_revision_implemented"></td>
      </tr>
      <tr>
        <td><div align="right">Date Abolished in Offerings:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="date_abolished_in_offerings" id="date_abolished_in_offerings"></td>
      </tr>
      <tr>
        <td><div align="right">Unit In-charged:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="unit_in_charged" id="unit_in_charged"></td>
      </tr>
      <tr>
        <td><div align="right">Laboratory Fee:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="laboratory_fee" id="laboratory_fee"></td>
      </tr>
      <tr>
        <td><div align="right">RGEP/NSTP/P.E. Name:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="rgep_nstp_pe_name" id="rgep_nstp_pe_name"></td>
      </tr>
      <tr>
        <td><div align="right">Description:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="description" id="description"></td>
      </tr>
      <tr>
        <td><div align="right">Units:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="units" id="units"></td>
      </tr>
      <tr>
        <td><div align="right">Minimum Year Level:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="minimum_year_level" id="minimum_year_level"></td>
      </tr>
      <tr>
        <td><div align="right">Degree Level:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="degree_level" id="degree_level"></td>
      </tr>
      <tr>
        <td><div align="right">Pre-requisites:</div></td>
        <td>&nbsp;</td>
        <td><input type="text" name="pre_requisites" id="pre_requisites"></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <p>
      <center><input type="submit" name="add_subject" id="add_subject" value="ADD Subject">
      </center>
    </p>
  </form>
  <p>&nbsp;</p>
</div>
</div>
</body>
</html>
