<?php
	//require_once 'assessment.php';
	define('ATHLETICS','55');
	define('CULTURAL','50');
	define('ENERGY','250');
	define('INTERNET','260');
	define('LIBRARY','700');
	define('MEDICAL','50');
	define('REGISTRATION','40');
	$scholarship=0;
	function tuition($stfap)
	{
		//$t=0;;
		//if($stfap=='A') 
		$unit_cost=1000.00;
		//else $unit_cost=600.00;
		return $unit_cost;
	}
	
	function less_stfap($stfap,$a)
	{
		$less=0;
		if($stfap=='B') $less=$a*0.4;
		else if($stfap=='C') $less=$a*0.6;
		else if($stfap=='D') $less=$a*0.8;
		else if($stfap=='E1' or $stfap=='E2') $less=$a;
		return $less;
	}
	
	function laboratory()
	{
		$l=0;
		$lab_cost=300.00;
		$l=LAB*$lab_cost;
		return $l;
	}
	
	function less_miscellaneous($stfap)
	{
		//$v=0;
		$v = array(0,0,0,0,0,0,0);
		if($stfap=='E1' or $stfap=='E2')
		{
			$v=array(ATHLETICS,CULTURAL,ENERGY,INTERNET,LIBRARY,MEDICAL,REGISTRATION);
		}
		return $v;
	}
	
	function less_lab($stfap,$lab)
	{
		$l=0;
		if($stfap=='E1' or $stfap=='E2') $l=$lab;
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
	
	function special_case($total_amount,$less_stfap,$scholarship,$stfap)
	{
		$tf=0;
		if($scholarship>=$total_amount-$less_stfap)
		{
			if($stfap=='E1' or $stfap=='E2') $tf=0;
			else $tf=1;
		}
		return $tf;
	}
	
	function special_case_others($total_amount,$less_stfap,$scholarship)
	{
		$tf=0;
		if($scholarship>=$total_amount-$less_stfap) $tf=1;
		return $tf;
	}
	
	function miscell_scholarship($a,$tf)
	{
		if($tf==1) $r='E1';
		else $r='A';
		$arr = less_miscellaneous($r);
		return $arr;
	}
	
	function lab($a,$tf)
	{
		if($tf==1) $r=$a;
		else $r=0;
		return $r;
	}
	
	function others($a,$tf)
	{
		if($tf==1) $r=$a;
		else $r=0;
		return $r;
	}
	
	function total_deduct_scholarship($q,$w,$e,$r,$t,$y,$u,$i)
	{
		return $q + $w + $e + $r + $t + $y + $u + $i;
	}
	
	function new_scholarship($q,$w,$e,$r,$t,$y,$u,$i,$o)
	{
		$amount = $o - (total_deduct_scholarship($q,$w,$e,$r,$t,$y,$u,$i));
		return $amount;
	}
?>