<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Clerk</title>
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
<script type="text/JavaScript">

	function MM_preloadImages() { //v3.0
		var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
		var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
		if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
	}

	function MM_swapImgRestore() { //v3.0
		var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
	}

	function MM_findObj(n, d) { //v4.01
		var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
			d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
		if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
		for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
		if(!x && d.getElementById) x=d.getElementById(n); return x;
	}

	function MM_swapImage() { //v3.0
		var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
		if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
	}

</script>
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
</head>

<div id="fixcontent">
<body>
<p><img src="../cssandstuff/banner.jpg" width="1024" height="163">
<img src="../cssandstuff/mb1.1.jpg" width="140" height="30"><a href="../index.htm"></a><a href="/iris/admin_transact_user.php?action=Logout"><img src="../cssandstuff/mblogout.gif" width="121" height="30" border="0"></a><img src="../cssandstuff/mb1.2.jpg" width="33" height="30"><img src="../cssandstuff/mb1.3.jpg" width="730" height="30"><img src="../cssandstuff/mb1.4.gif" width="1024" height="33"></p>
<div id="navigation">
<!--
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
-->
<ul>
	<li><a href="clerk.php" name = "c" value="personal"> PERSONAL DATA </a></li>
	<li><a href="#" name = "c" value="student concerns">Student's Concerns</a></li>
    <li><a href="subject_management_module.php" name = "c" value="subject module">Courses Module</a></li>
    <li><a href="degree_programs.php" name = "c" value="degree module">Degree Programs Module</a></li>
    <li><a href="class_offering.php" name = "c" value="class offerings">Class Offerings Module</a></li>
    <li><a href="#" name = "c" value="registration">Registration/Enlistment</a></li>	    
</ul>
</div>
<div id="contentcolumn1">