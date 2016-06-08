<?php
include "connect.php";
$mota="";$gia="";$tensp="";$ghichu="";
if(isset($_POST["act"]))
{//(1)
	$loaisp=$_POST["loaisp"];
	//echo "loaisp: $loaisp<hr>";
	$menu=$_POST["menu"];
	$tensp=$_POST["tensp"];
	$mota = $_POST['mota'];
	$gia=$_POST["gia"];$ghichu=$_POST["ghichu"];
	$kd=khongdau2($_POST["tensp"]);
	$id=md5($kd);
	$kt="select count(*) from sanpham where id='$id'";
	$kq_kt=mysql_query($kt);
	$r_kt=mysql_fetch_array($kq_kt);
	$n_kt=$r_kt[0];
	if($n_kt!=0){
		echo "<script>alert('Sản phẩm này đã có trong cơ sỡ dữ liệu');</script>";}
	else{//(2)	
	$file_name = $_FILES["hinh"]["name"];
	$tmp_name = $_FILES['hinh']['tmp_name'];	
	$imageInfo = explode('.', $file_name);  //cắt chuỗi ở những nơi có dấu .		
	$newName = $kd.".".$imageInfo[1]; 			

	switch($imageInfo[1]){
	case "jpg":
		$src = imagecreatefromjpeg($tmp_name);
	break;
			
	case "jpeg":
		$src = imagecreatefromjpeg($tmp_name);
	break;
	
	case "gif":
		$src = imagecreatefromgif($tmp_name);
	break;
					
	case "png":
		$src = imagecreatefrompng($tmp_name);
	break;	
		
	}//end - switch
	if(isset($_REQUEST["n"]))
	{//(3)
		$n=$_REQUEST["n"];
		if($n=="menu")
			$sql="insert into sanpham(id,tensp,mota,hinh,gia,ghichu,id_menu) values ('$id','$tensp','$mota','$newName','$gia','$ghichu',$menu)";
	}//(3)
	else{
		$sql="insert into sanpham(id,id_loai,tensp,mota,hinh,gia,ghichu) values ('$id',$loaisp,'$tensp','$mota','$newName','$gia','$ghichu')";}
//	echo "$sql<hr>";
	$kq=mysql_query($sql);
	if(!$kq){
	echo "<script>alert('Có lỗi SQL! Nhập lại!');</script>";		
	}
	else {//(4)
		
//********************************resize hinh ********************************//
	list($width,$height)=getimagesize($tmp_name);  //lấy kích thước của file
	$newwidth=170;
	$newheight=170;
	$tmp=imagecreatetruecolor($newwidth,$newheight); //tạo kíck thước mới rồi gán vào 1 file hình
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); //chép hình từ file src ( ng ta gửi ) sang khung hình kíck thước mới
	$pathfile="../sanpham/large/".$newName;	
	$pathfull="../sanpham/small/".$newName;	
	move_uploaded_file($_FILES["hinh"]["tmp_name"], $pathfile);
	imagejpeg($tmp,$pathfull,100);		   //lưu hình tmp với đường dẫn là pathfull
	imagedestroy($src); imagedestroy($tmp); //xóa hình tạm khỏi bộ nhớ
//********************************resize hinh ********************************//	
		
		$n=mysql_affected_rows();
		echo "<script>alert('Đã thêm $n sản phẩm!');window.location='?m=sp&b=sp-insert'</script>";
		$loaisp="";$mota="";$gia="";$tensp="";$ghichu="";
	}//(4)

	}//(2)
}//(1)

?>
<script language="javascript">
function createXMLHttp()
    {
        var xmlHttp =false;
        try{
          xmlHttp = new XMLHttpRequest();
        }
        catch(e)
        {
          xmlHttp = new ActiveXObject("Microsoft.XMLHttp");
        }
        if (!xmlHttp)
        {
          alert("Loi ...");
        }
        else
        {
          return xmlHttp;
        
        }
    
    }   
        
var xmlHttp = new createXMLHttp();
function comboChange(v)
{
  var url = "../admincp/include/get-loaisp.php?idn="+v;
//alert(url);
 if (xmlHttp.readyState==4 || xmlHttp.readyState==0)
      {
        xmlHttp.open("GET", url, true);
        xmlHttp.onreadystatechange=Func;
        xmlHttp.send(null);
      }
  }
    
 function Func()
    {
//    alert("Here xmlHttp.readyState="+xmlHttp.readyState);
   		
        if (xmlHttp.readyState==4)
        {
            if (xmlHttp.status==200)
            {
             
				var s="";
				//s +="     <option value='chonlsp'>-- Chọn loại sản phẩm --</option> ";
				s += xmlHttp.responseText;
				//alert(s);
				var oXml = xmlHttp.responseXML.documentElement;
				
				var select = document.getElementById("loaisp");
				select.innerHTML="";				
				
				var arrLoai = oXml.getElementsByTagName("value");
				var arrTextLoai=oXml.getElementsByTagName("text");
				for(i=0; i<arrLoai.length; i++)
				{
				  var opt = document.createElement("option");
				  
				  opt.setAttribute("value", arrLoai[i].firstChild.data);
				  var text = document.createTextNode(arrTextLoai[i].firstChild.data);
				   opt.appendChild(text);
				   select.appendChild(opt);
				}				
       		}
			else
			 alert("Coloi tu server."+xmlHttp.statusText);
		}
		
}
</script>
<?php
	include("connect.php");
	function print_option($sql)
	{
		$kq=mysql_query($sql);
		while ($r=mysql_fetch_array($kq))
			echo "<option value=$r[0]> $r[1] </option>";
	}
?>
<table width="735" border="0" cellspacing="0" cellpadding="0" ">
  <tr>
    <td colspan="2" class="tieude" align="center" border-left:1px solid #CCCCCC">THÊM SẢN PHẨM MỚI</td>
  </tr>  
  <?php
  if(isset($_REQUEST["n"]))  
	  echo "<form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return sp_insert_m(menu.value,tensp.value,hinh.value,ghichu.value);\" id=\"forminsert\" name=\"forminsert\">";
  else
	  echo "<form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return sp_insert(loaisp.value,tensp.value,hinh.value,ghichu.value);\" id=\"forminsert\" name=\"forminsert\">";
  
  ?>
    <?php
	$n=$_GET["n"];
	if(isset($n))	
		echo "";
	else{
	    echo "<tr><td style=\"padding-left:80px\" height=\"30\">Nhóm sản phẩm:</td>"; 
	    echo "<td><select name=\"nhomsp\" style=\"width:240px;\" onChange=\"comboChange(this.value)\">
        <option value=\"choncm\">-- Chọn nhóm sản phẩm --</option>";
			print_option("select id_nhom,tennhom from nhomsanpham");
		echo "</select></td></tr>";	  	
	  }
      ?>
  <tr bgcolor="#FFFFFF">
    <td width="200" style="padding-left:80px" height="30">Loại sản phẩm:</td>
    <td width="535">
    <?php
		$n=$_GET["n"];
		if(!isset($n))
		{
			echo "
			<div id=loaisanpham>
			<select name=\"loaisp\" style=\"width:240px;\" id='loaisp'>
				<option value=\"chonlsp\">-- Chọn loại sản phẩm --</option>	";						
				print_option("select id_loai,tenloaisp from loaisanpham order by id_nhom ASC");
			echo  "</select></div>";
		}
		else{
		$n=$_GET["n"];
			switch($n)
			{	
				case menu:
					echo "<select name=\"menu\" style=\"width:240px;\">
							<option value=\"chonmenu\">---------------- Chọn ----------------</option>";									
							print_option("select id_menu,tenmenu from menu");
					echo	"</select>";
				break;
			}
		}
	
	?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:80px" height="30">Tên sản phẩm:</td>
    <td><input type="text" name="tensp" style="width:240px" value="<?php echo "$tensp"; ?>"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td style="padding-left:80px" height="30">Mô tả:</td>  
    <td><textarea name="mota" cols="27" rows="5"  style="width:240px"></textarea> </td>
  </tr>
  <tr>
  	<td colspan="2" style="padding-left: 50px">
    </td>
  </tr>
  <tr>
    <td style="padding-left:80px" height="30">Hình ảnh:</td>
    <td><input name="hinh" type="file" size="30"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td style="padding-left:80px" height="30">Giá:</td>
    <td><input name="gia" type="text" maxlength="20" style="width:240px" value="<?php echo "$gia"; ?>" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"></td>
  </tr>
  <tr>
    <td style="padding-left:80px" height="30">Ghi chú:</td>
    <td>   
    <select name="ghichu" style="width:240x" >
    <option value="chonmenu">----------Chọn----------</option>
  	<option value="new">Mặt hàng mới</option>
	<option value="hienthi">Hiển thị</option>
	<option value="hangdat">Hàng đặt</option>
    </select>
    </td>
  </tr>  
  <tr>
  	<td align="center" colspan="2" height="35" style="border-bottom:1px solid #CCCCCC ">
    <input name="" type="submit" value="Thêm" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'">
    <input name="" type="reset" value="Xóa trắng" class="button" onmouseover="style.background='url(../images/button-2-o.gif)'" onmouseout="style.background='url(../images/button-o.gif)'">    
    </td>
  </tr>
  <input type="hidden" name="act">
  </form>
</table>
