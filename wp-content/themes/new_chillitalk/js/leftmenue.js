$(document).ready(function(){
	var str=location.href.toLowerCase();
	$(".navleft li a").each(function() {
		if (str.indexOf(this.href.toLowerCase()) > -1) {
			$("li.leftactive").removeClass("leftactive");
			$(this).parent().addClass("leftactive");
		}
	});
	
	$("li.leftactive").parents().each(function() {
		if ($(this).is("li")){
			$(this).addClass("leftactive");
		}
	});
})