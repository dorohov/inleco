<?

$query = new WP_Query(array(
	'post_type' => 'page',
	'post_parent' => 15,

	'orderby' => 'menu_order title',
	'order'   => 'ASC',
	));

?>
	
	<div class="fluid-block offer-block offer-list" >
		<div class="adaptive-block margin-center grid grid-12 flex " >
			<div class="grid-row" >
				
				<?
				while ($query->have_posts()) {
					$query->the_post( );
					$id = get_the_ID();
					$img_sm = $this->Imgs->postImg($id, 'information-item-sm');
				?>
				
				<div class="clmn-6 clmn-xs-12 clmn-sm-12 clmn-md-6 clmn-lg-6 offer-item f-box " >
					<div class="image" >
						<a href="<?=l($id);?>" >
							<img class="img resp" src="<?=$img_sm;?>" />
						</a>
					</div>
					<div class="title" ><a href="<?=l($id);?>" ><? the_title();?></a></div>
					<div class="short sandbox placement" >
						<? the_field('short', $id);?>
					</div>
					<div class="more" >
						<a href="<?=l($id);?>" class="hover-color " >Подробнее</a>
					</div>
				</div>
				
				<?
				
				}
				?>
				
				<div class="clear" ></div>
				
			</div>
		</div>
	</div>
	
<?
wp_reset_postdata();
?>