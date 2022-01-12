<?php


  if (session_status() == PHP_SESSION_NONE) {
      session_start();
   }


session_destroy();



echo "<script>
            alert('Successfully Logout' );
            window.location.href ='brs_login.php';
        </script>";
        


?>