<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Thanh Toán Tiền Điện</title>

    <style type="text/css">

     

        table{

            background: #ffd94d;

            border: 0 solid yellow;

        }

        thead{

            background: #fff14d;    

        }

        td {

            color: black;

        }

        h3{

            font-family: verdana;

            text-align: center;

            /* text-anchor: middle; */

            color: #ff8100;

            font-size: medium;

        }
        table{
            width: 600px;
            margin: auto;
            background: #ffca97;
        }
        td{
            padding: 10px;
        }
        .center{
            text-align: center;
            font-weight: bold;
            background: #ffa500;
            color: #ffffff;
        }
        input{
            width: 300px;
        }
        button{
            background: #34a853;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
        }
        button:hover{
            cursor: pointer;
        }

    </style>

</head>



<body>



<?php 

if(isset($_POST['tench']))  



    $tench=trim($_POST['tench']); 



else $tench=0;

if(isset($_POST['csc']))  



    $csc=trim($_POST['csc']); 



else $csc=0;



if(isset($_POST['csm'])) 



    $csm=trim($_POST['csm']); 



else $csm=0;

$dongia=20000;



if(isset($_POST['tinh']))



        if (is_numeric($dongia) && is_numeric($csc) && is_numeric($csm))  



            $thanhtoan=($csm - $csc) * $dongia;



        else {



                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 



                $thanhtoan="";



            }



else $thanhtoan=0;



?>







<form align='center' action="" method="post">

<table>

    <thead>

        <th colspan="2" align="center"><h3>Thanh Toán tiền điện</h3></th>

    </thead>

    <tr><td>Tên Chủ Hộ</td>

     <td><input type="text" name="tench" value="<?php  echo $tench;?> "/></td>

    </tr>

    <tr><td>Chỉ số cũ</td>

     <td><input type="text" name="csc" value="<?php  echo $csc;?> "/> (Kw)</td>

    </tr>

    <tr><td>Chỉ số mới :</td>

     <td><input type="text" name="csm" value="<?php  echo $csm;?> "/>(Kw)</td>

    </tr>
    
    <tr><td>Đơn giá :</td>

        <td><input type="text" name="dongia" value="<?php  echo $dongia;?> "/>(VNĐ)</td>

    </tr>

    <tr><td>Số tiền thanh toán:</td>



     <td><input type="text" name="thanhtoan" disabled="disabled" value="<?php  echo $thanhtoan;?> "/>(VNĐ)</td>



    </tr>



    <tr>



     <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>



    </tr>



</table>



</form>



</body>



</html>