<?php
if(isset($_POST["act"]))
{
	if(isset($_POST["xoa"]))
	{
		$chon=$_POST["chon"];
		$count=count($chon);
		if($count==0)
			echo "<script>alert('Chưa chọn liên hệ cần xóa');</script>";
		else{
			for ($j=0;$j<$count;$j++)
			{	
				$SQL_xoagiohang = "DELETE FROM lienhe WHERE id_lienhe='$chon[$j]'";
			//	echo "$SQL_xoagiohang";
				$kq_xoagiohang=mysql_query($SQL_xoagiohang);
				$n+=mysql_affected_rows();
			}					
			echo "<script>alert('Đã xóa $n liên hệ');</script>";
		}		
	
	}
}
?>
<form method="post">
<table width="960" height="70" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" bordercolordark="#FFFFFF">
	  <tr>
      	<td style="border-top:1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left:1px solid #CCCCCC"><div align="left" style="color:#d4340c; font-family:Tahoma; font-size: 16px; font-weight:bold; padding-left:20px">QUẢN LÝ LIÊN HỆ 	 
      	</div></td>
		<td style="border-top:1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-right:1px solid #CCCCCC; height:65px; width:55px">
		<input type="submit" name="xoa" value='' onClick="return checklh();document.form.submit();" style="background:url(../images/bt_xoa.jpg); width:55px; height:65px;">       
        </td>
      </tr>
</table>

<table width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" class="tieude" align="center">DANH SÁCH KHÁCH HÀNG LIÊN HỆ</td>
  </tr>
  <tr height="30" bgcolor="#ffcc99">
    <td align="center" width="50" style="border-left:1px solid #333;border-right:1px solid #333"><strong>Chọn</strong></td>
    <td align="center" width="200" style="border-right:1px solid #333"><strong>Ngày Liên Hệ</strong></td>
    <td width="200" align="center" style="border-right:1px solid #333"><strong>Khách hàng</strong><strong></strong></td>
    <td align="center" width="460" style="border-right:1px solid #333"><strong>Nội dung</strong></td>
    <td align="center" width="50" style="border-right:1px solid #333">Xóa</td>
    
  </tr>  
<?php
        $kq=mysql_query("select count(*) from lienhe"); 
        $r=mysql_fetch_array($kq);
        $numrow=$r[0];		
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
		$sql3="select * from lienhe order by ngaylienhe DESC limit $k,$pagesize";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$idlh=$r3["id_lienhe"];
			$ngaylh=ConvertDate_time_db($r3["ngaylienhe"]);
			$hoten=$r3["hoten"];$diachi=$r3["diachi"];$email=$r3["email"];
			$dt=$r3["dienthoai"];$fax=$r3["fax"];$cty=$r3["cty"];
			$noidung=$r3["noidung"];
			$str_dt=strlen($dt); 
			if($str_dt==9) $t="0".$dt;
			else	$t="".$dt;
			$str_fax=strlen($fax); 
			if($str_fax==9) $t2="0".$fax;
			else	$t2="".$fax;
  ?>
  <tr>
  <td width="50" align="center" style="border-left:1px solid #333;border-bottom:1px solid #333; border-right:1px solid #333">
  <input type="checkbox" name="chon[]" value="<?php echo $idlh; ?>"/></td>  
    <td width="200" height="30" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><b><?php echo "$ngaylh"; ?></b></td>
    <td width="200" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333">
    <a onmouseover="Tip('<?php echo "Họ tên: $hoten<hr>Công ty: $cty<hr>Địa chỉ: $diachi<hr>Email: $email<hr>Điện thoại: $t<hr>Fax: $t2"; ?>')"><?php echo "$hoten"; ?> </a>
    </td>
    <td width="460" align="left" style="border-bottom:1px solid #333; border-right:1px solid #333; padding-left:5px; padding-right:5px"><?php echo "$noidung"; ?></td>
    <td width="50" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><a href="?m=lh-del&idlh=<?php echo "$idlh"; ?>" onclick="return checklh()">Xóa</a></td>   
  </tr>
 <?php
		}
		}
 ?>
  <tr>
	<td colspan="6" class="ketthuc">
 <?php
    if($numrow==0)
		echo "Hiện tại chưa có liên hệ nào!!";
	else{  
    if($curseg>1)
        echo "<a href='?m=lienhe&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
        $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
        for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
		{
			if($curpage==$i)
				echo "<a href='?m=lienhe&page=".$i."'><font color='#FF0000'>[".$i."]</font></a> &nbsp;";
			else
				echo "<a href='?m=lienhe&page=".$i."'><font color='#FFF'>[".$i."]</font></a> &nbsp;";
		}
        if($curseg<$numseg)
		echo "<a href='?m=lienhe&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";		
	}
?>
    </td>
  </tr> 
</table>
  <input type="hidden" name="act">
</form>