<script>
function danhmuc(j){

	objName = "danhmuc[" + j + "]";
	var obj=document.getElementById(objName);
//alert(objName);
var objImg = obj.parentNode.getElementsByTagName("img")[0];
objImg.src="../admincp/img/expand_uf.gif";

	if(obj.style.display == "none"){
		obj.style.display = "block";
		objImg.src="../admincp/img/expand_uf.gif";


	}else{
		obj.style.display = "none";
		objImg.src="../admincp/img/expand_f.gif";
	}
}
</script>
<table border="0" cellpadding="0" cellspacing="0">
<?php
	include "connect.php";
	$sql=mysql_query("select * from nhomsanpham");
	$i=1;
	while($r=mysql_fetch_array($sql))
	{
		$tennhom=$r["tennhom"];$id_nhom=$r["id_nhom"];					
		echo "<tr><td>
		<div style=\"padding-left:20px;\">
		<table border=0 cellspacing=0 cellpadding=0 >
		<tr><td height=30px width=100%>
		<a onclick=\"danhmuc($i);\"><img src=\"../admincp/img/expand_f.gif\" width=9 height=9 /></a>
		<img src=\"../admincp/img/file_uf.gif\" width=20 height=20 />
		<a style=\"color:#000000\" onclick='danhmuc($i);' onMouseOver=\"style.color='#0099CC'\" onMouseOut=\"style.color='#000000'\">$tennhom</a>
		</td></tr>		
		</table>
		</div>";
		$sql5="select * from loaisanpham where id_nhom=$id_nhom";
		$kq5=mysql_query($sql5);
		echo "<table width=195 id='danhmuc[$i]' style='display:none' border=0 cellspacing=0 cellpadding=0>";
		while($r5=mysql_fetch_array($kq5))
		{
			$tenloai=$r5["tenloaisp"];$id_loai=$r5["id_loai"];					
			echo "
			<tr><td>
			<div style=\"padding-left:40px\">
			<img src=\"../admincp/img/file_c.gif\" width=20 height=20 />
			<a href=../admincp/?m=sp&b=sp-list&idl=$id_loai style=\"color:#000000\" onMouseOver=\"style.color='#0099CC'\" onMouseOut=\"style.color='#000000'\">$tenloai</a>
			</div></td></tr>";
		}	
		echo "</table>";
		echo "</td></tr>";
		$i++;
	}

?>
</table>