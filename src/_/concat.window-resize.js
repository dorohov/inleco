$(function(){var s={xs:{min:0,max:768},sm:{min:767,max:992},md:{min:991,max:1200},lg:{min:1199,max:1e4}},w={xs:{min:0,max:361},sm:{min:360,max:769},md:{min:768,max:961},lg:{min:960,max:1e4}},i="window-width",d="window-height",h=$(window).outerWidth(!0),m=$(window).outerHeight(!0),a=$("html body").eq(0);h<s.xs.max&&(a.hasClass("window-width-sm")&&a.removeClass("window-width-sm"),a.hasClass("window-width-md")&&a.removeClass("window-width-md"),a.hasClass("window-width-lg")&&a.removeClass("window-width-lg"),i="window-width-xs"),h>s.sm.min&&h<s.sm.max&&(a.hasClass("window-width-xs")&&a.removeClass("window-width-xs"),a.hasClass("window-width-md")&&a.removeClass("window-width-md"),a.hasClass("window-width-lg")&&a.removeClass("window-width-lg"),i="window-width-sm"),h>s.md.min&&h<s.md.max&&(a.hasClass("window-width-xs")&&a.removeClass("window-width-xs"),a.hasClass("window-width-sm")&&a.removeClass("window-width-sm"),a.hasClass("window-width-lg")&&a.removeClass("window-width-lg"),i="window-width-md"),h>s.lg.min&&(a.hasClass("window-width-xs")&&a.removeClass("window-width-xs"),a.hasClass("window-width-sm")&&a.removeClass("window-width-sm"),a.hasClass("window-width-md")&&a.removeClass("window-width-md"),i="window-width-lg"),m<w.xs.max&&(a.hasClass("window-height-sm")&&a.removeClass("window-height-sm"),a.hasClass("window-height-md")&&a.removeClass("window-height-md"),a.hasClass("window-height-lg")&&a.removeClass("window-height-lg"),d="window-height-xs"),m>w.sm.min&&m<w.sm.max&&(a.hasClass("window-height-xs")&&a.removeClass("window-height-xs"),a.hasClass("window-height-md")&&a.removeClass("window-height-md"),a.hasClass("window-height-lg")&&a.removeClass("window-height-lg"),d="window-height-sm"),m>w.md.min&&m<w.md.max&&(a.hasClass("window-height-xs")&&a.removeClass("window-height-xs"),a.hasClass("window-height-sm")&&a.removeClass("window-height-sm"),a.hasClass("window-height-lg")&&a.removeClass("window-height-lg"),d="window-height-md"),m>w.lg.min&&(a.hasClass("window-height-xs")&&a.removeClass("window-height-xs"),a.hasClass("window-height-sm")&&a.removeClass("window-height-sm"),a.hasClass("window-height-md")&&a.removeClass("window-height-md"),d="window-height-lg"),$("html body").eq(0).addClass(i).addClass(d)});

$(function(){$(".scroll-container").trigger("init"),console.log("window-resize .scroll-container init")});
var h_window=$(window).height(),w_window=$(window).width(),h_header=$("._czr__navbar-site").outerHeight(!0),h_footer=$(".footer-site").outerHeight(!0),h_404=h_window-h_header,h_resize_xs=h_window,h_navbar_xs=h_window-h_header,h_resize=h_window+50;w_window>767?($("._czr__404-page .content-block__inner").css("height",h_404),$("._czr__resize .content-block__inner").css("height",h_404),$("._czr__about-page .content-block__inner").css("height",h_404)):($("._czr__404-page .content-block__inner").removeAttr("style"),$("._czr__resize .content-block__inner").removeAttr("style"),$("._czr__about-page .content-block__inner").removeAttr("style")),device.mobile()&&($("._czr__resize .content-block__inner").css("height",h_resize_xs),$(".404-page .content-block__inner").css("min-height",h_resize_xs),$(".about-page .content-block__inner").css("min-height",h_resize_xs),$("#pips-carousel-note").removeAttr("data-ride"),$("#pips-carousel-note .item").addClass("active")),device.mobile()||device.tablet()?($(".navbar").addClass("navbar-fixed-top"),$("._czr__pips__carousel").removeClass("carousel-fade"),$("._czr__pipa__carousel").removeClass("carousel-fade"),$(".products-item-slider .carousel-inner").removeAttr("style"),$("._czr__tptt__filter-item .dropdown").on("show.bs.dropdown",function(){var e=$(this);e.parent().width(e.width()).height(e.height())}),$("._czr__tptt__filter-item .dropdown").on("hide.bs.dropdown",function(){var e=$(this);e.parent().removeAttr("style")})):($(".navbar").removeClass("navbar-fixed-top"),$(".products-item-slider .carousel-inner").css("height",h_resize),$("._czr__navbar-site .navbar-collapse").removeAttr("style"),$("._czr__gp__owl").remove(),$("._czr__tptt__filter-item .dropdown").on("show.bs.dropdown",function(){var e=$(this);e.parent().width(e.width())}),$("._czr__tptt__filter-item .dropdown").on("hide.bs.dropdown",function(){var e=$(this);e.parent().removeAttr("style")})),$("nav.navbar-fixed-top").autoHidingNavbar();