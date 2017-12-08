<?if(is_user_logged_in()) {?>
<?
	$__prefix="content-block__";
	$__mod="is--training";
	$__modPanel="is--training-panel";

	$query = new WP_Query(array(
		'post_type' => 'lesson',
		//'post_parent' => $id,
		'order' => 'DESC',
		'orderby' => 'date',
		'posts_per_page' => -1,
		'post_status' => array('publish', 'future'),
	));
?>
<div class="<?=$__prefix;?>panel">
	<div class="<?=$__prefix;?>inner  is--bg">
		<div class="<?=$__prefix;?>elem">
			<div class="<?=$__prefix;?>heading-block">
				<div class="<?=$__prefix;?>heading-cols">
					<h1 class="<?=$__prefix;?>heading">Расписание занятий</h1>
					<span class="<?=$__prefix;?>heading-line"></span>
				</div>
			</div>	
			<div class="<?=$__prefix;?>container">
				<ul class="<?=$__prefix;?>filter-block">
					<li class="<?=$__prefix;?>filter-item">
						<a href="#" class="<?=$__prefix;?>filter-link  is--active">Семинары месяца</a>
					</li>
					<li class="<?=$__prefix;?>filter-item">
						<a href="#" class="<?=$__prefix;?>filter-link">Семинары следующего месяца</a>
					</li>
					<li class="<?=$__prefix;?>filter-item">
						<a href="#" class="<?=$__prefix;?>filter-link">Семинары в регионах</a>
					</li>
					<li class="<?=$__prefix;?>filter-item  is--visible-device">
						<a href="#" class="<?=$__prefix;?>filter-link" data-toggle="collapse" data-target="#datepicker">Выбрать по дате</a>
					</li>
				</ul>
				<div class="<?=$__prefix;?>row  <?=$__mod;?>  is--wrap  is--gutter">
					<div class="<?=$__prefix;?>cols  is--cols-3  <?=$__mod;?>">
						<div class="<?=$__prefix;?>datepicker-collapse collapse" id="datepicker">
							<div class="<?=$__prefix;?>datepicker">
								<div class="<?=$__prefix;?>datepicker-input" data-plugin="datepicker">
								</div>
								<div class="<?=$__prefix;?>datepicker-container"></div>
								<ul class="<?=$__prefix;?>datepicker-legend">
									<li class="<?=$__prefix;?>datepicker-legend-item  is--msk">Семенары в Москве</li>
									<li class="<?=$__prefix;?>datepicker-legend-item  is--region">Семенары в регионах</li>
									<li class="<?=$__prefix;?>datepicker-legend-item  is--msk-region">Семенары в Москве и регионах</li>
								</ul>
							</div> 
						</div> 
					</div>
					<div class="<?=$__prefix;?>cols  is--cols-9  <?=$__mod;?>">
						<div class="card-block__panel">
							<div class="<?=$__prefix;?>row  is--wrap  is--gutter  <?=$__modPanel;?>">	
							<?
								while ($query->have_posts()) {
									$query->the_post();
									$id = get_the_ID();	
									$title = t($id);
									$link = l($id);
									$date_get = get_field('date', $id);
									$date_iso = get_the_date('Y-m-d', $date_get);
									$date = get_the_date('d F Y', $date_get);

									$cats = get_the_terms($id, 'lesson_taxonomies');
									$cats_arr = array();
									if(count($cats)) {
										foreach($cats as $c){
											$cats_arr[] = $c->slug;
										}
									}
									$cats_str = implode(' ', $cats_arr);
									$preview = $this->Imgs->postImg($id, '385x245');
							?>
								<div class="<?=$__prefix;?>cols  is--cols-4  <?=$__modPanel;?>">
									<article class="card-item__card  is--training">
										<a href="<?=$link;?>" class="card-item__preview  is--training">
											<img src="<?=$preview;?>" alt="<?=$title;?>">
										</a>
										<time datetime="<?=$date_iso;?>" class="card-item__date  is--training"><?=$date;?></time>
										<h4 class="card-item__heading  is--training"><a href="<?=$link;?>"><?=$title;?></a></h4>
										<div class="card-item__coach  is--training"><span>Преподаватель:</span> {block_coach}</div>
									</article>	
								</div>
							<?
								}
							?>
								<div class="<?=$__prefix;?>cols  is--cols-12  <?=$__modPanel;?>  is--pagination">
									<div class="pagination-block__panel">
										<ul class="pagination-block__list">	
											<li class="pagination-block__item">
												<a href="#" class="pagination-block__link">01</a>
											</li>	
													<li class="pagination-block__item">
												<a href="#" class="pagination-block__link">02</a>
											</li>	
													<li class="pagination-block__item">
												<a href="#" class="pagination-block__link">03</a>
											</li>	
													<li class="pagination-block__item">
												<a href="#" class="pagination-block__link">...</a>
											</li>	
													<li class="pagination-block__item">
												<a href="#" class="pagination-block__link">10</a>
											</li>
										</ul>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?
$query = new WP_Query(array(
	'post_type' => 'page',
	'post_parent' => 42,
	'orderby' => 'menu_order title',
	'order' => 'ASC',
));
?>
		<div class="<?=$__prefix;?>elem">
			<div class="<?=$__prefix;?>heading-block">
				<div class="<?=$__prefix;?>heading-cols">
					<h1 class="<?=$__prefix;?>heading">Расписание занятий</h1>
					<span class="<?=$__prefix;?>heading-line"></span>
				</div>
			</div>	
			<div class="<?=$__prefix;?>container">
				<div class="card-block__panel">
					<div class="<?=$__prefix;?>row  is--wrap  is--gutter  is--coach-panel">
						<?										
						while ($query->have_posts()) {
							$query->the_post();
							$id = get_the_ID();
							$preview = $this->Imgs->postImg($id, '380x440');
							$link = l($id);
							$title = t($id);
						?>
						<div class="<?=$__prefix;?>cols  is--cols-3  is--coach-panel">	
							<div class="card-item__card  is--coach">
								<a href="<?=$link;?>" class="card-item__preview  is--coach">
									<img src="<?=$preview;?>" alt="<?=$title;?>">
								</a>
								<h4 class="card-item__heading is--coach"><a href="<?=$link;?>"><?=$title;?></a></h4>
							</div>		
						</div>
						<?}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?} else {?>

<?

// шаблон

?>

<?
$query = new WP_Query(array(
	'post_type' => 'lesson',
	//'post_parent' => $id,
	'order' => 'DESC',
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => array('publish', 'future'),
));
?>
<div class="timetable-page content-block _czr__timetable-page bg-training ">
	<div class="content-block__inner">
		<div class="_czr__tptt__flex">			
			<div class="heading-site-block _czr__nip__heading-site-block">
				<div class="heading-site-inner">
					<h2 class="heading-site _czr__nip__heading-site">Расписание занятий</h2>
					<span class="heading-line"></span>
				</div>
			</div>
			<div class="container">
				<div class="_czr__tptt__inner">
					<div class="_cb__flex _czr__tptt__filter _col">
						<div class="_cb__col">
							<!-- город: <span>москва</span> -->
							
							<div class=" _czr__tptt__filter-item">
								<div class="dropdown _azbn_flt-dropdown" data-flt-by="cities" >
									<a data-toggle="dropdown" href="#">Город: <span class="_azbn_flt-dropdown-value" ></span></a>
									<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
										
										<li><a href="#" data-flt="" ><span>Все</span></a></li>
										
										<?
										$flt_arr = get_categories(array(
											'type'					=> 'lesson',
											//'child_of'				=> 0,
											'parent'				=> 8,
											'orderby'				=> 'order',
											'order'					=> 'ASC',
											'hide_empty'			=> 0,
											'hierarchical'			=> 0,
											'exclude'				=> '',
											'include'				=> '',
											'number'				=> 0,
											'taxonomy'				=> 'lesson_taxonomies',
											'pad_counts'			=> false,
										));
										if(count($flt_arr)){
											foreach($flt_arr as $flt) {
										?>
										<li><a href="#" data-flt="<?=$flt->slug;?>" ><span><?=$flt->name;?></span></a></li>
										<?
											}
										}
										?>
									</ul>
								</div>
							</div>
							
						</div>
						<div class="_cb__col">
							<div class=" _czr__tptt__filter-item">
								<div class="dropdown _azbn_flt-dropdown" data-flt-by="dates" >
									<a data-toggle="dropdown" href="#">Диапазон дат: <span class="_azbn_flt-dropdown-value" ></span></a>
									<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
										
										<li><a href="#" data-flt="" ><span>Все</span></a></li>
										
										<?
										$flt_arr = get_categories(array(
											'type'					=> 'lesson',
											//'child_of'				=> 0,
											'parent'				=> 10,
											'orderby'				=> 'order',
											'order'					=> 'ASC',
											'hide_empty'			=> 0,
											'hierarchical'			=> 0,
											'exclude'				=> '',
											'include'				=> '',
											'number'				=> 0,
											'taxonomy'				=> 'lesson_taxonomies',
											'pad_counts'			=> false,
										));
										if(count($flt_arr)){
											foreach($flt_arr as $flt) {
										?>
										<li><a href="#" data-flt="<?=$flt->slug;?>" ><span><?=$flt->name;?></span></a></li>
										<?
											}
										}
										?>
										
									</ul>
								</div>
							</div>
						</div>
						<div class="_cb__col">
							<div class=" _czr__tptt__filter-item">
								<div class="dropdown _azbn_flt-dropdown" data-flt-by="directions" >
									<a data-toggle="dropdown" href="#">Направления: <span class="_azbn_flt-dropdown-value" ></span></a>
									<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
										
										<li><a href="#" data-flt="" ><span>Все</span></a></li>
										
										<?
										$flt_arr = get_categories(array(
											'type'					=> 'lesson',
											//'child_of'				=> 0,
											'parent'				=> 9,
											'orderby'				=> 'order',
											'order'					=> 'ASC',
											'hide_empty'			=> 0,
											'hierarchical'			=> 0,
											'exclude'				=> '',
											'include'				=> '',
											'number'				=> 0,
											'taxonomy'				=> 'lesson_taxonomies',
											'pad_counts'			=> false,
										));
										if(count($flt_arr)){
											foreach($flt_arr as $flt) {
										?>
										<li><a href="#" data-flt="<?=$flt->slug;?>" ><span><?=$flt->name;?></span></a></li>
										<?
											}
										}
										?>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!--<div class="_czr__tptt__scroll">						
						<div id="overflow-container-lesson-list" class="scroll-hide" >
							<div class="overflow-container scroll-element">
								<div class="overflowed scroll-overflow">
									<div class="_czr__tptt__item-flex owlCarousel_lesson_list">
										<?
										
										while ($query->have_posts()) {
											$query->the_post();
											$id = get_the_ID();
											
											$cats = get_the_terms($id, 'lesson_taxonomies');
											$cats_arr = array();
											if(count($cats)) {
												foreach($cats as $c){
													$cats_arr[] = $c->slug;
												}
											}
											$cats_str = implode(' ', $cats_arr);
											
											?>
										
										<div class="_czr__tptt__item _azbn_flt-by _azbn_flt-by-city _azbn_flt-by-date _azbn_flt-by-direction <?=$cats_str;?> " data-toggle="modal" data-target="#modal-timetable-<?=$id;?>">
											<div class="_czr__tptt__item-preview">
												<img src="<?=$this->Imgs->postImg($id, '385x220');?>" alt="" >
											</div> 
											<div class="_czr__tptt__item-bheading">
												<div class="_czr__tptt__item-time"><?=get_field('date', $id);?>, <?=get_field('adr', $id);?></div>
												<h3 class="_czr__tptt__item-heading"><?=t($id);?></h3>
											</div>
											<div class="_czr__tptt__item-btn"><button type="button" class="btn-line">подробнее</button></div>
										</div>
										
											<?
										}
										?>
										
									</div>
								</div>	
							</div>
						</div>
						<div class="_czr__tptt__scroll-block">
							<div class="scroll-container horizontal bottom" data-target="#overflow-container-lesson-list" >
								<div class="scroll-line" >
									<div class="scroll ball" ></div>
									<span class="scroll-text">тяните вправо</span>
								</div>
							</div>
						</div>
					</div>-->
					<div class="_czr__tptt__owl">
						
					</div>
					<div class="_azbn_detach-items" style="display:none;" >
						<?

						while ($query->have_posts()) {
							$query->the_post();
							$id = get_the_ID();
							
							$cats = get_the_terms($id, 'lesson_taxonomies');
							$cats_arr = array();
							if(count($cats)) {
								foreach($cats as $c){
									$cats_arr[] = $c->slug;
								}
							}
							$cats_str = implode(' ', $cats_arr);
							
							?>

						<div class="_czr__tptt__item _azbn_flt-by _azbn_flt-by-city _azbn_flt-by-date _azbn_flt-by-direction <?=$cats_str;?> " data-toggle="modal" data-target="#modal-timetable-<?=$id;?>">
							<div class="_czr__tptt__item-preview">
								<img src="<?=$this->Imgs->postImg($id, '385x220');?>" alt="" >
							</div> 
							<div class="_czr__tptt__item-bheading">
								<div class="_czr__tptt__item-time"><?=get_the_date('j M. Y');?>, <?=get_field('adr', $id);?></div>
								<h3 class="_czr__tptt__item-heading"><?=t($id);?></h3>
							</div>
							<div class="_czr__tptt__item-btn"><button type="button" class="btn-line">подробнее</button></div>
						</div>

							<?
						}
						?>
					</div>
			
				</div>
			</div>

		</div>
	</div>
</div>



<?
while ($query->have_posts()) {
	$query->the_post();
	$id = get_the_ID();
?>

<div class="modal fade modal-site _czr__modal-timetable " id="modal-timetable-<?=$id;?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-body _czr__tptt__flex-modal">
				<div class="heading-site-block ">
					<div class="heading-site-inner">
						<h1 class="heading-site "><?=t($id);?></h1>
						<span class="heading-line"></span>
					</div>
				</div>
				<div class="_czr__tptt__content-flex">
					<div class=" _cb__flex _col">
						<div class="_cb__col _czr__tptt__content-left">
							<div class="_czr__tpttm__address"><?=get_field('adr', $id);?></div>
							<div class=" ">
								<?
								$coord = get_field('coord', $id);
								?>
								<img class="img-responsive" src="https://static-maps.yandex.ru/1.x/?ll=<?=$coord['lng'];?>,<?=$coord['lat'];?>&spn=0.016457,0.00619&l=map&size=400,400&pt=<?=$coord['lng'];?>,<?=$coord['lat'];?>,pmrdm" />
								<div class="" >&nbsp;</div>
								<div class="" >&nbsp;</div>
							</div>
							<div class="_czr__tpttm__date"><?=get_the_date('j M. Y');?></div>
							<div  class="_czr__tpttm__time"><?=get_the_date('H:i');?></div>
						</div>
						<div class="_cb__col _czr__tptt__content-right ">
							<?
							//the_content();
							?>
							<div class="_czr__tpcm__scroll">
								<div id="overflow-container-<?=$id;?>" class="scroll-hide" >
									<div class="overflow-container scroll-element">
										<div class="overflowed scroll-overflow overflow-content">
											<? the_content();?>
										</div>
									</div>
								</div>
								<div class="scroll-container vertical right" data-target="#overflow-container-<?=$id;?>" >
									<div class="scroll-line" >
										<div class="scroll ball" ></div>
									</div>
								</div>
							</div>
							<div class="_czr__tpttm__btn">
								<button type="submit" class="btn-line mrg-right-for-btn " id="getModal-<?=$id;?>" data-toggle="modal" data-target="#modal-timetable-reviews-<?=$id;?>">Записаться</button>
								<button type="submit" class="btn-line" id="getModal-model-<?=$id;?>" data-toggle="modal" data-target="#modal-timetable-model-<?=$id;?>">Стать моделью</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="button" class="btn-modal-close _czr__btn-modal-close" data-dismiss="modal"><span>Закрыть</span></button>
		</div>
	</div>
</div>

<div class="modal fade modal-site _czr__modal-timetable-rev " id="modal-timetable-reviews-<?=$id;?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body _czr__tpttr__flex-modal">				
				<div class="heading-site-block">
					<div class="heading-site-inner">
						<h1 class="heading-site"><?=t($id);?></h1>
						<span class="heading-line"></span>
					</div>
				</div>
				<form action="<?=l(54);?>" class="form-reviews" method="POST" >
					<div class="_fr__flex _cb__flex _col">
						<div class="_cb__col _fr__col-left">
							<h3 class="_fr__heading">Заявка на участие</h3>
							<div>Внимание! Все поля обязательны к заполнению!</div>
						</div>
						<div class="_cb__col _fr__col-right">
							<input type="hidden" name="f[Страница заявки]" value="<?=t($this->post['id']);?>" >
							<input type="hidden" name="f[Запись на занятие <?=t($id);?>]" >
							<div><input type="text" class=" validate[required] " name="f[ФИО]" placeholder="ФИО"></div>
							<div><input type="tel" class=" validate[[required],custom[phone]] " name="f[Телефон]" placeholder="Телефон"></div>
							<div><input type="email" class=" validate[[required],custom[email]] " name="f[Email]" placeholder="E-mail"></div>
							<div class="_czr__fr__btn-group">						
								<button type="submit" class="btn-line">
									Отправить
								</button>
								<!--<button type="button" class="link-modal-close" data-dismiss="modal">Отмена</button> -->
								<button type="button" class="link-modal-close" id="modal-timetable-reviews-<?=$id;?>-close" data-dismiss="modal" >Отмена</button> 
							</div>
						</div>
					</div>
				</form>
			</div>
			<button type="button" class="btn-modal-close _czr__btn-modal-close" data-dismiss="modal"><span>Закрыть</span></button>
		</div>
	</div>
</div>

<div class="modal fade modal-site _czr__modal-timetable-rev " id="modal-timetable-model-<?=$id;?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body _czr__tpttr__flex-modal">				
				<div class="heading-site-block">
					<div class="heading-site-inner">
						<h1 class="heading-site"><?=t($id);?></h1>
						<span class="heading-line"></span>
					</div>
				</div>
				<form action="<?=l(54);?>" class="form-reviews" method="POST" >
					<div class="_fr__flex _cb__flex _col">
						<div class="_cb__col _fr__col-left">
							<h3 class="_fr__heading">Запись моделью на занятие</h3>
							<div>Внимание! Все поля обязательны к заполнению!</div>
						</div>
						<div class="_cb__col _fr__col-right">
							<input type="hidden" name="f[Страница заявки]" value="<?=t($this->post['id']);?>" >
							<input type="hidden" name="f[Запись моделью <?=t($id);?>]" >
							<div><input type="text" class=" validate[required] " name="f[ФИО]" placeholder="ФИО"></div>
							<div><input type="tel" class=" validate[[required],custom[phone]] " name="f[Телефон]" placeholder="Телефон"></div>
							<div><input type="text" name="f[Комментарий]" placeholder="Комментарий"></div>
							<div class="_czr__fr__btn-group">						
								<button type="submit" class="btn-line">
									Отправить
								</button>
								<!--<button type="button" class="link-modal-close" data-dismiss="modal">Отмена</button> -->
								<button type="button" class="link-modal-close" id="modal-timetable-model-<?=$id;?>" data-dismiss="modal" >Отмена</button> 
							</div>
						</div>
					</div>
				</form>
			</div>
			<button type="button" class="btn-modal-close _czr__btn-modal-close" data-dismiss="modal"><span>Закрыть</span></button>
		</div>
	</div>
</div>

<?
}
wp_reset_postdata();
?>
<?
/*
<div class="training-page content-block _czr__training-page bg-training _czr__resize ">
	<div class="content-block__inner">
		<div class="_czr__tpt__flex">			
			<div class="heading-site-block">
				<div class="heading-site-inner">
					<h1 class="heading-site">Обучение</h1>
					<span class="heading-line"></span>
				</div>
			</div>
			<div class="container">
				<div class="_czr__tpt__inner">
					<div class="_czr__tpt__note" style="color:#5d93a3;" >
						
						<p>Выберите временной промежуток для поиска занятий</p>
						
						<div class=" _czr__tptt__filter-item">
								<div class="dropdown _azbn_flt-dropdown _azbn_flt-dropdown_scroller " data-flt-by="dates" >
									<a data-toggle="dropdown" href="#">Диапазон дат <span class="_azbn_flt-dropdown-value" ></span></a>
									<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
										
										<li><a href="#" data-flt="" ><span style="color:#a2a2a2;" >Все</span></a></li>
										
										<?
										$flt_arr = get_categories(array(
											'type'					=> 'lesson',
											//'child_of'				=> 0,
											'parent'				=> 10,
											'orderby'				=> 'order',
											'order'					=> 'ASC',
											'hide_empty'			=> 0,
											'hierarchical'			=> 0,
											'exclude'				=> '',
											'include'				=> '',
											'number'				=> 0,
											'taxonomy'				=> 'lesson_taxonomies',
											'pad_counts'			=> false,
										));
										if(count($flt_arr)){
											foreach($flt_arr as $flt) {
										?>
										<li><a href="#" data-flt="<?=$flt->slug;?>" ><span style="color:#a2a2a2;" ><?=$flt->name;?></span></a></li>
										<?
											}
										}
										?>
										
									</ul>
								</div>
							</div>
						
					</div>
					<!--
					<div class="_czr__tpt__btn-scroll">
						<div class="btn-scroll"></div> 
					</div>
					-->
				</div>
			</div>

		</div>
	</div>
	<!--
	<ul class="training__indicators">
		<li class="active"></li>
		<li></li>
		<li></li>
	</ul>
	-->
</div>
*/
?>


<?
$query = new WP_Query(array(
	'post_type' => 'page',
	'post_parent' => 42,
	'orderby' => 'menu_order title',
	'order' => 'ASC',
));
?>
<div class="coach-page content-block _czr__coach-page bg-coach ">
	<div class="content-block__inner">
		<div class="_czr__tpc__flex">			
			<div class="heading-site-block _czr__nip__heading-site-block">
				<div class="heading-site-inner">
					<h2 class="heading-site _czr__nip__heading-site">Преподаватели</h2>
					<span class="heading-line"></span>
				</div>
			</div>
			<div class="container">
				<div class="_czr__tpc__inner">

					<div class="_czr__tpc__scroll">						
						<div id="overflow-container-coact-list" class="scroll-hide" >
							<div class="overflow-container scroll-element">
								<div class="overflowed scroll-overflow">			<div class="_czr__tpc__item-flex">
										
										<?
										
										while ($query->have_posts()) {
											$query->the_post();
											$id = get_the_ID();
											?>
										
										<div class="_czr__tpc__item" data-toggle="modal" data-target="#modal-coach-<?=$id;?>">
											<div class="_czr__tpc__item-preview">
												<img src="<?=$this->Imgs->postImg($id, '480x555');?>" alt="" >
											</div> 
											<div class="_czr__tpc__item-bheading">
												<h3 class="_czr__tpc__item-heading"><?=t($id);?></h3>
											</div>
											<div class="_czr__tpc__item-btn"><button type="button" class="btn-line">подробнее</button></div>
										</div>
										
											<?
										}
										?>
										
									</div>
								</div>	
							</div>
						</div>
						<div class="_czr__tpc__scroll-block" >
							<div class="scroll-container horizontal bottom" data-target="#overflow-container-coact-list" >
								<div class="scroll-line" >
									<div class="scroll ball" ></div>
									<span class="scroll-text">тяните вправо</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?
while ($query->have_posts()) {
	$query->the_post();
	$id = get_the_ID();
?>

<div class="modal fade modal-site _czr__modal-coach " id="modal-coach-<?=$id;?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog _czr__in__modal-dialog">
		<div class="modal-content">
			<div class="modal-body _czr__tpcm__flex">
				<div class="_czr__tpcm__col-left">
					<div><img src="<?=$this->Imgs->postImg($id, '480x555');?>" alt=""	></div>
				</div>
				<div class="_czr__tpcm__col-right">
					<div class="_czr__tpcm__scroll">
						<h4 class="_czr__tpcm__heading"><?=t($id);?></h4>
						<div id="overflow-container-<?=$id;?>" class="scroll-hide" >
							<div class="overflow-container scroll-element">
								<div class="overflowed scroll-overflow overflow-content">							
									<div class="_czr__tpcm__inner">										
										<? the_content();?>
									</div>
								</div>
							</div>
						</div>
						<div class="scroll-container vertical right" data-target="#overflow-container-<?=$id;?>" >
							<div class="scroll-line" >
								<div class="scroll ball" ></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button type="button" class="btn-modal-close _czr__btn-modal-close" data-dismiss="modal"><span>Закрыть</span></button> 
		
		</div>
	</div>
</div>

<?
}

wp_reset_postdata();
?>
<?}?>