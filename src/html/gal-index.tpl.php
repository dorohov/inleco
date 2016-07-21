<?

$defaultgals = get_field('default-gal', 5);

$g_arr = array();

//var_dump($defaultgals);
if(count($defaultgals)) {
	foreach($defaultgals as $g) {
		
		
		$g_parent = get_ancestors($g->term_id, 'azbnphoto_taxonomies');
		//var_dump($street_cat);
		$g_parent =$g_parent[0];
		
		$g_arr[$g_parent] = new WP_Query(array(
			'post_type' => 'azbnphoto',
			//'post_parent' => $id,
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'posts_per_page' => -1,
			'tax_query' => array(array(
				'taxonomy' => 'azbnphoto_taxonomies',
				'field' => 'slug',
				'terms' => array($g->slug),//array($cat->slug),//array('is-product',),
				//operator
				//include_children
			)),
		));
		
	}
}



$cat = get_queried_object();
//var_dump($cat);

if($cat->post_type == 'page') {
	
	$as_page = true;
	
	$query = new WP_Query(array(
		'post_type' => 'azbnphoto',
		//'post_parent' => $id,
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'posts_per_page' => -1,
		'tax_query' => array(array(
			'taxonomy' => 'azbnphoto_taxonomies',
			'field' => 'slug',
			'terms' => array('iyun_16_3', 'oktyabr_2015_5'),//array('is-product',),
			//operator
			//include_children
		)),
	));
	
	?>
	<script>
		$(document).ready(function(){
			
			$('.b-photogallery .street-filters a').eq(0).trigger('click');
			//$('.b-photogallery .date-filters').hide();
			//$('.b-photogallery .date-filters[data-flt="<?=$street_cat;?>"]').show();
			//$('.b-photogallery .b-photo-list[data-flt=""]');
			
		});
	</script>
	<?
	
} else {
	
	$as_page = false;
	$street_cat = get_ancestors($cat->term_id, 'azbnphoto_taxonomies');
	//var_dump($street_cat);
	$street_cat = $street_cat[0];
	
	
	$query = new WP_Query(array(
		'post_type' => 'azbnphoto',
		//'post_parent' => $id,
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'posts_per_page' => -1,
		'tax_query' => array(array(
			'taxonomy' => 'azbnphoto_taxonomies',
			'field' => 'slug',
			'terms' => array($cat->slug),//array('is-product',),
			//operator
			//include_children
		)),
	));
	
	
	?>
	<script>
		$(document).ready(function(){
			
			//$('.b-photogallery .street-filters a[data-flt="<?=$street_cat;?>"]').trigger('click');
			$('.b-photogallery .b-photo-list').hide();
			$('.b-photogallery .b-photo-list[data-flt="<?=$cat->term_id;?>"]').show();
			
			$('.b-photogallery .date-filters').hide();
			$('.b-photogallery .date-filters[data-flt="<?=$street_cat;?>"]').show();
			
			$(document.body).on('site.page-content-cont.b-photogallery.date-filters.restruct');
			
		});
	</script>
	<?
}

$adr_cat_arr = get_categories(array(
	'type'					=> 'azbnphoto',
	//'child_of'				=> 0,
	'parent'				=> 0,
	'orderby'				=> 'order',
	'order'					=> 'ASC',
	'hide_empty'			=> 0,
	'hierarchical'			=> 1,
	'exclude'				=> '',
	'include'				=> '',
	'number'				=> 0,
	'taxonomy'				=> 'azbnphoto_taxonomies',
	'pad_counts'			=> false,
));


/*
if($adr_cat_arr){
	foreach($adr_cat_arr as $adr_cat ){
		
		$adr_link = get_category_link($adr_cat->term_id);
		
		echo '<div>';
		
		echo '<h4><a href="'.$adr_link.'" >'.$adr_cat->name.'</a></h4>';
		
		$month_cat_arr = get_categories(array(
			'type'					=> 'azbnphoto',
			//'child_of'				=> 0,
			'parent'				=> $adr_cat->term_id,
			'orderby'				=> 'menu_order',
			'order'					=> 'DESC',
			'hide_empty'			=> 1,
			'hierarchical'			=> 1,
			'exclude'				=> '',
			'include'				=> '',
			'number'				=> 0,
			'taxonomy'				=> 'azbnphoto_taxonomies',
			'pad_counts'			=> false,
		));
		
		if($month_cat_arr){
			foreach($month_cat_arr as $month_cat ){
				
				$month_link = get_category_link($month_cat->term_id);
				
				echo '<p><a href="'.$month_link.'" >'.$month_cat->name.'</a></p>';
				
			}
		}
		
		echo '</div>';
		
	}
}
*/

?>


<div id="default-url-history-container" class="page-content-cont gallery-page " data-state="active" data-page-id="<?=$this->post['id'];?>" >

	<a class="logotip" href="<?=l(1);?>">
		<img src="<?php echo $this->path('img');?>/default/logotip-175.jpg" alt="" class="img-responsive">
	</a>

	<a class="close-it" href="#close-it" ></a>
	
	<div class="bear" ></div>
	
	<a href="tel:+<?=phone(get_field('phone', 5483));?>" class="office-cont" >
		<div class="title" >Офис продаж</div>
		<div class="phone" ><?=get_field('phone', 5483);?></div>
	</a>
	
	<div class="content-cont top" ></div>

	<div class="content-cont left" ></div>

	<div class="content-cont right right-bg p-bottom-170" data-right-bg="default-gallery"  data-state="passive" >
		
		<div class="cont-header " >
			<div class="content-header _galp__content-header p-main-left p-header-top" >
				<h1>Фотогалерея</h1>
			</div>
		</div>
		
		
		
		
		
		
		<div class="content-margin b-photogallery p-main-left" >
		<?
		
		if(count($adr_cat_arr)){
			
			?>
			
			<div class="street-filters" >
				
				<?
				foreach($adr_cat_arr as $adr_cat ){
					//$adr_link = get_category_link($adr_cat->term_id);
					?>
					
					<a href="#street-<?=$adr_cat->term_id;?>" class="bttn <? if($street_cat == $adr_cat->term_id) {echo 'active';} ?> " data-flt="<?=$adr_cat->term_id;?>" ><?=$adr_cat->name;?></a>
					
					<?
				}
				?>
				
			</div>
			
			<?
			
			
			foreach($adr_cat_arr as $adr_cat ){
				
				$month_cat_arr = get_categories(array(
					'type'					=> 'azbnphoto',
					//'child_of'				=> 0,
					'parent'				=> $adr_cat->term_id,
					'orderby'				=> 'order',
					'order'					=> 'ASC',
					'hide_empty'			=> 1,
					'hierarchical'			=> 1,
					'exclude'				=> '',
					'include'				=> '',
					'number'				=> 0,
					'taxonomy'				=> 'azbnphoto_taxonomies',
					'pad_counts'			=> false,
				));
				
				if(count($month_cat_arr)){
					
					?>
					
					<div class="date-filters content-margin p-right-65 " data-flt="<?=$adr_cat->term_id;?>" >
					
					<?
					
					foreach($month_cat_arr as $month_cat ){
						
						$month_link = get_category_link($month_cat->term_id);
						
						//echo '<p><a href="'.$month_link.'" >'.$month_cat->name.'</a></p>';
						//var_dump($month_cat);
						
						?>
						
						<a href="<?=$month_link;?>" class="bttn url-history gal-bttn <?if($cat->term_id == $month_cat->term_id){echo 'active';}?> " ><?=$month_cat->name;?></a>
						
						<?
						
					}
					?>
						
						<a href="#archive-<?=$adr_cat->term_id;?>" class="bttn archive archive-bttn" >Архив фотографий</a>
					
					</div>
					
					<?
				}
				
			}
			
			
		}
		
		?>
			
			
		</div>
		
		
		
		
		
		
		
		
		<div class="content-scroll _galp__content-scroll" data-resize-height="50" >
			
			<div id="overflow-container" class="scroll-hide" >
				<div class="overflow-container scroll-element" >
					<div class="overflowed scroll-overflow  " >
						
						
						<div class="content-margin p-main-left  _galp__content-margin " >
							
							
							<div class="content-margin b-photogallery " >
									
								<div class="b-photo-list " data-flt="<?=intval($cat->term_id);?>" >
									<div class="_galp__flex" >
										
										<?
										
										while ($query->have_posts()) {
											$query->the_post();
											$id = get_the_ID();
											
												?>
										
										<div class="_galp__col">
											
											<a href="<?=$this->Imgs->postImg($id, 'full');?>" class="fancybox-buttons photo-item" data-fancybox-group="gallery-<?=$cat->slug;?>" style="background-image:url(<?=$this->Imgs->postImg($id, '409x305');?>);" ></a>
											
										</div>
										
												
												<?
										}
										wp_reset_postdata();
										
										?>
										
										
										<div class="clear" ></div>
									
									</div>
								</div>
								
								<?
								if(count($g_arr)) {
									foreach($g_arr as $g_id => $g_query) {
								?>
								
								<div class="b-photo-list " data-flt="<?=intval($g_id);?>" >
									<div class="_galp__flex" >
										
										<?
										
										while ($g_query->have_posts()) {
											$g_query->the_post();
											$id = get_the_ID();
											
											/*
											$terms = array();
											$term_arr = get_the_terms($id, 'azbndoc_taxonomies');
											if(count($term_arr)) {
												foreach($term_arr as $t) {
													$terms[] = $t->slug;
												}
											}
											*/
											
													//$img_sm = $this->Imgs->postImg($id, 'information-item-sm');
													/*
													$cats = get_the_terms($id, 'page-category');
													$cats_arr = array();
													if(count($cats)) {
														foreach($cats as $c){
															//var_dump($c);
															$cats_arr[] = $c->slug;
														}
													}
													$cats_str = implode(' ', $cats_arr);
													*/
												?>
										
										<div class="_galp__col">
											
											<a href="<?=$this->Imgs->postImg($id, 'full');?>" class="fancybox-buttons photo-item" data-fancybox-group="gallery-<?=$cat->slug;?>" style="background-image:url(<?=$this->Imgs->postImg($id, '409x305');?>);" ></a>
											
										</div>
										
												
												<?
										}
										wp_reset_postdata();
										
										?>
										
										
										<div class="clear" ></div>
									
									</div>
								</div>
								
								<?
									}
								}
								?>
								
							</div>
							
							
						</div>
						
						
					</div>
				</div>
			</div>
			
			<div class="scroll-container vertical right" data-target="#overflow-container" >
				<div class="scroll-line " >
					<div class="scroll ball" ></div>
				</div>
			</div>
			
			
		</div>
		
		
		
		
		
		
		
	</div>
</div>