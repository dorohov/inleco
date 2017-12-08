<?

// шаблон

$news_arr = array();
$news_col_arr = array();

$query = new WP_Query(array(
	'post_type' => 'post',
	'posts_per_page' => -1,
	'tax_query' => array(array(
		'relation' => 'OR',
		'taxonomy' => 'category',
		'field' => 'slug',
		'terms' => array('aktsii'),
	)),
));

while ($query->have_posts()) {
	$query->the_post();
	$id = get_the_ID();
	//$link = l($id);
	//=get_the_date();
	//=get_field('preview', $id);
	
	$news_arr[] = array(
		'id' => $id,
		'link' => l($id),
		'title' => t($id),
		'preview' => get_field('preview', $id),
		'date' => get_the_date(),
	);
	
}

if(count($news_arr)) {
	$news_col_arr = array_chunk($news_arr, 2);
?>
<div class="news-page content-block _czr__news-page bg-news ">
	<div class="content-block__inner">
		<div class="heading-site-block _czr__nip__heading-site-block">
			<div class="heading-site-inner">
				<h1 class="heading-site _czr__nip__heading-site">Акции</h1>
				<span class="heading-line"></span>
			</div>
		</div>
		<?
		$this->tpl('news/item_list', array(
			'item_list' => $news_col_arr,
		));
		?>
		
	</div>
</div>
<? } else{ ?>
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
$this->tpl('news/modal', array(
	'active_id' => $this->post['id'],
));
