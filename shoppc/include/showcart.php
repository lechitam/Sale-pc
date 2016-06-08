<?php
if(isset($_POST["act"]))
{
	if(isset($_POST["capnhatgiohang"]))
	{
		$id_form=$_POST["id_form"];
		$countid=count($id_form);	
		$sl=$_POST["soluong"];
		$tong=$_POST["tong"];
		if(isset($_SESSION["user"]))
		{
			for($i=0;$i<$countid;$i++)
			{			
				if($sl[$i]<=0)
					$del=mysql_query("delete from giohang where id='$id_form[$i]' and tinhtrang='themgiohang'");
				else{		
				$tt[$i]=$tong[$i]*$sl[$i];
				$sql2="update giohang set soluong=$sl[$i] where user='$user' AND id='$id_form[$i]' and tinhtrang='themgiohang'";
				$sql2.=';';
			//	echo "sql2: $sql2<hr>";
				$kq2=mysql_query($sql2);
				}

			}			
		}		
	}	
	
	if(isset($_POST["xoagiohang"]))
	{
		$xoa=$_POST["xoa"];			
		$xoacount=count($_POST["xoa"]);
		if($xoacount==0)
			echo "<script>alert('Chưa chọn sản phẩm cần xóa');</script>";
		else{
			for ($j=0;$j<$xoacount;$j++)
			{	
				$SQL_xoagiohang = "DELETE FROM giohang WHERE user='$user' and id='$xoa[$j]' and tinhtrang='themgiohang'";
				$kq_xoagiohang=mysql_query($SQL_xoagiohang);
				$n+=mysql_affected_rows();
			}					
		}		
	}
	
	if(isset($_POST["dathang"]))
	{
		$id_form=$_POST["id_form"];	
		$countid=count($id_form);
		$now=date("Y-m-d H:i:s");
		$soluong=$_POST["soluong"];
//		$tong=$_POST["tong"];
		for($k=0;$k<$countid;$k++)
		{			
			//$id_f=implode($_POST["id_form"], "','");
			$sql_kt="select * from giohang where id='$id_form[$k]' and user='$user' and tinhtrang='dathang'";
		//	echo "$sql_kt<hr>";
			$kq_kt=mysql_query($sql_kt);			
			if(mysql_num_rows($kq_kt)==0)
			{		
				$sql_dathang="update giohang set tinhtrang='dathang',ngaydat='$now' where id='$id_form[$k]' and user='$user' and tinhtrang='themgiohang'";
				$kq_dathang=mysql_query($sql_dathang);			
				echo "<script>window.location='index.php?b=listcart';</script>";
			}
			else
			{
				while($r_kt=mysql_fetch_array($kq_kt))
				{
					$sl_kt=$r_kt["soluong"];
				//	echo "$sl_kt<hr>";
					$sql_del="delete from giohang where user='$user' and id='$id_form[$k]' and tinhtrang='themgiohang'";					
					$kq_del=mysql_query($sql_del);
					$sql_dathang="update giohang set ngaydat='$now',soluong=$sl_kt+$soluong[$k] where id='$id_form[$k]' and user='$user' and tinhtrang='dathang'";
					$sql_dathang.=';';
					$kq_dathang=mysql_query($sql_dathang);
					echo "<script>window.location='index.php?b=listcart';</script>";

				}
			} 
		}					//echo "sql: $sql_dathang";
	}
					
}
?>
<table width="560" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #333">
<form method="post" name="form">
  <tr>
    <td colspan="6" class="tieude" align="center">GIỎ HÀNG CỦA QUÝ KHÁCH</td>
  </tr>
  <tr bgcolor="#ad2200" align="center" height="30" style="font-weight:bold">
    <td width="50" style="border-right:1px solid #666"><font color="#FFFFFF">STT</font></td>
    <td width="110" style="border-right:1px solid #666"><font color="#FFFFFF">Sản phẩm</font></td>
    <td width="60" style="border-right:1px solid #666"><font color="#FFFFFF">Số lượng</font></td>
    <td width="95" style="border-right:1px solid #666"><font color="#FFFFFF">Giá</font></td>
    <td width="95" style="border-right:1px solid #666"><font color="#FFFFFF">Tổng</font></td>
    <td width="50" ><font color="#FFFFFF">Xóa</font></td>                
  </tr>
  <?php   
  	$user=$_SESSION["user"];	
  	$sql="select giohang.*,sanpham.* from giohang,sanpham where giohang.id=sanpham.id AND giohang.user='$user' AND giohang.tinhtrang='themgiohang'"; 
	$kq=mysql_query($sql);
	$i=0;
	$tien=0;
	if(mysql_num_rows($kq)==0)
		echo "<tr><td colspan=6 height=30 align=center>Không có sản phẩm nào trong giỏ hàng của Quý khách!</td></tr>";
	else{
	while($r=mysql_fetch_array($kq))
	{
		$id=$r["id"];
		$tensp=$r["tensp"];
		if(isset($_SESSION["soluong"])) $soluong=$_SESSION["soluong"]; 
		else $soluong=$r["soluong"];
		$gia=$r["gia"]; $gia2=number_format($gia,0,'','.');
		if($gia==0) $s="(liên hệ)"; else $s=$gia2." VND";
		$tong=$gia*$soluong; $tong2=number_format($tong,0,'','.');
		if($tong==0) $t="(liên hệ)"; else $t=$tong2." VND";
		$tongtien=$tongtien+$tong;$tongtien2=number_format($tongtien,0,'','.');		
		if($tongtien==0) $tt="(liên hệ)"; else $tt=$tongtien2." VND";
		$i++;
?>			
		<tr align="center" height="30" >
            <td width="50" style="border-right:1px solid #666; border-bottom:1px solid #666"><?php echo $i; ?></td>
            <td width="110" style="border-right:1px solid #666; border-bottom:1px solid #666"><?php echo $tensp; ?></td>
            <td width="60" style="border-right:1px solid #666; border-bottom:1px solid #666">
            <input type="text" name="soluong[]" value="<?php echo $soluong ?>" style="width:30px" /> 
             <input type="hidden" name="id_form[]" value="<?php echo "$id"; ?>"  />
             <input type="hidden" name="tong[]" value="<?php echo "$tong"; ?>" />

            </td>
            <td align="right" width="95" style="border-right:1px solid #666; border-bottom:1px solid #666; padding-right:3px"><?php echo $s; ?> </td>
            <td align="right" width="95" style="border-right:1px solid #666; border-bottom:1px solid #666; padding-right:3px"><?php echo $t; ?> </td>
            <td width="50" style=" border-bottom:1px solid #666" >
            <input type="checkbox" name="xoa[]" value="<?php echo "$id"; ?>"/>
            </td>               
     	</tr>			
 <?php			
	}
	}
	if(mysql_num_rows($kq)==0)
		echo "";
	else
		echo "<tr>
  <td height=30 colspan=6 align=right style=\"padding-right:5px; padding-bottom:5px; color:#Fff\">Tổng số tiền phải thanh toán: $tt </td></tr>
  <tr>
  	<td colspan=\"6\" style=\" border-bottom:1px solid #666\" bgcolor=\"#fff\" align=\"center\" height=\"35\">
    <input type=\"button\" name=\"tieptucmuahang\" value=\"Tiếp Tục Mua Hàng\" class=\"button3\" onmouseover=\"style.background='url(images/button-150-2-o.png)'\" onmouseout=\"style.background='url(images/button-150-o.png)'\" onclick=\"document.form.action='index.php'; document.form.submit();\" />
    
    <input type=\"submit\" name=\"capnhatgiohang\" value=\"Cập Nhật\" class=\"button\" onmouseover=\"style.background='url(images/button-2-o.gif)'\" onmouseout=\"style.background='url(images/button-o.gif)'\" onclick=\"document.form.submit();\" />
    
	<input type=\"submit\" name=\"xoagiohang\" value=\"Xóa Giỏ Hàng\" class=\"button2\" onmouseover=\"style.background='url(images/button-110-2-o.png)'\" onmouseout=\"style.background='url(images/button-110-o.png)'\" onclick=\"document.form.submit();\" />
    
	<input type=\"submit\" name=\"dathang\" value=\"Đặt Hàng\" class=\"button2\" onmouseover=\"style.background='url(images/button-110-2-o.png)'\" onmouseout=\"style.background='url(images/button-110-o.png)'\" onclick=\"document.form.submit();\"/>
    </td>
  </tr>";  
    ?> 
  <input type="hidden" name="act" />
  </form>
</table>
<div style='font-size:11px; line-height:20px; color:#FF0000; width:560px'></div>

