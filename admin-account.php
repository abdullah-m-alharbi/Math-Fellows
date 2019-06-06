<?php
/*** Abdullah M ***/
session_start();
include('admin-header.php');

if ($_SESSION['user_type'] !== 2) {
    header('location:do-sign-out.php');
}
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
            <div id="manage_tutors_url">
                <a href="admin-delete-account.php">Delete account</a>
            </div>
        </div>

    </div>
</body>
</html>