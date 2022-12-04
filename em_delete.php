<?php 

    require 'dbcon.php';
    session_start();
    $ex_id = $_GET['id'];
    $sql = mysqli_query($conn,"DELETE FROM express WHERE ex_id = '$ex_id'");
    if($sql) {
        $_SESSION['success'] = 'สำเร็จ';
        header("location: employee.php");
    }else {
        $_SESSION['error'] = 'error';
        header("location: employee.php");
    }

?>