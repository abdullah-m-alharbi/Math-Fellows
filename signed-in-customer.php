<?php
/*** Abdullah Alharbi ***/
if ($_SESSION['user_type'] !== 4) {
    header('location:do-sign-out.php');
}
?>
<!-- Signed in customer -->
<body>
    <div class="container">

        <div class="main_text">
            Welcome <?php echo $_SESSION['fn'] ?>..
        </div>
    </div>
</body>
</html>