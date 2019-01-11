<!DOCTYPE html>
<html>
<head>
  <title>Simple forms</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../../globalStyles.css">
  <link rel="stylesheet" href="../css/cabinet.css">
  <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script type="text/javascript" src="../js/ajaxupload.js"></script>
</head>
<body>
<header>
  <div class="page-title">
    <h1>User's cabinet</h1>

    <h2 class="hello-user">HELLO <?php if (isset($user)) {
        echo $user['firstname'];
      } ?>
    </h2>
  </div>
  <img class="header-image"
       src="https://sites.google.com/site/prirodanasevseegooglgfgf/_/rsrc/1463456237313/home/priroda_gory_nebo_ozero_oblaka_81150_1920x1080.jpg">


</header>

<article>
  <form id="logout" action="../controllers/logout.php">
    <input class="button" type="submit" value="Log out">
  </form>
  <div class="message">
  </div>

  <div>
    <div class="edit">
      <h2>Edit user</h2>

      <form action="../controllers/edit.php" method="post"
            enctype="multipart/form-data">

        <div class="image-group">
          <div class="image-preview">
            <img id="preview" src="<?php echo $user['image'] ?>" alt="">
          </div>

          <div class="load-image-group">
            <label for="image">Image file:</label>
            <input type="file" name="image" id="image">
          </div>
        </div>

        <div class="edit-form">
          <!--          <h2>Edit user</h2>-->
          <p>Login:</p>
          <input type="text" name="login" placeholder="Login"
                 value="<?php echo $user['login']; ?>"/>

          <p>First name:</p>
          <input type="text" name="firstname" placeholder="First Name"
                 value="<?php echo $user['firstname']; ?>"/>

          <p>Last name:</p>
          <input type="text" name="lastname" placeholder="Last Name"
                 value="<?php echo $user['lastname']; ?>"/>

          <p>Email:</p>
          <input type="text" name="email" placeholder="Email"
                 value="<?php echo $user['email']; ?>"/>

          <p>Password:</p>
          <input type="password" name="password" placeholder="Password"
                 title="Password (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)"/>
          <br/>

          <input class="btn btn-default save" type="submit" name="submit"
                 value="Save"/>
        </div>
      </form>
    </div>
  </div>
</article>

<footer>

  <div class="contacts">
    contact
    <div>
      tel: 0999898497
    </div>
  </div>
  <div class="powered">
    Powered by ME :)
  </div>

</footer>

</body>
</html>
