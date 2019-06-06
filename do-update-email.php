<?php
/*** Abdullah M ***/
session_start();

if ($_SESSION['user_type'] !== 4 || $_SESSION['user_type'] !== 3){
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

$id = $_SESSION['id'];

if ($_SESSION['user_type'] == 3){
    if (password_verify($_POST['pwd'], $_SESSION['hashed_pwd']) && strcmp($_POST['new_email_1'], $_POST['new_email_2']) == 0){
        $email = $_POST['new_email_1'];
        $sql = "UPDATE tutors SET email='$email' WHERE id='$id'";
        $conn->query($sql);
        $_SESSION['msg'] = "Email updated successfully!";        
        header('location:index.php');
        $conn->close();
        exit();
    }
    else {
        $_SESSION['error'] = "Updating email failed. Emails don't match or wrong password";
        header('location:index.php');
        $conn->close();
        exit();
    }
}
else if ($_SESSION['user_type'] == 4){

    if (password_verify($_POST['pwd'], $_SESSION['hashed_pwd']) && strcmp($_POST['new_email_1'], $_POST['new_email_2']) == 0){
        $email = $_POST['new_email_1'];
        $sql = "UPDATE customers SET email='$email' WHERE id='$id'";
        $conn->query($sql);
        $_SESSION['msg'] = "Email updated successfully!";        
        header('location:index.php');
        $conn->close();
        exit();
    }
    else {
        $_SESSION['error'] = "Updating email failed. Emails don't match or wrong password";
        header('location:index.php');
        $conn->close();
        exit();
    }
}

header("location:index.php");
$conn->close();
?>
