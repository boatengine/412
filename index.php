<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    
    <?php 
        session_start();
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
            <h1>รายการค่าทำเนียม</h1>
            <br>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia, minima nesciunt accusamus sit tenetur exercitationem. Repellendus molestias iure fugiat veritatis cupiditate dignissimos architecto aliquam. Accusamus, doloremque voluptatem officiis corporis eaque consequatur quod ullam repudiandae exercitationem deleniti dolore dignissimos est commodi id cumque libero. Labore aperiam quibusdam magni corporis sequi, quos repellendus quae nemo incidunt quam quo quia, repudiandae similique deserunt dignissimos necessitatibus nisi architecto amet iure commodi? Odit quo laborum vitae id reiciendis accusantium voluptates iure nam similique necessitatibus culpa at labore dolorum qui optio accusamus sit officiis consectetur in aliquid, officia sed! Deserunt, dolore. Labore a aliquam adipisci sit?

            </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>