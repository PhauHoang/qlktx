<?php 
	$sql="select *from sinhvien";
	$rs=mysqli_query($conn,$sql);
?>


		<table class="table table-hover text-center ">
		<thead>
			<tr>
				<th>Mã SV</th><th>Họ Tên</th><th>Ngày Sinh</th><th>Giới Tính</th><th>Địa Chỉ</th><th>SĐT</th><th>Lớp</th><th>Khoa</th><th colspan="2">#</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row=mysqli_fetch_array($rs)) {?>
				<form action="quanlysinhvien/xuly.php" method="get" accept-charset="utf-8">
				<tr>
					<td><?php echo $row['MaSV'] ?></td><input hidden name="masv" value="<?php echo $row['MaSV'] ?>">
					<td><input class="form-control form-control-sm" type="text" name="ten" value="<?php echo $row['HoTen'] ?>"></td>
					<td><input  class="form-control form-control-sm" type="date" name="ns" value="<?php echo $row['NgaySinh'] ?>"></td>
					<td><input  class="form-control form-control-sm" type="text" name="gt" value="<?php echo $row['GioiTinh'] ?>"></td>
					<td><input  class="form-control form-control-sm" type="text" name="dc" value="<?php echo $row['DiaChi'] ?>"></td>
					<td><input  class="form-control form-control-sm" type="text" name="sdt" value="<?php echo $row['SDT'] ?>"></td>
					<td><input  class="form-control form-control-sm" type="text" name="lop" value="<?php echo $row['Lop'] ?>"></td>
					<td><input  class="form-control form-control-sm" type="text" name="khoa" value="<?php echo $row['Khoa'] ?>"></td>
					<input name="action" value="capnhat" type="hidden" />
					<input name="redirect" value="action=sinhvien&view=all" type="hidden" />
					<td><button  class="btn-sm btn-success btn" name="submit" type="submit">Cập nhật</button></td>
					<td><a href="quanlysinhvien/xuly.php?action=xoa&masv=<?php echo $row['MaSV'] ?>"><i class="fas fa-backspace"></i></a></td>
				</tr>
				</form>	
	<?php	} ?>
			
		</tbody>
	</table>
	
