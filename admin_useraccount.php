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
require_once 'admin_db_connect.php';
require_once 'admin_http.php';
require_once 'admin_header.php';

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

  <div id="fill_up">
  <form method="post" action= "admin_transact_user.php">
    <TABLE class="table_edit" width= "90%">
    <tr>
      <?php if ($_GET['userid'] == $_SESSION['employee_id']) { ?>
        <th align="right">Edit My</th>
        <th align="left">Account</th>
      <?php } else { ?>
        <th align="right">Modify</th>
        <th align="left">Account</th>
      <?php } ?>
    <tr>

    <TR>
      <TD width="50%">
        <tr>
          <td>
          Employee ID: &nbsp;&nbsp;<span class="id"><?php echo htmlspecialchars($id); ?></span></h2>
          </td>
          <td>
          <input type="hidden" class="txtinput" name="employee_id" value="<?php echo htmlspecialchars($id); ?>">
          </td>
        </tr>

        <tr>
          <td>
          Username:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
          </td>
          <td>
          <input type="text" class="txtinput" name="username" size=25px
            value="<?php echo htmlspecialchars($user['username']); ?>">
          </td>
        </tr>

      <!--
      Reset Password:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="password" id="password" name="password" maxlength="50" size=25px>
      <br/>
      -->
        <tr>
          <td>
          First Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
          </td>
          <td>
          <input type="text" id="first_name" name="first_name" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['first_name']); ?>">
          </td>
        </tr>

        <tr>
          <td>
          Middle Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
          </td>
          <td>
          <input type="text" id="middle_name" name="middle_name" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['middle_name']); ?>">
          </td>
        </tr>
        
        <tr>
          <td>        
          Last Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
          </td>
          <td>
          <input type="text" id="last_name" name="last_name" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['last_name']); ?>">
          </td>
        </tr>

        <tr>
          <td>        
          Gender:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
          </td>
          <td>
          <select name="gender">
            <option value="" selected>Select Gender</option>
            <!-- <option value="" selected><?php echo htmlspecialchars($user['gender']); ?></option> -->
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          </td>
        </tr>    

        E-Mail Address:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
        <input type="text" id="email_address" name="email_address" maxlength="50" size=25px
        value="<?php echo htmlspecialchars($user['email_address']); ?>">
        <br/>
        Unit ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
        <input type="text" id="unit_id" name="unit_id" maxlength="50" size=25px
        value="<?php echo htmlspecialchars($user['unit_id']); ?>">
        <br/>
        Designation ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
        <input type="text" id="designation_id" name="designation_id" maxlength="50" size=25px
        value="<?php echo htmlspecialchars($user['designation_id']); ?>">
        <br/>
    </TD>

    <TD width="50%">
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
  <br/>

  <div id="fill_up">
    <h2>View Account</h2>

    Employee ID: &nbsp;&nbsp;&nbsp;<input type="text" disabled="true" name="username" maxlength="100" size=25px
    value="<?php echo htmlspecialchars($id); ?>">
    
    <br/>
    Username:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" disabled="true" name="username" maxlength="100" size=25px
    value="<?php echo htmlspecialchars($user['username']); ?>">
    <br/>
    Reset Password:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="password" disabled="true" id="password" name="password" maxlength="50" size=25px>
    <br/>

    First Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" disabled="true" id="first_name" name="first_name" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['first_name']); ?>">
    <br/>
    Middle Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" disabled="true" id="middle_name" name="middle_name" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['middle_name']); ?>">
    <br/>
    Last Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" disabled="true" id="last_name" name="last_name" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['last_name']); ?>">
    <br/>
    Gender:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <select name="gender" disabled="true">
      <option value="" selected>Select Gender</option>
      <option value="" selected><?php echo htmlspecialchars($user['gender']); ?></option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <br/></br>
    E-Mail Address:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text"  disabled="true" id="email_address" name="email_address" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['email_address']); ?>">
    <br/>
    Unit ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text"  disabled="true" id="unit_id" name="unit_id" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['unit_id']); ?>">
    <br/>
    Designation ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text"  disabled="true" id="designation_id" name="designation_id" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['designation_id']); ?>">
    <br/>
    Parent Address:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text"  disabled="true" id="parent_address" name="parent_address" maxlength="100" size=25px
    value="<?php echo htmlspecialchars($user['parent_address']); ?>">
    <br/>
    Current Address:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text"  disabled="true" id="present_address" name="present_address" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['present_address']); ?>">
    <br/>
    Civil Status:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <select name="civil_status"  disabled="true" >
      <option value="" selected><?php echo htmlspecialchars($user['civil_status']); ?></option>
      <option value="" selected>Select Status</option>
      <option value="Single">Single</option>
      <option value="Married">Married</option>
      <option value="Widowed">Widowed</option>
    </select>
    <br/><br/>
    Birthdate:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" disabled="true" id="birthdate" name="birthdate" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['birthdate']); ?>">
    <br/>
    Contact Number:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" disabled="true" id="contact_number" name="contact_number" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['contact_number']); ?>">
    <br/>
    Spouse's Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" disabled="true" id="spouse_name" name="spouse_name" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['spouse_name']); ?>">
    <br/>
    Spouse's Contact Number:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" disabled="true" id="spouse_number" name="spouse_number" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['spouse_contact_number']); ?>">
    <br/>
    Father's Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" disabled="true" id="father_name" name="father_name" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['father_name']); ?>">
    <br/>
    Mother's Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" disabled="true" id="mother_name" name="mother_name" maxlength="50" size=25px
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
    <select name="housing_type" disabled="true">
      <option value="" selected><?php echo htmlspecialchars($user['housing_type']); ?></option>
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
    <input type="text" disabled="true" id="citizenship" name="citizenship" maxlength="50" size=25px
    value="<?php echo htmlspecialchars($user['citizenship']); ?>">
    
    <br/><br/>
  </div>

  <center>
  <a href="admin_useraccount.php?userid=<?php echo $user['employee_id']?>">
  Modify
  </a>
  </center>
<?php } ?>
  </div>
</div>

<?php
require_once 'admin_footer.php'; 
?>

