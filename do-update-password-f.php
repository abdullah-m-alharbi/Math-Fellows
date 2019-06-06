<?php
/*** Abdullah M ***/
session_start();
include('signed-out-header.php');

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

$un = $_SESSION['un'];
$userType = $_SESSION['t'];
$pwd1 = $_POST['pwd_1'];
$pwd2 = $_POST['pwd_2'];

if (strcmp($pwd1, $pwd2) != 0){
    $_SESSION['error'] = "Error: passwords don't match";
    $conn->close();
    header("location:index.php");
    exit();
}

$pwd1 = sanitizeAndTrim($pwd1);
$hashed = (password_hash($pwd1, PASSWORD_DEFAULT));

if ($userType == 4) {
    $sql = "UPDATE customers SET password='$hashed' WHERE username='$un'";
    $conn->query($sql);
    $_SESSION['msg'] = "Password updated successfully!";
} 
else if ($userType == 3) {
    $sql = "UPDATE tutors SET password='$hashed' WHERE username='$un'";
    $conn->query($sql);
    $_SESSION['msg'] = "Password updated successfully!";
} 
else {
    $sql = "UPDATE admins SET password='$hashed' WHERE username='$un'";
    $conn->query($sql);
    $_SESSION['msg'] = "Password updated successfully!";
}

header("location:index.php");
$conn->close();
?>