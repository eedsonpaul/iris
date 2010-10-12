<?php if (isset($_GET['userid'])) { ?>
<title>Edit Profile | UP Cebu IRIS </title>
<?php } else { ?>
<title>Edit Login Account | UP Cebu IRIS </title>
<?php } ?>

<script language="JavaScript">
	  function init(){
		  document.adminform.reset();
		
		  oStringMask = new Mask("#########");
		  oStringMask.attach(document.adminform.student_number);
		  
		  oStringMask = new Mask("(###)###-####");
		  oStringMask.attach(document.adminform.contact_number);	
	  }
  </script>

<?php
require_once 'admin_http.php';
require_once 'admin_db_connect.php';
require_once 'admin_header.php';
require_once 'admin_sql_query.php';

if (!isset($_SESSION['access_level_id']))
  redirect('error.php');
?>


<div class="main">
  <div id="for_admin">
    <div id="admin_nav" class="right">
      <?php
      if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number']))
      {
        if ($_SESSION['access_level_id'] == 3) {
          echo '<a href="index.php?action=SearchAcct">Search Account &raquo;';
          echo '</a>';
          echo ' | <a href="index.php?action=Logs">Logs</a> | ';
          echo ' <a href="admin_panel.php">' . $_SESSION['username'];
        } else if ($_SESSION['access_level_id'] == 1) {
          echo ' | <a href="admin_accountpanel.php">' . $_SESSION['student_number'];
        }
        echo '</a>';
      }
      ?>
    </div>

<?php
if (isset($_GET['userid'])) {
$id = '';
$sql = "SELECT employee_id, username, employee_type, first_name, middle_name, last_name, gender,
        email_address, unit_id, designation_id, parent_address, present_address, civil_status, birthdate,
        contact_number, spouse_name, spouse_contact_number, father_name, mother_name, citizenship, 
        housing_type, security_question, security_answer, access_level_id " .
       "FROM employee " .
       "WHERE employee_id=" . $_GET['userid'];
$result = mysql_query($sql, $conn)
  or die('Could not look up user data; ' . mysql_error());

$user = mysql_fetch_array($result);

$id = $user['employee_id'];
?>
    <?php if ($_SESSION['access_level_id'] == 3) { ?>
      <div id="admin_nav" class="left">
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
    <?php } else { ?>
      <div id="admin_nav" class="left">
        <a href="javascript:history.back(-1);">&larr;Back</a>
      </div>
    <?php } ?>
  </div>

  <div id="fill_up">
  <form method="post" action= "admin_transact_user.php" name="adminform">
    
    <TABLE class="table_edit" style='background: #e0e0e0;'>
    <TR>
      <td colspan=2 align="center" style='background: maroon; color: white;'>
      <?php if ($_GET['userid'] == $_SESSION['employee_id']) { ?>
        <h3>Edit My Account</h3>
      <?php } else { ?>
        <h3>Modify Employee Record</h3>
      <?php } ?>
      </td>
    </TR>

    <TR>
      <?php
      if (isset($_SESSION['flash'])) {
      ?>
      <td colspan=2 align="center">
        <center>
        <div id="flash_login">
          <center><?php echo $_SESSION['flash']; ?></center>
          <?php unset($_SESSION['flash']); ?>
        </div>
        </center>
      </td>
      <?php } else { ?>
        <td>
          <br/>
        </td>
      <?php } ?>
    </TR>
    
    <TR>
      <TD width="90%">
      <table algin="left" class="table_edit2">
        <tr>
          <td>Employee ID:</td>
          <td><span class="id"><?php echo htmlspecialchars($id); ?></span></h2></td>
          <input type="hidden" class="txtinput" name="employee_id" value="<?php echo htmlspecialchars($id); ?>">
        </tr>

        <input type="hidden" class="txtinput" name="access_level"
        value="<?php echo htmlspecialchars($user['access_level_id']); ?>">
        <?php if ($_SESSION['access_level_id'] != 3) { ?>
        <tr>
          <td>Employee Name:&nbsp;&nbsp;</td>
          <td><span class="id"><?php
            echo $user['first_name'];
            echo '&nbsp;';
            echo $user['middle_name'];
            echo '&nbsp;';
            echo $user['last_name']; 
          ?></span></td>
        </tr>

        <tr>
          <td>Username:</td>
          <td><span class="id"><?php echo ($user['username']); ?></pan></td>
        </tr>
        <?php } else {?>
        <tr>
          <td>Username:<span class="ast">*</span></td>
          <td><input type="text" class="txtinput" name="username" size=25px
          value="<?php echo htmlspecialchars($user['username']); ?>"></td>
        </tr>

        <tr>
        <td>First Name:<span class="ast">*</span>
        <td><input type="text" id="first_name" name="first_name" maxlength="50" size=25px
        value="<?php echo htmlspecialchars($user['first_name']); ?>"></td>
        </tr>

        <tr>
          <td>Middle Name:<span class="ast">*</span>
          <td><input type="text" id="middle_name" name="middle_name" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['middle_name']); ?>"></td>
        </tr>

        <tr>
        <td>Last Name:<span class="ast">*</span></td>
        <td><input type="text" id="last_name" name="last_name" maxlength="50" size=25px
        value="<?php echo htmlspecialchars($user['last_name']); ?>"></td>
        </tr>
        <?php } ?>

        </tr>
          <td>Gender:<span class="ast">*</span></td>
          <td>
          <select name="gender">
            <?php if ($user['gender'] == 'Male') { ?>
              <option value="Male" selected>Male</option>
            <?php } else { ?>
              <option value="Male">Male</option>
            <?php } ?>

            <?php if ($user['gender'] == 'Female') {?>
              <option value="Female" selected>Female</option>
            <?php } else { ?>
              <option value="Female">Female</option>
            <?php } ?>
          </select>
          </td>
        </tr>

        <tr>
          <td>Unit:<span class="ast">*</span></td>
          <td>
          <select name="unit_id">
          <?php if ($user['unit_id'] == NULL) { ?>
            <option value="NULL" selected>None</option>
          <?php } else { ?>
            <option value="NULL">None</option>
          <?php
          }
          foreach ($unitList as $key => $value) {
            echo "<option value=\"$key\" ";
            if (isset($unit) && array_key_exists($key,$unit)) {
              echo $unit[$key];
            }
            /*
            if ($value == 'Natural Sciences and Mathematics Division') {
              echo ">NSMD</option>\n";
            } else if ($value == 'Department of Computer Science') {
              echo ">Dept. of Computer Science</option>\n"; 
            } else { */
            if ($user['unit_id'] == $key) {
              echo "selected>$value</option>\n";
            } else {
              echo ">$value</option>\n";
            }
            //}
          }
          ?>
          </select>
          </td>
        </tr>

        <tr>
          <td>Designation:<span class="ast">*</span></td>
          <td>
          <select name="designation_id">
          <?php if ($user['designation_id'] == NULL) { ?>
            <option value="NULL" selected>None</option>
          <?php } else { ?>
            <option value="NULL">None</option>
          <?php
          }
          foreach ($designationList as $key => $value) {
            echo "<option value=\"$key\" ";
            if (isset($designation) && array_key_exists($key,$designation)) {
              echo $designation[$key];
            }
            if ($key == $user['designation_id']) {
              echo "selected>$value</option>\n";
            } else {
              echo ">$value</option>\n";
            }
          }
          ?>
          </select>
          </td>
        </tr>

        <tr>
          <td>E-Mail Address:
          <td>
          <input type="text" id="email_address" name="email_address" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['email_address']); ?>">
          </td>
        </tr>

        <tr>
        <td>Civil Status:<span class="ast">*</span></td>
        <td>
        <select name="civil_status">
            <?php if ($user['civil_status'] == NULL) { ?>
              <option value="NULL" selected>Select Status</option>
            <?php } else { ?>
              <option value="NULL">Select Status</option>
            <?php } ?>
                    
            <?php if ($user['civil_status'] == 'Single') { ?>
              <option value="Single" selected>Single</option>
            <?php } else { ?>
              <option value="Single">Single</option>
            <?php } ?>

            <?php if ($user['civil_status'] == 'Married') { ?>
              <option value="Married" selected>Married</option>
            <?php } else { ?>
              <option value="Married">Married</option>
            <?php } ?>            

            <?php if ($user['civil_status'] == 'Widowed') { ?>
              <option value="Widowed" selected>Widowed</option>
            <?php } else { ?>
              <option value="Widowed">Widowed</option>
            <?php } ?>
        </select>
        </td>
        </tr>      

        <tr>
          <td>Birthdate:<span class="ast">*</span></td>
          <td>
          <input type="text" id="birthdate" name="birthdate" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['birthdate']); ?>">
          </td>
        </tr>

        <tr>
          <td>Contact Number:<span class="ast">*</span></td>
          <td>
          <input type="text" id="contact_number" name="contact_number" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['contact_number']); ?>">
          </td>
        </tr>

        <tr>
          <td>Parent Address:
          <td><input type="text" id="parent_address" name="parent_address" maxlength="100" size=25px
          value="<?php echo htmlspecialchars($user['parent_address']); ?>"></td>
        </tr>

        <tr>
          <td>Current Address:
          <td>
          <input type="text" id="present_address" name="present_address" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['present_address']); ?>">
          </td>
        </tr>

        <tr>
          <td>Spouse's Name:
          <td>
          <input type="text" id="spouse_name" name="spouse_name" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['spouse_name']); ?>">
          </td>
        </tr>

        <tr>
          <td>Spouse's Contact Number:
          <td>
          <input type="text" id="spouse_number" name="spouse_number" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['spouse_contact_number']); ?>">
          </td>
        </tr>

        <tr>
          <td>Father's Name:
          <td>
          <input type="text" id="father_name" name="father_name" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['father_name']); ?>">
          </td>
        </tr>

        <tr>
          <td>Mother's Name:
          <td>
          <input type="text" id="mother_name" name="mother_name" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['mother_name']); ?>">
          </td>
        </tr>
        
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

        <tr>
          <td>Housing Type:
          <td>
          <select name="housing_type">
            <?php if ($user['housing_type'] == NULL) { ?>
              <option value="NULL" selected>Select Housing Type</option>
            <?php } ?>

            <?php if ($user['housing_type'] == 'Apartment') { ?>
              <option value="Apartment" selected>Apartment</option>
            <?php } else { ?>
              <option value="Apartment">Apartment</option>
            <?php } ?>

            <?php if ($user['housing_type'] == 'Boarding House Off Campus') { ?>
              <option value="Boarding House Off Campus" selected>BHouse Off Campus</option>
            <?php } else { ?>
              <option value="Boarding House Off Campus">BHouse Off Campus</option>
            <?php } ?>

            <?php if ($user['housing_type'] == 'Boarding House on Campus') { ?>
              <option value="Boarding House on Campus" selected>BHouse On Campus</option>
            <?php } else { ?>
              <option value="Boarding House on Campus">BHouse On Campus</option>
            <?php } ?>

            <?php if ($user['housing_type'] == 'Own House') { ?>
              <option value="Own House" selected>Own House</option>
            <?php } else { ?>
              <option value="Own House">Own House</option>
            <?php } ?>

            <?php if ($user['housing_type'] == 'Relative\'s House') { ?>
              <option value="Relative\'s House" selected>Relative's House</option>
            <?php } else { ?>
              <option value="Relative\'s House">Relative's House</option>
            <?php } ?>

            <?php if ($user['housing_type'] == 'U.P. Dormitory') { ?>
              <option value="U.P. Dormitory" selected>U.P. Dormitory</option>
            <?php } else { ?>
              <option value="U.P. Dormitory">U.P. Dormitory</option>
            <?php } ?>            

            <?php if ($user['housing_type'] == 'U.P. Staff House') { ?>
              <option value="U.P. Staff House" selected>U.P. Staff House</option>
            <?php } else { ?>
              <option value="U.P. Staff House">U.P. Staff House</option>
            <?php } ?> 
          </select>
          </td>
        </tr>

        <tr>
          <td>Citizenship:
          <td>
          <input type="text" id="citizenship" name="citizenship" maxlength="50" size=25px
          value="<?php echo htmlspecialchars($user['citizenship']); ?>">
          </td>
        </tr>

        <tr>
          <td colspan=2>
          <center>
          <div id="button">
            <p>
              <input type="submit" class="submit" name="action" value="Save Changes">
            </p>
          </div>
          </center>          
          <td>
        </tr>
      </table>
    </TD>
  </TR>
  </TABLE>
  
  </form>
  
  <script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("adminform");
    
    frmvalidator.EnableMsgsTogether();
	
	frmvalidator.addValidation("unit_id","dontselect=0","Unit ID requires valid option.");
	frmvalidator.addValidation("designation_id","dontselect=0","Designation ID requires valid option.");
	frmvalidator.addValidation("civil_status","dontselect=0","Civil Status requires valid option.");
	frmvalidator.addValidation("spouse_name","alpha_s","Spouse's Name contains invalid characters.");
	frmvalidator.addValidation("father_name","alpha_s","Father's Name contains invalid characters.");
	frmvalidator.addValidation("mother_name","alpha_s","Mother's Name contains invalid characters.");
	frmvalidator.addValidation("Citizenship","alpha_s","Citizenship contains invalid characters.");
	frmvalidator.addValidation("email_address","email","Invalid Email.");
    	frmvalidator.addValidation("birthdate","num","Birthdate contains invalid characters.");
    	frmvalidator.addValidation("contact_number","num","Contact Number contains invalid characters.");
	
	
  </script>

<!------------This part for viewing user account information ----------> 
<?php
} else if (isset($_GET['editlogin'])) {
$id = '';
$sql = "SELECT employee_id, username, password, first_name, middle_name, last_name,
        unit_id, designation_id, access_level_id, security_question, security_answer " .
       "FROM employee " .
       "WHERE employee_id=" . $_GET['editlogin'];
$result = mysql_query($sql, $conn)
  or die('Could not look up user data; ' . mysql_error());

$user = mysql_fetch_array($result);

$id = $user['employee_id'];
?>
    <?php if ($_SESSION['access_level_id'] == 3) { ?>
      <div id="admin_nav" class="left">
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
    <?php } else { ?>
      <div id="admin_nav" class="left">
        <a href="javascript:history.back(-1);">&larr;Back</a>
      </div>
    <?php } ?>
  </div>

  <div id="fill_up">
  <form method="post" action= "admin_transact_user.php">  
    <TABLE class="table_edit3" width= "45%">
      <tr style="background: gray;">
        <td colspan=2>
        <center><h2>Edit Login Account</h2></center>
        </td>
      </tr>

        <?php
        if (isset($_SESSION['flash'])) {
        ?>
        <td colspan=2 align="center">
          <center>
          <div id="flash_login">
            <center><?php echo $_SESSION['flash']; ?></center>
            <?php unset($_SESSION['flash']); ?>
          </div>
          </center>
        </td>
        <?php } else { ?>
          <td>
            <br/>
          </td>
        <?php } ?>
      </tr>

      <tr>
        <td>Employee ID:&nbsp;&nbsp;</td>
        <td><span class="id"><?php echo htmlspecialchars($id); ?></span></td>
        <input type="hidden" class="txtinput" name="employee_id" value="<?php echo htmlspecialchars($id); ?>">
        <br/>
      </tr>

      <tr>
        <td>Username:&nbsp;&nbsp;</td>
        <td><span class="id"><?php echo $user['username']; ?></span></td>
      <tr/>

      <tr>
        <td>Employee Name:&nbsp;&nbsp;</td>
        <td><span class="id"><?php
          echo $user['first_name'];
          echo '&nbsp;';
          echo $user['middle_name'];
          echo '&nbsp;';
          echo $user['last_name']; 
        ?></span></td>
      </tr>
        
      <tr>
        <td>Unit:&nbsp;&nbsp;</td>
        <td><span class="id"><?php echo htmlspecialchars($user['unit_id']); ?></span></td>
      </tr>

      <tr>
        <td>Designation:&nbsp;&nbsp;</td>
        <td><span class="id"><?php echo htmlspecialchars($user['designation_id']); ?></span></td>
        <br/>
      </tr>

      <tr>
        <td colspan=2>
        <br/>
        </td>
      </tr>
      <tr>
        <td>Reset Password:<span class="ast">*</span></td>
        <td><input type="password" id="password" name="password" maxlength="50" size=25px><td>
      </tr>

      <tr>
        <td>Confirm:<span class="ast">*</span></td>
        <td><input type="password" id="password2" name="password2" maxlength="50" size=25px><td>
      </tr>

      <tr>
        <td colspan=2>
        <br/>
        </td>
      </tr>
      <tr>
        <td colspan=2>
        <b>If ever password is forgotten...</b><br/>
        </td>
      </tr>
      <tr>
        <td colspan=2>
        <br/>
        </td>
      </tr>

      <tr>
        <td>Security Question:</td>
        <td>
        <select name="sec_quest">
          <?php if ($user['security_question'] == NULL) { ?>
            <option value="NULL" selected>Select Security Question</option>
          <?php } ?>
          
          <?php if ($user['security_question'] == 'What is the name of your first school?') { ?>
            <option value="What is the name of your first school?" selected>What is the name of your first school?</option>
          <?php } else { ?>
            <option value="What is the name of your first school?">What is the name of your first school?</option>
          <?php } ?>

          <?php if ($user['security_question'] == 'Where is your hometown?') { ?>
            <option value="Where is your hometown?" selected>Where is your hometown?</option>
          <?php } else { ?>
            <option value="Where is your hometown?">Where is your hometown?</option>
          <?php } ?>
          
          <?php if ($user['security_question'] == 'What is your favorite past-time?') { ?>
            <option value="What is your favorite past-time?" selected>What is your favorite past-time?</option>
          <?php } else { ?>
            <option value="What is your favorite past-time?">What is your favorite past-time?</option>
          <?php } ?>
                      
          <?php if ($user['security_question'] == 'Who is your favorite teacher?') { ?>
            <option value="Who is your favorite teacher?" selected>Who is your favorite teacher?</option>
          <?php } else { ?>
            <option value="Who is your favorite teacher?">Who is your favorite teacher?</option>
          <?php } ?>
          
          <?php if ($user['security_question'] == 'What is your father\'s middle name?') { ?>
            <option value="What is your father\'s middle name?" selected>What is your father's middle name?</option>
          <?php } else { ?>
            <option value="What is your father\'s middle name?">What is your father's middle name?</option>
          <?php } ?>
                      
          <?php if ($user['security_question'] == 'What is your mother\'s maiden name?') { ?>
            <option value="What is your mother\'s maiden name?" selected>What is your mother's maiden name?</option>
          <?php } else { ?>
            <option value="What is your mother\'s maiden name?">What is your mother's maiden name?</option>
          <?php } ?>            

          <?php if ($user['security_question'] == 'What is your pet\'s name?') { ?>
            <option value="What is your pet\'s name?" selected>What is your pet's name?</option>
          <?php } else { ?>
            <option value="What is your pet\'s name?">What is your pet's name?</option>
          <?php } ?>

          <?php if ($user['security_question'] == 'Who was your childhood hero?') { ?>
            <option value="Who was your childhood hero?" selected>Who was your childhood hero?</option>
          <?php } else { ?>
            <option value="Who was your childhood hero?">Who was your childhood hero?</option>
          <?php } ?>
         
          <?php if ($user['security_question'] == 'What is your bestfriend\'s name?') { ?>
            <option value="What is your bestfriend\'s name?" selected>What is your bestfriend's name?</option>
          <?php } else { ?>
            <option value="What is your bestfriend\'s name?">What is your bestfriend's name?</option>
          <?php } ?>                        
        </select>
        </td>
      </tr>

      <tr>
        <td>Answer:<span class="ast">*</span></td>
        <td><input type="text" id="sec_ans" name="sec_ans" maxlength="50" size=25px
        value="<?php echo htmlspecialchars($user['security_answer']); ?>">
        </td>
      </tr>

      <tr>
      <td colspan=2>
      <center>
      <div id="button">
        <p>
          <input type="submit" class="submit" name="action" value="Edit Login Account">
        </p>
      </div>
      </td>
      </center>
      </tr>
    </TABLE>
  </form>
  
<?php } ?>
  </div>
</div>

<?php
require_once 'admin_footer.php'; 
?>

