<?php
	require_once 'tuition_compute.php';
	require_once 'assess.php';
	//Define Miscellaneous
	define('ATHLETICS','55.00');
	define('CULTURAL','50.00');
	define('ENERGY','250.00');
	define('INTERNET','260.00');
	define('LIBRARY','700.00');
	define('MEDICAL','50.00');
	define('REGISTRATION','40.00');
	//Define Student Fund
	define('COMMUNITY_CHEST','0.50');
	define('PUBLICATION','40.00');
	define('STUDENT_COUNCIL','6.00');
	//Define Laboratory
	define('LABORATORY',300);
	//Define units confirmed
	///define('NO_OF_UNITS',$unit);
	//define no. of laboratories confirmed
	///define('LAB',$lab);
	//Determine STFAP Bracket
	///define('STFAP',$stfap[0]);
	//Define amount shouldered on scholarships
	///define('SCHOLARSHIP',$scholarship[0]);
	//$u=600;
	//$u*=(5/3);
	//print($u);
	//PRINT(TUITION);
	$lm=less_miscellaneous($stfap[0]);
	print_r($lm);
	//Initialize Tuition Row
	$a[0]=tuition();
	$a[1]=less_stfap($a[0]);
	$a[2]=less_scholarship();
	$a[3]=total_less($a[1],$a[2]);
	$a[4]=to_pay($a[0],$a[3]);
	//echo $a[0]-$a[3];
	
	//***Miscellaneous
		//**
		//Athletics
		$b[0]=ATHLETICS;
		$b[1]=$lm[0];
		$b[2]='';
		$b[3]=$lm[0];
		$b[4]=to_pay($b[0],$b[3]);
		//Cultural
		$c[0]=CULTURAL;
		$c[1]=$lm[1];
		$c[2]='';
		$c[3]=$lm[1];
		$c[4]=to_pay($c[0],$c[3]);
		//Energy
		$d[0]=ENERGY;
		$d[1]=$lm[2];
		$d[2]='';
		$d[3]=$lm[2];
		$d[4]=to_pay($d[0],$d[3]);
		//Internet
		$e[0]=INTERNET;
		$e[1]=$lm[3];
		$e[2]='';
		$e[3]=$lm[3];
		$e[4]=to_pay($e[0],$e[3]);
		//Library
		$f[0]=LIBRARY;
		$f[1]=$lm[4];
		$f[2]='';
		$f[3]=$lm[4];
		$f[4]=to_pay($f[0],$f[3]);
		//Medical
		$g[0]=MEDICAL;
		$g[1]=$lm[5];
		$g[2]='';
		$g[3]=$lm[5];
		$g[4]=to_pay($g[0],$g[3]);
		//Registration
		$h[0]=REGISTRATION;
		$h[1]=$lm[6];
		$h[2]='';
		$h[3]=$lm[6];
		$h[4]=to_pay($h[0],$h[3]);
	//Community Chest
	$i[0]=COMMUNITY_CHEST;
	$i[1]='';
	$i[2]='';
	$i[3]='';
	$i[4]=COMMUNITY_CHEST;
	//Publication
	$j[0]=PUBLICATION;
	$j[1]='';
	$j[2]='';
	$j[3]='';
	$j[4]=PUBLICATION;
	//Student_council
	$k[0]=STUDENT_COUNCIL;
	$k[1]='';
	$k[2]='';
	$k[3]='';
	$k[4]=STUDENT_COUNCIL;
	//Laboratory
	$l[0]=laboratory();
	$l[1]=less_lab();
	$l[2]='';
	$l[3]=less_lab();
	$l[4]=to_pay($l[0],$l[3]);
	//NSTP/CWTS
	//Non-Citizen Fee
	//Entrance
	//Deposit
	//ID Fee
	//In Residence
	//Other Fees
	
	//Total amounts at the bottom
	$total_amount_due=$a[0]+$b[0]+$c[0]+$d[0]+$e[0]+$f[0]+$g[0]+$h[0]+$i[0]+$j[0]+$k[0]+$l[0];
	$total_less_stfap=$a[1]+$b[1]+$c[1]+$d[1]+$e[1]+$f[1]+$g[1]+$h[1]+$i[1]+$j[1]+$k[1]+$l[1];
	$total_less_scholarship=$a[2]+$b[2]+$c[2]+$d[2]+$e[2]+$f[2]+$g[2]+$h[2]+$i[2]+$j[2]+$k[2]+$l[2];
	$total_less=$a[3]+$b[3]+$c[3]+$d[3]+$e[3]+$f[3]+$g[3]+$h[3]+$i[3]+$j[3]+$k[3]+$l[3];
	$total=$a[4]+$b[4]+$c[4]+$d[4]+$e[4]+$f[4]+$g[4]+$h[4]+$i[4]+$j[4]+$k[4]+$l[4];
?>