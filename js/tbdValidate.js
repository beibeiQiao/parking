//date: 2016-11-16 author: dgx note:必填正则验证工具 
function tbdnoValidate(elelist){	
	for(var i=0;i<elelist.length;i++){	//失去焦点操作
		(function(eleinput,eletext,rule){
			document.getElementById(eleinput).onblur=function(){
				var intval=this.value.replace(/(^\s*)|(\s*$)/g, "");
				for(var j=0;j<rule.length;j++){	
					var resreg=rule[j].reg.test(intval);					
					if(resreg){						
						document.getElementById(eletext).style.display="none";
					}else{					
						document.getElementById(eletext).innerHTML=rule[j].text;
						document.getElementById(eletext).style.display="block";
						this.value="";
						break;			
					};									
				};		
			};
		})(elelist[i].eleinput,elelist[i].eletext,elelist[i].rule);
	};	
};