<?php
/*** Abdullah M ***/
session_start();
include('admin-header.php');

if ($_SESSION['user_type'] !== 2) {
    header('location:do-sign-out.php');
}
?>
<body>
    <div class="container">    
        <div class="main_text">
            Delete account:
        </div>
        <div class="change_password">
            <form action="#" method="post">
                <div> 
                    <label for="pwd">Password:</label>
                    <input type="password" name="pwd" required>
                </div>
                <div> 
                    <label for="pwd_repeat">Repeat password:</label>
                    <input type="password" name="pwd_repeat" required>
                </div>
                <div id="submit_button">
                    <button class="button" type="submit">Confirm deletion</button>
                </div>   
            </form>
        </div>
    </div>
</body>
</html>