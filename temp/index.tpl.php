<?
	$__prefix="content-block__";
	$__mod="is--video";
	$__modPanel="is--video-panel";

	$idp = $this->post['id'];
	$title = t($idp);
	$content = c($idp);

	$this->tpl('_/page-loader', array());

	$videos = new WP_Query(array(
		'post_type' => 'video',
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'posts_per_page' => -1,
	));
?>
<div class="<?=$__prefix;?>panel">
	<div class="<?=$__prefix;?>inner  is--bg">
		<div class="<?=$__prefix;?>elem">
			<div class="<?=$__prefix;?>heading-block">
				<div class="<?=$__prefix;?>heading-cols">
					<h1 class="<?=$__prefix;?>heading"><?=$title;?></h1>
					<span class="<?=$__prefix;?>heading-line"></span>
				</div>
			</div>	
			<div class="<?=$__prefix;?>container">
				<div class="<?=$__prefix;?>elem">
					<div class="card-block__panel">
						<div class="<?=$__prefix;?>row  is--wrap  is--gutter  <?=$__modPanel;?>">
							<?
								while ($videos->have_posts()) {
									$videos->the_post();
									$id = get_the_ID();									
									$link = l($id);	
									$title = t($id);							
									$url = get_field('url', $id);
									$url_arr = explode('/', $url);
						
							?>
							<div class="<?=$__prefix;?>cols  is--cols-3  <?=$__modPanel;?>">
								<article class="card-item__card  <?=$__mod;?>">
									<a href="<?=$url;?>" class="card-item__preview  <?=$__mod;?>  fancybox fancybox.iframe video-fb-btn">
										<img src="https://img.youtube.com/vi/<?=$url_arr[4];?>/hqdefault.jpg" alt="<?=$title;?>">
									</a>
									<h4 class="card-item__heading  <?=$__mod;?>"><a href="<?=$url;?>" class="fancybox fancybox.iframe video-fb-btn"><?=$title;?></a></h4>
									<div class="card-item__btn"><a href="<?=$url;?>" class="btn-line  <?=$__mod;?>  fancybox fancybox.iframe video-fb-btn ">Смотреть</a></div>
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