<?php

  /**
   * @file
   * Login user info.
   */

$users = new User();
$data_users = $users->userInfo($_SESSION['user']);
?>
<div class="div_block_js" style="width: fit-content;">
  <div class="div_input" style="width: auto">
    <a  class="input_button" href="http://localhost/new/index.php?p=edit&user=<?php echo $data_users['id']?>" style="color: white"><p>EDIT</p></a>
    <a  class="input_button" href="http://localhost/new/index.php?p=allusers" style="color: white"><p>USERS</p></a>
    <a  class="input_button" href="http://localhost/new/index.php?exit=1" style="color: white"><p>EXIT</p></a>
  </div>
  <div class="div_input" style="width: auto">
    <table style="width: auto">
      <?php
      echo '            <tr>
                <td>First name</td>
                <td>' . $data_users['firstname'] . '</td>
            </tr>
            <tr>
                <td>Last name</td>
                <td>' . $data_users['lastname'] . '</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>' . $data_users['email'] . '</td>
            </tr>
';
      ?>
    </table>
  </div>
</div>
