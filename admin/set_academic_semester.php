<?php

function admin_semester() {
	$month = date("n", time());
	if ($month >= 6 and $month <= 10) {
		$semester = '1st Semester';
	} else {
		$semester = '2nd Semester';
	}
	return $semester;
}