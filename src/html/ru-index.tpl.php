<?
/*
$query = new WP_Query(array(
	'post_type' => 'page',
	'post_parent' => $this->post['id'],
	'order' => 'ASC',
	'orderby' => 'menu_order',
));
*/
?>
<div class="servises__page content-block">
	<div class="_sb__container container">
		<h1 class="heading-block _sb__heading"><?=t($this->post['id']);?></h1>
		<div class="_sb__flex-block">
			<div class="_sb__col-left smooth-item ">
				<div class="_sb__nav-content dropdown">
  					<a data-toggle="dropdown" class="visible-xs" href="#"><?=t($this->post['id']);?><span class="caret"></span></a>
					<?
					/*
					<ul class="_sb__nav-dropdown" aria-labelledby="dLabel">
						<?
						$i=0;
						while ($query->have_posts()) {
							$query->the_post();
							$id = get_the_ID();
						?>
						<li class="<?if($i == 0) {?> active hidden-xs <?}?>"><a href="#service-<?=$id;?>" style="background-image: url(<?=$this->Imgs->postImg($id, '330x130');?>);" data-decor-img="<?=get_field('decor-img', $id);?>" ><?=t($id);?></a></li> 
						<?
							$i++;
						}
						?>
					</ul>
					*/
					?>
				</div>
				
				<!--
				<div class="_sb__contacts-panel">
					<div><b>По всем вопросам Вы можете обратиться к нашим специалистам</b></div>
					<div><a href="tel:+78005004765">+7 (800) 500-47-65</a> - офис-менеджер</div>
					<div><a href="tel:+79155192779">+7 (915) 519-27-79</a> - тех. специалист</div>	 
				</div>
				-->
				
				<div class="_prodib__btn hidden-xs" style="margin-top:6em;">
					<a href="#history-back" class="btn-slider history-back ">← Вернуться назад</a> 
				</div>
				
			</div>
			<div class="_sb__col-center smooth-item "> 
				
				
				<div class="scroll-container vertical left" data-target="#page-scroll-<?=$this->post['id'];?>" >
					<div class="scroll-line" >
						<div class="scroll ball" ></div>
					</div>
				</div>
				
				
				<div id="page-scroll-<?=$this->post['id'];?>" class="_sb__scroll-container scroll-hide" >
					<div class="_sb__scroll scroll-element"  >
						<div class=" scroll-overflow "  >
							
							<div id="service-<?=$this->post['id'];?>" class="_sb__page-content">
								<? the_content();?>
							</div>
							
							<?
							/*
							$i=0;
							while ($query->have_posts()) {
								$query->the_post();
								$id = get_the_ID();
							?>
							
						<div id="service-<?=$id;?>" class="_sb__page-content">
							<h2 class="_sb__content-heading"><?=t($id);?></h2>
							<?=c($id);?>
						</div>
							
							<?
								$i++;
							}
							*/
							?>
						</div>
					</div>
				</div>
				
			</div>
			
			<?
			$img_right = get_field('decor-img', $this->post['id']);
			if($img_right == '') {
				$img_right = $this->path('img').'/services/services-item1.jpg';
			}
			?>
			
			<div class="_sb__col-right smooth-item " id="post-decor-img" style="background: url(<?=$img_right;?>) no-repeat center"></div>
			
		</div>
	</div>	
</div>
<?
wp_reset_postdata();