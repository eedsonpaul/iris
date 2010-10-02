<?php

	class search {
		
		function searchStudentForm() {
			echo "<table width=494 border=0 align=center>";
      		echo "<tr>";
        	echo "<td width=181><div align=right><strong>Enter Student Number:</strong></div></td>";
        	echo "<td width=12>&nbsp;</td>";
        	echo "<td width=287><input type=text name=student_id id=student_id></td>";
      		echo "</tr>";
    		echo "</table>";
    		echo "<p>";
      		echo "<center><input type=submit name=search_student id=search_student value=SEARCH>";
      		echo "</center>";
    		echo "</p>";
		}
	}
?>