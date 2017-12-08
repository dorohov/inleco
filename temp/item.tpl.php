<?if(is_user_logged_in()) {?>
<?
	$__prefix="content-block__";
	$__mod="is--training-card";
	$__modPanel="is--training-panel-card";

	$idp = $this->post['id'];
	$title = t($idp);
	$content = c($idp);
	$adr = get_field('adr', $idp);
	$date_str = get_field('date', $idp);
	$date_arr = array(
		substr($date_str, 0, 4),
		substr($date_str, 4, 2),
		substr($date_str, 6, 2),
	);
	$date_human = date_i18n('d F Y', strtotime("{$date_arr[2]}/{$date_arr[1]}/{$date_arr[0]}"));
	$teacher_id = get_field('teacher', $idp);
	$time = get_field('time', $idp);
	$teacher_id = $teacher_id[0];


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
			<div class="<?=$__prefix;?>row  is--wrap  is--gutter  is--nopad  <?=$__mod;?>">			
				<div class="<?=$__prefix;?>cols  is--cols-9  <?=$__mod;?>">			
					<div class="<?=$__prefix;?>heading-block">
						<div class="<?=$__prefix;?>heading-cols">
							<div class="<?=$__prefix;?>back"><a href="javascript:history.back();">← Вернуться назад</a></div>
							<h1 class="<?=$__prefix;?>heading"><?=$title;?></h1>
							<span class="<?=$__prefix;?>heading-line"></span>
						</div>
					</div>	
					<div class="<?=$__prefix;?>container">
						<div class="<?=$__prefix;?>elem">
							<div class="<?=$__prefix;?>text">
								<p><b>Преподаватель:</b> <a href="<?=l($teacher_id);?>" ><?=t($teacher_id);?></a></p>
								<p><b>Место проведения:</b> <?=$adr;?></p>
								<p><b>Дата проведения:</b> <time datetime="<?=implode('-', $date_arr);?>"><?=$date_human;?></time></p>
								<p><b>Время проведения:</b> <?=$time;?></p>
								<?=$content;?> 
							</div>
						</div>
						<div class="<?=$__prefix;?>elem">
							<div class="<?=$__prefix;?>row  is--wrap  is--gutter">
								<div class="<?=$__prefix;?>cols">
									<button type="submit" class="btn-line mrg-right-for-btn " id="getModal-<?=$idp;?>" data-toggle="modal" data-target="#modal-timetable-reviews-<?=$idp;?>">Записаться</button>
								</div>
								<div class="<?=$__prefix;?>cols">
									<button type="submit" class="btn-line" id="getModal-model-<?=$idp;?>" data-toggle="modal" data-target="#modal-timetable-model-<?=$idp;?>">Стать моделью</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="<?=$__prefix;?>cols  is--cols-3  <?=$__mod;?>">
					<h2 class="<?=$__prefix;?>heading-panel">Ближайшие семенары</h2>	
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
									$teacher_id = get_field('teacher', $id);
									$teacher_id = $teacher_id[0];
							?>
								<div class="<?=$__prefix;?>cols  is--cols-12  <?=$__modPanel;?>">
									<article class="card-item__card  is--training">
										<a href="<?=$link;?>" class="card-item__preview  is--training">
											<img src="<?=$preview;?>" alt="<?=$title;?>">
										</a>
										<time datetime="<?=$date_iso;?>" class="card-item__date  is--training"><?=$date;?></time>
										<h4 class="card-item__heading  is--training"><a href="<?=$link;?>"><?=$title;?></a></h4>
										<div class="card-item__coach  is--training"><span>Преподаватель:</span> <?=t($teacher_id);?></div>
									</article>	
								</div>
							<?
								}
								wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modal-site _czr__modal-timetable-rev " id="modal-timetable-reviews-<?=$idp;?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body _czr__tpttr__flex-modal">				
				<div class="heading-site-block">
					<div class="heading-site-inner">
						<h1 class="heading-site"><?=t($idp);?></h1>
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
							<input type="hidden" name="f[Запись на занятие <?=t($idp);?>]" >
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

<div class="modal fade modal-site _czr__modal-timetable-rev " id="modal-timetable-model-<?=$idp;?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body _czr__tpttr__flex-modal">				
				<div class="heading-site-block">
					<div class="heading-site-inner">
						<h1 class="heading-site"><?=t($idp);?></h1>
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
							<input type="hidden" name="f[Запись моделью <?=t($idp);?>]" >
							<div><input type="text" class=" validate[required] " name="f[ФИО]" placeholder="ФИО"></div>
							<div><input type="tel" class=" validate[[required],custom[phone]] " name="f[Телефон]" placeholder="Телефон"></div>
							<div><input type="text" name="f[Комментарий]" placeholder="Комментарий"></div>
							<div class="_czr__fr__btn-group">						
								<button type="submit" class="btn-line">
									Отправить
								</button>
								<!--<button type="button" class="link-modal-close" data-dismiss="modal">Отмена</button> -->
								<button type="button" class="link-modal-close" id="modal-timetable-model-<?=$idp;?>" data-dismiss="modal" >Отмена</button> 
							</div>
						</div>
					</div>
				</form>
			</div>
			<button type="button" class="btn-modal-close _czr__btn-modal-close" data-dismiss="modal"><span>Закрыть</span></button>
		</div>
	</div>
</div>
<?}?>