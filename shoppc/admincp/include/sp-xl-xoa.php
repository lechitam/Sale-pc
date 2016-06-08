<?php

	//$ma = implode($_POST["mcm"], ", ");
//	$ma = implode($_POST["chon"], ", ");
	$ma=$_POST["chon"];
//	echo "$ma<hr>";
	$count=count($ma);	
//	echo "$count";
	if($count=='')
		echo "<script>alert('Chưa chọn sản phẩm cần xóa!!!');window.history.go(-1);</script>";
	else
	{	
			for($i=0;$i<$count;$i++){
			/*echo "<script>window.confirm('Bạn chắc chắn muốn xóa sản phẩm này');</script> ";*/

			$sql3="Delete from sanpham where id='$ma[$i]'";			
			$kq3=mysql_query($sql3);				
			if(!$kq3)
				echo "<script>alert('Có lỗi trong khi xóa!!!');</script>";
			else
			{
				$n+=mysql_affected_rows();
				
			}			
			}
			echo "<script>alert('Đã xóa $n sản phẩm!');window.location='../admincp/?m=sp&b=sp-list';</script>";
			//echo "$sql3";
		
	}

?>