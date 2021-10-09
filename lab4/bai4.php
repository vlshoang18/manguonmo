<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="bai2.css">
	<title>Xử lý n</title>
</head>
<body>
<?php
	if(isset($_POST['n']) && isset($_POST['m']))
    {
        $n=$_POST['n'];
        $m=$_POST['m'];
    }
	else{ $n=0; $m=0;}
    $ketqua="";
    if(isset($_POST['hthi'])) 
	{	//Tạo mảng có n phần tử, các phần tử có giá trị [-100,100]
		$arr=array();
      
		for($i=0;$i<$n;$i++)
		{
			for($j=0;$j<$m;$j++)
            {
                $x=rand(0,200);         
		    	$arr[$i][$j]=$x;
                
                
            }
		}
       
	}
   
    for($i=0;$i<$n;$i++)
    {   $ketqua.="\n";
        foreach($arr[$i] as $val)
        {
            $ketqua.=" $val ";
        }
       
    }
$count=0;
    for($i=0;$i<$n;$i++)
    {
        for($j=0;$j<$m;$j++)
        {
                     
            if($arr[$i][$j]%2!=0)
            {
                $count++;
            }
            
            
        }
    }
    $ketqua.="\nsố phần tử lẻ:".$count;
?>

        
      
<form action="" method="post">
	Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>
	
    Nhập m: <input type="text" name="m" value="<?php echo $m?>"/>
	<input type="submit" name="hthi" value="Hiển thị"/>
	Kết quả: <br>
	<textarea cols="70" rows="10" name="ketqua"> <?php print_r($ketqua)?></textarea>
</form>
</body>
</html>