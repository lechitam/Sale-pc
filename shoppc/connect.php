<?php
	$HOST = "localhost";
	$USER = "root";
	$PASS = "";
	$DB = "shop";
	$ERROR1 = "Loi mysql";
	$ERROR2 = "Loi DB";
@mysql_connect($HOST, $USER, $PASS) or die($ERROR1);
@mysql_select_db($DB) or die($ERROR2);
mysql_query("SET NAMES 'utf8'");

?>
// <? if(!session_id()); session_start();
// $hostname = "mysql.hostinger.vn";
// $username = "u895060088_data1";
// $password = "chitam111";
// $databasename = "u895060088_data";
// $visiterTimeout = 900;

// $MAXPAGE = 10;
// $multiLanguage = 1;

// $arrLanguage = array(
	// array('vn','Viet Nam'),
	// array('en','English'))
// );
// ?>
