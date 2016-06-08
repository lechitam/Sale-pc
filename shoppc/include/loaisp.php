<?php
	$idl=$_GET["idl"];
	$sql="select loaisanpham.*,nhomsanpham.* from loaisanpham,nhomsanpham where loaisanpham.id_nhom=nhomsanpham.id_nhom AND loaisanpham.id_loai=$idl";
	$kq=mysql_query($sql);
	$r=mysql_fetch_array($kq);
	$id_nhom=$r["id_nhom"];$tennhom=$r["tennhom"];
	$id_loai=$r["id_loai"];$tenloaisp=$r["tenloaisp"];
?>	
<table width="560" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" style="border-bottom:1px solid #333; background:url(images/toplist-content.gif) repeat-x; padding-bottom:5px; font-weight:bold">
    <a href="index.php"><img src="images/Home.gif" width="16" height="16" border="0"></a>
    <img src="images/towred1-r.gif" width="16" height="9">
    <a href="?b=nsp&idn=<?php echo $id_nhom; ?>"><?php echo "$tennhom"; ?></a>      
    <img src="images/towred1-r.gif" width="16" height="9">
    <a href="?b=lsp&idl=<?php echo $id_loai; ?>"><?php echo "$tenloaisp"; ?></a>        
    </td>
  </tr>
</table>
<table width="560" border="0" cellspacing="0" cellpadding="0">
  <tr>	
    <td bgcolor="#d4340c" style="padding-left:5px; width:550px; height:30px" ><a  style="color: #fff; font-size:13px; font-weight:bold"><?php echo $tenloaisp;?></a></td>
  </tr> 
  <tr>
  	<td align="center" style="padding-left:5px; border-left:1px solid #CCCCCC;border-right:1px solid #CCCCCC" >
    <?php     
		//Xác định tổng số bài viết
		if(isset($_GET["c"]))
		{	$kq=mysql_query("select count(*) from sanpham where id_loai=$id_loai and ghichu='hangdat'");		}
		else
	    {    $kq=mysql_query("select count(*) from sanpham where id_loai=$id_loai and (ghichu='hienthi' or ghichu='new')"); 	}
        $r=mysql_fetch_array($kq);
        $numrow=$r[0];		
        //số sản phẩm được hiển thị trên mộ trang cho 1 trang
        $pagesize=9;
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
		if(isset($_GET["c"]))
		{	$sql3="select * from sanpham where id_loai=$id_loai and ghichu='hangdat' ORDER BY tensp ASC limit $k,$pagesize";		}
		else
		{	$sql3="select * from sanpham where id_loai=$id_loai and (ghichu='hienthi' or ghichu='new') ORDER BY ghichu DESC limit $k,$pagesize";		}
	//	echo "$sql3<hr>";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$id=$r3["id"];$tensp=$r3["tensp"];$hinh=$r3["hinh"];$ghichu=$r3["ghichu"];
			$gia=$r3["gia"];$gia2=number_format($gia,0,'','.');
			if( $gia==0) $s="(liên hệ)";	else { $s=$gia2." VND"; }			
			if($ghichu=="new")			
				echo "<div class=divshow>
			<table width=175 height=220 border=0 cellspacing=0 cellpadding=0 background=\"images/box.gif\" style=\"border:1px dotted #999\">
			  <tr>
				<td height=170><a href=?b=ct&id=$id><img src='sanpham/small/$hinh' width=170px height=170 border=0> </a></td>
			  </tr>
			  <tr>
				<td height=25 style=\"font-size:14px; color:#F00\"><strong>$tensp</strong><img src='images/new.gif' ></td>
			  </tr>
			  <tr>
				<td height=25>Giá: $s</td>
			  </tr>
			</table>		
			</div>";
			else
			echo "<div class=divshow>
			<table width=175 height=220 border=0 cellspacing=0 cellpadding=0 background=\"images/box.gif\" style=\"border:1px dotted #999\">
			  <tr>
				<td height=170><a href=?b=ct&id=$id><img src='sanpham/small/$hinh' width=170px height=170 border=0> </a></td>
			  </tr>
			  <tr>
				<td height=25 style=\"font-size:14px; color:#F00\"><a href=?b=ct&id=$id class=a-m><strong>$tensp</strong></a></td>
			  </tr>
			  <tr>
				<td height=25>Giá: $s</td>
			  </tr>
			</table>		
			</div>";
		}
		}
?>
	</td>
   </tr>
   <tr>
   	<td align="center" style="border-left:1px solid #CCCCCC;border-right:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC">
<?php
//*******************************Xuất số trang*******************************************
	if($numrow==0)
		echo "<script>alert('Dòng sản phẩm này đang được cập nhật');window.location='index.php';</script>";
	else{
    echo "<br>";
    if($curseg>1)
        echo "<a href='?b=lsp&idl=$id_loai&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
        $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
        for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
		{
			if($curpage==$i)
				echo "<a href='?b=lsp&idl=$id_loai&page=".$i."'><font color='#0000FF'>[".$i."]</font></a> &nbsp;";
			else
				echo "<a href='?b=lsp&idl=$id_loai&page=".$i."'>[".$i."]</a> &nbsp;";
		}
        if($curseg<$numseg)
		echo "<a href='?b=lsp&idl=$id_loai&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";		
	}
		
?>

	</td>
   </tr>
</table>
