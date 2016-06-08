<?php
if(isset($_POST["act"]))
{
	if(isset($_POST["giaiquyet"]))
	{
		$id_form=$_POST["id_form"];
		$id2=implode($id_form,",");
//		echo "$id2<hr>";
		$soluong=$_POST["soluong"];
//		$sl=implode($soluong,",");
		
//		echo "$sl<hr>";
		$chon=$_POST["chon"];
		$count=count($chon);
//		echo "$count<hr>";
		if($count==0)
			echo "<script>alert('Chưa chọn sản phẩm để giải quyết');</script>";
		else{
			for($i=0;$i<$count;$i++)
			{
				$sql4="update hoadon set tinhtrang='damua' where id_hoadon='$chon[$i]' and tinhtrang='dathang' ";
				$kq4=mysql_query($sql4);
			
				$sql5="select * from hoadon where id_hoadon='$chon[$i]'";				
				$kq5=mysql_query($sql5);
				while($r5=mysql_fetch_array($kq5))
				{
					$id5=$r5["id"];$sl5=$r5["soluong"];					
					$sql7="select * from sanpham where id='$id5'";
					$kq7=mysql_query($sql7);
					while($r7=mysql_fetch_array($kq7))
					{
					$sl7=$r7["soluongban"];
					$sum[$i]=$sl7+$sl5;
//					echo "sl5: $sl5<hr>";
					$sql6="update sanpham set soluongban=$sum[$i] where id='$id5''";					
					$kq6=mysql_query($sql6);	
//echo "sql5: $sql5<hr>sql7: $sql7<hr>sql6: $sql6<hr>";
					}
				}	
			}
				
		}
	}
	if(isset($_POST["xoa"]))
	{
		$chon=$_POST["chon"];
	//	$id_hoadon=$_POST["id_hoadon"];
		$count=count($chon);
		if($count==0)
			echo "<script>alert('Chưa chọn sản phẩm để xóa');</script>";
		else{
			for ($j=0;$j<$count;$j++)
			{	
				$SQL_xoagiohang = "DELETE FROM hoadon WHERE id_hoadon='$chon[$j]' and tinhtrang='dathang'";
			//	echo "$SQL_xoagiohang";
				$kq_xoagiohang=mysql_query($SQL_xoagiohang);
				$n+=mysql_affected_rows();
			}					
		}		
	
	}
}
//*******************************end- process *************************************
?>

<table width="735" border="0" cellspacing="0" cellpadding="0">
<form method="post">
  <tr>
    <td colspan="7" class="tieude" align="center">DANH SÁCH ĐƠN HÀNG CỦA KHÁCH CHỜ GIẢI QUYẾT</td>
  </tr>  
  <tr height="30" bgcolor="#FFCC99">
        <td align="center" width="50" style="border-left:1px solid #333;border-right:1px solid #333"><strong>Chọn</strong></td>
        <td align="center" width="150" style="border-right:1px solid #333"><strong>Ngày đặt</strong></td>
        <td align="center" width="140" style="border-right:1px solid #333"><strong>Khách Hàng</strong></td>
        <td align="center" width="145" style="border-right:1px solid #333"><strong>Tên sản phẩm</strong></td>        
        <td align="center" width="100" style="border-right:1px solid #333"><strong>Số lượng </strong></td>
        <td align="center" width="150" style="border-right:1px solid #333"><strong>Giá</strong></td>        
  </tr>
  <?php
        $kq2=mysql_query("select count(*) from giohang,sanpham where giohang.id=sanpham.id and giohang.tinhtrang='dathang'"); 
        $r2=mysql_fetch_array($kq2);
        $numrow=$r2[0];		
        //số record cho 1 trang
        $pagesize=20;
        //Tính tổng số trang
        $pagecount=ceil($numrow/$pagesize);			
        //Xác định số trang cho mỗi lần hiển thị
        $segsize=5;
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
		
	//******************************** Nội Dung *********************************//  

  	$sql="select hoadon.*,sanpham.* from hoadon,sanpham where hoadon.id=sanpham.id and hoadon.tinhtrang='dathang' order by ngaydat DESC limit $k,$pagesize";
	//echo "$sql";
	$kq=mysql_query($sql);
	if(!$kq)
		echo "";
	else{
	while($r=mysql_fetch_array($kq))
	{
		$id=$r["id"];

		$id_hoadon=$r["id_hoadon"];$hinhanh=$r["hinh"];
		
		$hoten=$r["hoten"];$tensp=$r["tensp"];$gia=$r["gia"];$gia2=number_format($gia,0,'','.');
		$soluong=$r["soluong"];$ngaydat=ConvertDate_time_db($r["ngaydat"]);
		$diachi=$r["diachi"];$email=$r["email"];$dt=$r["dienthoai"];
		$str_dt=strlen($dt); 
		if($str_dt==9) $t="0".$dt;
		else	$t="".$dt;
?>
     <tr height="30">
        <td align="center" width="50" style="border-left:1px solid #333;border-right:1px solid #333;border-bottom:1px solid #333;"><strong>
        <input type="checkbox" name="chon[]" value="<?php echo "$id_hoadon"; ?>">        
        </strong></td>
         <td align="center" width="150" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong></strong><?php echo "$ngaydat"; ?></strong></td>
        <td align="center" width="140" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><a onmouseover="Tip('<?php echo "Họ tên: $hoten<hr>Địa chỉ: $diachi<hr>Email: $email<hr>Điện thoại: $t"; ?>')"><?php echo "$hoten";?></a></strong></td>
        <td align="center" width="145" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$tensp";?></strong></td>       
        <td align="center" width="100" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$soluong"; ?></strong></td>
        <td align="center" width="150" style="border-right:1px solid #333; border-bottom:1px solid #333;"><strong><?php echo "$gia2 VND"; ?></strong></td>        
      </tr>  
  <input type="hidden" name="soluong[]" value="<?php echo "$soluong"; ?>">
  <input type="hidden" name="id_form[]" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="act">

<?php
	}
	}
  ?>
  <tr>
  	<td class="ketthuc" colspan="7">    
<?php
    if($numrow==0)
		echo "Hiện tại không có đơn đặt hàng nào!";
	else{  
?>  
<table width="735" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" >
    <input type="submit" name="giaiquyet" value="Giải Quyết" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'" onclick="document.form.submit();">
    <input type="submit" name="xoa" value="Xóa" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'" onclick="return check()"></td>
     <td width="400" align="right">
<?php 
    if($curseg>1)
        echo "<a href='?m=dh&b=gh-list&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
        $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
        for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
		{
			if($curpage==$i)
				echo "<a href='?m=dh&b=gh-list&page=".$i."'><font color='#FF0000'>[".$i."]</font></a> &nbsp;";
			else
				echo "<a href='?m=dh&b=gh-list&page=".$i."'><font color='#FFF'>[".$i."]</font></a> &nbsp;";
		}
        if($curseg<$numseg)
		echo "<a href='?m=dh&b=gh-list&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";		
	}
?>
			</td> 
         </tr>
        </table>
     </td>
  </tr>
</form>
</table>