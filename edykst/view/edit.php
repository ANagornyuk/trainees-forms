<?php

  /**
   * @file
   * Edit User.
   */

$users = new User();

if (isset($_POST['form']) && $_POST['form'] == 3) {
  $firstname = Validation::input($_POST['firstname']);
  $lastname = Validation::input($_POST['lastname']);
  $email = Validation::input($_POST['email']);
  $id = Validation::input($_POST['id']);
  if (isset($firstname) && isset($lastname) && isset($email) && isset($id)) {
    $values = $users->userInfo($id);
    $is_email = $users->test($email);
    if (!empty($values) && ($is_email[0] == 0)) {
      $users->changeUser($firstname, $lastname, $email, $id);
    }
  }
}

$data_users = $users->userInfo($_GET['user']);
if (!$data_users) {
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['DOCUMENT_URI']), '/\\');
  $extra = 'index.php?p=allusers';
  header("Location: http://$host$uri/$extra");
  exit;
}
?>
<div class="div_block_js" style="width: fit-content;">
  <div class="div_input" style="width: auto">
    <a class="input_button" href="http://localhost/new/index.php" style="color: white"><p>MY</p></a>
    <a class="input_button" href="http://localhost/new/index.php?p=allusers" style="color: white"><p>USERS</p></a>
    <a class="input_button" href="http://localhost/new/index.php?exit=1" style="color: white"><p>EXIT</p></a>
  </div>
  <div class="div_input" style="width: auto">
    <form id="edit" method="post">
    <table>
      <?php
      echo '            <tr>
                <td>First name</td>
                <td><input class="input_text" style="/*noinspection CssInvalidPropertyValue*/width: -webkit-fill-available;" type="text" name="firstname" value="' . $data_users['firstname'] . '"/></td>
            </tr>
            <tr>
                <td>Last name</td>
                <td><input class="input_text" style="width: -webkit-fill-available;" type="text" name="lastname" value="' . $data_users['lastname'] . '"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input class="input_text" style="width: -webkit-fill-available;" type="text" name="email" value="' . $data_users['email'] . '"/></td>
            </tr>
            <tr>
                <td>';
      echo ($_SESSION['user'] != $data_users['id']) ? '<a href="http://localhost/new/index.php?p=allusers&del=' . $data_users['id'] . '" class="button" style="font-weight: bold; color: red" onClick="return confirm(\'Are you absolutely sure you want to delete?\')"><p>DELETE</p></a></td>' : '<a href="#"></a></td>';
      echo '                <td><a href="#" class="button" style="font-weight: bold; color: white" onclick="document.getElementById(\'edit\').submit();"><p>CHANGE</p></a></td>
            </tr>
';
      ?>
    </table>
        <input type="hidden" name="id" value="<?php echo $data_users['id']?>"/>
        <input type="hidden" name="form" value="3"/>
    </form>
  </div>
</div>
