<?php
$ten="";
if(isset($_POST["act"]))
{
	$ten=$_POST["ten"];	
	$id=getid();
	$check=mysql_query("select count(*) from nhomsanpham where tennhom='$ten'");
	$r=mysql_fetch_array($check);
	$n=$r[0];
	if($n!=0)
		echo "<script>alert('Lỗi!! Nhóm sản phẩm này đã có trong cơ sở dữ liệu!');window.history.go(-1);</script>";
	else{
	$sql="insert into nhomsanpham(id_nhom,tennhom) values ('$id','$ten')";
///	echo "$sql";
	$kq=mysql_query($sql);	
	if(!$kq)
		echo "<script>alert('Có lỗi xảy ra trong quá trình xử lý');window.history.go(-1);</script>";
	else{
		echo "<script>alert('Đã thêm');window.location='../admincp/?m=mn&b=nhomsp-list'</script>";
		$ten="";
	}
	}
}

?>
<table width="735" border="0" cellspacing="0" cellpadding="0">
<form method="POST" onsubmit="return nhomsp_insert(ten.value);" name="form" id="form">
  <tr>
    <td colspan="2" class="tieude" align="center">THÊM NHÓM SẢN PHẨM</td>
  </tr>  
  <tr bgcolor="#FFFFFF">
    <td width="250" style="padding-left:80px" height="30">Tên nhóm sản phẩm:</td>
    <td width="485">
    <input type="text" name="ten" style="width:240px" value="<?php echo "$ten"; ?>" />
    </td>
  </tr> 
  <tr>
  	<td align="center" colspan="2" height="35">
    <input name="" type="submit" value="Thêm" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'">
    <input name="" type="reset" value="Xóa trắng" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'">    
    </td>
  </tr>
  <input type="hidden" name="act">
  </form>
</table>
