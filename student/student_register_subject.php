
<?php
  require_once 'student_header.php';
?>

<div class = "main">

<script type="text/javascript">
  function addSubject(){
    window.open("student_search_subject.php", "info", "width=600,scrollbars=0,resizable=0");
  }
  function viewOpenClasses(){
    window.open("student_show_openclasses.php", "info", "width=600,scrollbars=0,resizable=0");
  }
  function viewTempForm5(){
    window.open("student_show_openclasses.php", "info", "width=600,scrollbars=0,resizable=0");
  }


// for subject ajax
$(document).ready(function(){

  $("#subjectaction").live("click",function(){
    var action = $(this).attr("class");
    var course_code = $(this).attr("course_code");
    var section_label = $(this).attr("section_label");

    if (action == "confirm")
      {
        // change the link
        $(this).text("unconfirm");
        $(this).addClass("unconfirm");
        $(this).removeClass("confirm");

        // start ajax    
        $.get('student_confirm_subject.php?subjectid='+course_code+'&sectionlabel='+section_label, function(data) {
        // change the status
        $(".status-"+course_code).html("confirmed");
        });
      }
    else if (action == "unconfirm") 
      {
        // change the link
        $(this).text("confirm");
        $(this).addClass("confirm");
        $(this).removeClass("unconfirm");

        // start ajax    
        $.get('student_unconfirm_subject.php?subjectid='+course_code+'&sectionlabel='+section_label, function(data) {
        // change the status
        $(".status-"+course_code).html("unconfirmed");
        });    
      }
    else if (action == "remove")
      {
        var rowtodelete = $("#subject-"+course_code);      
        $.get('student_remove_subject.php?subjectid='+course_code+'&sectionlabel='+section_label, function(data) {
        // remove the row
        $(rowtodelete).remove();
        });  
      }
  });  
});
</script>
<?php
    require_once 'student_navigation.php';
    require_once 'function_section.php';
    require_once 'function_section_schedule.php';
    require_once 'function_subject.php';
     $student_number = $_SESSION['student_number'];   
?>


<div id="right_side">

    <?php

     $res = mysql_query("SELECT first_name,middle_name,last_name,degree_program,year_level FROM student WHERE student_number='" .  $student_number . "' ");
     while($row = mysql_fetch_array($res)){
      echo $student_number;
      echo "    ".$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
      echo "<br>Degree Program:".$row['degree_program'];
      echo "    ".$row['year_level'];  
     }



  echo '<p><form><input type="submit" onclick="addSubject()" value="Add Subject">   <input type="submit" onclick="viewTempForm5()" value="Temp Form5">  <input type="submit" onclick="viewOpenClasses()" value="Open Classes"></form>';

    ?>  
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

function checkStatus($status,$course_code,$section_label){

      if($status=="confirmed"){
      /*echo '<td><a href="student_unconfirm_subject.php?subjectid='.$course_code.'&sectionlabel='.$section_label.'">unconfirm</a>';    */
      echo '<td><span id="subjectaction" class="unconfirm" course_code="'.$course_code.'" section_label="'.$section_label.'">unconfirm</span>';
      }
      else if($status=="unconfirmed"){
      /*echo '<td><a href="student_confirm_subject.php?subjectid='.$course_code.'&sectionlabel='.$section_label.'">confirm</a>';      */
      echo '<td><span id="subjectaction" class="confirm" course_code="'.$course_code.'" section_label="'.$section_label.'">confirm</span>';
      }
      else if($status=="waitlisted"){
        echo "<td>-------";
      }
}

?>  

</table>
<br>
Total Units Enlisted: <?php ?>
<br>
Units Confirmed: <?php ?>
</div>
</div>

<?php
  require_once 'student_footer.php';
?>
