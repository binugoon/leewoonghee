<?php
$ip=getenv('IP');
$connect=mysql_connect($ip,"binugoon","")or die("SQL server에 연결할 수 없습니다.");
mysql_select_db("c9",$connect);
?>
