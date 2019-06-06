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

$un = $_POST['un'];
$un = sanitizeAndTrim($un);
$_SESSION['un'] = $un;

$sql = "SELECT * FROM customers WHERE username='$un'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $secQ = $row['securityQuestion'];
    $_SESSION['ans'] = $row['securityAnswer'];
    $_SESSION['t'] = 4;
    
    echo '
    <body>
    <div class="container">
        <div class="instructions_msg">
            Answer this security question:
        </div>
        <div class="change_password">
            <form action="do-security-question-check.php" method="post">
                <div> 
                    <label>' . $secQ . '</label>
                    <input type="text" name="ans" placeholder="Answer" required>
                </div>             
                <div id="submit_button">
                    <button class="button" type="submit">Submit</button>
                </div>   
            </form>
        </div>
        </div>
    </body>
    </html>';
    
    $conn->close();
    exit();
} 

$sql = "SELECT * FROM tutors WHERE username='$un'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $secQ = $row['securityQuestion'];
    $_SESSION['ans'] = $row['securityAnswer'];
    $_SESSION['t'] = 3;
    
    echo '
    <body>
    <div class="container">
        <div class="instructions_msg">
            Answer this security question:
        </div>
        <div class="change_password">
            <form action="do-security-question-check.php" method="post">
                <div> 
                    <label>' . $secQ . '</label>
                    <input type="text" name="ans" placeholder="Answer" required>
                </div>             
                <div id="submit_button">
                    <button class="button" type="submit">Submit</button>
                </div>   
            </form>
        </div>
        </div>
    </body>
    </html>';
    
    $conn->close();
    exit();
} 

$sql = "SELECT * FROM admins WHERE username='$un'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $secQ = $row['securityQuestion'];
    $_SESSION['ans'] = $row['securityAnswer'];
    $_SESSION['t'] = 2;
    
    echo '
    <body>
    <div class="container">
        <div class="instructions_msg">
            Answer this security question:
        </div>
        <div class="change_password">
            <form action="do-security-question-check.php" method="post">
                <div> 
                    <label>' . $secQ . '</label>
                    <input type="text" name="ans" placeholder="Answer" required>
                </div>             
                <div id="submit_button">
                    <button class="button" type="submit">Submit</button>
                </div>   
            </form>
        </div>
        </div>
    </body>
    </html>';
    
    $conn->close();
    exit();
} 

$_SESSION['error'] = "Error: there's no user with such username";
        
header("location:forgot-password.php");
$conn->close();
?>