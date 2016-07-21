$(document).ready(function(){
	
	$(function(){
		
		$(document.body).on('click.azbn', '._azbn_flt-dropdown ul li a', {}, function(event){
			event.preventDefault();
			event.stopPropagation();
			
			var btn = $(this);
			var html = btn.find('span').html();
			var flt = btn.attr('data-flt') || '';
			
			var _flts = $('._azbn_flt-dropdown');
			var _flts_size = _flts.length;
			
			btn
				.closest('._azbn_flt-dropdown')
					.attr('data-flt-by', flt)
					.find('._azbn_flt-dropdown-value')
						.html(html)
					.parent()
						.filter('[aria-expanded="true"]')
							.trigger('click');
			;
			
			
			
			/*
			var _gr = btn
						.closest('._azbn_flt-dropdown').attr('data-flt-by') || '';
			var _base_class = '_azbn_flt-by-' + _gr;
			
			var items = $('._azbn_flt-by.' + _base_class);
			if(flt != '') {
				items.filter(':not(.' + flt + ')').filter(':visible').hide();
			} else {
				items.filter(':hidden').fadeIn('fast');
			}
			*/
			
			var items = $('._azbn_flt-by');
			items.hide();
			
			_flts.each(function(index){
				
				var _flt = $(this).attr('data-flt-by');
				
				if(_flt != '') {
					items = items.filter('.' + _flt);
				}
				
			});
			items.fadeIn('fast');
			
		});
		
	});
	
	$(function(){
		
		var _flts = $('._azbn_flt-dropdown');
		
		_flts.each(function(index){
			
			var dd = $(this);
			dd.find('ul li').eq(0).find('a').trigger('click.azbn');
			
		});
		
	});
	
});