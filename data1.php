<?php 
  session_start(); 
  header("content-type:text/html;charset=utf-8;");
  $userName=$_POST['userName'];
  $pwd=$_POST['pwd'];
  include("conn.php");
  $rs=mysql_query("select * from admins where adminName='$userName' and adminPwd='$pwd'");
  $num=mysql_num_rows($rs);
  if($num>0){
  	setCookie("sessionId",session_id());
  	setCookie("userName",$userName);
  	setCookie(md5("login"),md5("success".$userName.session_id()));
  	echo '{"status":"10001","msg":"success"}';
  }else{
  	echo '{"status":"30001","msg":"error"}';
  }
?>