<!DOCTYPE html>

<html>
<head>
  <title>Tolik's2 form</title>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" href="../secondForm/css/secondStyle.css">
  <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <script type="text/javascript" src="../secondForm/js/secondForm.js"></script>
</head>
<body>
<div class="home">
  <a href="/">
    <img
        src="https://vignette.wikia.nocookie.net/gribniki/images/1/17/House_03.png/revision/latest?cb=20140722173140&path-prefix=ru"
        width="50" height="auto">
  </a>
</div>
<div class="next-form">
  Next Form >
</div>
<div id="second-forms">
  <div id="tabs">
    <div id="sign-up-tab">
      Sign Up
    </div>
    <div id="log-in-tab">
      Log In
    </div>
  </div>
  <div class="message">
    <?php if (isset($message) && !empty($message)) {
      echo $message;
    } ?>
  </div>
  <div class="errors"></div>
  <div id="sign-up">
    <div class="text">Sign Up for Free</div>
    <form action="index.php" method="post">
      <input id="fname" type="text" name="firstname" maxlength="30"
             placeholder="First Name *">
      <input id="lname" type="text" name="lastname" maxlength="30"
             placeholder='Last Name *'>
      <br>
      <input id="email" type="text" name="email" placeholder="Email Address *">
      <br>
      <input id="password" type="password" name="password"
             placeholder="Password *" required>
      <br>
      <input id="button" type="submit" name="register-button" value="GET STARTED">
    </form>
  </div>
  <div id="log-in">
    <div class="text">Log In</div>
    <form action="index.php" method="post">
      <input id="login" type="text" name="login" maxlength="30"
             placeholder="Login *" required>
      <input id="login-password" type="password" name="password"
             placeholder="Password *" required>
      <br>
      <input id="login-button" type="submit" name="login-button" value="GET STARTED">
    </form>
  </div>
</div>
</body>
</html>
