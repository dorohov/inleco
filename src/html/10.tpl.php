<?

// шаблон

?>

<div class="modal fade modal-site _czr__modal-reviews " id="modal-reviews" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog _czr__cp__modal-dialog">
		<div class="modal-content">
			<div class="modal-body _czr__cp__flex-modal">
				<div class="heading-site-block">
					<div class="heading-site-inner">
						<h1 class="heading-site">Обратная связь</h1>
						<span class="heading-line"></span>
					</div>
				</div>
				<form action="<?=l(54);?>" class="form-reviews" method="POST" >
					<div class="_czr__fr__note">Если у Вас появились вопросы или предложения, оставьте свои контакты, и наши менеджеры свяжутся с Вами в ближайшее время</div>
					<div><input type="text" name="f[ФИО]" placeholder="ФИО"></div>
					<div><input type="text" name="f[Email]" placeholder="Телефон или e-mail"></div>
					<div><textarea name="f[Текст обращения]" placeholder="Вопрос или комментарий"></textarea></div>
					<div class="_czr__fr__btn-group">
						<button type="submit" class="btn-line">
							Отправить
						</button>
						<button type="button" class="link-modal-close" data-dismiss="modal">Отмена</button> 
					</div>
				</form>
			</div>
			<button type="button" class="btn-modal-close _czr__btn-modal-close" data-dismiss="modal"><span>Закрыть</span></button> 
		</div>
	</div>
</div>

<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
<script>
	ymaps.ready(init);
	
	function init () {
		var myMap = new ymaps.Map("map", {
				center: [<?=get_field('coord', 10);?>],
				zoom: 16
			}, {
				searchControlProvider: 'yandex#search'
			}),
	
		// Создаем геообъект с типом геометрии "Точка".
			myGeoObject = new ymaps.GeoObject({});
	
		myMap.geoObjects
			.add(myGeoObject)
			.add(new ymaps.Placemark([<?=get_field('coord', 10);?>], {
				balloonContent: 'Компания «Inleco»'
			}, {
				preset: 'islands#circleIcon',
				iconColor: '#4d7198'
			}));
	}
</script>