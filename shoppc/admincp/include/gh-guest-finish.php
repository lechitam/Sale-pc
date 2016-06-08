<?php
	$query=mysql_query("select sanpham.*,hoadon.* from hoadon,sanpham where hoadon.id=sanpham.id");
	while($r_q=mysql_fetch_array($query))
	{
		$user_q=$r_q["hoten"];
		$soluong_q=$r_q["soluong"];
		$gia_q=$r_q["gia"];
		$tien_q=$soluong_q*$gia_q;$tien_q2=number_format($tien_q,0,'','.');
	//	echo "user|tongtien<hr>$user|$tien_q2<hr>";
	}
?>
<table width="735" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" class="tieude" align="center">DANH SÁCH ĐƠN HÀNG ĐÃ GIẢI QUYẾT CHO KHÁCH</td>
  </tr>  
  <tr height="30" bgcolor="#FFCC99">    
	  <td align="center" width="200" style="border-right:1px solid #333"><strong>Ngày đặt</strong></td>     
        <td align="center" width="200" style="border-right:1px solid #333"><strong>Khách hàng</strong></td>        
         <td align="center" width="265" style="border-right:1px solid #333"><strong>Tổng tiền</strong></td>
         <td align="center" width="70" style="border-right:1px solid #333">Chi tiết</td>
  </tr>  
  <?php
		$kq2=mysql_query("select count(*) from hoadon where tinhtrang='damua'"); 
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
  		$sql3="select hoten,ngaydat,sum(tongtien) as tongtien from hoadon where tinhtrang='damua' group by hoten,ngaydat limit $k,$pagesize";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$ngaydat=$r3["ngaydat"];$day=ConvertDate_time_db($ngaydat);
			$user3=$r3["hoten"];
			$tongtien3=$r3["tongtien"];
			$tt3=number_format($tongtien3,0,'','.');
			
?>
     <tr height="30">        
        <td align="center" width="200" style="border-bottom:1px solid #333; border-left:1px solid #333;border-right:1px solid #333;"><strong><?php echo "$day";?></strong></td> 
        <td align="center" width="200" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$user3";?></strong></td> 
        <td align="center" width="265" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$tt3 VND"; ?></strong></td>        
        <td align="center" width="70" style="border-right:1px solid #333; border-bottom:1px solid #333;"><a href="?m=dh&b=gh-guest-chitiet&u=<?php echo "$user3"; ?>&ngay=<?php echo "$ngaydat"; ?>">Xem</a></td> 
      </tr>  
<?php }
	}
  ?>  
  <tr>
   <td class="ketthuc" colspan="5">
<?php   
  //*******************************Xuất số trang*********************************
	if($numrow==0)
		echo "Hiện tại chưa có đơn hàng nào!";
	else{
    if($curseg>1)
        echo "<a href='?m=dh&b=get-guest-list-end&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
        $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
        for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
		{
			if($curpage==$i)
				echo "<a href='?m=dh&b=get-guest-list-end&page=".$i."'><font color='#FFFFFF'>[".$i."]</font></a> &nbsp;";
			else
				echo "<a href='?m=dh&b=get-guest-list-end&page=".$i."'>[".$i."]</a> &nbsp;";
		}
        if($curseg<$numseg)
		echo "<a href='?m=dh&get-guest-list-end&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";		
	}
?>
</td></tr>
</table>