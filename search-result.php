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

if (count($_POST) != 0) {

    foreach ($_POST as $key => $val) {
        $gradeOrSubject = $key;
        $gradeIdOrSubjectId = $val;
        if (strcmp($gradeOrSubject, "grade") == 0) {
            $gradeId = $gradeIdOrSubjectId;
        } 
        else {
            $subjectId = $gradeIdOrSubjectId;
        }
    }
    
    $subjectId = $subjectId - 6;
    
    // Showing only approved + active tutors that teach the selected grade and subject (using bridge tables)
    $sql = "SELECT tutors.id, tutors.firstName, tutors.lastName, tutors.description, grades.grade, subjects.subject FROM tutors
            INNER JOIN tutorGradeBridge ON tutors.id=tutorGradeBridge.tutorID
            INNER JOIN tutorSubjectBridge ON tutors.id=tutorSubjectBridge.tutorId
            INNER JOIN subjects ON subjects.id=tutorSubjectBridge.subjectId
            INNER JOIN grades ON grades.id=tutorGradeBridge.gradeId
            WHERE grades.id='$gradeId' AND subjects.id='$subjectId' AND tutors.active=1 AND tutors.approved=1
            ORDER BY tutors.firstName";
    
    $result = $conn->query($sql);
    $count = $result->num_rows;
}
?>
<body>
    <div class="container">

        <?php
        if ($count > 0){
            while ($row = $result->fetch_assoc()){
                echo '
                    <div class="tutors_found_msg">
                        ' . $count;
                echo ' 
                        tutor/s found:
                    </div>
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

                                <!-- Max of 240 characters -->
                                ' . $row['description'];
                echo '
                            </div>
                        </div>
                        <div class="submit_bttn_box">
                            <form action="confirm-booking.php" method="post">
                                <input class="button" type="submit" name="'; echo $row['id'].'" value="Book tutor"> 
                            </form>
                        </div>
                    </div>';
            }
        }
        else {
            echo '
                <div class="see_tutor_msg">
                    Sorry, no tutors found
                </div>
                <div id="urls" class="urls so">
                    <a href="see-a-tutor.php">Try your search again</a>
                </div>
            ';            
        }
        ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>

