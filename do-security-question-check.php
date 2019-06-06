<?php
/*** Abdullah M ***/
session_start();
include('signed-out-header.php');

$submittedAnswer = $_POST['ans'];
$correctAnswer = $_SESSION['ans'];

if (isset($_SESSION['error'])) {
    echo '<div class="acct_msg" style="color: darkred">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}

if (strcmp($submittedAnswer, $correctAnswer) == 0){
    
    echo '<div class="change_password">
            <form action="do-update-password-f.php" method="post">
                <div class="instructions_msg">
                    Update password:
                </div>
                <div> 
                    <label for="un">New password:</label>
                    <input type="password" name="pwd_1" placeholder="Password" required>
                </div> 
                <div> 
                    <label for="un">Repeat password:</label>
                    <input type="password" name="pwd_2" placeholder="Repeat password" required>
                </div> 
                <div id="submit_button">
                    <button class="button" type="submit">Submit</button>
                </div>   
            </form>
        </div>';
} 
else {
    $_SESSION['error'] = "Error: wrong answer";
    header("location:index.php");
}


?>