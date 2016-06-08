<?php
	$idlh=$_GET["idlh"];
	
	$sql="delete from lienhe where id_lienhe='$idlh'";
	$kq=mysql_query($sql);
	if(!$kq)
		echo "<script>alert('Có lỗi trong khi xóa!!!');window.location='../admincp/?m=lienhe';</script>";
	else
	{
		$n=mysql_affected_rows();
		echo "<script>alert('Đã xóa'); window.history.go(-1);</script>";		
	}

?>