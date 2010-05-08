(function($){
$.jGrowl=function(m,o){
if($("#jGrowl").size()==0){
$("<div id=\"jGrowl\"></div>").addClass(o.position ? o.position : $.jGrowl.defaults.position).appendTo("body");
}
$("#jGrowl").jGrowl(m,o);
};
$.fn.jGrowl=function(m,o){
if($.isFunction(this.each)){
var _6=arguments;
return this.each(function(){
var _7=this;
if($(this).data("jGrowl.instance")==undefined){
$(this).data("jGrowl.instance",new $.fn.jGrowl());
$(this).data("jGrowl.instance").startup(this);
}
if($.isFunction($(this).data("jGrowl.instance")[m])){
$(this).data("jGrowl.instance")[m].apply($(this).data("jGrowl.instance"),$.makeArray(_6).slice(1));
}else{
$(this).data("jGrowl.instance").notification(m,o);
}
});
}
};
$.extend($.fn.jGrowl.prototype,{defaults:{header:"",sticky:false,position:"top-right",glue:"after",theme:"default",corners:"10px",check:500,life:3000,speed:"normal",easing:"swing",closer:true,log:function(e,m,o){
},beforeOpen:function(e,m,o){
},open:function(e,m,o){
},beforeClose:function(e,m,o){
},close:function(e,m,o){
},animateOpen:{opacity:"show"},animateClose:{opacity:"hide"}},element:null,interval:null,notification:function(_17,o){
var _19=this;
var o=$.extend({},this.defaults,o);
o.log.apply(this.element,[this.element,_17,o]);
var _1a=$("<div class=\"jGrowl-notification\"><div class=\"close\">&times;</div><div class=\"header\">"+o.header+"</div><div class=\"message\">"+_17+"</div></div>").data("jGrowl",o).addClass(o.theme).children("div.close").bind("click.jGrowl",function(){
$(this).unbind("click.jGrowl").parent().trigger("jGrowl.beforeClose").animate(o.animateClose,o.speed,o.easing,function(){
$(this).trigger("jGrowl.close").remove();
});
}).parent();
(o.glue=="after")?$("div.jGrowl-notification:last",this.element).after(_1a):$("div.jGrowl-notification:first",this.element).before(_1a);
$(_1a).bind("mouseover.jGrowl",function(){
$(this).data("jGrowl").pause=true;
}).bind("mouseout.jGrowl",function(){
$(this).data("jGrowl").pause=false;
}).bind("jGrowl.beforeOpen",function(){
o.beforeOpen.apply(_19.element,[_19.element,_17,o]);
}).bind("jGrowl.open",function(){
o.open.apply(_19.element,[_19.element,_17,o]);
}).bind("jGrowl.beforeClose",function(){
o.beforeClose.apply(_19.element,[_19.element,_17,o]);
}).bind("jGrowl.close",function(){
o.close.apply(_19.element,[_19.element,_17,o]);
}).trigger("jGrowl.beforeOpen").animate(o.animateOpen,o.speed,o.easing,function(){
$(this).data("jGrowl").created=new Date();
}).trigger("jGrowl.open");
if($.fn.corner!=undefined){
$(_1a).corner(o.corners);
}
if($("div.jGrowl-notification:parent",this.element).size()>1&&$("div.jGrowl-closer",this.element).size()==0&&this.defaults.closer!=false){
$("<div class=\"jGrowl-closer\">[ cerrar todo ]</div>").addClass(this.defaults.theme).appendTo(this.element).animate(this.defaults.animateOpen,this.defaults.speed,this.defaults.easing).bind("click.jGrowl",function(){
$(this).siblings().children("div.close").trigger("click.jGrowl");
if($.isFunction(_19.defaults.closer)){
_19.defaults.closer.apply($(this).parent()[0],[$(this).parent()[0]]);
}
});
}
},update:function(){
$(this.element).find("div.jGrowl-notification:parent").each(function(){
if($(this).data("jGrowl")!=undefined&&$(this).data("jGrowl").created!=undefined&&($(this).data("jGrowl").created.getTime()+$(this).data("jGrowl").life)<(new Date()).getTime()&&$(this).data("jGrowl").sticky!=true&&($(this).data("jGrowl").pause==undefined||$(this).data("jGrowl").pause!=true)){
$(this).children("div.close").trigger("click.jGrowl");
}
});
if($(this.element).find("div.jGrowl-notification:parent").size()<2){
$(this.element).find("div.jGrowl-closer").animate(this.defaults.animateClose,this.defaults.speed,this.defaults.easing,function(){
$(this).remove();
});
}
},startup:function(e){
this.element=$(e).addClass("jGrowl").append("<div class=\"jGrowl-notification\"></div>");
this.interval=setInterval(function(){
jQuery(e).data("jGrowl.instance").update();
},this.defaults.check);
if($.browser.msie&&parseInt($.browser.version)<7){
$(this.element).addClass("ie6");
}
},shutdown:function(){
$(this.element).removeClass("jGrowl").find("div.jGrowl-notification").remove();
clearInterval(this.interval);
}});
$.jGrowl.defaults=$.fn.jGrowl.prototype.defaults;
})(jQuery);

