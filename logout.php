<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

  <?php
// remove all session variables
  session_unset(); 

// destroy the session 
  session_destroy(); 
  header('Location: '.'http://127.0.0.1/edsa-IPPI/hiba/loginpage.php?logout=success');
  ?>

</body>
</html>
