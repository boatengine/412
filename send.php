<?php 

    require 'dbcon.php';
    session_start();
    if(!isset($_SESSION['user_id'])) {
        header("location: index.php");
    }
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['add_express'])) {
        $type = $_POST['type'];
        $send_name = $_POST['send_name'];
        $weight = $_POST['weight'];
        $send = $_POST['send'];
        $send_to = $_POST['send_to'];
        $tel = $_POST['tel'];
    

        switch($type){
            case 1:
                switch($weight){
                    case $weight < 5:
                        $size = 'A';
                        $price =  '20';
                    break;
                    case $weight < 15:
                        $size = 'B';
                        $price =  '30';
                    break;
                    case $weight < 20:
                        $size = 'C';
                        $price =  '40';
                    break;
                    case $weight < 25:
                        $size = 'D';
                        $price =  '50';
                    break;
                    case $weight < 30:
                        $size = 'E';
                        $price =  '60';
                    break;
                }
            break;
        
            case 2:
                switch($weight){
                    case $weight < 5:
                        $size = 'K0';
                        $price =  '20';
                    break;
                    case $weight < 15:
                        $size = 'K1';
                        $price =  '30';
                    break;
                    case $weight < 20:
                        $size = 'K2';
                        $price =  '40';
                    break;
                    case $weight < 25:
                        $size = 'K3';
                        $price =  '50';
                    break;
                }
            break;
            case 3:
                switch($weight){
                    case $weight < 5:
                        $size = 'P0';
                        $price =  '20';
                    break;
                    case $weight < 15:
                        $size = 'P1';
                        $price =  '30';
                    break;
                    case $weight < 20:
                        $size = 'P2';
                        $price =  '40';
                    break;
                    case $weight < 25:
                        $size = 'P3';
                        $price =  '50';
                    break;
                }
            break;
        }
        if($sent_to == "กรุงเทพ"){
            $price += 5;
        }
        $insert = mysqli_query($conn, "INSERT INTO express(user_id,ex_origin,ex_des,ex_tel,ex_type,ex_price,send_name)
        VALUES(
            '$user_id',
            '$send',
            '$send_to',
            '$tel',
            '$size',
            '$price',
            '$send_name')");
        if($insert) {
            $_SESSION['success'] = 'ส่งพัสดุสำเร็จ';
            header("location: index.php");
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
    <title>หน้าส่งพัสดุ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    
    <?php 
        require 'navbar.php';
    ?>

    <div class="container mt-3">
        <h1>หน้าส่งพัสดุ</h1>
        <hr>
        <form action="send.php" method="POST">
            
            <div class="form-group">
                <h4>กรุณาเลือกภาชานะ</h4>
                <label for="">กล่อง</label>
                <input type="radio" name="type"  class="form-radio" value="1">
                <label for="">ซองพลาสติด</label>
                <input type="radio" name="type"  class="form-radio" value="2">
                <label for="">ซองกระดาษ</label>
                <input type="radio" name="type" class="form-radio" value="3">
            </div>
            <br>
            <div class="form-group">
                <label for="">ชื่อผู้ส่ง</label>
                <input type="text" name="send_name" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">น้ำหนัก</label>
                <input type="number" name="weight" required class="form-control" min="0">
            </div>
            <div class="form-group">
                <label for="">ต้นทาง</label>
                <input type="text" name="send" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">ปลายทาง</label>
                <input type="text" name="send_to" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">เบอร์โทรผู้รับ</label>
                <input type="text" name="tel" required class="form-control">
            </div>
            <button type="submit" name="add_express" class="btn btn-warning mt-3">ส่งพัสดุ</button>
        </form>
        <hr>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>