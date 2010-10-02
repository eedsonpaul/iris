<?php
	include("offering_functions.php");
	remove_offering($_POST['subject_code'],$_POST['section_label']);
	print("section is deleted");
?>