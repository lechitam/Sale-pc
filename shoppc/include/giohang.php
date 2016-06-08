<?php
if(!isset($_SESSION)) session_start();
if (isset($_SESSION["gh"]))
  $gh = $_SESSION["gh"];
else
 $gh = array();

$id = "";
$sl=1;

if (isset($_GET["sl"]))
{
	$sl = $_GET["sl"];
	$sl =floor($sl*1);
}
$hoten=$_GET["hoten"];
$diachi=$_GET["diachi"];
$email=$_GET["email"];
$dt=$_GET["dt"];
$fax=$_GET["fax"];
$cty=$_GET["cty"];
$now=date("Y-m-d H:i:s");

if (isset($_GET["id"]))
{
	$id=$_GET["id"];	
	$act = "a";
}
if (isset($_GET["act"])) $act=$_GET["act"];
if ($act=="a")
{
	themGH($id, $sl);
	}
if ($act=="u")
   capnhatGH( $id, $sl);
if ($act=="d")
   xoaGH( $id);
if ($act=="tt") dathang($gh,$hoten,$diachi,$email,$dt,$fax,$cty,$now);
hienthiGH($gh);


//========================
function themGH($id, $sl)
{
  global $gh;
  //echo "themGH($id, $sl)";
   if (isset($gh[$id])) 
    {
       $gh[$id] = $gh[$id]+$sl;
    }
  else
       $gh[$id] = $sl;
  $_SESSION["gh"] =$gh;
}

function hienthiGH($gh)
{
  include "connect.php"; 
    echo "<table width=560 border=0 cellspacing=0 cellpadding=0 style=\"border:1px solid #333\">
<tr>
    <td colspan=6 class=tieude align=center>GIỎ HÀNG CỦA QUÝ KHÁCH</td>
  </tr>
  <tr bgcolor=\"#ad2200\" align=center height=30 style=\"color:white \">
    <td width=\"80\" style=\"border-right:1px solid #666\"><b>Sản phẩm</b></td>
    <td width=\"60\" style=\"border-right:1px solid #666\"><b>Số lượng</td>
    <td width=\"85\" style=\"border-right:1px solid #666\"><b>Giá</td>
    <td width=\"85\" style=\"border-right:1px solid #666\"><b>Tổng</td>
	<td width=\"50\" style=\"border-right:1px solid #666\"><b>Cập Nhật</td>	
    <td width=\"50\" ><b>Xóa</td>                
  </tr>";
$tongtien=0;
    foreach($gh as $id=>$sl)
      {
		  $count=count($gh);
//		  echo "$count<hr>";
		if($id!=""){	
		 $sql = "select * from sanpham where id='$id' ";
         $ketqua = mysql_query($sql); 		 
         $r = mysql_fetch_array($ketqua);
		
        	$id=$r["id"];
			$tensp=$r["tensp"];
			$gia=$r["gia"]; $gia2=number_format($gia,0,'','.');
			$tong=$gia*$sl; $tong2=number_format($tong,0,'','.');
			$tongtien+=$tong;$tongtien2=number_format($tongtien,0,'','.');				
	//	 $hinh = "images_data/".$dong["hinh"];
		
          echo "<tr align=\"center\" height=\"30\" >
    		
            <td style=\"border-right:1px solid #666; border-bottom:1px solid #666\">$tensp</td>
            <td style=\"border-right:1px solid #666; border-bottom:1px solid #666\">
			<form id='f$id'>
			<input type=hidden name='act' /><input type=hidden name=id value='$id' />
			<input type=hidden name=b value='gh'>
            <input type=\"text\" name=\"sl\" value='$sl' style=\"width:30px\" />  
            </td></form>
            <td align=\"right\" style=\"border-right:1px solid #666; border-bottom:1px solid #666; padding-right:3px\">$gia2 VND</td>
            <td align=\"right\" style=\"border-right:1px solid #666; border-bottom:1px solid #666; padding-right:3px\">$tong2 VND</td>
            <td style=\" border-bottom:1px solid #666; border-right:1px solid #666\" >
            <a onClick=\"subMitF('f$id', 'u');\">Cập Nhật</a>
            </td>               
            <td style=\" border-bottom:1px solid #666\" >
			<a onClick=\"subMitF('f$id', 'd');\">Xóa</a>
            </td>               
     	  </tr>";
	  }
	  }
if($count=="")
{
	echo "<tr><td height=30 colspan=6 align=center style=\"padding-right:5px; padding-bottom:5px; color:#F00\">Không có sản phẩm nào trong giỏ hàng của Quý khách!</td></tr>";
}
else{
  echo "<tr>
  	<td height=30 colspan=6 align=right style=\"padding-right:5px; padding-bottom:5px; color:#F00\">Tổng số tiền phải thanh toán: $tongtien2 VND</td></tr>";
  echo "<tr>
  	<td colspan=\"6\" bgcolor=\"#fff\" align=\"center\" height=\"35\">
	<form name=form>
    <input type=\"button\" name=\"tieptucmuahang\" value=\"Tiếp Tục Mua Hàng\" class=\"button3\" onmouseover=\"style.background='url(images/button-150-2-o.png)'\" onmouseout=\"style.background='url(images/button-150-o.png)'\" onclick=\"document.form.action='index.php'; document.form.submit();\" />
	<input type=\"button\" name=\"dathang\" value=\"Đặt Hàng\" class=\"button2\" onmouseover=\"style.background='url(images/button-110-2-o.png)'\" onmouseout=\"style.background='url(images/button-110-o.png)'\" onclick=\"document.getElementById('thanhtoan').style.display='block'\"/>
	</form>
    </td>
  </tr>";  
}
    echo "</table>";
	echo "<div id='thanhtoan' style='display:none'>
	<form id='k$id'>
		<table width=\"560\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"padding-top:10px; border:1px solid #333\">		
		<td colspan=\"6\" class=\"tieude\" align=\"center\">THÔNG TIN LIÊN HỆ</td>
	  </tr>
	  <tr>
		<td height=\"30\"><div style=\"padding-left:70px\">Họ và tên: </div></td>
		<td width=\"350\">		
		<input type=hidden name='act' /><input type=hidden name=id value='$id' />
			<input type=hidden name=b value='gh'>
		<input name=\"hoten\" type=\"text\" size=\"35\" maxlength=\"50\" > <font color=\"#FF0000\">*</font></td>
	  </tr>
	  <tr>
		<td height=\"30\"><div style=\"padding-left:70px\">Địa chỉ:</div></td>
		<td><input name=\"diachi\" type=\"text\" size=\"35\" maxlength=\"50\"> <font color=\"#FF0000\"> *</font> </td>
	  </tr>
	  <tr>
		<td height=\"30\"><div style=\"padding-left:70px\">Email:</div> </td>
		<td><input name=\"email\" type=\"text\" size=\"35\" maxlength=\"50\"> <font color=\"#FF0000\"> *</font></td>
	  </tr>
	  <tr>
		<td height=\"30\"><div style=\"padding-left:70px\">Số điện thoại:</div></td>
		<td><input name=\"dt\" type=\"text\" size=\"35\" maxlength=\"50\" onkeyup=\"valid(this,'numbers')\" onblur=\"valid(this,'numbers')\" ><font color=\"#FF0000\"> *</font></td>
	  </tr>
	  <tr>
		<td height=\"30\"><div style=\"padding-left:70px\">Fax:</div></td>
		<td><input name=\"fax\" type=\"text\" size=\"35\" maxlength=\"50\" onkeyup=\"valid(this,'numbers')\" onblur=\"valid(this,'numbers')\"></td>
	  </tr>
	  <tr>
		<td height=\"30\"><div style=\"padding-left:70px\">Công ty:</div></td>
		<td><input name=\"cty\" type=\"text\" size=\"35\" maxlength=\"50\"></td>
	  </tr>
      <tr>
        <td colspan=\"2\" bgcolor=\"#fff\" align=\"center\" height=\"35\">
		<input type=\"button\" value=\"Gửi\" class=\"button\" onmouseover=\"style.background='url(images/button-2-o.gif)'\" onmouseout=\"style.background='url(images/button-o.gif)'\" onclick=\"subMitF('k$id', 'tt');\">
          <input type=\"reset\" value=\"Nhập lại\" class=\"button\" onmouseover=\"style.background='url(images/button-2-o.gif)'\" onmouseout=\"style.background='url(images/button-o.gif)'\"  >
         </td>
      </tr>	  
    </table>
	</form>
	</div>";
}

function dathang($gh,$hoten,$diachi,$email,$dt,$fax,$cty,$now)
{
  mysql_connect("localhost", "root", "");
  mysql_select_db("shop");
  if($hoten==""||$diachi==""||$email==""||$dt=="")
		echo "<script>alert('Quý khách phải nhập đầy đủ thông tin vào những nơi có dấu *');</script>";
  else{
  foreach($gh as $id=>$sl)
  {	  	
		$q=mysql_query("select gia from sanpham where id='$id'");
		while($rq=mysql_fetch_array($q))
		{
			$gia=$rq["gia"];
			$tien=$gia*$sl;
		$sql2 = "insert into hoadon(hoten,diachi,email,dienthoai,fax,cty,id,soluong,tongtien,ngaydat,tinhtrang) values ('$hoten','$diachi','$email','$dt','$fax','$cty','$id',$sl,'$tien','$now','dathang')";
		$sql2.=';';
		$ketqua2 = mysql_query($sql2);
		
		echo "<script>alert('Quý khách đã gửi đơn hàng thành công!');window.location='index.php'</script>";
	// echo "$sql2<br>";
		}
		session_destroy();
  }
  }
}

function xoaGH( $item)
{
	global $gh;

   if (isset($gh[$item])) 
    {
		unset($gh[$item]);
   		$_SESSION["gh"]=$gh;
	}
}

function capnhatGH( $id, $sl)
{
		global $gh;
	
	if (isset($gh[$id])) 
    {
		$gh[$id] = $sl;
		if ($sl<1)
		{
			unset($gh[$id]);
		    echo "Xoa...";
		}
		$_SESSION["gh"]=$gh;
	}
   		
}

?>
<script language="javascript">
function subMitF(fn, type)
{
var a=document.getElementById(fn);
//alert(a.nodeName);
b=a.getElementsByTagName('input')[0];
//alert("Co "+b.length+" node Input");
b.value=type;
a.submit();

}
</script>
