<?php
  	date_default_timezone_set('Asia/Ho_Chi_Minh');
  	$date=getdate(); $ngay=$date['year']."-".$date['mon']."-".($date['mday']);
if(isset($_POST['dangkychuyenphong'])){
	$masv=$_POST["masv"];
	$sql1="select MaSV,MaDK,MaPhong,NgayDangKy from chitietdangky where MaSV=$masv and (MaNV is not null and NgayDangKy is not null and TinhTrang='đã duyệt' and NgayTraPhong is null)";
	$rs1=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array($rs1);
	$madk=$row['MaDK'];
//     $sql="select * from chitietchuyenphong where MaSV=$masv and  TinhTrang='đã duyệt' or TinhTrang is NULL";
// 	$rs=mysqli_query($conn,$sql);
  	$dem=mysqli_num_rows($rs1);
  	$map1=$row['MaPhong'];
    $ngaydangky = $row['NgayDangKy'];
    // echo $ngaydangky;
    // die;
//   	echo $dem;
//   	die;

    $check_row_chuyenp="select * from chitietchuyenphong where MaSV=$masv and  TinhTrang='chưa duyệt'";
    $check_row_chuyenp_load = mysqli_query($conn, $check_row_chuyenp);
  	$dem_row_chuyenp = mysqli_num_rows($check_row_chuyenp_load);
    if ($dem_row_chuyenp > 0 )
    {
        echo '
			    <script>
			    alert("Bạn đang có 1 yêu cầu chuyển phòng trước đó! Vui lòng chờ nhân viên xác thực");
			    window.location.href="/index.php?action=chuyenphong";
			    </script>';
			    die;
    }
    if($dem>0)
    {
		$masv=$_POST["masv"];
		$sno=$_POST['sno'];
		$lydo=$_POST['lydo'];
		$pdo=$_POST['phongdo'];
		$maphongchuyen = $_POST['maphongchuyen'];
		
		if ($pdo == $maphongchuyen)
		{
		    echo '
			    <script>
			    alert("Không được chọn phòng đang ở. Vui lòng chọn lại!");
			    window.location.href="/index.php?action=chuyenphong";
			    </script>';
			    die;
		}
		$ngaychuyen = date('Y-m-d H:i:s');
// 		die('ccc');
		$sql3 = "INSERT INTO `chitietchuyenphong` (`MaDK`, `MaSV`, `MaPhongChuyen`, `MaPhongO`, `Lydo`, `TinhTrang`, `NgayChuyen`, `NgayDangKy`, `LanChuyen`) VALUES ('$madk', '$masv', '$maphongchuyen', '$pdo', '$lydo', 'chưa duyệt', '$ngaychuyen', '$ngaydangky', '1')";
// 		$sql3="UPDATE chitietchuyenphong set MaPhongO='$map1', MaPhongChuyen='$maphong',Lydo='$lydo', TinhTrang='chưa duyệt', NgayDangKy='$ngay', LanChuyen=(LanChuyen+1) where MaDK='$madk'";
	    $rs3=mysqli_query($conn, $sql3);
	   //  echo mysqli_error($conn);
	   //     die;
	    if($rs3){
	       
	   // 	$sql4="UPDATE  `phong` set `SoNguoiHienTai`=(`SoNguoiHienTai`+1) where MaPhong='$map'";
	   // 	$rs4=mysqli_query($conn,$sql4);
	    	echo '
			    <script>
			    alert("Đăng ký thành công");
			    window.location.href="/index.php?action=chuyenphong";
			    </script>';
			    die;
	    } else {
	        echo '
			    <script>
			    alert("Đăng ký thất bại");
			    window.location.href="/index.php?action=chuyenphong";
			    </script>';
			     die;
	    }
		
		
		
//check giới tính để tìm khu theo giới tính 
		$sql="select * from sinhvien where MaSV=$masv";
	    $rs=mysqli_query($conn,$sql);
	    $row=mysqli_fetch_array($rs);
	    if($row['GioiTinh']==='Nam'){
//tìm khu theo giới tính Nam
	    	$sql1="select MaKhu from khu where Sex='Nam'";
	    	$rs1=mysqli_query($conn,$sql1);
	    	$row1=mysqli_fetch_array($rs1);
	    	$makhu=$row1['MaKhu'];
//      	echo $makhu;
// Tìm phòng cho sinh viên   	
			$sql2="SELECT  MaPhong  from phong where MaKhu = '$makhu' and MaPhong !='$pdo' and SoNguoiToiDa = $sno and (SoNguoiHienTai<SoNguoiToiDa ) ORDER BY SoNguoiHienTai DESC LIMIT 1";
			$rs2=mysqli_query($conn,$sql2);
	    	$row2=mysqli_fetch_array($rs2);
	    
	    	$map=$row2['MaPhong'];
// thêm sinh viên vào phòng và update số người trong phòng
	    	$sql3="UPDATE chitietchuyenphong set MaPhongO='$map1', MaPhongChuyen='$map',Lydo='$lydo', TinhTrang=N'chưa duyệt', NgayDangKy='$ngay', LanChuyen=(LanChuyen+1) where MaDK='$madk'";
	    	$rs3=mysqli_query($conn,$sql3);
	    	if($rs3){
	    		$sql4="UPDATE  `phong` set `SoNguoiHienTai`=(`SoNguoiHienTai`+1) where MaPhong='$map'";
	    		$rs4=mysqli_query($conn,$sql4);
	    		header('location:../index.php?action=&tb=ok1');
	    	}
	    }elseif ($row['GioiTinh']==='Nu') {
//tìm khu theo giới tính Nữ
	    	$sql1="select MaKhu from khu where Sex='Nu'";
	    	$rs1=mysqli_query($conn,$sql1);
	    	$row1=mysqli_fetch_array($rs1);
	    	$makhu=$row1['MaKhu'];
       	echo $makhu;
// Tìm phòng cho sinh viên   	
			$sql2="SELECT  MaPhong  from phong where MaKhu = '$makhu'  and MaPhong !='$pdo' and SoNguoiToiDa = $sno and (SoNguoiHienTai<SoNguoiToiDa ) ORDER BY SoNguoiHienTai DESC LIMIT 1";
			$rs2=mysqli_query($conn,$sql2);
	    	$row2=mysqli_fetch_array($rs2);
	    	
	    	$map=$row2['MaPhong'];
// thêm sinh viên vào phòng và update số người trong phòng
	    	$sql3="UPDATE chitietchuyenphong set MaPhongO='$map1', MaPhongChuyen='$map',Lydo='$lydo', TinhTrang=N'chưa duyệt', NgayDangKy='$ngay', LanChuyen=(LanChuyen+1) where MaDK='$madk'";
	    	$rs3=mysqli_query($conn,$sql3);
	    	if($rs3){
				$sql4="UPDATE  `phong` set `SoNguoiHienTai`=(`SoNguoiHienTai`+1) where MaPhong='$map' ";
	    		$rs4=mysqli_query($conn,$sql4);
	    		header('location:../index.php?action=&tb=ok1');
	    	}
	    }

    } else {
	header('location:../index.php?action=&tb=loi');
}
}
