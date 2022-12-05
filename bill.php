<?php 

    require 'dbcon.php';
    $date = date('Y-m-d');
    $time = date("h:i");
    session_start();
    $ex_id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM express WHERE ex_id = '$ex_id'");
    $fetch = mysqli_fetch_assoc($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 75%;
    }
    h2, h5,h4, h3, p{
        text-align: center;
    }
    td,th {
        border: 1px solid #000;
        text-align: center;
        padding: 15px;
    }
    .my-table {
        text-align: right;
    }
    .sender {
        text-align: left;
    }
    .button {
        background-color: gray;
        border: none;
        padding: 15px 32px;
        color: #ffff;
    }
    .center {
        margin-left: auto;
        margin-right: auto;
    }
</style>
<body>
    <h2>A&C Express Bill</h2>
    <p>
        วันที่ <?= $date ?> เวลา: <?= $time?>
    </p>
    <table class="center">
        
        <h3>เลขค้นหาพัสดุ :<?= $fetch['ex_name']?></h3>
        <h4>ชื่อผู้รับ :</h4>
        <thead>
            <th colspan="4"><h3>รายการ</h3></th>
            <tr>
                <th colspan="4" class="sender">ชื่อผู้รับ : <?= $fetch['send_name']?></th>
            </tr>
        </thead >
        <thead>
            <th>ภาชานะ</th>
            <th>ต้นทาง</th>
            <th>ปลายทาง</th>
            <th>ราคา</th>
        </thead>
        <tbody>
            <td><?= $fetch['ex_type']?></td>
            <td><?= $fetch['ex_origin']?></td>
            <td><?= $fetch['ex_des']?></td>
            <td><?= $fetch['ex_price']?></td>
        </tbody>

        <tr>
            <th colspan="3" class="my-table">ภาษีมูลค่าเพิ่ม 7%</th>
            <?php $vat = number_format($fetch['ex_price']*1.07)?>
            <th><?= $vat?></th>
        </tr>
        <tr>
            <th colspan="3" class="my-table">ยอดที่ชำระ :</th>
            <th><?= $vat?></th>
        </tr>
        <tr>
            <th colspan="3" class="my-table">ชื่อพนักงานผู้ให้บริการ</th>
            <th>
                <?php 
                    $em_id = $fetch['em_id'];
                    if(!empty($em_id)) {
                        $check = mysqli_query($conn,"SELECT * FROM employee WHERE em_id = '$em_id'");
                        $em_f = mysqli_fetch_assoc($check);

                ?>
                <?= $em_f['em_name'];?>
                <?php 
                    }else {
                ?>
                    กำลังดำเนินการ
                <?php     }
                ?>
            </th>
        </tr>
        <tr>
            <th colspan="3" class="my-table">เบอร์โทรผู้รับ : </th>
            <th>0630803645</th>
        </tr>
    </table>
    <br>
    <button type="button" id="print" class="button">ปริ้น</button>
    
    <script>
                    const printBtn = document.getElementById('print');

                    printBtn.addEventListener ('click', function() {
                        print();
                    })
    </script>
    
</body>
</html>