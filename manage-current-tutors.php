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

$sql = "SELECT * FROM tutors WHERE approved = 1 ORDER BY dateCreated DESC, firstName ASC";
$result = $conn->query($sql);

?>
<body>
    <div class="container">
        <?php 
        if (isset($_SESSION['msg'])) {
            echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        ?>
        <div class="instructions_msg">
            All approved tutors including deactivated accounts, ordered by last created:
        </div>

        <?php
        while ($row = $result->fetch_assoc()){
            if ($row['active'] == 1){
                $activity = "Active";
                $bttnVal = "Deactivate";
            }
            else{
                $activity = "Inactive";
                $bttnVal = "Reactivate";
            }
            echo '
                <div class="tutor_box">
                    <div class="tutor_image">
                        <img src="tut-default.png" alt="Tutor img">
                    </div>
                    <div class="tutor_name_box_in_manage">
                        <div class="tutor_name_text">
                            '. $row['firstName'] . ' ' . $row['lastName']; 
            echo '
                        </div>
                    </div>

                    <div class="active_inactive">
                        ' . $activity;
            echo '
                    </div>

                    <div class="desc_box">
                        <div class="desc_text">
                            ' . $row['description'];
            echo '          
                        </div>
                    </div>

                    <div class="submit_bttn_box">
                        <form action="do-reactivate-deactivate.php" method="post">
                            <input class="button" name="' . $row['id']; 
            echo 
                                        '" type="submit" value="' . $bttnVal; 
            echo '"> 
                        </form>
                    </div>
                </div>';
        }
        $conn->close();
        ?> 
    </div>
</body>
</html>