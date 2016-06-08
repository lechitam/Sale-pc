<?php
if(isset($_POST["act"]))
{
	$user=$_POST["user"];
	$sql="SELECT * FROM thanhvien where user='$user'";
	$result_thanhvien2=mysql_query($sql);
	$row=mysql_fetch_array($result_thanhvien2);
	$db_matkhau=$row["pass"]; 	  
	
	$pw=$_POST['pw'];
	$pw=EncodeSpecialChar($pw);
	$pww=md5($pw);
	
	$pw_old=md5($_POST['pw_old']);	

	if(strlen($pw)<6)
		echo "<script>alert('Mật khẩu mới phải lớn hơn 6 ký tự'); window.location='../admincp/?m=changepw';</script>";
	else
	{
		if ($pw_old==$db_matkhau)
		{
			$pw=md5($pw);	
			$result_changepw = mysql_query("UPDATE thanhvien SET pass='$pww' WHERE user='$user'");
			echo "<script>alert('Đổi mật khẩu thành công.'); window.location='../admincp/index.php';</script>";
		}
		else echo "<script>alert('Mật khẩu cũ bị sai'); window.location='../admincp/?m=changepw';</script>";
	}
}
?>

<?php
$ss_tendangnhap=$_SESSION['user'];
$idkey=EncodeSpecialChar($ss_tendangnhap);
$result_thanhvien=mysql_query("SELECT * FROM thanhvien where user='$idkey'");
$row=mysql_fetch_array($result_thanhvien);
$db_user=$row["user"]; 
?>
<form name="form1" method="post" onSubmit="return admin_changepw(pw_old.value,pw.value,cpw.value);">
<table border="0" width="960" cellpadding="0" cellspacing="0" style="padding-top:5px ">
<tr bgcolor="#d4340c" style="color:#0B55C4; font-family:Tahoma; font-size: 13px; font-weight:bold" align="center" height="30">
<td class="tieude">ĐỔI MẬT KHẨU</td>
</tr>
</table>

   <table width="960"  border="0" cellpadding="5" cellspacing="1">
 <tr height="30" bgcolor="#FFFFFF" onmouseover="style.background='FFCC99'" onmouseout="style.background='#FFFFFF'">
      <td style="padding-left:250px" align="left">Tên đăng nhập:</td>
      <td width="500" align="left"><?php echo $db_user; ?>
      <input type="hidden" name="user" value="<?php echo $db_user;?>" />
      </td>
    </tr>
	<tr height="30" bgcolor="#FFFFFF" onmouseover="style.background='#d4340c'" onmouseout="style.background='#FFFFFF'">
      <td style="padding-left:250px">Mật khẩu cũ: </td>
      <td><input name="pw_old" type="password" id="pw_old" /></td>
    </tr>
	<tr height="30" bgcolor="#FFFFFF" onmouseover="style.background='#d4340c'" onmouseout="style.background='#FFFFFF'">
      <td style="padding-left:250px">Mật khẩu:</td>
      <td><input name="pw" type="password" id="pw" /></td>
    </tr>
	<tr height="30" bgcolor="#FFFFFF" onmouseover="style.background='#d4340c'" onmouseout="style.background='#FFFFFF'">
      <td style="padding-left:250px">Viết lại mật khẩu:</td>
      <td><input name="cpw" type="password" id="cpw" /></td>
    </tr>
    <tr height="30" bgcolor="#FFFFFF" onmouseover="style.background='#FFF'" onmouseout="style.background='#FFFFFF'">
      <td colspan="2" align="center" class="ketthuc">
	 <input type="submit" name="Thực hiện" value="Thực hiện" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'" onclick="document.form.submit();">
    <input type="submit" name="xoa" value="Xóa" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'" onclick="return check()">
        <input name="act" type="hidden" value="act" /></td>
    </tr>
  </table>
  <input type="hidden" name="act" />
</form>

