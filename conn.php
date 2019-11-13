<?php
////header("content-type:text/html;charset=utf-8;");
////第一步建立连接
//$conn=mysql_connect("localhost","root","")or die("db connect error");
////选择数据库
//mysql_select_db("message55",$conn);
////设置文字格式
//mysql_query("set names utf8");

//1.建立PHP与MySQL服务器之间的连接，并返回连接对象（资源对象)
$conn=@mysql_connect("localhost","root","") or die("db connect error!");

//2.选择数据库my55
mysql_select_db("message55",$conn);
//3.发送SQL，设置支持中文
mysql_query("set names utf8");
?>