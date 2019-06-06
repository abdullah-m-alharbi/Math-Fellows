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
        <div class="instructions_msg">
            <div class="msg">
                By submitting this form, you agree to change your name. 
            </div>
            <div class="msg">
                After submission, an admin has to review the new changes and give approval before you see any changes.
            </div>
            <div class="main_text">
                Update name:
            </div>
        </div>

        <div class="change_name" >
            <form action="do-update-name.php" method="post">
                <div> 
                    <label for="fn">First name:</label>
                    <input type="text" name="fn" placeholder="First name" required>
                </div>
                <div> 
                    <label for="ln">Last name:</label>
                    <input type="text" name="ln" placeholder="Last name" required>
                </div>          
                <div> 
                    <label for="pwd">Password:</label>
                    <input type="password" name="pwd" placeholder="Password" required>
                </div>
                <div>
                    <span id="dont_float">
                        <input type="checkbox" name="agree" value="agree" required> I agree to change my name
                    </span>
                </div>

                <div id="submit_button">
                    <button class="button" type="submit">Submit</button>
                </div>   
            </form>
        </div>

    </div>
</body>
</html>