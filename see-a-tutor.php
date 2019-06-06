<?php
/*** Abdullah M ***/
session_start();
include('customer-header.php');

if ($_SESSION['user_type'] !== 4) {
    header('location:do-sign-out.php');
}
?>
<body>
    <div class="container">

        <div class="see_tutor_msg">
            <div class="msg1">
                Note: all tutors we have teach middle, and high school only.
            </div>
            <div class="msg2">
                Please, provide us with more information about the tutor you're looking for:
            </div>
        </div>

        <div class="tutor_selection">
            <form action="search-result.php" method="post">
                <div class="grades_box">      
                    <div class="grades">
                        <label>Grade:</label>
                        <span id="grade_input">
                            <input type="radio" name="grade" value="1" checked>7th grade
                        </span>
                        <span id="grade_input">
                            <input type="radio" name="grade" value="2">8th grade
                        </span>
                        <span id="grade_input">
                            <input type="radio" name="grade" value="3">9th grade
                        </span>
                        <span id="grade_input">
                            <input type="radio" name="grade" value="4">10th grade
                        </span>
                        <span id="grade_input">
                            <input type="radio" name="grade" value="5">11th grade
                        </span>
                        <span id="grade_input">
                            <input type="radio" name="grade" value="6">12th grade
                        </span>
                    </div>
                </div>

                <div class="subjects_box">
                    <div class="subjects">
                        <label>Subject:</label>

                        <span id="subject_input">
                            <input type="radio" name="subject" value="7" checked> Pre-Algebra
                        </span>

                        <span id="subject_input">
                            <input type="radio" name="subject" value="8"> Algebra (1 or 2)
                        </span>

                        <span id="subject_input">
                            <input type="radio" name="subject" value="9"> Geometry
                        </span>

                        <span id="subject_input">
                            <input type="radio" name="subject" value="10"> Trigonometry
                        </span>

                        <span id="subject_input">
                            <input type="radio" name="subject" value="11"> Pre-Calculus
                        </span>

                        <span id="subject_input">
                            <input type="radio" name="subject" value="12"> Calculus
                        </span>
                    </div>
                </div>

                <div class="search_bttn_box">
                    <div class="search_bttn">  
                        <input class="button" type="submit" value="Search">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>