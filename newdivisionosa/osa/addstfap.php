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
<?php
	require_once 'osa_functions.php';
	$d = (int)date('Y');
?>
<h1 align="center">Edit Stfap Bracket</h1>
<table align="center">
<form action="process_osa.php" method="post" name="osaform">
	<tr>
		<td width="100">Student ID</td>
		<td width="144"><input type="text" name="student_id"></td>
	</tr>
	<tr>
		<td>Stfap Bracket ID</td>
		<td><select name="bracket_id">
			<?php stfap() ?>
		</select></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Edit Student Bracket" name="osa"></td>
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
<?php 'footer.php' ?>