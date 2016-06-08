<?php
function checkquyentruycap_bang($mucbang)
{
	$sscapquyen=$_SESSION['capquyen'];
	if ($sscapquyen!=$mucbang)
	 	echo "<script>alert('Không có quyền truy cập vào phần quản lý này.'); window.location='index.php';</script>";
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
		$sql="select max(id_baiviet) AS maxid from baiviet";
		$kq=mysql_query($sql);
		while($r=mysql_fetch_array($kq)){
			$maxid=$r['maxid'];
			$k=$maxid+1;		
		}
		return $k;
	}	

?>