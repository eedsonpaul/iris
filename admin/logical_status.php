<?php

function admin_logical_status($student_number, $semester, $academic_year, $units, $access_level) {
  if ($access_level != /*whatever ids here*/) {
    return FALSE;
  }
  $res = mysql_query("SELECT completion_grade, subject_id FROM {grade} WHERE student_number='$student_number' AND semester='$semester' AND academic_year='$academic_year'"); //enrolled subjects per sem per year and their grades
  $total_units = 0;
  $achieved_units = 0;
  while ($data = mysql_fetch_array($res)) {
    $subject_id = $data['subject_id'];
    $units = mysql_result(mysql_query("SELECT units FROM {subject} WHERE subject_id='$subject_id'")); //get units per subject enrolled
    $total_units =  $total_units + $units; //get the total number of units of enrolled subjects
	$completion_grade = $data['completion_grade'];
	if ($completion_grade >= 3) { //total number of units of enrolled subjects that are passed
	  $achieved_units = $achieved_units + $units;
	}
  }
  $percent = ($achieved_units / $total_units) * 100;
  if ($percent >= 30 && $percent < 75) {
    $status = 'Warning';
  } else if ($percent >= 75 && $percent < 100) {
    $status = 'Probation';
  } else if ($percent == 100) {
    $status = 'PDQ';
  }
  mysql_query("UPDATE student SET academic_standing='$status' WHERE student_number='$student_number'");
  return $status;
}