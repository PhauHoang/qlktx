		<h6 class="text-center">Thêm Sinh viên Mới</h6>
<table class="table table-hover text-center ">
	<form action="quanlysinhvien/xuly.php" method="get" accept-charset="utf-8">
		<thead>
			<tr>
				<th>Mã SV</th><th>Họ Tên</th><th>Ngày Sinh</th><th>Giới  Tính</th><th>Địa Chỉ</th><th>SĐT</th><th>Lớp</th><th>Khoa</th><th>Mật Khẩu</th><th>#</th>
			</tr>
		</thead>
		<tbody>
	
				
				<tr>
					<td><input class="form-control form-control-sm" type="text"  name="masv" required /></td>
					<td><input  class="form-control form-control-sm" type="text" name="ten" required /></td>
					<td><input  class="form-control form-control-sm" type="date" name="ns" required /></td>
					<td><input  class="form-control form-control-sm" type="text" name="gt" required /></td>
					<td><input  class="form-control form-control-sm" type="text" name="dc" required /></td>
					<td><input  class="form-control form-control-sm" type="text" name="sdt" required /></td>
					<td><input  class="form-control form-control-sm" type="text" name="lop" required /></td>
					<td><input  class="form-control form-control-sm" type="text" name="khoa" required /></td>
					<td><input  class="form-control form-control-sm" type="text" name="mk" required /></td>
					<input name="action" value="them" type="hidden">
					<td><button  class="btn-sm btn-success btn" name="submit_add_student" type="submit">Thêm sinh viên</button></td>
				</tr>	
		</tbody>
</table>
</form>	<br><hr>