<?php include("check-login.php") ?>
<?php
	include "connect.php";
	//$ma = implode($_POST["mcm"], ", ");
	$macm=$_POST["chon"];	
	$count_cm=count($macm);
	if($count_cm==0)
		echo "<script>alert('Chưa chọn nhóm sản phẩm cần xóa!!!');window.location='../admincp/?m=mn&b=nhomsp-list';</script>";
	else
	{
		for($i=0;$i<$count_cm;$i++)
		{
			$sql="select * from nhomsanpham,loaisanpham where nhomsanpham.id_nhom=loaisanpham.id_nhom AND loaisanpham.id_nhom=$macm[$i]";
			$kq=mysql_query($sql);
			$numrow=mysql_num_rows($kq);
			$r=mysql_fetch_array($kq);
			$tencm=$r["tennhom"];
			if($numrow!=0){				
				$s[$i]=$tencm;										
			}
			else{
				$sql2="select * from nhomsanpham where id_nhom=$macm[$i]";
				$kq2=mysql_query($sql2);
				$r2=mysql_fetch_array($kq2);
				$xoatencm=$r2["tennhom"];
				$xoa_tencm[$i]=$xoatencm;
				$sql3="Delete from nhomsanpham where id_nhom=$macm[$i]";
				$kq3=mysql_query($sql3);				
				if(!$kq3)
					echo "<script>alert('Có lỗi trong khi xóa!!!');window.history.go(-1);</script>";
				else
				{
					$n+=mysql_affected_rows();
				}
			}

		}//end for
		if($n==0)
		{
			$ss=implode($s, ", ");
			echo "<script>alert('Không thể xóa nhóm sản phẩm: $ss! vì có các loại sản phẩm thuộc nhóm sản phẩm này');window.location='../admincp/?m=mn&b=nhomsp-list';</script>";	
		}
		else
		{
			if(isset($s))
			   $ss=implode($s, ", ");
			if($ss=="")
			{
				$xoa = implode($xoa_tencm, ", ");
				echo "<script>alert('Đã xóa nhóm sản phẩm: $xoa!');window.location='../admincp/?m=mn&b=nhomsp-list';</script>";			
			}
			else
			{
				$xoa = implode($xoa_tencm, ", ");
				echo "<script>alert('Không thể xóa nhóm sản phẩm: $ss! Đã xóa nhóm sản phẩm: \"$xoa\"!');window.location='../admincp/?m=mn&b=nhomsp-list';</script>";		
			}
		}
		
	}
	
?>
