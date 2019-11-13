<?php
    setCookie("sessionId","",time()-10000);
  	setCookie("userName","",time()-10000);
  	setCookie(md5("login"),"",time()-10000);
  	header("location:message1.php");
?>