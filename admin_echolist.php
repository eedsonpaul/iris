<?php 
require_once 'admin_http.php';
?>

<script type="text/javascript">
function confirmation(id, lvl) {
	var answer = confirm("Are you sure you want to delete this account?");
	if (answer) {
	  if(lvl == 3) {
      window.location.href='admin_transact_user.php?admindelete='+id;
    } 
    else if(lvl == 2) {
      window.location.href='admin_transact_user.php?divdelete='+id;
    }
    else if(lvl == 4) {
      window.location.href='admin_transact_user.php?acctgdelete='+id;
    }
    else if(lvl == 5) {
      window.location.href='admin_transact_user.php?libdelete='+id;
    }
    else if(lvl == 6) {
      window.location.href='admin_transact_user.php?cashierdelete='+id;
    }
    else if(lvl == 7) {
      window.location.href='admin_transact_user.php?csodelete='+id;
    }
    else if(lvl == 8) {
      window.location.href='admin_transact_user.php?osadelete='+id;
    }
    else if(lvl == 9) {
      window.location.href='admin_transact_user.php?clerkdelete='+id;
    }
  }
}
</script>

</head>
</html>

  <?php
  function generateUsername($first, $last) {
    $username = str_replace(" ", '', strtolower($first[0].$last));
    return $username;
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
          //echo '<form method="post" action= "useraccount.php">';
          echo '<a href="admin_useraccount.php?userid=' . $row[$id] .
               '" title="' . htmlspecialchars($row[$name]) . '">' .
               htmlspecialchars($row[$id]) . "</a>";
               ?>
              <a href="admin_transact_user.php?action=Delete>">
              <input type="submit" class="submit" name="action" value="Delete">
              </a>
              <a href="admin_useraccount.php?userid=<?php echo $row[$id] ?>">
              <input type="submit" class="submit" name="action" value="Modify">
              </a>
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
      while ($row = mysql_fetch_array($result)) {
        if ($row['employee_id'] != $_SESSION['employee_id']) {
          echo '<li>';
          //echo '<form method="post" action= "admin_transact_user.php">';
          echo '<a href="admin_useraccount.php?viewuser=' . $row['employee_id'] .
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

  function outputStory($article, $only_snippet=FALSE) {
    global $conn;

    if ($article) {
      $sql = "SELECT ar.*, usr.name " .
             "FROM cms_articles ar " .
             "LEFT OUTER JOIN cms_users usr " .
             "ON ar.author_id = usr.user_id " .
             "WHERE ar.article_id = " . $article;
      $result = mysql_query($sql,$conn);

      if ($row = mysql_fetch_array($result)) {
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>\n";
        echo "<h5><div class=\"byline\">By: " .
             htmlspecialchars($row['name']) .
             "</div>";
        echo "<div class=\"pubdate\">";
        if ($row['is_published'] == 1) {
          echo date("F j, Y",strtotime($row['date_published']));
        } else {
          echo "not yet published";
        }
        echo "</div></h5>\n";
        if ($only_snippet) {
          echo "<p>\n";
          echo nl2br(htmlspecialchars(trimBody($row['body'])));
          echo "</p>\n";
          echo "<h4><a href=\"viewarticle.php?article=" .
               $row['article_id'] . "\">Full Story...</a></h4><br>\n";
        } else {
          echo "<p>\n";
          echo nl2br(htmlspecialchars($row['body']));
          echo "</p>\n";
        }
      }
    }
  }

  function flash($message) {
    echo $message;
  }
  ?>
