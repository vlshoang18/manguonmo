<!DOCTYPE html>
<html>

    <title>Hình Tròn</title>
  
    
<head>
<style>
        table{
            width: 500px;
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
    ini_set('display_errors',0);
    $chieudai = $_POST['chieudai'];
    $chieurong = $_POST['chieurong'];
    $dientich = 0;
    if (isset($_POST['tinh']))
    
        if(is_numeric($chieurong) && is_numeric($chieurong) && $chieurong > 0 && $chieudai > 0)
        $dientich = $chieudai * $chieurong;

    
        else 
        {
        echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
        $dientich = "";
        }
    else $dientich=0;
    
?>
    <form action="" method="post">
        <table>
            <tr class="center">
                <td colspan="2">
                    HÌNH CHỮ NHẬT
                </td>
            </tr>
            <tr>
                <td>
                    Chiều rộng
                </td>
                <td>
                    <input type="text" name="chieurong">
                </td>
            </tr>
            <tr>
                <td>
                    Chiều cao
                </td>
                <td>
                    <input type="text" name="chieudai">
                </td>
            </tr>
           
            <tr>
                <td>
                    Diện tích
                </td>
                <td>
                    <input type="text" name="dientich" value="<?php echo $dientich ?>">
                </td>
            </tr>
            <tr class="center">
                <td colspan="2">
                    <button type="submit" name="tinh">TÍNH</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>