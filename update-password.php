<?php
	 session_start();

   $servername = "localhost";
   $username = "root";
   $password = "password";
   $dbname = "test_tutors";

  include('tutor-header.php');
?>

  <body>
    <div class="container">
      
      <div class="main_text">
        Update password:
      </div>
      
      <div class="change_password">
        <form action="#" method="post">
          <div> 
            <label for="username">Username:</label>
            <input type="text" name="username" required>
          </div> 
          <div> 
            <label for="password">Old password:</label>
            <input type="password" name="password" required>
          </div>

          <div> 
            <label for="newpassword">New password:</label>
            <input type="password" name="newpassword" required>
          </div>
          
          <div> 
            <label for="confirm_new">Repeat new password:</label>
            <input type="password" name="confirm_new" required>
          </div>                                 
          <div id="submit_button">
              <button class="button" type="submit">Update</button>
          </div>   
        </form>
      </div>
      
    </div>
  </body>
</html>

<?php

   $username = $_POST['username'];
   $password = $_POST['password'];
   $newpassword = $_POST['newpassword'];
   $confirm_new = $_POST['confirm_new'];

   $conn = new mysqli($servername, $username, $password, $dbname);

   if ($conn->connect_error) {
      die("Connection failed" . $conn->connect_error);
   }

  $sql = "SELECT * FROM tutor WHERE username='$username'";

  $result = $conn->query($sql);

  if($result->num_rows == 0) {   //If rows with this name is not found
      $_SESSION['error'] = 'username is not in system';
      header("location:update-password.php");             
  }
  else if ($newpassword != $confirm_new) {
      $_SESSION['error'] = 'Passwords do not match';
      header("location:update-password.php");
  }
  else {
      $sql = "UPDATE tutor SET password='$newpassword' WHERE username='$username'";
  }

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  }    
  $conn->close();    

?>

