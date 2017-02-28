// function ajax(obj){
// //初始化
// 	if(typeof(obj)!="object"){
// 			console.error("请输入正确的参数")
// 			return false;
// 	}
// 	var method=obj.method||"get";
// 	var url=obj.url;//要连接的地址
// 	if(url==undefined){
// 		console.error("请输入正确的地址");
// 		return false;
// 	}
// 	var dataType=obj.dataType||"text";
// 	var asynch=obj.asynch==undefined? true:obj.asynch;
// 	var success=obj.success;
// 	var data="";
// 	switch(typeof(obj.data)){
// 		case "undefined":;break;
// 		case "string":
// 			data=obj.data;
// 		break;
// 		case "object":
// 			for(var i in obj.data){
// 				data+=i+"="+obj.data[i]+"&";
// 			}
// 			data=data.slice(0,-1);
// 		break;
// 	}
// 	//处理兼容ie8以下
// 	var ajax=window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
// 	//get  post发送请求的类型
// 	if(method=="get"){
// 		ajax.open("get",url+"?"+data,asynch);
// 		ajax.responseType=dataType;
// 		ajax.send(null);
// 	}else if(method=="post"){
// 		ajax.open("post",url,asynch);
// 		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
// 		ajax.responseType=dataType;
// 		ajax.send(data);
// 	}
// 	//请求是否成功
// 	ajax.onreadystatechange=function(){

// 		if(ajax.readyState==4){//响应已完成，可以访问服务器响应并使用它
// 			if(ajax.status==200){//交易成功
// 				var result;
// 				// 判断类型
// 				if(dataType=="XML"){
// 					result=ajax.responseXML;
// 				}else{
// 					result=ajax.response;
// 				}
// 				// switch(dataType){
// 				// 	case "text":
// 				// 		result=ajax.responseText
// 				// 	;break;
// 				// 	case "json":
// 				// 	alert(1)
// 				// 		result=eval("("+ajax.response+")")
// 				// 	;break;
// 				// 	case "xml":
// 				// 		result=ajax.responseXML
// 				// 	;break;
// 				// 	case "document":
// 				// 		result=ajax.response
// 				// 	;break;
// 				// }
// 				if(success){
// 					success(result);
// 				}
// 			}else if(ajax.status==404){
// 				alert("页面错误")
// 			}else{
// 				alert("获取失败")
// 			}
// 		}
// 	}
// }
function ajax(obj){
	if(typeof(obj)!="object"){
		console.error("请输入正确的参数");
		return false;
	}
	var method=obj.method||"get";
	var url=obj.url;
	if(url==undefined){
		console.error("请输入正确的地址");
		return false;
	}
	var dataType=obj.dataType||"text";
	var asynch=obj.asynch==undefined?true:obj.asynch;
	var success=obj.success;
	var data="";
	switch(typeof(obj.data)){
		case "undefined":;
		break;
		case "string":
			data=obj.data;
		break;
		case "object":
			for(var i in obj.data){
				data+=i+"="+obj.data[i]+"&";
			}
			data=data.slice(0,-1);
	}
	var ajax=window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
	if(method=="get"){
		ajax.open("get",url+"?"+data,asynch);
		ajax.responseType=dataType;
		ajax.send();
	}else if(method=="post"){
		ajax.open("post",url,asynch);
		ajax.responseType=dataType;
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send(data);
	}
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4){
			if(ajax.status==200){
				var result;
				if(ajax.dataType=="XML"){
					result=ajax.responseXML;
				}else{
					result=ajax.response;
				}

				if(success){
					success(result);
				}

			}else if(ajax.status==404){
				alert("页面错误");
			}else{
				alert("获取失败")
			}
		}
	}
}
// $array=array();
// $array[]=($row);
// echo json_encode;
