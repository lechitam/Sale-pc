<?php
	$idm=$_GET["idm"];
	$sql="select * from menu where id_menu='$idm'";
	$kq=mysql_query($sql);
	$r=mysql_fetch_array($kq);
	$id_menu=$r["id_menu"];$tenmenu=$r["tenmenu"];
?>	
<table width="560" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" style="border-bottom:1px solid #333; background:url(images/toplist-content.gif) repeat-x; padding-bottom:5px; font-weight:bold">
    <a href="index.php"><img src="images/Home.gif" width="16" height="16" border="0"></a>
    <img src="images/towred1-r.gif" width="16" height="9">
    <a href="?b=m&idm=<?php echo $id_menu; ?>"><?php echo "$tenmenu"; ?></a>      
    </td>
  </tr>
</table>
<table width="560" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td align="center" style="padding-left:5px;">
    <?php     
		//Xác định tổng số bài viết
        $kq=mysql_query("select count(*) from sanpham where ghichu='hienthi' AND id_menu='$id_menu'"); 	
        $r=mysql_fetch_array($kq);
        $numrow=$r[0];		
        //số record cho 1 trang
        $pagesize=33;
        //Tính tổng số trang
        $pagecount=ceil($numrow/$pagesize);			
        //Xác định số trang cho mỗi lần hiển thị
        $segsize=3;
        //Thiết lập trang hiện hành
        if(!isset($_GET["page"]))
			 $curpage=1;
        else	
        	 $curpage=$_GET["page"];
        if($curpage<1)
			 $curpage=1;
        if($curpage>$pagecount) $curpage=$pagecount;
        //Xác định số phân đoạn của trang
        $numseg=($pagecount % $segsize==0)?($pagecount/$segsize):(int)($pagecount/$segsize+1);
        //Xác định phân đoạn hiện hành của trang
        $curseg=($curpage % $segsize==0)?($curpage/$segsize):(int)($curpage/$segsize+1);   
		$k=($curpage-1)*$pagesize;
		
//******************************** Nội Dung ***********************************************//
		$sql3="select * from sanpham where ghichu='hienthi' AND id_menu=$id_menu limit $k,$pagesize";		
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$id=$r3["id"];$tensp=$r3["tensp"];$hinh=$r3["hinh"];
			$gia=$r3["gia"];$gia2=number_format($gia,0,'','.');
			if($gia==0) $s="(liên hệ)"; else $s=$gia2." VND";
			$link=$r3["link"];
			if($idm==7||$idm==1||$idm==2)
			{
			echo "<div class=divshow>
			<table width=175 height=220 border=0 cellspacing=0 cellpadding=0 background=\"images/box.gif\" style=\"border:1px dotted #999\">
			  <tr>
				<td height=170><a href=?b=ctm&id=$id><img src='sanpham/small/$hinh' width=170px height=170 border=0> </a></td>
			  </tr>
			  <tr>
				<td height=25 style=\"font-size:14px; color:#F00\"><strong>$tensp</strong></td>
			  </tr>
  			  <tr>
			  	<td height=25>Giá: $s</td>
			  </tr>
			</table>		
			</div>";
			}
			else
			{				
			echo "<div class=divshow>
			<table width=175 height=220 border=0 cellspacing=0 cellpadding=0 background=\"images/box.gif\" style=\"border:1px dotted #999\">
			  <tr>
				<td height=170>
				<div onclick=\"var win=window.open('zoom.php?id=$id','open_window', 'width=405, height=530, left=0, top=0')\">
				<img src='sanpham/small/$hinh' width=170px height=170 border=0></div>
				</td>
			  </tr>
			  <tr>
				<td height=25 style=\"font-size:14px; color:#F00\">
				<div onclick=\"var win=window.open('zoom.php?id=$id','open_window', 'width=405, height=530, left=0, top=0')\"><strong>$tensp</strong></div></td>
			  </tr>
			  </table></div>";
			}
		}
		}
?>
	</td>
   </tr>
   <tr>
   	<td align="center">
<?php
//*******************************Xuất số trang*******************************************
	if($numrow==0)
		echo "Hiện tại không có sản phẩm thuộc loại này!";
	else{
    echo "<br>";
    if($curseg>1)
        echo "<a href='?b=m&idm=$id_menu&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
        $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
        for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
		{
			if($curpage==$i)
				echo "<a href='?b=m&idm=$id_menu&page=".$i."'><font color='#0000FF'>[".$i."]</font></a> &nbsp;";
			else
				echo "<a href='?b=m&idm=$id_menu&page=".$i."'>[".$i."]</a> &nbsp;";
		}
        if($curseg<$numseg)
		echo "<a href='?b=m&idm=$id_menu&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";		
	}
		
?>

	</td>
   </tr>
</table>