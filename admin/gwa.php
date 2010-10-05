<?php

function admin_gwa($student_number, $semester, $academic_year, $access_level) {
  if ($access_level != /*whatever ids here*/) {
    return FALSE;
  }
  $res = mysql_query("SELECT completion_grade, subject_id FROM {grade} WHERE student_number='$student_number' AND semester='$semester' AND academic_year='$academic_year'"); //enrolled subjects per sem per year and their grades
  $total_grades = 0;
  $number_subjects = 0;
  while ($data = mysql_fetch_array($res)) {
	$total_grades = $total_grades + $data['completion_grade']; //get the total grades of each subject
	$number_subjects++; //get the total number of subjects enrolled for the partcular sem and year
  }
  $gwa = $total_grades / $number_subjects;
  return $gwa;
} //this function fetches the completion_grade from the table of grades

function admin_view_student_schedule($student_number, $semester, $academic_year, $access_level) {
  if ($access_level != /*whatever ids here*/) {
    return FALSE;
  }
  /*$res = mysql_query("SELECT subject_id, section_label FROM {student_status} WHERE semester='$semester' AND academic_year='$academic_year' AND student_number='$student_number'");
  while ($data = mysql_fetch_array($res)) {
    $subject_id = $data['subject_id'];
	$section_label = $data['section_label'];
	$res2 = mysql_query("");
  }*/
  $res = mysql_query("SELECT student_status.subject_id, student_status.section_label, section_schedules.start_time, section_schedules.end_time, section_schedules.day_of_the_week FROM {student_status} WHERE semester='$semester' AND academic_year='$academic_year' AND student_number='$student_number' INNER JOIN {section_schedules} ON student_status.subject_id=section_schedules.subject_id AND student_status.section_label=section_schedules.section_label");
  while ($data = mysql_fetch_array($res)) {
    $subject_id = $data['subject_id'];
	$subject_name = mysql_result(mysql_query("SELECT subject_name FROM {subject} WHERE subject_id='$subject_id'"));
	$day_of_the_week = $data['day_of_the_week'];
	$start_time = $data['start_time'];
	$end_time = $data['end_time'];
	$section_label = $data['section_label'];
  }
}