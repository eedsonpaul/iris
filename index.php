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
          <table>
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
          <table>
            <tr>
              <td>
                <span class="list_title">Accounts from OSA</span>
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
                      
            echoEmployees(8);
          ?>
      <?php
          break;

          case 'Cso':
      ?>
          <table>
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
          <table>
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
          <table>
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
          <table>
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
          <table>
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
          <table>
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
          <table>
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
        <br/><br/>
        <div id="search">
          <form method="get" action="admin_search.php">

            <h3>Search</h3>

            <input id="searchkeywords" type="text" name="keywords"
            <?php
            if (isset($_GET['keywords'])) {
              echo ' value="' . htmlspecialchars($_GET['keywords']) . '" ';
            }
            ?>
            >
            
            <select name="access_level">
            <!-- <option value="" selected><i>Select</i></option> -->
            <?php
            foreach ($accessList as $key => $value) {
              echo "<option value=\"$key\" ";
              if (isset($access_levels) && array_key_exists($key,$access_levels)) {
                echo $access_levels[$key];
              }
              echo ">$value</option>\n";
            }
            ?>
            <div class="button">
              <input id="searchbutton" class="submit" type="submit" value="Search">
            </div>
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
      
  <?php } else { ?>
  <div id="home_contents" class="main">
    <style type="text/css"> 
    .style1 {color: #660000}
    .style2 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: xx-small;
    }
    </style> 

  <div id="contentcolumn1">
      <TABLE width="100%" height="898" class="printtableau"> 
      <tr>
        <td height="892"  align="center"><table width="95%" height="845" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#567e3a" bgcolor="white" class="printtableau">
          <tr align="center" valign="top" class="labelleftgreen8B">
            <td width="28%" valign="top" class="style2"><p>&nbsp;</p></td>
            <td width="12%" valign="middle" class="style2"><p align="center">FIRST SEMESTER <br>
              2010-11</p></td>

            <td width="12%" valign="middle" class="style2"><p align="center">FIRST TRIMESTER <br>
              2010-11</p></td>
            <td width="12%" valign="middle" class="style2"><p align="center">SECOND SEMESTER <br>
              2010-11</p></td>
            <td width="12%" valign="middle" class="style2"><p align="center">SECOND TRIMESTER <br>
              2010-11</p></td>

            <td width="12%" valign="middle" class="style2"><p align="center">SUMMER <br>
              2011</p></td>
            <td width="12%" valign="middle" class="style2"><p align="center">THIRD TRIMESTER <br>
              2010-11</p></td>
          </tr>
          <tr  bgcolor="FFCCCC">
            <td valign="middle" class="style2"><p>Deadline of Encoding Class Offerings for Second Sem/Trim 2010-2011 (c/o Divisions)</p></td>

            <td valign="middle" class="style2"><p align="right"></p></td>
            <td valign="middle" class="style2"><p align="right"></p></td>
            <td valign="middle" class="style2"><p align="right">31 Aug 2010</p></td>
            <td valign="middle" class="style2"><p align="right">31 Aug 2010</p></td>
            <td valign="middle" class="style2"><p align="right"></td>
            <td valign="middle" class="style2"><p align="right"></td>
          </tr>
          <!--tr>
                  <td valign="middle" class="style2"><p><b>Incoming Freshman 2010-11</b> Confirmation of Enrollment at UPV</p></td>
                  <td valign="middle" class="style2"><p align="right"></p></td>
                  <td valign="middle" class="style2"><p align="right"></p></td>
                  <td valign="middle" class="style2"><p align="right"></p></td>
                  <td valign="middle" class="style2"><p align="right"></p></td>
                  <td valign="middle" class="style2"><p align="right">8 Feb - 8 Apr 2010</p></td>
                  <td valign="middle" class="style2"><p align="right"></p></td>
          </tr-->

          <tr>
            <td height="684" colspan="7" align="center" valign="top" class="style2"><table width="100%" border="0">
              <tr>
                <td align="center" class="labelcenterbrown9B" height="30" colspan="7"><p><b>PRE-REGISTRATION FOR SECOND SEMESTER/TRIMESTER 2010-2011</b><br>
                </p></td>
              </tr>
              <tr>
                <td height="34" valign="top" class="style2"><ul>

                  <li><em>UPV Cebu College</em></li>
                </ul></td>
                <td valign="top" class="style2"><p align="right"></p></td>
                <td valign="top" class="style2"><p align="right"></p></td>
                <td valign="top" class="style2"><p align="right">1-7 Sep 2010</p></td>
                <td valign="top" class="style2"><p align="right">1-7 Sep 2010</p></td>
                <td valign="top" class="style2"><p align="right"></p></td>

                <td valign="top" class="style2"><p align="right"></p></td>
              </tr>
              <tr>
                <td  width="28%" valign="top" class="style2"><ul>
                  <li><em>Miagao Campus (CFOS,SoTech)</em></li>
                </ul></td>
                <td width="12%" valign="top" class="style2"><p align="right"></p></td>
                <td width="12%" valign="top" class="style2"><p align="right"></p></td>

                <td width="12%" valign="top" class="style2"><p align="right">6-12 Sep 2010</p></td>
                <td width="12%" valign="top" class="style2"><p align="right">6-12 Sep 2010</p></td>
                <td width="12%" valign="top" class="style2"><p align="right"></p></td>
                <td width="12%" valign="top" class="style2"><p align="right"></p></td>
              </tr>
              <tr>
                <td valign="top" class="style2"><ul>
                  <li><em>Miagao Campus (CAS)</em></li>

                </ul></td>
                <td valign="top" class="style2"><p align="right"></p></td>
                <td valign="top" class="style2"><p align="right"></p></td>
                <td valign="top" class="style2"><p align="right">13-19 Sep 2010</p></td>
                <td valign="top" class="style2"><p align="right">13-19 Sep 2010</p></td>
                <td valign="top" class="style2"><p align="right"></p></td>
                <td valign="top" class="style2"><p align="right"></p></td>
              </tr>

              <tr>
                <td valign="top" class="style2"><ul>
                  <li><em>Iloilo City Campus (CM)</em></li>
                </ul></td>
                <td valign="top" class="style2"><p align="right"></p></td>
                <td valign="top" class="style2"><p align="right"></p></td>
                <td valign="top" class="style2"><p align="right">20-26 Sep 2010</p></td>
                <td valign="top" class="style2"><p align="right">20-26 Sep 2010</p></td>

                <td valign="top" class="style2"><p align="right"></td>
                <td valign="top" class="style2"><p align="right"></p></td>
              </tr>
              <tr>
                <td valign="top" class="style2"><ul>
                  <li><em>UPV Tacloban College</em></li>
                </ul></td>
                <td valign="top" class="style2"><p align="right"></p></td>

                <td valign="top" class="style2"><p align="right"></p></td>
                <td valign="top" class="style2"><p align="right">27 Sep-3 Oct 2010</p></td>
                <td valign="top" class="style2"><p align="right"></p></td>
                <td valign="top" class="style2"><p align="right"></p></td>
                <td valign="top" class="style2"><p align="right"></p></td>
              </tr>
            </table>
              <table width="80%" class="printtableau" align="center">

                <tr>
                  <td><table width="100%" class="printtableau" border="1" align="center">
                    <tr>
                      <td colspan="6" valign="top" align="center" class="style2"><p align="center"><b>ORDER OF PRE-REGISTRATION (for UNDERGRADUATE students only)</b></p></td>
                    </tr>
                    <tr>
                      <td width="10%" valign="middle" class="style2"><p align="center"><b>DAY</b></p></td>
                      <td width="18%" valign="middle" class="style2"><p align="center"><b>CEBU CITY</b></p></td>

                      <td width="18%" valign="middle" class="style2"><p align="center"><b>TACLOBAN CITY</b></p></td>
                      <td width="18%" valign="middle" class="style2"><p align="center"><b>MIAG-AO <br>
                        (CAS)</b></p></td>
                      <td width="18%" valign="middle" class="style2"><p align="center"><b>MIAG-AO <br>
                        (CFOS,SoTech)</b></p></td>
                      <td width="18%" valign="middle" class="style2"><p align="center"><b>ILOILO CITY</b></p></td>

                    </tr>
                    <tr>
                      <td valign="top" class="style2"><p align="center">1st</p></td>
                      <td valign="top" class="style2"><p align="right">4th yr & graduating</p></td>
                      <td valign="top" class="style2"><p align="right">2007xxxxx and below</p></td>
                      <td valign="top" class="style2"><p align="right">4th yr & graduating</p></td>

                      <td valign="middle" class="style2" rowspan="5"><p align="center">Open for All</p></td>
                      <td valign="top" class="style2"><p align="right">4th and 5th yr</p></td>
                    </tr>
                    <tr>
                      <td valign="top" class="style2"><p align="center">2nd</p></td>
                      <td valign="top" class="style2"><p align="right">2010xxxxx</p></td>
                      <td valign="top" class="style2"><p align="right">2008xxxxx</p></td>

                      <td valign="top" class="style2"><p align="right">2010xxxxx</p></td>
                      <td valign="top" class="style2"><p align="right">2010xxxxx</p></td>
                    </tr>
                    <tr>
                      <td valign="top" class="style2"><p align="center">3rd</p></td>
                      <td valign="top" class="style2"><p align="right">2008xxxxx</p></td>
                      <td valign="top" class="style2"><p align="right">2009xxxxx</p></td>

                      <td valign="top" class="style2"><p align="right">2009xxxxx</p></td>
                      <td valign="top" class="style2"><p align="right">2009xxxxx</p></td>
                    </tr>
                    <tr>
                      <td valign="top" class="style2"><p align="center">4th</p></td>
                      <td valign="top" class="style2"><p align="right">2009xxxxx</p></td>
                      <td valign="top" class="style2"><p align="right">2010xxxxx</p></td>

                      <td valign="top" class="style2"><p align="right">2008xxxxx</p></td>
                      <td valign="top" class="style2"><p align="right">2008xxxxx</p></td>
                    </tr>
                    <tr>
                      <td valign="top" class="style2"><p align="center">5th-last day</p></td>
                      <td valign="top" class="style2"><p align="right">for All</p></td>
                      <td valign="top" class="style2"><p align="right">for All</p></td>

                      <td valign="top" class="style2"><p align="right">for All</p></td>
                      <td valign="top" class="style2"><p align="right">for All</p></td>
                    </tr>
                  </table></td>
                </tr>
                <tr> </tr>
              </table></td>

          </tr>
        </table></td></tr> 
   
     
  </TABLE> 
  </div>

<?php
  }
require_once 'admin_footer.php';
?>
