<?php
/*** Abdullah M ***/
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

$sql = "SELECT * FROM tutors WHERE approved = 0";
$result = $conn->query($sql);

?>
<body>
    <div class="container">

        <?php 
        if ($result->num_rows == 0){
            echo '<div class="instructions_msg">There are no new tutors to be approved</div>';
        }
        else {
            echo '<div class="instructions_msg"> Disapproving a tutor will delete their account from the system.</div>
                  <div class="instructions_msg">New tutors: </div>';
            
            while ($row = $result->fetch_assoc()){
                $fn = $row['firstName'];
                $ln = $row['lastName'];
                $un = $row['username'];
                $date = $row['dateCreated'];
                $id = $row['id'];
                echo'
                    <div class="new_tutor_box">
                        <div class="full_name_text">
                            Full name: ' . $ln . ', ' . $fn;
                echo '
                        </div>
                        <div class="username_text">
                            Username: ' . $un;
                echo ' 
                        </div>
                        <div class="sign_up_date_text">
                            Signup date: ' . $date;
                echo '
                        </div>

                        <div class="approve_bttn">
                            <form action="do-approve-disapprove.php" method="post">
                                <input class="button" type="submit" name="'.$id; echo '" value="Approve">
                            </form>  
                        </div>
                        <div class="disapprove_bttn">
                            <form action="do-approve-disapprove.php" method="post">
                                <input class="button" type="submit" name="'.$id; echo '" value="Disapprove">
                            </form>  
                        </div>
                    </div>';
            }
            
        }
        $conn->close();
        ?>
    </div>
</body>
</html>