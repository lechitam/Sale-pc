<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body{background: url(img/nen.jpg) no-repeat top center fixed;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quảng trị đăng nhập</title>

</head>
<body onload="onload();">
<form id="login-form" method="POST" action="login-authentication.php">
   <fieldset>
		
			<legend><h1><font color="#FFFFFF">Đăng nhập quản trị</font></h1></legend>
			<center><table width="304" border="0" >
			  <tr>
			    <td><label for="login"><font color="#FFFFFF">Tên đăng nhập:</font></label></td>
			    <td><input type="text" id="user" name="user" /></td>
		      </tr>
			  <tr>
			    <td><label for="password2"><font color="#FFFFFF">Mật khẩu:</font></label></td>
			    <td><input type="password" id="pass" name="pass"/></td>
		      </tr>
			  <tr >
			    <td>&nbsp;</td>
			    <td><input name="input" type="reset" value="Đặt lại"/>			      <input type="submit"  class="button" name="commit" value="Đăng nhập"/></td>
		      </tr>
     </table>
				
			<div class="clear"></div>
			
			<br />
   </fieldset>
</form>   
</body>
</html>