<?

?>


<footer class="footer-site ">
	<div class="container">
		<div class="_fs__logotip">
			<a href="/"><img src="<?=$this->path('img');?>/default/logotip-footer.png" alt=""></a>
		</div>
		<ul class="_fs__navbar">
			<li><a href="/about.html">О компании</a></li>
			<li><a href="/products.html">Продукция</a></li>
			<li><a href="/training.html">Обучение</a></li>
			<li><a href="/pressroom.html">Пресс-центр</a></li>
			<li><a href="/gallery.html">Галерея</a></li>
			<li><a href="/contacts.html">Контакты</a></li>
		</ul>  
		<div class="_fs__address">
			<div>121170, Россия, г. Москва, Кутузовский проспект, 36, стр. 4</div>
			<div><a href="tel:+74959986909">+7 (495) 998‐69‐09</a></div>
			<div><a href="mailto:info@inleco.ru">info@inleco.ru</a></div>
		</div>
		<div class="navbar-soc _fs__navbar-soc">
			<a href="https://vk.com/" class="icon icon-vk " target="_blank"></a>
			<a href="https://twitter.com/" class="icon icon-tw" target="_blank"></a>
		</div>
		<div class="_fs__dorohovdesign _cb__flex _col">
			<a href="http://www.dorohovdesign.ru/" target="_blank" class="_cb__col">Создание сайта</a>
			<a href="http://www.dorohovdesign.ru/" target="_blank" class="_cb__col"><img src="<?=$this->path('img');?>/default/dorohovdesign.png" alt="" ></a>
		</div>		
	</div>
</footer>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="<?=$this->path('js');?>/jquery.min.js" ></script>

<script src="<?=$this->path('js');?>/bootstrap.min.js" ></script>
<script src="<?=$this->path('js');?>/jquery.bootstrap-autohidingnavbar.min.js" ></script>
<script src="<?=$this->path('js');?>/storage.js" ></script>
<script src="<?=$this->path('js');?>/device.min.js" ></script>
<script src="<?=$this->path('js');?>/azbn.js" ></script>
<script src="<?=$this->path('js');?>/hamburger.js" ></script>

<script src="<?=$this->path('js');?>/document-ready.js" ></script>
<script>
	$(window).load(function(){
		$("[data-toggle-nav]").click(function() {
			var toggle_el = $(this).data("toggle-nav"); 
			$(toggle_el).toggleClass("open-sidebar");
		});
	})
</script>


</body>
</html>