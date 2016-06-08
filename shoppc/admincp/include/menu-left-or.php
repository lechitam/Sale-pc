<script>
function danhmuc(j){

	objName = "danhmuc[" + j + "]";
	var obj=document.getElementById(objName);
//alert(objName);
var objImg = obj.parentNode.getElementsByTagName("img")[0];
objImg.src="/images/arrow-square.gif";

	if(obj.style.display == "none"){
		obj.style.display = "block";
		objImg.src="/images/arrow-square.gif";


	}else{
		obj.style.display = "none";
		objImg.src="/images/arrow-square2.gif";
	}
}
</script>
<table width="195" border="0" cellspacing="0" cellpadding="0">    
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
				echo "<tr><td height=30 background='/images/bg_menu52.png' style=\"padding-left:5px\">
				<img src=\"/images/icon_menu1.gif\" width=16 height=23 align=middle />				
				<strong>$tennhom</strong></td></tr>";
			
				$sql2="select * from loaisanpham where id_nhom=1";
				$kq2=mysql_query($sql2);
				$numrow2=mysql_num_rows($kq2);
				if($numrow2==0)
					echo "";
				else
				{	while($r2=mysql_fetch_array($kq2))
					{
						$tenloai=$r2["tenloaisp"];$id_loai=$r2["id_loai"];					
						echo "<tr><td height=30 background='/images/bg_menu42.png'><div style=\"padding-left:25px\"><a href=?m=sp&b=sp-listview&idl=$id_loai style=\"color:#000000\" onMouseOver=\"style.color='#00FF00'\" onMouseOut=\"style.color='#000000'\">$tenloai</a></div></td></tr>";
					}
				}				
			}
			else
			{
				echo "<tr><td height=30 background='/images/bg_menu52.png' style='padding-left:5px'>
				<img src=\"/images/icon_menu1.gif\" width=16 height=23 align=middle />				
				<strong>$tennhom</strong></td></tr>";
			
				$sql2="select * from loaisanpham where id_nhom=$id_nhom";
				$kq2=mysql_query($sql2);
				$numrow2=mysql_num_rows($kq2);
				if($numrow2==0)
					echo "";
				else
				{	while($r2=mysql_fetch_array($kq2))
					{
						$tenloai=$r2["tenloaisp"];$id_loai=$r2["id_loai"];					
						echo "<tr><td height=30 background='/images/bg_menu42.png'><div style=\"padding-left:25px\"><a href=?m=sp&b=sp-listview&idl=$id_loai style=\"color:#000000\" onMouseOver=\"style.color='#00FF00'\" onMouseOut=\"style.color='#000000'\">$tenloai</a></div></td></tr>";
					}
				}
			}
			
		}		
	?>   
    </td>
  </tr>   
</table>