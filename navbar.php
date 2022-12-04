<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><span class="text-danger">A&C</span>EXPRESS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link" href="index.php">หน้าแรก</a>
              </li>
              
              
              <li class="nav-item">
                <a class="nav-link" href="search.php">ค้นหาพัสดุ</a>
              </li>
              <?php 
                if(isset($_SESSION['user_id'])) {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="send.php">ส่งพัสดุ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewexpress.php">พัสดุของคุณ</a>
              </li>
              <?php }elseif(isset($_SESSION['em_id'])) {?>
              <li class="nav-item">
                <a class="nav-link" href="employee.php">ระบบพนักงาน</a>
              </li>
              <?php }?>
              
              
            </ul>
            <form class="d-flex" role="search">

            </form>
            &nbsp;
            <?php 
                require 'dbcon.php';
                if(isset($_SESSION['user_id'])){
                    $user_id = $_SESSION['user_id'];
                    $check = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");
                    $fetch = mysqli_fetch_assoc($check);
                
                
            ?>
            <h5>สวัสดีคุณ<b><?= $fetch['fullname']; ?></b></h5>
            &nbsp;
            <a href="logout.php" class="btn btn-danger">Logout</a>
            <?php }else if(isset($_SESSION['em_id'])) {?>
            <a href="logout.php" class="btn btn-danger">Logout</a>
            &nbsp;
            <?php }else {?>
            <a href="login.php" class="btn btn-primary">Login</a>
            <?php }?>
        </div>
        </div>
      </nav>