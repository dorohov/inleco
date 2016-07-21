<?

// шаблон

?>

<div class="modal fade modal-site _czr__modal-news _czr__modal-products " id="modal-products" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog _czr__in__modal-dialog">
		<div class="modal-content">
			<div class="modal-body _czr__in__flex">
				<div class="_czr__ppm__col-left">
					<ul class="_czr__in__modal-nav _in__nav-link _czr__anim-list">
						
						<?
						$cat_arr = get_categories(array(
							'type'					=> 'product',
							//'child_of'				=> 0,
							'parent'				=> 4,
							'orderby'				=> 'order',
							'order'					=> 'ASC',
							'hide_empty'			=> 0,
							'hierarchical'			=> 0,
							'exclude'				=> '',
							'include'				=> '',
							'number'				=> 0,
							'taxonomy'				=> 'product_taxonomies',
							'pad_counts'			=> false,
						));
						
						if(count($cat_arr)){
							foreach($cat_arr as $cat){
								
								$link = get_category_link($cat->term_id);
							?>
							<li><a href="<?=$link;?>" class="anim"><?=$cat->name;?></a></li>
							<?
							}
						}
						
						?>
						
					</ul>
				</div>
				<div class="_czr__ppm__col-right">
					<div class="_czr__ppm__scroll">
						<div class="_in__nav-arh-name">Производители</div>
						<div id="overflow-container" class="scroll-hide" >
							<div class="overflow-container scroll-element">
								<div class="overflowed scroll-overflow">
									<div class="_czr__manuf-list">
										
										<?
										$cat_arr = get_categories(array(
											'type'					=> 'product',
											//'child_of'				=> 0,
											'parent'				=> 3,
											'orderby'				=> 'order',
											'order'					=> 'ASC',
											'hide_empty'			=> 0,
											'hierarchical'			=> 0,
											'exclude'				=> '',
											'include'				=> '',
											'number'				=> 0,
											'taxonomy'				=> 'product_taxonomies',
											'pad_counts'			=> false,
										));
										
										if(count($cat_arr)){
											foreach($cat_arr as $cat){
												
												$link = get_category_link($cat->term_id);
												$logotip = get_field('logotip', $cat);
											?>
										
										<div class="_czr__manuf-item">
											<a href="<?=$link;?>"><img src="<?=$logotip;?>" alt="<?=addslashes($cat->name);?>"></a>
										</div>
										
											<?
											}
										}
										
										?>
										
									</div>
								</div>
							</div>
						</div>
						<div class="scroll-container vertical right" data-target="#overflow-container" >
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
