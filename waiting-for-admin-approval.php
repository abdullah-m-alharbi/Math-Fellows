<?php
    /*** Abdullah Alharbi ***/
    session_start();	
    include('tutor-header.php');
    
    if ($_SESSION['user_type'] !== 3){
        header('location:do-sign-out.php');
    }
?>

<body>
  <div class="container">
    <div class="instructions_msg">
      <div class="msg">
        Your request has been submitted. Please wait for an admin approval before you see any changes.
      </div>
    </div>
  </div>
</body>
</html>