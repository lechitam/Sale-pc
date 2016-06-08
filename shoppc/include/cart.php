<?php
if(isset($_POST["xoagiohang"]))
	{
		$xoa=$_POST["xoa"];			
		$xoacount=count($_POST["xoa"]);
		if($xoacount==0)
			echo "<script>alert('Chưa chọn sản phẩm cần xóa');</script>";
		else{
			for ($j=0;$j<$xoacount;$j++)
			{	
				$SQL_xoagiohang = "DELETE FROM giohang WHERE user='$user' and id='$xoa[$j]' and tinhtrang='dathang'";
				$kq_xoagiohang=mysql_query($SQL_xoagiohang);
				$n+=mysql_affected_rows();
			}				
	
			echo "<script>alert('Đã xóa $n sản phẩm!');</script>";
		}
		
	}
  ?>
<?php
	include("connect.php");
  	$user=$_SESSION["user"];	
	function print_option($sql)
	{
		$kq=mysql_query($sql);
		while ($r=mysql_fetch_array($kq))
		{
			$ngay=ConvertDate_time_db($r["ngaydat"]);
			echo "<option value=$r[0]> $ngay  </option>";
		}
	}
?>
<table width="560" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #333">
<form method="post" name="form">
  <tr>
    <td colspan="6" class="tieude" align="center">DANH SÁCH CÁC MẶT HÀNG ĐÃ ĐẶT</td>
  </tr>  
  <tr bgcolor="#ffcc99" align="center" height="30" style="font-weight:bold">
    <td width="50" style="border-right:1px solid #666">STT</td>
    <td width="110" style="border-right:1px solid #666">Sản phẩm</td>
    <td width="60" style="border-right:1px solid #666">Số lượng</td>
    <td width="95" style="border-right:1px solid #666">Giá</td>
    <td width="95" style="border-right:1px solid #666">Tổng</td>
    <td width="50" >Xóa</td>                
  </tr>
  
  <?php
  	$sql3="select giohang.*,sanpham.* from giohang,sanpham where giohang.id=sanpham.id AND giohang.user='$user' AND giohang.tinhtrang='dathang'";
	$kq3=mysql_query($sql3);
	$i3=0;
	$tien3=0;
	if(mysql_num_rows($kq3)==0)
		echo "  <tr><td colspan=6 align=center height=30>Hiện tại quý khách chưa đặt mua sản phẩm nào!</td></tr>";
	while($r3=mysql_fetch_array($kq3))
	{
		$id=$r3["id"];
		$tensp=$r3["tensp"];$soluong=$r3["soluong"];
		$gia=$r3["gia"]; $gia3=number_format($gia,0,'','.');
		$tong=$gia*$soluong; $tong3=number_format($tong,0,'','.');
		$tongtien=$tongtien+$tong;$tongtien3=number_format($tongtien,0,'','.');		
		$i3++;
?>    
		<tr align="center" height="30" >
            <td width="50" style="border-right:1px solid #666; border-bottom:1px solid #666"><?php echo $i3; ?></td>
            <td width="110" style="border-right:1px solid #666; border-bottom:1px solid #666"><?php echo $tensp; ?></td>
            <td width="60" style="border-right:1px solid #666; border-bottom:1px solid #666">
            <?php echo "$soluong"; ?>
            </td>
            <td align="right" width="95" style="border-right:1px solid #666; border-bottom:1px solid #666; padding-right:3px"><?php echo $gia3; ?> VND</td>
            <td align="right" width="95" style="border-right:1px solid #666; border-bottom:1px solid #666; padding-right:3px"><?php echo $tong3; ?> VND</td>
            <td width="50" style=" border-bottom:1px solid #666" >
            <input type="checkbox" name="xoa[]" value="<?php echo "$id"; ?>"/>
            </td>               
     	</tr>			
<?php			
	
	}
  ?>  
  <?php 
	if(mysql_num_rows($kq3)==0)
		echo "";
	else
	echo "
  <tr>
  	<td height=\"30\" colspan=\"6\" align=\"right\" style=\"padding-right:5px; padding-bottom:5px; color:#d4340c\">Tổng số tiền phải thanh toán: $tongtien3 VND</td>
  </tr>

  <tr>
  	<td colspan=\"6\" style=\" border-bottom:1px solid #666\" bgcolor=\"#fff\" align=\"center\" height=\"35\">
    <input type=\"button\" name=\"tieptucmuahang\" value=\"Tiếp Tục Mua Hàng\" class=\"button3\" onmouseover=\"style.background='url(images/button-150-2-o.png)'\" onmouseout=\"style.background='url(images/button-150-o.png)'\" onclick=\"document.form.action='index.php'; document.form.submit();\" />
    <input type=\"submit\" name=\"xoagiohang\" value=\"Xóa Giỏ Hàng\" class=\"button2\" onmouseover=\"style.background='url(images/button-110-2-o.png)'\" onmouseout=\"style.background='url(images/button-110-o.png)'\" onclick=\"document.form.submit();\" /></td>
  </tr>";
   	?>
  <input type="hidden" name="act" />
  </form>
</table><br>
<table width="560" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #333">
  <tr>
    <td colspan="6" class="tieude" align="center">DANH SÁCH CÁC MẶT HÀNG ĐÃ MUA</td>
  </tr>
  <tr bgcolor="#ffcc99" align="center" height="30" style="font-weight:bold">
    <td width="50" style="border-right:1px solid #666">STT</td>
    <td width="150" style="border-right:1px solid #666">Sản phẩm</td>
    <td width="110" style="border-right:1px solid #666">Số lượng</td>
    <td width="125" style="border-right:1px solid #666">Giá</td>
    <td width="125" style="border-right:1px solid #666">Tổng</td>
  </tr>
  <?php	
	$kq=mysql_query("select count(*) from giohang,sanpham where giohang.id=sanpham.id AND giohang.user='$user' AND giohang.tinhtrang='damua'"); 
	$r=mysql_fetch_array($kq);
	$numrow=$r[0];	
	//số record cho 1 trang
	$pagesize=15;
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
		
//******************************** Nội Dung *****************************************//		

  	$sql2="select giohang.*,sanpham.* from giohang,sanpham where giohang.id=sanpham.id AND giohang.user='$user' AND giohang.tinhtrang='damua' limit $k,$pagesize";
	$kq2=mysql_query($sql2);
	$i=0;
	$tien=0;
	if(!$kq2)
		echo "";
	else{
	while($r2=mysql_fetch_array($kq2))
	{
		$id=$r2["id"];
		$tensp=$r2["tensp"];$soluong=$r2["soluong"];
		$gia=$r2["gia"]; $gia2=number_format($gia,0,'','.');
		$tong=$gia*$soluong; $tong2=number_format($tong,0,'','.');
		$tongtien=$tongtien+$tong;$tongtien2=number_format($tongtien,0,'','.');		
		$i++;
?>			
		<tr align="center" height="30" >
            <td style="border-right:1px solid #666; border-bottom:1px solid #666"><?php echo $i; ?></td>
            <td style="border-right:1px solid #666; border-bottom:1px solid #666"><?php echo $tensp; ?></td>
            <td  style="border-right:1px solid #666; border-bottom:1px solid #666">
            <?php echo "$soluong"; ?>
            </td>
            <td align="right" style="border-right:1px solid #666; border-bottom:1px solid #666; padding-right:3px"><?php echo $gia2; ?> VND</td>
            <td align="right" style="border-right:1px solid #666; border-bottom:1px solid #666; padding-right:3px"><?php echo $tong2; ?> VND</td>
     	</tr>			
<?php			
	}
	}
  ?>  
  <tr>
  	<td colspan="5" align="center" style="background-color:#d4340c; color:#FFF;" height="35">
 <?php
    //*******************************Xuất số trang************************************
	if($numrow==0)
		echo "Quý khách chưa mua sản phẩm nào!";
	else{    
    if($curseg>1)
        echo "<a href='?b=lsp&idl=$id_loai&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
        $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
        for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
		{
			if($curpage==$i)
				echo "<a href='?b=lsp&idl=$id_loai&page=".$i."'><font color='#FFF'>[".$i."]</font></a> &nbsp;";
			else
				echo "<a href='?b=lsp&idl=$id_loai&page=".$i."'>[".$i."]</a> &nbsp;";
		}
        if($curseg<$numseg)
		echo "<a href='?b=lsp&idl=$id_loai&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";		
	}
?>
    </td>
  </tr>   
</table>