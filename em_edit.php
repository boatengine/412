<?php 

    require 'dbcon.php';
    session_start();
    if(!isset($_SESSION['em_id'])){
        header("location: index.php");
    }
    if(isset($_POST['edit_express'])){
        $ex_id_up = $_POST['ex_id_up'];
        $ex_name = $_POST['ex_name'];
        $ex_date_to = $_POST['ex_date_to'];
        $status = $_POST['status'];

        $insert = mysqli_query($conn, "UPDATE express SET 
                        ex_name = '$ex_name',
                        ex_date_to = '$ex_date_to',
                        status = '$status' WHERE ex_id = '$ex_id_up'");
        if($insert) {
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
    <title>พนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    
    <?php 
        require 'navbar.php';
    ?>

    <div class="container mt-3">
        <h1>พนักงาน</h1>
        <h3 class="text-danger">ต้องอ่าน <span class="text-dark">พนักงานต้อง เพิ่ม **เลขค้นหาพัสดุ**  อัพเดทสถานะ และเพิ่ม id พนักงาน </span></h3>

        <form action="em_edit.php" method="POST">
            <?php
                $ex_id = $_GET['id'];
                $sql = mysqli_query($conn, "SELECT * FROM express WHERE ex_id = '$ex_id'");
                $fetch = mysqli_fetch_assoc($sql);
                
            ?>
            <div class="form-group">
                <label for="">เลขค้นหาพัสดุ</label>
                <input type="text" name="ex_name" required class="form-control" value="<?= $fetch['ex_name'];?>">
            </div>
            <div class="form-group">
                <label for="">เลขค้นหาพัสดุ</label>
                <input type="date" name="ex_date_to" required class="form-control" value="<?= $fetch['ex_date_to'];?>">
            </div>
            <div class="form-group">
                <h4>สถานนะ</h4>

                <label for="form-check-label">กำลังนำส่ง</label>
                <input type="radio" name="status" class="form-check-input" value="2">
                <label for="form-check-label">ส่งสำเร็จ</label>
                <input type="radio" name="status" class="form-check-input" value="3">
            </div>
            <br>
            <hr>
            <br>
            <input type="hidden" name="ex_id_up" value="<?= $ex_id ?>">
            <div class="form-group">
                <label for="">ชื่อผู้ส่ง</label>
                <input type="text" name="send_name" disabled readonly class="form-control" value="<?= $fetch['send_name']; ?>">
            </div>
            <div class="form-group">
                <label for="">ชนิดภาชานะ</label>
                <input type="text" name="type" disabled readonly class="form-control" value="<?= $fetch['ex_type']; ?>">
            </div>
            <div class="form-group">
                <label for="">ต้นทาง</label>
                <input type="text" name="send" disabled readonly class="form-control" value="<?= $fetch['ex_origin']; ?>">
            </div>
            <div class="form-group">
                <label for="">ปลายทาง</label>
                <input type="text" name="send_to" disabled readonly class="form-control" value="<?= $fetch['ex_des']; ?>">
            </div>
            <div class="form-group">
                <label for="">เบอร์โทรผู้รับ</label>
                <input type="text" name="tel" disabled readonly class="form-control" value="<?= $fetch['ex_tel']; ?>">
            </div>
            <button type="submit" name="edit_express" class="btn btn-warning mt-3">อัพเดท</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>