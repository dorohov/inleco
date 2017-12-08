<?

// шаблон

$this->tpl('_/page-loader', array());

$cat = get_queried_object();

?>

<div class="coach-page content-block _czr__coach-page bg-coach as-gallery ">
	<div class="content-block__inner">
		<div class="_czr__tpc__flex">			
			
			
				<div class="heading-site-block _czr__nip__heading-site-block">
					<div class="heading-site-inner">
						<div class="_czr__nip__date"><a href="javascript:history.back();" >&larr; Вернуться назад</a></div>
						<div class="_czr__nip__date"> </div>
						<h1 class="heading-site _czr__nip__heading-site"><?=$cat->name;?></h1>
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
										while (have_posts()) {
											the_post();
											$id = get_the_ID();
										?>
										<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
										<a class="_czr__tpc__item  fancybox" rel="fancybox" href="<?=$this->Imgs->postImg($id);?>" style="min-height:400px; padding-bottom: 30px;" >
											<div class="_czr__tpc__item-preview">
												<img src="<?=$this->Imgs->postImg($id, '480x555');?>" alt="" >
											</div>
											<div class="_czr__tpc__item-btn"><button type="button" class="btn-line">посмотреть</button></div>
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
<? /* ?>
<div class="modal fade modal-site _czr__modal-gallery " id="modal-gal-<?=$cat->term_id;?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="_czr__gpm__modal-close-area" data-dismiss="modal"></div>
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-body">
				<div id="carousel-example-generic-<?=$cat->term_id;?>" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
					<?
					
					while (have_posts()) {
						the_post();
						$id = get_the_ID();
					?>
						<div class="item _azbn_carousel-item" data-photo-id="<?=$id;?>" >
							<img src="<?=$this->Imgs->postImg($id, '1600x980');?>" alt="">
						</div>
					<?
					}
					
					?>
					</div>
					<a class="prev _czr__gpm__control" href="#carousel-example-generic-<?=$cat->term_id;?>" data-slide="prev"></a>
					<a class="next _czr__gpm__control" href="#carousel-example-generic-<?=$cat->term_id;?>" data-slide="next"></a>
				</div>
			</div>
		</div>
	</div>
	<!--<button type="button" class="_czr__gpm__modal-btn-close" data-dismiss="modal"></button>-->
</div>
<?
*/
wp_reset_postdata();