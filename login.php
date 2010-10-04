<html>
<head>
  <?php if ($_GET['action'] == 'Admin' 
        or $_GET['action'] == 'AdminError') { ?>
  <title>Admin Login | UP Cebu IRIS </title>
  <?php } else if ($_GET['action'] == 'Employee'
          or $_GET['action'] == 'EmployeeError') { ?>
  <title>Faculty Login | UP Cebu IRIS </title>
  <?php } else if ($_GET['action'] == 'Student' 
          or $_GET['action'] == 'StudentError') { ?>
  <title>Student Login | UP Cebu IRIS </title>
  <?php } ?>
</head>
</html>

<?php require_once 'admin_header.php';
require_once 'admin_http.php';

if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number'])) {
  redirect('index.php');
}

?>

<div class="main">

<?php
if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'Admin':
?>
  <div id="login">
    <form method ="post" action="admin_transact_user.php" name="loginform">
    <center>
    <table width="80%" class="table_login">  
    <tr>
      <td width="100%" colspan=2 valign=top style='background: maroon;'>
      <center><h4>Administrative Login</h4></center>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top>
      <br/>
      </td>
    </tr>
    <?php
    if (isset($_SESSION['flash'])) {
    ?>
    <tr>
      <td width="100%" colspan=2>
      <center>
      <div id="flash_login">
        <center><?php echo $_SESSION['flash']; ?></center>
        <?php unset($_SESSION['flash']); ?>
      </div>
      </center>
      </td>
    </tr>
    <?php } else { ?>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      <br/>
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      </td>
    </tr>

    <tr>
      <td width="40%" class="login">
      Username:
      </td>
      <td width="60%">
      <input type="text" name="username" maxlength="255" value="" size=30>
      </td>
    </tr>

    <tr>
      <td width="40%" class="login">
      Password:
      </td>
      <td>
      <input type="password" name="password" maxlength="50" size=30>
      </td>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      </td>
    </tr>

    <tr>
      <td width="40%" class="login">
      <div id="button">
      <input type="submit" class="submit" name="action" value="Admin Login">
      </div>
      </td>
    </tr>

    <tr>
      <td width="100%" colspan=2 valign=top class="login">
      <a href="admin_forgotpass.php">Forgot your password?</a>
      </td>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      <br/>
      </td>
    </tr>
    
    <tr>
      <td width="100%" colspan=2 valign=top style='background: maroon;'>
      <br/>
      </td>
    </tr>

    </table>
    </center>
    </form>
  </div>

<?php
  break;

  case 'Employee':
?>
  <div id="login">
    <form method ="post" action="admin_transact_user.php" name="loginform">
    <center>
    <table width="80%" class="table_login">  
    <tr>
      <td width="100%" colspan=2 valign=top style='background: maroon;'>
      <center><h4>Employee Login</h4></center>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top>
      <br/>
      </td>
    </tr>
    <?php
    if (isset($_SESSION['flash'])) {
    ?>
    <tr>
      <td width="100%" colspan=2>
      <center>
      <div id="flash_login">
        <center><?php echo $_SESSION['flash']; ?></center>
        <?php unset($_SESSION['flash']); ?>
      </div>
      </center>
      </td>
    </tr>
    <?php } else { ?>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      <br/>
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      </td>
    </tr>

    <tr>
      <td width="40%" class="login">
      Username:
      </td>
      <td width="60%">
      <input type="text" name="username" maxlength="255" value="" size=30>
      </td>
    </tr>

    <tr>
      <td width="40%" class="login">
      Password:
      </td>
      <td>
      <input type="password" name="password" maxlength="50" size=30>
      </td>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      </td>
    </tr>

    <tr>
      <td width="40%" class="login">
      <div id="button">
      <input type="submit" class="submit" name="action" value="Employee Login">
      </div>
      </td>
    </tr>

    <tr>
      <td width="100%" colspan=2 valign=top class="login">
      <a href="admin_forgotpass.php">Forgot your password?</a>
      </td>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      <br/>
      </td>
    </tr>
    
    <tr>
      <td width="100%" colspan=2 valign=top style='background: maroon;'>
      <br/>
      </td>
    </tr>

    </table>
    </center>
    </form>
  </div>

<?php
  break;

  case 'Student':
?>
  <table>
  <tr>
    <td width="550">
    <form method ="post" action="admin_transact_user.php" name="loginform">
    <table width="100%" class="table_login">  
    <tr>
      <td width="100%" colspan=2 valign=top style='background: maroon;'>
      <center><h4>Student Login</h4></center>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top>
      <br/>
      </td>
    </tr>
    <?php
    if (isset($_SESSION['flash'])) {
    ?>
    <tr>
      <td width="100%" colspan=2>
      <center>
      <div id="flash_login">
        <center><?php echo $_SESSION['flash']; ?></center>
        <?php unset($_SESSION['flash']); ?>
      </div>
      </center>
      </td>
    </tr>
    <?php } else { ?>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      <br/>
      </td>
    </tr>
    <?php } ?>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      </td>
    </tr>

    <tr>
      <td width="40%" class="login">
      Username:
      </td>
      <td width="60%">
      <input type="text" name="student_number" maxlength="255" value="" size=30>
      </td>
    </tr>

    <tr>
      <td width="40%" class="login">
      Password:
      </td>
      <td>
      <input type="password" name="password" maxlength="50" size=30>
      </td>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      </td>
    </tr>

    <tr>
      <td width="40%" class="login">
      <div id="button">
      <input type="submit" class="submit" name="action" value="Student Login">
      </div>
      </td>
    </tr>

    <tr>
      <td width="100%" colspan=2 valign=top class="login">
      <a href="admin_forgotpass.php">Forgot your password?</a>
      </td>
    </tr>
    <tr>
      <td width="100%" colspan=2 valign=top style='background: transparent;'>
      <br/>
      </td>
    </tr>
    
    <tr>
      <td width="100%" colspan=2 valign=top style='background: maroon;'>
      <br/>
      </td>
    </tr>

    </table>
    </td>

    <td>
      <div id="studentlogin_info">

        Please type the Student ID and password given to you in the appropriate 
        Student Number and Password boxes at the left-side then click on the "login" 
        button to enter the menu and registration page.<br/>

        <p>
            <ul>
            <li>Get your login account from your college.</li>
            <li>Note the schedule posted on the main page of this site.</li>
            <li>Important: Always update your personal data.</li>
            </ul>
        </p>
        Problems, Comments, Suggestions? Email us at   edsonpaul7512[at]gmail[dot]com   or call   (033)338-1535 / (033)315-9631 loc 190. 
        </p>
      </div>
    </td>
  </tr>
  </table>
<!--

function checkLogin(){

if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])){
      $_SESSION['student_number'] = $_COOKIE['cookname'];
      $_SESSION['password'] = $_COOKIE['cookpass'];
   }

   if(isset($_SESSION['student_number']) && isset($_SESSION['password'])){
	if(confirmUser($_SESSION['username'], $_SESSION['password']) != 0){
		unset($_SESSION['username']);
        unset($_SESSION['password']);
        return false;
	}
		return true;
	} else {
	return false;
	}
	}
	
	function displayLogin(){
   global $logged_in;
   if($logged_in){
      redirect('student/student.php');
   } else {
-->
<!--
}
}

$logged_in = checkLogin();
-->

<?php
  break;

  default:
    redirect('index.php');

  break;
  }
}
?>
  <script language="JavaScript" type="text/javascript">

    var frmvalidator  = new Validator("loginform");
      
    frmvalidator.EnableMsgsTogether();
    
     frmvalidator.addValidation("username","req","Please input username.");
     frmvalidator.addValidation("password","req","Please input password.");
    
  </script>
</div>

<?php require_once 'admin_footer.php'; ?>
