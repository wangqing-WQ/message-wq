<?php
header("content-type:text/html;charset=utf-8");
$id = $_POST['id'];
$data = array();
class User{
	public $messageId;
	public $author;
	public $title;
	public $content;
	public $reply;
}
include("conn.php");
if($id = 123){
	$rs = mysql_query("select * from message");
}
/*while($info = mysql_fetch_array($rs)){
//	echo $info['author']." ";
//	echo $info['title']." ";
//	echo $info['content']." ";
//	echo $info['reply']."<br>";
//	echo "{"."author".":"."$info[author]".","."title".":"."$info[title]".","."content".":"."$info[content]".","."reply".":"."$info[reply]"."}"."<br>";
}*/
while ($info = mysql_fetch_array($rs)){
	$user = new User();
	$user->messageId = $info["messageId"];
	$user->author = $info["author"];
	$user->title = $info["title"];
	$user->content = $info["content"];
	$user->reply = $info["reply"]; 
	$data[]=$user;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{".'"user"'.":".$json."}";
mysql_free_result($rs);
mysql_close($conn);
?>