<?php
require_once 'admin_http.php';
require_once 'admin_db_connect.php';
require_once 'admin_functions.php';

  if (isset($_GET['admindelete'])) {
    $sql = "DELETE FROM employee WHERE employee_id='" . $_GET['admindelete'] . "' LIMIT 1";
    $result = mysql_query($sql, $conn)
      or die('Could not look up user data; ' . mysql_error());
    session_start();
    $_SESSION['flash'] =  'Account succesfully deleted!';
    redirect('index.php?action=SysAd');

  } else if (isset($_GET['divdelete'])) {
    $sql = "DELETE FROM employee WHERE employee_id='" . $_GET['divdelete'] . "' LIMIT 1";
    $result = mysql_query($sql, $conn)
      or die('Could not look up user data; ' . mysql_error());
    session_start();
    $_SESSION['flash'] =  'Account succesfully deleted!';    
    redirect('index.php?action=Faculty');
    
  } else if (isset($_GET['acctgdelete'])) {
    $sql = "DELETE FROM employee WHERE employee_id='" . $_GET['acctgdelete'] . "' LIMIT 1";
    $result = mysql_query($sql, $conn)
      or die('Could not look up user data; ' . mysql_error());
    session_start();
    $_SESSION['flash'] =  'Account succesfully deleted!';    
    redirect('index.php?action=Acctg');
    
  } else if (isset($_GET['csodelete'])) {
    $sql = "DELETE FROM employee WHERE employee_id='" . $_GET['csodelete'] . "' LIMIT 1";
    $result = mysql_query($sql, $conn)
      or die('Could not look up user data; ' . mysql_error());
    session_start();
    $_SESSION['flash'] =  'Account succesfully deleted!';    
    redirect('index.php?action=Cso');
    
  } else if (isset($_GET['osadelete'])) {
    $sql = "DELETE FROM employee WHERE employee_id='" . $_GET['osadelete'] . "' LIMIT 1";
    $result = mysql_query($sql, $conn)
      or die('Could not look up user data; ' . mysql_error());
    session_start();
    $_SESSION['flash'] =  'Account succesfully deleted!';    
    redirect('index.php?action=Osa');
    
  } else if (isset($_GET['libdelete'])) {
    $sql = "DELETE FROM employee WHERE employee_id='" . $_GET['libdelete'] . "' LIMIT 1";
    $result = mysql_query($sql, $conn)
      or die('Could not look up user data; ' . mysql_error());
    session_start();
    $_SESSION['flash'] =  'Account succesfully deleted!';    
    redirect('index.php?action=Lib');

  } else if (isset($_GET['cashierdelete'])) {
    $sql = "DELETE FROM employee WHERE employee_id='" . $_GET['cashierdelete'] . "' LIMIT 1";
    $result = mysql_query($sql, $conn)
      or die('Could not look up user data; ' . mysql_error());
    session_start();
    $_SESSION['flash'] =  'Account succesfully deleted!';    
    redirect('index.php?action=Cashier');
    
  } else if (isset($_GET['clerkdelete'])) {
    $sql = "DELETE FROM employee WHERE employee_id='" . $_GET['clerkdelete'] . "' LIMIT 1";
    $result = mysql_query($sql, $conn)
      or die('Could not look up user data; ' . mysql_error());
    session_start();
    $_SESSION['flash'] =  'Account succesfully deleted!';    
    redirect('index.php?action=Clerk');
  }

if (isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
  /////Staff Login
    case 'Login':
      if (isset($_POST['username'])
          and isset($_POST['password']))
      {
        $sql = "SELECT employee_id, access_level_id, username " .
               "FROM employee " .
               "WHERE username='" . $_POST['username'] . "' " .
               "AND password='" . md5($_POST['password']) . "'" . 
			         "AND access_level_id != 1";

        $result = mysql_query($sql, $conn)
          or die('Could not look up user information; ' . 
                 mysql_error());

        if ($row = mysql_fetch_array($result)) {
          session_start();
          $_SESSION['employee_id'] = $row['employee_id'];
          $_SESSION['access_level_id'] = $row['access_level_id'];
          $_SESSION['username'] = $row['username'];

          if ($row['access_level_id'] == 3) header("Location: index.php?action=Logs");
          else if ($row['access_level_id'] == 4) header("Location: accounting/accounting.php");
		      else if ($row['access_level_id'] == 2) header("Location: divisionosa/faculty/faculty.php");
		      else if ($row['access_level_id'] == 5) header("Location: accounting/library.php");
		      else if ($row['access_level_id'] == 6) header("Location: accounting/cashier.php");
		      else if ($row['access_level_id'] == 7) header("Location: cso/cso.php");
		      else if ($row['access_level_id'] == 8) header("Location: divisionosa/osa/osa.php");
		      else if ($row['access_level_id'] == 9) header("Location: divisionosa/clerk/clerk.php");
        } else {
          session_start();
          $_SESSION['flash'] = 'Invalid Username/Password Combination';
          redirect('login.php?action=Staff');
        }
      }
      break;

    //////Student Login
    case 'Student Login':
      if (isset($_POST['student_number'])
          and isset($_POST['password']))
      {
   /*     $sql = "SELECT student_number, access_level_id" .
               "FROM student " .
               "WHERE student_number='" . $_POST['student_number'] . "' " .
               "AND password='" . $_POST['password'] . "' " .
               "AND access_level_id=1";
   
     
   
        $result = mysql_query($sql, $conn)
          or die('Could not look up user information; ' . 
                 mysql_error());

  */
      $result = mysql_query("SELECT student_number, access_level_id, password FROM student WHERE 
                student_number= '" . $_POST['student_number'] . "' AND password='" . md5($_POST['password']) . "' 
                AND access_level_id=1 ");

      if ($row = mysql_fetch_array($result)) {
        session_start();
        $_SESSION['student_number'] = $row['student_number'];
	    $_SESSION['password'] = $row['password'];
        $_SESSION['access_level_id'] = $row['access_level_id'];
          
	      if(isset($_POST['remember'])){
		      setcookie("cookname", $_SESSION['student_number'], time()+60*60*24*100, "/");
		      setcookie("cookpass", $_SESSION['password'], time()+60*60*24*100, "/");
	      }

	      redirect('student/student.php?');
        } else {
          session_start();
          $_SESSION['flash'] = 'Invalid Student Number/Password Combination';
          redirect('login.php?action=Student');
        }
      }
      break;

    case 'Logout':
      session_start();
	  
	    if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])) {
	      setcookie("cookname", "", time()-60*60*24*100, "/");
		    setcookie("cookpass", "", time()-60*60*24*100, "/");
	    }
	    $id = $_SESSION['access_level_id'];
	    
	    if ($id == 1) {
		    session_unset();
		    session_destroy();
		    session_start();
		    $_SESSION['flash'] = 'Successfully Logged Out';
	        redirect('login.php?action=Student');
	    } else {
		    session_unset();
		    session_destroy();
		    session_start();
		    $_SESSION['flash'] = 'Successfully Logged Out';
	        redirect('login.php?action=Staff');
	    }
      break;

    case 'Create':
      if (isset($_POST['employee_id'])
          and isset($_POST['access_level'])
          and isset($_POST['first_name'])
          or isset($_POST['middle_name'])
          and isset($_POST['last_name'])
          and isset($_POST['username'])
          and isset($_POST['password'])
          and isset($_POST['password2'])
          and isset($_POST['gender'])          
          and isset($_POST['unit_id'])
          and isset($_POST['designation_id'])
          and isset($_POST['last_updated_by'])
          and $_POST['password'] == $_POST['password2'])          
      {
        $uName = generateUsername($_POST['first_name'], $_POST['last_name']);

        $hashedPassword = md5($_POST['password']);

        $sql = "INSERT INTO employee (employee_id, username, password, access_level_id,
                first_name, middle_name, last_name, gender, last_updated_by,
                unit_id, designation_id) " .
               "VALUES ('" . $_POST['employee_id'] . "','$uName',
               '$hashedPassword','" . $_POST['access_level'] . "',
               '" . $_POST['first_name'] . "',
               '" . $_POST['middle_name'] . "','" . $_POST['last_name'] . "',
               '" . $_POST['gender'] . "','" . $_POST['last_updated_by'] . "',
               '" . $_POST['unit_id'] . "','" . $_POST['designation_id'] . "')";

        //insert tracking function here
        session_start();
        $action_flag = 1;
        $target_type = 1;
        $employee_id = $_SESSION['username'];
        $id = $_POST['employee_id'];
        $section_label = NULL;
        tracker($employee_id, $action_flag, $target_type, $id, $section_label);

        //or die('Could not create user account; ' . mysql_error());

        if (mysql_query($sql, $conn)) {
          session_start();
          $_SESSION['flash'] =  'Account successfully created!';
          /*
          $action_flag = 1;
          $target_type = 1;
          $id = $_POST['employee_id'];
          $section_label = NULL;
          $this -> tracker($employee_id, $action_flag, $target_type, $id, $section_label);
          */
          redirect('admin_useraccount.php?userid=' . $_POST['employee_id']);
        } else {
          session_start();
          $_SESSION['flash'] =  'Employee ID already exists!';
          redirect('admin_createaccount.php');
        }
      }

    break;

    case 'Edit Login Account':
      if (isset($_POST['password'])
          and isset($_POST['password2'])
          or isset($_POST['sec_quest'])
          or isset($_POST['sec_ans'])
          and $_POST['password'] == $_POST['password2'])
      {
        if ($_POST['password'] != $_POST['password2']) {
          session_start();
          $_SESSION['flash'] =  'Password doesn\'t match!';
          redirect('admin_useraccount.php?editlogin=' . $_POST['employee_id']);          
        } else {
          $hashedPassword = md5($_POST['password']);

          $sql = "UPDATE employee " .
                 "SET password='" . $hashedPassword .
                 "', security_question='" . $_POST['sec_quest'] .
                 "', security_answer='" . $_POST['sec_ans'] . "' " .
                 "WHERE employee_id=" . $_POST['employee_id'];

          if (mysql_query($sql, $conn)) {
            session_start();
            $_SESSION['flash'] =  'Login account succesfully updated!';
            
            redirect('admin_useraccount.php?editlogin=' . $_POST['employee_id']);
          }
        }
      }
    break;

    case 'Save Login Account':
      if (isset($_POST['password'])
          and isset($_POST['password2'])
          or isset($_POST['sec_quest'])
          or isset($_POST['sec_ans'])
          and $_POST['password'] == $_POST['password2'])
      {
        if ($_POST['password'] != $_POST['password2']) {
          session_start();
          $_SESSION['flash'] =  'Password doesn\'t match!';
          redirect('admin_useraccount.php?editlogin=' . $_POST['employee_id']);          
        } else {
          $hashedPassword = md5($_POST['password']);

          $sql = "UPDATE employee " .
                 "SET password='" . $hashedPassword .
                 "', security_question='" . $_POST['sec_quest'] .
                 "', security_answer='" . $_POST['sec_ans'] . "' " .
                 "WHERE employee_id=" . $_POST['employee_id'];

          if (mysql_query($sql, $conn)) {
            session_start();
            $_SESSION['flash'] =  'Login account succesfully updated!';
            
            redirect('admin_panel.php?v=editlogin');
          }
        }
      }
    break;

    case 'Save Changes' or 'Save Profile':
      if (isset($_POST['employee_id'])
          and isset($_POST['access_level'])
          and isset($_POST['username'])
          and isset($_POST['first_name'])
          and isset($_POST['middle_name'])
          and isset($_POST['last_name'])
          and isset($_POST['gender'])          
          and isset($_POST['unit_id'])
          and isset($_POST['designation_id'])
          or isset($_POST['last_updated_by'])          
          or isset($_POST['email_address'])
          or isset($_POST['parent_address'])
          or isset($_POST['present_address'])
          or isset($_POST['civil_status'])
          or isset($_POST['birthdate'])
          or isset($_POST['contact_number'])
          or isset($_POST['spouse_name'])
          or isset($_POST['spouse_number'])
          or isset($_POST['father_name'])
          or isset($_POST['mother_name'])
          or isset($_POST['housing_type'])
          or isset($_POST['citizenship'])
          or isset($_POST['sec_quest'])
          or isset($_POST['sec_ans']))

      {

        $sql = "UPDATE employee " .
               "SET employee_id='" . $_POST['employee_id'] .
               "', username='" . $_POST['username'] .
               "', first_name='" . $_POST['first_name'] .
               "', middle_name='" . $_POST['middle_name'] .
               "', last_name='" . $_POST['last_name'] .
               "', access_level_id='" . $_POST['access_level'] .
               "', gender='" . $_POST['gender'] .
               "', last_updated_by='" . $_POST['last_updated_by'] .
               "', email_address='" . $_POST['email_address'] .
               "', unit_id='" . $_POST['unit_id'] .
               "', designation_id='" . $_POST['designation_id'] . 
               "', parent_address='" . $_POST['parent_address'] .
               "', present_address='" . $_POST['present_address'] .
               "', civil_status='" . $_POST['civil_status'] .
               "', birthdate='" . $_POST['birthdate'] .
               "', contact_number='" . $_POST['contact_number'] .
               "', spouse_name='" . $_POST['spouse_name'] .
               "', spouse_contact_number='" . $_POST['spouse_number'] .
               "', father_name='" . $_POST['father_name'] .
               "', mother_name='" . $_POST['mother_name'] .
               "', housing_type='" . $_POST['housing_type'] .
               "', citizenship='" . $_POST['citizenship'] . "' " .
               /*
               "', security_question='" . $_POST['sec_quest'] .
               "', security_answer='" . $_POST['sec_ans'] . "' " .
               */
               "WHERE employee_id=" . $_POST['employee_id'];

        //insert tracking function here
        session_start();
        $action_flag = 2;
        $target_type = 1;
        $employee_id = $_SESSION['username'];
        $id = $_POST['employee_id'];
        $section_label = NULL;
        tracker($employee_id, $action_flag, $target_type, $id, $section_label);

        mysql_query($sql, $conn)
          or die('Could not create user account; ' . mysql_error());
          
        session_start();
          /*
          $action_flag = 2;
          $target_type = 1;
          $id = $_POST['employee_id'];
          $section_label = NULL;
          $this -> tracker($employee_id, $action_flag, $target_type, $id, $section_label);
          */
        $_SESSION['flash'] =  'Account updated!';
      } else {
        session_start();
        $_SESSION['flash'] =  'Update Failed!';
      }
      if ($_REQUEST['action'] == 'Save Changes') {
        redirect('admin_useraccount.php?userid=' . $_POST['employee_id']);
      } else {
        redirect('admin_panel.php');
      }

      break;

    case 'Create Student':
      if (isset($_POST['student_number'])
          and isset($_POST['access_level'])
          and isset($_POST['first_name'])
          and isset($_POST['last_name'])
          and isset($_POST['middle_name'])
          and isset($_POST['scholarship'])
          and isset($_POST['degree_program'])
          and isset($_POST['year_level'])
          and isset($_POST['degree_level'])
          and isset($_POST['acad_year'])
          and isset($_POST['stfap'])
          and isset($_POST['student_type'])
          and isset($_POST['student_stat'])
          and isset($_POST['gender'])
          and isset($_POST['civil_status'])
          and isset($_POST['program_code'])
          and isset($_POST['programrev_code'])
          and isset($_POST['contact_number'])
          and isset($_POST['reg_stat'])
          and isset($_POST['grade_info'])
          and isset($_POST['foreign_info'])
          and isset($_POST['citizenship'])
          and isset($_POST['employment'])
          and isset($_POST['family_income'])
          and isset($_POST['add_info'])
          and isset($_POST['emergency_no'])
          and isset($_POST['sec_quest'])
          and isset($_POST['answer'])
          and isset($_POST['birthdate'])
          and isset($_POST['father_name'])
          and isset($_POST['mother_name'])
          and isset($_POST['graduating'])
          and isset($_POST['present_hn'])
          and isset($_POST['residency'])
          and isset($_POST['guardian'])
          and isset($_POST['entry_ay'])
          and isset($_POST['entry_sem'])
          and isset($_POST['acad_standing'])
          and isset($_POST['degree_id'])
          and isset($_POST['employee_id'])
          and isset($_POST['email_address'])
          and isset($_POST['house_no'])
          and isset($_POST['house_st'])
          and isset($_POST['home_brgy'])
          and isset($_POST['city_mun'])
          and isset($_POST['province'])
          and isset($_POST['home_contact'])

          and isset($_POST['prhouse_st'])
          and isset($_POST['prhome_brgy'])
          and isset($_POST['prcity_mun'])
          and isset($_POST['prprovince'])
          and isset($_POST['prhome_contact'])

          and isset($_POST['parhouse_st'])
          and isset($_POST['parhome_brgy'])
          and isset($_POST['parcity_mun'])
          and isset($_POST['parprovince'])
          and isset($_POST['parhome_contact'])

          and isset($_POST['last_updated_by'])

          and isset($_POST['guarhouse_st'])
          and isset($_POST['guarhome_brgy'])
          and isset($_POST['guarcity_mun'])
          and isset($_POST['guarprovince'])
          and isset($_POST['guarhome_contact']))
      {

        $sql = "INSERT INTO student (student_number, password, access_level_id,
                scholarship_id, degree_program, year_level, degree_level,
                academic_year, stfap_bracket_id, student_type, student_status,
                gender, civil_status, program_code, program_rev_code, contact_number,
                registration_stat, grade_info, foreign_info, citizenship, employment,
                family_income, add_info, emergency_number, first_name, middle_name, last_name, 
                security_question, answer, birthdate, father_name, mother_name, 
                graduating, present_house_number, residency, guardian, entry_academic_year,
                entry_semester, academic_standing, degree_program_id, employee_id,
                email_address, home_house_number, last_updated, home_street, home_barangay,
                home_city_municipality, home_province, home_contact_number, present_street,
                present_barangay, present_ciy_municipality, present_province, present_contact_number,
                parent_street, parent_barangay, parent_city_municipality, parent_province,
                parent_contact_number, last_updated_by, guardian_house_number, guardian_street,
                guardian_barangay, guardian_city_municipality, guardian_province, 
                guardian_contact_number) " .
                "VALUES   ('" . $_POST['student_number'] . "','" . $_POST['student_number'] . "',
                '" . $_POST['access_level'] . "','" . $_POST['first_name'] . "',
                '" . $_POST['last_name'] . "','" . $_POST['middle_name'] . "',
                '" . $_POST['scholarship'] . "',
                '" . $_POST['degree_program'] . "','" . $_POST['year_level'] . "',
                '" . $_POST['degree_level'] . "','" . $_POST['acad_year'] . "',
                '" . $_POST['stfap'] . "','" . $_POST['student_type'] . "',
                '" . $_POST['student_stat'] . "','" . $_POST['gender'] . "',
                '" . $_POST['civil_status'] . "','" . $_POST['program_code'] . "',
                '" . $_POST['programrev_code'] . "','" . $_POST['contact_number'] . "',
                '" . $_POST['reg_stat'] . "','" . $_POST['grade_info'] . "',
                '" . $_POST['foreign_info'] . "','" . $_POST['citizenship'] . "',
                '" . $_POST['employment'] . "','" . $_POST['family_income'] . "',
                '" . $_POST['add_info'] . "','" . $_POST['emergency_no'] . "',
                '" . $_POST['sec_quest'] . "','" . $_POST['answer'] . "',
                '" . $_POST['birthdate'] . "','" . $_POST['father_name'] . "',
                '" . $_POST['mother_name'] . "','" . $_POST['graduating'] . "',
                '" . $_POST['present_hn'] . "','" . $_POST['residency'] . "',
                '" . $_POST['guardian'] . "','" . $_POST['entry_ay'] . "',
                '" . $_POST['entry_sem'] . "','" . $_POST['acad_standing'] . "',
                '" . $_POST['degree_id'] . "','" . $_POST['employee_id'] . "',
                '" . $_POST['email_address'] . "','" . $_POST['house_no'] . "',
                '" . $_POST['house_st'] . "','" . $_POST['home_brgy'] . "',
                '" . $_POST['city_mun'] . "','" . $_POST['province'] . "',
                '" . $_POST['home_contact'] . "','" . $_POST['prhouse_st'] . "',
                '" . $_POST['prhome_brgy'] . "','" . $_POST['prcity_mun'] . "',
                '" . $_POST['prprovince'] . "','" . $_POST['prhome_contact'] . "',
                '" . $_POST['parhouse_st'] . "','" . $_POST['parhome_brgy'] . "',
                '" . $_POST['parcity_mun'] . "','" . $_POST['parprovince'] . "',
                '" . $_POST['parhome_contact'] . "','" . $_POST['last_updated_by'] . "',
                '" . $_POST['guarhouse_st'] . "','" . $_POST['guarhome_brgy'] . "',
                '" . $_POST['guarcity_mun'] . "','" . $_POST['guarprovince'] . "',
                '" . $_POST['guarhome_contact'] . "')";
               
        mysql_query($sql, $conn)
          or die('Could not create user account; ' . mysql_error());
      }
      
      redirect('index.php');
      break;

    case 'Send!':
      if (isset($_POST['email'])) {
        $sql = "SELECT password FROM employee " .
               "WHERE email='" . $_POST['email'] . "'";

        $result = mysql_query($sql, $conn)
          or die('Could not look up password; ' . mysql_error());

        if (mysql_num_rows($result)) {
          $row = mysql_fetch_array($result);

          $subject = 'Comic site password reminder';
          $body = "Just a reminder, your password for the " .
                  "Comic Book Appreciation site is: " . 
                  $row['passwd'] .
                  "\n\nYou can use this to log in at http://" .
                  $_SERVER['HTTP_HOST'] .
                  dirname($_SERVER['PHP_SELF']) . '/';

          mail($_POST['email'], $subject, $body)
            or die('Could not send reminder email.');
        }
      }
      redirect('admin_login.php');
      break;

    case 'Change my info':
      session_start();

      if (isset($_POST['username'])
          and isset($_POST['password'])
          and isset($_SESSION['employee_id']))
      {
        $sql = "UPDATE system_administrators " .
               "SET username='" . $_POST['username'] . 
               "', password='" . $_POST['password'] . "' " . 
               "WHERE employee_id=" . $_SESSION['employee_id'];

        mysql_query($sql, $conn)
          or die('Could not update user account; ' . mysql_error());
      }
      redirect('admin_accountpanel.php');
      break;
  }
}
?>
