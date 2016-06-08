<?php
	$timkiem=$_GET["text_content"];	
?>
<table width="560" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="33" width="448" style="background-color:#c91401; padding-left:30px; color:#FFF; font-size:16px; font-weight:bold">KẾT QUẢ TÌM KIẾM VỚI TỪ KHÓA: <?php echo $timkiem; ?></td> 
    <td width="112" height="33"><img src="images/bgtitle.jpg" width="112" height="33"></td>
  </tr>
</table>
<?php
	$sql="select count(*) FROM sanpham WHERE hinh like '%".$timkiem."%' OR tensp like '%".$timkiem."%' OR mota like '%".$timkiem."%'";	
	$kq=mysql_query($sql);
	//xac dinh so trang		
	$r=mysql_fetch_array($kq);		
	$numrow=$r[0];	
	//so reco cho 1 trang
	$pagesize=21;
	//tinh tong so trang
	$pagecount=ceil($numrow/$pagesize);
	//xac dinh so trang cho moi lan hien thi	
	if($pagecount>3||$pagecount==0) $segsize=3; else $segsize=$pagecount;
	//thiet lap trang hien hanh
	if(!isset($_GET["page"]))
		 $curpage=1;
	else	
		 $curpage=$_GET["page"];
	if($curpage<1)
		 $curpage=1;
	if($curpage>$pagecount) $curpage=$pagecount;
	//xac dinh so phan doan cua trang
	$numseg=($pagecount % $segsize==0)?($pagecount/$segsize):(int)($pagecount/$segsize)+1;
	//xac dinh phan doan hien hanh cua trang
	$curseg=($curpage % $segsize==0)?($curpage/$segsize):(int)($curpage/$segsize)+1; 	
?>
	<table width="550" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" style="padding-left:5px;">    
<?php
	include "connect.php";
	$sql2="select * from sanpham where hinh like '%".$timkiem."%' OR tensp like '%".$timkiem."%' OR mota like '%".$timkiem."%' limit ".($curpage-1)*$pagesize.",$pagesize";
	$kq2=mysql_query($sql2);
	//$numrow2=mysql_num_rows($kq2);
	if(!$kq2)
	{
		echo "";
	}
	else
	{
		while($r2=mysql_fetch_array($kq2))
		{
			$id=$r2["id"];
			$tensp=$r2["tensp"];	
			$hinh=$r2["hinh"];		
			$gia=$r2["gia"];
			if($gia==0) $s="(liên hệ)";
			else { $s=$gia; }
			echo "<div class=divshow2>
			<table width=175 height=220 border=0 cellspacing=0 cellpadding=0 background=\"images/box.gif\" style=\"border:1px dotted #999\">
			  <tr>
				<td height=170><a href=?b=ct&id=$id><img src='sanpham/small/$hinh' width=170px height=170 border=0> </a></td>
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
	}
?>
	</td>
  </tr>
  </table>

<?php	
	if($numrow==0)
		echo "<table width=560 border=0 cellspacing=0 cellpadding=0 style=\"padding-top:5px; \">
		<tr>
			<td><img src=\"images/ErrorMessage.gif\" width=16 height=16/></td>
			<td>Không có sản phẩm nào phù hợp với từ khóa:<b> $timkiem</b></td>
		  </tr>
		  <tr>
			<td><br><img src=\"images/InfoMessage.gif\" width=16 height=16/></td>
			<td><br>Đề xuất:</td>
		  </tr>
		  <tr>
			<td style=\"line-height:25px\" colspan=2>
			<ul>
			<li>Phải chắc rằng các từ ngữ được ghi đúng chính tả</li>
			<li>Thử từ khóa khác</li>
			<li>Thử dùng từ khóa tổng quát khác</li>
			</ul>
			</td>    
		  </tr>
		  <tr>
			<td><br><img src=\"images/9.png\" width=16 height=16/></td>
			<td><br>Mẹo tìm kiếm:</td>
		  </tr>
		  <tr>
		  	<td style=\"line-height:25px\" colspan=2><ul>
			<li>Tất cả các từ khóa tìm kiếm đều liên quan với tên sản phẩm, mô tả, và mã sản phẩm.</li>
			<li>Cố gắng nhập từ khóa ngắn và liên quan đến sản phẩm cần tìm.</li>			
			</ul></td>
		  </tr>
		</table>";
	else{
		echo "<div align=center>Số trang :&nbsp;";
		$tk=$_REQUEST["text_content"];
		if($curseg>1)
			echo "<a href='/?b=tk&text_content=$tk&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;&nbsp;&nbsp;";
			$n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
			for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
			{
				if($curpage==$i)
					echo "<a href='/?b=tk&text_content=$tk&page=".$i."'><font color='#0000FF'>[".$i."]</font></a> &nbsp;&nbsp;&nbsp;";
				else
					echo "<a href='/?b=tk&text_content=$tk&page=".$i."'>[".$i."]</a> &nbsp;&nbsp;&nbsp;";
			}
		if($curseg<$numseg)
			echo "<a href='/?b=tk&text_content=$tk&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;&nbsp;&nbsp;";		
			echo "<br>Bạn đang ở trang: $curpage / $pagecount</div>";					
	}
?>