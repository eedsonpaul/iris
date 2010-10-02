<?php
require_once '../admin_db_connect.php'

if ($_SESSION($_GET['employee_id'])) {
$id = $_SESSION($_GET['employee_id']);
$sql = "SELECT employee_id, username, password, employee_type, first_name, middle_name, last_name, gender,
        email_address, unit_id, designation_id, parent_address, present_address, civil_status, birthdate,
        contact_number, spouse_name, spouse_contact_number, father_name, mother_name, citizenship, access_level_id " .
       "FROM employee " .
       "WHERE employee_id=" $id;
$result = mysql_query($sql, $conn)
  or die('Could not look up user data; ' . mysql_error());

$user = mysql_fetch_array($result);

?>
<div class="main">

  <div id="fill_up">
      <form method="post" action= "admin_transact_user.php">
      <?php
      echo '<h2>Modify Account</h2>';
      ?>
      
      <p>
      <span class="maroon">Employee ID: &nbsp;&nbsp;&nbsp; </span><span class="id"><?php echo htmlspecialchars($id); ?></span></h2>
      <input type="hidden" class="txtinput" name="employee_id" value="<?php echo htmlspecialchars($id); ?>">
      </p>

      Username:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="text" class="txtinput" name="username" size=25px
      value="<?php echo htmlspecialchars($user['username']); ?>">
      <br/>
      Reset Password:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
      <input type="password" id="password" name="password" maxlength="50" size=25px>
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

      <div id="button">
        <p>
          <input type="submit" class="submit" name="action" value="Save">
        </p>
      </div>
      </form>
      
<?php
