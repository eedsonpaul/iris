<html>
<head>
  <title>Welcome to UP Cebu IRIS!</title>
  <link rel="icon" href="img/seal2.png" type="image/x-icon">
  
  <script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  
  <Style>
BODY, P,TD{ font-family: Calibri; font-size: 10pt }
A{font-family: Calibri;}
B {	font-family : Calibri;	font-size : 12px;	font-weight : bold;}
</Style>
  
  <style type="text/css">
  @import url("css/body.css");
  </style>
  
  <script language="JavaScript" src="masks.js"></script>

<script language="JavaScript">
	<!--//
	var bShowTests = true;
	var oResults = {
		"browser": {
			"userAgent": navigator.userAgent,
			"appName": navigator.appName,
			"appVersion": navigator.appVersion,
			"appCodeName": navigator.appCodeName
		},
		"string": [],
		"date": [],
		"number": []
	};
	
	function writeOutput(v){
		document.write(v + "<br />");
	}
	
	function updateResults(m, v, e){
		if( m.value != e ){
			var i = oResults[m.type].length;
			oResults[m.type][i] = {
				"supplied": v,
				"value": m.value,
				"expected": e,
				"error": m.error.join("|"),
				"mask": m.mask
			};
		}
	}
	
	function postResults(){
		if( oResults.string.length + oResults.date.length + oResults.number.length == 0 ) return alert("No errors to report!");
		// form object
		var oForm = document.frmReport;
		// create serializer object
		var oSerializer = new WddxSerializer();
		// serialize WDDX packet
		oForm.wddx.value = oSerializer.serialize(oResults);
		oForm.submit();
	}

	function stringTest(v, m, e){
		if( !bShowTests ) return false;
		var oMask = new Mask(m);
		
		writeOutput("<b>mask:</b> "  + m);
		writeOutput("<b>string:</b> " + v);
		var n = oMask.format(v);
		if( e != n ) document.write("<font color=red>");
		writeOutput("<b>result:</b> " + n);
		writeOutput("<b>expected:</b> " + e);
		if( e != n ) document.write("</font>");
		writeOutput("<b>error:</b> " + ((oMask.error.length == 0) ? "n/a" : oMask.error.join("<br>")));
		writeOutput("");
		updateResults(oMask, v, e);
	}

	function numberTest(v, m, e){
		if( !bShowTests ) return false;
		var oMask = new Mask(m, "number");

		writeOutput("<b>mask:</b> "  + m);
		writeOutput("<b>string:</b> " + v);
		var n = oMask.format(v);
		if( e != n ) document.write("<font color=red>");
		writeOutput("<b>result:</b> " + n);
		writeOutput("<b>expected:</b> " + e);
		if( e != n ) document.write("</font>");
		writeOutput("<b>error:</b> " + ((oMask.error.length == 0) ? "n/a" : oMask.error.join("<br>")));
		writeOutput("");
		updateResults(oMask, v, e);
	}

	function dateTest(v, m, e){
		if( !bShowTests ) return false;
		var oMask = new Mask(m, "date");

		writeOutput("<b>mask:</b> "  + m);
		writeOutput("<b>string:</b> " + v);
		var n = oMask.format(v);
		if( e != n ) document.write("<font color=red>");
		writeOutput("<b>result:</b> " + n);
		writeOutput("<b>expected:</b> " + e);
		if( e != n ) document.write("</font>");
		writeOutput("<b>error:</b> " + ((oMask.error.length == 0) ? "n/a" : oMask.error.join("<br>")));
		writeOutput("");
		updateResults(oMask, v, e);
	}

	function init(){
		document.osaform.reset();
		
		oStringMask = new Mask("####/##/##");
		oStringMask.attach(document.osaform.pdate);
		
		oStringMask = new Mask("####/##/##");
		oStringMask.attach(document.osaform.apdate);
		
		oStringMask = new Mask("####/##/##");
		oStringMask.attach(document.osaform.fdate);
		
		oStringMask = new Mask("####/##/##");
		oStringMask.attach(document.osaform.rdate);
		
		oStringMask = new Mask("####/##/##");
		oStringMask.attach(document.osaform.abdate);
		
	}
	//-->
	</script>

</head>

<body onLoad="init();">
  <div id="banner">
    <a href="index.php"><img src="img/banner.jpg" width="930" height="163" border="0"></a>
  </div>
  </div>

<?php
	$d = (int)date('Y');
?>
<table>
<form action="verifystfap.php" method="post" name="osaform">
<tr>
<td width="100">Subject Code</td>
<td width="144"><input type="text" name="subject_code"></td>
</tr>
<tr>
<td>Course Code</td>
<td><input type="text" name="course_code"></td>
</tr>
<tr>
<td>Subject Name</td>
<td><input type="text" name="subject_name"></td>
</tr>
<tr>
<td>Subject Full Name</td>
<td><input type="text" name="subject_full"></td>
</tr>
<tr>
<td>Subject Title</td>
<td><input type="text" name="subject_title"></td>
</tr>
<!--<td>Action Taken</td>
<td>-->
<input type="hidden" name="action_taken" value="added">
<tr>
<td>Credited</td>
<td><select name="credited">
<option value="" selected>Select Option</option>
<option value="0">No</option>
<option value="1">Yes</option>
</select>
</td>
</tr>
<tr>
<td>Numeric Grades</td>
<td><select name="ngrades">
<option value="" selected>Select Option</option>
<option value="0">No</option>
<option value="1">Yes</option>
</select></td>
</tr>
<tr>
<td>Repeatable To</td>
<td><input type="text" name="repeatable_to"></td>
</tr>
<tr>
<td>Date Processed [yyyy-mm-dd]	</td>
<td><input name="pdate" type="text"></td>
<!--<td><input name="pmonth" type="text" value="mm" maxlength="2" width="40">
 <input name="pday" type="text" value="dd" maxlength="2" width="40">
  <input name="pyear" type="text" value="yyyy" width="55"></td>-->
</tr>
<tr>
<td>Date Approved [yyyy-mm-dd]	</td>
<td><input name="apdate" type="text"></td>
</tr>
<tr>
<td>Date First Implemented [yyyy-mm-dd]	</td>
<td><input name="fdate" type="text"></td>
</tr>
<tr>
<td>Date Revision Implemented [yyyy-mm-dd]	</td>
<td><input name="rdate" type="text"></td>
</tr>
<tr>
<td>Date Abolished [yyyy-mm-dd]	</td>
<td><input name="abdate" type="text"></td>
</tr>
<tr>
<td>Unit in Charge</td>
<td><input type="text" name="unit_in_charge"></td>
</tr>
<tr>
<td>Lab Fee PhP</td>
<td><input type="text" name="labfee"></td>
</tr>
<tr>
<td>RGEP/NSTP/PE Name</td>
<td><input type="text" name="rnpname"></td>
</tr>
<tr>
<td>Description</td>
<td><input type="text" name="desc"></td>
</tr>
<tr>
<td>Academic Year</td>
<td><select name="year">
<option value="<?php print(($d+1)) ?>"><?php print($d .'-'. ($d+1)) ?></option>
<option value="<?php print(($d+2)) ?>"><?php print(($d+1) .'-'. ($d+2)) ?></option>
</select></td>
</tr>
<tr>
<td>Units</td>
<td><input type="text" name="units"></td>
</tr>
<tr>
<td>Degree Level</td>
<td><select name="deg">
<option value="undergraduate">Undergraduate</option>
<option value="graduate">Graduate</option>
</select></td>
</tr>
<tr>
<td>Semester Offered</td>
<td><select name="sem">
<option value="1">First Semester</option>
<option value="2">Second Semester</option>
</select></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Add Subject"></td>
</tr>
</form>

<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("osaform");
    
  frmvalidator.EnableMsgsTogether();  
  
  frmvalidator.addValidation("subject_code","req","Subject Code required.");
  frmvalidator.addValidation("course_code","req","Course Code required.");
  frmvalidator.addValidation("subject_name","req","Subject Name required.");
  frmvalidator.addValidation("subject_full","req","Subject Full Name required..");
  frmvalidator.addValidation("subject_title","req","Subject Title required..");
  frmvalidator.addValidation("credited","dontselect=0");
  frmvalidator.addValidation("ngrades","dontselect=0");
  frmvalidator.addValidation("repeatable_to","req","Repeatable To field required..");
  frmvalidator.addValidation("unit_in_charge","req","Unit In Charge required..");
  frmvalidator.addValidation("labfee","req","Lab Fee required..");
  frmvalidator.addValidation("labfee","num","Lab Fee: Numbers only..");
  frmvalidator.addValidation("rnpname","req","RGEP/NSTP/PE Name required..");
  frmvalidator.addValidation("desc","req","Description required..");
  frmvalidator.addValidation("units","req","Units required..");
  frmvalidator.addValidation("units","num","Units: Numbers only..");
  

  
  
</script>

</table>
</body>
</html>