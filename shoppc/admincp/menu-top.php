<?php
if(!isset($_REQUEST["m"])) $b="mn";
	else $b=$_REQUEST["m"];
                switch ($b) {
                        case 'mn':
                        		$class0="class='current'";
                        		$class1="";
                        		$class2="";
                        		$class3="";
                        		$class4="";
                        		$class5="";
                              break;
                        case 'sp':
                        		$class1="class='current'";
                        		$class0="";
                        		$class2="";
                        		$class3="";
                        		$class4="";
                        		$class5="";
                              break;
                        case 'dh':
                        		$class2="class='current'";
                        		$class0="";
                        		$class1="";
                        		$class3="";
                        		$class4="";
                        		$class5="";
                              break;
                              
                        case 'lienhe':
                              	$class3="class='current'";
                        		$class0="";
                        		$class1="";
                        		$class2="";
                        		$class4="";
                        		$class5="";
                              break;
                        case 'thanhvien':
                             	$class4="class='current'";
                        		$class0="";
                        		$class1="";
                        		$class2="";
                        		$class3="";
                        		$class5="";
                              break;
                        case 'tintuc':
                             	$class5="class='current'";
                        		$class0="";
                        		$class1="";
                        		$class2="";
                        		$class3="";
                        		$class4="";
                              break;
                        case 'tintuc-insert':
                             	$class5="class='current'";
                        		$class0="";
                        		$class1="";
                        		$class2="";
                        		$class3="";
                        		$class4="";
                              break;
                        default: 
                             	$class0="class='current'";
                        		$class1="";
                        		$class2="";
                        		$class3="";
                        		$class4="";
                        		$class5="";
                              break;
                  }
?>
<div align="center" class="tdmenu">
<ul class="glossymenu">
	<li <?=$class0?> ><a href="?m=mn&b=nhomsp-list" style="text-decoration: none; color:#000;"><b>Nhóm &amp; Loại Sản Phẩm</b></a></li>
	<li <?=$class1?> ><a href="?m=sp&b=sp-list" style="text-decoration: none; color:#000;"><b>Sản Phẩm</b></a></li>
	<li <?=$class2?> ><a href="?m=dh&b=gh-guest-list" style="text-decoration: none; color:#000;"><b>Đơn Hàng</b></a></li>
	<li <?=$class3?> ><a href="?m=lienhe" style="text-decoration: none; color:#000;"><b>Liên Hệ</b></a></li>	
	<li <?=$class4?> ><a href="?m=thanhvien" style="text-decoration: none; color:#000;"><b>Thành Viên</b></a></li>	
	
</ul>
</div>
