<?php
/*** Abdullah M ***/
session_start();

if ($_SESSION['user_type'] !== 1) {
    header('location:do-sign-out.php');
}
include('root-admin-header.php');

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
        $sql = "DELETE FROM admins WHERE id='$id'";
        if($conn->query($sql) === TRUE){
            $_SESSION['msg'] = "Admin account deleted successfully!";
        }
        else {
            $_SESSION['msg'] = "Error: admin account was not deleted";
        }
    }
}

header('location:admins.php');
$conn->close();
?>