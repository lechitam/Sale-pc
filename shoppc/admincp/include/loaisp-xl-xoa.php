<?php include("check-login.php") ?>
<?php
	include "connect.php";
	//$ma = implode($_POST["mcmn"], ", ");
	$macmn=$_POST["chon"];
	$count_cmn=count($macmn);
	if($count_cmn==0)
		echo "<script>alert('Chưa chọn loại sản phẩm cần xóa!!!');window.location='../admincp/?m=mn&b=loaisp-list';</script>";
	else{
		for($i=0;$i<$count_cmn;$i++)
		{
			$same="select * from sanpham,loaisanpham where sanpham.id_loai=loaisanpham.id_loai AND sanpham.id_loai=$macmn[$i]";
			$kq_same=mysql_query($same);
			$numrow=mysql_num_rows($kq_same);
			$r_same=mysql_fetch_array($kq_same);
			$tencmn=$r_same["tenloaisp"];
			if($numrow!=0){				
				$s[$i]=$tencmn;				
			}
			else{
				$query="select * from loaisanpham where id_loai=$macmn[$i]";
				$kq_query=mysql_query($query);
				$r_query=mysql_fetch_array($kq_query);
				$xoa_tencmn[$i]=$r_query["tenloaisp"];
				$sql="Delete from loaisanpham where id_loai=$macmn[$i]";
				$kq=mysql_query($sql);				
				if(!$kq)
					echo "<script>alert('Có lỗi trong khi xóa!!!');window.history.go(-1)';</script>";
				else
				{
					$n=mysql_affected_rows();					
				}
			}
		}//end for	
		if($n==0)
		{
			$ss=implode($s, ", ");
			echo "<script>alert('Không thể xóa loại sản phẩm: $ss! vì có các sản phẩm thuộc loại sản phẩm này');window.location='../admincp/?m=mn&b=loaisp-list';</script>";	
		}
		else
		{
			if(isset($s))
			   $ss=implode($s, ", ");
			if($ss=="")
			{
				$xoa = implode($xoa_tencmn, ", ");
				echo "<script>alert('Đã xóa loại sản phẩm: $xoa!');window.location='../admincp/?m=mn&b=loaisp-list';</script>";			
			}
			else
			{
				$xoa = implode($xoa_tencmn, ", ");
				echo "<script>alert('Không thể xóa loại sản phẩm: $ss! Đã xóa loại sản phẩm: \"$xoa\"!');window.location='../admincp/?m=mn&b=loaisp-list';</script>";		
			}
		}	
	}//end else! đã chọn chuyên mục nhỏ cần xóa
?>
