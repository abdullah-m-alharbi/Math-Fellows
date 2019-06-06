<?php
/*** Abdullah M ***/
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mathFellows";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection to database failed!");
}

if (isset($_SESSION['user_type'])) {

    if ($_SESSION['user_type'] === 0) {
        include('signed-out-header.php');
        if (isset($_SESSION['error'])) {
            echo '<div class="acct_msg" style="color: darkred">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        } else if (isset($_SESSION['msg'])) {
            echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        include('signed-out.php');
        exit();
    } else if ($_SESSION['user_type'] === 4) {
        include('customer-header.php');
        if (isset($_SESSION['error'])) {
            echo '<div class="acct_msg" style="color: darkred">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        } else if (isset($_SESSION['msg'])) {
            echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        include('signed-in-customer.php');

        exit();
    } else if ($_SESSION['user_type'] === 3) {
        include('tutor-header.php');
        if (isset($_SESSION['error'])) {
            echo '<div class="acct_msg" style="color: darkred">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        } else if (isset($_SESSION['msg'])) {
            echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        include('signed-in-tutor.php');
        exit();
    } else if ($_SESSION['user_type'] === 2) {
        include('admin-header.php');
        if (isset($_SESSION['error'])) {
            echo '<div class="acct_msg" style="color: darkred">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        } else if (isset($_SESSION['msg'])) {
            echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        include('signed-in-admin.php');
        exit();
    } else if ($_SESSION['user_type'] === 1) {
        include('root-admin-header.php');
        if (isset($_SESSION['error'])) {
            echo '<div class="acct_msg" style="color: darkred">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        } else if (isset($_SESSION['msg'])) {
            echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        include('signed-in-admin.php');
        exit();
    }
} else {
    include('signed-out-header.php');
    if (isset($_SESSION['error'])) {
        echo '<div class="acct_msg" style="color: darkred">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    } else if (isset($_SESSION['msg'])) {
        echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
        unset($_SESSION['msg']);
    }
    include('signed-out.php');
} 

$conn->close();
?>


