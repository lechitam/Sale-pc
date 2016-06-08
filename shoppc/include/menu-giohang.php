<table width="195" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="195" height="35" background="images/bgn_giohang2.png"><div align="left" style="color:#FFF; font-family:Tahoma; font-size: 14px; padding-left:25px">THÔNG TIN GIỎ HÀNG</div></td>
  </tr>
  <tr>
    <td background="images/toplist-content.gif" style="border-left: 1px solid #CCCCCC;border-right: 1px solid #CCCCCC;border-bottom: 1px solid #CCCCCC; background-repeat:repeat-x"> 
	<div style="padding-left:30px; line-height:25px;">
    &raquo; Sản phẩm:
    <?php 
		if(isset($_SESSION["user"]))
		{
			$user=$_SESSION["user"];
			$sql="select count(*) from giohang where user='$user' AND tinhtrang='themgiohang'";			
			$kq=mysql_query($sql);
			$r=mysql_fetch_array($kq);
			$numrow=$r[0];		
			if($numrow==0)
			{	echo "0"; }
			else
			{	echo "$numrow"; }
			echo "<br>&raquo; <a href=\"index.php?b=showcart\">Xem Giỏ Hàng</a><br>";		}
		else{
			$ghang=$_SESSION["gh"];
			$count=count($ghang);
		 	echo "$count";
			echo "<br>&raquo; <a href=\"index.php?b=gh\">Xem Giỏ Hàng</a>  <br />";
		}
	?>  
	
	</div>
    </td>
  </tr>
</table>