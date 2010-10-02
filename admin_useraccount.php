<html>
<head>
  <?php if (isset($_GET['userid'])) { ?>
  <title>Modify Account | UP Cebu IRIS </title>
  <?php } else { ?>
  <title>View Account | UP Cebu IRIS </title>
  <?php } ?>
</head>
</html>

<?php
require_once 'admin_http.php';
require_once 'admin_db_connect.php';
require_once 'admin_header.php';
require_once 'admin_sql_query.php';

if ($_SESSION['access_level_id'] != 3)  {
  redirect('error.php');
}
?>

<?php
$id = '';
$username = '';
$access_level = '';
$first_name = '';
$middle_name = '';
$last_name = '';
//$gender = '';
$email_address = '';
$unit_id = '';
$designation_id = '';
$parent_address = '';
$present_address = '';
$civil_status = '';
$birthdate = '';
$contact_number = '';
$employee_id = '';
$username = '';
$password = '';
$access_lvl = '';

if (isset($_GET['userid'])) {
$id = '';
$sql = "SELECT employee_id, username, password, employee_type, first_name, middle_name, last_name, gender,
        email_address, unit_id, designation_id, parent_address, present_address, civil_status, birthdate,
        contact_number, spouse_name, spouse_contact_number, father_name, mother_name, citizenship, access_level_id " .
       "FROM employee " .
       "WHERE employee_id=" . $_GET['userid'];
$result = mysql_query($sql, $conn)
  or die('Could not look up user data; ' . mysql_error());

$user = mysql_fetch_array($result);

$id = $user['employee_id'];
$pass = md5($user['password']);
?>
<div class="main">

  <div id="nav" class="left">
    <?php if ($user['access_level_id'] == 3) { ?>
      <a href="index.php?action=SysAd"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 2) { ?>
      <a href="index.php?action=Faculty"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 4) { ?>
      <a href="index.php?action=Acctg"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 5) { ?>
      <a href="index.php?action=Lib"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 6) { ?>
      <a href="index.php?action=Cashier"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 7) { ?>
      <a href="index.php?action=Cso"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 8) { ?>
      <a href="index.php?action=Osa"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 9) { ?>
      <a href="index.php?action=Clerk"><span class="left">&larr;Back to list</span></a>
    <?php } ?>
  </div>

  <div id="nav">
    <span class="right">
    <?php
    if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number']))
    {
      echo '<a href="index.php?action=SearchAcct">Search Account &raquo;';
      echo '</a>';
      echo ' | <a href="index.php?action=SearchAcct">Reset';
      echo '</a>';
      echo ' | <a href="index.php?action=SearchAcct">Backup';
      echo '</a>';
      if ($_SESSION['access_level_id'] == 3) {
        echo ' | <a href="index.php?action=Logs">Logs</a> | ';
      }
      if ($_SESSION['access_level_id'] >1) {
        echo ' <a href="admin_useraccount.php?userid=' . $_SESSION['employee_id'] .
             '" title="' . htmlspecialchars($_SESSION['username']) . '">' . $_SESSION['username'];

      } else if ($_SESSION['access_level_id'] == 1) {
        echo ' | <a href="admin_accountpanel.php">' . $_SESSION['student_number'];
      }
      echo '</a>';
    }

    ?>
     </span>
  </div>

  <br/>
  <?php
  if (isset($_SESSION['flash'])) {
  ?>
  <div id="flash">
    <center><?php echo $_SESSION['flash']; ?></center>
    <?php unset($_SESSION['flash']); ?>
  </div>
  <?php } ?>

  <div id="fill_up">
  <form method="post" action= "admin_transact_user.php">
    <?php if ($_GET['userid'] == $_SESSION['employee_id']) { ?>
      <center><h2>Edit My Account</h2></center>
    <?php } else { ?>
      <center><h3>Modify Employee Record</h3></center>
    <?php } ?>
    
    <TABLE class="table_edit" width= "90%">
    <TR>
      <TD width="50%" align="right">
      <p>
      Employee ID: &nbsp;&nbsp;<span class="id"><?php echo htmlspecialchars($id); ?></span></h2>
      <input type="hidden" class="txtinput" name="employee_id" value="<?php echo htmlspecialchars($id); ?>">
      </p>

      Username:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" class="txtinput" name="username" size=25px
      value="<?php echo htmlspecialchars($user['username']); ?>">
      <br/>

      Reset Password:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="hidden" id="password" name="password"
      value="<?php echo htmlspecialchars($pass); ?>">
      <br/>

      First Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="first_name" name="first_name" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['first_name']); ?>">
      <br/>
      Middle Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="middle_name" name="middle_name" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['middle_name']); ?>">
      <br/>
      Last Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="last_name" name="last_name" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['last_name']); ?>">
      <br/>
      Gender:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <select name="gender">
        <option value="" selected>Select Gender</option>
        <!-- <option value="" selected><?php echo htmlspecialchars($user['gender']); ?></option> -->
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
      <br/></br>        

      <!--
      Unit ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="unit_id" name="unit_id" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['unit_id']); ?>">
      <br/>
      Designation ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="designation_id" name="designation_id" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['designation_id']); ?>">
      <br/>
      -->

      Unit ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;      
      <select name="unit_id">
      <option value="NULL" selected>None</option>
      <?php
      foreach ($unitList as $key => $value) {
        echo "<option value=\"$key\" ";
        if (isset($unit) && array_key_exists($key,$unit)) {
          echo $unit[$key];
        }
        echo ">$value</option>\n";
      }
      ?>
      </select>
      <br/><br/>

      Designation ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <select name="designation_id">
      <option value="NULL" selected>None</option>
      <?php
      foreach ($designationList as $key => $value) {
        echo "<option value=\"$key\" ";
        if (isset($designation) && array_key_exists($key,$designation)) {
          echo $designation[$key];
        }
        echo ">$value</option>\n";
      }
      ?>
      </select>      
    </TD>

    <TD width="50%" align="right">
      E-Mail Address:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="email_address" name="email_address" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['email_address']); ?>">
      <br/>
      Parent Address:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="parent_address" name="parent_address" maxlength="100" size=25px
      value="<?php echo htmlspecialchars($user['parent_address']); ?>">
      <br/>
      Current Address:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="present_address" name="present_address" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['present_address']); ?>">
      <br/>
      Civil Status:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <select name="civil_status">
        <option value="" selected>Select Status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widowed">Widowed</option>
      </select>
      <br/><br/>
      Birthdate:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="birthdate" name="birthdate" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['birthdate']); ?>">
      <br/>
      Contact Number:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="contact_number" name="contact_number" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['contact_number']); ?>">
      <br/>
      Spouse's Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="spouse_name" name="spouse_name" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['spouse_name']); ?>">
      <br/>
      Spouse's Contact Number:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="spouse_number" name="spouse_number" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['spouse_contact_number']); ?>">
      <br/>
      Father's Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="father_name" name="father_name" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['father_name']); ?>">
      <br/>
      Mother's Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="mother_name" name="mother_name" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['mother_name']); ?>">
      <br/>
      <?php
      if (isset($_SESSION['employee_id']))
      {
        if ($_SESSION['access_level_id'] > 2) {
          echo '<input type="hidden" name="last_updated_by" 
          value ='. $_SESSION['username'];
          echo '>';
        }
      }
      ?>
      Housing Type:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <select name="housing_type">
        <option value="" selected>Select Housing Type</option>
        <option value="Apartment">Apartment</option>
        <option value="Boarding House Off Campus">BHouse Off Campus</option>
        <option value="Boarding House on Campus">BHouse On Campus</option>
        <option value="Own House">Own House</option>
        <option value="Relative\'s House">Relative's House</option>
        <option value="U.P. Dormitory">U.P. Dormitory</option>
        <option value="U.P. Staff House">U.P. Staff House</option>
      </select>
      <br/><br/>
      Citizenship:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" id="citizenship" name="citizenship" maxlength="50" size=25px
      value="<?php echo htmlspecialchars($user['citizenship']); ?>">
      <br/>
    </TD>
  </TR>
  </TABLE>
  
    <center>
    <div id="button">
      <p>
        <input type="submit" class="submit" name="action" value="Save">
      </p>
    </div>
    </center>
  
  </form>

<!------------This part for viewing user account information ---------->     
<?php
} else if (isset($_GET['viewuser'])) {
$id = '';
$sql = "SELECT employee_id, username, password, employee_type, first_name, middle_name, last_name, gender, employee_type,
        email_address, unit_id, designation_id, parent_address, present_address, civil_status, birthdate,
        contact_number, spouse_name, spouse_contact_number, father_name, mother_name, housing_type, access_level_id, citizenship " .
       "FROM employee " .
       "WHERE employee_id=" . $_GET['viewuser'];
$result = mysql_query($sql, $conn)
  or die('Could not look up user data; ' . mysql_error());

$user = mysql_fetch_array($result);

$id = $user['employee_id'];
?>
<div class="main">

    <div id="nav" class="left">
    <?php if ($user['access_level_id'] == 3) { ?>
      <a href="index.php?action=SysAd"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 2) { ?>
      <a href="index.php?action=Faculty"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 4) { ?>
      <a href="index.php?action=Acctg"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 5) { ?>
      <a href="index.php?action=Lib"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 6) { ?>
      <a href="index.php?action=Cashier"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 7) { ?>
      <a href="index.php?action=Cso"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 8) { ?>
      <a href="index.php?action=Osa"><span class="left">&larr;Back to list</span></a>
    <?php } else if ($user['access_level_id'] == 9) { ?>
      <a href="index.php?action=Clerk"><span class="left">&larr;Back to list</span></a>
    <?php } ?>
  </div>

  <div id="nav">
    <span class="right">
    <?php
    if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number']))
    {
      echo '<a href="index.php?action=SearchAcct">Search Account &raquo;';
      echo '</a>';
      echo ' | <a href="index.php?action=SearchAcct">Reset';
      echo '</a>';
      echo ' | <a href="index.php?action=SearchAcct">Backup';
      echo '</a>';
      if ($_SESSION['access_level_id'] == 3) {
        echo ' | <a href="index.php?action=Logs">Logs</a> | ';
      }
      if ($_SESSION['access_level_id'] >1) {
        echo ' <a href="admin_useraccount.php?userid=' . $_SESSION['employee_id'] .
             '" title="' . htmlspecialchars($_SESSION['username']) . '">' . $_SESSION['username'];

      } else if ($_SESSION['access_level_id'] == 1) {
        echo ' | <a href="admin_accountpanel.php">' . $_SESSION['student_number'];
      }
      echo '</a>';
    }
    ?>
     </span>
  </div>

  <div id="fill_up">
    <center><h2>View Employee Record</h2></center>
    
    <TABLE class="table_edit" width= "60%">
      <tr>
      <td>Employee ID:&nbsp;&nbsp;</td>
      <td><span class="id"><?php echo htmlspecialchars($id); ?></span></td>
      <br/>
      </td>

      Username:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['username']); ?></span>
      <br/>

      First Name:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['first_name']); ?></span>
      <br/>
      
      Middle Name:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['middle_name']); ?></span>
      <br/>
      
      Last Name:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['last_name']); ?></span>
      <br/>
      Gender:&nbsp;&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['gender']); ?></span>      
      <br/>
      Unit ID:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['unit_id']); ?></span>
      <br/>
      Designation ID:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['designation_id']); ?></span>
      <br/>

      E-Mail Address:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['email_address']); ?></span>
      <br/>
      Parent Address:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['parent_address']); ?></span>
      <br/>
      Current Address:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['present_address']); ?></span>
      <br/>
      Civil Status:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['civil_status']); ?></span>
      <br/>
      Birthdate:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['birthdate']); ?></span>
      <br/>
      Contact Number:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['contact_number']); ?></span>
      <br/>
      Spouse's Name:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['spouse_name']); ?></span>
      <br/>
      Spouse's Contact Number:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['spouse_contact_number']); ?></span>
      <br/>
      Father's Name:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['father_name']); ?></span>
      <br/>
      Mother's Name:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['mother_name']); ?></span>
      <br/>

      Housing Type:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['housing_type']); ?></span>
      <br/>
      Citizenship:&nbsp;&nbsp;
      <span class="id"><?php echo htmlspecialchars($user['citizenship']); ?></span>
      <br/>

  </TABLE>

  <br/><center>
  <a href="admin_useraccount.php?userid=<?php echo $user['employee_id']?>">Modify</a>
  </center>
 
<?php } ?>
  </div>
</div>

<?php
require_once 'admin_footer.php'; 
?>

