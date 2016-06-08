<form method="post" id="frm" name="form">
<table width="735" height="70" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" bordercolordark="#FFFFFF">
	  <tr>
      	<td style="border-top:1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left:1px solid #CCCCCC"><div align="left" style="color:#d4340c; font-family:Tahoma; font-size: 16px; font-weight:bold; padding-left:20px">QUẢN LÝ NHÓM SẢN PHẨM</div></td>
      	<td style="border-top:1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; height:65px; width:55px">
		<input type="button" value='' onClick="document.form.action='../admincp/?m=mn&b=nhomsp-insert'; document.form.submit();" style="background:url(../images/bt_them.jpg); width:55px; height:65px;">
		</td>		
		<td style="border-top:1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-right:1px solid #CCCCCC; height:65px; width:55px">
		<input type="button" value='' onClick="document.form.action='../admincp/?m=mn&b=nhomsp-xl-del';document.form.submit();" style="background:url(../images/bt_xoa.jpg); width:55px; height:65px;">       
        </td>
      </tr>
    </table>
    
<table width="735" border="0" cellspacing="0" cellpadding="0">  
  <tr height="30" bgcolor="#d4340c">
    <td align="center" width="50" style="border-left:1px solid #333;border-right:1px solid #333"><strong><font color="#FFFFFF">Chọn</font></strong></td>
    <td align="center" width="485" style="border-right:1px solid #333"><strong><font color="#FFFFFF">Tên nhóm sản phẩm</font></strong></td>    
    <td align="center" width="100" style="border-right:1px solid #333"><strong><font color="#FFFFFF">Sửa</font></strong></td>
    <td align="center" width="100"><strong><font color="#FFFFFF">Xóa</font></strong></td>    
  </tr>  
<?php
		$sql3="select * from nhomsanpham";
//	echo "$sql3";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$id_nhom=$r3["id_nhom"];$tennhom=$r3["tennhom"];			
  ?>
  <tr>
  <td width="50" align="center" style="border-left:1px solid #333;border-bottom:1px solid #333; border-right:1px solid #333">
  <input type="checkbox" name="chon[]" value="<?php echo $id_nhom; ?>"/></td>  
    <td width="485" height="30" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><div align="left" style="padding-left:100px"><b><?php echo "$tennhom"; ?></b></div></td>    
    <td width="100" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><a href="?m=mn&amp;b=nhomsp-update&amp;idn=<?php echo "$id_nhom"; ?>">Sửa</a></td>
    <td width="100" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><a href="?m=mn&b=nhomsp-del&idn=<?php echo "$id_nhom"; ?>" onclick="return check()">Xóa</a>
    </td>
  </tr>
 <?php	 			
		}
		}
 ?>  
</table> 
</form>