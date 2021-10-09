<!DOCTYPE html>
 
<html>
<head>
<title>Hàng Hóa</title>

<link type="text/css" rel="stylesheet" href="styles.css">
</head>
 
<body>
<?php
$mmh="";
$tmh="";
$dvt="";
$sl=0;
$mang= array();
if(isset( $_POST['tinh'])){
    $mhh =$_POST['mhh'];
    $thh =$_POST['thh'];
    $dvt =$_POST['dvt'];
    $sl =$_POST['sl'];
   
       
       $mang[0]=$mhh;
       $mang[1]=$thh;
       $mang[2]=$dvt;
       $mang[3]=$sl;
 }
    

       
    
$qlhh = array (
 array (
 'Mã Mặt Hàng','Tên Mặt Hàng','Đơn Vị Tính','Số Lượng'),
 array ('A001','Sữa Tắm XMen','Chai 50ml','50'),
 array ('A002','Sữa Tắm XMen','Chai 50ml','50'),
array ('B001','Sữa Tắm XMen','Chai 50ml','50'),
array ('B002','Sữa Tắm XMen','Chai 50ml','50'),
 array ('C001','Sữa Tắm XMen','Chai 50ml','50'),
 array ('C001','Sữa Tắm XMen','Chai 50ml','50'),);
array_push($qlhh,$mang); 
 
?>

 <h2>Quản Lý Hàng Hóa</h2>
 
 <table border="1">
 <thead>
 <tr>
 <th>
 <?php
 
 echo $qlhh[0][0] . "</th>\n<th>";
 echo $qlhh[0][1] . "</th>\n<th>";
 echo $qlhh[0][2] . "</th>\n<th>";
 echo $qlhh[0][3] . "</th>\n";
 ?>
 </tr>
 </thead>
 <?php
 $num = count($qlhh);
 for ($row = 1; $row < $num; $row++)
 {
 echo "<tr>\n";
 foreach ($qlhh[$row] as $value)
 {
 echo "<td>$value</td>\n";
 }
 echo "</tr>\n";
 }
 
 ?>
 </table>
</body>
<form action="" method="post">
<fieldset>
	<legend>Nhập Thông tin</legend>
	<table >
		
		<tr>
			<td>Nhập Mã Hàng Hóa:</td>
			<td><input type="text"  name="mhh" value="<?php if(isset($_POST['mhh'])) echo $_POST['mhh'];?>"/></td>
		</tr>
		<tr>
			<td>Tên Mặt Hàng:</td>
			<td><input type="text"  name="thh" value="<?php if(isset($_POST['thh'])) echo $_POST['thh'];?>"/></td>
		</tr>
        <tr>
			<td>Đơn Vị Tính:</td>
			<td><input type="text"  name="dvt" value="<?php if(isset($_POST['dvt'])) echo $_POST['dvt'];?>"/></td>
		</tr>
        <tr>
			<td>Số Lượng:</td>
			<td><input type="text"  name="sl" value="<?php if(isset($_POST['sl'])) echo $_POST['sl'];?>"/></td>
		</tr>
        <tr>
		
		<tr>
			<td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH"/></td>
		</tr>
	</table>
</fieldset>
</form>
</html>