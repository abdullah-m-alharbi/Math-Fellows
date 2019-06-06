<?php
/*** Abdullah M ***/
session_start();

if ($_SESSION['user_type'] !== 1) {
    header('location:do-sign-out.php');
}
include('root-admin-header.php');
?>
<body>
    <div class="container">
        <div class="instructions_msg">
            Account:
        </div>

        <div class="admin_menu_box">
            <div id="view_tutors_url">
                <a href="admin-update-password.php">Change password</a>
            </div>
        </div>

    </div>
</body>
</html>