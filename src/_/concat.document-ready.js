$('[data-toggle="tooltip"]').tooltip();
$(".arrow-slider").each(function(i){var e=$(this),t=e.find(".img-block .item"),r=(e.find(".text-content"),e.find(".title-block"),e.find(".arrow-block")),n=r.find(".point-line");t.each(function(i){$("<a/>",{"class":"item",html:'<span class="point" ></span>',href:"#image-"+i}).on("click.arrow-slider.point",function(i){console.log("click.arrow-slider.point");var e=$(this).index();n.find(".item").removeClass("active"),t.fadeOut("fast").removeClass("active"),$(this).addClass("active"),t.eq(e).fadeIn("fast").addClass("active")}).appendTo(n)}),r.on("click.arrow-slider.right",".btn-arrow.right",function(i){var e=n.find(".item"),t=e.filter(".active").eq(0).index(),r=e.eq(t).next(".item");r.size()?r.trigger("click"):e.eq(0).trigger("click")}),r.on("click.arrow-slider.left",".btn-arrow.left",function(i){var e=n.find(".item"),t=e.filter(".active").eq(0).index(),r=e.eq(t).prev(".item");r.size()?r.trigger("click"):e.eq(-1).trigger("click")}),e.hasClass("with-timer")&&e.data("fecss-timer",setInterval(function(){e.is(":hover")||r.find(".btn-arrow.right").trigger("click")},3e3)),n.find(".item.active").size()||n.find(".item").eq(0).trigger("click")});
$(".boobs").each(function(o){$(this)});
$(document.body).on("click",".can-close .close-btn",function(c){c.preventDefault(),$(this).closest(".can-close").removeClass("active")});
$(function(){var e="noname-browser",o=navigator.userAgent.toLowerCase();o.indexOf("msie")!=-1&&(e="msie"),o.indexOf("konqueror")!=-1&&(e="konqueror"),o.indexOf("firefox")!=-1&&(e="firefox"),o.indexOf("safari")!=-1&&(e="safari"),o.indexOf("chrome")!=-1&&(e="chrome"),o.indexOf("chromium")!=-1&&(e="chromium"),o.indexOf("opera")!=-1&&(e="opera"),o.indexOf("yabrowser")!=-1&&(e="yabrowser"),$("html").eq(0).addClass(e)}),$(function(){$(document.body).bind("keydown",function(e){e.stopPropagation(),$(document.body).trigger("fecss.keydown",[{alt:e.altKey,ctrl:e.ctrlKey,shift:e.shiftKey,meta:e.metaKey,key:e.which,liter:String.fromCharCode(e.which)}])})});
$(document.body).on("click.fecss.imgresizer",".fecss-imgresizer",{},function(e){e.preventDefault(),console.log("body trigger:click.fecss.imgresizer");var t=$(this),i=parseInt(t.attr("data-max-width"))||1e3,a=parseInt(t.attr("data-max-height"))||1e3;t.jqfeDropImgOptimizer3({max_width:i,max_height:a,multiple:"multiple",callback:function(e){console.log(e.file),$(document.body).append('<img src="'+e.dataURL+'" title="'+e.file.name+'" />')}})});
$(".fecss-jscacher").each(function(){var c=$(this),a=c.attr("data-jscacher-filter")||"default",e=parseInt(c.attr("data-jscacher-ttl"))||6e4;c.attr("data-jscacher-cached",!1);var t=new jsCacher({filter:a,ttl:e});c.on("cacher-clear",function(a){c.attr("data-jscacher-cached",!1),t.clear()}),c.on("cacher-cache",function(e){c.attr("data-jscacher-cached",!1),t.cache(c.html()),c.attr("data-jscacher-cached",!0),console.log('.fecss-jscacher[data-jscacher-filter="'+a+'"] cacher-cache')}),c.on("cacher-load",function(e){var r=t.load();c.html(r.content).attr("data-jscacher-cached",!0),console.log('.fecss-jscacher[data-jscacher-filter="'+a+'"] cacher-load')}),c.on("cacher-check",function(a){var e=t.load();e.need_update?c.trigger("cacher-cache"):c.trigger("cacher-load")}).trigger("cacher-check")});
$(".fecss-jscart").each(function(){var t=$(this),a=t.attr("data-jscart-filter")||"default",r=new jsCart({filter:a});t.on("rebuild",function(a){t.find(".jscart-item").each(function(a){var e=$(this),c=e.attr("data-jscart-product"),s=e.attr("data-jscart-taste"),n=r.getItem(c,s);e.find("input.jscart-item-amount").attr("value",parseInt(n.amount)),e.find("div.jscart-item-amount, span.jscart-item-amount, a.jscart-item-amount").html(parseInt(n.amount));var d=r.calculate();t.attr("data-jscart-sum",d.sum).find(".jscart-sum").html(d.sum),t.find(".jscart-product").html(d.product),t.find(".jscart-amount").html(d.amount)})}),t.trigger("rebuild"),t.on("clear",function(a){r.clear(),t.trigger("rebuild")}),t.on("create-order",function(a){r.saveCart(function(a,e){$.getJSON("/json/_fecss-jscart/create-order.json",function(a){var e=a;r.saveOrder(e),r.clear(),t.trigger("rebuild")})})}),t.find(".jscart-item .jscart-add-btn").on("click.jscart",function(a){a.preventDefault();var e=$(this),c=e.attr("data-jscart-product"),s=e.attr("data-jscart-taste"),n=e.attr("data-jscart-cost"),d=e.attr("data-jscart-amount");""!=c&&"underfined"!=typeof c&&null!=c||(c=e.closest(".jscart-item").attr("data-jscart-product")),""!=s&&"underfined"!=typeof s&&null!=s||(s=e.closest(".jscart-item").attr("data-jscart-taste")),""!=n&&"underfined"!=typeof n&&null!=n||(n=e.closest(".jscart-item").attr("data-jscart-cost")),""!=d&&"underfined"!=typeof d&&null!=d&&0!=d||(d=e.closest(".jscart-item").attr("data-jscart-amount")),r.add(c,s,n,parseInt(d)),console.log("product "+c+" added to cart"),t.trigger("rebuild")}),t.find(".jscart-item .jscart-remove-btn").on("click.jscart",function(a){a.preventDefault();var e=$(this),c=e.attr("data-jscart-product"),s=e.attr("data-jscart-taste"),n=e.attr("data-jscart-cost"),d=e.attr("data-jscart-amount");""!=c&&"underfined"!=typeof c&&null!=c||(c=e.closest(".jscart-item").attr("data-jscart-product")),""!=s&&"underfined"!=typeof s&&null!=s||(s=e.closest(".jscart-item").attr("data-jscart-taste")),""!=n&&"underfined"!=typeof n&&null!=n||(n=e.closest(".jscart-item").attr("data-jscart-cost")),""!=d&&"underfined"!=typeof d&&null!=d&&0!=d||(d=e.closest(".jscart-item").attr("data-jscart-amount")),r.remove(c,s,parseInt(d)),console.log("product "+c+" removed from cart"),t.trigger("rebuild")}),t.find(".jscart-clear-btn").on("click.jscart",function(a){a.preventDefault(),t.trigger("clear")}),t.find(".jscart-create-order").on("click.jscart",function(a){a.preventDefault(),t.trigger("create-order")})});
$(".fecss-jsviewed").each(function(){var e=$(this),i=e.attr("data-jsviewed-filter")||"default",t=e.html(),r=new jsViewed({filter:i});e.on("rebuild",function(i){e.empty();var n=r.getAll();if(null!=n)for(var a in n){var l=n[a],c=t;for(var d in l)c=c.replace(new RegExp("%"+d+"%","ig"),l[d]);var f=$("<div/>",{html:c});f.appendTo(e)}}),e.trigger("rebuild"),e.on("create-view",{},function(e,t){r.add(t),console.log('.fecss-jsviewed[data-jsviewed-filter="'+i+'"] create-view')}),e.on("clear",function(i){r.clear(),e.trigger("rebuild")}),e.find(".jsviewed-clear-btn").on("click.jsviewed",function(i){i.preventDefault(),e.trigger("clear")}),function(){e.trigger("create-view",[{id:(new Date).getTime(),title:"some test"}])}()});
$(document.ready).on("click",".go-to-top",function(o){o.preventDefault(),$("body").jqfeScrollTo({diff:0,speed:777})});
$(".line-gallery").each(function(e){var i=$(this);i.on("click.line-gallery.right",".btn-arrow.right",function(e){var t=i.find(".img-block .item"),n=t.filter(":visible");n.size()>1?(n.eq(0).hide().insertAfter(t.eq(-1)),n.eq(-1).next(".item").fadeIn("fast")):(n.eq(0).hide().insertAfter(t.eq(-1)),i.find(".img-block .item").eq(0).fadeIn("fast"))}),i.on("click.line-gallery.left",".btn-arrow.left",function(e){var t=i.find(".img-block .item"),n=t.filter(":visible");n.size()>1?(n.eq(-1).hide(),t.eq(-1).insertBefore(n.eq(0)).fadeIn("fast")):(n.eq(0).hide(),i.find(".img-block .item").eq(-1).insertBefore(i.find(".img-block .item").eq(0)).fadeIn("fast"))}),i.hasClass("with-timer")&&i.data("fecss-timer",setInterval(function(){i.is(":hover")||i.find(".btn-arrow.right").trigger("click")},3e3))});
$(".page-loader .close-loader").on("click",function(e){e.preventDefault(),$(".page-loader").removeClass("active")}),$(document.body).on("click.fecss",".page-loader.active ._czr__preloader-process-container ._czr__preloader-process-level",function(e){e.preventDefault(),$(".page-loader").data("window-can-close-it",!0).data("counter-can-close-it",!0).trigger("fecss.can-close-it")}),$(document.body).on("fecss.can-close-it",".page-loader",function(e){e.preventDefault(),$(this).data("counter-can-close-it")&&$(this).data("window-can-close-it")&&$(this).removeClass("active")}),$(window).load(function(e){$(".page-loader").data("window-can-close-it",!0).trigger("fecss.can-close-it"),$(".page-loader ._czr__preloader-process-container ._czr__preloader-process-level").data("fast-page-loading",!0)}),$(function(){var e=$(".page-loader.active"),a=$("._czr__preloader-process-container ._czr__preloader-process-level",e).eq(0);if(a.size()){var o=0;a.css({width:o+"%"}).attr("data-pos",o);var c=setInterval(function(){var e=Math.random();if(e>.5&&o<100){o++,a.data("fast-page-loading")&&(o+=6);a.css({width:o+"%"}).attr("data-pos",o)}else o>99&&(clearInterval(c),$(".page-loader").data("counter-can-close-it",!0).trigger("fecss.can-close-it"))},99)}});



$(document.body).on("click.fecss.url-history",".url-history",{},function(t){t.preventDefault();var e=$(this),r=e.attr("href"),o=e.attr("data-target");"undefined"!=typeof o&&"undefined"!=o||(o="title:title, body:body");var d=!0;$(document.body).trigger("fecss.url-history.get",[r,o,d])});
$("img").addClass("img-responsive");var url=window.location.pathname;$('.navbar-nav a[href="'+url+'"]').parent().addClass("active"),$('._czr__in__modal-nav a[href="'+url+'"]').parent().addClass("active"),$('._fs__navbar a[href="'+url+'"]').parent().addClass("active"),$("._czr__ip-carousel .item").eq(0).addClass("active"),$("._czr__pips__carousel .item").eq(0).addClass("active"),$("._czr__pipa__carousel .item").eq(0).addClass("active"),$("._czr__modal-gallery .item").eq(0).addClass("active"),$("#getModal").click(function(){return $("#modal-timetable").modal("hide"),setTimeout(function(){$("#modal-timetable-reviews").modal("show")},500),!1}),$("#getModal2").click(function(){return $("#modal-timetable-reviews").modal("hide"),setTimeout(function(){$("#modal-timetable").modal("show")},500),!1}),$("._czr__anim-indic .anim").hover(function(){$(this).addClass("in").removeClass("out")},function(){$(this).removeClass("in").addClass("out")}),$(".modal").on("shown.bs.modal",function(a){$(".scroll-container").trigger("init")});
$(function(){var e,a=$(".skw-pages").eq(0),t=function(a){a?setTimeout(function(){e=!1},a):e=!1};t(),a.find(".skw-page__indicators").empty().end().find(".skw-page").each(function(e){var t=$(this);t.attr("data-slide-id",e),a.find(".skw-page__indicators").append("<li></li>")}).removeClass("active").addClass("inactive").eq(0).toggleClass("inactive active").end().end().find(".skw-page__indicators li").eq(0).addClass("active"),a.attr("data-slide-id",0),$(function(){if(SS){var e=parseInt(SS.get("__skw")||0);e&&(a.attr("data-slide-id",e),a.find(".skw-page").removeClass("active").addClass("inactive").eq(e).toggleClass("inactive active"),a.find(".skw-page__indicators li").removeClass("active").eq(e).addClass("active"))}}),!a.size()||screenJS.isXS()||screenJS.isSM()||device.mobile()||device.tablet()?$(document.body).on("click.azbn",".skw-page__control",{},function(e){e.preventDefault();var t,i=$(this),n=parseInt(a.attr("data-slide-id"));i.hasClass("prev")?t=n-1:i.hasClass("next")&&(t=n+1),t>-1&&t<a.find(".skw-page").length&&(a.attr("data-slide-id",t),a.find(".skw-page.active").eq(0).removeClass("active").addClass("inactive").end().end().find(".skw-page").eq(t).removeClass("inactive").addClass("active"),a.find(".skw-page__indicators li").filter(".active").removeClass("active").end().eq(t).addClass("active"),SS.set("__skw",t))}):($(document.body).on("azbn.wheel",".skw-pages",{},function(e,t){e.preventDefault();var i=t.callback;t.next==a.find(".skw-page").length||(a.find(".skw-page").filter(".active").toggleClass("inactive active").end().eq(t.next).toggleClass("inactive active"),a.find(".skw-page__indicators li").filter(".active").removeClass("active").end().eq(t.next).addClass("active"),SS.set("__skw",t.next)),i()}),$(document.body).on("wheel mousewheel DOMMouseScroll MozMousePixelScroll",".skw-page",{},function(i){if(e)return void i.preventDefault();e=!0;var n,s=-i.originalEvent.deltaY||i.originalEvent.detail||i.originalEvent.wheelDelta,d=parseInt(a.attr("data-slide-id"));s>0?(i.preventDefault(),d>0?(n=d-1,a.attr("data-slide-id",n),a.trigger("azbn.wheel",[{diff:s,next:n,callback:function(){t(451)}}])):t()):s<0?d<a.find(".skw-page").length?(i.preventDefault(),n=d+1,a.attr("data-slide-id",n),a.trigger("azbn.wheel",[{diff:s,next:n,callback:function(){t(451)}}])):d==a.find(".skw-page").length?$("html, body").animate({scrollTop:$("footer").eq(0).offset().top},777,function(){t()}):(i.preventDefault(),t()):t()}),$(document.body).on("click.azbn",".skw-pages .skw-page__indicators li",{},function(e){e.preventDefault();var t=$(this).index();$(".skw-pages .skw-page").filter(".active").toggleClass("inactive active").end().eq(t).toggleClass("inactive active"),$(this).parent().find("li").removeClass("active").eq(t).addClass("active"),a.attr("data-slide-id",t)}),$(document.body).on("click.azbn",".skw-page__control",{},function(e){e.preventDefault();var i,n=$(this),s=parseInt(a.attr("data-slide-id"));n.hasClass("prev")?(i=s-1,a.attr("data-slide-id",i),a.trigger("azbn.wheel",[{diff:1,next:i,callback:function(){t(451)}}])):n.hasClass("next")&&(i=s+1,a.attr("data-slide-id",i),a.trigger("azbn.wheel",[{diff:-1,next:i,callback:function(){t(451)}}]))}))});