<?php
/*** Abdullah M ***/
session_start();
include('customer-header.php');

if ($_SESSION['user_type'] !== 4) {
    header('location:do-sign-out.php');
}
?>

<body>
    <div class="container">
        <div class="acct_msg">
            Account settings:
        </div>
        <div class="selection_box">
            <div id="acct_url1">
                <a href="customer-update-email.php">Update email</a>
            </div>
            <div id="acct_url2">
                <a href="customer-update-password.php">Update password</a>
            </div>
        </div>
    </div>
</body>
</html>