<?php require_once 'admin_header.php'; ?>

<div class="main">
  <form method="post" action="admin_transact_user.php">

  <h1>E-mail Password Reminder</h1>

  <p>
    Forgot your password? Just enter your email address, and we'll 
    email your password to you!
  </p>

  <p>
    E-mail Address:<br>
    <input type="text" id="email" name="email">
  </p>

  <div id="button">
  <p>
    <input type="submit" class="submit" name="action" 
      value="Send!">
  </p>
  </div>
  </form>
</div>
<?php require_once 'admin_footer.php'; ?>
