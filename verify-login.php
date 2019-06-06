<?php
/*** Abdullah M ***/
session_start();

if ($_POST['username'] == '' || $_POST['password'] == '') {
    $_SESSION['user_type'] = 0;
    $_SESSION['error'] = 'Error: username and/or password cannot be empty';
    header("location:index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MathFellows";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$un = $_POST['username'];
$pwd = $_POST['password'];

$un = filter_var($un, FILTER_SANITIZE_STRING);
$pwd = filter_var($pwd, FILTER_SANITIZE_STRING);
$un = trim($un);
$pwd = trim($pwd);

//------------------------------------------------------ 
// Checking if they're a customer

$sql = "SELECT * FROM customers WHERE username='$un'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 

    $row = $result->fetch_assoc();

    if (password_verify($pwd, $row['password'])) {
        // log them in as a customer and redirect to index and exit    

        $_SESSION['user_type'] = 4;
        $_SESSION['fn'] = $row['firstName'];
        $_SESSION['ln'] = $row['lastName'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['hashed_pwd'] = $row['password'];
        $_SESSION['pn'] = $row['phone'];
        header("location:index.php");
        exit();
    } else {
        $_SESSION['user_type'] = 0;
        $_SESSION['error'] = 'Error: invalid username or password';
        unset($_POST['username']);
        unset($_POST['password']);
        $conn->close();
        header("location:index.php");
        exit();
    }
}


//------------------------------------------------------ 
// Checking if they're a tutor

$sql = "SELECT * FROM tutors WHERE username='$un'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    if (password_verify($pwd, $row['password'])) {
        // log them in as a tutor and redirect to index and exit        
        $_SESSION['user_type'] = 3;
        $_SESSION['approved'] = $row['approved'];
        $_SESSION['active'] = $row['active'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['fn'] = $row['firstName'];
        $_SESSION['ln'] = $row['lastName'];
        $_SESSION['hashed_pwd'] = $row['password'];
        $_SESSION['desc'] = $row['description'];
        
        $sql = 'SELECT COUNT(id) FROM bookings WHERE bookings.tutorId=' . $_SESSION['id'];
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION['bookings'] = $row['COUNT(id)'];
        
        header("location:index.php");
        exit();
    } else {
        $_SESSION['user_type'] = 0;
        $_SESSION['error'] = 'Error: invalid username or password';
        unset($_POST['username']);
        unset($_POST['password']);
        $conn->close();
        header("location:index.php");
        exit();
    }
}


//------------------------------------------------------ 
// Checking if they're an admin

$sql = "SELECT * FROM admins WHERE username='$un'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    if (password_verify($pwd, $row['password'])) {
        // log them in as a customer and redirect to index and exit    

        if ($row['rootAdmin'] == 1) {
            $_SESSION['user_type'] = 1;
            $_SESSION['un'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['hashed_pwd'] = $row['password'];
            header("location:index.php");
            exit();
        } else {
            $_SESSION['user_type'] = 2;
            $_SESSION['un'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['hashed_pwd'] = $row['password'];
            header("location:index.php");
            exit();
        }
    } else {
        $_SESSION['user_type'] = 0;
        $_SESSION['error'] = 'Error: invalid username or password';
        unset($_POST['username']);
        unset($_POST['password']);
        $conn->close();
        header("location:index.php");
        exit();
    }
}

//------------------------------------------------------ 
// If arrived here (did not exit from any of the above statements)
// Then set an invalid login message and redirect to index

unset($_POST['username']);
unset($_POST['password']);

$_SESSION['user_type'] = 0;
$_SESSION['error'] = 'Error: invalid username or password';

header("location:index.php");

$conn->close();
?>



