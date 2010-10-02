<html>
<head>
  <title>Create Account | UP Cebu IRIS</title>
</head>
</html>

<?php
require_once 'admin_db_connect.php';
require_once 'admin_http.php';
require_once 'admin_sql_query.php';
require_once 'admin_echolist.php';

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
  $sql = "SELECT * FROM employees WHERE employee_id=" . $_GET['userid'];
  $result = mysql_query($sql, $conn)
    or die('Could not look up user data; ' . mysql_error());

  $row = mysql_fetch_array($result);
  $id = $_GET['userid'];
  $username = $row['username'];
}

require_once 'admin_header.php';
?>

<div class="main">
  <div id="nav" class="left">
    <?php
    if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number']))
    {
      echo '<a href="index.php?action=Logs"><span class="left">&larr;Back';
      echo '</span></a>';
    ?>
  </div>
    
  <div id="nav">
    <span class="right">
    <?php
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
    ?>
    </span>
    <?php
    }
    ?>
  </div>
  <br/>
  
  <form method="post" action= "admin_transact_user.php" name="createform">
    <table class="table_create">
    <tr align="center">
      <td><h2> Create Staff Account </h2></td>
    </tr>

    <tr>
      <td>Grant Access Right:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
      <td>
      <select name="access_level">
      <!-- <option value="" selected><i>Select</i></option> -->
      <?php
      foreach ($accessList as $key => $value) {
        if($key != '1') {
          echo "<option value=\"$key\" ";
          if (isset($access_levels) && array_key_exists($key,$access_levels)) {
              echo $access_levels[$key];
          }
          echo ">$value</option>\n";
        }
      }
      ?>
      </select>
      </td>
    </tr>
    <br/><br/>

    <tr>
      <td>Employee ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
      <td<input type="text" class="txtinput" name="employee_id" maxlength="100" size=25px></td>
    </tr>
    <br/>

    <tr>
      <td>First Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
      <td><input type="text" id="first_name" name="first_name" maxlength="50" size=25px></td>
    </tr>
    <br/>

    <tr>
      <td>Middle Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><input type="text" id="middle_name" name="middle_name" maxlength="50" size=25px></td>
    </tr>
    <br/>

    <tr>
      <td>Last Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
      <td><input type="text" id="last_name" name="last_name" maxlength="50" size=25px></td>
    </tr>
    <br/>

    <tr>
      <td><span class="ast">Username will be auto-generated</span></td><br/><br/>
    </tr><br/>

    <input type="hidden" class="txtinput" name="username" value="<?php echo $uName ?>">

    <tr>
      <td>Password:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
      <td><input type="password" id="password" name="password" maxlength="50" size=25px></td>
    </tr>
    <br/>

    <tr>
      <td>Confirm Password:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
      <td><input type="password" id="password2" name="password2" maxlength="50" size=25px></td>
    </tr>
    <br/>

    <tr>
      <td>Gender:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
      <td>
      <select name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
      </td>
    </tr>
    <br/></br>

    <tr>
      <td>Unit ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
      <td>
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
      </td>
    </tr>
    <br/><br/>

    <tr>
      <td>Designation ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
      <td>
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
      </td>
    </tr>
    <br/><br/>

    <!--
    E-Mail Address:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" id="email_address" name="email_address" maxlength="50" size=25px>
    <br/>  
    Parent Address:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" id="parent_address" name="parent_address" maxlength="100" size=25px>
    <br/>
    Current Address:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" id="present_address" name="present_address" maxlength="50" size=25px>
    <br/>
    Civil Status:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <select name="civil_status">
      <option value="Single">Single</option>
      <option value="Married">Married</option>
      <option value="Widowed">Widowed</option>
    </select>
    <br/><br/>
    Birthdate:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" id="birthdate" name="birthdate" maxlength="50" size=25px>
    <br/>
    Contact Number:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" id="contact_number" name="contact_number" size=25px>
    <br/>
    Spouse's Name:&nbsp;&nbsp;&nbsp;
    <input type="text" id="spouse_name" name="spouse_name" maxlength="50" size=25px>
    <br/>
    Spouse's Contact Number:&nbsp;&nbsp;&nbsp;
    <input type="text" id="spouse_number" name="spouse_number" maxlength="50" size=25px>
    <br/>
    Father's Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" id="father_name" name="father_name" maxlength="50" size=25px>
    <br/>
    Mother's Name:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" id="mother_name" name="mother_name" maxlength="50" size=25px>
    <br/>
    <?php
    //if (isset($_SESSION['employee_id']))
    //{
      if ($_SESSION['access_level_id'] == 3) {
        echo '<input type="hidden" name="last_updated_by" value ='. $_SESSION['username'];
        echo '>';
      }
    //}

    ?>
    Housing Type:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <select name="housing_type">
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
    <input type="text" id="citizenship" name="citizenship" maxlength="50" size=25px>
    <br/><br/>

    <b>If ever password is forgotten...</b><br/><br/>
    Security Question:&nbsp;&nbsp;&nbsp;
    <select name="sec_quest">
      <option value="What is the name of your first school?<" selected>What is the name of your first school?</option>
      <option value="Where is your hometown?">Where is your hometown?</option>
      <option value="What is your favorite past-time?">What is your favorite past-time?</option>
      <option value="Who is your favorite teacher?">Who is your favorite teacher?</option>
      <option value="What is your father's middle name?">What is your father's middle name?</option>
      <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
      <option value="What is your pet's name?">What is your pet's name?</option>
      <option value="Who was your childhood hero?">Who was your childhood hero?</option>
      <option value="What is your betfriend's name?">What is your betfriend's name?</option>
    </select>
    <br/><br/>

    Answer:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;
    <input type="text" id="sec_ans" name="sec_ans" maxlength="50" size=25px>
    <br/><br/>

    -->

    <center>
    <tr class="no_hover">
      <td>
      <div id="button">
        <p>
          <input type="submit" class="submit" name="action" value="Create">
          <input type="reset" value="Clear">
        </p>
      </div>
      </td>
    </tr>
    </center>
    
    </table>
  </form>

  <script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("createform");
    
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("employee_id","req","Please enter an ID.");
    frmvalidator.addValidation("employee_id","num","ID should be numbers.");
    //frmvalidator.addValidation("username","req","Please enter a username.");
    frmvalidator.addValidation("password","req","Please enter a password.");
    frmvalidator.addValidation("password2","req","Please verify password");
    frmvalidator.addValidation("first_name","req","Please enter First Name.");
    //frmvalidator.addValidation("middle_name","req","Please enter Middle Name.");
    frmvalidator.addValidation("last_name","req","Please enter Last Name.");
    
    /*
    frmvalidator.addValidation("email_address","req","Please enter Email Address.");
    frmvalidator.addValidation("email_address","email");
    frmvalidator.addValidation("parent_address","req","Please enter parent address.");
    frmvalidator.addValidation("present_address","req","Please enter Email Address.");
    frmvalidator.addValidation("email_address","req","Please enter Email Address.");
    frmvalidator.addValidation("contact_number","minlen=7");
    frmvalidator.addValidation("contact_number","num","Contact Number: Numbers only.");
    frmvalidator.addValidation("birthdate","req","Please input birthdate.");
    frmvalidator.addValidation("contact_number","num","Contact Number: Numbers only.");
    frmvalidator.addValidation("contact_number","req","Please input Contact Number.");
    frmvalidator.addValidation("father_name","req","Please input Father's Name.");
    frmvalidator.addValidation("spouse_name","alpha","Spouse Name: Characters only.");
    frmvalidator.addValidation("spouse_number","num","Spouse Number: Numbers only.");
    frmvalidator.addValidation("spouse_number","equal=7");
    frmvalidator.addValidation("mother_name","req","Please input Mother's Name.");
    frmvalidator.addValidation("citizenship","req","Please input Citizenship.");
    frmvalidator.addValidation("citizenship", "alpha", "Citizenship stays as character.")
    frmvalidator.addValidation("sec_ans", "req", "Security Answer is required.")
    */
    
    frmvalidator.setAddnlValidationFunction("passValidate");    
  </script>
</div>

<?php
require_once 'admin_footer.php'; 
?>
