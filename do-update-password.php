<?php
/*** Abdullah M ***/
session_start();

if ($_SESSION['user_type'] > 4 || $_SESSION['user_type'] < 1){
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
$oldPwd = sanitizeAndTrim($_POST['old_pwd']);
$newPwd1 = sanitizeAndTrim($_POST['new_pwd_1']);
$newPwd2 = sanitizeAndTrim($_POST['new_pwd_2']);

if(password_verify($oldPwd, $_SESSION['hashed_pwd']) && strcmp($newPwd1, $newPwd2) == 0){
    
    if ($_SESSION['user_type'] == 4) {
        $hashed = password_hash($newPwd1, PASSWORD_DEFAULT);
        $sql = "UPDATE customers SET password='$hashed' WHERE id='$id'";
        $conn->query($sql);
        $_SESSION['msg'] = "Password updated successfully!";        
        $_SESSION['hashed_pwd'] = $hashed;
        header('location:index.php');
        $conn->close();
        exit();
    }
    else if ($_SESSION['user_type'] == 3) {
        $hashed = password_hash($newPwd1, PASSWORD_DEFAULT);
        $sql = "UPDATE tutors SET password='$hashed' WHERE id='$id'";
        $conn->query($sql);
        $_SESSION['msg'] = "Password updated successfully!";        
        $_SESSION['hashed_pwd'] = $hashed;
        header('location:index.php');
        $conn->close();
        exit();
    }
    else if ($_SESSION['user_type'] == 2) {
        $hashed = password_hash($newPwd1, PASSWORD_DEFAULT);
        $sql = "UPDATE admins SET password='$hashed' WHERE id='$id'";
        $conn->query($sql);
        $_SESSION['msg'] = "Password updated successfully!";        
        $_SESSION['hashed_pwd'] = $hashed;
        header('location:index.php');
        $conn->close();
        exit();
    }
    else if ($_SESSION['user_type'] == 1) {
        $hashed = password_hash($newPwd1, PASSWORD_DEFAULT);
        $sql = "UPDATE admins SET password='$hashed' WHERE id='$id'";
        $conn->query($sql);
        $_SESSION['msg'] = "Password updated successfully!";        
        $_SESSION['hashed_pwd'] = $hashed;
        header('location:index.php');
        $conn->close();
        exit();
    }
}
else {
    $_SESSION['error'] = "Error: old password is wrong, or passwords don't match";
    header("location:index.php");
    $conn->close();
    exit();
}

header("location:index.php");
$conn->close();
?>
