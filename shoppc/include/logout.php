<?php
	if(!isset($_SESSION))
		session_start();
		unset($_SESSION["success"]);
		unset($_SESSION["user"]);
		header("location:../index.php");
?>