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
	$d = (int)date('Y');
?>
<h1 align="center">ADD COURSE</h1>
<?php
	if(!(isset($_POST['error']))) $_POST['error'] = '';
	echo '<h4 align=center>'.$_POST['error'].'</h4>';
?>
<table align="center" class="tablestyle">
<form action="process.php" method="post" name="osaform">
<input type='hidden' name='error'>
	<tr>
		<td>Course Code</td>
		<td><input type="text" name="course_code"></td>
	</tr>
	<tr>
		<td>Course Title</td>
		<td><input type="text" name="subject_title"></td>
	</tr>
	<!--<td>Action Taken</td>
	<td>-->
<input type="hidden" name="action_taken" value="added">
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
<input name="fdate" type="hidden" value="0">
<input name="rdate" type="hidden" value="0">
<input name="abdate" type="hidden" value="0">
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
		<td>Lab Fee</td>
		<td><input type="text" name="lab_fee"></td>
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
		<td><input type="submit" name = "c" value="Add Course" onCLick=""></td>
	</tr>
</form>
<!--
<a href="process.php?c=AddSubject>blah</a>
-->
<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("addcourse");
  
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
<?php require_once 'footer.php' ?>