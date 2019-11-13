<?php
header("content-type:text/html;charset=utf-8");
if($_COOKIE[("userName")]=="tom"){
	$messageId=$_POST['messageId'];
    $reply=$_POST['reply'];
    include("conn.php");
    $flag=mysql_query("update message set reply='$reply' where messageId='$messageId'");
    if($flag){
//	header("location:message1.php");
    }else{
	    echo '<script>alert("留言失    败!")</script>';
    }
}

?>