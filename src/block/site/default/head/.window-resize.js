var h_window = $(window).height(), 
 	w_window = $(window).width();

var h_header = $('._czr__navbar-site').outerHeight(true),
	h_footer = $('.footer-site').outerHeight(true),
 	h_404 = h_window - h_header,
 	h_resize_xs = h_window,
 	h_navbar_xs = h_window - h_header,
 	h_resize = h_window + 50;

if (w_window > 767){
	$("._czr__404-page .content-block__inner").css("height", h_404);
	$("._czr__resize .content-block__inner").css("height", h_404);
	$("._czr__about-page .content-block__inner").css("height", h_404);
} else {
	$("._czr__404-page .content-block__inner").removeAttr("style");
	$("._czr__resize .content-block__inner").removeAttr("style");
	//$("._czr__resize .content-block__inner").css("height", h_resize_xs);
	$("._czr__about-page .content-block__inner").removeAttr("style");
};

if (device.mobile()) {	
	$("._czr__resize .content-block__inner").css("height", h_resize_xs);
	$(".404-page .content-block__inner").css("min-height", h_resize_xs);
	$(".about-page .content-block__inner").css("min-height", h_resize_xs);
	$("#pips-carousel-note").removeAttr("data-ride");
	$("#pips-carousel-note .item").addClass("active");
};
if (device.mobile() || device.tablet()) {
	$('.navbar').addClass('navbar-fixed-top');
	$('._czr__pips__carousel').removeClass('carousel-fade');	
	$('._czr__pipa__carousel').removeClass('carousel-fade');	
	$(".products-item-slider .carousel-inner").removeAttr("style");
	$('._czr__navbar-site .navbar-collapse').css("height", h_404);
	$('._czr__tptt__filter-item .dropdown').on('show.bs.dropdown', function () {
		var dd = $(this);
		dd.parent().width(dd.width()).height(dd.height());
	});
	$('._czr__tptt__filter-item .dropdown').on('hide.bs.dropdown', function () {
	  var dd = $(this);
	  dd.parent().removeAttr('style');
	});
} else {
	$('.navbar').removeClass('navbar-fixed-top');	
	$(".products-item-slider .carousel-inner").css("height", h_resize);
	$('._czr__navbar-site .navbar-collapse').removeAttr("style");
	$('._czr__gp__owl').remove();
	$('._czr__tptt__filter-item .dropdown').on('show.bs.dropdown', function () {
		var dd = $(this);
		dd.parent().width(dd.width());
	});
	$('._czr__tptt__filter-item .dropdown').on('hide.bs.dropdown', function () {
	  var dd = $(this);
	  dd.parent().removeAttr('style');
	});
};
$("nav.navbar-fixed-top").autoHidingNavbar();