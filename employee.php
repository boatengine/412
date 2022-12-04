<?php 

    require 'dbcon.php';
    session_start();
    if(!isset($_SESSION['em_id'])){
        header("location: index.php");
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

    <?php
        if(isset($_SESSION['success'])) {
            
        
    ?>
    <div class="alert alert-success" role="alert">
        <p><?php echo $_SESSION['success'];
                    unset($_SESSION['success']);?></p>
    </div>
    <?php }?>
    <?php
        if(isset($_SESSION['error'])) {
            
        
    ?>
    <div class="alert alert-danger" role="alert">
        <p><?php echo $_SESSION['error'];
                    unset($_SESSION['error']);?></p>
    </div>
    <?php }?>

    <div class="container mt-3">
        <h1>พนักงาน</h1>
        <h3 class="text-danger">ต้องอ่าน <span class="text-dark">หากพัสดุขึ้นว่า **รอดำเนินการ** พนักงานต้องเข้าไปอัพเดทข้อมูล</span></h3>
        <hr>
        <table class="table">
            <thead>
                <th>ไอดี</th>
                <th>เลขค้นหาพัสดุ</th>
                <th>ต้นทาง</th>
                <th>ปลายทาง</th>
                <th>วันที่ส่ง</th>
                <th>วันที่ถึง</th>
                <th>เบอร์โทรผู้รับ</th>
                <th>รหัสพนักงาน</th>
                <th>ชนิดภาชานะ</th>
                <th>ราคา</th>
                <th>ชื่อผู้ส่ง</th>
                <th>สถานะ</th>
                <th>อัพเดท</th>
                <th>ลบ</th>
            </thead>
            <?php 
                    $sql = mysqli_query($conn,"SELECT * FROM express");
                    while($fetch = mysqli_fetch_assoc($sql)){  
                ?>
            <tbody>
                
                <td><?= $fetch['ex_id']; ?></td>
                <td><?= $fetch['ex_name']; ?></td>
                <td><?= $fetch['ex_origin']; ?></td>
                <td><?= $fetch['ex_des']; ?></td>
                <td><?= $fetch['ex_date']; ?></td>
                <td><?= $fetch['ex_date_to']; ?></td>
                <td><?= $fetch['ex_tel']; ?></td>
                <td><?= $fetch['ex_id']; ?></td>
                <td><?= $fetch['ex_type']; ?></td>
                <td><?= $fetch['ex_price']; ?></td>
                <td><?= $fetch['send_name']; ?></td>
                <td><?php 
                    if($fetch['status'] == '1'){
                ?>
                    <span class="text-info">กำลังดำเนินการ</span>
                <?php
                    }elseif ($fetch['status'] == '2'){
                 ?>
                    <span class="text-warning">กำลังนำส่ง</span>
                 <?php }else {?>
                    <span class="text-success">นำส่งสำเร็จ</span>
                <?php }?>
                </td>
                <td><a href="em_edit.php?id=<?= $fetch['ex_id']?>" class="btn btn-info">อัพเดท</a></td>
                <td><a href="em_delete.php?id=<?= $fetch['ex_id']?>" class="btn btn-danger">แก้ไข</a></td>
            </tbody>
            <?php }?>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>