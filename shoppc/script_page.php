<?php
	include('connect.php');
	$str = $_GET['content'];
	if($str!="")
	{
		$sel = mysql_query("select tensp from sanpham where ghichu='hienthi' and hinh like '%".trim($str)."%' and id like '%".trim($str)."%' OR tensp like '%".trim($str)."%'");
		if(mysql_num_rows($sel))
		{
			echo "<table border =\"0\" width=\"100%\">\n";
			if(mysql_num_rows($sel))
			{
				echo "<script language=\"javascript\">box('1');</script>";
				while($row = mysql_fetch_array($sel))
				{
					$country = str_ireplace($str,"<b>".$str."</b>",($row['tensp']));
					echo "<tr id=\"word".$row['id']."\" onmouseover=\"highlight(1,'".$row['id']."');\" onmouseout=\"highlight(0,'".$row['id']."');\" onClick=\"display('".$row['tensp']."');\" >\n<td>".$country."</td>\n</tr>\n";
				}
			}
			echo "</table>";
		}
	}
	else
	{
		echo "<script language=\"javascript\">box('0');</script>";
	}
?>