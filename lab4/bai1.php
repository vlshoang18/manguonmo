<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Xử lý n</title>
</head>
<body>
<?php
	if(isset($_POST['n'])) $n=$_POST['n'];
	else $n=0;

	$ketqua="";
	if(isset($_POST['hthi'])) 
	{	//Tạo mảng có n phần tử, các phần tử có giá trị [-100,100]
		$arr=array();
		for($i=0;$i<$n;$i++)
		{
			$x=rand(-200,200);
			$arr[$i]=$x;
		}
		//In ra mảng vừa tạo
		$ketqua="Mảng được tạo là:" .implode(" ",$arr)."&#13;&#10;";
		$ketqua .= "Mảng sau khi sắp xếp: ";
	sort($arr);
    foreach( $arr as $v) 
	{
		$ketqua .= "$v &nbsp";
	
	}
	$b=30;
	 $inserted = array( $b);
	 $vitri=3;
	 $vt= $vitri+1;
	 array_splice( $arr, $vitri, 0 , $inserted );
	 $ketqua .= "\n Mảng sau khi chèn $b vào vị trí $vt: ";
	 foreach ($arr as $v)
	 {
		 $ketqua.= "$v &nbsp";
	 }
	 $ketqua .= "\n  mảng sau khi chèn :";
	 for ($i=0;$i<$vitri;$i++)
	{
		 $arr1[$i] = $arr[$i];
	}
		 sort($arr1);

	
	for ($i=$vt;$i<count($arr);$i++)
	{
		$arr2[$i] = $arr[$i];
	}
   		rsort($arr2);
  
	$arr3 = array_merge($arr1,$arr2);
	array_splice( $arr3, $vitri, 0 , $inserted );
	foreach( $arr3 as $v) 
	{
		$ketqua .= "$v &nbsp";
	
	}

	}
		
    
	
	
	 
?>
<form action="" method="post">
	Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>
	<input type="submit" name="hthi" value="Hiển thị"/>
	Kết quả: <br>
	<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>
</form>
</body>
</html>