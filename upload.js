function  upload(url,inputObj,progressObj,imgObj){

	    var inputObj=inputObj||{};
	    if(inputObj.nodeName=="INPUT"){
	        this.inputObj=inputObj;
	    }else if(typeof inputObj=="string"){
	        this.inputObj=document.querySelector(inputObj);
	    }
	
	    var progressObj=progressObj||{};
	    if(progressObj.nodeName=="DIV"){
	        this.progressObj=progressObj;
	    }else if(typeof progressObj=="string"){
	        this.progressObj=document.querySelector(progressObj);
	    }
	
	    var imgObj=imgObj||{};
	    if(imgObj.nodeName=="IMG"){
	        this.imgObj=imgObj;
	    }else if(typeof imgObj=="string"){
	        this.imgObj=document.querySelector(imgObj);
	    }
	
	    this.type=["jpeg","jpg","png","gif"];
	    this.size=1024*1024*20;
	    this.uploadName="file";
	    this.url=url;
	
	}
	upload.prototype={
	    up:function(callback){
	        if(this.url){
	            this.callback=callback;
	            this.getCon();
	        }else{
	            alert("请指定路径");
	        }
	
	
	    },
	    getCon:function(){
	        var that=this;
	        this.inputObj.onchange=function(){
	            that.data=this.files[0];
	            var read=new FileReader();
	
	            read.onload=function(e){
	                that.imgObj.src=e.target.result;
	            }
	            read.readAsDataURL(that.data);
	
	            if(that.check()){
	                that.upfile();
	            }
	        }
	    },
	    check:function(){
	        var that=this;
	        console.log(that.data);
	        var data=that.data;
	        var size=data.size;
	        var extname=data.name.substr(data.name.lastIndexOf(".")+1).toLowerCase();
	
	        if(size>that.size){
	            alert("文件太大");
	            return false;
	        }
	
	        var flag=false;
	        for(var i=0;i<that.type.length;i++){
	            if(that.type[i]==extname){
	                flag=true;
	                break;
	            }
	        }
	
	        if(!flag){
	            alert("格式不符")
	            return false
	        }
	
	        return true;
	
	
	    },
	    upfile:function(){
	        var that=this;
	        var ajax=new XMLHttpRequest();
	        var form=new FormData();
	        form.append(this.uploadName,this.data);
			ajax.onloadstart=function(e){
				that.start={};
			}
	        ajax.upload.onprogress=function(e){
	            var total=e.total;
	            var loaded=e.loaded;
	            var scale=loaded/total*100;
	            that.progressObj.style.width=scale+"%";
	            innerHTML=scale.toFixed(2)+"%";
	        }
	
	        ajax.onload=function(){
	            that.callback(ajax.response);
	        }
	
	
	        ajax.open("post",that.url);
	        ajax.send(form);
	    }
	}