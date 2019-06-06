<?php
/*** Abdullah M ***/
session_start();
include('customer-header.php');

if ($_SESSION['user_type'] !== 4) {
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

if (isset($_POST)) {
    foreach ($_POST as $key => $val) {
        $id = $key;
    }   
    
    $sql = "SELECT * FROM tutors WHERE id='$id'";
    $result = $conn->query($sql);
    
    $row = $result->fetch_assoc();
}
else {
    $_SESSION['msg'] = "Something went wrong. Try rebooking";
    header('location:see-a-tutor.php');
    $conn->close();
    exit();
}

//$sender = 'configure on server';
$recipient = $row['email'];
$subject = "A new booking on Math Fellows";
$message = 'Hello ' . $row['firstName'] . ',<br><br>' . $_SESSION['fn'] . ' ' . $_SESSION['ln'] 
        . ' has booked you today. Please in touch with them as soon as possible. Their phone number:<br>'
        . $_SESSION['pn'];
$headers = '';

mail($recipient, $subject, $message, $headers);

$today = date("Y-m-d");
$tutId = $row['id'];
$custId = $_SESSION['id'];

$sql = "INSERT INTO bookings (tutorId, customerId, dateBooked) VALUES ('$tutId', '$custId', '$today')";
$conn->query($sql);

?>
<body>
    <div class="container">
        <div class="instructions_msg">
            <div class="msg">
                You're all set! <?php echo $row['firstName'] . ' ' . $row['lastName']; ?> will get in touch with you soon.
            </div>
            <div class="msg">
                Please allow the tutor a minimum of 3 business days before you get a response.
            </div>
        </div>
    </div>
</body>
</html> 
<?php $conn->close(); ?>