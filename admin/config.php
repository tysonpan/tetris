<?php

	$hd=mysql_connect(SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS) or die("fail to connect database");
	$dbname=mysql_select_db(SAE_MYSQL_DB,$hd); 

	mysql_query("set names utf8",$hd);
?>