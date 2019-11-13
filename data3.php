<?php
//显示浏览部分
    header("content-type:text/html;charset=utf-8");
    include("conn.php");
    $rs=mysql_query("select * from message");
    $num=mysql_num_rows($rs);
//  $info=mysql_fetch_array($rs);
    
    while($info=mysql_fetch_array($rs)){
    	$str.='{"messageId":"'.$info['messageId'].'","face":"'.$info['face'].'","author":"'.$info['author'].'","title":"'.$info['title'].'","content":"'.$info['content'].'","reply":"'.$info['reply'].'"},';
    $json=substr($str,0,strlen($str)-1);
    	
    }  
    $str='{"status":"10001","msg":"success","data":['.$json.']}';

    echo $str;
?>