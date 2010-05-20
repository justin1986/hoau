 function resize_iframe(){
	var h;
	var hh = $("#drd_iframe").contents().find("html").height();
	var bs = $("#drd_iframe").contents().find("body").attr('scrollHeight');
	var hs = $("#drd_iframe").contents().find("html").attr('scrollHeight');
	if(window.navigator.userAgent.indexOf("MSIE")>0){
		h = bs;
		//IE678
	}else if(window.navigator.userAgent.indexOf("Firefox")>0){
		h = hh;
		//FireFOX
	}else{
		h = hs;
		//Chrome|Safari|Opera
	}
	h = h+40;
	$("iframe").parent().height(h); 
	$("iframe").height(h);
}


$(function(){
	setTimeout(function(){
	 resize_iframe();
	 window.scrollTo(0,0); 
	},300);
	
	
	$('#drd_iframe').load(function(){
		setTimeout(function(){
		 	resize_iframe();
			window.scrollTo(0,0); 
		},300);
	});
	
});