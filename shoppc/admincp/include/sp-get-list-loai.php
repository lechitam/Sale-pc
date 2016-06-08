<?php
	include "../connect.php";
	$idloai = $_GET["idloai"];
	
	if($idloai=="chonlsp"){
		include "sp-get-list.php";
	}
	else{	
        $kq=mysql_query("select count(*) from sanpham where id_loai=$idloai"); 
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
		$sql3="select * from sanpham where id_loai=$idloai order by id_loai limit $k,$pagesize";
		$kq3=mysql_query($sql3);
		$s="";
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$tensp=$r3['tensp']; $mota=$r3['mota'] ; 
			$hinh=$r3['hinh'] ; $gia=number_format($r3['gia'],0,'','.') ;$id=$r3["id"];
			$sql2="select * from loaisanpham,sanpham where loaisanpham.id_loai=sanpham.id_loai and sanpham.id='$id'";
			$kq2=mysql_query($sql2);
			while($r2=mysql_fetch_array($kq2))
			{
				$tenloaisp=$r2["tenloaisp"];

				$s.="<tr>
				<td width=100 align=center style=\"border-left:1px solid #333;border-bottom:1px solid #333; border-right:1px solid #333\"><b>$tensp</b></td>
				<td width=200 align=center style=\"border-bottom:1px solid #333; border-right:1px solid #333\">$tenloaisp</td>
				<td width=235 style=\"border-bottom:1px solid #333; border-right:1px solid #333\">
				<div style=\"padding-left:3px; padding-right:3px;\">$mota</div></td>
				<td width=100 align=center style=\"border-bottom:1px solid #333; border-right:1px solid #333\"><img src=\"../sanpham/small/$hinh\" width=90 height=90></td>
				<td width=100 align=center style=\"border-bottom:1px solid #333; border-right:1px solid #333\">$gia</td>
			  </tr>";
     
             }
         }
         }
     
      $s.="<tr>
        <td colspan=5 class=ketthuc>";

        if($numrow==0)
            $s.="Hiện tại không có sản phẩm thuộc loại này!";
        else{  
        if($curseg>1)
            $s.="<a href='?b=sp-list&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
            $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
            for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
            {
                if($curpage==$i)
                   $s.="<a href='?b=sp-list&page=".$i."'><font color='#FF0000'>[".$i."]</font></a> &nbsp;";
                else
                    $s.= "<a href='?b=sp-list&page=".$i."'><font color='#FFF'>[".$i."]</font></a> &nbsp;";
            }
            if($curseg<$numseg)
            $s.="<a href='?b=sp-list&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";		
        }
 
        $s.="</td> </tr>";
		echo $s;
	}
?>