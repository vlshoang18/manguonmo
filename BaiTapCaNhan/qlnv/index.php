<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location: login.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="trangchu.css">
<title>Trang Chủ</title>
</head>

<body id="than_page">
<?php 
require("../connect.php");
?>
<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include ('../qlnv/header.html');
?>

<div id="menu">
<ul>
<li><a href="trangchu.php">Trang chủ</a></li>
<li><a href="khoitao.php">Thông tin nhân viên</a></li>
<li><a href="timkiem.php">Tìm kiếm</a></li>
<li><a href="themmoi.php">Thêm thông tin</a></li>
</ul>
</div >



</body>

</html>


