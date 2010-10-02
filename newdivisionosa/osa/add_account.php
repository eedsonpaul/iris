<?php require_once 'header.php' ?>
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
		
		oStringMask = new Mask("##:##");
		oStringMask.attach(document.osaform.stime);
		
		oStringMask = new Mask("##:##");
		oStringMask.attach(document.osaform.etime);
		
	}
	//-->
	</script>
<?php
	include("osa_functions.php");
	$r = (int)date('Y');
?>
<h1 align="center">Add accountability</h1>
<table align="center">
<form action="process_osa.php" method="post" name="osaform">
	<input type="hidden" name="aid" value="0">
	<tr>
		<td>Accountability Type</td>
		<td><select name="atype">
			<!--<option value="" selected>Select Accountability Type</option>-->
			<option value="3" selected>Student Affairs</option>
<!-- 
options_account()
-->
			</select></td>
	</tr>
	<tr>
		<td>Student Number</td>
		<td><input type="text" name="snum"></td>
	</tr>
	<tr>
		<td>Details</td>
		<td><input type="text" name="details"></td>
	</tr>
	<tr>
		<td>Amount Due</td>
		<td><input type="text" name="adue"></td>
	</tr>
	<tr>
		<td>Year Incurred</td>
		<td><input type="text" name="year"></td>
	</tr>
	<tr>
		<td>Semester Incurred</td>
		<td><select name="sem">
			<option value="" selected>Select Semester</option>
			<option value="1">First Semester</option>
			<option value="2">Second Semester</option>
			</select></td>
	</tr>
	
<input type="hidden" name="date_added">
<input type="hidden" name="eid" value="2">

	<tr>
		<td>Accountability Status</td>
		<td><select name="astat">
			<option value="" selected>Select Status</option>
			<option value="pending">Pending</option>
			<option value="cleared">Cleared</option>
		</select></td>
	</tr>
<input type="hidden" name="date_cleared" value="0">
	<tr>
		<td></td>
		<td><input type="submit" value="Add Accountability" name="osa"></td>
	</tr>
</form>

<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("osaform");
    
  frmvalidator.EnableMsgsTogether();

  frmvalidator.addValidation("section_label","alphanum","Invalid Section Label.");
  frmvalidator.addValidation("room","alphanum","Invalid Room.");
  frmvalidator.addValidation("tslots","num","Invalid total slot input.");
  frmvalidator.addValidation("aslots","num","Invalid available slot input.");
  frmvalidator.addValidation("ccount","num","Invalid confirmed count input.");
  frmvalidator.addValidation("ecount","num","Invalid enrollment count input.");
  frmvalidator.addValidation("ctype","alphanum","Invalid total slot input.");
  
  frmvalidator.addValidation("section_label","req","Section Label required.");
  frmvalidator.addValidation("room","req","Room required.");
  frmvalidator.addValidation("tslots","req","Total slots required.");
  frmvalidator.addValidation("aslots","req","Available slots required..");
  frmvalidator.addValidation("ccount","req","Confirmed count required..");
  frmvalidator.addValidation("ecount","req","Enrolled count required..");
  frmvalidator.addValidation("ctype","req","Class Type required.");
  
  frmvalidator.addValidation("stime","req","Start time required.");
  frmvalidator.addValidation("etime","req","End time required.");
  frmvalidator.addValidation("day","dontselect=0");
  
  
</script>

</table>
<?php 'footer.php' ?>