<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa</title>
</head>
<style>
    .xoa{
        text-align: center;
    }
   
    h1{
        text-align: center;
    }
  


    </style>
<body>
<body>
    
</body>
</html>
<?php # Script 10.2 - delete_user.php
// This page is for deleting a user record.
// This page is accessed through view_users.php.

$page_title = 'Xóa Nhân Viên';
require("./index.php");
echo '<h1>Xóa Nhân Viên</h1>';

if (isset($_GET['MANV']) && $_GET['MANV'] != "") {
	// Lấy mã, kiểm tra có nhân viên này trong db không, tại nhiều lúc ngta nhập trên URL mã tầm bậy
	$maNV = $_GET['MANV'];
	// Kết nối db để thực hiện truy vấn
	// Viết truy vấn tìm xem có nhân viên trong db không
}
else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	exit();
}
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['sure'] == 'Yes') { // Delete the record.

		// Make the query:
		$q = "DELETE FROM nhanvien WHERE MANV='$maNV' LIMIT 1";		
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			// Print a message:
            echo "
            <script language='javascript'>
                alert('Xóa thành công');
                window.open('khoitao.php','_self', 1);
            </script>
        ";

		} else { // If the query did not run OK.
			echo '<p class="error">The user could not be deleted due to a system error.</p>'; // Public message.
			echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
		}
	
	} else { // No confirmation of deletion.
		echo '<p>Nhân viên không được xóa.</p>';	
	}

} else { // Show the form.

	// Retrieve the user's information:
	$q = "SELECT CONCAT(HO, ' ', TEN) FROM nhanvien WHERE MANV='$maNV'";
	$r = @mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.
		// Get the user's information:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);
		
		// Display the record being deleted:
		echo "<h3>Tên NV: $row[0]</h3>
		Bạn có chắc chắn xóa nhân viên này?";
		
		// Create the form:
		echo ''?>
    <form class="xoa" action="deletenv.php?MANV=<?php echo $maNV?>" method="post">
	<input type="radio" name="sure" value="Yes" /> Yes 
	<input type="radio" name="sure" value="No" checked="checked" /> No
	<input type="submit" name="submit" value="Submit" />
	<input type="hidden" name="MANV" value="<?php echo $maNV ?>" />
	</form>
    <?php
    echo '';
	
	} else { // Not a valid user ID.
		echo '<p class="error">This page has been accessed in error.</p>';
	}

} // End of the main submission conditional.

mysqli_close($dbc);
		

?>