<?php 
if(isset($_POST["act"]))
{
	$id=$_POST["id"];
	$loaisp=$_POST["loaisp"];
	$menu=$_POST["menu"];
	$tensp=$_POST["tensp"];
	$mota = $_POST['mota'];
	$gia=$_POST["gia"];$ghichu=$_POST["ghichu"];
	$kd=khongdau2($_POST["tensp"]);
	$id2=md5($kd);
//	echo "$id - $id2";
	$file_name = $_FILES["hinh"]["name"];
	$file_type = $_FILES["hinh"]["type"];
	$file_size = $_FILES["hinh"]["size"];
	$name=$_POST["oldimage"]; $imgInfo=explode('.', $name);
	$new=$kd.".".$imgInfo[1];
//	echo "$name - $new<hr>";
	if($file_name==""&&$file_type==""&&$file_size==0)
	{	
		if($id2!=$id){
			$sql5="UPDATE sanpham SET id='$id2', id_loai='$loaisp', tensp='$tensp', mota='$mota', gia='$gia',ghichu='$ghichu',hinh='$new',id_menu='$menu' WHERE id='$id'";
			$kq5=mysql_query($sql5);
			$q=mysql_query("update giohang SET id='$id2' where id='$id'");
			$q2=mysql_query("update hoadon SET id='$id2' where id='$id'");
			//echo "$sql5<hr>";			
			if(!$kq5){
				echo "<script>alert('Lỗi! sản phẩm này đã có');window.history.go(-1);</script>";}
			else{
				 rename("../sanpham/large/$name","../sanpham/large/$new");	
				 rename("../sanpham/small/$name","../sanpham/small/$new");
				 $n5=mysql_affected_rows();
				 echo "<script>alert('Đã sửa');window.history.go(-2);</script>";
			}
		}
		else{
			$sql3="UPDATE sanpham SET id='$id2', id_loai='$loaisp', tensp='$tensp', mota='$mota', gia='$gia',ghichu='$ghichu',id_menu='$menu' WHERE id='$id'";
			$kq3=mysql_query($sql3);
			if(!$kq3){
				echo "<script>alert('Có lỗi xảy ra trong quá trình xử lý!!');window.history.go(-1);</script>";}
			else{
				 $n3=mysql_affected_rows();
				 echo "<script>alert('Đã sửa $n3 sản phẩm');window.history.go(-2);</script>";	
			}
		}
	}
	else{			
		$tmp_name = $_FILES['hinh']['tmp_name'];		
		$dirToUpload="../sanpham/large/";
		$imageInfo = explode('.', $file_name);  //cắt chuỗi ở những nơi có dấu .
		$newName = $kd.".".$imageInfo[1]; 				
		unlink("../sanpham/large/$name");
				unlink("../sanpham/small/$name");
				switch($imageInfo[1]){
				case "jpg":
					$src = imagecreatefromjpeg($tmp_name);
				break;
								
				case "gif":
					$src = imagecreatefromgif($tmp_name);
				break;
								
				case "png":
					$src = imagecreatefrompng($tmp_name);
				break;
				
				case "jpeg":
					$src = imagecreatefromjpeg($tmp_name);
				break;
				}	
			//********************************resize hinh ********************************
				list($width,$height)=getimagesize($tmp_name);  //lấy kích thước của file
				$newwidth=170;
				$newheight=170;
				$tmp=imagecreatetruecolor($newwidth,$newheight); //tạo kíck thước mới rồi gán vào 1 file hình
				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); //chép hình từ file src ( ng ta gửi ) sang khung hình kíck thước mới
				$pathfile="../sanpham/large/".$newName;	
				$pathfull="../sanpham/small/".$newName;	
				move_uploaded_file($_FILES["hinh"]["tmp_name"], $pathfile);
				imagejpeg($tmp,$pathfull,100);		   //lưu hình tmp với đường dẫn là pathfull
				imagedestroy($src); imagedestroy($tmp); //xóa hình tạm khỏi bộ nhớ
			//********************************resize hinh ********************************
		$sql4="UPDATE sanpham SET id='$id2', id_loai='$loaisp', tensp='$tensp', mota='$mota',hinh='$newName', gia='$gia',ghichu='$ghichu',id_menu='$menu' WHERE id='$id'";
		$kq4=mysql_query($sql4);
		if(!$kq4)
			echo "<script>alert('Lỗi! sản phẩm này đã có trong cơ sở dữ liệu!');window.history.go(-1);</script>";
		else{				
				 $n4=mysql_affected_rows();
				 echo "<script>alert('Đã sửa');window.history.go(-2);</script>";	
		}		
	}	
}
//******************************* end -  xu ly ************************************
?>

<?php
	function Getloaisp($idl)
	{
		$sql2 = "SELECT * from loaisanpham order by id_nhom ASC";
		$kq2 = mysql_query($sql2);
		$s2="";
		$n2=mysql_num_rows($kq2);
		if($n2>0){
		while($r2=mysql_fetch_array($kq2))
		{
			if($r2["id_loai"]==$idl)
				$s2.="<option value='".$r2["id_loai"]."' selected>";			
			else
				$s2.="<option value='".$r2["id_loai"]."'>";
			$s2.=$r2["tenloaisp"]."</option>";
		}
		}
		return $s2;
	}
	
	function Getmenu($idm)
	{
		$sql2 = "SELECT * from menu";
		$kq2 = mysql_query($sql2);
		$s2="";
		$n2=mysql_num_rows($kq2);
		if($n2>0){
		while($r2=mysql_fetch_array($kq2))
		{
			if($r2["id_menu"]==$idm)
				$s2.="<option value='".$r2["id_menu"]."' selected>";			
			else
				$s2.="<option value='".$r2["id_menu"]."'>";
			$s2.=$r2["tenmenu"]."</option>";
		}
		}
		return $s2;
	}
	
	function GetGhichu($id)
	{
		$sql2 = "SELECT * from sanpham where id='$id'";
		$kq2 = mysql_query($sql2);
		$s2="";
		$n2=mysql_num_rows($kq2);
		if($n2>0){
		while($r2=mysql_fetch_array($kq2))
		{
			if($r2["ghichu"]=="new"){
				$s2.="<option value='new' selected>";			
				$s2.="Mặt hàng mới";				
				$s2.="<option value='hienthi'>";
				$s2.="Hiển thị";
				$s2.="<option value='hangdat'>";
				$s2.="Hàng đặt";
				$s2.="</option>";
			}
			else{
				if($r2["ghichu"]=="hienthi"){
					$s2.="<option value='new'>";			
					$s2.="Mặt hàng mới";				
					$s2.="<option value='hienthi' selected>";
					$s2.="Hiển thị";
					$s2.="<option value='hangdat'>";
					$s2.="Hàng đặt";
					$s2.="</option>";
				}
				else{
					$s2.="<option value='new'>";			
					$s2.="Mặt hàng mới";				
					$s2.="<option value='hienthi'>";
					$s2.="Hiển thị";
					$s2.="<option value='hangdat' selected>";
					$s2.="Hàng đặt";
					$s2.="</option>";
				}
			}

		}
		}
		return $s2;
		
	}	
?>
<?php
	$id=$_GET["id"];
	$sql="select * from sanpham where id='$id'";
	$kq=mysql_query($sql);
	$n=mysql_num_rows($kq);
	if($n==0)
		echo "";
	else 
	{
		$r=mysql_fetch_array($kq);$id_loai=$r["id_loai"];$id_nhom=$r["id_nhom"];
		$tensp=$r["tensp"];$mota=$r["mota"];$hinh=$r["hinh"];
		$gia=$r["gia"];$ghichu=$r["ghichu"];$id_menu=$r["id_menu"];
	//	echo "$id_loai";
?>
<table width="740" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" class="tieude" align="center">UPDATE SẢN PHẨM</td>
  </tr>
  <form method="post" enctype="multipart/form-data">
  <tr bgcolor="#FFFFFF">
    <td width="200" style="padding-left:80px" height="30">Loại sản phẩm:</td>
    <td width="519">
    <?php
    if($id_loai!=0){
		echo "<select name=\"loaisp\" style=\"width:240px;\">"; 
		echo Getloaisp($id_loai);
		echo "</select>";
	}
	else{
		echo "<select name=\"menu\" style=\"width:240px;\">"; 
		echo Getmenu($id_menu);
		echo "</select>";
	}
    ?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:80px" height="30">Tên sản phẩm:</td>
    <td><input type="text" name="tensp" style="width:240px" value="<?php echo "$tensp"; ?>"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td style="padding-left:80px" height="30">Mô tả:</td>   
     <td><textarea name="mota" cols="27" rows="5"  style="width:240px"><?php echo "$mota" ?></textarea> </td>
  </tr>
  <tr>
  	  </tr>
  <tr>
    <td style="padding-left:80px" height="30">Hình ảnh:</td>
    <td height="80">    <input name="hinh" type="file" size="30">
<img align="middle" src="/sanpham/small/<?php echo "$hinh"; ?>" width="80" height="80">
 <input type="hidden" name="oldimage" value="<?php echo "$hinh"; ?>"> 
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td style="padding-left:80px" height="30">Giá:</td>
    <td><input name="gia" type="text" maxlength="20" style="width:240px" value="<?php echo "$gia"; ?>"></td>
  </tr>
  <tr>
    <td style="padding-left:80px" height="30">Ghi chú:</td>
    <td>
    <select name="ghichu" style="width:240px">
	<?php echo GetGhichu($id); ?>
    </select>
    </td>
  </tr>  
  <tr>
  	<td class="ketthuc" colspan="2" height="35">
    <input name="" type="submit" value="Update" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'">
    <input name="" type="reset" value="Reset" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'">    
    </td>
  </tr>
  <input type="hidden" name="act">
  <input type="hidden" name="id" value="<?php echo "$id"; ?>" />
  </form>
</table>
<?php 
	}
?>