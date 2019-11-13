<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>欢迎来到主页面</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <style type="text/css">
    	div#text p{
            width: 500px;
            font:16px "微软雅黑";
            color:#999;
            text-align:right;
            display:inline-block;
        }
        div#text p span#count{
        	display: none;
        	position: absolute;
        	left:340px;
        }
        ul{
        	list-style: none;
        	text-align: left;
        	padding:5px 0px 0px 20px;
        	font-size: 12px;
        }
        ul li{
        	padding-bottom: 5px;
        }
        b{
        	font-size: 14px;
        }
        img{
        	width:30px;
        }
        
    </style>
    <script src="js/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/md5.js" type="text/javascript" charset="utf-8"></script>
    
    <script type="text/javascript">
    
    function getCookie($name){
       	  var data=document.cookie;
       	  var dataArray=data.split("; ");
       	for(var i=0;i<dataArray.length;i++){
       		var varName=dataArray[i].split("=");
       		  if(varName[0]==$name){
       		  	 return decodeURI(varName[1]);
       		  }
     		  		
         }
    }
    function setCookie(name,value,time){
  	//设置数据
  	var data=name+"="+encodeURI(value);
  	//设置过期时间
  	var myDate=new Date();
  	msday=myDate.getTime()+time*24*3600*1000;
  	myDate.setTime(msday);
  	//创建cookie
  	document.cookie=data+"; expires="+myDate.toGMTString();
  } 
  var a;
    $(function(){
		$("#btn1").click(function(){
			$.ajax({
				type:"POST",
				url:"data2.php",
				data:{author:$("#author").val(),title:$("#title").val(),tent:$("#tent").val()},
				dataType:"json",
				success:function(data){
					var data=data.split(",");
					
					if(data[1].status=="10001"){
						$("#count").show().html("发表成功");
					}else{
						$("#count").show().html("内容皆不能为空,请补全内容");
					}
				}
			});
		});
		    $.ajax({
		    	type:"POST",
		    	url:"data3.php",
		    	dataType:"json",
		    	success:function(data){
                    data=data.data; 
                    console.log(data);
                    a=data;  
                    var str="<ul id='showIn'>";
                    var div=document.createElement("div");
		    		for(var i=0;i<data.length;i++){		    			
		    			 str+="<li><img src=img/"+data[i].face+">"+" <b>作者:</b>"+"  "+data[i].author+" <b>标题:</b>"+"  "+data[i].title+" "+"<br><b>内容:</b> "+"  "+data[i].content;
		    			 if(data[i].reply!=""){
		    			 	str+=" 管理员回复:"+data[i].reply+"<br>";
		    			 }
		    			 if(getCookie(hex_md5("login"))==hex_md5("success"+getCookie("userName")+getCookie("sessionId"))){
		    			 	str+="<a href='reply.html?messageId="+data[i].messageId+"'>管理员回复</a> |"+" <a href='delete.php?messageId="+data[i].messageId+"'>删除</a></li>";
		    			 }
		    			 
                        div.innerHTML=str+"</ul>";		
		    		}   document.getElementById("main").appendChild(div);
var newslis=$("#showIn").children();
console.log(newslis);
//获得总的留言长度
var count=newslis.length;
//设置每页的最多的留言条数
var ONE_PAGE_COUNT=1;
//设置总页数
var totalPage=parseInt(count/ONE_PAGE_COUNT)+((count % ONE_PAGE_COUNT)==0? 0:1);
console.log(totalPage);

var currpage=1;
 
//方法：求取总页数
function setPages(totalPage){
	totalPage=Math.max(1,totalPage);
	$("#total-page").text(totalPage);
}
//获取总留言数
function setCount(count){
	if(count== undefined){
		count=0;
	}
	$("#counts").text(count);
}
//设置更新的页数
function setCurrPage(currage){
	currage=Math.max(1,currage);
	$("#curr-page").text(currage);
}
function show(page){
	page = Math.max(1,Math.min(totalPage,page));
	for(var i=0;i<count;i++){
		if(parseInt(i/ONE_PAGE_COUNT)+1==page){
			$(newslis[i]).attr("style","");
		}else{
			$(newslis[i]).attr("style","display:none");
		}
	}	
}
function homePage(){
	currPage = 1;
	show(currPage);
	setCurrPage(currPage);	
}
function nextPage(){
	var last=currPage;
	if(last==totalPage){
		return;
	}
	show(++currPage);
	setCurrPage(currPage);
}
function prevPage(){
	var next=currPage;
	if(next<=1){
		return;
	}
	show(--currPage);
	setCurrPage(currPage);
}
function lastPage(){
    currPage=totalPage;
	show(currPage);
	setCurrPage(currPage);
}
function gotoPage(){
	var target=$("#gotoPage").val();
	if(target==undefined){
		target=currPage;		
	}
	target=Math.max(1,Math.min(totalPage,target));
	currPage=target;
	show(currPage);
	setCurrPage(currPage);
	$("#gotoPage").val("");
}
function init(){
	console.log("aaa");
	newslis=$("#showIn").children();
	count=newslis.length;
	totalPage=count/ONE_PAGE_COUNT+((count%ONE_PAGE_COUNT)==0?0:1);
	currPage=1;
	setCount(count);
	setPages(totalPage);
	setCurrPage(currPage);
	show(currPage);
	$("#home").click(homePage);
    $("#prev").click(prevPage);
    $("#next").click(nextPage);
    $("#last").click(lastPage);
    $("#goTo").click(gotoPage);
}
init();
		    		
		    	}
		    	
		    });
		    if(getCookie(hex_md5("login"))==hex_md5("success"+getCookie("userName")+getCookie("sessionId"))){
		    	$(".five").html("欢迎 "+getCookie("userName")+" | <a href='loginout.php'>注销<a>");
		    }
	});
	

window.onload=function(){
    	var tent=document.getElementById("tent");
    	var tips=document.getElementById("tips");
    	tent.onkeyup=function(){
    		if(this.value.length){
    			tips.innerHTML=130-this.value.length;
    		}
    	}
    	
    }

    </script>
</head>
<body>
    <div class="bg">
         <div class="main">
            <div class="i_tab">
                <ul>
                    <li class="one"></li>
                    <li class="two"></li>
                    <li class="three"></li>
                    <li class="four">留 言 板</li>
                    <li class="five"><a href="login.html">管理员登录</a></li>
                </ul>
            </div>
            <div id="text">
                <div id="i_tile">
                 用户名：<input type="text" id="author">
                 title: <input type="text" id="title">
                </div>
                <div id="i_art">
                <textarea id="tent" cols="78" rows="3" placeholder="内容:"></textarea>
                </div>
                <p> <span id="count">发表成功  </span>还能输入<span id="tips">130</span>个字</p>
                <input type="button" id="btn1" value="发 表">
            </div>
            <div id="content">
                <div class="con_tab">
                     <p>大家在说</p>
                </div>
                <div id="main">
                	<!--<img src="img/<?php echo $_SESSION["face"]; ?>">-->
                	<!--用户名-->
                	<!--title-->
                	<!--内容-->
                	<div class="pages">
                		<div class="items">
                			<span>共</span>
                			<span id="counts">0</span>
                			<span>条</span>
                		</div>
                		<div class="items">
                			<span id="curr-page">1</span>
                			<span>/</span>
                			<span id="total-page">1</span>
                		</div>
                		<div class="items">
                			<span id="home">首页</span>
                			<span id="prev">上一页</span>
                			<span id="next">下一页</span>
                			<span id="last">尾页</span>
                		</div>
                		<div class="items">
                			<button id="goTo">转到</button>
                			<input type="number" id="gotoPage"/>
                		    <span>页</span>
                		</div>
                	</div>
                </div>
            </div>
            
         </div>
    </div>
</body>
</html>