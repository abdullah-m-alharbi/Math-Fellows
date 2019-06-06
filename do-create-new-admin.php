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

    $un = $_POST['un'];
    $pwd = $_POST['pwd'];
    $hashed = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM admins WHERE username='$un'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['msg'] = "Error: username is already taken";
    } else {
        $sql = "INSERT INTO admins (username, password, rootAdmin) VALUES ('$un', '$hashed', 0)";

        if ($conn->query($sql) === TRUE) {

            $_SESSION['msg'] = "Account created successfully!";
            header('location:create-new-admins.php');
            $conn->close();
            exit();
        } else {
            $_SESSION['msg'] = "Error: something went wrong while creating a new admin account";
        }
    }
}
    header('location:create-new-admins.php');
    $conn->close();
?>
