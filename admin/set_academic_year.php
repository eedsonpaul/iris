<?php

function admin_academic_year() {
	$year = date("Y", time());
	$month = date("n", time());
	if ($month <= 5) {
		$lower_bound = $year - 1;
		$upper_bound = $year;
	} else {
		$lower_bound = $year;
		$upper_bound = $year + 1;
	}
	$academic_year = $lower_bound . '-' . $upper_bound;
	return $academic_year;
}
