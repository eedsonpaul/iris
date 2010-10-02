<?php
//This is the file that handles the applications connection to the database
//Change the parameters of SQL_USER and SQL_PASS as appropriate to your settings.

define('SQL_HOST','localhost');
define('SQL_USER','root');
define('SQL_PASS','');
define('SQL_DB','db_softeng2010');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
  or die('Could not connect to the database; ' . mysql_error());

mysql_select_db(SQL_DB, $conn)
  or die('Could not select database; ' . mysql_error());
?>
