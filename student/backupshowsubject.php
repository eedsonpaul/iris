<?php

	require 'dbconnect.php';
	session_start();
    $student_number = $_SESSION['student_number'];	 
	 $subject_name=$_POST['subject']; // from year
	echo "ADD SUBJECT HERE";

?>


<html>
<head>
<title>Search Subject</title>
</head>
<body>


   <form name="form1" method="post" action="student_show_subject.php">
   <p>Subject: <input type="text" name="subject"  id="subject" />
   <input type="submit" name="search" value="Search">
   </form>

   
<?php

echo "<table width='80%' align='center border='1'>";
print "<tr>
		<th>SUBJECT</th>
		<th>SECTION</th>
		<th>AVAILABLE SLOTS</th>
		<th>CONFIRMED</th>
		<th>WAITLISTED</th>
		</tr>";

	print "</table>"; 


 $result=mysql_query("SELECT subject_id,subject_name,units from subject where subject_name='$subject_name'");	 
 $subs = mysql_num_rows($result);
	  while($row = mysql_fetch_array($result)){		
		$id = $row['subject_id'];	
	 }
if($subs==0){
	echo "I'm sorry no results were found.";
 }	 
 
 else{

 $res=mysql_query("SELECT section_label,available_slots,confirmed_count,waitlist_count from section where subject_id='$id'");	
 $count = mysql_num_rows($res);
 $counter=0;
 $index=0;
	 while($row = mysql_fetch_array($res)){		
		$section_label[$index] = $row['section_label'];	
		$available_slots[$index] = $row['available_slots'];
		$confirmed_count[$index] = $row['confirmed_count'];	
		$waitlist_count[$index] = $row['waitlist_count'];
		$index++;
	  }
	while($counter<$count){
		print "<tr>
		<th> $subject_name;</th>
		<th>$section_label[$counter];</th>
		<th>$available_slots[$counter];</th>
		<th>$confirmed_count[$counter];</th>
		<th>$waitlist_count[$counter];</th>
		<br>
		</tr>";
		$counter++;
	}
	print "</table>"; 
}	
?>
   
<a href="student_add_subject.php">Add</a>
   
   
   

</body>
</html>

