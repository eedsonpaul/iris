<?php

$sql = "SELECT scholarship_id, scholarship_name FROM scholarship";
$result = mysql_query($sql)
  or die(mysql_error());
if (mysql_num_rows($result) > 0) {
  while ($row = mysql_fetch_array($result)) {
    $scholarshipList[$row['scholarship_id']] = $row['scholarship_name'];
  }
}

$sql = "SELECT stfap_bracket_id, stfap_bracket FROM stfap";
$result = mysql_query($sql)
  or die(mysql_error());
if (mysql_num_rows($result) > 0) {
  while ($row = mysql_fetch_array($result)) {
    $bracketList[$row['stfap_bracket_id']] = $row['stfap_bracket'];
  }
}

$sql = "SELECT access_level_id, access_level_name FROM access_levels";
$result = mysql_query($sql)
  or die(mysql_error());
if (mysql_num_rows($result) > 0) {
  while ($row = mysql_fetch_array($result)) {
    $accessList[$row['access_level_id']] = $row['access_level_name'];
  }
}

$sql = "SELECT unit_id, unit_name FROM unit";
$result = mysql_query($sql)
  or die(mysql_error());
if (mysql_num_rows($result) > 0) {
  while ($row = mysql_fetch_array($result)) {
    $unitList[$row['unit_id']] = $row['unit_name'];
  }
}

$sql = "SELECT designation_id, designation FROM designation";
$result = mysql_query($sql)
  or die(mysql_error());
if (mysql_num_rows($result) > 0) {
  while ($row = mysql_fetch_array($result)) {
    $designationList[$row['designation_id']] = $row['designation'];
  }
}
