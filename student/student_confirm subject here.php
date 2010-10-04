<?php
	require_once 'student_header.php';
?>

<div class = "main">

<?php
	require_once 'student_navigation.php';
?>


<div id="right_side">

	PRE-REGISTER HERE
	<ul>
    <li><a href="#" onclick="addSubject();">ADD SUBJECT</a> </li>
	<li><a href="#" onclick="removeSubject();">REMOVE SUBJECT</a> </li>
	<li><a href="#" onclick="viewSchedule();">VIEW SCHEDULE</a> </li>
	</ul>
	CONFIRM SUBJECTS HERE
	<ul>
    <li><a href="#" onclick="addSubject();">ADD SUBJECT</a> </li>
	 <li><a href="#" onclick="confirmSubject();">CONFIRM SUBJECT</a> </li>
	 <li><a href="#" onclick="removeSubject();">REMOVE SUBJECT</a> </li>
	 <li><a href="#" onclick="viewSchedule();">VIEW SCHEDULE</a> </li>
	</ul>

  
  
</div>

<script type="text/javascript">
	function addSubject(){
		window.open("student_search_subject.php", "info", "width=600,scrollbars=0,resizable=0");
	}
	function removeSubject(){
		window.open("student_show_remove_subject.php", "info", "width=600,scrollbars=0,resizable=0");
	}
	function confirmSubject(){
		window.open("student_show_confirm_subject.php", "info", "width=600,scrollbars=0,resizable=0");
	}
	function viewSchedule(){
		window.open("student_view_schedule.php", "info", "width=600,scrollbars=0,resizable=0");
	}
</script>
</div>
</div>


<?php
	require_once 'student_footer.php';
?>