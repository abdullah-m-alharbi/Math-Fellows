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
        <div class="main_text">
            Sign up:
        </div>

        <div class="sign_up" >

            <form action="do-signup.php" method="post">
                <div> 
                    <label for="fn">First name:</label>
                    <input type="text" name="fn" maxlength="50" placeholder="First name" required>
                </div>

                <div> 
                    <label for="ln">Last name:</label>
                    <input type="text" name="ln" maxlength="50" placeholder="Last name" required>
                </div>

                <div> 
                    <label for="pn">Phone number:</label> 
                    <input type="number" name="pn" placeholder="123-123-1234" required>
                </div>

                <div> 
                    <label for="email">Email:</label>
                    <input type="text" name="email" maxlength="50" placeholder="email@example.com" required>
                </div>

                <div> 
                    <label for="un">Username:</label>
                    <input type="text" name="un" maxlength="50" placeholder="Username" required>
                </div>

                <div> 
                    <label for="pwd1">Password:</label>
                    <input type="password" name="pwd1" maxlength="255" placeholder="Password" required>
                </div>

                <div> 
                    <label for="pwd2">Repeat password:</label>
                    <input type="password" name="pwd2" maxlength="255" placeholder="Repeat password" required>
                </div>
                
                <div> 
                    <label for="pwd2">Security question:</label>
                    <input type="text" name="sq" maxlength="50" placeholder="Security question" required>
                </div>
                
                <div> 
                    <label for="pwd2">Answer:</label>
                    <input type="text" name="sa" maxlength="50" placeholder="Security question answer" required>
                </div>

                <div> 
                    <label for="student_or_tutor">I'm a:</label>
                    <span id="dont_float">
                        <input type="radio" name="acct_type" value="customer" checked> Customer
                        <input type="radio" name="acct_type" value="tutor"> Tutor
                    </span>
                </div>

                <div>
                    <span id="dont_float">
                        <input type="checkbox" name="agree" value="agree" required> I agree to the terms of use and service
                    </span>
                </div>

                <div id="submit_button">
                    <button class="button" type="submit">Sign up</button>
                </div>   

            </form>
        </div>

    </div>
</body>
</html>