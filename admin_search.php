<?php
require_once 'admin_db_connect.php';
require_once 'admin_header.php';
require_once 'admin_http.php';



echo '<div class="main">';

echo '</div>';
/*
  if ($_POST['filter'] == 'All') {
  $sql = "SELECT employee_id, first_name, last_name, username FROM employee " .
         "WHERE MATCH (username, first_name, last_name, employee_id) " .
         "AGAINST ('" . $_POST['keywords'] . "' IN BOOLEAN MODE) " .
         "ORDER BY MATCH (username) " .
         "AGAINST ('" . $_POST['keywords'] . "' IN BOOLEAN MODE) DESC";
  } else if($_POST['filter'] != 'Student') {
    $sql = "SELECT employee_id, first_name, last_name, username FROM '". $_POST['filter'] . "' "  .
       "WHERE MATCH (username, first_name, last_name, employee_id) " .
       "AGAINST ('" . $_POST['keywords'] . "' IN BOOLEAN MODE) " .
       "ORDER BY MATCH (username) " .
       "AGAINST ('" . $_POST['keywords'] . "' IN BOOLEAN MODE) DESC";
  } else {
    $sql = "SELECT student_number, first_name, last_name, FROM '". $_POST['filter'] . "' "  .
       "WHERE MATCH (student_number, first_name, last_name) " .
       "AGAINST ('" . $_POST['keywords'] . "' IN BOOLEAN MODE) " .
       "ORDER BY MATCH (student_number) " .
       "AGAINST ('" . $_POST['keywords'] . "' IN BOOLEAN MODE) DESC";
  }
*/

require_once 'admin_footer.php';
?>
