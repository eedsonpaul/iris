<html>
<head>

  <title>Admin Panel | UP Cebu IRIS </title>

</head>
</html>

<?php
require_once 'admin_db_connect.php';
require_once 'admin_header.php';
require_once 'admin_http.php';
?>

<div class="main">

  <div id="nav" class="left">
      <a href="index.php?action=Logs"><span class="left">&larr;Back</span></a>
  </div>

  <div id="nav">
    <span class="right">
    <?php
    if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number']))
    {
      echo '<a href="index.php?action=SearchAcct">Search Account &raquo;';
      echo '</a>';
      if ($_SESSION['access_level_id'] == 3) {
        echo ' | <a href="index.php?action=Logs">Logs</a> | ';
        echo ' <a href="admin_panel.php">' . $_SESSION['username'];
      } else if ($_SESSION['access_level_id'] == 1) {
        echo ' | <a href="admin_accountpanel.php">' . $_SESSION['student_number'];
      }
      echo '</a>';
    }
    ?>
     </span>
  </div><br/>

  <table class=table_panel width="85%" cellspacing=0>
    <tr>
      <td width="30%">
      <div id="nav_panel">
        <ul>
          <li class="put_border">Personal Data
              <ul>
                <li><a href="osa.php">Account Profile </a></li>
                <li><a href="#">Edit Login Account</a></li>
                <li><a href="editpersonaldata_osa.php">Edit Profile</a></li>
              </ul>
          </li><br/>
          <li class="put_border">Admin Functions
          <ul>
                <li><a href="student_account.php">Set Academic Year/Semester</a></li>
                <li><a href="stfap_bracket_mngt.php">Reset System</a></li>
                <li><a href="stfap_bracketing.php">Backup Database</a></li>
              </ul>
          </li>
        </ul>
      </div>    
      </td>

      <td width="70%" style="border: 0px; border-left: 2px solid gray;">
        <br/><br/><br/><br/><br/><br/><br/><br/>
      </td>
    
    </tr>
  </table>

</div>

<?php require_once 'admin_footer.php'; ?>
