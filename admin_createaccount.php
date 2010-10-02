<html>
<head>
  <title>Create Account | UP Cebu IRIS</title>
</head>
</html>


<?php
require_once 'admin_http.php';
require_once 'admin_db_connect.php';
require_once 'admin_sql_query.php';
require_once 'admin_echolist.php';
require_once 'admin_header.php';

if ($_SESSION['access_level_id'] != 3)  {
  redirect('error.php');
}
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

  <div id="fill_up">  
    <form method="post" action= "admin_transact_user.php" name="createform">
      <tr align="center">
        <center><h2> Create Staff Account </h2></center>
      </tr>

      <TABLE width="60%" class="table_edit">
      <tr>
        <td>Employee ID:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
        <td<input type="text" class="txtinput" name="employee_id" maxlength="100" size=25px></td>
      </tr>
      <br/>

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
        <td>Unit:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
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
        <td>Designation:<span class="ast">*</span>&nbsp;&nbsp;&nbsp;</td>
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
      <input type="hidden" id="last_updated_by" name="last_updated_by"
        value="<?php  htmlspecialchars($_SESSION['username']) ?>">

      <center>
      <tr>
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
      </TABLE>
    </form>
  </div>

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
