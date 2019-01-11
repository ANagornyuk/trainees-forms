<!DOCTYPE html>

<html>
<head>
  <title>Tolik's form</title>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" href="../css/style.css">
  <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <script type="text/javascript" src="../js/form.js"></script>
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
<div id="forms">
  <div class="tabs">
    <div class="sign-up-tab active">
      Sign Up
    </div>
    <div class="log-in-tab">
      Log In
    </div>
  </div>
  <div class="message">
    <div class="err"><?php if (isset($message) && !empty($message)) {
        echo $message;
      } ?>
    </div>
  </div>
  <div id="sign-up" class="active">
    <div class="text">Sign Up for Free</div>
    <form action="../controllers/register.php" method="post">
      <input class="fname" type="text" name="firstname"
             title="Username with 2-20 chars" maxlength="30"
             placeholder="First Name *"
             pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required>
      <input class="lname" type="text" name="lastname"
             title="Username with 2-20 chars" maxlength="30"
             placeholder='Last Name *' pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$"
             required>
      <br>
      <input class="email" type="email" name="email"
             placeholder="Email Address *" required>
      <br>
      <input class="password" type="password" name="password" title="Password (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)
" placeholder="Set A Password *"
             required>
      <br>
      <input class="button" type="submit" value="GET STARTED">
    </form>
  </div>
  <div id="log-in">
    <div class="text">Log In</div>
    <form action="../controllers/login.php" method="post">
      <input class="login" type="text" name="login" maxlength="30"
             placeholder="Login *" required>
      <!--<br>-->
      <input class="password" type="password" name="password"
             placeholder="Password *" required>
      <br>
      <input class="button" type="submit" value="GET STARTED">
    </form>
  </div>
</div>
</body>
</html>
