<?php
require_once 'admin_db_connect.php';
require_once 'admin_header.php';

$search = NULL;
if (isset($_GET['keywords'])) {
  $sql = "SELECT employee_id FROM employee " .
         "WHERE MATCH (username, first_name) " .
         "AGAINST ('" . $_GET['keywords'] . "' IN BOOLEAN MODE) " .
         "ORDER BY MATCH (username, first_name) " .
         "AGAINST ('" . $_GET['keywords'] . "' IN BOOLEAN MODE) DESC";

  $search = mysql_query($sql, $conn)
    or die('Could not perform search; ' . mysql_error());
}

echo '<div class="main">';
echo "<h1>Search Results</h1>\n";

if ($search and !mysql_num_rows($search)) {
  echo "<p>No user found that match the search terms.</p>\n";
} else {
  while ($row = mysql_fetch_array($search)) {
    echo $row['employee_id'];
  }
}
echo '</div>';

require_once 'admin_footer.php';
?>
