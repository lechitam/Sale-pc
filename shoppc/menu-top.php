<?php
	if(!isset($_REQUEST["b"])) $b="home";
	else $b=$_REQUEST["b"];
                switch ($b) {
                        case 'home':
                        		$class0="class='current'";
                        		$class1="";
                        		$class2="";
                        		$class3="";
                        		$class4="";
                              break;
                        case 'gioithieu':
                        		$class1="class='current'";
                        		$class0="";
                        		$class2="";
                        		$class3="";
                        		$class4="";
                              break;
                        case 'huongdanmuahang':
                        		$class2="class='current'";
                        		$class0="";
                        		$class1="";
                        		$class3="";
                        		$class4="";
                              break;
                              
                        case 'tintuc':
                              	$class3="class='current'";
                        		$class0="";
                        		$class1="";
                        		$class2="";
                        		$class4="";
                              break;
                        case 'lienhe':
                             	$class4="class='current'";
                        		$class0="";
                        		$class1="";
                        		$class2="";
                        		$class3="";
                              break;
                        default: 
                             	$class0="class='current'";
                        		$class1="";
                        		$class2="";
                        		$class3="";
                        		$class4="";
                              break;
                  }
?>
<div align="center" class="tdmenu">
<ul class="glossymenu">
	<li <?=$class0?> ><a href="index.php" style="text-decoration: none; color:#000;"><b>Trang Chủ</b></a></li>
	<li <?=$class1?> ><a href="?b=gioithieu" style="text-decoration: none; color:#000;"><b>Về chúng tôi</b></a></li>
	<li <?=$class2?> ><a href="?b=huongdanmuahang" style="text-decoration: none; color:#000;"><b>Hướng Dẫn</b></a></li>	

	<li <?=$class4?> ><a href="?b=lienhe" style="text-decoration: none; color:#000;"><b>Liên Hệ</b></a></li>
</ul>
</div>