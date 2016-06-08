<script>
function danhmuc(j){

	objName = "danhmuc[" + j + "]";
	var obj=document.getElementById(objName);
//alert(objName);
var objImg = obj.parentNode.getElementsByTagName("img")[0];
objImg.src="images/arrow-square.gif";

	if(obj.style.display == "none"){
		obj.style.display = "block";
		objImg.src="images/arrow-square.gif";


	}else{
		obj.style.display = "none";
		objImg.src="images/arrow-square2.gif";
	}
}
</script>
<table width="195" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="height:35px" background="images/bgn_menu2.png">
    <div align="left" style="color:#FFF; font-family:Tahoma; font-size: 14px; padding-left:30px;">DANH MỤC SẢN PHẨM</div></td>
  </tr>
	<?php
		include "connect.php";
		$sql="select * from nhomsanpham";
		$kq=mysql_query($sql);		
		while($r=mysql_fetch_array($kq))
		{
			$id_nhom=$r["id_nhom"];
			$tennhom=$r["tennhom"];
			if($id_nhom==1)
			{
				echo "<tr><td height=30 background='images/bg_menu.png' style=\"padding-left:30px\">				
				<a href=?b=nsp&idn=$id_nhom style=\"color:#fff\" onMouseOver=\"style.color='#ffcc00'\" onMouseOut=\"style.color='#FFF'\">$tennhom</a></td></tr>";
			
				$sql2="select * from loaisanpham where id_nhom=1";
				$kq2=mysql_query($sql2);
				$numrow2=mysql_num_rows($kq2);
				if($numrow2==0)
					echo "";
				else
				{	while($r2=mysql_fetch_array($kq2))
					{
						$tenloai=$r2["tenloaisp"];$id_loai=$r2["id_loai"];	
						$c1=mysql_query("select count(*) from sanpham where id_loai=$id_loai and (ghichu='hienthi' or ghichu='new')");
						$rc1=mysql_fetch_array($c1);$nc1=$rc1[0];
						echo "<tr><td height=30 background='images/bg_menu42.png'><div style=\"padding-left:25px\"><a href=?b=lsp&idl=$id_loai style=\"color:#000\" onMouseOver=\" Tip('Có $nc1 sản phẩm');style.color='#d4340c';\" onMouseOut=\"style.color='#000'\">$tenloai</a></div></td></tr>";
					}
				}
				
			}
			else
			{
				echo "<tr><td height=30 background='images/bg_menu.png' style='padding-left:30px'>			
				<a href=?b=nsp&idn=$id_nhom style=\"color:#fff\" onMouseOver=\"style.color='#ffcc00'\" onMouseOut=\"style.color='#fff'\">$tennhom</a></td></tr>";
			
				$sql2="select * from loaisanpham where id_nhom=$id_nhom";
				$kq2=mysql_query($sql2);
				$numrow2=mysql_num_rows($kq2);
				if($numrow2==0)
					echo "";
				else
				{	while($r2=mysql_fetch_array($kq2))
					{
						$tenloai=$r2["tenloaisp"];$id_loai=$r2["id_loai"];	
						$c1=mysql_query("select count(*) from sanpham where id_loai=$id_loai");
						$rc1=mysql_fetch_array($c1);$nc1=$rc1[0];
						echo "<tr><td height=30 background='images/bg_menu42.png'><div style=\"padding-left:25px\"><a href=?b=lsp&idl=$id_loai style=\"color:#000000\" onMouseOver=\"Tip('Có $nc1 sản phẩm');style.color='#FFFFFF'\" onMouseOut=\"style.color='#000000'\">$tenloai</a></div></td></tr>";
					}
				}
			}
			
		}
		
	?>
</table>