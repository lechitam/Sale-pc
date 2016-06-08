<?php 
ini_set('display_errors', 0);
include("check-login.php"); include "connect.php"; ?>
<?php include "function.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang quản trị</title>
<link type="text/css" rel="stylesheet" href="css/main.css" />
<link type="text/css" rel="stylesheet" href="../css/menu.css" />
<script type="text/javascript" src="../quanly.js"></script> 

</head>

<body onload="kt();">
<script type="text/javascript" src="Scripts/tooltip/wz_tooltip.js"></script> 
<script type="text/javascript" src="Scripts/tooltip/tip_balloon.js"></script> 
<script type="text/javascript" src="Scripts/tooltip/tip_centerwindow.js"></script> 
<script type="text/javascript" src="Scripts/tooltip/tip_followscroll.js"></script>

<div id="container">
  <div id="header">
	  <?php include "include/header.php";?>
  </div>    
  <div id="menu-quantri">
	  <?php include "menu-top.php";?>
  </div>  
  <br clear="all" />
    <div id="main">  
    <?php 
		$m=$_REQUEST["m"];
		if($m=="thanhvien")
			include "include/thanhvien.php";		
		if($m=="lienhe")
			include "include/lienhe.php";		
		else{
			if($m=="lh-del")
				include "include/lienhe-del.php";
			else{
			if($m=="changepw")
				include "include/changepw.php";
			else{
	?>
    	<div id="content-left">       	 
        <?php
       	  $m=$_REQUEST["m"];  
		  if(isset($m))
		  {
		  switch($m)
		  {
			case "sp":
				include "include/menu-sanpham.php";
			break;
			case "dh":
				include "include/menu-donhang.php";
			break;
			case "lh":
				include "include/menu-lienhe.php";
			break;
			case "menu":
				include "include/menu-menu.php";
			break;
			case "tv":
				include "include/menu-thanhvien.php";
			break;
			case "mn":
				include "include/menu-mn.php";
			break;
		  }
		  }
		  
		?>
        </div>
        
        <div id="content-right">
         <?php
         $b=$_REQUEST["b"];
		 if(isset($b))
		 {
		 switch($b)
		 {
			case "sp-insert":
				include "include/sp-insert.php";
			break;	
			case "sp-xl-insert":
				include "include/sp-xl-insert.php";
			break;
			case "sp-del":
				include "include/sp-del.php";
			break;		
			case "sp-update":
				include "include/sp-update.php";
			break;				
			case "sp-xl-del":
				include "include/sp-xl-xoa.php";
			break;	
			case "sp-list":
				include "include/sp-list.php";
			break;	
			case "sp-listview":
				include "include/sp-listview.php";
			break;
			case "menu-listview":
				include "include/menu-listview.php";
			break;			
			case "gh-list":
				include "include/gh-list.php";
			break;	
			case "gh-guest-list":
				include "include/gh-guest-list.php";
			break;
			case "get-guest-list-end":
				include "include/gh-guest-finish.php";
			break;
			case "gh-chitiet":
				include "include/gh-chitiet.php";
			break;
			case "gh-guest-chitiet":
				include "include/gh-guest-chitiet.php";
			break;
			case "get-list-end":
				include "include/gh-finish.php";
			break;	
			case "tk":
				include "include/result.php";
			break;		
		
			case "nhomsp-list";
				include "include/nhomsp-list.php";
			break;		
			case "nhomsp-insert";
				include "include/nhomsp-insert.php";
			break;	
			case "nhomsp-del";
				include "include/nhomsp-del.php";
			break;
			case "nhomsp-update";
				include "include/nhomsp-update.php";
			break;
			case "nhomsp-xl-del";
				include "include/nhomsp-xl-xoa.php";
			break;
			case "loaisp-list";
				include "include/loaisp-list.php";
			break;
			case "loaisp-get-list";
				include "include/loaisp-get-list.php";
			break;
			case "loaisp-insert";
				include "include/loaisp-insert.php";
			break;
			case "loaisp-del";
				include "include/loaisp-del.php";
			break;
			case "loaisp-xl-del";
				include "include/loaisp-xl-xoa.php";
			break;
			case "loaisp-update";
				include "include/loaisp-update.php";
			break;
			
			case "mn-xl-del";
				include "include/mn-xl-xoa.php";
			break;
			
		 }
		 }
		 
	 	 ?>
        </div>  
     <?php   } } }?>
    </div>
</div>

</body>
</html>