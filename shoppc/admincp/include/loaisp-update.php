<?php
$ten="";
if(isset($_POST["act"]))
{
	$ten=$_POST["ten"];	
	$idl=$_POST["idl"];$nhomsp=$_POST["nhomsp"];
	$sql="update loaisanpham SET id_nhom='$nhomsp',tenloaisp='$ten' where id_loai='$idl'";
	$kq=mysql_query($sql);	
	if(!$kq)
		echo "<script>alert('Có lỗi xảy ra trong quá trình xử lý');window.history.go(-1);</script>";
	else{
		echo "<script>alert('Đã sửa');window.location='../admincp/?m=mn&b=loaisp-list'</script>";
		$ten="";	
	}
}

?>
<?php
	function Getnhomsp($idn)
	{
		$sql2 = "SELECT * from nhomsanpham order by id_nhom ASC";
		$kq2 = mysql_query($sql2);
		$s2="";
		$n2=mysql_num_rows($kq2);
		if($n2>0){
		while($r2=mysql_fetch_array($kq2))
		{
			if($r2["id_nhom"]==$idn)
				$s2.="<option value='".$r2["id_nhom"]."' selected>";			
			else
				$s2.="<option value='".$r2["id_nhom"]."'>";
			$s2.=$r2["tennhom"]."</option>";
		}
		}
		return $s2;
	}
?>	
<?php
	$idl=$_GET["idl"];
	$sql=mysql_query("select nhomsanpham.*,loaisanpham.* from nhomsanpham,loaisanpham where nhomsanpham.id_nhom=loaisanpham.id_nhom and loaisanpham.id_loai=$idl");
	$r=mysql_fetch_array($sql);
	$ten=$r["tenloaisp"];$idn=$r["id_nhom"];
?>
<table width="735" border="0" cellspacing="0" cellpadding="0">
<form method="POST">
  <tr>
    <td colspan="2" class="tieude" align="center">SỬA LOẠI SẢN PHẨM</td>
  </tr> 
   <tr bgcolor="#FFFFFF">
    <td width="250" style="padding-left:80px" height="30">Nhóm sản phẩm:</td>
    <td width="485">
    <select name="nhomsp" style="width:240px;">
      <option value="chonmenu">-- Chọn nhóm sản phẩm --</option>
      <?php 
		include("connect.php");
		echo Getnhomsp($idn);
	  ?>
    </select>
    </td>
  </tr>  
  <tr bgcolor="#FFFFFF">
    <td width="250" style="padding-left:80px" height="30">Tên nhóm sản phẩm:</td>
    <td width="485">
    <input type="text" name="ten" style="width:240px" value="<?php echo "$ten"; ?>" />
    </td>
  </tr> 
  <tr>
  	<td  align="center" colspan="2" height="35">
    <input name="" type="submit" value="Sửa" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'">
    <input name="" type="reset" value="Xóa trắng" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'">    
    </td>
  </tr>
  <input type="hidden" name="act">
  <input type="hidden" name="idl" value="<?php echo "$idl"; ?>" />
  </form>
</table>
