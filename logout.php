<?php 
    require 'dbcon.php';
    session_start();
    unset($_SESSION['success']);
    unset($_SESSION['error']);
    unset($_SESSION['user_id']);
    unset($_SESSION['em_id']);
    header("location: index.php");

?>