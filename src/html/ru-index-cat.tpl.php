<?
$this->tpl('seo-production/'.$this->lng.'-index-nav', array());
?>



<div class="production__page content-block" >	
	<div class="_prodb__container container" id="azbn-is-product-list" >
		<div class="_prodb__prod-block smooth-item ">
			
			<div id="overflow-container" class="_prodb__scroll-container " >
				<div class="_prodb__scroll "  >
					
					<!--
					<div style="text-align:left;margin:1em 0 2em;" >
						<?
						echo get_field('post_prefix', $this->post['id']);
						?>
					</div>
					-->
					
					<div class="_prodb__prod-list is-product-list"   >
						
						<?
						$post_prefix = get_field('post_prefix', $this->post['id']);
						if($post_prefix != '') {
						?>
						<span class="_prodb__item " >
							<span class="_prodb__item-heading">Полезно</span>
							<span class="_prodb__item-note"><?=$post_prefix;?></span>
						</span>
						<?
						}
						?>
						
						<?
						
						$terms = get_field('from_cat', $this->post['id']);
						$slug_arr = array();
						
						if(count($terms)) {
							foreach($terms as $t) {
								$slug_arr[] = $t->slug;
							}
						}
						
						$query = new WP_Query(array(
							'post_type' => 'page',
							//'post_parent' => $id,
							'order' => 'ASC',
							'orderby' => 'menu_order',
							'posts_per_page' => -1,
							'tax_query' => array(array(
								'taxonomy' => 'page-category',
								'field' => 'slug',
								'terms' => $slug_arr,//array('is-product',),
								//operator
								//include_children
							)),
						));
								while ($query->have_posts()) {
									$checker++;
									$query->the_post();
									$id = get_the_ID();
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
								
								<a href="<?=l($id);?>" class="_prodb__item " data-product_id="<?=($id);?>" ><!-- active -->
									<span class="_prodb__item-heading"><?=get_field('ru-title', $id);?></span>
									<span class="_prodb__item-heading-small"><?=get_field('en-title', $id);?></span>
									<span class="_prodb__item-note"><?=get_field('preview', $id);?></span>
								</a>
								
								<?
								}
						wp_reset_postdata();
						?>
						
					</div>
				</div>
				
				<!--
				<div class="scroll-line _blb_scroll-line _prodb__scroll-line">
					<div class="scroll "></div>
				</div>
				-->
			</div>
			
			<!--
			<div class="scroll-container vertical right" data-target="#overflow-container" >
				<div class="scroll-line" >
					<div class="scroll ball" ></div>
				</div>
			</div>
			-->
			
		</div>
		
		<div class="_prodb__contacts smooth-item ">
			<style>
			.cat-description + a {
				margin-bottom:3em;
				text-align:left;
				color:#1c953f;
				text-decoration:underline;
			}
			.cat-description + a:hover {
				text-decoration:none;
			}
			</style>
			<script>
			$(document).ready(function(){
				
				var desc = $('.cat-description');
				desc.readmore({
					speed: 300,
					embedCSS : true,
					moreLink: '<a href="#">Читать далее</a>',
					lessLink: '<a href="#">Закрыть</a>',
				});
				//var text = desc.html();
				//var text_arr = text.split('. ');
				
			});
			</script>
			<div class="cat-description " style="text-align:left;margin:1em auto 1em 0;max-width:960px;" >
				<?
				the_content();
				//var_dump(get_field('from_cat', $this->post['id']));
				?>
			</div>
			<div style="text-align:left;" ><b>Если у Вас возникли вопросы, Вы можете задать их нашим специалистам:</b> <a href="tel:+78005004765">+7 (800) 500-47-65</a> - офис-менеджер; <a href="tel:+79155192779">+7 (915) 519-27-79</a> - тех. специалист</div>
		</div>
		
	</div>
</div>

<?
wp_reset_postdata();