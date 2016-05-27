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
	$("._czr__about-page .content-block__inner").css("height", h_404);
} else {
	$("._czr__404-page .content-block__inner").removeAttr("style");
	$("._czr__resize .content-block__inner").removeAttr("style");
	$("._czr__about-page .content-block__inner").removeAttr("style");
};

if (device.mobile() || device.tablet()) {
	$('.navbar').addClass('navbar-fixed-top');
	$('._czr__pips__carousel').removeClass('carousel-fade');	
	$('._czr__pipa__carousel').removeClass('carousel-fade');	
	$(".products-item-slider .carousel-inner").removeAttr("style");
} else {
	$('.navbar').removeClass('navbar-fixed-top');	
	$(".products-item-slider .carousel-inner").css("height", h_resize);
};
if (device.tablet()) {
	$('._czr__navbar-site .navbar-collapse').css("height", h_404);
} else {
	$('._czr__navbar-site .navbar-collapse').removeAttr("style");
};
$("nav.navbar-fixed-top").autoHidingNavbar();
/*
var navi = $('nav.open-sidebar');
if(!(navi)) {
  $("nav.navbar-fixed-top").autoHidingNavbar();
} else {
  $("nav.navbar-fixed-top").autoHidingNavbar('show');
}*/
