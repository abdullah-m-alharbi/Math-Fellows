<?php
/*** Abdullah M ***/
session_start();

if ($_SESSION['user_type'] !== 3) {
    header('location:do-sign-out.php');
}

function sanitizeAndTrim($str) {
    $str = filter_var($str, FILTER_SANITIZE_STRING);
    $str = trim($str);
    return $str;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MathFellows";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION['id'];
$fn = sanitizeAndTrim($_POST['fn']);
$ln = sanitizeAndTrim($_POST['ln']);

if (password_verify($_POST['pwd'], $_SESSION['hashed_pwd'])) {
    $email = $_POST['new_email_1'];
    $sql = "UPDATE tutors SET firstName='$fn', lastName='$ln' WHERE id='$id'";
    $conn->query($sql);
    $_SESSION['msg'] = "Name updated successfully!";
    $_SESSION['fn'] = $fn;
    $_SESSION['ln'] = $ln;
    header('location:index.php');
    $conn->close();
    exit();
} else {
    $_SESSION['error'] = "Updating name failed. Wrong password";
    header('location:index.php');
    $conn->close();
    exit();
}

header("location:index.php");
$conn->close();
?>
