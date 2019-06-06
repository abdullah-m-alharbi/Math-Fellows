<?php
/*** Abdullah M ***/
session_start();

if ($_SESSION['user_type'] == 2) {
    include('admin-header.php');
} else if ($_SESSION['user_type'] == 1) {
    include ('root-admin-header.php');
} else {
    header('location:do-sign-out.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MathFellows";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST)) {

    foreach ($_POST as $key => $val) {
        $id = $key;
        if (strcmp($val, "Reactivate") == 0) {
            $sql = "UPDATE tutors SET active=1 WHERE id='$id'";
            $conn->query($sql);
            $_SESSION['msg'] = "Tutor status updated successfully!";
            header('location:manage-current-tutors.php');
            $conn->close();
            exit();
        } else {
            $sql = "UPDATE tutors SET active=0 WHERE id='$id'";
            $conn->query($sql);
            $_SESSION['msg'] = "Tutor status updated successfully!";
        }
    }
}

header('location:manage-current-tutors.php');
$conn->close();
?>