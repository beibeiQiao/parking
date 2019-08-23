//注册－填写身份信息 上传
//date: 2016-12-5 author: 杜关兴 note: 图片比例缩放算法
/*
	boxw:容器宽度
	boxh:容器高度
	imgw:图片宽度
	imgh:图片高度
*/
function imgPercentScale(boxw,boxh,imgw,imgh){
	var res={};
	var wper=imgw/boxw;
	var hper=imgh/boxh;
	if(wper<=1 && hper<1){
		res.w=imgw;
		res.h=imgh;
		return res;
	};
	if(wper>1 && hper<1){
		res.w=boxw;
		var rhper=boxw/imgw;
		res.h=imgh*rhper;
		return res;
	};
	if(wper<=1 && hper>1){
		res.h=boxh;
		var rwper=boxh/imgh;
		res.w=imgw*rwper;
		return res;
	};
	if(wper>1 && hper>1){
		if(wper>=hper){
			res.w=boxw;
			var rhper=boxw/imgw;
			res.h=imgh*rhper;
			return res;
		}else{
			res.h=boxh;
			var rwper=boxh/imgh;
			res.w=imgw*rwper;
			return res;
		};
	};	
};