<?php
   //nhúng vào các trang quản trị
   if(isset($message)){
      foreach($message as $message){//in ra thông báo trên cùng khi biến message được gán giá trị từ các trang quản trị
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>';
      }
   }
?>

<header class="header">

   <div class="flex">

      <a href="admin_rooms.php" class="logo">Quản lý</a>

      <nav class="navbar">
         <a href="admin_rooms.php">Phòng</a>
         <a href="admin_category.php">Loại phòng</a>
         <a href="admin_hired.php">Phiếu đặt phòng</a>
         <a href="admin_users.php">Người dùng</a></a>
         <a href="admin_contacts.php">Tin nhắn</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>Tên người dùng : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">Đăng xuất</a>
         <div><a href="login.php">Đăng nhập</a> | <a href="register.php">Đăng ký</a></div>
      </div>

   </div>

</header>