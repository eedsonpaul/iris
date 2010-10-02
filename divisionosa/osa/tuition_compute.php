<?php
	require_once 'assessment.php';
	define(STFAP,'E1');
	$scholarship=0;
	function tuition()
	{
		$t=0;
		$unit_cost=0;
		if(STFAP=='A') $unit_cost=1000.00;
		else $unit_cost=600.00;
		$t=NO_OF_UNITS*$unit_cost;
		return $t;
	}
	
	function less_stfap($a)
	{
		$less=0;
		if(STFAP=='C') 		$less=$a*0.4;
		else if(STFAP=='D')	$less=$a*0.7;
		else if(STFAP=='E1' or STFAP=='E2') $less=$a;
		return $less;
	}
	
	function laboratory()
	{
		$l=0;
		$lab_cost=300.00;
		$l=LAB*$lab_cost;
		return $l;
	}
	
	function less_miscellaneous()
	{
		//$v=0;
		$v = array(0,0,0,0,0,0,0);
		if(STFAP=='E1' or STFAP=='E2')
		{
			/*$v[0] = ATHLETICS;
			$v[1] = CULTURAL;
			$v[2] = ENERGY;
			$v[3] = INTERNET;
			$v[4] = LIBRARY;
			$v[5] = MEDICAL;
			$v[6] = REGISTRATION;*/
			$v=array(ATHLETICS,CULTURAL,ENERGY,INTERNET,LIBRARY,MEDICAL,REGISTRATION);
		}
		return $v;
	}
	
	function less_lab()
	{
		$l=0;
		if(STFAP=='E1' or STFAP=='E2') $l=laboratory();
		return $l;
	}

	function less_scholarship()
	{
		$less=0;
		if(SCHOLARSHIP) $less=SCHOLARSHIP;
		return $less;
	}
	
	function scholarship()
	{
		$scholar=0;
		$scholar=SCHOLARSHIP;
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