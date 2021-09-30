<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
        <title>So hoc co ban</title>
    </head>
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
    $so1=0;
        
    $ketqua= 0;
        
    $so2=0;
    if(isset($_POST['so1']) && isset($_POST['so2'])){
       
        $tinh = $_POST['tinh'];
        $so1 = $_POST['so1'];
        $so2 = $_POST['so2'];
        if($tinh == "Cộng"){
            $ketqua = $so1+$so2;
        } 
        else if($tinh == "Trừ"){
            $ketqua = $so1-$so2;
        } 
        else if($tinh == "Nhân"){
            $ketqua = $so1*$so2;
        }
        else if($tinh == "Chia"){
            $ketqua = $so1/$so2;
        }
}	
	?>
<form align='center' action="bai3.php" method="post" >    
    <table>
    
        <tr>
                <td>
            <strong>Phép tính:</strong> 
                        <?php
                        echo $tinh;
                    ?>
            </td>
        

        <tr><td>Số Thứ Nhất </td>

            <td><input type="text" name="so1" id="so1" value="<?php  echo $so1;?> "/></td><br>

        </tr>

        <tr><td>Số Thứ Hai :</td>

            <td><input type="text" name="so2" id="so2" value="<?php  echo $so2;?> "/></td>

        </tr><br>
        <tr><td>Kết quả :</td>

            <td><input type="text" name="ketqua" id="ketqua" disabled="disabled" value="<?php  echo $ketqua;?> "/></td>

        </tr><br>
        
        <tr class="id">
                <td colspan="2">
                <a href="javascript:window.history.back(-1);">Quay lại trang trước</a>
                </td>
            </tr>
    </table>  
</form>
	

</body>
</html>