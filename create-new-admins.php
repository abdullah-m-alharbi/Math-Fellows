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
        <?php
        if (isset($_SESSION['msg'])) {
            echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        ?>
        <div class="instructions_msg">
            <div class="msg">
                Create new admin:
            </div>
            <form action="do-create-new-admin.php" method="post">
                <input type="text" name="un" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="submit">
            </form>
        </div>
    </div>
</body>
</html>
