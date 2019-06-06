<?php

  /*** Holleigh Landers ***/

  include('customer-header.php');
?>
<body>
    <div class="container">
      
      <!-- Below should be in a php script -->
      <div class="instructions_msg">
      	<div id="msg">
          You're about to cancel your session with 'tutor name'. Please confirm if you would like to proceed...
        </div>
      </div>
      
      <div class="tutor_box">
        <div class="tutor_image">
          <img src="smiley-face-2.jpg" alt="Tutor img">
        </div>
        <div class="tutor_name_box">
          <div class="tutor_name_text">
            'tutor name'
          </div>
        </div>
        <div class="desc_box">
          <div class="desc_text">
            
						<!--  Max of 240 characters -->
            'tutor description'
          </div>
        </div>
      </div>
      <div class="confirm_tutor">
        <form action="cancelled.php" method="post">
          <input class="button" type="submit" value="Confirm"> 
        </form>
      </div>
      
		  </div>
	</body>
</html>