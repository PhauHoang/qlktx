  <?php 
   
    if(isset($_POST['sv_capnhaptt'])){
        $masv = $_POST['masv'] ;
        $ns = $_POST['ns'];
        $dc = $_POST['dc'];
        $sdt = $_POST['sdt'];
        $lop = $_POST['lop'];
        $khoa = $_POST['khoa'];
        if(isset($_POST['pass'])){
          $sql="UPDATE `sinhvien` SET NgaySinh='$ns',DiaChi='$dc',SDT='$sdt', Lop='$lop', Khoa='$khoa' where MaSV=$masv";
          $rs=mysqli_query($conn,$sql);
          if($rs){
            header('location:../index.php?action=capnhapthongtin&tb=ok');

          }else{
            header('location:index.php?action=capnhapthongtin&tb=loi');
           }
        }
      }
  ?>