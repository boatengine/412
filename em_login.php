<?php 

    require 'dbcon.php';
    session_start();
    if(isset($_POST['btn_login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $check_user = mysqli_query($conn, "SELECT * FROM employee WHERE em_username = '$username' AND em_password = '$password'");
        $row = mysqli_num_rows($check_user);
        $fetch = mysqli_fetch_assoc($check_user);
        
        if($row == 1) {
            $_SESSION['em_id'] = $fetch['em_id'];
            $_SESSION['success'] = 'สำเร็จ';
            header("location: employee.php");
        }else {
            $_SESSION['error'] = 'error';
            header("location: index.php");
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าเข้าสู่ระบบ พนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    
    <?php 
        require 'navbar.php';
    ?>

    <div class="container mt-3">
        <h1>หน้าเข้าสู่ระบบ พนักงาน</h1>
        <hr>
        <form action="em_login.php" method="POST">

            <div class="form-group">
                <label for="">ชื่อผู้ใช้</label>
                <input type="text" name="username" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">รหัสผ่าน</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <button type="submit" name="btn_login" class="btn btn-warning mt-3">เข้าสู่ระบบ พนักงาน</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>