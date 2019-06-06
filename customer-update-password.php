<?php
/*** Abdullah M ***/
session_start();

if ($_SESSION['user_type'] !== 4) {
    header('location:do-sign-out.php');
}
include('customer-header.php');
?>
<body>
    <div class="container">    
        <div class="main_text">
            Update password:
        </div>

        <div class="change_password">
            <form action="do-update-password.php" method="post">
                <div> 
                    <label for="old_password">Old password:</label>
                    <input type="password" name="old_pwd" placeholder="Old password" required>
                </div>
                <div> 
                    <label for="new_pwd_1">New password:</label>
                    <input type="password" name="new_pwd_1" placeholder="New password" required>
                </div>

                <div> 
                    <label for="new_pwd_2">Repeat new password:</label>
                    <input type="password" name="new_pwd_2" placeholder="Repeat new password" required>
                </div>
                <div id="submit_button">
                    <button class="button" type="submit">Update</button>
                </div>   
            </form>
        </div>

    </div>
</body>
</html>