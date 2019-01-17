<?php

  /**
   * @file
   * Constructor pages.
   */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Form</title>
    <link rel="stylesheet" href="http://localhost/new/css/login_form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://localhost/new/js/jq_valid.js"></script>
    <script src="http://localhost/new/js/main_script.js"></script>
</head>
<body>
<?php

if (isset($_REQUEST['exit'])) {
  unset($_SESSION['user']);
}

if (!isset($_SESSION['user'])) {
  $action_file = 'form.php';
}
elseif (isset($_REQUEST['p'])) {
  $action_file = strtolower($_REQUEST['p']) . '.php';
  $action_path = 'view/' . $action_file;
  if (!file_exists($action_path)) {
    $action_file = 'user.php';
  }
}
else {
  $action_file = 'user.php';
}


include $action_file;

?>
</body>
</html>
