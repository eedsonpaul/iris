<?php
require_once 'admin_db_connect.php';
require_once 'admin_header.php';
require_once 'admin_http.php';

$search = NULL;
if (isset($_POST['keywords']) and isset($_POST['filter'])) {
  if ($_POST['filter'] == 'System Administrator') {
  $sql = "SELECT employee_id, first_name, last_name, username FROM employee " .
         "WHERE MATCH (username, first_name, last_name, employee_id) " .
         "AGAINST ('" . $_POST['keywords'] . "' IN BOOLEAN MODE) " .
         "ORDER BY MATCH (username) " .
         "AGAINST ('" . $_POST['keywords'] . "' IN BOOLEAN MODE) DESC";

  $search = mysql_query($sql, $conn)
    or die('Could not perform search; ' . mysql_error());
  }
} else {
  $_SESSION['flash'] = 'Please Enter a Keyword';
  redirect('index.php?action=SearchAcct');  
}

echo '<div class="main">';
echo "<h1>Search Results</h1>\n";

if ($search and !mysql_num_rows($search)) {
  echo "<p>No user found that match the search terms.</p>\n";
} else {
  while ($row = mysql_fetch_array($search)) {
    echo $row['first_name'];
    echo '&nbsp;';
    echo $row['last_name'];
  }
}
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
