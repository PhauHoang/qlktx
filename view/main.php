<h1 style="font-size: 20px;"> Trang Ký Túc Xá - TRƯỜNG ĐẠI HỌC KỸ THUẬT CÔNG NGHIỆP </h1>
<?php if (isset($_SESSION['sv_login'])) {
		$vs=$_SESSION['sv_login'];
		echo "<h6>Xin chào sinh viên : ".$vs['HoTen']."</h6>";
} ?>
