

  <p>
  <table width="660" class="tablestyle">
  <tr>
    <th width='100'><font size='1'>SUBJECT </font></th>
    <th width='75'><font size='1'>SECTION</th>
    <th width='75'><font size='1'>UNITS</th>
    <th width='250'><font size='1'>SCHEDULE</th>
    <th width='100'><font size='1'>WAITLIST#</th>
    <th width='150'><font size='1'>STATUS</th>
    <th width='300'><font size='1'>ACTION</th>
  </tr>

  <?php

 $result=mysql_query("SELECT course_code,section_label,status,waitlist_counter from student_status where student_number='$student_number'");   
 $sub= mysql_num_rows($result);

  if($sub==0){
    echo "You do not have any subjects added yet";
  }   

  else{
    $index=0;
    while($row = mysql_fetch_array($result)){    
      $course_code[$index] = $row['course_code'];  
      $section_label[$index] = $row['section_label'];
      $status[$index] = $row['status'];  
      $waitlist_counter[$index] = $row['waitlist_counter'];  
      $index++;
    }


    for($i = 0;$i < $index; $i++){
      echo "<tr id='subject-".$course_code[$i]."'>";
      echo "<td align='center' width='60'><font size='2'>" . $course_code[$i] . " (" . checkClassType($course_code[$i],$section_label[$i]) . ")</td>";
        echo "<td align='center' width='60'><font size='2'>" . $section_label[$i] . "</td>";
        echo "<td align='center' width='60'><font size='2'>" . checkUnits($course_code[$i]) . "</td>";
      echo "<td align='center' width='60'><font size='2'>" . checkDay($course_code[$i],$section_label[$i]) . " " . checkStartTime($course_code[$i],$section_label[$i]) . "-" . checkEndTime($course_code[$i],$section_label[$i]) . " "  . checkRoom($course_code[$i],$section_label[$i]) .  "</td>";
      echo "<td align='center' width='60'><font size='2'>" . $waitlist_counter[$i] . "</td>";
      echo "<td align='center' width='60'><font size='2'><span class='status-".$course_code[$i]."'>" . $status[$i] . "</td>";
      checkStatus($status[$i],$course_code[$i],$section_label[$i]);
      /*echo ' >>> <a href="student_remove_subject.php?subjectid='.$course_code[$i].'&sectionlabel='.$section_label[$i].'"> remove </a> </td>';*/
      echo ' >>> <span id="subjectaction" class="remove" course_code="'.$course_code[$i].'" section_label="'.$section_label[$i].'">remove</span></td>';
      echo "</tr>";
    }
  }


?>