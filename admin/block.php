<?php

function admin_block($student_number) {
	$status = mysql_result(mysql_query("SELECT academic_standing FROM student WHERE student_number='$student_number'"));
	if ($status == 'PDQ' or $status == 'Dismissed' or $status == 'LOA2') {
		$block = 'blocked';
		return $block;
	}
}