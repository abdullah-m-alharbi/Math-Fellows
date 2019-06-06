<?php
/*** Abdullah M ***/
session_start();

if ($_SESSION['user_type'] !== 3) {
    header('location:do-sign-out.php');
}
include('tutor-header.php');

if ($_SESSION['approved'] != 1 || $_SESSION['active'] != 1) {
    header('location:awaiting-approval.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MathFellows";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'DELETE FROM bookings WHERE tutorId='.$_SESSION['id'];
$conn->query($sql);

$_SESSION['msg'] = "Bookings cleared!";

header('location:bookings.php');
$conn->close();
?>
