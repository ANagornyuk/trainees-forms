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
    if (!empty($values)) {
      $users->changeUser($firstname, $lastname, $email, $id);
    }
  }
}

if (!($data_users = $users->userInfo($_GET['user']))) {
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['DOCUMENT_URI']), '/\\');
  $extra = 'index.php?p=allusers';
  header("Location: http://$host$uri/$extra");
  exit;
}
?>
<div class="div_block_js" style="width: fit-content;">
  <div class="div_input" style="width: auto">
    <a class="input_button for_a" href="index.php"><p>MY</p></a>
    <a class="input_button for_a" href="index.php?p=allusers"><p>USERS</p></a>
    <a class="input_button for_a" href="index.php?exit=1"><p>EXIT</p></a>
  </div>
  <div class="div_input" style="width: auto">
    <form id="edit" method="post">
    <table>
      <tr>
        <td><label for="fn">First name</label></td>
        <td><input class="input_text" type="text" id="fn" name="firstname" value="<?php echo $data_users['firstname']?>"/></td>
      </tr>
      <tr>
        <td><label for="ln">Last name</label></td>
        <td><input class="input_text" type="text" id="ln" name="lastname" value="<?php echo $data_users['lastname']?>"/></td>
      </tr>
      <tr>
        <td><label for="em">Email</label></td>
        <td><input class="input_text" type="text" id="em" name="email" value="<?php echo $data_users['email']?>"/></td>
      </tr>
      <tr>
        <?php echo ($_SESSION['user'] != $data_users['id']) ? '<td><a href="index.php?p=allusers&del=' . $data_users['id'] . '" class="button for_a red_del" onClick="return confirm(\'Are you absolutely sure you want to delete?\')"><p>DELETE</p></a></td>' : '<td></td>';?>
        <td>
          <a href="#" class="button for_a yellow_edit" onclick="document.getElementById('edit').submit();"><p>CHANGE</p></a>
        </td>
      </tr>
    </table>
        <input type="hidden" name="id" value="<?php echo $data_users['id']?>"/>
        <input type="hidden" name="form" value="3"/>
    </form>
  </div>
</div>
