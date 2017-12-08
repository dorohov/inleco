<?

// шаблон

$this->tpl('_/page-loader', array());

$cat_arr = get_categories(array(
	'type'					=> 'photo',
	'child_of'				=> 0,
	//'parent'				=> 2,
	'orderby'				=> 'order',
	'order'					=> 'ASC',
	'hide_empty'			=> 0,
	'hierarchical'			=> 0,
	'exclude'				=> '',
	'include'				=> '',
	'number'				=> 0,
	'taxonomy'				=> 'photo_taxonomies',
	'pad_counts'			=> false,
));

if(count($cat_arr)){
	
$gal_arr = array();

foreach($cat_arr as $cat){
	$i = 0;
	$gal_arr[$cat->term_id] = array(
		'id' => $cat->term_id,
		'title' => $cat->name,
		'img' => '',
		'item_list' => new WP_Query(array(
			'post_type' => 'photo',
			//'post_parent' => $id,
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'posts_per_page' => -1,
			'tax_query' => array(array(
				'taxonomy' => 'photo_taxonomies',
				'field' => 'slug',
				'terms' => array($cat->slug),
				//operator
				//include_children
			)),
		)),
	);
	while($gal_arr[$cat->term_id]['item_list']->have_posts()) {
		$gal_arr[$cat->term_id]['item_list']->the_post();
		$id = get_the_ID();
		if($i == 0) {
			$gal_arr[$cat->term_id]['img'] = $this->Imgs->postImg($id, '480x555');
		}
		$i++;
	}
	
}
?>

<div class="news-page content-block _czr__news-page bg-news ">
	<div class="content-block__inner">
		<div class="heading-site-block _czr__nip__heading-site-block">
			<div class="heading-site-inner">
				<h1 class="heading-site _czr__nip__heading-site">Галерея</h1>
				<span class="heading-line"></span>
			</div>
		</div>
		
		<div class="container">
			<div class="row-flex">
				<?
				if(count($gal_arr)) {
					foreach($gal_arr as $term_id=>$cat){
						
						$link = get_category_link($cat['id']);
						
						?>
						<div class="cols-flex  is--cols-3">
							<article class="_czr__np-item">
								<div class="_czr__np-item__preview">
									<a href="<?=$link;?>">
										<img src="<?=$cat['img'];?>" alt="<?=$cat['title'];?>">
									</a>
								</div>
								<div class="_czr__np-item__hblock">
									<h2 class="_czr__np-item__heading">
										<a href="<?=$link;?>"><?=$cat['title'];?></a>
									</h2>
									<?
									/*
									<div class="_czr__np-item__note">
										<?=$item['preview'];?>
									</div>
									*/
									?>
									<div><a href="<?=$link;?>" class="btn-line">подробнее</a></div>
								</div>
							</article>
						</div>
						<?
					}
				}
				?>
			</div>
		</div>
		
	</div>
</div>


<?
/*
?>

<div class="coach-page content-block _czr__coach-page bg-coach as-gallery ">
	<div class="content-block__inner">
		<div class="_czr__tpc__flex">
			<div class="heading-site-block _czr__nip__heading-site-block">
				<div class="heading-site-inner">
					<h2 class="heading-site _czr__nip__heading-site">Галерея</h2>
					<span class="heading-line"></span>
				</div>
			</div>
			<div class="container">
				<div class="_czr__tpc__inner">
					<div class="_czr__tpc__scroll">
						<div id="overflow-container-coact-list" class="" >
							<div class="">
								<div class="">
									<div class="row">
										<?
										foreach($gal_arr as $term_id=>$cat){
										?>
										<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
										
										<a class="_czr__tpc__item" href="<?=get_category_link($cat['id']);?>" style="min-height:400px;" >
											<div class="_czr__tpc__item-preview">
												<img src="<?=$cat['img'];?>" alt="" >
											</div> 
											<div class="_czr__tpc__item-bheading" style="right:0;max-width:1000px;" >
												<h3 class="_czr__tpc__item-heading"><?=$cat['title'];?></h3>
											</div>
											<div class="_czr__tpc__item-btn"><button type="button" class="btn-line">подробнее</button></div>
										</a>
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
		</div>
	</div>
</div>


<?

foreach($gal_arr as $term_id=>$cat){
?>

<div class="modal fade modal-site _czr__modal-gallery " id="modal-gal-<?=$cat['id'];?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="_czr__gpm__modal-close-area" data-dismiss="modal"></div>
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-body">
				<div id="carousel-example-generic-<?=$cat['id'];?>" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						
						<?
					$i = 0;
					while($cat['item_list']->have_posts()) {
						$cat['item_list']->the_post();
						$id = get_the_ID();
					
					
					?>
						<div class="item <?if($i == 0){echo 'active';}?> ">
							<img src="<?=$this->Imgs->postImg($id, '1600x980');?>" alt="">
						</div>
					<?
					$i++;
					}
						
						?>
						
					</div>
					<a class="prev _czr__gpm__control" href="#carousel-example-generic-<?=$cat['id'];?>" data-slide="prev"></a>
					<a class="next _czr__gpm__control" href="#carousel-example-generic-<?=$cat['id'];?>" data-slide="next"></a>
				</div>
			</div>
		</div>
	</div>
	<!--<button type="button" class="_czr__gpm__modal-btn-close" data-dismiss="modal"></button>-->
</div>
<?
}
*/
}else{
?>
<div class="404-page content-block _czr__404-page bg-404 ">
	<div class="content-block__inner">
		<div class="_czr__404p__flex">
			<div class="heading-site-block">
				<div class="heading-site-inner">
					<h1 class="heading-site">Раздел в&nbsp;разработке</h1>
					<span class="heading-line"></span>
				</div>
			</div>
			<div class="container">
				<div class="_czr__404p__inner">
					<div class="_czr__404p__note">К&nbsp;сожалению, текущий раздел находится в&nbsp;разработке. Приносим свои извинения!</div>
					<div><a href="/" class="btn-line">На&nbsp;главную</a></div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?
}

wp_reset_postdata();