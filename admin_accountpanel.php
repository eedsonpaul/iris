<?php
//This file displays the information of the current user logged-in.
//Different kind of information are displayed depending on the user's
//access level which determines the user type.
require_once 'admin_db_connect.php';
require_once 'admin_header.php';

if (isset($_SESSION['sysad_id'])) {
  $sql = "SELECT username, password " .
         "FROM sysad_users " .
         "WHERE sysad_id=" . $_SESSION['sysad_id'];
  $result = mysql_query($sql, $conn)
    or die('Could not look up user data; ' . mysql_error());

  $user = mysql_fetch_array($result);
  ?>

  <div class="main">
    <form method="post" action="transact-user.php">
    <p>Username:<br>
      <input type="text" id="name" name="name"
        value="<?php echo htmlspecialchars($user['username']); ?>"></p>

    <p>Password:<br>
      <input type="text" id="email" name="email"
        value="<?php echo htmlspecialchars($user['password']); ?>"></p>

    <div id="button">
    <p><input type="submit" class="submit" name="action"
         value="Change my info"></p>
    </div>
    </form>
  </div>
  
<?php 
}
require_once 'admin_footer.php'; ?>
