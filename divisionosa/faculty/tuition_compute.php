<?php
	require_once 'assessment.php';
	require_once 'assess.php';
	///Legend:
	//NO_OF_UNITS 			$unit			$u
	//LAB			$lab			$l
	//STFAP			$stfap[0]		$s
	//SCHOLARSHIP			$scholarship[0]	$c
	$u=$unit;
	$l=$lab;
	$s=$stfap[0];
	$c=$scholarship[0];
	function tuition($s,$u)
	{
		$t=0;
		$unit_cost=0;
		if($s=='A') $unit_cost=1000.00;
		else $unit_cost=600.00;
		$t=$u*$unit_cost;
		return $t;
	}
	
	function less_stfap($a,$s)
	{
		$less=0;
		if($s=='C') 		$less=$a*0.4;
		else if($s=='D')	$less=$a*0.7;
		else if($s=='E1' or $s=='E2') $less=$a;
		return $less;
	}
	
	function laboratory($l)
	{
		$l=0;
		$lab_cost=300.00;
		$l=$l*$lab_cost;
		return $l;
	}
	
	function less_miscellaneous($s)
	{
		//$v=0;
		$v = array(0,0,0,0,0,0,0);
		if($s=='E1' or $s=='E2')
		{
			$v=array(ATHLETICS,CULTURAL,ENERGY,INTERNET,LIBRARY,MEDICAL,REGISTRATION);
		}
		return $v;
	}
	
	function less_lab($s)
	{
		$l=0;
		if($s=='E1' or $s=='E2') $l=laboratory();
		return $l;
	}

	function less_scholarship($c)
	{
		$less=0;
		if($c) $less=$c;
		return $less;
	}
	
	function scholarship($c)
	{
		$scholar=0;
		$scholar=$c;
		return $scholar;
	}
	
	function total_less($a,$b)
	{
		return $a+$b;
	}
	function to_pay($a,$b)
	{
		$c=$a-$b;
		if($c<=0) $c=0;
		return $c;
	}
?>