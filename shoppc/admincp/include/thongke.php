<table width="735" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="5" class="tieude" align="center">DANH SÁCH MẶT HÀNG ĐÃ BÁN</td>
  </tr>  
  <tr height="30" bgcolor="#FFCC99">        
        <td align="center" width="150" style="border-right:1px solid #333"><strong>Tên sản phẩm</strong></td>
        <td align="center" width="150" style="border-right:1px solid #333"><strong>Giá</strong></td>
        <td align="center" width="135" style="border-right:1px solid #333"><strong>Số lượng</strong></td>
        <td align="center" width="150" style="border-right:1px solid #333"><strong>Hình ảnh</strong></td>
         <td align="center" width="150" style="border-right:1px solid #333"><strong>Tổng tiền</strong></td>
  </tr>  
  <?php
		$kq2=mysql_query("select count(*) from giohang,sanpham,thanhvien where thanhvien.user=giohang.user AND giohang.id=sanpham.id and giohang.tinhtrang='damua'"); 
        $r2=mysql_fetch_array($kq2);
        $numrow=$r2[0];		
        //số record cho 1 trang
        $pagesize=20;
        //Tính tổng số trang
        $pagecount=ceil($numrow/$pagesize);			
        //Xác định số trang cho mỗi lần hiển thị
        $segsize=3;
        //Thiết lập trang hiện hành
        if(!isset($_GET["page"]))
			 $curpage=1;
        else	
        	 $curpage=$_GET["page"];
        if($curpage<1)
			 $curpage=1;
        if($curpage>$pagecount) $curpage=$pagecount;
        //Xác định số phân đoạn của trang
        $numseg=($pagecount % $segsize==0)?($pagecount/$segsize):(int)($pagecount/$segsize+1);
        //Xác định phân đoạn hiện hành của trang
        $curseg=($curpage % $segsize==0)?($curpage/$segsize):(int)($curpage/$segsize+1);   
		$k=($curpage-1)*$pagesize;
		
//******************************** Nội Dung ********************************//
  		$sql3="select * from giohang,sanpham,thanhvien where thanhvien.user=giohang.user AND giohang.id=sanpham.id and giohang.tinhtrang='damua' limit $k,$pagesize";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
		$hoten3=$r3["hoten"];$tensp3=$r3["tensp"];
		$gia3=$r3["gia"];$gia32=number_format($gia3,0,'','.');
		$soluong3=$r3["soluongban"];$hinh3=$r3["hinh"];
		$tong=$gia3*$soluong3;$tong2=number_format($tong,0,'','.');
		$tongtien+=$tong;$tongtien2=number_format($tongtien,0,'','.');
?>
     <tr height="30">        
        <td align="center" width="285" style="border-right:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333"><strong><?php echo "$tensp3";?></strong></td>
        <td align="center" width="150" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$gia32 VND"; ?></strong></td>
        <td align="center" width="150" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$soluong3"; ?></strong></td>
		<td align="center" width="150" style="border-right:1px solid #333; border-bottom:1px solid #333;"><img src="/sanpham/small/<?php echo "$hinh3"; ?>" width="90" height="90"></td>        
        <td align="center" width="150" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$tong2 VND"; ?></strong></td>        
      </tr>  
<?php }
	}
  ?>
  <tr>
  	<td align="right" colspan="5" height="30" style="border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333; padding-right:10px"><strong>Tổng doanh thu: <?php echo "$tongtien2 VND"; ?></strong></td>
  </tr>
  <tr>
   <td class="ketthuc" colspan="5">
<?php   
  //*******************************Xuất số trang*********************************
	if($numrow==0)
		echo "Hiện tại không có sản phẩm nào!";
	else{
    if($curseg>1)
        echo "<a href='?b=lsp&idl=$id_loai&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
        $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
        for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
		{
			if($curpage==$i)
				echo "<a href='?b=lsp&idl=$id_loai&page=".$i."'><font color='#FFFFFF'>[".$i."]</font></a> &nbsp;";
			else
				echo "<a href='?b=lsp&idl=$id_loai&page=".$i."'>[".$i."]</a> &nbsp;";
		}
        if($curseg<$numseg)
		echo "<a href='?b=lsp&idl=$id_loai&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";		
	}
?>
</td></tr>
</table>