<?php
/*** Abdullah Alharbi ***/
session_start();

if ($_SESSION['user_type'] !== 3) {
    header('location:do-sign-out.php');
}
include('tutor-header.php');

if ($_SESSION['approved'] != 1 || $_SESSION['active'] != 1) {
    header('location:awaiting-approval.php');
}
?>
<body>
    <div class="container">
        <?php 
        if (isset($_SESSION['msg'])) {
            echo '<div class="acct_msg" style="color: dimgrey">' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        ?>
        <div class="main_text">
            Select the classes and grades you teach:
        </div>

        <div class="tutor_selection">
            <form action="do-edit-grades-and-subjects.php" method="post">

                <div class="grades_box">      
                    <div class="grades">
                        <label>Grade:</label>
                        <span id="grade_input">
                            <input type="checkbox" name="1" value="1">7th grade
                        </span>
                        <span id="grade_input">
                            <input type="checkbox" name="2" value="2">8th grade
                        </span>
                        <span id="grade_input">
                            <input type="checkbox" name="3" value="3">9th grade
                        </span>
                        <span id="grade_input">
                            <input type="checkbox" name="4" value="4">10th grade
                        </span>
                        <span id="grade_input">
                            <input type="checkbox" name="5" value="5">11th grade
                        </span>
                        <span id="grade_input">
                            <input type="checkbox" name="6" value="6">12th grade
                        </span>
                    </div>
                </div>

                <div class="subjects_box">
                    <div class="subjects">
                        <label>Subject:</label>

                        <span id="subject_input">
                            <input type="checkbox" name="7" value="7"> Pre-Algebra
                        </span>

                        <span id="subject_input">
                            <input type="checkbox" name="8" value="8"> Algebra (1 or 2)
                        </span>

                        <span id="subject_input">
                            <input type="checkbox" name="9" value="9"> Geometry
                        </span>

                        <span id="subject_input">
                            <input type="checkbox" name="10" value="10"> Trigonometry
                        </span>

                        <span id="subject_input">
                            <input type="checkbox" name="11" value="11"> Pre-Calculus
                        </span>

                        <span id="subject_input">
                            <input type="checkbox" name="12" value="12"> Calculus
                        </span>
                    </div>
                </div>

                <div class="search_bttn_box">
                    <div class="search_bttn">  
                        <input class="button" type="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>