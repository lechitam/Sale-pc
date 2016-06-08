<form method="post" id="frm" name="form">
<table width="735" height="70" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" bordercolordark="#FFFFFF">
	  <tr>
      	<td style="border-top:1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left:1px solid #CCCCCC"><div align="left" style="color:#d4340c; font-family:Tahoma; font-size: 16px; font-weight:bold; padding-left:20px">LOẠI SẢN PHẨM</div></td>
      	<td style="border-top:1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; height:65px; width:55px">
		<input type="button" value='' onClick="document.form.action='../admincp/?m=mn&b=loaisp-insert'; document.form.submit();" style="background:url(../images/bt_them.jpg); width:55px; height:65px;">
		</td>		
		<td style="border-top:1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-right:1px solid #CCCCCC; height:65px; width:55px">
		<input type="button" value='' onClick="document.form.action='../admincp/?m=mn&b=loaisp-xl-del';document.form.submit();" style="background:url(../images/bt_xoa.jpg); width:55px; height:65px;">       
        </td>
      </tr>
    </table>
    
<table width="735" border="0" cellspacing="0" cellpadding="0">  
  <tr height="30" bgcolor="#d4340c">
    <td align="center" width="50" style="border-left:1px solid #333;border-right:1px solid #333"><strong><font color="#FFFFFF">Chọn</font></strong></td>
    <td align="center" width="235" style="border-right:1px solid #333"><strong><font color="#FFFFFF">Nhóm sản phẩm</font></strong></td>
    <td align="center" width="250" style="border-right:1px solid #333"><strong><font color="#FFFFFF">Loại sản phẩm</font></strong></td>    
    <td align="center" width="100" style="border-right:1px solid #333"><strong><font color="#FFFFFF">Sửa</font></strong></td>
    <td align="center" width="100"><strong><font color="#FFFFFF">Xóa</font></strong></td>    
  </tr>  
<?php
		$idn=$_GET["idn"];
		$sql3="select nhomsanpham.tennhom,loaisanpham.* from nhomsanpham,loaisanpham where nhomsanpham.id_nhom=loaisanpham.id_nhom and loaisanpham.id_nhom='$idn' order by nhomsanpham.id_nhom ASC";
//	echo "$sql3";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$id_nhom=$r3["id_nhom"];$tennhom=$r3["tennhom"];	
			$id_loai=$r3["id_loai"];$tenloai=$r3["tenloaisp"];
  ?>
  <tr>
  <td width="50" align="center" style="border-left:1px solid #333;border-bottom:1px solid #333; border-right:1px solid #333">
  <input type="checkbox" name="chon[]" value="<?php echo $id_loai; ?>"/></td>  
    <td width="235" height="30" align="left" style="border-bottom:1px solid #333; border-right:1px solid #333; padding-left:20px"><?php echo "$tennhom"; ?></td>
    <td width="250" align="left" style="border-bottom:1px solid #333; border-right:1px solid #333; padding-left:20px"><?php echo "$tenloai"; ?></td>    
    <td width="100" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><a href="?m=mn&amp;b=loaisp-update&idl=<?php echo "$id_loai"; ?>">Sửa</a></td>
    <td width="100" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><a href="?m=mn&b=loaisp-del&idl=<?php echo "$id_loai"; ?>" onclick="return check()">Xóa</a>
    </td>
  </tr>
 <?php	 			
		}
		}
 ?>  
</table> 
</form>