 <?php 
if (isset($_SESSION['sv_login'])) {
    $sv=$_SESSION['sv_login'];
    $masv=$sv['MaSV'];
    
    
    
    
    $sql="select * from sinhvien where MaSV=$masv";
    $rs=mysqli_query($conn,$sql);
    $row_gt=mysqli_fetch_array($rs);
    if ($row_gt['GioiTinh'] == 'Nam')
    {
        $sql1="select MaKhu from khu where Sex='Nam'";
	    $rs1=mysqli_query($conn,$sql1);
	    $Khu = [];
	    while($row = mysqli_fetch_assoc($rs1))
	    {
	        array_push($Khu, $row['MaKhu']);
	    }
    } else if ($row_gt['GioiTinh'] == 'Nu')
    {
        $sql1="select MaKhu from khu where Sex='Nu'";
	    $rs1=mysqli_query($conn,$sql1);
	    $Khu = [];
	    while($row = mysqli_fetch_assoc($rs1))
	    {
	        array_push($Khu, $row['MaKhu']);
	    }
    } else {
        // null gioi tinh
    }
    
    
    $sql2="select * from chitietdangky where MaSV=$masv";
    $rs2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($rs2);
    
    
    
    
    
    
    
    
    
    
    
    
//?>
    <div class="cart">
      <div class="col-sm-12  mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
          <h5 class="card-title text-center">Đăng Ký Phòng KÝ TÚC XÁ</h5><hr>

           <form class="col-md-12 m-auto" action="xuly/main.php?action=dangkychuyenphong" method="POST">
              <div class="form-row">
                 <div class="form-group col-sm-4">
                    <label for="myEmail">Mã sinh viên</label>
                    <input type="text" class="form-control"   value="<?php echo $row_gt['MaSV'] ?>" disabled>
                    <input hidden class="form-control" name="masv"  value="<?php echo $row_gt['MaSV'] ?>">
                 </div>
                 <div class="form-group col-sm-4">
                    <label for="myPassword">Họ và tên</label>
                    <input type="text" class="form-control" id="myPassword"  value="<?php echo $row_gt['HoTen'] ?>" disabled>
                 </div>
                 <div class="form-group col-sm-4">
                    <label for="phong">Phòng Đang Ở</label>
                    <input type="text" class="form-control"  value="<?php echo $row2['MaPhong'] ?>" disabled>
                    <input hidden class="form-control" name="phongdo" value="<?php echo $row2['MaPhong'] ?>" >
                 </div>
              </div><hr>
              <?php
              if (!isset($row2['MaPhong']) || $row2['TinhTrang'] == 'chưa duyệt')
              {
                  die('
                  
                  <div class="form-group">
                        <h3> Bạn chưa đăng ký phòng ở hoặc chưa được duyệt!</h3>
                  </div>
                  ');
              }
              
              ?>
              <div class="form-group">
                  <label>Chọn phòng: </label>
                  <select id="chonphong" name="maphongchuyen">
                      <?php
                        if (count($Khu) > 0)
                        {
                            foreach ($Khu as $Khu2)
                            {
                                
                            
                            $queryallphong = "select * from phong where SoNguoiHienTai < SoNguoiToiDa and MaKhu='$Khu2'";
                            $thongtinphong = mysqli_query($conn, $queryallphong);
                        
                        while($row = mysqli_fetch_assoc($thongtinphong))
                        {
                        ?>
                      <option value="<?=$row['MaPhong']?>">Phòng <?=$row['MaPhong']?>, Khu <?=$row['MaKhu']?>, Số người tối đa <?=$row['SoNguoiToiDa']?>, Số người hiện tại <?=$row['SoNguoiHienTai']?></option>
                      <?php        }
                            
                            }
                        } else {
                            $queryallphong = "select * from phong where SoNguoiHienTai < SoNguoiToiDa";
                            $thongtinphong = mysqli_query($conn, $queryallphong);
                            while($row = mysqli_fetch_assoc($thongtinphong))
                        {
                        ?>
                      <option value="<?=$row['MaPhong']?>">Phòng <?=$row['MaPhong']?>, Khu <?=$row['MaKhu']?>, Số người tối đa <?=$row['SoNguoiToiDa']?> Số người hiện tại <?=$row['SoNguoiHienTai']?>?></option>
                      <?php        }
                        }
                      
                      ?>
                    </select>
                
              
              </div>
              <!--<div class="form-group">-->
              <!--   <label for="inputAddress">Chọn số người ở trong 1 phòng :</label>-->
              <!--       <div class="custom-control custom-checkbox" style="margin-left: 30px;">-->
              <!--          <input type="radio" class="custom-control-input" id="customCheck1" value="4" name="sno" checked>-->
              <!--          <label class="custom-control-label" for="customCheck1"><h5> Phòng 4 Người</h5></label>-->
              <!--      </div>-->
              <!--      <div class="custom-control custom-checkbox" style="margin-left: 30px;">-->
              <!--          <input type="radio" class="custom-control-input" id="customCheck2" value="6" name="sno"  >-->
              <!--          <label class="custom-control-label" for="customCheck2"><h5>Phòng 6 Người</h5></label>-->
              <!--      </div>-->
              <!--      <div class="custom-control custom-checkbox" style="margin-left: 30px;">-->
              <!--          <input type="radio" class="custom-control-input" id="customCheck3" value="8" name="sno"  >-->
              <!--          <label class="custom-control-label" for="customCheck3"><h5>Phòng 8 Người</h5></label>-->
              <!--      </div>-->
              <!--</div>-->
               <div class="form-row">
                 <div class="form-group col-sm-12">
                    <label for="masv">Lý do muốn chuyển</label>
                    <textarea class="form-control" style="min-height: 110px;" name="lydo" required></textarea>
                 </div>
              </div>
              <div class="form-group">
                 <label for="inputAddress2"><span style="color: red;font-size: 20px;">*</span>Lưu ý :</label>
                 <label>Hệ thống sẽ tự động chọn phòng cho bạn theo yêu cầu trên. Hệ thống sẽ gửi thông báo sau!</label>
              </div>
              <hr>
              <div class="form-group">
                <table class="table text-center badge-light">
                  <caption>Thông tin giá phòng</caption>
                  <thead class="badge-info">
                    <tr>
                      <th>#</th><th>Học Kỳ</th><th>Phòng khu A </th><th>Phòng khu B </th><th>Phòng khu K </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <td>1 </td><td>1 & 2</td><td>500,000đ</td><td>600,000đ</td><td>640,000đ</td>
                    </tr>
                    <tr>
                       <td>2</td><td>HÈ</td><td></td><td></td><td>600,000đ</td>
                    </tr>
                  </tbody>
                </table>
              </div><hr>
              <button type="submit" name="dangkychuyenphong" class="btn btn-lg btn-primary btn-block text-uppercase ">Đăng ký chuyển phòng</button>
           </form></div>
         </div>
       </div>
     </div>
<?php 


}
else{
    header('location:index.php?action=login');
}
?>