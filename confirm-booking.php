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
?>
<body>
    <div class="container">
        <div class="instructions_msg">
            <div id="msg">
                How it works: after you click confirm, we'll send our tutor an email with your information and phone number.
            </div>
            <div id="msg">
                Then, our tutor will get in touch with you so both of you agree on a time, place, and rate.
            </div>
            <div id="msg">
                You're about to book <?php echo $row['firstName'] . ' ' . $row['lastName'] ?>, please click confirm if you would like to proceed...
            </div>
        </div>
        
    <?php
    echo '  
        <div class="tutor_box">
            <div class="tutor_image">
                <img src="tut-default.png" alt="Tutor img">
            </div>
            <div class="tutor_name_box">
                <div class="tutor_name_text">
                    ' . $row['firstName'];
    echo          ' ' . $row['lastName'] . '
                </div>
            </div>
            <div class="desc_box">
                <div class="desc_text">

                    ' . $row['description'];
    echo '
                </div>
            </div>
            <div class="confirm_tutor">
                <form action="done-booking.php" method="post">
                    <input class="button" type="submit" name="'; echo $row['id'].'" value="Confirm"> 
                </form>
            </div>
        </div>'
    ?>

    </div>
</body>
</html>
<?php $conn->close(); ?>