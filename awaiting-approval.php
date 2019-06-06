<?php
/*** Abdullah Alharbi ***/
session_start();
include('tutor-header.php');

if ($_SESSION['user_type'] !== 3) {
    header('location:do-sign-out.php');
}
?>

<body>
    <div class="container">
        <div class="instructions_msg">
            <div class="msg">
                Hello, <?php echo $_SESSION['fn'] ?>. Your account is on hold. An admin 
                either needs to approve your account (for the first time), or reactivate
                it after it's been deactivated in order for you to be able
                to use the website.
            </div>
            <div class="msg">
                You can use your account once approved/reactivated.
            </div>
        </div>

    </div>
</body>
</html>