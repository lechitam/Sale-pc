<?php
include "../connect.php";
$idn = $_GET["idn"];
$sql = "select * from loaisanpham where id_nhom='$idn' ";
$result = mysql_query($sql);
$s ="";
header("Content-type:Text/xml");
echo '<?xml version="1.0" encoding="utf-8" ?>';
echo "<data>";
while($r = mysql_fetch_array($result))
{
	echo "<value>".$r["id_loai"] ."</value>";
	echo "<text>".$r["tenloaisp"] ."</text> ";

}
echo "</data>";


?>