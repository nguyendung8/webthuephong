<?php
   //đăng ksy tài khoản người dùng
   include 'config.php';

   if(isset($_POST['submit'])){

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);
      $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
      $school = mysqli_real_escape_string($conn, $_POST['school']);
      $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
      $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
      $user_type = 'user';

      $select_students = mysqli_query($conn, "SELECT * FROM `students` WHERE email = '$email'") or die('query failed');

      if(mysqli_num_rows($select_students) > 0){//kiểm tra email đã tồn tại chưa
         $message[] = 'Tài khoản đã tồn tại!';
      }else{//chưa thì kiểm tra mật khẩu xác nhận và tạo tài khoản
         if($pass != $cpass){
            $message[] = 'Mật khẩu không khớp!';
         }else{
            mysqli_query($conn, "INSERT INTO `students`(name, email, password, phone_number, address, school, user_type) VALUES('$name', '$email', '$cpass', '$phone_number', '$address','$school', '$user_type')") or die('query failed');
            $message[] = 'Đăng ký thành công!';
            header('location:login.php');
         }
      }

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng ký</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Đăng ký</h3>
      <input type="text" name="name" placeholder="Nhập họ tên" required class="box">
      <input type="email" name="email" placeholder="Nhập email" required class="box">
      <input type="password" name="password" placeholder="Nhập mật khẩu" required class="box">
      <input type="password" name="cpassword" placeholder="Nhập lại mật khẩu" required class="box">
      <input type="text" name="address" placeholder="Nhập địa chỉ" required class="box">
      <input type="text" name="phone_number" placeholder="Nhập số điện thoại" required class="box">
      <input type="text" name="school" placeholder="Nhập tên trường" required class="box">
      <input type="submit" name="submit" value="Đăng ký ngay" class="btn">
      <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
   </form>

</div>

</body>
</html>