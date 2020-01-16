<?php

      session_start();
      if(isset($_GET['email'])){
        $_SESSION['valid_user_email'] = $_GET['email'];
      }
      echo $_SESSION['valid_user_email'];
?>