$(document).ready(function(){
var str=location.href.toLowerCase();
$(".suprt .nav li a").each(function() {
if (str.indexOf(this.href.toLowerCase()) > -1) {
$("li.highactive").removeClass("highactive");
$(this).parent().addClass("highactive");
}
});
$("li.highactive").parents().each(function()
{
if ($(this).is("li")){
$(this).addClass("highactive");
}
});
})