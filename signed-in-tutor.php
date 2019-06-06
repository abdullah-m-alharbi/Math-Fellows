<?php
/*** Abdullah M ***/
if ($_SESSION['user_type'] !== 3) {
    header('location:do-sign-out.php');
} else if ($_SESSION['approved'] != 1 || $_SESSION['active'] != 1) {
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

$sql = 'SELECT COUNT(id) FROM bookings WHERE bookings.tutorId=' . $_SESSION['id'];
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!-- Holleigh Landers -->
<!-- Abdullah M -->
<body>
    <div class="container">

        <div class="main_text">
            Welcome <?php echo $_SESSION['fn'] ?>..
        </div>
        <?php 
        if ($_SESSION['bookings'] > 0){
            echo '<div class="main_text">
            You have ' . $row['COUNT(id)'] . ' booking(s)</div>';   
        }
        ?>
    </div>
</body>
</html>