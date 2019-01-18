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
        <a class="input_button for_a" href="index.php"><p>MY</p></a>
        <a class="input_button for_a" href="index.php?p=allusers"><p>USERS</p></a>
        <a class="input_button for_a" href="index.php?exit=1"><p>EXIT</p></a>
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
                <td><a class="input_button for_a yellow_edit" href="index.php?p=edit&user=' . $key['id'] . '">EDIT</a>';
  echo ($_SESSION['user'] != $key['id']) ? '<a class="input_button for_a red_del" href="index.php?p=allusers&del=' . $key['id'] . '" onClick="return confirm(\'Are you absolutely sure you want to delete?\')">DEL</a></td>' : '</td>';
}
?>
        </table>
    </div>
</div>
