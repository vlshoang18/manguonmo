<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert title here</title>
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

<body>
    <?php
     $dayso="";
     $tong=0;
     
    $loi="";
    if (isset($_POST['bd']) && isset($_POST['kt']))
    $tong="";
    if (($_SERVER["REQUEST_METHOD"] == "POST")) 
    {
    if(($_POST['dayso'] != ""))
        {
            $dayso = trim($_POST['dayso']);
            $arr = explode("," , $dayso);   // loại bỏ kí tự ,
            $tong = array_sum($arr); //cộng chuỗi
        }
    else
        {
            $loi= "Vui lòng nhập số" ;      
        }
    }
    ?>
    <form action="" method="post">  

        <table>

            <thead>

                <th colspan="2" ><h3>Tinhtoan</h3></th>

            </thead>

            <tr><td>Nhập Dãy Số</td>

                <td><input type="text" name="dayso" value="<?php  echo $dayso;?> "/>
                </td> 

            </tr>

            <tr><td>Tổng dãy số:</td>
                <td><input type="text" name="tong" disabled="disabled" value="<?php  echo $tong;?> "/>
                </td>

                </tr>
            <tr>



            <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>



            </tr>
        <div id ="loi">
            <?php 
            echo $loi;
            ?>
        </div>


        </table>
    </form>

</body>
</html>