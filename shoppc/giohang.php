<?php
if(!isset($_SESSION)) session_start();
ob_start();
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

if (isset($_GET["id"])) $id=$_GET["id"];
/*$hoten=$_GET["hoten"];
$diachi=$_GET["diachi"];
$email=$_GET["email"];
$dt=$_GET["dt"];
$fax=$_GET["fax"];
$cty=$_GET["cty"];
$anti=$_GET["anti"];*/

$act = "add";
if (isset($_GET["act"])) $act=$_GET["act"];
if ($act=="add") 
	themGH($id, $sl);
if ($act=="update")
   capnhatGH( $id, $sl);
if ($act=="delete")
   xoaGH( $id);
if ($act=="tt") dathang($gh,$hoten);
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
  mysql_connect("localhost", "root", "root");
  mysql_select_db("vietducdb");
    echo "<table width=560 border=0 cellspacing=0 cellpadding=0 style=\"border:1px solid #333\">
<tr>
    <td colspan=6 class=tieude align=center>GIỎ HÀNG CỦA QUÝ KHÁCH</td>
  </tr>
  <tr bgcolor=\"#00FFFF\" align=center height=30 style=\"font-weight:bold\">
    <td width=\"80\" style=\"border-right:1px solid #666\">Sản phẩm</td>
    <td width=\"60\" style=\"border-right:1px solid #666\">Số lượng</td>
    <td width=\"85\" style=\"border-right:1px solid #666\">Giá</td>
    <td width=\"85\" style=\"border-right:1px solid #666\">Tổng</td>
	<td width=\"50\" style=\"border-right:1px solid #666\">Cập Nhật</td>	
    <td width=\"50\" >Xóa</td>                
  </tr>";
$tongtien=0;
    foreach($gh as $id=>$sl)
      {
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
            <input type=\"text\" name=\"sl\" value='$sl' style=\"width:30px\" />  
            </td></form>
            <td align=\"right\" style=\"border-right:1px solid #666; border-bottom:1px solid #666; padding-right:3px\">$gia2 VND</td>
            <td align=\"right\" style=\"border-right:1px solid #666; border-bottom:1px solid #666; padding-right:3px\">$tong2 VND</td>
            <td style=\" border-bottom:1px solid #666; border-right:1px solid #666\" >
            <a onClick=\"subMitF('f$id', 'update');\">Cập Nhật</a>
            </td>               
            <td style=\" border-bottom:1px solid #666\" >
			<a onClick=\"subMitF('f$id', 'delete');\">Xóa</a>
            </td>               
     	  </tr>";
	  }
	  }
  echo "<tr>
  	<td height=30 colspan=6 align=right style=\"padding-right:5px; padding-bottom:5px; color:#F00\">Tổng số tiền phải thanh toán: $tongtien2 VND</td></tr>";
  echo "<tr>
  	<td colspan=\"6\" style=\" border-bottom:1px solid #666\" bgcolor=\"#0000FF\" align=\"center\" height=\"35\">
	<form name=form>
    <input type=\"button\" name=\"tieptucmuahang\" value=\"Tiếp Tục Mua Hàng\" class=\"button3\" onmouseover=\"style.background='url(images/button-150-2.png)'\" onmouseout=\"style.background='url(images/button-150.png)'\" onclick=\"document.form.action='list.php'; document.form.submit();\" />
	<input type=\"button\" name=\"dathang\" value=\"Đặt Hàng\" class=\"button2\" onmouseover=\"style.background='url(images/button-110-2.png)'\" onmouseout=\"style.background='url(images/button-110.png)'\" onclick=\"document.getElementById('thanhtoan').style.display='block'\"/>
	</form>

    </td>
  </tr>";  
    echo "</table>";
	echo "<div id='thanhtoan' style='display:none'>
		<table width=\"560\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"padding-top:10px; border:1px solid #333\">
		<form id='f$id'>
		<td colspan=\"6\" class=\"tieude\" align=\"center\">THÔNG TIN LIÊN HỆ</td>
	  </tr>
	  <tr>
		<td height=\"30\"><div style=\"padding-left:70px\">Họ và tên: </div></td>
		<td width=\"350\">
		
		<input type=hidden name='act' /><input type=hidden name=id value='$id' />
		<input name=\"hoten\" type=\"text\" size=\"35\" maxlength=\"50\" ><font color=\"#FF0000\">*</font></td>
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
		<td><input name=\"dt\" type=\"text\" size=\"35\" maxlength=\"50\" > <font color=\"#FF0000\"> *</font></td>
	  </tr>
	  <tr>
		<td height=\"30\"><div style=\"padding-left:70px\">Fax:</div></td>
		<td><input name=\"fax\" type=\"text\" size=\"35\" maxlength=\"50\"></td>
	  </tr>
	  <tr>
		<td height=\"30\"><div style=\"padding-left:70px\">Công ty:</div></td>
		<td><input name=\"cty\" type=\"text\" size=\"35\" maxlength=\"50\"></td>
	  </tr>	  
      <tr>
        <td colspan=\"2\" bgcolor=\"#0000FF\" align=\"center\" height=\"35\">
		<input type=\"button\" value=\"Gửi\" class=\"button\" onmouseover=\"style.background='url(images/button-2.gif)'\" onmouseout=\"style.background='url(images/button.gif)'\" onclick=\"subMitF('f$id', 'tt');\">
          <input type=\"reset\" value=\"Nhập lại\" class=\"button\" onmouseover=\"style.background='url(images/button-2.gif)'\" onmouseout=\"style.background='url(images/button.gif)'\"  >
         </td>
      </tr>
	  </form> 
    </table>
	</div>";
}

function dathang($gh,$hoten)
{
  mysql_connect("localhost", "root", "root");
  mysql_select_db("shop");
 foreach($gh as $id=>$sl)
  {	
	 $sql2 = "insert into hoadon(hoten,id,soluong) values ('$hoten','$id',$sl)";
	 $sql2.=';';
	// $ketqua2 = mysql_query($sql2);
	 echo "$sql2<br>";
	
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
<?php ob_end_flush(); ?>