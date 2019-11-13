<?php
header("content-type:text/html;charset=utf-8");
$messageId=$_GET['messageId'];
include("conn.php");
$flag=mysql_query("delete from message where messageId='$messageId'");
if($flag){
	header("location:message1.php");
}else{
	echo '<script>alert("请联系管理员")</script>';
}
?>