<?php
/*** Abdullah M ***/
session_start();
include('signed-out-header.php');
?>

<body>
    <div class="container">
        <?php 
        if (isset($_SESSION['error'])) {
            echo '<div class="acct_msg" style="color: darkred">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <div class="instructions_msg">
            What's your username?
        </div>
        <div class="change_password">
            <form action="security-question-check.php" method="post">
                <div> 
                    <label for="un">Username:</label>
                    <input type="text" name="un" placeholder="Username" required>
                </div>             
                <div id="submit_button">
                    <button class="button" type="submit">Submit</button>
                </div>   
            </form>
        </div>
    </div>
</body>
</html>