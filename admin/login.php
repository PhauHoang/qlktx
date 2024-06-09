<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/shoponi/view/bootstrap4/css/bootstrap.css">
    <script src="/shoponi/jquery/jquery.js"></script>
    <script src="/shoponi/view/bootstrap4/js/bootstrap.js"> </script>
    <title></title>
    <style>
        body {
            background-image: url('https://tnut.edu.vn/uploads/art/files/202210/1020/3.jpg');
            background-size:cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
        }
        .login {
            text-align: center;
            margin-top: 50px;
        }
        .nenbac {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-control {
            border-radius: 0;
        }
        .btn-danger {
            border-radius: 0;
            width: 100%;
        }
        button:hover{
          background-color: #00c2ff;
          transform: scale(0.97);
          transition: 0.2s ease-in-out;
          color: #f5f5f5;
          font-weight: bold;
          cursor: pointer;
        }
        input{
          border: 0.5px solid #00c2ff;
          outline: none;
        }
  </style>
</head>
<body>

  <div class="login">
    </div>
    <div class="login2">
      <center>
    <div class="container" style="margin-top: 180px;"> 
 <div class="row-fluid"> 
  <div class="col-md-offset-4 col-md-4 nenbac" style="width: 500px;" id="box" > 
   <h2>ĐĂNG NHẬP VỚI QUYỀN QUẢN TRỊ VIÊN</h2> 
   <hr> 
   <form class="form-horizontal" action="" method="post" id="login_form" > 
    <fieldset style="border: none;"> 
     <div class="form-group"> 
      <div class="col-md-12"> 
       <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
        <input style="height: 30px; padding-left: 10px;" name="email" placeholder="Mã Nhân viên" class="form-control" type="text" required autofocus> 
       </div> 
      </div> 
     </div> 
     <br>
     <div class="form-group"> 
      <div class="col-md-12"> 
       <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
        <input style="height: 30px; padding-left: 10px;" name="pass" placeholder="Mật khẩu" class="form-control" type="password" required> 
       </div> 
      </div> 
     </div> 
     <div class="form-group"> 
      <div class="col-md-12"> 
        <hr><p> <a href="dangky.php" style="font-size: 12px;"> Chưa có tài khoản. Đăng ký</a></p>
       <button type="submit" name="login" class="btn btn-md btn-danger pull-right" style="width: 300px; height: 30px; border: none; border-radius: 20px;">ĐĂNG NHẬP </button> 
      </div> 
     </div> 
    </fieldset> 
   </form> 
  </div> 
 </div>
</div>
  </center>
</div>
<?php
 include_once('../config/database.php');
  @session_start();
   // check đăng nhập
  if (isset($_SESSION['nv_admin'])) {
     header('location:index.php');
  }
  if(isset($_POST['login'])){
    $email=$_POST['email'];
    $_SESSION['MaNV']  = $email;
    $matkhau=$_POST['pass'];
    $sql_dangnhap="select * from nhanvien where  MaNV ='$email' and MatKhau='$matkhau'";
    $run_dangnhap=mysqli_query($conn,$sql_dangnhap);
    $dangnhap=mysqli_fetch_array($run_dangnhap);
    // print_r($run_dangnhap);
    // die;
    $count_dangnhap=mysqli_num_rows($run_dangnhap);
    if($count_dangnhap==0){
      echo '<script>alert("Sai tài khoản hoặc mật khẩu ! Xin mời nhập lại .")</script>';
    }else{
      $_SESSION['nv_admin']=$dangnhap;
      
                      
      header('location:index.php');
      
    }
                
  }
?>
</body>
</html>