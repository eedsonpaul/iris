<?php

//connect to db

function admin_backup($access_level_id, $dbhost, $dbuuser, $dbpwd, $dbname) {
  if ($access_level_id != 3) { //3 for sys ads right?
    //redirect to correct page
  } else {
    exec("/usr/bin/mysqldump --opt --host=$dbhost --user=$dbuser --password=$dbpwd $dbname > " . date("Y-m-d_H-i-s") . ".sql"); //mysqldump address may differ
  }
}

