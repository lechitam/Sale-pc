<script type="text/javascript" src="stlib.js"></script>
<script type="text/javascript">
<!--
<?php 
include "connect.php";
$sql=mysql_query("select * from nhomsanpham");
while($r=mysql_fetch_array($sql))
{
	$tennhom=$r["tennhom"];$id_nhom=$r["id_nhom"];
echo
"stBM(260,\"basic1\",[0,\"\",\"\",\"blank.gif\",0,\"left\",\"default\",\"hand\",0,0,-1,-1,-1,\"none\",0,\"#CCCCCC\",\"transparent\",\"\",\"repeat\",1,\"expand_f.gif\",\"expand_uf.gif\",9,9,1,\"line_def0.gif\",\"line_def1.gif\",\"line_def2.gif\",\"line_def3.gif\",1,0,3,1,\"center\",0,0,0,\"\",\"\",\"\",\"\",\"\"]);
stBS(\"p0\",[0,0,\"\",-2,\"\",-2,50,-1,3]);
stIT(\"p0i0\",[\"$tennhom\",\"#\",\"_self\",\"\",\"\",\"file_f.gif\",\"file_uf.gif\",20,20,\"9pt 'Verdana','Arial'\",\"#000000\",\"none\",\"transparent\",\"\",\"no-repeat\",\"9pt 'Verdana','Arial'\",\"#0099CC\",\"none\",\"transparent\",\"\",\"repeat-x\",\"9pt 'Verdana'\",\"#006699\",\"none\",\"transparent\",\"\",\"no-repeat\",\"9pt 'Verdana'\",\"#0099CC\",\"none\",\"transparent\",\"\",\"no-repeat\",1,0,\"left\",\"middle\",220,0,\"\",\"\",\"\",\"\",0,0,0]);
stBS(\"p1\",[],\"p0\");";
$query=mysql_query("select * from loaisanpham where id_nhom=$id_nhom");
while($r2=mysql_fetch_array($query))
{
	$tenloai=$r2["tenloaisp"];$id_loai=$r2["id_loai"];
echo
"stIT(\"p1i0\",[\"$tenloai\",\"/admin/?m=sp&b=sp-listview&idl=$id_loai\",,,,\"file_c.gif\",\"file_c.gif\",,,\"9pt 'Verdana','Arial'\",,,,,,,\"#666666\",,,,\"no-repeat\",\"9pt 'Verdana'\",\"#000000\",,,,,,\"#666666\"],\"p0i0\");";
}
echo "stES();
stES();
stEM();";
}
?>
//-->
</script>

<script type="text/javascript">
<!--
<?php 
include "connect.php";
$sql3=mysql_query("select * from menu");
while($r3=mysql_fetch_array($sql3))
{
	$tenmenu=$r3["tenmenu"];$id_menu=$r3["id_menu"];
echo
"stBM(260,\"basic1\",[0,\"\",\"\",\"blank.gif\",0,\"left\",\"default\",\"hand\",0,0,-1,-1,-1,\"none\",0,\"#CCCCCC\",\"transparent\",\"\",\"repeat\",1,\"expand_f.gif\",\"expand_uf.gif\",9,9,1,\"line_def0.gif\",\"line_def1.gif\",\"line_def2.gif\",\"line_def3.gif\",1,0,3,1,\"center\",0,0,0,\"\",\"\",\"\",\"\",\"\"]);
stBS(\"p0\",[0,0,\"\",-2,\"\",-2,50,-1,3]);
stIT(\"p0i0\",[\"$tenmenu\",\"/admin/?m=sp&b=menu-listview&idm=$id_menu\",\"_self\",\"\",\"\",\"file_f.gif\",\"file_uf.gif\",20,20,\"9pt 'Verdana','Arial'\",\"#000000\",\"none\",\"transparent\",\"\",\"no-repeat\",\"9pt 'Verdana','Arial'\",\"#0099CC\",\"none\",\"transparent\",\"\",\"repeat-x\",\"9pt 'Verdana'\",\"#006699\",\"none\",\"transparent\",\"\",\"no-repeat\",\"9pt 'Verdana'\",\"#0099CC\",\"none\",\"transparent\",\"\",\"no-repeat\",1,0,\"left\",\"middle\",220,0,\"\",\"\",\"\",\"\",0,0,0]);
stBS(\"p1\",[],\"p0\");";
echo "stES();
stES();
stEM();";
}
?>
//-->
</script>