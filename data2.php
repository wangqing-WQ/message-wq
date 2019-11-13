<?php
	header("content-type:text/html;charset=utf-8");
	$author=$_POST['author'];
	$title=$_POST['title'];
	$content=$_POST['tent'];
    include("conn.php");
    $flag=mysql_query("insert into message(author,title,content) values('$author','$title','$content')");
    if($flag){
	echo '{"status":"10001","msg":"添加成功"}';
	header("message1.php");
    }else{
	echo '{"status":"20001","msg":"添加失败,请联系管理员"}';
    }
    
?>