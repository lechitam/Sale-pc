<?php
 ////////////////////////////
$ss_tendangnhap=$_SESSION['user'];
$idkey=EncodeSpecialChar($ss_tendangnhap);
$result_thanhvien=mysql_query("SELECT * FROM thanhvien where user='$idkey'");
$row=mysql_fetch_array($result_thanhvien);
$db_user=$row["user"]; 
?>
<?php
if(isset($_POST["act"])){	
	$user=$_POST["user"];
	$sql="SELECT * FROM thanhvien where user='$user'";
	$result_thanhvien2=mysql_query($sql);
	$row2=mysql_fetch_array($result_thanhvien2);
	$db_matkhau=$row2["pass"]; 	  
	
	$pw=$_POST['pw'];
	$pw=EncodeSpecialChar($pw);
	$pww=md5($pw);
	
	$pw_old=md5($_POST['pw_old']);	
	if(strlen($pw)<6)
		echo "<script>alert('Mật khẩu mới phải lớn hơn 6 ký tự');</script>";
	else
	{
		if ($pw_old==$db_matkhau)
		{
			$pw=md5($pw);	
			$result_changepw = mysql_query("UPDATE thanhvien SET pass='$pww' WHERE user='$user'");
			echo "<script>alert('Đổi mật khẩu thành công.'); window.location='index.php';</script>";
		}
		else echo "<script>alert('Đổi mật khẩu thất bại! Kiểm tra lại mật khẩu cũ'); window.history.go(-1);</script>";
	}
}
?>
<form method="post" name="formthanhvien" id="formthanhvien" onSubmit="return thanhvien_changepw(pw_old.value,pw.value,cpw.value);">
<table border="0" width="560" cellpadding="0" cellspacing="0" style="border:1px solid #CCCCCC ">
<tr class="tieude" align="center" height="35">
<td colspan="2" >ĐỔI MẬT KHẨU</td>
</tr>
 <tr height="30" bgcolor="#F9F9F9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">
      <td style="padding-left:100px" align="left">Tên đăng nhập:</td>
      <td width="300" align="left"><?php echo $db_user; ?>
      <input type="hidden" name="user" value="<?php echo $db_user;?>" />
      </td>
    </tr>
	<tr height="30" bgcolor="#F9F9F9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">
      <td style="padding-left:100px">Mật khẩu cũ: </td>
      <td><input name="pw_old" type="password" id="pw_old" style="width:220px"/></td>
    </tr>
	<tr height="30" bgcolor="#F9F9F9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">
      <td style="padding-left:100px">Mật khẩu mới:</td>
      <td><input name="pw" type="password" id="pw" style="width:220px"/></td>
    </tr>
	<tr height="30" bgcolor="#F9F9F9" onmouseover="style.background='#d4340c'" onmouseout="style.background='#F9F9F9'">
      <td style="padding-left:100px">Viết lại mật khẩu:</td>
      <td><input name="cpw" type="password" id="cpw" style="width:220px"/></td>
    </tr>
    <tr>
      <td height="35" colspan="2" align="center">
        <input type="submit" value="Đồng ý" class="button" onmouseover="style.background='url(images/button-2-o.gif)'" onmouseout="style.background='url(images/button-o.gif)'" >
	<input type="reset" value="Nhập lại" class="button" onmouseover="style.background='url(images/button-2-o.gif)'" onmouseout="style.background='url(images/button-o.gif)'" >
        <input name="act" type="hidden" value="act" /></td>
    </tr>
  </table>
</form>

