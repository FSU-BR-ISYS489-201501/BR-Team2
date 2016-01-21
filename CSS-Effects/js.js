/*jQuery*/

var parallax = document.getElementById("body");
var speed = -3;

window.onscroll = function() {
  var yOffset = window.pageYOffset;
  parallax.style.backgroundPosition = "0px " + (yOffset / speed) + "px";
}

                        /* ripple-circle */
/***********************************************************************/
$(function(){
	var ink, d, x, y;
	$(".ripple-circle").click(function(ripplecircle){
    	if($(this).find(".ripple-circle-ink").length === 0){
        	$(this).prepend("<span class='ripple-circle-ink'></span>");
    	}
   
    ink = $(this).find(".ripple-circle-ink");
    ink.removeClass("ripple-circle-animate");
     
    if(!ink.height() && !ink.width()){
        d = Math.max($(this).outerWidth(), $(this).outerHeight());
        ink.css({height: d, width: d});
    }
     
    x = ripplecircle.pageX - $(this).offset().left - ink.width()/2;
    y = ripplecircle.pageY - $(this).offset().top - ink.height()/2;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("ripple-circle-animate");
});
});


                        /* ripple-circle Reverse */
/***********************************************************************/
$(function(){
	var ink, d, x, y;
	$(".ripple-circleR").click(function(ripplecircleR){
    	if($(this).find(".ripple-circleR-ink").length === 0){
        	$(this).prepend("<span class='ripple-circleR-ink'></span>");
    	}
	    
    ink = $(this).find(".ripple-circleR-ink");
    ink.removeClass("ripple-circleR-animate");
     
    if(!ink.height() && !ink.width()){
        d = Math.max($(this).outerWidth(), $(this).outerHeight());
        ink.css({height: d, width: d});
    }
     
    x = ripplecircleR.pageX - $(this).offset().left - ink.width()/2;
    y = ripplecircleR.pageY - $(this).offset().top - ink.height()/2;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("ripple-circleR-animate");
	ink.css({opacity:0});
});
});



                        /* ripple-square */
/***********************************************************************/
$(function(){
	var ink, d, x, y;
	$(".ripple-square").click(function(ripplesquare){
    	if($(this).find(".ripple-square-ink").length === 0){
        	$(this).prepend("<span class='ripple-square-ink'></span>");
    	}
     
    ink = $(this).find(".ripple-square-ink");
    ink.removeClass("ripple-square-animate");
     
    if(!ink.height() && !ink.width()){
        d = Math.max($(this).outerWidth(), $(this).outerHeight());
        ink.css({height: d, width: d});
    }
     
    x = ripplesquare.pageX - $(this).offset().left - ink.width()/2;
    y = ripplesquare.pageY - $(this).offset().top - ink.height()/2;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("ripple-square-animate");
});
});


                        /* ripple-squareR */
/***********************************************************************/
$(function(){
	var ink, d, x, y;
	$(".ripple-squareR").click(function(ripplesquareR){
    	if($(this).find(".ripple-squareR-ink").length === 0){
        	$(this).prepend("<span class='ripple-squareR-ink'></span>");
    	}
     
    ink = $(this).find(".ripple-squareR-ink");
    ink.removeClass("ripple-squareR-animate");
     
    if(!ink.height() && !ink.width()){
        d = Math.max($(this).outerWidth(), $(this).outerHeight());
        ink.css({height: d, width: d});
    }
     
    x = ripplesquareR.pageX - $(this).offset().left - ink.width()/2;
    y = ripplesquareR.pageY - $(this).offset().top - ink.height()/2;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("ripple-squareR-animate");
	ink.css({opacity:0});
});
});


                        /* Ripple-Square-Rotate */
/***********************************************************************/
$(function(){
	var ink, d, x, y;
	$(".Ripple-Square-Rotate").click(function(RippleSquareRotate){
    	if($(this).find(".Ripple-Square-Rotate-ink").length === 0){
        	$(this).prepend("<span class='Ripple-Square-Rotate-ink'></span>");
    	}
     
	    
    ink = $(this).find(".Ripple-Square-Rotate-ink");
    ink.removeClass("Ripple-Square-Rotate-animate");
     
    if(!ink.height() && !ink.width()){
        d = Math.max($(this).outerWidth(), $(this).outerHeight());
        ink.css({height: d, width: d});
    }
     
    x = RippleSquareRotate.pageX - $(this).offset().left - ink.width()/2;
    y = RippleSquareRotate.pageY - $(this).offset().top - ink.height()/2;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("Ripple-Square-Rotate-animate");
});
});


                        /* Ripple-Up */
/***********************************************************************/
$(function(){
	var ink, d, x, y, s;
	$(".ripple-up").click(function(RippleUp){
    	if($(this).find(".ripple-up-ink").length === 0){
        	$(this).prepend("<span class='ripple-up-ink'></span>");
    	}
     
	    
    ink = $(this).find(".ripple-up-ink");
    ink.removeClass("ripple-up-animate");
     
    x = $(this).offset().top *0;
    y = $(this).offset().top *0 - 100;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("ripple-up-animate");
	ink.css({opacity:0});
});
});


                        /* Ripple-Down */
/***********************************************************************/
$(function(){
	var ink, d, x, y, s;
	$(".ripple-down").click(function(RippleDown){
    	if($(this).find(".ripple-down-ink").length === 0){
        	$(this).prepend("<span class='ripple-down-ink'></span>");
    	}
     	    
    ink = $(this).find(".ripple-down-ink");
    ink.removeClass("ripple-down-animate");
     
    x = $(this).offset().top *0;
    y = $(this).offset().top *0 - 200;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("ripple-down-animate");
	ink.css({opacity:0});
});
});


                        /* Ripple-Left */
/***********************************************************************/
$(function(){
	var ink, d, x, y, s;
	$(".ripple-left").click(function(RippleLeft){
    	if($(this).find(".ripple-left-ink").length === 0){
        	$(this).prepend("<span class='ripple-left-ink'></span>");
    	}
         
    ink = $(this).find(".ripple-left-ink");
    ink.removeClass("ripple-left-animate");
     
    x = $(this).offset().top *0 - 50;
    y = $(this).offset().top *0;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("ripple-left-animate");
	ink.css({opacity:0});
});
});


                        /* Ripple-Right */
/***********************************************************************/
$(function(){
	var ink, d, x, y, s;
	$(".ripple-right").click(function(RippleRight){
    	if($(this).find(".ripple-right-ink").length === 0){
        	$(this).prepend("<span class='ripple-right-ink'></span>");
    	}
         
    ink = $(this).find(".ripple-right-ink");
    ink.removeClass("ripple-right-animate");
     
    x = $(this).offset().top *0 - 200;
    y = $(this).offset().top *0;
     
    ink.css({top: y+'px', left: x+'px'}).addClass("ripple-right-animate");
	ink.css({opacity:0});
});
});


                        /* Spin Y */
/***********************************************************************/
$(".spiny").click(function () {
	$(this).addClass("spiny-animate");
	
	setTimeout(function() {
       $(".spiny").removeClass("spiny-animate");
   	}, 900);
	
});


                        /* Spin X */
/***********************************************************************/
$(".spinx").click(function () {
	$(this).addClass("spinx-animate");
	
	setTimeout(function() {
       $(".spinx").removeClass("spinx-animate");
   	}, 900);
	
});


                        /* Spinx-Stay */
/***********************************************************************/
$(".spinx-stay").click(function () {
	$(this).addClass("spinx-stay-animate");	
});


                        /* Spiny-Stay */
/***********************************************************************/
$(".spiny-stay").click(function () {
	$(this).addClass("spiny-stay-animate");	
});


                        /* Spiny-Toggle */
/***********************************************************************/
$(".spiny-toggle").click(function () {
	if (!$(this).hasClass("spiny-toggle1-animate")) {
		$(this).addClass("spiny-toggle1-animate");
		$(this).removeClass("spiny-toggle2-animate");
	}else if (!$(this).hasClass("spiny-toggle2-animate")) {
		$(this).removeClass("spiny-toggle1-animate");
		$(this).addClass("spiny-toggle2-animate");
	};
});


                        /* Spinx-Toggle */
/***********************************************************************/
$(".spinx-toggle").click(function () {
	if (!$(this).hasClass("spinx-toggle1-animate")) {
		$(this).addClass("spinx-toggle1-animate");
		$(this).removeClass("spinx-toggle2-animate");
	}else if (!$(this).hasClass("spinx-toggle2-animate")) {
		$(this).removeClass("spinx-toggle1-animate");
		$(this).addClass("spinx-toggle2-animate");
	};
});







