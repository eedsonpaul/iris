<?php
//CSO Form5 Class
//Version 2: Revision Date: September 23, 2010
//Version 1: Date: September 13, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

include("connect_to_database.php");
include("sql_queries.php");
	
	class form5 {
	
		function viewEnrolledSubjects($stud_num) {
			//session_start();
			echo "<table height='350' width='680' border='1' cellspacing='0' cellpadding='0'>
        			<tr>
          				<td width='100' class='style3'><div align='center' class='style9'>SUBJECTS</div></td>
          				<td width='65' class='style3'><div align='center' class='style9'>SEC</div></td>
          				<td width='69' class='style3'><div align='center' class='style9'>UNITS</div></td>
          				<td width='82' class='style3'><div align='center' class='style9'>DAYS</div></td>
          				<td width='94' class='style3'><div align='center' class='style9'>TIME</div></td>
         				<td width='82' class='style3'><div align='center' class='style9'>ROOM</div></td>
          				<td width='82' class='style3'><div align='center' class='style9'>CLASS TYPE</div></td>
          				<td width='88' class='style3'><div align='center' class='style9'>LAB FEE</div></td>
       			 	</tr>";
					
			$student_number = $stud_num;
			$unit = 0;
			$count = 0;
			$semester = $_SESSION['semester'];
			$academic_year = $_SESSION['academic_year']+1;
			
			$sql = "select * from student_status where student_number = '$stud_num' && status = 'enrolled' && semester = '$semester' && academic_year = '$academic_year'";
			$res = mysql_query($sql);
				
			while($row = mysql_fetch_array($res)){
				$subj_id = $row['course_code'];
				$sect_lab = $row['section_label'];
				$stat = $row['status'];
					
				$sql = "select * from section_schedules where course_code = '$subj_id' && section_label = '$sect_lab'";
				$res3 = mysql_query($sql);
				while($row = mysql_fetch_array($res3)){
					$start = $row['start_time'];
					$end = $row['end_time'];
					$day = $row['day_of_the_week'];
				}
				
				$sql = "select * from section where course_code = '$subj_id' && section_label = '$sect_lab'";
				$res4 = mysql_query($sql);
				while($row = mysql_fetch_array($res4)){
					$room = $row['room_id'];
					$class = $row['class_type'];
				}
								
				$sql="select * from subject where course_code = '$subj_id'";
				$res2=mysql_query($sql);
			
				while($row = mysql_fetch_array($res2)){
					$subj_name = $row['subject_title'];
					$unit = $row['units'];
					$lab_fee = $row['lab_fee'];
				}
		 

        		echo "<tr>
          			<td class='style10'>".strtoupper($subj_id)."</div></td>
          			<td class='style3'><div align='center'>".strtoupper($sect_lab)."</div></td>
          			<td class='style3'><div align='center'>".$unit.".0</div></td>
          			<td class='style3'><div align='center'>".$day."</div></td>
          			<td class='style3'><div align='center'>".$start." - ".$end."</div></td>
          			<td class='style3'><div align='center'>".$room."</div></td>
          			<td class='style3'><div align='center'>".strtoupper($class)."</div></td>
          			<td class='style3'><div align='center'>".$lab_fee."</div></td>
        		</tr>";
				
				$count++;
			}
			
			while ($count<20) {
        		echo "<tr>
          			<td class='style10'>&nbsp;</div></td>
          			<td class='style3'><div align='center'></div></td>
          			<td class='style3'><div align='center'></div></td>
          			<td class='style3'><div align='center'></div></td>
          			<td class='style3'><div align='center'></div></td>
          			<td class='style3'><div align='center'></div></td>
          			<td class='style3'><div align='center'></div></td>
         			<td class='style3'><div align='center'></div></td>
        		</tr>";
				$count++;
			}
       			
      	echo "</table>";
	}
	
	function viewBreakdown($stud_num) {
		require_once 'connect_to_database.php';
		require_once 'faculty_functions.php';
		require_once 'tuition_compute.php';
	
		$student_number = $stud_num;
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
		
		echo "<table width='372' border='1' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='130' class='style12'>&nbsp;</td>
          <td width='126' class='style12'><div align='center' class='style10'>AMOUNT DUE</div></td>
          <td width='109' class='style12'><div align='center' class='style10'>AMOUNT LESS</div></td>
        </tr>
        <tr>
          <td class='style30 style31'>Tuition</td>
          <td class='style16'><div align='right'><strong>".number_format($tuition, 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong>".number_format($total_less_tuition, 2, '.', '')." PhP</strong></div></td>
        </tr>
        <tr>
          <td class='style32'>Miscellaneous</td>
          <td class='style16'><div align='right'><strong></strong></div></td>
          <td class='style16'><div align='right'><strong></strong></div></td>
        </tr>
        <tr>
          <td class='style32'>&nbsp;&nbsp;&nbsp;&nbsp;Athletics</td>
          <td class='style16'><div align='right'><strong>".number_format($miscell[0], 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong>".number_format($total_less_athetics, 2, '.', '')." PhP</strong></div></td>
        </tr>
        <tr>
          <td class='style32'>&nbsp;&nbsp;&nbsp;&nbsp;Cultural</td>
          <td class='style16'><div align='right'><strong>".number_format($miscell[1], 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong>".number_format($total_less_cultural, 2, '.', '')." PhP</strong></div></td>
        </tr>
        <tr>
          <td class='style32'>&nbsp;&nbsp;&nbsp;&nbsp;Energy</td>
          <td class='style16'><div align='right'><strong>".number_format($miscell[2], 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong>".number_format($total_less_energy, 2, '.', '')." PhP</strong></div></td>
        </tr>
        <tr>
          <td class='style32'>&nbsp;&nbsp;&nbsp;&nbsp;Internet</td>
          <td class='style16'><div align='right'><strong>".number_format($miscell[3], 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong>".number_format($total_less_internet, 2, '.', '')." PhP</strong></div></td>
        </tr>
        <tr>
          <td class='style32'>&nbsp;&nbsp;&nbsp;&nbsp;Library</td>
          <td class='style16'><div align='right'><strong>".number_format($miscell[4], 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong>".number_format($total_less_library, 2, '.', '')." PhP</strong></div></td>
        </tr>
        <tr>
          <td class='style32'>&nbsp;&nbsp;&nbsp;&nbsp;Medical</td>
          <td class='style16'><div align='right'><strong>".number_format($miscell[5], 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong>".number_format($total_less_medical, 2, '.', '')." PhP</strong></div></td>
        </tr>
        <tr>
          <td class='style32'>&nbsp;&nbsp;&nbsp;&nbsp;Registration</td>
          <td class='style16'><div align='right'><strong>".number_format($miscell[6], 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong>".number_format($total_less_registration, 2, '.', '')." PhP</strong></div></td>
        </tr>
        <tr>
          <td class='style32'>Student Fund</td>
          <td class='style16'><div align='right'><strong></strong></div></td>
          <td class='style16'><div align='right'><strong></strong></div></td>
        </tr>
        <tr>
          <td class='style32'>&nbsp;&nbsp;&nbsp;&nbsp;Community Chest</td>
          <td class='style16'><div align='right'><strong>".number_format($student_fund[0], 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong></strong></div></td>
        </tr>
        <tr>
          <td class='style32'>&nbsp;&nbsp;&nbsp;&nbsp;Publication</td>
          <td class='style16'><div align='right'><strong>".number_format($student_fund[1], 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong></strong></div></td>
        </tr>
        <tr>
          <td class='style32'>&nbsp;&nbsp;&nbsp;&nbsp;Student Council</td>
          <td class='style16'><div align='right'><strong>".number_format($student_fund[2], 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong></strong></div></td>
        </tr>
        <tr>
          <td class='style32'>Laboratory Fee</td>
          <td class='style16'><div align='right'><strong>".number_format($lab, 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong>".number_format($total_less_lab, 2, '.', '')." PhP</strong></div></td>
        </tr>
        <tr>
          <td class='style32'>NSTP-CWTS / MS</td>
          <td class='style16'><div align='right'><strong>".number_format($nstp, 2, '.', '')." PhP</strong></div></td>
          <td class='style16'><div align='right'><strong>".number_format($total_less_nst, 2, '.', '')." PhP</strong></div></td>
        </tr>
        <tr>
          <td class='style32'>Non-Citizen Fee</td>
          <td class='style16'><div align='right'>".number_format($non_citizen_fee, 2, '.', '')." PhP</div></td>
          <td class='style16'><div align='right'>".number_format($total_less_non, 2, '.', '')." PhP</div></td>
        </tr>
        <tr>
          <td class='style32'>Entrance</td>
          <td class='style16'><div align='right'>".number_format($entrance, 2, '.', '')." PhP</div></td>
          <td class='style16'><div align='right'>".number_format($total_less_ent, 2, '.', '')." PhP</div></td>
        </tr>
        <tr>
          <td class='style32'>Deposit</td>
          <td class='style16'><div align='right'>".number_format($deposit, 2, '.', '')." PhP</div></td>
          <td class='style16'><div align='right'>".number_format($total_less_dep, 2, '.', '')." PhP</div></td>
        </tr>
        <tr>
          <td class='style32'>I.D. Fee</td>
          <td class='style16'><div align='right'>".number_format($id_fee, 2, '.', '')." PhP</div></td>
          <td class='style16'><div align='right'>".number_format($total_less_idf, 2, '.', '')." PhP</div></td>
        </tr>
        <tr>
          <td class='style32'>In Residence</td>
          <td class='style16'><div align='right'>".number_format($in_residence, 2, '.', '')." PhP</div></td>
          <td class='style16'><div align='right'>".number_format($total_less_inr, 2, '.', '')." PhP</div></td>
        </tr>
        <tr>
          <td class='style32'>TOTAL</td>
          <td class='style16'><div align='right'>".number_format($partial_total, 2, '.', '')." PhP</div></td>
          <td class='style16'><div align='right'>".number_format($total_less, 2, '.', '')." PhP</div></td>
        </tr>
        <tr>
          <td colspan='3' class='style32' height=15><div align='right'></div>            <div align='right'></div></td>
          </tr>
        <tr>
          <td class='style32'>LOAN</td>
          <td class='style16'><div align='right'></div></td>
          <td class='style16'><div align='right'></div></td>
        </tr>
        <tr>
          <td height='21' class='style32'>AMOUNT PAYABLE</td>
          <td colspan='2' class='style10'><div align='center'>".number_format($total, 2, '.', '')." PhP</div>
            <div align='right'></div></td>
          </tr>
      </table>";
	}
}

?>
