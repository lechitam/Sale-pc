<?php
	if(!isset($_SESSION))
		session_start();
	if(!isset($_SESSION["success"]))
		header("location:login.php");	
	if($_SESSION["capquyen"]!=1)
		echo "<script>alert('Tài khoản này không được quyền truy cập trang quản trị');window.location='login.php';</script>";
?>