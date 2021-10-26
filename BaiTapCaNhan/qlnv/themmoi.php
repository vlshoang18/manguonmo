<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="qlnv.css">

<title>Tìm kiếm </title>
</head>
<body>
<?php 
require('./index.php');
?>

<form action="" method="post"  enctype="multipart/form-data">
<table bgcolor="#5a4c5a" align="center" width="100%" border="0">
<tr bgcolor="gray">
	<td colspan="2" align="center"><font color="black"><h2>THÊM NV MỚI</h2></font></td>
</tr>
<tr>
	<td>Mã NV: </td>
	<td><input type="text" name="manv" size="20" value="<?php if(isset($_POST['manv'])) echo $_POST['manv'];?>" /></td>
</tr>
<tr>
	<td>Họ: </td>
	<td><input type="text" name="HO" size="50" value="<?php if(isset($_POST['HO'])) echo $_POST['HO'];?>" /></td>
</tr>
<tr>
	<td>Tên NV: </td>
	<td><input type="text" name="TEN" size="50" value="<?php if(isset($_POST['TEN'])) echo $_POST['TEN'];?>" /></td>
</tr>
<tr>
	<td>TÊN PHÒNG:</td>
	<td><select name="phongban">
			<?php 
				$query="select * from phongban";	//Hiển thị tên phòng ban
				$result=mysqli_query($dbc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$MAPHONG=$row['MAPHONG'];
						$TENPHONG=$row['TENPHONG'];
						echo "<option value='$MAPHONG' "; 
								if(isset($_REQUEST['phongban']) && ($_REQUEST['phongban']==$MAPHONG)) echo "selected='selected'";
						echo ">$TENPHONG</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
	</td>
</tr>
<tr>
	<td>Loại Nhân Viên: </td>
	<td><select name="loainv">
			<?php 
				$query="select * from loainv";	//Hiển thị tên loại nv
				$result=mysqli_query($dbc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$MALOAINV=$row['MALOAINV'];
						$TENLOAINV=$row['TENLOAINV'];
						echo "<option value='".$MALOAINV."' "; 
							if(isset($_REQUEST['LOAINV']) && ($_REQUEST['LOAINV']==$MALOAINV)) echo "selected='selected'";
						echo ">".$TENLOAINV."</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
	</td>
</tr>
<tr>
	<td>Ngày Sinh: </td>
	<td><input type="date" name="NGAYSINH" size="20" value="<?php if(isset($_POST['NGAYSINH'])) echo $_POST['NGAYSINH'];?>" /></td>
</tr>
<tr>
	<td>Giới Tính: </td>
	<td><input type="text" name="GIOITINH" size="20" value="<?php if(isset($_POST['GIOITINH'])) echo $_POST['GIOITINH'];?>" /></td>
</tr>
<tr>
	<td>Địa Chỉ </td>
	<td><textarea name="DIACHI" rows="3" cols="50"> <?php if(isset($_POST['DIACHI'])) echo $_POST['DIACHI'];?> </textarea></td>
</tr>

<tr>
	<td>Hình ảnh: </td>
	<td><input type="FILE" name ="hinh" size="80" value="<?php if(isset($_POST['hinh'])) echo $_POST['hinh'];?>" /></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name ="them" size="10" value="Thêm mới" /></td>
</tr>
</table>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
	$errors=array(); //khởi tạo 1 mảng chứa lỗi
	//kiem tra mã nv
	if(empty($_POST['manv'])){
		$errors[]="Bạn chưa nhập mã nv";
	}
	else{
		$manv=trim($_POST['manv']);
	}
	//kiểm tra họ tên
    if(empty($_POST['HO'])){
		$errors[]="Bạn chưa nhập họ ";
	}
	else{
		$ho=trim($_POST['HO']);
	}
	if(empty($_POST['TEN'])){
		$errors[]="Bạn chưa nhập tên ";
	}
	else{
		$ten=trim($_POST['TEN']);
	}
	//cap nhat ma nhân viên và mã loại nv
	$MALOAINV=$_POST['loainv'];
	$MAPHONG=$_POST['phongban'];
	//kiem tra ngày sinh
	if(empty($_POST['NGAYSINH'])){
		$errors[]="Bạn chưa nhập mã nv";
	}
	else{
		$NGAYSINH=trim($_POST['NGAYSINH']);
	}
	//kiem tra Giới tính 0 là nam 1 là nữ
	if(empty($_POST['GIOITINH'])){
		$errors[]="Bạn chưa nhập Giới Tính";
	}
	elseif(!is_numeric($_POST['GIOITINH'])){
		$errors[]="chọn 0 và 1";
	}
	else{
		$GIOITINH=trim($_POST['GIOITINH']);
	}
	//cap nhat địa chỉ
	$DIACHI=$_POST['DIACHI'];
	//kiểm tra hình nhân viên và thực hiện upload file
	if($_FILES['hinh']['name']!=""){
		$hinh=$_FILES['hinh'];
		$ten_hinh=$hinh	['name'];
		$type=$hinh['type'];
		$size=$hinh['size'];
		$tmp=$hinh['tmp_name'];
		if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') || ($type=='image/png') || ($type=='image/jpg') && $size<8000))
		{
			move_uploaded_file($tmp,"anhnv/".$ten_hinh);
		}
	}
	if(empty($errors))//neu khong co loi xay ra
	{ 
		$query="INSERT INTO nhanvien VALUES ('$manv','$ho','$ten', 
                    '$NGAYSINH','$GIOITINH','$DIACHI','$ten_hinh','$MALOAINV','$MAPHONG')";
		$result=mysqli_query($dbc,$query);
		if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
			echo "<div align='center'>Thêm mới thành công!</div>";			
			$query="Select nhanvien.*, TENLOAINV from nhanvien,loainv WHERE nhanvien.MALOAINV=loainv.MALOAINV
					AND MANV ='". $manv. "'";
			$result=mysqli_query($dbc,$query);
			if(mysqli_num_rows($result)==1)
			{	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
				echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
						<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>'.$row['TEN'].' - '.$row['TENLOAINV'].'</h3></td></tr>';
					echo '<tr><td><img src="anhnv/'.$row['ANH'].'"/></td>';
								echo '<td><i><b>ĐỊA CHỈ:</i></b><br />'.$row['DIACHI'].'<br />';
								echo '<i><b>GIỚI TÍNH: </b></i>'.$row['GIOITINH'].' - <i><b>NGÀY SINH: </b></i>'.$row['NGAYSINH'];
										echo '</td></tr></table>';				
			}
		}
		else //neu khong them duoc
		{
			echo "<p>Có lỗi, không thể thêm được</p>";
			echo "<p>".mysqli_error($dbc)."<br/><br />Query: ".$query."</p>";	
		}
	}
	else
	{//neu co loi
		echo "<h2>Lá»—i</h2><p>Có lỗi xảy ra:<br/>";
		foreach($errors as $msg)
		{
			echo "- $msg<br /><\n>";
		}
		echo "</p><p>Hãy thử lại.</p>";
	}
}
mysqli_close($dbc);
?>
</body>
<?php 
include ('../qlnv/footer.html');
?>
</html>

