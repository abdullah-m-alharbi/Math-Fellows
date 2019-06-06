<?php
/*** Abdullah Alharbi ***/

session_start();

if ($_SESSION['user_type'] !== 3) {
    header('location:do-sign-out.php');
}

if ($_SESSION['approved'] != 1 || $_SESSION['active'] != 1) {
    header('location:do-sign-out');
}

include('tutor-header.php');
?>

<body>
    <div class="container">

        <div class="instructions_msg">
            <div class="msg">
                Upload your image:
            </div>
        </div>

        <div class="upload_image_div">
            <form action="#" method="post">

                <input type="file" name="pic" accept="image/*">

                <div id="submit_button">
                    <button class="button" type="submit">Submit</button>
                </div>  
            </form>
        </div>

    </div>
</body>
</html>