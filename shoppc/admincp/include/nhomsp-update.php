<?php
$ten="";
if(isset($_POST["act"]))
{
	$ten=$_POST["ten"];	
	$idn=$_POST["idn"];
	$check=mysql_query("select count(*) from nhomsanpham where tennhom='$ten'");
	$r=mysql_fetch_array($check);
	$n=$r[0];
	if($n!=0)
		echo "<script>alert('Lỗi!! Nhóm sản phẩm này đã có trong cơ sở dữ liệu!');window.history.go(-1);</script>";
	else{
	$sql="update nhomsanpham SET tennhom='$ten' where id_nhom='$idn'";
///	echo "$sql";
	$kq=mysql_query($sql);	
	if(!$kq)
		echo "<script>alert('Có lỗi xảy ra trong quá trình xử lý');window.history.go(-1);</script>";
	else{
		echo "<script>alert('Đã sửa');window.location='../admincp/?m=mn&b=nhomsp-list'</script>";
		$ten="";
	}
	}
}

?>
<?php
	$idn=$_GET["idn"];
	$sql=mysql_query("select * from nhomsanpham where id_nhom=$idn");
	$r=mysql_fetch_array($sql);
	$ten=$r["tennhom"];
?>
<table width="735" border="0" cellspacing="0" cellpadding="0">
<form method="POST">
  <tr>
    <td colspan="2" class="tieude" align="center">SỬA NHÓM SẢN PHẨM</td>
  </tr>  
  <tr bgcolor="#FFFFFF">
    <td width="250" style="padding-left:80px" height="30">Tên nhóm sản phẩm:</td>
    <td width="485">
    <input type="text" name="ten" style="width:240px" value="<?php echo "$ten"; ?>" />
    </td>
  </tr> 
  <tr>
  	<td bgcolor="#2d94ff" align="center" colspan="2" height="35">
    <input name="" type="submit" value="Sửa" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'">
    <input name="" type="reset" value="Xóa trắng" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'">    
    </td>
  </tr>
  <input type="hidden" name="act">
  <input type="hidden" name="idn" value="<?php echo "$idn"; ?>" />
  </form>
</table>
