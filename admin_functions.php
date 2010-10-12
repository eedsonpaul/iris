<?php
require_once 'admin_http.php';
require_once 'admin_header.php';
?>

  <?php
  function generateUsername($first, $last) {
    $username = str_replace(" ", '', strtolower($first[0].$last));
    return $username;
  }

  function searchAccount($keyword, $filter) {
    $search = NULL;
    /* if ($keyword and $filter) { */
      if ($filter == 'All') {
        $sql = "SELECT employee_id, first_name, last_name, username, access_level_id FROM employee " .
               "WHERE MATCH (username, first_name, last_name, employee_id) " .
               "AGAINST ('$keyword' IN BOOLEAN MODE)";
      } else {
        $sql = "SELECT employee_id, first_name, last_name, username, access_level_id FROM employee 
               WHERE username='$keyword' OR first_name='$keyword' or last_name='$keyword' or employee_id='$keyword' and access_level_id='$filter'"; 
               /*"AGAINST ('$keyword' IN BOOLEAN MODE) " .*/
      }
      $search = mysql_query($sql)
        or die('Could not perform search; ' . mysql_error());
      return $search;
    /*
    } else if (!$keyword) {
      $_SESSION['flash'] = 'Please Enter a Keyword';
    }
    */
  }

  //This functions are used to display the users in a particular table.
  $a_users = array(0 => "Student Account","Employee","System Admin Account");
  
  function echoStudentList($lvl,$id, $name, $users) {
    global $a_users;
    
    $sql = "SELECT $id, $name FROM $users " .
           "WHERE access_level_id = $lvl ORDER BY $id";

    $result = mysql_query($sql)
      or die(mysql_error());

    if (mysql_num_rows($result) == 0) {
      echo "<em>No " . $a_users[$lvl] . " created.</em>";
    } else {
      while ($row = mysql_fetch_array($result)) {
        if ($row[$id] != $_SESSION['employee_id']) {
          echo '<li>';
          /*
          //echo '<form method="post" action= "useraccount.php">';
          echo '<a href="student/student.php?id=' . $row[$id] .'
               " title="' . htmlspecialchars($row[$name]) . '">' .
               htmlspecialchars($row[$id]) . "</a>";
          */
          echo $row[$name];
  ?>
          <!--
              <a href="admin_transact_user.php?action=Delete>">
              <input type="submit" class="submit" name="action" value="Delete">
              </a>
              <a href="admin_useraccount.php?userid=<?php echo $row[$id] ?>">
              <input type="submit" class="submit" name="action" value="Modify">
              </a> -->
          </li>
  <?php
        }
      }
    }
  }
  

  $a_employees = array(1 => "Student","Employee","System Administrator","Accounting","Library",
                      "Cashier", "CSO", "OSA", "Clerk");
  function echoEmployees($lvl) {
    global $a_employees;
    
    $sql = "SELECT employee_id, username, access_level_id FROM employee " .
           "WHERE access_level_id = $lvl ORDER BY employee_id DESC";

    $result = mysql_query($sql)
      or die(mysql_error());

    if (mysql_num_rows($result) == 0) {
      echo "<em>No " . $a_employees[$lvl] . " created.</em>";
    } else {
    ?>
    <table width=95% style="background: #e0e0e0; font-weight: bold;">
      <tr style="font-size: 13px;">
      <td width=20%>
        <center>Username</center>
      </td>

      <td width=50%>
        <center>User Details</center>
      </td>

      <td width=30%>
        <center>Action</center>
      </td>
      <tr>
    </table><br/>
    <?php
      while ($row = mysql_fetch_array($result)) {
        if ($row['employee_id'] != $_SESSION['employee_id']) {
          echo '<li>';
          //echo '<form method="post" action= "admin_transact_user.php">';
          echo '<a href="admin_useraccount.php?editlogin=' . $row['employee_id'] .
             '" title="' . htmlspecialchars($row['username']) . '">' .
             htmlspecialchars($row['username']) . "</a>";
  ?>
            <input type="button" onclick="confirmation(<?php echo $row['employee_id'] ?>,<?php echo $row['access_level_id'] ?>)" value="Delete">

            <!---<a href="editaccount.php?userid=<?php echo $row[$id] ?>">-->
            <?php echo '<a href="admin_useraccount.php?userid=' . $row['employee_id'] .'">' ?>
            <input type="submit" class="submit" name="action" value="Modify">
            </a>
          </li>
  <?php
        }
      }
    }
  }


  function tracker($employee_id, $action_flag, $target_type, $id, $section_label) {
		$date = date("Y-n-d H:i:s", time()); //time of update, modification, addition, deletion of records
		$tracker = 'tracker.txt'; //file name of the log file
		$username = $employee_id;
		if ($action_flag == 1) {
			$action = 'creates user ';
		} else if ($action_flag == 2) {
			$action = 'edits user ';
		} else if ($action_flag == 3) {
			$action = 'removes/blocks user ';
		} else if ($action_flag == 4) {
			$action = 'adds accountability ';
		} else if ($action_flag == 5) {
			$action = 'edits accountability ';
		} else if ($action_flag == 6) {
			$action = 'removes accountability ';
		} else if ($action_flag == 7) {
			$action = 'extends slots ';
		} else if ($action_flag == 8) {
			$action = 'extends slots ';
		}
		if ($target_type == 1) { //student type
			$target = $id;
		} else if ($target_type == 2) { //subject type
			$target = $id . '-' . $section_label;
		}
		$handle = fopen($tracker, 'a') or die('Cannot open file:  '.$my_file); //append series of activities by the employee
		$log = $date . ' ' . $username . ' ' . $action . ' ' . $target . "\n"; //info to store
		fwrite($handle, $log);
		fclose($handle);
	} //function that tracks the changes in the db by users
  ?>
