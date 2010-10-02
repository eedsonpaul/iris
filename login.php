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
<div id="login">
  <form method ="post" action="admin_transact_user.php" name="loginform">

<?php
if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'Admin':
?>
  <h2>Administrative Login</h2>

  <p>
    Username:
    <input type="text" name="username" maxlength="255" value="">
  </p>
  <p>
    Password:
    <input type="password" name="password" maxlength="50">
  </p>
  
  <div id="button">
  <p>
    <input type="submit" class="submit" name="action" value="Admin Login">
  </p>
  </div>

<?php
    break;

    case 'AdminError':
?>
  <div id="login_error">
    <span class="red"><b>Incorrect Username/Password Combination!</b></span>
  </div>
  <h2>Administrative Login</h2>

  <p>
    Username:
    <input type="text" name="username" maxlength="255" value="">
  </p>
  <p>
    Password:
    <input type="password" name="password" maxlength="50">
  </p>

  <div id="button">
  <p>
    <input type="submit" class="submit" name="action" value="Admin Login">
  </p>
  </div>

<?php
  break;

  case 'Employee':
?>
  <h2>Employee Login</h2>

  <p>
    Username:
    <input type="text" name="username" maxlength="255" value="">
  </p>
  <p>
    Password:
    <input type="password" name="password" maxlength="50">
  </p>

  <div id="button">
  <p>
    <input type="submit" class="submit" name="action" value="Employee Login">
  </p>
  </div>

<?php
  break;

  case 'EmployeeError':
?>
  <div id="login_error">
    <span class="red">Incorrect Username/Password Combination!</span>
  </div>
  
  <h2>Employee Login</h2>

  <p>
    Username:
    <input type="text" name="username" maxlength="255" value="">
  </p>
  <p>
    Password:
    <input type="password" name="password" maxlength="50">
  </p>

  <div id="button">
  <p>
    <input type="submit" class="submit" name="action" value="Employee Login">
  </p>
  </div>

<?php
  break;

  case 'Student':
?>

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

  <h2>Student Login</h2>

  <p>
    Student ID:
    <input type="text" name="student_number" maxlength="9">
  </p>
  <p>
    Password:
    <input type="password" name="password" maxlength="50">
  </p>

  <!-- <input type="checkbox" name="remember"> -->
  
  <div id="button">
  <p>
    <input type="submit" class="submit" name="action" value="Student Login">
  </p>
  </div>
<!--
}
}

$logged_in = checkLogin();



-->  
<?php
  break;

  case 'StudentError':
?>
  <div id="login_error">
    <span class="red">Incorrect Student Number/Password Combination!</span>
  </div>
  
  <h2>Student Login</h2>

  <p>
    Student ID:
    <input type="text" name="student_number" maxlength="9">
  </p>
  <p>
    Password:
    <input type="password" name="password" maxlength="50">
  </p>
  
  <div id="button">
  <p>
    <input type="submit" class="submit" name="action" value="Student Login">
  </p>
  </div>

<?php
  break;
  }
}
?>

  <p>
    <a href="admin_forgotpass.php">Forgot your password?</a>
  </p>


  </form>
<script language="JavaScript" type="text/javascript">

  var frmvalidator  = new Validator("loginform");
    
  frmvalidator.EnableMsgsTogether();
  
   frmvalidator.addValidation("username","req","Please input username.");
   frmvalidator.addValidation("password","req","Please input password.");
  
</script>
</div>

<?php require_once 'admin_footer.php'; ?>
