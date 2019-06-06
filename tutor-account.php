<?php
/*** Holleigh Landers ***/
/*** Abdullah Alharbi ***/
session_start();

if ($_SESSION['user_type'] !== 3) {
    header('location:do-sign-out.php');
}
include('tutor-header.php');

if ($_SESSION['approved'] != 1 || $_SESSION['active'] != 1) {
    header('location:awaiting-approval.php');
}
?>
<body>
    <div class="container">

        <div class="acct_msg">
            Account settings:
        </div>

        <div class="tutor_acct_left_panel">
            <div id="tut_acct_url">
                <a href="tutor-edit-grades-subjects.php">Grades & subjects</a>
            </div>
            <div id="tut_acct_url">
                <a href="tutor-update-email.php">Update email</a>
            </div>
            <div id="tut_acct_url">
                <a href="tutor-update-password.php">Update password</a>
            </div>
            <div id="tut_acct_url">
                <a href="tutor-update-name.php">Update name</a>
            </div>
            <div id="tut_acct_url">
                <a href="update-profile-image.php">Update profile image</a>
            </div>
            <div id="tut_acct_url">
                <a href="#">Remove profile image</a>
            </div>
        </div>

        <div class="in_tut_acct">
            <div class="tutor_box">
                <div class="tutor_image">
                    <img src="tut-default.png" alt="Tutor img">
                </div>
                <div class="tutor_name_box">
                    <div class="tutor_name_text">
                        <?php echo $_SESSION['fn'] . ' ' . $_SESSION['ln']; ?>
                    </div>
                </div>
                <div class="desc_box">
                    <div class="desc_text">
                        <?php echo $_SESSION['desc'];  ?>
                    </div>
                </div>
                <div class="submit_bttn_box">
                    <form action="update-description.php" method="post">
                        <input class="button" type="submit" value="Update description"> 
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>