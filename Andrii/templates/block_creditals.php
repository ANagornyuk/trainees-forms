<div class="col" style="float: right;">
    <table>
        <tr>
            <td>First name</td>
            <td id="table_fname"><?php echo $tfname; ?></td>
            <td id="table_fname_button"><button onclick="changeField(table_fname, table_fname_button)">Change</button></td>
        </tr>
        <tr>
            <td>Last name</td>
            <td id="table_lname"><?php echo $tlname; ?></td>
            <td id="table_lname_button"><button onclick="changeField(table_lname, table_lname_button)">Change</button></td>
        </tr>
        <tr>
            <td>Email</td>
            <td id="table_email"><?php echo $temail; ?></td>
            <td id="table_email_button"><button onclick="changeField(table_email, table_email_button)">Change</button></td>
        </tr>
        <tr>
            <td>Password</td>
            <td id="table_password"><!--<button onclick="showPassword()">Show</button>--></td>
            <td id=""><a href="changePassword.html">Change</a></td>
        </tr>
    </table>
</div>
