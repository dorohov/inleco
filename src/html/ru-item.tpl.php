<?
//the_post();
//$id = get_the_ID();
//$img_sm = $this->Imgs->postImg($id, '865x570');
?>

<div class="servises__page content-block">
	<div class="_sb__container container">
		<h1 class="heading-block _sb__heading"><?=t($this->post['id']);?></h1>
		<div class="_sb__flex-block">
			<div class="_sb__col-left smooth-item ">
				
				
				<div class="">
					
  					<div class="_prodib__item-preview">
						<?
						$img_sm = $this->Imgs->postImg($this->post['id'], '225x150');
						if($img_sm != '') {
						?>
						<img src="<?=$this->Imgs->postImg($this->post['id'], '225x150');?>" alt="<?=t($this->post['id']);?>">
						<?
						}
						?>
					</div>
					
					<?
					$maker = get_field('maker', $this->post['id']);
					if($maker != '') {
					?>
					<div><b>Производитель</b> <?=$maker;?></div>
					
					<div class="" style="margin:2em 0;"  >
						<?
						if($maker == 'РегионКорма') {
						?>
						<img class="img-responsive" src="<?=$this->path('img');?>/partner/maker/_rk.png" />
						<?
						} else {
						?>
						<img class="img-responsive" src="<?=$this->path('img');?>/partner/maker/<?=$maker;?>.png" />
						<?
						}
						?>
					</div>
					
					<?
					}
					?>
				</div>
				
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
							
							
							<? the_content();?>
							
							
						</div>
					</div>
				</div>
				
			</div>
			
			
			<?
			$decorimg = get_field('decor-img', $this->post['id']);
			if($decorimg != '') {
			?>
			<div class="_sb__col-right smooth-item " id="post-decor-img" style="background: url(<?=$decorimg;?>) no-repeat center"></div>
			<?
			} else {
			?>
			<div class="_sb__col-right smooth-item " id="post-decor-img" style="background: url(<?=$this->path('img');?>/index/prod-item-big-img1.jpg) no-repeat center"></div>
			<?
			}
			?>
			
		</div>
	</div>	
</div>


<?
/*
<div class="production-item__page content-block">
	<div class="_sb__container container">
		<div class="_prodib__flex-block"> 
			<div class="_prodib__col-left">
				<div class="">
					
  					<div class="_prodib__item-preview">
						<?
						$img_sm = $this->Imgs->postImg($this->post['id'], '225x150');
						if($img_sm != '') {
						?>
						<img src="<?=$this->Imgs->postImg($this->post['id'], '225x150');?>" alt="<?=t($this->post['id']);?>">
						<?
						}
						?>
					</div>
					
					<?
					$maker = get_field('maker', $this->post['id']);
					if($maker != '') {
					?>
					<div><b>Производитель</b> <?=$maker;?></div>
					<?
					}
					?>
				</div>
				
				<div class="_prodib__btn hidden-xs">
					<a href="#history-back" class="btn-slider history-back ">вернуться назад</a> 
				</div>
			</div>
			
			<div class="_prodib__col-center"> 
				
				<div class="scroll-container vertical left" data-target="#page-scroll-<?=$this->post['id'];?>" >
					<div class="scroll-line" >
						<div class="scroll ball" ></div>
					</div>
				</div>
				
				<div id="page-scroll-<?=$this->post['id'];?>" class="_sb__scroll-container scroll-hide" >
					<div class="_sb__scroll scroll-element"  >
						<div class=" scroll-overflow "  >
							
							<h1 class="heading-block _prodib__heading"><?=get_field('ru-title', $this->post['id']);?></h1>
							<div class="_prodib__heading-small"><?=get_field('en-title', $this->post['id']);?></div>
							
							<? the_content();?>
							
							<div class="_prodib__btn visible-xs">
								<a href="#history-back" class="btn-slider history-back ">вернуться назад</a> 
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
			<?
			$decorimg = get_field('decor-img', $this->post['id']);
			if($decorimg != '') {
			?>
			<div class="_prodib__col-right" style="background: url(<?=$decorimg;?>) no-repeat center"></div>
			<?
			} else {
			?>
			<div class="_prodib__col-right" style="background: url(<?=$this->path('img');?>/index/prod-item-big-img1.jpg) no-repeat center"></div>
			<?
			}
			?>
		</div>
	</div>
</div>

*/
?>