<?php
function checkquyentruycap_bang($mucbang)
{
	$sscapquyen=$_SESSION['capquyen'];
	if ($sscapquyen!=$mucbang)
	 	echo "<script>alert('Không có quyền truy cập vào phần quản lý này.'); window.location='index.php';</script>";
}

function checkquyentruycap_bang2($muc2,$muc3)
{
	$sscapquyen=$_SESSION['capquyen'];
	if (($sscapquyen!=$muc2) and ($sscapquyen!=$muc3))
	 	echo "<script>alert('Không có quyền truy cập vào phần quản lý này '); window.location='index.php';</script>";
 }
 
function checked_quyenhan()
{
	if (isset($_GET['key']))
	{
		 $idkey=EncodeSpecialChar($_GET['key']);
		 
		 $sql_quyenhan="SELECT * FROM capquyen where user='$idkey'";
		 $result_thanhvien=mysql_query($sql_quyenhan);
		
		 echo "<script language='JavaScript'>";			

		while ($row=mysql_fetch_array($result_thanhvien))
		{							
				echo "document.form1.check_".$row["id_chuyenmuc"].".checked=true;";						
		} 		
		echo "</script>";		// dong javascript
	}
 }

function EncodeSpecialChar($content) {  //insert table
	$content = trim($content);
	$content = addslashes($content);
	$content = htmlspecialchars($content);
	return $content;
}

function ConvertDate_time_db($predate) // insert table
{
	$arr1=explode(" ",$predate);
	$arr=substr($arr1[0],0,10);
	$date=explode("-",$arr);
	return $date[2]."-".$date[1]."-".$date[0]." ".$arr1[1] ;
}

function ConvertDate_time_load($predate) // load data
{
	$arr1=explode(" ",$predate);
	$arr=substr($arr1[0],0,10);
	$date=explode("-",$arr);
	return $date[2]."/".$date[1]."/".$date[0]." ".$arr1[1] ;
}

//Function getid
	function getid()
	{
		include "connect.php";	
		$sql="select max(id_nhom) AS maxid from nhomsanpham";
		$kq=mysql_query($sql);
		while($r=mysql_fetch_array($kq)){
			$maxid=$r['maxid'];
			$k=$maxid+1;		
		}
		return $k;
	}	

//Function getid
	function getidl()
	{
		include "connect.php";	
		$sql="select max(id_loai) AS maxid from loaisanpham";
		$kq=mysql_query($sql);
		while($r=mysql_fetch_array($kq)){
			$maxid=$r['maxid'];
			$k=$maxid+1;		
		}
		return $k;
	}	


//Function lọc bỏ dấu
function khongdau($str) {
    $search = array (
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
		'#(A-Z)#',
        "/[^a-zA-Z0-9.\-\_]/",
    );
    $replace = array ('a','e','i','o','u','y','d','A','E','I','O','U','Y','D','a-z','-',);
    $str = preg_replace($search, $replace, $str);
    $str = preg_replace('/(-)+/', '-', $str);
    return $str;
}

function khongdau2($str) {
    $search = array (
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
		'#(A-Z)#',
        "/[^a-zA-Z0-9.\-\_]/",
    );
    $replace = array ('a','e','i','o','u','y','d','A','E','I','O','U','Y','D','a-z','',);
    $str = preg_replace($search, $replace, $str);
    $str = preg_replace('/(-)+/', '', $str);
    return $str;
}

//Function xóa folder và file trong folder đó
function remove_directory($dir) {
  if ($handle = opendir("$dir")) {
    while (false !== ($item = readdir($handle))) {
      if ($item != "." && $item != "..") {
        if (is_dir("$dir/$item")) {
          remove_directory("$dir/$item");
        } else {
          unlink("$dir/$item");         
        }
      }
    }
    closedir($handle);
    rmdir($dir);
  }
}

?>
