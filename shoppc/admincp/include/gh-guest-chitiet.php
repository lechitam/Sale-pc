<table width="735" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="6" class="tieude" align="center">THÔNG TIN CHI TIẾT</td>
      </tr>  
      <tr height="30" bgcolor="#FFCC99">
            <td align="center" width="150" style="border-left:1px solid #333; border-right:1px solid #333"><strong>Ngày đặt</strong></td>
            <td align="center" width="140" style="border-right:1px solid #333"><strong>Khách Hàng</strong></td>
            <td align="center" width="145" style="border-right:1px solid #333"><strong>Tên sản phẩm</strong></td>        
            <td align="center" width="100" style="border-right:1px solid #333"><strong>Số lượng </strong></td>
            <td align="center" width="100" style="border-right:1px solid #333"><strong>Tổng tiền </strong></td>
            <td align="center" width="100" style="border-right:1px solid #333"><strong>Giá</strong></td>                    
         </tr>
<?php
	$u=$_GET["u"];
	$nd=$_GET["ngay"];
	$sql="select hoadon.*,sanpham.* from sanpham,hoadon where sanpham.id=hoadon.id and hoadon.hoten='$u' and hoadon.ngaydat='$nd'";
	$kq=mysql_query($sql);
//	echo "$sql";	
	while($r=mysql_fetch_array($kq))
	{
		$users=$r["hoten"];$ngaydat=ConvertDate_time_db($r["ngaydat"]);
		$diachi=$r["diachi"];$email=$r["email"];$dt=$r["dienthoai"];
		$tensp=$r["tensp"];$soluong=$r["soluong"];$hinhanh=$r["hinh"];;
		$tongtien=$r["tongtien"];$tt=number_format($tongtien,0,'','.');
		$gia=$r["gia"];$gia2=number_format($gia,0,'','.');
		$sum+=$tongtien;$s=number_format($sum,0,'','.');
?>		
	
        <tr height="30">
             <td align="center" width="150" style="border-left:1px solid #333;border-right:1px solid #333; border-bottom:1px solid #333;"><strong></strong><?php echo "$ngaydat"; ?></strong></td>
            <td align="center" width="140" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><a onmouseover="Tip('<?php echo "Họ tên: $users<hr>Địa chỉ: $diachi<hr>Email: $email<hr>Điện thoại: $dt"; ?>')"><?php echo "$users";?></a></strong></td>
            <td align="center" width="145" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$tensp";?></strong></td>       
            <td align="center" width="100" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$soluong"; ?></strong></td>
            <td align="center" width="100" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$tt VND"; ?></strong></td>
            <td align="center" width="100" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$gia2 VND"; ?></strong></td> 
         </td>
 	 </tr>
  
<?php	
	}

?>	
<tr>
	<td colspan="6" align="center" style=" padding-right:10px; color:#FF0000">Tổng giá trị đơn hàng: <?php echo "$s VND"; ?> </td>
</tr>
<tr>
	<td colspan="6" align="right" style=" padding-right:10px; color:#000099"><a href="#" onClick="window.history.go(-1);"><strong>&laquo; Trở lại</strong></a></td>
</tr>
</table>  