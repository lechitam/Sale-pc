<?php
include "connect.php";
$act=""; $hoten=""; $cty=""; $email="";$dienthoai="";$fax="";$diachi=""; $noidung="";
if (isset($_POST["act"]))
{
$act=$_POST["act"];
$hoten=$_POST["hoten"];
$cty=$_POST["cty"];
$email=$_POST["email"];
$dienthoai=$_POST["dt"];
$fax=$_POST["fax"];
$diachi=$_POST["diachi"];
$noidung=$_POST["noidung"];
$now=date("Y-m-d H:i:s");
if(isset($act))
{    
		$sql="insert into lienhe(hoten,cty,email,dienthoai,fax,diachi,noidung,ngaylienhe) values ('$hoten','$cty','$email','$dienthoai','$fax','$diachi','$noidung','$now')";
		$kq=mysql_query($sql);	
		if(!$kq)
			{
				echo "<script>alert('Có lỗi SQL! Nhập lại!');</script>";		
			}
			else 
			{
				$n=mysql_affected_rows();
				echo "<script>alert('Cám ơn quý khách đã liên hệ với chúng tôi!');</script>";
			$act=""; $hoten=""; $cty=""; $email="";$dienthoai="";$fax="";$diachi=""; $noidung="";
				
			}
    }
}

?>
<div align="center" style="width:550px; line-height:25px; padding:5px;">
<div align="left">	Quý khách có thể liên hệ với chúng tôi bằng cách soạn thông tin theo mẫu sau. Rất mong những ý kiến đóng góp của quý khách để chúng tôi có thể phục vụ tốt hơn.<br>
  
  <form method="post" onSubmit="return lienhe(hoten.value,email.value,noidung.value,anti.value);" name="formlienhe" id="formlienhe">
  <table width="550" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30"><div style="padding-left:70px">Họ và tên:</div></td>
    <td><input name="hoten" type="text" size="35" maxlength="50" value="<?php echo $hoten;?>"></td>
  </tr>
  <tr>
    <td height="30"><div style="padding-left:70px">Công ty:</div></td>
    <td><input name="cty" type="text" size="35" maxlength="50" value="<?php echo $cty;?>"></td>
  </tr>
  <tr>
    <td height="30"><div style="padding-left:70px">Email:</div></td>
    <td><input name="email" type="text" size="35" maxlength="50" value="<?php echo $email;?>"></td>
  </tr>
  <tr>
    <td height="30"><div style="padding-left:70px">Số điện thoại:</div></td>
    <td><input name="dt" type="text" size="35" maxlength="50" value="<?php echo $dienthoai;?>" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"></td>
  </tr>
  <tr>
    <td height="30"><div style="padding-left:70px">Fax:</div></td>
    <td><input name="fax" type="text" size="35" maxlength="50" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"></td>
  </tr>
  <tr>
    <td height="30"><div style="padding-left:70px">Địa chỉ:</div></td>
    <td><input name="diachi" type="text" size="35" maxlength="50" value="<?php echo $diachi;?>"></td>
  </tr>
  <tr>
    <td height="120"><div style="padding-left:70px">Nội dung:</div></td>
    <td width="350" height="120"><textarea name="noidung" cols="35" rows="6" >  <?php echo $noidung;?></textarea></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center" height="30">
    <input type="submit" value="Gửi" class="button" onmouseover="style.background='url(images/button-2-o.gif)'" onmouseout="style.background='url(images/button-o.gif)'" >
	<input type="reset" value="Nhập lại" class="button" onmouseover="style.background='url(images/button-2-o.gif)'" onmouseout="style.background='url(images/button-o.gif)'" >
	<input type="hidden" name="act">
	</td>
  </tr>
</table>
</form>
</div>
</div>
