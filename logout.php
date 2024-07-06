<?php 
 session_start();
 session_unset();
 session_destroy();

 include("db.php");

 header("Location: ./authlogin.php?logout=success");