<?php 
session_start();
include_once('../../config/database.php');
if(isset($_GET['action'])){
	$action=$_GET['action'];
	switch ($action) {
    case 'them':
        $masv=$_GET['masv'];
        $ten=$_GET['ten'];
        $ns=$_GET['ns'];
        $gt=$_GET['gt'];
        $dc=$_GET['dc'];
        $sdt=$_GET['sdt'];
        $mk=$_GET['mk'];
        $lop=$_GET['lop'];
        $khoa=$_GET['khoa'];
        $sql="insert into sinhvien(MaSV,HoTen,NgaySinh,gioiTinh,DiaChi,SDT, Lop, Khoa,MatKhau) values('$masv','$ten','$ns','$gt','$dc','$sdt','$lop', '$khoa', '$mk')" ;
        $rs=mysqli_query($conn,$sql);
        // echo mysqli_error($conn);
        
          if($rs){
                    header('location:../index.php?action=sinhvien&view=all&thongbao=them');
          }
        break;
		case 'capnhat':
  			$masv=$_GET['masv'];
            $ten=$_GET['ten'];
            $ns=$_GET['ns'];
            $gt=$_GET['gt'];
            $dc=$_GET['dc'];
            $sdt=$_GET['sdt'];
            $lop=$_GET['lop'];
            $khoa=$_GET['khoa'];
            $sql="update sinhvien set HoTen='$ten', NgaySinh='$ns',DiaChi='$dc',SDT='$sdt',GioiTinh='$gt', Lop='$lop', Khoa='$khoa' where MaSV='$masv'" ;
            $rs=mysqli_query($conn,$sql);
              if($rs){
              					header('location:../index.php?'.$_GET['redirect'].'');
              }
  			break;  
    case 'xoa':
        $masv=$_GET['masv'];
        $sql="delete from sinhvien where MaSV='$masv'";
        $rs=mysqli_query($conn,$sql);
        if($rs){

               header('location:../index.php?action=sinhvien&view=all&thongbao=xoa');
        }
      break;
     case 'find':
        $tensinhvien = $_GET['tensinhvien'];
        $sql="select * from sinhvien where HoTen like '%$tensinhvien%'";
        $find_success=mysqli_query($conn,$sql);
        // if($rs){

        //     //   header('location:../index.php?action=sinhvien&view=all&thongbao=xoa');
        // }
      break;

		default:
			# code...
			break;
	}
}


?>