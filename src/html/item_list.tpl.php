<?

// шаблон

$i = 0;

while (have_posts()) {
	the_post();
	$id = get_the_ID();
?>

<div class="skw-page skw-page-1 <?if($i == 0){echo 'active';}?> ">
	
	<div class="skw-page__half skw-page__half--left">
		<div class="skw-page__skewed">
			<div class="skw-page__content">
				<div class="skw-page__content-inner">
					<img src="<?=$this->Imgs->postImg($id, '736x850');?>" alt="" >
				</div>
			</div>
		</div>
	</div>
	
	<div class="skw-page__half skw-page__half--right">
		<div class="skw-page__skewed">
			<div class="skw-page__content">
				<div class="heading-site-block skw-page__heading-block">
					<div class="heading-site-inner">
						<h2 class="heading-site skw-page__heading"><? the_title();?></h2>
						<span class="heading-line"></span>
					</div>
				</div>
				<div class="skw-page__description">
					<div><?=get_field('preview', $id);?></div> 
					<div class="_cb__flex _col _czr__ip-param skw-page__param">
						
						
						<?
						$weight = get_field('weight', $id);
						if($weight != '') {
						?>
						<div class="_cb__col _czr__ip-param-dia"><span><img src="<?=$this->path('img');?>/index/icon-dia.png" alt=""></span> <?=$weight;?></div>
						<?
						}
						?>
						
						
						<?
						$size = get_field('size', $id);
						if($size != '') {
						?>
						<div class="_cb__col _czr__ip-param-ruler"><?=$size;?></div>
						<?
						}
						?>
						
						
					</div>
					<div>
						<a href="<?=l($id);?>" class="btn-line">подробнее</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<?
	$i++;
}



?>

<ul class="skw-page__indicators">
<?
$i = 0;
while (have_posts()) {
	the_post();
	?>
	
	<li class=" <?if($i == 0){echo 'active';}?> "></li>
	
	<?
	$i++;
}
?>
</ul>

<button type="button" class="skw-page__control prev"></button>
<button type="button" class="skw-page__control next"></button>