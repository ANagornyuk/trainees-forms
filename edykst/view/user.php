<?php

  /**
   * @file
   * Login user info.
   */

$users = new User();
$data_users = $users->userInfo($_SESSION['user']);
?>
<div class="div_block_js" style="width: fit-content;">
  <div class="div_input">
    <a class="input_button" href="index.php?p=edit&user=<?php echo $data_users['id']?>" style="color: white; font-weight: bold""><p>EDIT</p></a>
    <a class="input_button" href="index.php?p=allusers" style="color: white; font-weight: bold""><p>USERS</p></a>
    <a class="input_button" href="index.php?exit=1" style="color: white; font-weight: bold""><p>EXIT</p></a>
  </div>
  <div class="div_input">
    <table class="table">
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
                <td>E-mail</td>
                <td>' . $data_users['email'] . '</td>
            </tr>
';
      ?>
    </table>
  </div>
</div>
