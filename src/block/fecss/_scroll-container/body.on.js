
$(document.body).on('move-scroll', '.scroll-container', {}, function(event, scrolltop, scrollleft) {
	event.preventDefault();
	
	var block = $(this);
	var target = $(block.attr('data-target') + ' .scroll-element').eq(0);
	var otarget = target.find('.scroll-overflow').eq(0);
	
	var line = block.find('.scroll-line');
	var scroll = line.find('.scroll');
	var scroll_ball = scroll.find('.scroll-ball');
	
	if(block.hasClass('vertical')) {
		
		var percent = scrolltop / (otarget.outerHeight(true) - target.outerHeight(true));
		
		var _line_h = line.outerHeight(true) - scroll.outerHeight(true);
		
		var pos = _line_h * percent;
		
		if(pos > _line_h) {
			scroll.css({'top':_line_h + 'px'});
		} else if(pos < 0) {
			scroll.css({'top':0 + 'px'});
		} else {
			scroll.css({'top':pos + 'px'});
		}
	}
	
	if(block.hasClass('horizontal')) {
		var percent = scrollleft / (otarget.outerWidth(true) - target.outerWidth(true));
		
		var _line_h = line.outerWidth(true) - scroll.outerWidth(true);
		
		var pos = _line_h * percent;
		
		if(pos > _line_h) {
			scroll.css({'left':_line_h + 'px'});
		} else if(pos < 0) {
			scroll.css({'left':0 + 'px'});
		} else {
			scroll.css({'left':pos + 'px'});
		}
	}
	
	
});

$(document.body).on('init', '.scroll-container', {}, function(event) {
	event.preventDefault();
	
		var block = $(this);
		var target = $(block.attr('data-target') + ' .scroll-element').eq(0);
		var otarget = target.find('.scroll-overflow').eq(0);
		
		target
			.off('scroll')
			.on('scroll', function(event) {
				block.trigger('move-scroll', [target.scrollTop(), target.scrollLeft()]);
			});
		
		block.empty();
		
		var line = $('<div/>', {
			class : 'scroll-line',
		})
			.appendTo(block);
		
		var scroll = $('<div/>', {
			class : 'scroll ball',
		})
			.appendTo(line);
		
		var scroll_ball = $('<div/>', {
			class:'scroll-ball',
		})
			.appendTo(scroll);
		
		var __setscroll = function() {
			
			if(block.hasClass('vertical')) {
				
				
				
				
				if((otarget.outerHeight(true) - target.outerHeight(true)) > 0) {
					
					scroll.draggable({
						axis:'y',
						containment : 'parent',
						scroll:false,
						drag:function(event, ui){
							
							var s_ratio = ui.position.top / (line.outerHeight(true) - scroll.outerHeight(true));
							var _n_pos = (otarget.outerHeight(true) - target.outerHeight(true)) * s_ratio;
							
							target.scrollTop(_n_pos);
						},
					});
					
				} else {
					
					block.empty();
					
				}
				
				
				
				
			} else if(block.hasClass('horizontal')) {
				
				
				
				target.css({
					'display':'inline-block',
					'width':'100%',
					'overflow':'hidden',
				});
				otarget.css({
					'display':'inline-block',
				});
				
				
				if((otarget.outerWidth(true) - target.outerWidth(true)) > 0) {
					
					scroll.draggable({
						axis:'x',
						containment : 'parent',
						scroll:false,
						drag:function(event, ui){
							
							var s_ratio = ui.position.left / (line.outerWidth(true) - scroll.outerWidth(true));
							var _n_pos = (otarget.outerWidth(true) - target.outerWidth(true)) * s_ratio;
							
							target.scrollLeft(_n_pos);
						},
					});
					
				} else {
					
					//block.empty();
					console.log(otarget.outerWidth(true) + ' ' + target.outerWidth(true));
				}
				
				
				
				
			}
			
			target.trigger('scroll');
			
		}
		__setscroll();
		
		
});

$(document.body).on('DOMSubtreeModified changeClass', '.scroll-overflow', {}, function(event) {
	$(this).closest('.scroll-hide').parent().find('.scroll-container').trigger('init');
});

$('.scroll-container').trigger('init');
