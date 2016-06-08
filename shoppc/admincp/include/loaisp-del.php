<?php
	$idl=$_GET["idl"];	
	$check=mysql_query("select count(*) from sanpham where id_loai='$idl'");
	$r=mysql_fetch_array($check);
	$n=$r[0];
	if($n!=0)
		echo "<script>alert('Không thể xóa!! vì có sản phẩm thuộc loại này');window.location='../admincp/?m=mn&b=loaisp-list';</script>";		
	else{
	$sql="delete from loaisanpham where id_loai='$idl'";
	$kq=mysql_query($sql);
	if(!$kq)
		echo "<script>alert('Có lỗi trong khi xóa!!!');window.location='../admincp/?m=mn&b=loaisp-list';</script>";
	else
	{
		$n=mysql_affected_rows();
		echo "<script>alert('Đã xóa');window.location='../admincp/?m=mn&b=loaisp-list';</script>";		
	}
	}

?>