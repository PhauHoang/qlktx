<?php
// ini_set('display_errors', 0);
// error_reporting(E_ERROR | E_WARNING | E_PARSE); 
 header("Content-type: text/html; charset=utf-8");
 $tenmaychu='localhost';
 $tentaikhoan='root';
 $pass='';
 $csdl='qlktx';
 $conn=mysqli_connect($tenmaychu, $tentaikhoan, $pass, $csdl) or die('Không phải tại bạn, lỗi tại chúng tôi :))) ');
 mysqli_select_db($conn,$csdl);
 mysqli_query($conn,"SET NAMES 'UTF8'");
?>
