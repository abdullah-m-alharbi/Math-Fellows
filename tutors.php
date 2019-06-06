<?php
/*** Abdullah Alharbi ***/
session_start();

if ($_SESSION['user_type'] == 2) {
    include('admin-header.php');
} else if ($_SESSION['user_type'] == 1) {
    include ('root-admin-header.php');
} else {
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

$sql = "SELECT COUNT(id) FROM tutors WHERE approved=0";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$count = $row['COUNT(id)'];

?>
<body>
    <div class="container">
        <div class="instructions_msg">
            There are <?php echo $count; ?> tutor(s) to be approved.
        </div>

        <div class="admin_menu_box">
            <div id="view_tutors_url">
                <a href="view-new-tutors.php">View new tutors</a>
            </div>
            <div id="manage_tutors_url">
                <a href="manage-current-tutors.php">Manage current tutors</a>
            </div>
        </div>

    </div>
</body>
</html>