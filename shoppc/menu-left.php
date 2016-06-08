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
========
<table width="195" border="0" cellspacing="0" cellpadding="0">
    <tr>
  	<td height=30 background='images/bg.jpg' style="color:#000"><img src="images/towred1-r.gif"><?php
	include "connect.php";
	$sql4="select * from nhomsanpham";
	$kq4=mysql_query($sql4);	
	$i=1;
	while($r4=mysql_fetch_array($kq4))
	{
		$tennhom4=$r4["tennhom"];$id_nhom4=$r4["id_nhom"];					
		echo "<tr><td background='images/bg_02.png'>
		<div style=\"padding-left:20px;\">
		<table border=0 cellspacing=0 cellpadding=0 >
		<tr><td height=30px width=189>
		<a style=\"color:#000000\" onclick='danhmuc($i);' onMouseOver=\"style.color='#FF0000'\" onMouseOut=\"style.color='#000000'\">&raquo;&nbsp;$tennhom4</a>
		</td><td width=16 style='padding-right:2px'>
		<a onclick=\"danhmuc($i);\"><img src=\"images/arrow-square2.gif\" width=16 height=16 /></a>
		</td></tr></table>
		</div>";
		$sql5="select * from loaisanpham where id_nhom=$id_nhom4";
		$kq5=mysql_query($sql5);
		echo "<table width=195 id='danhmuc[$i]' style='display:none' border=0 cellspacing=0 cellpadding=0>";
		while($r5=mysql_fetch_array($kq5))
		{
			$tenloai=$r5["tenloaisp"];$id_loai=$r5["id_loai"];					
			echo "
			<tr><td height=30 width=195 background='images/bg_04.png'>
			<div style=\"padding-left:35px\">
			<a href=?b=lsp&idl=$id_loai style=\"color:#000000\" onMouseOver=\"style.color='#FF0000'\" onMouseOut=\"style.color='#000000'\">&raquo;&nbsp;$tenloai</a>
			</div></td></tr>";
		}	
		echo "</table>";
		echo "</td></tr>";
		$i++;
	}
	
?>
</td>
  </tr>
</table>