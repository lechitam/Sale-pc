<?php
$act=""; $hoten=""; $diachi=""; $email="";$dienthoai="";
if(isset($_POST["act"]))
{
	include "connect.php";
	$hoten=$_POST["hoten"];
	$hoten=EncodeSpecialChar($hoten);
	$diachi=$_POST["diachi"];
	$diachi=EncodeSpecialChar($diachi);	
	$email=$_POST["email"];
	$email=EncodeSpecialChar($email);
	$dienthoai=$_POST["dienthoai"];
	$dienthoai=EncodeSpecialChar($dienthoai);		
	$anti=$_POST['anti'];  
	
	{    
    		
		$sql="update thanhvien set hoten='$hoten',email='$email',dienthoai='$dienthoai',diachi='$diachi' where user='$user'";
		$kq=mysql_query($sql);
		if(!$kq)
		{
			echo "<script>alert('Có lỗi SQL! Nhập lại!');</script>";		
		}
		else 
		{
			echo "<script>alert('Quý khách đã thay đổi thông tin cá nhân thành công! ');window.location='index.php?b=ttcn';</script>";
		}	
	}
}
?>

<?php
$user=$_SESSION["user"];
$sql="select * from thanhvien where user='$user'";
$kq=mysql_query($sql);
$r=mysql_fetch_array($kq);
$hoten=$r["hoten"];$email=$r["email"];$diachi=$r["diachi"];$dienthoai=$r["dienthoai"];
?>
<div align="center">
<form method="post" onSubmit="return thanhvien_change(hoten.value,email.value,diachi.value,anti.value);" id="formthanhvien" name="formthanhvien">
        <table width="560" cellspacing="0" cellpadding="0" bordercolordark="#FFFFFF" style="border:1px solid #CCC;">
          <tr>
            <td height="35" colspan="2" align="center" class="tieude"><div align="center"><font color="#FFFFFF">THAY ĐỔI THÔNG TIN CÁ NHÂN - <?php echo "$user"; ?></font></div></td>
          </tr>
		  <tr bgcolor="#f9f9f9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">  
            <td height="50" style="padding-left:70px"><div align="left" style="width:120px">Tên đăng nhập:</div></td>
 			<td width="405" style="padding-left:15px" align="left">
                <?php echo "$user"; ?>
				<div id="kqkiemtra"></div>
              </td>            
          </tr>		  
          <tr onmouseover="style.background='#d4340c'" onmouseout="style.background='#FFFFFF'">            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Họ tên:</div></td>
     		<td width="405" style="padding-left:15px">
       		  <div align="left">
       		    <input type="text" name="hoten" style="width:220px" value="<?php echo "$hoten"; ?>"/>
   		      <font color="#FF0000">*</font></div></td>            
          </tr>
          <tr bgcolor="#f9f9f9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Email:</div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
                <input type="text" name="email" style="width:220px" value="<?php echo "$email"; ?>"/>
              <font color="#FF0000">*</font></div></td>            
          </tr>
          <tr onmouseover="style.background='#d4340c'" onmouseout="style.background='#FFFFFF'">   
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Địa chỉ:</div></td>
 			<td width="405" style="padding-left:15px" valign="top" align="left">              
                <textarea name="diachi" rows="6" style="width:220px"><?php echo "$diachi"; ?></textarea>
              <font color="#FF0000">*</font></td>            
          </tr>       
          <tr bgcolor="#f9f9f9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Điện thoại:</div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
                <input type="text" name="dienthoai" style="width:220px" value="<?php echo "$dienthoai"; ?>" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"/>
              <font color="#FF0000">*</font></div></td>            
          </tr>
         
          <tr>
            <td height="35" colspan="2" align="center" bgcolor="#fff">
              <div align="center">
                <input type="submit" value="Sửa" class="button" onmouseover="style.background='url(images/button-2-o.gif)'" onmouseout="style.background='url(images/button-o.gif)'" >
	<input type="reset" value="Nhập lại" class="button" onmouseover="style.background='url(images/button-2-o.gif)'" onmouseout="style.background='url(images/button-o.gif)'" >	
    		<input type="hidden" name="act"/>
            </div></td>
          </tr>
        </table>
</form>
</div>    