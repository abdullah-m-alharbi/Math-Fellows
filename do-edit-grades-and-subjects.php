<?php
/*** Abdullah M ***/
session_start();

if ($_SESSION['user_type'] !== 3) {
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

$id = $_SESSION['id'];

// Deleting all grades and subjects that specific teacher teaches
$sql = "DELETE FROM tutorGradeBridge WHERE tutorId='$id'";
$conn->query($sql);
$sql = "DELETE FROM tutorSubjectBridge WHERE tutorId='$id'";
$conn->query($sql);

if (count($_POST) != 0) {
    // adding stuff from $_POST to DB

    $keys = array(); // keys are DB IDs (1-6 in $_POST are grades and 7-12 are subjects)
    // putting contents of $_POST array to $keys
    foreach ($_POST as $field => $value) {
        $keys[] = $value;
    }

    // inserting each item in $keys into DB
    for ($i = 0; $i < count($keys); $i++) {
        $tempId = $keys[$i];

        if ($tempId < 7) { // inserting into tutorGradeBridge
            $sql = "INSERT INTO tutorGradeBridge (tutorId, gradeId) VALUES ('$id','$tempId')";
            $conn->query($sql);
        } else if ($tempId > 6) { // inserting into tutorSubjectBridge
            $temp = $tempId - 6; // since IDs in subjects start at 1
            $sql = "INSERT INTO tutorSubjectBridge (tutorId, subjectId) VALUES ('$id','$temp')";
            $conn->query($sql);
        }
    }
}

$_SESSION['msg'] = "Grades/subjects taught updated successfully!";

header("location:tutor-edit-grades-subjects.php");
$conn->close();
?>