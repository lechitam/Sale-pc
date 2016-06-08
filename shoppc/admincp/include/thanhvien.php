<?php
if (isset($HTTP_GET_VARS['active'])&&(isset($HTTP_GET_VARS['n'])))
{
	$keyactive= $HTTP_GET_VARS["active"];	
	$keyactive=EncodeSpecialChar($keyactive);
	$number= $HTTP_GET_VARS["n"];	
	$number=intval($number);
	
	if ($keyactive=="administrator"||$keyactive=="admin")
	   echo "<script> alert('Bạn không có thể chỉnh sửa quyền của Administrator.')</script>";
	else
	   {	
	   	if($number==1)	$result_hieuluc = mysql_query("UPDATE thanhvien SET hieuluc=0 WHERE user='$keyactive'");
		if($number==0)	$result_hieuluc = mysql_query("UPDATE thanhvien SET hieuluc=1 WHERE user='$keyactive'"); 		
	   }
	 if ($result_hieuluc) echo "<script>window.location='?m=thanhvien';</script>";  
}
if(isset($_POST["act"]))
{
	if(isset($_POST["xoa"]))
	{
		$chon=$_POST["chon"];
		$count=count($chon);
		if($count==0)
			echo "<script>alert('Chưa chọn thành viên cần xóa');</script>";
		else{
			for ($j=0;$j<$count;$j++)
			{	
				if($chon[$j]=="administrator"||$chon[$j]=="admin")
					echo "<script>alert('Không thể xóa tài khoản quản trị');</script>";
				else{
				$SQL_xoagiohang = "DELETE FROM thanhvien WHERE user='$chon[$j]'";
			//	echo "$SQL_xoagiohang";
				$kq_xoagiohang=mysql_query($SQL_xoagiohang);
				$n+=mysql_affected_rows();
				echo "<script>alert('Đã xóa $n thành viên');</script>";

				}
			}					
		}		
	
	}
}
?>
<form method="post">
<table width="960" height="70" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" bordercolordark="#FFFFFF">
	  <tr>
      	<td style="border-top:1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left:1px solid #CCCCCC"><div align="left" style="color:#d4340c; font-family:Tahoma; font-size: 16px; font-weight:bold; padding-left:20px">QUẢN LÝ THÀNH VIÊN</div></td>
		<td style="border-top:1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-right:1px solid #CCCCCC; height:65px; width:55px">
		<input type="submit" name="xoa" value='' onClick="return checktv();document.form.submit();" style="background:url(../images/bt_xoa.jpg); width:55px; height:65px;">       
        </td>
      </tr>
</table>

<table width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="9" class="tieude" align="center">DANH SÁCH THÀNH VIÊN</td>
  </tr>
  <tr height="30" bgcolor="#ffcc99">
    <td align="center" width="50" style="border-left:1px solid #333;border-right:1px solid #333"><strong>Chọn</strong></td>
    <td align="center" width="150" style="border-right:1px solid #333"><strong>Tên đăng nhập</strong></td>
    <td width="150" align="center" style="border-right:1px solid #333"><strong>Họ tên</strong><strong></strong></td>
    <td align="center" width="180" style="border-right:1px solid #333"><strong>Địa chỉ</strong></td>
    <td align="center" width="175" style="border-right:1px solid #333"><strong>Email</strong></td>
    <td align="center" width="150" style="border-right:1px solid #333"><strong>Điện thoại</strong></td>
    <td align="center" width="80" style="border-right:1px solid #333"><strong>Hiệu lực</strong></td>
    
  </tr>  
<?php
        $kq=mysql_query("select count(*) from thanhvien"); 
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
		$sql3="select * from thanhvien limit $k,$pagesize";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$user3=$r3["user"];$hoten=$r3["hoten"];$diachi=$r3["diachi"];
			$email=$r3["email"];$dienthoai=$r3["dienthoai"];$hieuluc=$r3["hieuluc"];
			$str_dt=strlen($dienthoai);
			if($str_dt==9) $t=0;
			else $t="";
  ?>
  <tr>
  <td width="50" align="center" style="border-left:1px solid #333;border-bottom:1px solid #333; border-right:1px solid #333">
  <input type="checkbox" name="chon[]" value="<?php echo $user3; ?>"/></td>  
    <td width="150" height="30" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><b><?php echo "$user3"; ?></b></td>
    <td width="150" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333">
    <?php echo "$hoten"; ?> </a>
    </td>
    <td width="180" align="left" style="border-bottom:1px solid #333; border-right:1px solid #333; padding-left:5px; padding-right:5px"><?php echo "$diachi"; ?></td>
    <td width="175" align="left" style="border-bottom:1px solid #333; border-right:1px solid #333; padding-left:5px; padding-right:5px"><?php echo "$email"; ?></td>
    <td width="150" align="left" style="border-bottom:1px solid #333; border-right:1px solid #333; padding-left:5px; padding-right:5px"><?php echo "$t"."$dienthoai"; ?></td>
    <td width="80" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333; ">	
	<?php echo "<a href='?m=thanhvien&active=$user3&n=$hieuluc'>";
		if($hieuluc==0)
			echo "<img src='img/khonghieuluc.gif' border='0'>"; 
		else 
			echo "<img src='img/hieuluc.gif' border='0'>";
		echo "</a>";
		?></td>
  </tr>
 <?php
		}
		}
 ?>
  <tr>
	<td colspan="9" class="ketthuc">
 <?php
    if($numrow==0)
		echo "Hiện tại chưa có liên hệ nào!!";
	else{  
    if($curseg>1)
        echo "<a href='?m=thanhvien&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
        $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
        for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
		{
			if($curpage==$i)
				echo "<a href='?m=thanhvien&page=".$i."'><font color='#FF0000'>[".$i."]</font></a> &nbsp;";
			else
				echo "<a href='?m=thanhvien&page=".$i."'><font color='#FFF'>[".$i."]</font></a> &nbsp;";
		}
        if($curseg<$numseg)
		echo "<a href='?m=thanhvien&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";		
	}
?>
    </td>
  </tr> 
</table>
  <input type="hidden" name="act">
</form>