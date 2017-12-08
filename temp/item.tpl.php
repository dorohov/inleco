<?if(is_user_logged_in()) {?>
<?
	$__prefix="content-block__";
	$__mod="is--training-card";
	$__modPanel="is--training-panel-card";

	$id = $this->post['id'];
	$title = t($id);
	$content = c($id);
	$preview = $this->Imgs->postImg($id, '380x440');

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
								<p><img src="<?=$preview;?>" alt="<?=$title;?>"></p>
								<?=$content;?>
							</div>
						</div>
					</div>
				</div>
				<div class="<?=$__prefix;?>cols  is--cols-3  <?=$__mod;?>">
					<h2 class="<?=$__prefix;?>heading-panel">Ближайшие семенары преподавателя</h2>	
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
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?}?>