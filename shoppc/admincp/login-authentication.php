<?php include "function.php"; ?>
<?php
	include("connect.php");
	if(!isset($_POST["user"])){	
		echo "<script>alert('Bạn chưa nhập tên đăng nhập');window.history.go(-1);</script>";
		//header("location:login.php");
	}
	else 
	{
		$user=EncodeSpecialChar($_POST["user"]);
		if (!isset($_POST["pass"])) {
			echo "<script>alert('Bạn chưa nhập mật khẩu');window.history.go(-1);</script>";
			//header("location:login.php");					
		}
		else
		{
			$pass=md5($_POST["pass"]);			
			$sql="select * from thanhvien where user='$user' and pass='$pass'";
			$kq=mysql_query($sql);
			$thanhvien=mysql_fetch_array($kq);
			$hieuluc=$thanhvien["hieuluc"];
			$n=mysql_num_rows($kq);
			if($n==0)
			{
				echo "<script>alert('Thông tin bạn nhập không chính xác!');window.history.go(-1);</script>";
				//header("location: login.php");
			}	
			else 
			{	
				if($hieuluc==1){
					if(!isset($_SESSION))
					session_start();
					$_SESSION["useradmin"]=$user;
					$_SESSION["success"]=true;
					$_SESSION['hotenadmin']=$thanhvien['hoten'];	
					$_SESSION["hieuluc"]=$thanhvien["hieuluc"];
					$_SESSION['capquyen']=$thanhvien["capquyen"];
					header("location:index.php?m=mn&b=nhomsp-list");
				}
				else echo"<script>alert('Bạn không có quyền truy cập!');window.location='login.php'</script>";
			}
		}
	}
?>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />