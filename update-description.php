<?php
/*** Abdullah Alharbi ***/
session_start();

if ($_SESSION['user_type'] !== 3) {
    header('location:do-sign-out.php');
}
include('tutor-header.php');

if ($_SESSION['approved'] != 1 || $_SESSION['active'] != 1) {
    header('location:awaiting-approval.php');
}

function sanitizeAndTrim($str) {
    $str = filter_var($str, FILTER_SANITIZE_STRING);
    $str = trim($str);
    return $str;
}

if (isset($_POST['desc'])) {
    $descParam = sanitizeAndTrim($_POST['desc']);
    $id = $_SESSION['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "MathFellows";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "UPDATE tutors SET description ='$descParam' WHERE id='$id'";
    if($conn->query($sql) === TRUE){
        $_SESSION['msg'] = "Description updated successfully!";
        $_SESSION['desc'] = $descParam;
    }
    else {
        $_SESSION['error'] = "Error: description failed to update";
    }
}

if (isset($_SESSION['error'])) {
    echo '<div class="acct_msg" style="color: darkred">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
} else if (isset($_SESSION['msg'])) {
    echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
    unset($_SESSION['msg']);
}
?>
<body>
    <div class="container">

        <div class="acct_msg">
            Update description:
            <form action="update-description.php"  method="POST">
                <input type="text" name="desc" class="desc_text" placeholder="New description" style="height:100px;"  maxlength="255" required>
                <input class="button" type="submit" value="Update"> 
            </form>
        </div>
    </div>
</body>
</html>