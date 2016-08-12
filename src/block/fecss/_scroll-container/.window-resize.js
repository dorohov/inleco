	
	$(
		function() {
			if (!device.mobile() && !device.tablet()){
				$('.scroll-container').trigger('init');
				//console.log('window-resize .scroll-container init');
			} else{
				$('.scroll-container').empty().remove();
			}
		}
	);
	