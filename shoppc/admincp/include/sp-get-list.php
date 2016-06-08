<?php
include "connect.php";
if(isset($_POST["act"]))
{
	//$ma = implode($_POST["mcm"], ", ");
	$ma = implode($_POST["chon"], ", ");
	if($ma=='')
		echo "<script>alert('Chưa chọn sản phẩm cần xóa!!!');window.history.go(-1);</script>";
	else
	{	
			echo "<script>var check=window.confirm('Bạn chắc chắn muốn xóa sản phẩm này');
			if(check==true) ";

			$sql3="Delete from sanpham where sanpham in $ma";
			$kq3=mysql_query($sql3);				
			if(!$kq3)
				echo "<script>alert('Có lỗi trong khi xóa!!!');</script>";
			else
			{
				$n+=mysql_affected_rows();
				echo "<script>alert('Đã xóa $n sản phẩm!');window.location='../admincp/?b=sp-list';</script>";
			}			
			echo "else return false;</script>";
		
	}
}
?>
<?php include("check-login.php") ?>
<table width="735" border="0" cellspacing="0" cellpadding="0">
<form method="post" name="form2">
<?php
        $kq=mysql_query("select count(*) from sanpham"); 
        $r=mysql_fetch_array($kq);
        $numrow=$r[0];		
        //số record cho 1 trang
        $pagesize=20;
        //Tính tổng số trang
        $pagecount=ceil($numrow/$pagesize);			
        //Xác định số trang cho mỗi lần hiển thị
        $segsize=5;
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
		
	//******************************** Nội Dung *********************************//
		$sql3="select * from sanpham order by tensp limit $k,$pagesize";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$tensp=$r3['tensp']; $mota=$r3['mota'] ; $ghichu=$r3["ghichu"];
			$hinh=$r3['hinh'] ; $gia=number_format($r3['gia'],0,'','.') ;$id=$r3["id"];
			$sql2="select * from loaisanpham,sanpham where loaisanpham.id_loai=sanpham.id_loai and sanpham.id='$id'";
			$kq2=mysql_query($sql2);
			while($r2=mysql_fetch_array($kq2))
			{
				$tenloaisp=$r2["tenloaisp"];
  ?>
  <tr>
  <td width="50" align="center" style="border-left:1px solid #333;border-bottom:1px solid #333; border-right:1px solid #333"><input type="checkbox" name="chon[]" value="<?php echo $id; ?>"/></td>  
    <td width="80" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><b><?php echo "$tensp"; ?></b></td>
    <td width="100" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><?php echo "$tenloaisp"; ?></td>
    <td width="135" style="border-bottom:1px solid #333; border-right:1px solid #333">
	<div style="padding-left:3px; padding-right:3px;"><?php echo "$mota"; ?></div></td>
    <td width="100" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><img src="../sanpham/small/<?php echo "$hinh"; ?>" width="90" height="90"></td>
	<td width="100" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><?php echo "$gia"; ?></td>
	<td width="80" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><?php echo "$ghichu"; ?></td>    
    <td width="50" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><a href="?b=sp-update&id=<?php echo $id; ?>">Sửa</a></td>
    <td width="50" align="center" style="border-bottom:1px solid #333; border-right:1px solid #333"><a href="?b=sp-del&id=<?php echo $id; ?>" onclick="return check()">Xóa</a>
    </td>
  </tr>
 <?php
	  		}
		}
		}
 ?>
  <tr>
	<td colspan="9" class="ketthuc">
 <?php
    if($numrow==0)
		echo "Lỗi SQL!!";
	else{  
    if($curseg>1)
        echo "<a href='?b=sp-list&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
        $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
        for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
		{
			if($curpage==$i)
				echo "<a href='?b=sp-list&page=".$i."'><font color='#FF0000'>[".$i."]</font></a> &nbsp;";
			else
				echo "<a href='?b=sp-list&page=".$i."'><font color='#FFF'>[".$i."]</font></a> &nbsp;";
		}
        if($curseg<$numseg)
		echo "<a href='?b=sp-list&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";		
	}
?>
    </td>
  </tr>
  <input type="hidden" name="act" />
  </form>
</table>