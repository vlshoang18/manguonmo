<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="qlnv.css">
<title>Tim kiem Thong Tin</title>
</head>
<?php 
require('./index.php');
?>
<body>
<form action="" method="get">
<table bgcolor="#eeeeee" align="center" width="70%" border="1" 
	   cellpadding="5" cellspacing="5" style="border-collapse: collapse;">
<tr>
	<td align="center"><font color="blue"><h3>TÌM KIẾM THÔNG TIN </h3></font></td>
</tr>
<tr>
	<td align="center">Tên Nhân Viên: <input type="text" name="tennv" size="30" 
				value="<?php if(isset($_GET['tennv'])) echo $_GET['tennv'];?>">
			<input type="submit" name="tim" value="Tìm kiếm"></td>
</tr>
</table>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=='GET')
{
	if(empty($_GET['tennv'])) echo "<p align='center'>Vui lòng nhập tên nhân viên</p>";
	else
	{
		$TENNV=$_GET['tennv'];	
	
		$query="Select nhanvien.*, TENLOAINV
		      from nhanvien,LOAINV 
		      WHERE nhanvien.MALOAINV=loainv.MALOAINV
					AND TEN like '%$TENNV%'";
		$result=mysqli_query($dbc,$query);

		if(mysqli_num_rows($result)<>0)

		{	$rows=mysqli_num_rows($result);
			echo "<div align='center'><b>Có $rows nhân viên được tìm thấy.</b></div>";
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
					<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>'.
						$row['MANV'].' - '.$row['TEN'].'</h3></td></tr>';
	
				echo '<td><i><b>mã loại nv:</i></b><br />'.$row['MALOAINV'].'<br />';
				echo '<i><b>mã phòng:</b></i>'.$row['MAPHONG'].'<br />';
				echo '<tr><td width="200"  align="center"><img src="anhnv/'.$row['ANH']. '"style="width: 200px;/></td>';
				echo '</td></tr></table>';
			}
		}
		else echo "<div><b>Không tìm thấy nhân viên.</b></div>";
	}
}
?>
</body>

</html>
<?php 
include ('../qlnv/footer.html');
?>
