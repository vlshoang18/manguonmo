<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa</title>

</head>
<style>
   
    table{
    border:1px solid black;
    
    }
    h2{
        text-align: center;
    }
    .summit{
        text-align: center;

    }
    .panel-body
    {     width: 90%;
        text-align: center;
        border:3px solid black;
        margin-top: 10px;
    padding-left: 5px;
    border:1px solid black;
        background-color: #b171eb;
        border-radius: 20px;
        
    }
    .form-group{
        margin-top: 9px;
        text-align: left;
    }
    .form-control{
        text-align: left;
    }
   
    </style>
<body>
    
</body>
</html>
<?php
    if (isset($_GET['MANV']) && $_GET['MANV'] != "") {
        // Lấy mã, kiểm tra có nhân viên này trong db không, tại nhiều lúc ngta nhập trên URL mã tầm bậy
        $maNV = $_GET['MANV'];
        // Kết nối db để thực hiện truy vấn
        require("./index.php");

        // Viết truy vấn tìm xem có nhân viên trong db không
        $qr = "SELECT nv.*, lnv.TENLOAINV, pb.TENPHONG FROM nhanvien nv, phongban pb, loainv lnv WHERE nv.MANV = '$maNV' AND nv.MALOAINV = lnv.MALOAINV AND nv.MAPHONG = pb.MAPHONG";
        // Thực thi câu truy vấn
        $result = mysqli_query($dbc, $qr);

        $qr1 = "SELECT * FROM loainv";
        $result1 = mysqli_query($dbc, $qr1);
        $arr = [];
        while($row1 = mysqli_fetch_array($result1)) {
            array_push($arr, $row1);
        }

        
        $qr2 = "SELECT * FROM phongban";
        $result2 = mysqli_query($dbc, $qr2);
        $arr2 = [];
        while($row2 = mysqli_fetch_array($result2)) {
            array_push($arr2, $row2);
        }
   

        if (mysqli_num_rows($result) != 0) {
            // Chắc chắn chỉ ra 1 bản bên gán vầy luôn
            $row = mysqli_fetch_array($result);
        } else {
            echo "Không tìm thấy";
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
            // Mã nhân viên bây giờ lấy từ POST ra
            $maNV = $_POST['MANV'];
            $ho = $_POST['HO'];
            $ten = $_POST['TEN'];
            $ngaySinh = $_POST['NGAYSINH'];
            $gioiTinh = $_POST['GIOITINH'];
            $diaChi = $_POST['DIACHI'];
            $loaiNV = $_POST['loaiNV'];
            $phongban = $_POST['phongban'];
            //if isset file anh thì
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
            
                $query = "UPDATE nhanvien SET HO = '$ho', TEN = '$ten', NGAYSINH = '$ngaySinh', GIOITINH = '$gioiTinh', DIACHI = '$diaChi', ANH = '$ten_hinh', MaLoaiNV = '$loaiNV' WHERE MaNV = '$maNV'";
            }
            else{
                $query = "UPDATE nhanvien SET HO = '$ho', TEN = '$ten', NGAYSINH = '$ngaySinh', GIOITINH = '$gioiTinh', DIACHI = '$diaChi', MALOAINV = '$loaiNV' WHERE MANV = '$maNV'";
            }
            
            //else
//kiểu v ảnh lấy trong $_FILE chứ
            // Kết nối db rồi
            // Viết query xóa
            
            // Thực thi câu truy vấn
            $result = mysqli_query($dbc, $query);   
            // Kiểm tra xóa thành công hay chưa
            if (mysqli_affected_rows($dbc) == 1 || mysqli_affected_rows($dbc) == 0) {
                
                header('Location: khoitao.php');
            } else {
                echo "Có lỗi";
            }
        }
    }
    
    ?>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">CẬP NHẬT THÔNG TIN NHÂN VIÊN</h2>
		</div>
		<div class="panel-body">
        <form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Mã nhân viên:</label>
					<input required="true" type="text" class="form-control" id="maNV" name="MANV" disabled value="<?php echo $row[0]; ?>">
				</div>

				<div class="form-group">
					<label>Họ nhân viên:</label>
					<input required="true" type="text" class="form-control" id="ho" name="HO" value="<?php echo $row[1];  ?>">
				</div>

                <div class="form-group">
					<label>Tên nhân viên:</label>
					<input required="true" type="text" class="form-control" id="ten" name="TEN" value="<?php echo $row[2];  ?>">
				</div>

                
				<div class="form-group">
					<label>Ngày sinh:</label>
					<input type="date" class="form-control" name="NGAYSINH" value="<?php echo $row[3]; ?>">
				</div>

                <div class="form-group">
					<label>Giới tính:</label>
          <input type="text" class="form-control" name="GIOITINH" value="<?php echo $row[4]; ?>">
				</div>

				<div class="form-group">
					<label>Địa chỉ:</label>
					<input required="true" type="text" class="form-control" id="diaChi" name="DIACHI" value="<?php echo $row[5] ?>">
				</div>
                
                <div class="form-group">
					<label>Ảnh nhân viên:</label>
					
					<input type="FILE" id="anhNV" name="hinh" >
				</div>
                <div class="form-group">
					<label>Loại nhân viên:</label>
					<select name="loaiNV" class="form-control">
						<!-- <option value="<?php echo $row['MALOAINV'] ?>" class="form-control"> -->
						<?php
						echo $row['TENLOAINV'];

						?></option>
						<?php
						foreach ($arr as $loaiNV) {
							if ($row['MALOAINV'] == $loaiNV['MALOAINV']) {
								$s = "selected";
							} else {
								$s = "";
							}
							echo '<option ' . $s . ' value="' . $loaiNV['MALOAINV'] . '" class = "form-control">' . $loaiNV['TENLOAINV'] . '</option>';
						}
						?>
					</select>
				</div>

                <div class="form-group">
					<label>Phòng ban:</label>
					<select name="phongban" class="form-control">
						<!-- <option value="<?php echo $row['MAPHONG'] ?>" class="form-control"> -->
						<?php
						echo $row['TENPHONG'];
						?></option>
						<?php
						foreach ($arr2 as $phongban) {
							if ($row['MAPHONG'] == $phongban['MAPHONG']) {
								$s = "selected";
							} else {
								$s = "";
							}
							echo '<option ' . $s . ' value="' . $phongban['MAPHONG'] . '" class = "form-control">' . $phongban['TENPHONG'] . '</option>';
						}
						?>
					</select>
				</div>

				<div class="summit">
                <input type="hidden" name="MANV" value="<?php echo $row[0]; ?>">
                <input type="submit" value="Lưu">
					<div class="col-md-offset-2 col-md-6">
						<button class="comeback">
							<a href="javascript:window.history.back(-1);">Quay lại</a>
						</button>
					</div>
				</div>
			</form>
		</div>
        
	</div>
    <?php 
include ('../qlnv/footer.html');
?>
</div>
<?php

?>