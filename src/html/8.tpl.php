<?

// шаблон

?>


<link rel="stylesheet" href="<?=$this->path('js');?>/../plugins/owl.carousel/owl.carousel.css">
<script src="<?=$this->path('js');?>/../plugins/owl.carousel/owl.carousel.min.js"></script>
<script >
	$(document).ready(function() {
		if (device.mobile()) {
			$('._czr__tpc__item-flex ._czr__tpc__item').css('width', 230);
			$('._czr__tpc__item-flex').addClass('owl-carousel').owlCarousel({
				autoWidth:true,
				margin: 0,
				nav:false,
				items:1
			});
			$('._czr__tptt__item-flex ._czr__tptt__item').css('width', 230);
			$('._czr__tptt__item-flex').addClass('owl-carousel').owlCarousel({
				autoWidth:true,
				margin: 0,
				nav:false,
				items:1
			});
		}				
	});
</script>