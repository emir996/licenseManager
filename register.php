<?php require 'includes/header.inc.php';?>

<div class="main-header">
    <h2 class="main-h">Register Below</h2>
</div>
<div class="login-page">
  <div class="form">
      
    <form class="login-form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

      <input type="text" name="r_username" placeholder="username"/>
      <input type="text" name="r_email" placeholder="email"/>
      <input type="password" name="r_password" placeholder="password"/>
      <input type="password" name="r_replace_password" placeholder="confirm password"/>
      <input id="btn_form" type="submit" name="btn_register" value="Register">

    </form>
    <?php if(isset($registerCheck)){echo $registerCheck;} ?>
  </div>
</div>


<?php require 'includes/footer.inc.php';?>