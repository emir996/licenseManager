<?php require 'includes/header.inc.php';?>


<div class="main-header">
    <h2 class="main-h">Welcome to our homepage</h2>
    <p class="main-p">If you want to see our licences you have to login below</p>
</div>

<div class="login-page">
  <div class="form">
      
    <form class="login-form" method="POST" action="">

      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <input id="btn_form" type="submit" name="btn_login" value="Login">
      
      <p class="message">Not registered? <a href="register.php">Create an account</a></p><br>
      <p style="color: black;"><?php if(isset($loginUser)){echo $loginUser;} ?></p>
    </form>
  </div>
</div>

<?php require 'includes/footer.inc.php';?>
