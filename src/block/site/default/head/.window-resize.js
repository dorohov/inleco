var h_window = $(window).height(), 
 	w_window = $(window).width();

var h_header = $('._czr__navbar-site').outerHeight(true),
	h_footer = $('.footer-site').outerHeight(true),
	//w_step = $('._srcb__item-inner').outerWidth(true),
	//w_step_b = $('._srcb__step-item:before').outerWidth(true),
 	h_404 = h_window - h_header,
 	h_resize = h_window + 50;
 	//w_step_drop = w_step + 40; 	
	//$("._srcb__dropdown-menu").css("max-width", w_step_drop);
if (w_window > 767){
	$("._czr__404-page .content-block__inner").css("height", h_404);
	$("._czr__resize .content-block__inner").css("height", h_404);
	$(".products-item-slider .carousel-inner").css("height", h_resize);
	$("._czr__about-page .content-block__inner").css("height", h_404);
} else {
	$("._czr__404-page .content-block__inner").removeAttr("style");
	$("._czr__resize .content-block__inner").removeAttr("style");
	$("._czr__about-page .content-block__inner").removeAttr("style");
	$(".products-item-slider .carousel-inner").removeAttr("style");
};