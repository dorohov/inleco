/*
 var curPage = 1;
  var numOfPages = $(".skw-page").length;
  var animTime = 1000;
  var scrolling = false;
  var pgPrefix = ".skw-page-";

  function pagination() {
    scrolling = true;

    $(pgPrefix + curPage).removeClass("inactive").addClass("active");
    $(pgPrefix + (curPage - 1)).addClass("inactive");
    $(pgPrefix + (curPage + 1)).removeClass("active");

    setTimeout(function() {
      scrolling = false;
    }, animTime);
  };

  function navigateUp() {
    if (curPage === 1) return;
    curPage--;
    pagination();
  };

  function navigateDown() {
    if (curPage === numOfPages) return;
    curPage++;
    pagination();
  };

  $(document).on("mousewheel DOMMouseScroll", function(e) {
    if (scrolling) return;
    if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
      navigateUp();
    } else { 
      navigateDown();
    }
  });

  $(document).on("keydown", function(e) {
    if (scrolling) return;
    if (e.which === 38) {
      navigateUp();
    } else if (e.which === 40) {
      navigateDown();
    }
  });
*/


  
  
  
  
  
  
  

$(function() {
	
	//$('.bottom-bordered .bb-help').tooltip();
	
	var block = $('.skw-pages').eq(0);
	var scrolling;
	
	var can_scroll = function(timeout){
		if(timeout) {
			setTimeout(function(){
				scrolling = false;
			}, timeout);
		} else {
			scrolling = false;
		}
	};
	
	can_scroll();
	
	block
		.find('.skw-page__indicators')
			.empty()
		.end()
		.find('.skw-page').each(function(index){
			
			var slide = $(this);
			slide
				.attr('data-slide-id', index)
			;
			block.find('.skw-page__indicators').append('<li></li>');
			
		})
			.removeClass('active')
			.addClass('inactive')
			.eq(0)
				.toggleClass('inactive active')
			.end()
			.end()
			.find('.skw-page__indicators li')
				.eq(0)
					.addClass('active');
	;
	block.attr('data-slide-id', 0);
	
	/*
	//генерация переключателей
	
	var s_size = block.find('.fullscreen-content .b-azbn-slide').size();
	if(s_size && !screenJS.isXS() && !screenJS.isSM() && !device.mobile() && !device.tablet()) {
		
		block.css({
			top : ($('.b-top-header').outerHeight(true) + $('.b-top-menu').outerHeight(true)) + 'px',
		})
		
		var ul = block.find('.fullscreen-content .content-pagination ul');
		ul.empty();
		
		block.find('.fullscreen-content .b-azbn-slide').each(function(index){
			
			var s = $(this);
			var slide_id = s.attr('data-slide-id');
			
			ul.append('<li><a href="#-" data-slide-id="' + slide_id + '" ></a></li>');
			
			ul.find('li a').on('click.azbn', function(event){
				event.preventDefault();
				
				var btn = $(this);
				var next = parseInt(btn.attr('data-slide-id'));
				
				block.attr('data-slide-id', next);
				block.trigger('azbn.wheel', [{diff:0, next:next, callback:function(){
					can_scroll(1000);
				}}]);
			})
			
		});
		
		$('#b-azbn-diy-selfibot-container-slide-count').html(s_size);
	}
	*/
	
	
		$(function(){
			
			if(SS) {
				
				var id = parseInt(SS.get('__skw') || 0);
				
				if(id) {
					
					block.attr('data-slide-id', id);
					
					block
						.find('.skw-page')
							.removeClass('active')
							.addClass('inactive')
						//.end()
						.eq(id)
							.toggleClass('inactive active')
					;
					
					block
						.find('.skw-page__indicators li')
							.removeClass('active')
						//.end()
						.eq(id)
							.addClass('active')
					;
					
					//SS.remove('__skw');
					
				}
				
			}
			
		});
	
	
	if(block.size() && !screenJS.isXS() && !screenJS.isSM() && !device.mobile() && !device.tablet()) {
		
		
		
		$(document.body).on('azbn.wheel', '.skw-pages', {}, function(event, obj){
			event.preventDefault();
			
			var cb = obj.callback;
			
			if(obj.next == block.find('.skw-page').length) {
				
			} else {
				
				//event.preventDefault();
				
				block.find('.skw-page')
					.filter('.active')
						.toggleClass('inactive active')
					.end()
					.eq(obj.next)
						.toggleClass('inactive active')
				;
				
				block.find('.skw-page__indicators li')
					.filter('.active')
						.removeClass('active')
					.end()
					.eq(obj.next)
						.addClass('active')
				;
				
				SS.set('__skw', obj.next);
				
			}
			
			
			cb();
		});
		
		
		
		$(document.body).on('wheel mousewheel DOMMouseScroll MozMousePixelScroll', '.skw-page', {}, function(event) {
			//event.preventDefault();
			//diff:event.originalEvent.wheelDelta
			
			if(scrolling) {
				
				event.preventDefault();
				
				return;
				
			} else {
				
				scrolling = true;
				//$(document.body).trigger('fecss.wheel-block.set', [{diff:event.originalEvent.wheelDelta}]);
				
				var diff = (-event.originalEvent.deltaY) || event.originalEvent.detail || event.originalEvent.wheelDelta;
				console.log(diff);
				var slide = parseInt(block.attr('data-slide-id'));
				//var now = slide;
				var next;
				
				if(diff > 0) {
					
					event.preventDefault();
					
					if(slide > 0) {
						
						next = slide - 1;
						block.attr('data-slide-id', next);
						block.trigger('azbn.wheel', [{diff:diff, next:next, callback:function(){
							can_scroll(1000);
						}}]);
						
					} else {
						
						can_scroll();
						
					}
				} else if(diff < 0) {
					
					if(slide < block.find('.skw-page').length) {
						
						event.preventDefault();
						
						next = slide + 1;
						block.attr('data-slide-id', next);
						block.trigger('azbn.wheel', [{diff:diff, next:next, callback:function(){
							can_scroll(1000);
						}}]);
						
					} else if(slide == (block.find('.skw-page').length - 1)) {
						
						$('html, body').animate({
							scrollTop: ($('footer').eq(0).offset().top)
						}, 777, function(){
							can_scroll();
						});
						
					} else {
						
						event.preventDefault();
						
						can_scroll();
						
					}
				} else {
					
					//event.preventDefault();
					
					can_scroll();
					
				}
				
				//can_scroll();
				
			}
			
		});
		
		
		$(document.body).on('click.azbn', '.skw-pages .skw-page__indicators li', {}, function(event){
			event.preventDefault();
			
			var i = $(this).index();
			
			$('.skw-pages .skw-page')
				.filter('.active')
					.toggleClass('inactive active')
				.end()
					.eq(i)
						.toggleClass('inactive active')
			;
			
			$(this).parent()
					.find('li')
						.removeClass('active')
					.eq(i)
						.addClass('active')
			;
			
			block.attr('data-slide-id', i);
			
		});
		
		$(document.body).on('click.azbn', '.skw-page__control', {}, function(event){
			event.preventDefault();
			
			var btn = $(this);
			
			var slide = parseInt(block.attr('data-slide-id'));
			var next;
			
			if(btn.hasClass('prev')) {
				next = slide - 1;
				block.attr('data-slide-id', next);
				block.trigger('azbn.wheel', [{diff:1, next:next, callback:function(){
					can_scroll(1000);
				}}]);
			} else if(btn.hasClass('next')) {
				next = slide + 1;
				block.attr('data-slide-id', next);
				block.trigger('azbn.wheel', [{diff:-1, next:next, callback:function(){
					can_scroll(1000);
				}}]);
			}
			
		});
		
	} else {
		
		
		$(document.body).on('click.azbn', '.skw-page__control', {}, function(event){
			event.preventDefault();
			
			var btn = $(this);
			
			var slide = parseInt(block.attr('data-slide-id'));
			var next;
			
			if(btn.hasClass('prev')) {
				next = slide - 1;
			} else if(btn.hasClass('next')) {
				next = slide + 1;
			}
			
			if(next > -1 && next < block.find('.skw-page').length) {
				block.attr('data-slide-id', next);
				block.find('.skw-page.active').eq(0)
						.removeClass('active')
						.addClass('inactive')
					.end()
					.end()
					.find('.skw-page').eq(next)
						.removeClass('inactive')
						.addClass('active')
				;
				
				block.find('.skw-page__indicators li')
					.filter('.active')
						.removeClass('active')
					.end()
					.eq(next)
						.addClass('active')
				;
				
				SS.set('__skw', next);
			}
			
		});
		
		
	}
	
});