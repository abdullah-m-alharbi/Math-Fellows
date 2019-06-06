<?php
/*** Abdullah M ***/
session_start();

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

$fn = $_POST['fn'];
$ln = $_POST['ln'];
$pn = $_POST['pn'];
$email = $_POST['email'];
$un = $_POST['un'];
$pwd1 = $_POST['pwd1'];
$pwd2 = $_POST['pwd2'];
$sq = $_POST['sq'];
$sa = $_POST['sa'];

$fn = sanitizeAndTrim($fn);
$ln = sanitizeAndTrim($ln);
$pn = sanitizeAndTrim($pn);
$email = sanitizeAndTrim($email);
$un = sanitizeAndTrim($un);
$pwd1 = sanitizeAndTrim($pwd1);
$pwd2 = sanitizeAndTrim($pwd2);
$sq = sanitizeAndTrim($sq);
$sa = sanitizeAndTrim($sa);

if (strlen($pn) != 10) {
    $_SESSION['error'] = "Error: phone number is not the right length (10 digits)";
    header("location:sign-up.php");
    $conn->close();
    exit();
}

if (strcmp($pwd1, $pwd2) != 0) {
    $_SESSION['error'] = "Error: passwords don't match";
    header("location:sign-up.php");
    $conn->close();
    exit();
}

$pwd1 = password_hash($pwd1, PASSWORD_DEFAULT);
$today = date("Y-m-d");


if ($_POST['acct_type'] == "customer") {

    $sql = "SELECT * FROM customers WHERE username='$un'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Error: username is already taken";
    } else {
        $sql = "INSERT INTO customers (firstName, lastName, phone, email, username, password, securityQuestion, securityAnswer, dateCreated)
        VALUES ('$fn', '$ln', '$pn', '$email', '$un', '$pwd1', '$sq', '$sa', '$today')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['user_type'] = 0;
            $_SESSION['msg'] = "Account created successfully!";
            header('location:index.php');
            $conn->close();
            exit();
        } else {
            $_SESSION['error'] = "Error: something went wrong while signing you up";
        }
    }
} else if ($_POST['acct_type'] == "tutor") {

    $sql = "SELECT * FROM tutors WHERE username='$un'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Error: username is already taken";
    } else {
        $sql = "INSERT INTO tutors (firstName, lastName, phone, email, username, password, approved, active, securityQuestion, securityAnswer, dateCreated)
        VALUES ('$fn', '$ln', '$pn', '$email', '$un', '$pwd1', '0', '0', '$sq', '$sa', '$today')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['user_type'] = 0;

            header('location:tutor-signup-confirmation.php');
            $conn->close();
            exit();
        } else {
            $_SESSION['error'] = "Error: something went wrong while signing you up";
        }
    }
}

header("location:sign-up.php");
$conn->close();
?>

