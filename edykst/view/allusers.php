<?php

  /**
   * @file
   * All Users.
   */

$users = new User();

if (isset($_GET['del']) && ($_GET['del'] != $_SESSION['user'])) {
  $users->deleteUser($_GET['del']);
}
?>
<div class="div_block_js" style="width: fit-content;">
    <div class="div_input" style="width: auto">
        <a class="input_button" href="http://localhost/new/index.php" style="color: white; font-weight: bold"><p>MY</p></a>
        <a class="input_button" href="http://localhost/new/index.php?exit=1" style="color: white; font-weight: bold"><p>EXIT</p></a>
    </div>
    <div class="div_input" style="width: auto">
        <table class="table">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
<?php
$data_users = $users->allUsers();
foreach ($data_users as $key) {
  echo '            <tr>
                <td>' . $key['firstname'] . '</td>
                <td>' . $key['lastname'] . '</td>
                <td>' . $key['email'] . '</td>
                <td><a class="input_button" href="http://localhost/new/index.php?p=edit&user=' . $key['id'] . '" style="color: yellow;padding: 10px;">EDIT</a>';
  echo ($_SESSION['user'] != $key['id']) ? '<a class="input_button" href="http://localhost/new/index.php?p=allusers&del=' . $key['id'] . '" style="color: red;padding: 10px;" onClick="return confirm(\'Are you absolutely sure you want to delete?\')">DEL</a></td>' : '</td>';
}
?>
        </table>
    </div>
</div>
