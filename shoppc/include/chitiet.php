<?php
//session_destroy();
	if(isset($_POST["dathang"]))
	{
		$gia=$_POST["gia"];
	//	echo "$gia<hr>";
		$id = $_GET["id"];	
		if(isset($_SESSION['user']))
		{				
			$user=$_SESSION ['user'];
			$query="SELECT * FROM giohang WHERE id='$id' AND user='$user' AND tinhtrang='themgiohang'";
			$result=mysql_query ($query);
			$numrow=mysql_num_rows($result);
			if($numrow!=0)
			{
				echo "<script>alert('Sản phẩm này đã có trong giỏ hàng của Quý khách');</script>";
			}		
			else	
			{
				$ngaydat=date("Y-m-d");
				$query2="INSERT INTO giohang(id,user,soluong,tinhtrang,ngaydat) VALUES ('$id','$user',1,'themgiohang','$ngaydat')";			
			//	echo "$query2";
				$result2=mysql_query($query2) or die(mysql_error());
				if($result2)			
					echo "<script>window.location='index.php?b=showcart';</script>";			
				else			
					echo "<script> alert('Có lỗi xảy ra trong quá trình mua hàng!');</script>";			
			}	
		}
		}
?>
<?php
	include "connect.php";
	$id=$_GET["id"];
	$sql="SELECT sanpham.*,loaisanpham.*,nhomsanpham.* from sanpham,loaisanpham,nhomsanpham where sanpham.id_loai=loaisanpham.id_loai AND loaisanpham.id_nhom=nhomsanpham.id_nhom AND sanpham.id='$id'";
	$kq=mysql_query($sql);
	$r=mysql_fetch_array($kq);	
	$tensp=$r["tensp"];$tenloaisp=$r["tenloaisp"];$tinhtrang=$r["tinhtrang"];
	$tennhom=$r["tennhom"];$id_nhom=$r["id_nhom"];
	$hinh=$r["hinh"];$gia=$r["gia"];$gia2=number_format($gia,0,'','.');
	$id_loai=$r["id_loai"];
	$mota=$r["mota"];
	if($mota=="") $mt='Mô tả của sản phẩm này đang được cập nhật!'; else $mt=$mota;
?>
<div style="width:560px">
<table width="560" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="33" width="448" style="background-color:#c91401; padding-left:30px; color:#FFF; font-size:16px; font-weight:bold">THÔNG TIN SẢN PHẨM</td> 
    <td width="112" height="33"><img src="images/bgtitle.jpg" width="112" height="33"></td>
  </tr>
</table>
<table width="560" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" height="40" style="border-bottom:1px solid #333; background:url(images/toplist-content.gif) repeat-x; font-weight:bold">
    <a href="index.php"><img src="images/Home.gif" width="16" height="16" border="0"></a>
    <img src="images/towred1-r.gif" width="16" height="9">
    <a href="?b=nsp&idn=<?php echo $id_nhom; ?>"><?php echo "$tennhom"; ?></a>      
    <img src="images/towred1-r.gif" width="16" height="9">
    <a href="?b=lsp&idl=<?php echo $id_loai; ?>"><?php echo "$tenloaisp"; ?></a> 
    <img src="images/towred1-r.gif" width="16" height="9">
  	<a href="?b=ct&id=<?php echo $id ?>"><?php echo "$tensp"; ?></a>
    </td>
    </tr>
  <tr>
    <td width="220" rowspan="7" align="center" valign="top"><div onclick="var win=window.open('zoom.php?id=<?php echo $id; ?>', 'open_window', 'width=405, height=530, left=0, top=0')">
      <p><img src="sanpham/small/<?php echo $hinh; ?>" width="170" height="170"><br />
        Lớn hơn
      </p>
      <p>&nbsp;</p>
    </div>
	<form method="post" name="form">
    <input type="hidden" name="dathang" />
	<input type="hidden" value=<?php echo "$id"; ?> name="catid" /> 
    <input type="hidden" name="gia" value="<?php echo "$gia"; ?>" />
    <?php 
	if(isset($_SESSION["user"]))
	{
	    echo"<a onClick=\"document.form.submit();\">
    	<img src=\"images/chovaogiohang.jpg\" width=\"151\" height=21 border=0>
	    </a>";
	}
	else
		echo "<a href=\"index.php?b=gh&id=$id&g=$gia\"><img src=\"images/chovaogiohang.jpg\" width=\"151\" height=21 border=0></a>";
	?>
    </form></td>
    <td width="120" height="25" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Mã sản phẩm:</td>
    <td width="220" style="border-bottom:1px dotted #666; padding-left:5px"><span style="font-size:18px; color:#00F; font-weight:bold"><?php echo $tensp; ?></span></td>
  </tr>
  <tr>
    <td height="25" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Giá:</td>
    <td style="border-bottom:1px dotted #666; padding-left:5px"><font color="#FF0000"><?php  echo "$gia2 VND"; ?></font></td>
  </tr>
  <tr>
    <td height="25" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Thuế VAT:</td>
    <td style="border-bottom:1px dotted #666; padding-left:5px"><font color="#FF0000">Giá trên chưa bao gồm thuế</font></td>
  </tr>
  <tr>
    <td height="25" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Bảo hành:</td>
    <td style="border-bottom:1px dotted #666; padding-left:5px">12 tháng.</td>
  </tr>
  <tr>
    <td height="40" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Vận chuyển:</td>
    <td style="border-bottom:1px dotted #666; padding-left:5px">Giao hàng toàn quốc</td>
  </tr>
  <tr>
    <td height="40" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Thời gian <br />
      giao hàng:</td>
    <td style="border-bottom:1px dotted #666; padding-left:5px">
     <?php 
		if($tinhtrang==0) echo "<strong>7 ngày</strong> sau khi đặt hàng";
		else echo "<strong>1 ngày</strong> sau khi đặt hàng";
	?>
    </td>
  </tr>  
  <tr>
    <td height="70" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Hình thức<br />
thanh toán:</td>
    <td style="padding-left:5px"><p>Nhận tiền sau khi giao hàng</p></td>
  </tr>

    <td align="justify" colspan="3" style="border-bottom:1px solid #333; padding-bottom:5px; color:#F00">
    </td>
  </tr>  
</table>
<table width="560" border="0" cellspacing="0" cellpadding="0" style="padding-top:5px;">
<tr>
  	<td>
    <div id="TabbedPanels1" class="TabbedPanels">
  	  <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0">Mô tả sản phẩm</li>
	    </ul>
       
  	  <div class="TabbedPanelsContentGroup">
	   <!-- Mô tả sản phẩm --> 
        <div class="TabbedPanelsContent">
        <table width="552" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="line-height:25px"><?php echo $mt; ?></td>
          </tr>
        </table>
        </div>
       <!-- end - Mô tả sản phẩm -->        
       
     
	    </div>
	  </div></td>  
  </tr>
</table>
<table width="560" border="0" cellspacing="0" cellpadding="0" style="padding-top:5px;">
<tr>
  	<td>
    <div id="TabbedPanels1" class="TabbedPanels">
  	  <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0"><font color="#FFFFFF">Sản phẩm cùng loại</font></li>        
	    </ul>
       
  	  <div class="TabbedPanelsContentGroup">       
       <!-- sản phẩm cùng loại --> 
        <div class="TabbedPanelsContent2">
        <table width="550" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" style="padding-left:5px;">    
        	<?php
            include "connect.php";
            $sql2="select * from sanpham where id_loai=$id_loai and ( ghichu='hienthi' or ghichu='new' ) and id<>'$id' order by rand() limit 0,27";
            $kq2=mysql_query($sql2);			
            while($r2=mysql_fetch_array($kq2))
            {
                $id2=$r2["id"];
                $tensp2=$r2["tensp"];	
                $hinh2=$r2["hinh"];		
                $gia2=$r2["gia"];$gia3=number_format($gia2,0,'','.');
                if($gia2==0) $s2="(liên hệ)"; else { $s2=$gia3; }				
				if($id2==$id) echo "";
				else {
                echo "<div class=divshow2>
                <table width=175 height=220 border=0 cellspacing=0 cellpadding=0 background=\"images/box.gif\" style=\"border:1px dotted #999\">
                  <tr>
                    <td height=170><a href=?b=ct&id=$id2><img src='sanpham/small/$hinh2' width=170px height=170 border=0> </a></td>
                  </tr>
                  <tr>
                    <td height=25 style=\"font-size:14px; color:#F00\"><strong>$tensp2</strong></td>
                  </tr>
                  <tr>
                    <td height=25>Giá: $s2</td>
                  </tr>
                </table>		
                </div>";
				}
            }
        ?>
            </td>
          </tr>
        </table>
        </div>
       <!-- end - sản phẩm cùng loại -->  
 
	    </div>
	  </div></td>  
  </tr>
</table>
</div>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>
