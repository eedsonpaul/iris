<?php

//connect to db

function admin_tracker($employee_id, $action_flag, $target_type, $id, $section_label) {
  $date = date("Y-n-d H:i:s", time()); //time of update, modification, addition, deletion of records
  $tracker = 'tracker.txt'; //file name of the log file
  $username = mysql_result(mysql_query("SELECT username FROM {employee} WHERE employee_id='$employee_id'"));
  if ($action_flag == 1) {
    $action = 'creates user ';
  } else if ($action_flag == 2) {
  	$action = 'edits user ';
  } else if ($action_flag == 3) {
  	$action = 'removes/blocks user ';
  } else if ($action_flag == 4) {
  	$action = 'adds accountability ';
  } else if ($action_flag == 5) {
  	$action = 'edits accountability ';
  } else if ($action_flag == 6) {
  	$action = 'removes accountability ';
  } else if ($action_flag == 7) {
  	$action = 'extends slots ';
  } else if ($action_flag == 8) {
  	$action = 'extends slots ';
  }
  if ($target_type == 1) { //student type
  	$target = $id;
  } else if ($target_type == 2) { //subject type
  	$target = $id . '-' . $section_label;
  }
  $handle = fopen($tracker, 'a') or die('Cannot open file:  '.$my_file); //append series of activities by the employee
  $log = $date . ' ' . $username . ' ' . $action . ' ' . $target . "\n"; //info to store
  echo $log; //show in page
  fwrite($handle, $log);
  fclose($handle);
}

/* 
  variables explained 

  $action = this depends upon where to insert the tracker function. if this is inserted in the create account part,
		this has the value of 'creates user'. likewise, if this is inserted in the accounting part, it could be
		'adds accountability' or 'removes accountability'. i'm having trouble implementing this one. if you have 
		an idea please do experiment.
  
  $target = the target of the action. creates user 'pgutib' or adds accountability 'pgutib'

  the logfile will be of this form:
  2010-9-29 16:04:47 esemorio creates pgutib
  2010-9-29 17:10:47 esemorio adds accountability pgutib
  2010-9-30 23:33:01 nenego removes accountability pgutib
  2010-10-03 11:33:05 fabecia adds section cmsc11-A
  2010-10-04 09:11:44 kcmiranda extends slot cmsc11-B

  we just have to clarify what functions do we need to track
*/
