<?php


  if (session_status() == PHP_SESSION_NONE) {
      session_start();
   }

if($_SESSION['username'] == "" && empty($_SESSION['username']))
{
        echo "<script>
                    alert('USER NOT LOGIN!' );
                    window.location.href ='brs_login.php';
                </script>";
}



?>