<?php
	require_once 'header.php';
	require_once 'faculty_functions.php';
	require_once 'tuition_compute.php';
	$student_number = $_POST['studnum'];
	//$unit = $_POST['unitcount'];
	//STFAP and Scholarship and student name
	$stfap = print_bracket_degree(retrieve_bracket_degree($student_number));
	$scholarship = mysql_fetch_array(view_student_scholarship($student_number));
	$student_name = mysql_fetch_array(retrieve_student_name($student_number));
	//echo $student_number;
	
	//Retrieve assess info
	$retrieve_assess = mysql_fetch_array(retrieve_assess_info($student_number));
	//print_r($retrieve_assess);
	
	//Miscellaneous and student fund and other fees
	//CONSTANT AMOUNT
	$miscell = mysql_fetch_array(miscell_fees());
	$student_fund = mysql_fetch_array(student_fund());
	$other_fees = mysql_fetch_array(other_fees());
	
	//computation of other fees
	$non_citizen_fee = $other_fees[0]*$retrieve_assess[2];
	$entrance = $other_fees[1]*$retrieve_assess[3];
	$deposit = $other_fees[2]*$retrieve_assess[4];
	$id_fee = $other_fees[3]*$retrieve_assess[5];
	$in_residence = $other_fees[4]*$retrieve_assess[6];
	
	$total_other=$non_citizen_fee+$entrance+$deposit+$id_fee+$in_residence;
	/*
	$non_citizen_fee = $other_fees[0]*$_POST['non_citizen_fee'];
	$entrance = $other_fees[1]*$_POST['entrance'];
	$deposit = $other_fees[2]*$_POST['deposit'];
	$id_fee = $other_fees[3]*$_POST['id_fee'];
	$in_residence = $other_fees[4]*$_POST['in_residence'];*/
	/*
	echo $non_citizen_fee.' ';
	echo $entrance.' ';
	echo $deposit.' ';
	echo $id_fee.' ';
	echo $in_residence.' ';*/
	
	//echo $lm[0];
	
	//NSTP and Laboratory
	//CONSTANT AMOUNT
	$lab_nstp = mysql_fetch_array(laboratory_nstp());
	
	//computation of lab and nstp
	$tuition = $retrieve_assess[0]*tuition($stfap[0]);
	$lab = $lab_nstp[0]*$retrieve_assess[1];
	$nstp = $lab_nstp[1]*$retrieve_assess[7];
	
	//College
	$college = 'UPVCC';
	
	//Less Miscellaneous,Less Lab,Less stfap
	$lm = less_miscellaneous($stfap[0]);
	$ll = less_lab($stfap[0],$lab);
	$ls = less_stfap($stfap[0],$tuition);
	
	//Partial Total,Total,and Total with Less
	$partial_total=$tuition+total_miscell($miscell)+total_student_fund($student_fund)+$lab+$nstp+$total_other;
	$total_less_stfap=$ls+total_miscell($lm)+$ll;
	
	//Special Case:if total scholarship >= Total amount - Total STFAP
	$test = $scholarship[1];
	
	$partial_total_nosf=$tuition+total_miscell($miscell)+$lab+$nstp+$total_other;
	$sc = special_case($partial_total_nosf,$total_less_stfap,$scholarship[1],$stfap[0]);
	$sc2 = special_case_others($partial_total_nosf,$total_less_stfap,$scholarship[1]);
	//echo $sc;
	$misc_s = miscell_scholarship($lm,$sc);
	$lab_s = lab($lab,$sc);
	$nstp_s = others($nstp,$sc2);
	$ncf_s = others($non_citizen_fee,$sc2);
	$ent_s = others($entrance,$sc2);
	$dep_s = others($deposit,$sc2);
	$idf_s = others($id_fee,$sc2);
	$inr_s = others($in_residence,$sc2);
	
	$test=new_scholarship(total_miscell($misc_s),$lab_s,$nstp_s,$ncf_s,$ent_s,$dep_s,$idf_s,$inr_s,$scholarship[1]);
	
	$total_less_scholarship = total_deduct_scholarship(total_miscell($misc_s),$lab_s,$nstp_s,$ncf_s,$ent_s,$dep_s,$idf_s,$inr_s) + $test;
	
	//Totals
	$total_less_tuition = total_less($ls,$test);
	$total_less_athetics = total_less($lm[0],$misc_s[0]);
	$total_less_cultural = total_less($lm[1],$misc_s[1]);
	$total_less_energy = total_less($lm[2],$misc_s[2]);
	$total_less_internet = total_less($lm[3],$misc_s[3]);
	$total_less_library = total_less($lm[4],$misc_s[4]);
	$total_less_medical = total_less($lm[5],$misc_s[5]);
	$total_less_registration = total_less($lm[6],$misc_s[6]);
	$total_less_lab = total_less($ll,$lab_s);
	$total_less_nst = total_less('',$nstp_s);
	$total_less_non = total_less('',$ncf_s);
	$total_less_ent = total_less('',$ent_s);
	$total_less_dep = total_less('',$dep_s);
	$total_less_idf = total_less('',$idf_s);
	$total_less_inr = total_less('',$inr_s);
	
	$total_tuition = to_pay($tuition,$total_less_tuition);
	$total_athetics = to_pay($miscell[0],$total_less_athetics);
	$total_cultural = to_pay($miscell[1],$total_less_cultural);
	$total_energy = to_pay($miscell[2],$total_less_energy);
	$total_internet = to_pay($miscell[3],$total_less_internet);
	$total_library = to_pay($miscell[4],$total_less_library);
	$total_medical = to_pay($miscell[5],$total_less_medical);
	$total_registration = to_pay($miscell[6],$total_less_registration);
	
	$total_community_chest = to_pay($student_fund[0],'');
	$total_publication = to_pay($student_fund[1],'');
	$total_student_council = to_pay($student_fund[2],'');
	
	$total_lab = to_pay($lab,$total_less_lab);
	$total_nst = to_pay($nstp,$total_less_nst);
	$total_non = to_pay($non_citizen_fee,$total_less_non);
	$total_ent = to_pay($entrance,$total_less_ent);
	$total_dep = to_pay($deposit,$total_less_dep);
	$total_idf = to_pay($id_fee,$total_less_idf);
	$total_inr = to_pay($in_residence,$total_less_inr);
	
	$total_less=$total_less_tuition+$total_less_athetics+$total_less_cultural+$total_less_energy+$total_less_internet+$total_less_library+$total_less_medical
				+$total_less_registration+$total_less_lab+$total_less_nst+$total_less_non+$total_less_ent+$total_less_dep+$total_less_idf+$total_less_inr;
				
	$total=to_pay($partial_total,$total_less);
	
	
	if($total==0) $total=total_student_fund($student_fund);
	if(mysql_numrows(is_DOST($student_number))) $total = total_student_fund($student_fund);
	//echo $total;

	//echo '<br>'.$partial_total;
?>
<h1 align="center">Assessment of Fees</h1>
<h5 align='center'>First Semester, A.Y. 2010-2011</h1>
<table>
	<tr>
		<td><p>STUDENT NAME: </p></td>
		<td><p><?php echo $student_name[0].', '.$student_name[1]?></p></td>
		<td><p>Degree Program: </p></td>
		<td><p><?php echo $stfap[1]?></p></td>
	</tr>
	<tr>
		<td><p>STUDENT Number: </p></td>
		<td><p><?php echo $student_number?></p></td>
		<td><p>College:</h4></td>
		<td><p><?php echo $college?></h4></td>
	</tr>
</table>
<p>STFAP BRACKET: <?php echo $stfap[0] ?></p>
<p>SCHOLARSHIP: <?php echo $scholarship[0] ?></p>

<h1>Breakdown of Payment</h1>
<table class=assesstable><!--"tablestyleassess"-->
<tr>
	<th width="150">Payment Name</th>
    <th width="150">Amount Due</th>
    <th width="150">Less(STFAP)</th>
    <th width="150">Less(Scholarship)</th>
    <th width="150">TOTAL LESS</th>
    <th width="150">To pay</th>
</tr>
<tr>
	<td>Tuition</td>
	<td class='data'><?php echo $tuition ?></td>
	<td class='data'><?php echo $ls?></td>
	<td class='data'><?php echo $test ?></td>
	<td class='data'><?php echo $total_less_tuition ?></td>
	<td class='data'><?php echo $total_tuition ?></td>
</tr>
<tr>
	<td>Miscellaneous</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td class="indent">Athletics</td>
	<td class='data'><?php echo $miscell[0] ?></td>
	<td class='data'><?php echo $lm[0] ?></td>
	<td class='data'><?php echo $misc_s[0]?></td>
	<td class='data'><?php echo $total_less_athetics?></td>
	<td class='data'><?php echo $total_athetics ?></td>
</tr> 
<tr>
	<td class="indent">Cultural</td>
	<td class='data'><?php echo $miscell[1] ?></td>
	<td class='data'><?php echo $lm[1] ?></td>
	<td class='data'><?php echo $misc_s[1]?></td>
	<td class='data'><?php echo $total_less_cultural?></td>
	<td class='data'><?php echo $total_cultural?></td>
</tr>
<tr>
	<td class="indent">Energy</td>
	<td class='data'><?php echo $miscell[2] ?></td>
	<td class='data'><?php echo $lm[2] ?></td>
	<td class='data'><?php echo $misc_s[2]?></td>
	<td class='data'><?php echo $total_less_energy?></td>
	<td class='data'><?php echo $total_energy?></td>
</tr>
<tr>
	<td class="indent">Internet</td>
	<td class='data'><?php echo $miscell[3] ?></td>
	<td class='data'><?php echo $lm[3] ?></td>
	<td class='data'><?php echo $misc_s[3]?></td>
	<td class='data'><?php echo $total_less_internet?></td>
	<td class='data'><?php echo $total_internet ?></td>
</tr>
<tr>
	<td class="indent">Library</td>
	<td class='data'><?php echo $miscell[4] ?></td>
	<td class='data'><?php echo $lm[4] ?></td>
	<td class='data'><?php echo $misc_s[4]?></td>
	<td class='data'><?php echo $total_less_library?></td>
	<td class='data'><?php echo $total_library?></td>
</tr>
<tr>
	<td class="indent">Medical</td>
	<td class='data'><?php echo $miscell[5] ?></td>
	<td class='data'><?php echo $lm[5] ?></td>
	<td class='data'><?php echo $misc_s[5]?></td>
	<td class='data'><?php echo $total_less_medical?></td>
	<td class='data'><?php echo $total_medical?></td>
</tr>
<tr>
	<td class="indent">Registration</td>
	<td class='data'><?php echo $miscell[6] ?></td>
	<td class='data'><?php echo $lm[6] ?></td>
	<td class='data'><?php echo $misc_s[6]?></td>
	<td class='data'><?php echo $total_less_registration?></td>
	<td class='data'><?php echo $total_registration?></td>
</tr>
<tr>
	<td>Student Fund</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td class="indent">Community Chest</td>
	<td class='data'><?php echo $student_fund[0]?></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'><?php echo $total_community_chest?></td>
</tr>
<tr>
	<td class="indent">Publication</td>
	<td class='data'><?php echo $student_fund[1]?></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'><?php echo $total_publication?></td>
</tr>
<tr>
	<td class="indent">Student Council</td>
	<td class='data'><?php echo $student_fund[2]?></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'><?php echo $total_student_council ?></td>
</tr>
<tr>
	<td>Laboratory Fee</td>
	<td class='data'><?php echo $lab ?></td>
	<td class='data'><?php echo $ll?></td>
	<td class='data'><?php echo $lab_s?></td>
	<td class='data'><?php echo $total_less_lab ?></td>
	<td class='data'><?php echo $total_lab ?></td>
</tr>
<tr>
	<td>NSTP-CWTS/MS</td>
	<td class='data'><?php echo $nstp?></td>
	<td class='data'></td>
	<td class='data'><?php echo $nstp_s?></td>
	<td class='data'><?php echo $total_less_nst?></td>
	<td class='data'><?php echo $total_nst?></td>
</tr>
<tr>
	<td>Non-Citizen Fee</td>
	<td class='data'><?php echo $non_citizen_fee?></td>
	<td class='data'></td>
	<td class='data'><?php echo $ncf_s?></td>
	<td class='data'><?php echo $total_less_non ?></td>
	<td class='data'><?php echo $total_non?></td>
</tr>
<tr>
	<td>Entrance</td>
	<td class='data'><?php echo $entrance?></td>
	<td class='data'></td>
	<td class='data'><?php echo $ent_s?></td>
	<td class='data'><?php echo $total_less_ent ?></td>
	<td class='data'><?php echo $total_ent?></td>
</tr>
<tr>
	<td>Deposit</td>
	<td class='data'><?php echo $deposit?></td>
	<td class='data'></td>
	<td class='data'><?php echo $dep_s?></td>
	<td class='data'><?php echo $total_less_dep ?></td>
	<td class='data'><?php echo $total_dep?></td>
</tr>
<tr>
	<td>ID Fee</td>
	<td class='data'><?php echo $id_fee?></td>
	<td class='data'></td>
	<td class='data'><?php echo $idf_s?></td>
	<td class='data'><?php echo $total_less_idf ?></td>
	<td class='data'><?php echo $total_idf?></td>
</tr>
<tr>
	<td>In Residence</td>
	<td class='data'><?php echo $in_residence?></td>
	<td class='data'></td>
	<td class='data'><?php echo $inr_s?></td>
	<td class='data'><?php echo $total_less_inr ?></td>
	<td class='data'><?php echo $total_inr?></td>
</tr>
<tr>
	<td>Other Fees</td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
	<td class='data'></td>
</tr>
<tr>
	<td></td>
	<td class='data'><strong><?php echo /*$total_amount_due*/$partial_total ?></strong></td>
	<td class='data'><strong><?php echo /*$total_less_stfap*/$total_less_stfap ?></strong></td>
	<td class='data'><strong><?php echo $total_less_scholarship ?></strong></td>
	<td class='data'><strong><?php echo $total_less ?></strong></td>
	<td class='data'><strong><?php echo $total ?></strong></td>
</tr>
</table>
	<h2 align='center'>Total Payment:<strong><?php echo $total ?></strong></h2>
	<form method="post" action="process_faculty.php">
		<input type="hidden" name="studnum" value="<?php echo $student_number ?>">
		<input type="hidden" name="total" value="<?php echo $total ?>">
		<?php
		if(mysql_numrows(is_assessed($student_number)))
		echo '<h2 align=center>Student is already assessed!</h2>';
		else
		echo '<input type=submit name=action value="Assess Student"\/>';
		?>
	</form>
<?php
	require_once 'footer.php';
?>