
	//获得cookie
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
	//ajax
	 $.addEvent=addEvent;
	 $.ajax=ajax;
	 $.getCookie=getCookie;
	 $.setCookie=setCookie;
	 window.$=$;
})()