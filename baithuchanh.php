<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert title here</title>
</head>
<?php
    class Nguoi
    {
       public $hoten;
       protected $diachi;
       protected $gioitinh;

          
       function sethoten($hoten)
       {
           $this -> hoten=$hoten;
       }
       function setgioitinh($gioitinh)
       {
            $this ->gioitinh =$gioitinh;
       }
       function setdiachi($diachi)
       {
          $this ->diachi =$diachi;
       }

       function gethoten()
       {
           return $this -> hoten;
       }
       function getgioitinh()
       {
           return $this ->gioitinh;
       }
       function getdiachi()
       {
           return $this ->diachi;
       }
    }
    
    class SinhVien extends Nguoi
    {
        public $lop;
        public $nganh;
        
        function setlop($lop)
        {
           $this -> lop= $lop;
        }
        function setnganh($nganh)
        {
            $this ->nganh =$nganh;
        }
        function getlop()
        {
            return $this -> lop;
        }
        function getnganh()
        {
            return $this ->nganh;
        }
        function tinh_DT()
        {
            if($this -> nganh == "CNTT")
                return 1;
            else if($this-> nganh == "KT")
                return 1.5;
            else
            {
                return 0;
            }
        }

    }
    class GiangVien extends Nguoi
    {
        public $trinhdo;

        function settrinhdo($trinhdo)
        {
             $this -> trinhdo =$trinhdo;
        }
        function gettrinhdo()
        {
            return $this -> trinhdo;
        }
        const luong=1500000;
        function tinh_TL()
        { 
            if($this-> trinhdo == "CN"){
                return  2.34 * self ::luong ;}
            else if($this-> trinhdo == "TS"){
                 return  3.67 * self ::luong ;}
            else{
                return 5.66 * self::luong ;
                }
            
        }

    }
$str=NULL;
if(isset($_POST['tinh'])){
	if(isset($_POST['Nguoi']) && ($_POST['Nguoi'])=="sv")
    {
		$sv=new SinhVien();
		$sv->sethoten($_POST['hoten']);
		$sv->setdiachi($_POST['diachi']);
        $sv->setgioitinh($_POST['gioitinh']);
        $sv->setnganh($_POST['nganh']);
		$str=   "Họ và tên ".$sv->gethoTen(). "\n".
                "Địa Chỉ ".$sv->getdiachi(). "\n".
                "Giới Tính ".$sv->getgioitinh(). "\n".
                " ngành học".$sv->getnganh(). "\n".
                "Tính điểm lương ".$sv->tinh_DT();
		 		
	}
    if(isset($_POST['Nguoi']) && ($_POST['Nguoi'])=="gv")
    {
		$gv=new GiangVien();
		$gv->sethoTen($_POST['hoten']);
		$gv->setdiachi($_POST['diachi']);
        $gv->setgioitinh($_POST['gioitinh']);
        $gv->settrinhdo($_POST['trinhdo']);
		$str=   "Họ và tên ".$gv->gethoTen(). "\n".
                "Địa Chỉ ".$gv->getdiachi(). "\n".
                "Giới Tính ".$gv->getgioitinh(). "\n".
                " Trình độ".$gv->gettrinhdo(). "\n".
                "Tính Lương ".$gv->tinh_TL ();
		 		
	}
}
?>
<form action="" method="post">
<fieldset>
	<legend>Thông tin Giảng viên/Sinh viên và kết quả lương điểm thưởng</legend>
	<table border='0'>
		<tr>
			<td>Chọn GV/SV</td>
			<td><input type="radio" name="Nguoi" value="gv" 
					<?php if(isset($_POST['Nguoi'])&&($_POST['Nguoi'])=="gv") echo 'checked'?>/>Giảng viên
				<input type="radio" name="Nguoi" value= "sv"
					<?php if(isset($_POST['Nguoi'])&&($_POST['Nguoi'])=="sv") echo 'checked'?>/>Sinh viên
			</td>
		</tr>
		<tr>
			<td>Nhập tên:</td>
			<td><input type="text"  name="hoten" value="<?php if(isset($_POST['hoten'])) echo $_POST['hoten'];?>"/></td>
		</tr>
		<tr>
			<td>Nhập địa chỉ:</td>
			<td><input type="text"  name="diachi" value="<?php if(isset($_POST['diachi'])) echo $_POST['diachi'];?>"/></td>
		</tr>
        <tr>
			<td id="title">Giới Tính:</td>
            <td> <input type="radio" name="gioitinh" value="Nam"
                <?php if(isset($_POST['gioitinh'])&&($_POST['gioitinh'])=="Nam") echo 'checked'?>/>Nam
            <input type="radio" name="gioitinh" value="Nữ"
                <?php if(isset($_POST['gioitinh'])&&($_POST['gioitinh'])=="Nữ") echo 'checked'?>/>Nữ</td>
        </tr>
        <tr>
			<td>Chọn Ngành Học</td>
			<td><input type="radio" name="nganh" value="CNTT" 
					<?php if(isset($_POST['nganh'])&&($_POST['nganh'])=="CNTT") echo 'checked'?>/>Công Nghệ Thông Tin
				<input type="radio" name="nganh" value= "KT"
					<?php if(isset($_POST['nganh'])&&($_POST['nganh'])=="KT") echo 'checked'?>/>Kinh Tế
                <input type="radio" name="nganh" value= "khac"
					<?php if(isset($_POST['nganh'])&&($_POST['nganh'])=="khac") echo 'checked'?>/>Khác
			</td>
		</tr>
        <tr>
			<td>Chọn Trình Độ</td>
			<td><input type="radio" name="trinhdo" value="CN" 
					<?php if(isset($_POST['trinhdo'])&&($_POST['trinhdo'])=="CN") echo 'checked'?>/>Cử Nhân
				<input type="radio" name="trinhdo" value= "TS"
					<?php if(isset($_POST['trinhdo'])&&($_POST['trinhdo'])=="TS") echo 'checked'?>/>Thạc Sĩ
                <input type="radio" name="trinhdo" value= "khac"
					<?php if(isset($_POST['trinhdo'])&&($_POST['trinhdo'])=="khac") echo 'checked'?>/>Khác
			</td>
		</tr>
        <tr><td>Kết quả:</td>
			<td><textarea name="ketqua" cols="100" rows="7" disabled="disabled"><?php echo $str;?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH"/></td>
		</tr>
	</table>
</fieldset>
</form>