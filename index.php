<?php
require_once 'admin_db_connect.php';
require_once 'admin_header.php';
require_once 'admin_http.php';
require_once 'admin_echolist.php';
require_once 'admin_sql_query.php';

//require_once 'admin_search.php';

  if (isset($_SESSION['employee_id']) or isset($_SESSION['student_number'])
               and $_SESSION['access_level_id'])
  {
	  if ($_SESSION['access_level_id'] == 1) header("Location: student/student.php");
    else if ($_SESSION['access_level_id'] == 2) header("Location: divisionosa/faculty/faculty.php");
    else if ($_SESSION['access_level_id'] == 4) header("Location: accounting/accounting.php");
    else if ($_SESSION['access_level_id'] == 5) header("Location: accounting/library.php");
    else if ($_SESSION['access_level_id'] == 6) header("Location: accounting/cashier.php");
    else if ($_SESSION['access_level_id'] == 7) header("Location: cso/cso.php");
	  else if ($_SESSION['access_level_id'] == 9) header("Location: divisionosa/osa/osa.php");
	  else if ($_SESSION['access_level_id'] == 8) header("Location: divisionosa/clerk/clerk.php");
  ?>
  <div class="main">
    <div id="nav">
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
        //echo ' | <a href="admin_transact_user.php?action=Logout">Logout</a>';
      }
      ?>
    </div>
    <br/>

    <div id="left_side">
      <ul class="left_list">
        <li><a href="index.php?action=SysAd">System Administrator</a></li>
        <li><a href="index.php?action=Osa">Office of Student Affairs</a></li>
        <li><a href="index.php?action=Cso">College Secretary's Office</a></li>
        <li><a href="index.php?action=Acctg">Accounting Office</a></li>
        <li><a href="index.php?action=Faculty">Faculty</a></li>
        <li><a href="index.php?action=Lib">Library</a></li>
        <li><a href="index.php?action=Cashier">Cashier</a></li>
        <li><a href="index.php?action=Clerk">Clerk</a></li>
        <li><a href="index.php?action=Student">Student</a></li>
        <br/>

        <li><span class="red"><a href="admin_createaccount.php">Create Staff Account </a>&raquo;</span></li>
        <li><span class="red"><a href="student/add_student_record.php">Add Student Record </a>&raquo;</span></li>
      </ul>
    </div>

    <div id="right_side">
      <?php
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
		      case 'Logs':
      ?>
          <h2>Logs</h2>
			<?php
			echo 'System Administrator';
			echo date("d/m/y : H:i:s", time()) ;
			?>
      <?php
          break;

          case 'SysAd':
      ?>
          <table width="95%" class="table_echolist ">
            <tr>
              <td>
                <span class="list_title">System Administrators</span>
              </td>
            </tr>
          </table><br/>
          <?php
            if (isset($_SESSION['flash'])) {
            ?>
            <div id="flash_delete">
              <center><?php echo $_SESSION['flash']; ?></center>
              <?php unset($_SESSION['flash']); ?>
            </div><br/>
            <?php }

            echoEmployees(3);
          ?>

      <?php
          break;

          case 'Osa':
      ?>
          <table width="95%" class="table_echolist ">
            <tr>
              <td>
                <span class="list_title">Accounts from OSA</span>
              </td>
              
              <td align="right">
                <div id="override">
                <a href="http://google.com">
                <input type="submit" class="submit" name="action" value="Override&rarr;">
                </div>
                </a>
              </td>
            </tr>
          </table><br/>
          <?php
            if (isset($_SESSION['flash'])) {
            ?>
            <div id="flash_delete">
              <center><?php echo $_SESSION['flash']; ?></center>
              <?php unset($_SESSION['flash']); ?>
            </div><br/>
            <?php }
                      
            echoEmployees(8);
          ?>
      <?php
          break;

          case 'Cso':
      ?>
          <table width="95%" class="table_echolist ">
            <tr>
              <td>
                <span class="list_title">Accounts from CSO</span>
              </td>
              <td>
                <div id="override">
                <a href="cso/cso.php">
                <input type="submit" class="submit" name="action" value="Override&rarr;"></div>
                </a>
              </td>
            </tr>
          </table><br/>
          <?php
            if (isset($_SESSION['flash'])) {
            ?>
            <div id="flash_delete">
              <center><?php echo $_SESSION['flash']; ?></center>
              <?php unset($_SESSION['flash']); ?>
            </div><br/>
            <?php }
                      
            echoEmployees(7);
          ?>
      <?php
          break;

          case 'Acctg':
      ?>
          <table width="95%" class="table_echolist ">
            <tr>
              <td>
                <span class="list_title">Accounts from Accounting Office</span>
              </td>
              <td>
                <div id="override">
                <a href="http://google.com">
                <input type="submit" class="submit" name="action" value="Override&rarr;"></div>
                </a>
              </td>
            </tr>
          </table><br/>
          <?php
            if (isset($_SESSION['flash'])) {
            ?>
            <div id="flash_delete">
              <center><?php echo $_SESSION['flash']; ?></center>
              <?php unset($_SESSION['flash']); ?>
            </div><br/>
            <?php }
                      
            echoEmployees(4);
          ?>
      <?php
          break;
        
          case 'Faculty':
      ?>
          <table width="95%" class="table_echolist ">
            <tr>
              <td>
                <span class="list_title">Accounts from Division</span>
              </td>
              <td>
                <div id="override">
                <a href="http://google.com">
                <input type="submit" class="submit" name="action" value="Override&rarr;"></div>
                </a>
              </td>
            </tr>
           </table><br/>
          <?php
            if (isset($_SESSION['flash'])) {
            ?>
            <div id="flash_delete">
              <center><?php echo $_SESSION['flash']; ?></center>
              <?php unset($_SESSION['flash']); ?>
            </div><br/>
            <?php }
                      
            echoEmployees(2);
    
          break;

          case 'Lib':
      ?>
          <table width="95%" class="table_echolist ">
            <tr>
              <td>
                <span class="list_title">Accounts from Library</span>
              </td>
              <td>
                <div id="override">
                <a href="http://google.com">
                <input type="submit" class="submit" name="action" value="Override&rarr;"></div>
                </a>
              </td>
            </tr>
          </table><br/>
          <?php
            if (isset($_SESSION['flash'])) {
            ?>
            <div id="flash_delete">
              <center><?php echo $_SESSION['flash']; ?></center>
              <?php unset($_SESSION['flash']); ?>
            </div><br/>
            <?php }
                      
            echoEmployees(5);
    
          break;

          case 'Cashier':
      ?>
          <table width="95%" class="table_echolist ">
            <tr>
              <td>
                <span class="list_title">Cashier Accounts</span>
              </td>
              <td>
                <div id="override">
                <a href="http://google.com">
                <input type="submit" class="submit" name="action" value="Override&rarr;"></div>
                </a>
              </td>
            </tr>
          </table><br/>
          <?php
            if (isset($_SESSION['flash'])) {
            ?>
            <div id="flash_delete">
              <center><?php echo $_SESSION['flash']; ?></center>
              <?php unset($_SESSION['flash']); ?>
            </div><br/>
            <?php }
                      
            echoEmployees(6);
    
          break;

          case 'Clerk':
      ?>
          <table width="95%" class="table_echolist ">
            <tr>
              <td>
                <span class="list_title">Clerk Accounts</span>
              </td>
              <td>
                <div id="override">
                <a href="http://google.com">
                <input type="submit" class="submit" name="action" value="Override&rarr;"></div>
                </a>
              </td>
            </tr>
          </table><br/>
          <?php
            if (isset($_SESSION['flash'])) {
            ?>
            <div id="flash_delete">
              <center><?php echo $_SESSION['flash']; ?></center>
              <?php unset($_SESSION['flash']); ?>
            </div><br/>
            <?php }
                      
            echoEmployees(9);
    
          break;

          case 'Student':
      ?>
          <table width="95%" class="table_echolist ">
            <tr>
              <td>
                <span class="list_title">Student Accounts</span>
              </td>
              <td>
                <div id="override">
                <a href="http://google.com">
                <input type="submit" class="submit" name="action" value="Override&rarr;"></div>
                </a>
              </td>
            </tr>
          </table><br/>
          <?php
            echoStudentList(1, 'student_number', 'first_name', 'student');
          ?>
      <?php
          break;

          case 'SearchAcct':
      ?>
        <br/>
        <div id="search">
          <table width="100%" class="table_echolist ">
            <tr>
              <td>
                <span class="list_title">Search</span>
              </td>
            </tr>
          </table><br/>

          <?php
          if (isset($_SESSION['flash'])) {
          ?>
            <center>
            <div id="flash_search">
              <center><?php echo $_SESSION['flash']; ?></center>
              <?php unset($_SESSION['flash']); ?>
            </div>
            </center>
          <?php } ?>
          
          <form method="get" action="admin_search.php">
          <table width="50%" align="left" style="font-size: 12px;">
            
            <tr>
              <td>Keyword</td>
              <td>Filter</td>
            </tr>
            
            <tr>
              <td>
              <input id="searchkeywords" type="text" name="keywords">
              </td>

              <td valign=top>
              <select name="access_level">
              <option value="" selected><i>All</i></option>
              <?php
              foreach ($accessList as $key => $value) {
                echo "<option value=\"$key\" ";
                if (isset($access_levels) && array_key_exists($key,$access_levels)) {
                  echo $access_levels[$key];
                }
                echo ">$value</option>\n";
              }
              ?>
              <td/>

              <td>
                <input id="searchbutton" class="submit" type="submit" value="Search">
              </td>
            </tr>
          </table>
          </form>
        </div>
    <?php
    
        //search(isset($_GET['keywords']));
          break;

          default:
            redirect('index.php');
   
          break;
        }
      }
    ?>
      </div>
  </div>
      
  <?php } else {

    require('home.php');

  }
require_once 'admin_footer.php';
?>
