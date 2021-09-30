<!DOCTYPE html>
<html>

    <title>Hình Tròn</title>
  
    
<head>
<style>
        table{
            width: 500px;
            margin: auto;
            background: yellowgreen;
        }
        td{
            padding: 10px;
        }
        .center{
            text-align: center;
            font-weight: bold;
            background: blueviolet;
            color: #ffffff;
        }
        input{
            width: 300px;
        }
        button{
            background: greenyellow;
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
    define("PI", 3.14);
    $bankinh = $_POST['bankinh'];
    $dientich = 0;
    if (isset($_POST['tinh'])){
        if(is_numeric($bankinh) && $bankinh > 0)
        $dientich = PI * pow($bankinh, 2);

    }
    else $dientich = 0;
?>
    <form action="" method="post">
        <table>
            <tr class="center">
                <td colspan="2">
                    HÌNH TRÒN
                </td>
            </tr>
            <tr>
                <td>
                    Bán Kính
                </td>
                <td>
                    <input type="text" name="bankinh">
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