<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thong tin nhân viên</title>
	<link rel="stylesheet" href="qlnv.css">
</head>
<body>
<?php 
// Ket noi CSDL
require("./index.php");
$rowsPerPage=3; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page']))
{ $_GET['page'] = 1;
}
//vị trí của mẩu tin đầu tiên trên mỗi trang
$offset =($_GET['page']-1)*$rowsPerPage;
//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
$result = mysqli_query($dbc, 'Select MANV,HO,TEN,NGAYSINH,GIOITINH,DIACHI,ANH, TENLOAINV , TENPHONG  from nhanvien,phongban,loainv WHERE  nhanvien.MALOAINV=loainv.MALOAINV AND nhanvien.MAPHONG=phongban.MAPHONG LIMIT '. $offset . ', ' .$rowsPerPage);
if(mysqli_num_rows($result) == 0)
{
	echo "Chưa có dữ liệu";
}
else
{	echo "<h1 style='color: #543e17;' align='center'>THÔNG TIN NHÂN VIÊN</h1>
		  <table align='center' width='800' border='1' cellpadding='2' cellspacing='2' 
				style='border-collapse: collapse;'>
		  	<tr style='background-color: #bc7eff96;' align='center'>
				<td><b>Mã NV</b></td>
				<td><b>Họ </b></td>
                <td><b>Tên </b></td>
				<td><b>Ngày Sinh</b></td>
				<td><b>Giới Tính</b></td>
                <td><b>Địa Chỉ</b></td>
				<td><b>Ảnh</b></td>
				<td><b>Loại NV</b></td>
                <td><b>Mã Loại NV</b></td>
				<td><b>Chức Năng</b></td>
				
               

		  	</tr>";
	$stt=1;
	while ($row = mysqli_fetch_array($result))
	{
		if($stt%2!=0)
		{	echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
            echo "<td>$row[5]</td>";?>
			<td><img src="anhnv/<?php echo $row['ANH']?>" alt="" width="100" height='100px'></td>
			<?php
            echo "<td>$row[7]</td>";
			echo "<td>$row[8]</td>";
			echo "<td>";?>
		<a href='editnhanvien.php?MANV=<?php echo $row['MANV'];?>'><img src='anhnv/sua.png' width='20px' height='20px'></a> <a href='deletenv.php?MANV=<?php echo $row['MANV'];?>'><img src='anhnv/xoa.png' width='20px' height='20px'></a>
<?php
			echo "</tr>";
		}
		else
		{
			echo "<tr style='background-color: #ad7affab;'>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
            echo "<td>$row[5]</td>";?>
			<td><img src="anhnv/<?php echo $row['ANH']?>" alt="" width="100" height='100px'></td>
			<?php
            echo "<td>$row[7]</td>";
			echo "<td>$row[8]</td>";
			echo "<td>";?>
		<a href='editnhanvien.php?MANV=<?php echo $row['MANV'];?>'><img src='anhnv/sua.png' width='20px' height='20px'></a> <a href='deletenv.php?MANV=<?php echo $row['MANV'];?>'><img src='anhnv/xoa.png' width='20px' height='20px'></a>
       <?php
			echo "</tr>";
		}
			$stt+=1;
	}
	echo '</table>';
	$re = mysqli_query($dbc, 'Select MANV,HO,TEN,NGAYSINH,GIOITINH,DIACHI,ANH, TENLOAINV , TENPHONG  from nhanvien,phongban,loainv WHERE  nhanvien.MALOAINV=loainv.MALOAINV AND nhanvien.MAPHONG=phongban.MAPHONG');
	//tổng số mẩu tin cần hiển thị
	$numRows = mysqli_num_rows($re);
	//tổng số trang
	
	$maxPage = floor($numRows/$rowsPerPage) + 1;
	if ($_GET['page'] > 1)
	{ echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">
	Trang Đầu
	</a> ";
	}

	for ($i=1 ; $i<=$maxPage ; $i++)
	{ if ($i == $_GET['page'])
	{ echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
	}
	else
	echo "<a href=" .$_SERVER['PHP_SELF']. "?page="
	.$i.">".$i."</a> ";
	}

	if ($_GET['page'] < $maxPage)
{ echo "<a href = ". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">
Trang cuối
</a>";
}

	}
	//Dong ket noi
	mysqli_close($dbc);
	?>
	<?php 
include ('../qlnv/footer.html');
?>
	</body>
	</html>