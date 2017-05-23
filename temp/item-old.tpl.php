<?
// шаблон
$this->tpl('_/page-loader', array());
$id = $this->post['id'];
$products_tpl = get_field('products-tpl', $id);
?>
<?if(is_user_logged_in()) {?>
	<div class="products-item-adv">
		<div class="container _pia__container">
			<? if ($products_tpl != 'filler'){echo '<div class="_pia__mezoniti">';}?>
						
				<div class="_pia__history-back"><a href="javascript:history.back();">← Вернуться назад</a></div>
				<h1 class="_pia__heading"><? the_title();?></h1>
				<? if ($products_tpl == 'filler'){?>
					<div class="_pia__note fillery-note">
						<? the_content(); ?>
					</div>
				<?} else { ?>
					<div class="_pia__note mezoniti-note">
						<?=get_field('preview', $id);?>
						<? //the_content(); ?>
					</div>
				<?}?>
				<?if ($products_tpl == 'mezoniti'){
					$dsizes = get_field('azbn_product_dsizes', $id);
					if($dsizes != '') {?>
					<div class="_pia__mezoniti-row">
					<?
						$dsizes = @json_decode($dsizes, true);
						if(is_array($dsizes)) {
							if(count($dsizes)) {
								foreach($dsizes as $ds) {
									?>
									<div class="_pia__mezoniti-cols">
										<?if ($ds['title'] !=""){?>
										<div class="_pia__mezoniti-heading"><?=$ds['title'];?></div>
										<?}?>
										<?if ($ds['img'] !=""){?>
										<div class="_pia__mezoniti-preview">
											<img src="<?=$ds['img'];?>" class="mezoniti_type_img" alt="">
										</div>
										<?}?>
										<?=$ds['html'];?>
									</div>									
									<?
								}
							}
						}?>
					</div>
				<? }
				} ?> 
			<? if ($products_tpl != 'filler'){echo '</div>';}?>
		</div>
		<? if ($products_tpl == "filler"){?>
		<div class="_pia__bg fillery-bg" style="background-image: url(<?=$this->path('img');?>/products/bg-filler-adv.png)"></div>
		<?}else{?>
			<?if(get_field('productpage-img', $id)){?>
			<div class="_pia__bg mezoniti-bg" style="background-image: url(<?=get_field('productpage-img', $id);?>)"></div>
			<?}?>
		<?}?>
		<?if(get_field('logotip-img', $id)){?>
		<div class="_pia__logo " style="background-image: url(<?=get_field('logotip-img', $id);?>)"></div>
		<?}?>
	</div>
	<? if($products_tpl == "filler"){?>
		<?if(get_field('advantage', $id)){?>
		<div class="products-item-content">
			<div class="container _pic__container">
				<?=get_field('advantage', $id);?>
			</div>
		</div>
		<?}?>
	<?} else {?>
		<?if(get_field('advantage', $id)){?>
		<div class="products-item-advantage _czr__products-item-advantage">
			<div class="container">
				<div id="pipa-carousel-advantage" class="carousel _czr__pipa__carousel slide carousel-fade" data-ride="carousel">
					<div class="carousel-inner"> 
				    	<div class="item">
				    		<div class="_czr__pipa__flex _cb__flex">
					    		<?=(get_field('advantage', $id));?>
					    	</div>
					    </div>
				    </div>
				</div>
			</div>
		</div>
		<?}?>
	<?}?>
	<div class="products-item-contacts _czr__products-item-contacts ">
		<div class="container">
			<h3 class="_czr__pipc__heading">Информация о покупке препарата</h3>
			<div class="_czr__pipc__content">
				<div class="_cb__flex _col _czr__pipc__flex">
					<div class="_cb__col _czr__pipc__address">
						<div>
							<div><a href="tel:+<?=phone(get_field('phone', 10));?>" class="icon icon-phone"><?=get_field('phone', 10);?></a></div>
							<div><a href="mailto:<?=get_field('email', 10);?>" class="icon icon-mail"><span><?=get_field('email', 10);?></span></a></div>
						</div>
					</div>
					<div class="_cb__col _czr__pipc__reviews">
						<form action="<?=l(54);?>" method="POST" >
							<input type="hidden" name="f[Страница заявки]" value="<?=t($this->post['id']);?>" >
							<input type="hidden" name="f[Информация о продукте]" value="<? the_title();?>" >
							<div class="_czr__pipc__reviews-note">Оставьте свой e-mail, и мы вышлем на него актуальные цены на этот и другие продукты компании</div>
							<div><input type="email" class=" validate[[required],custom[email]] "  name="f[Email]" placeholder="Введите e-mail"></div>
							<div><button type="submit" class="btn-line">Отправить</button></div>
						</form>
					</div>
				</div>
			</div> 
		</div>
	</div> 
<?} else {?>
<div class="products-item-slider _czr__products-item-slider">
	<div id="pips-carousel-note" class="carousel _czr__pips__carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
	    	<div class="item active slide1">
	    		<div class="_czr__pips__flex _cb__flex">
	    			<div class="_czr__pips__note-block">
    					<div class="_czr__pips__heading">
							<div class="_czr__pips__history-back"><a href="javascript:history.back();" >&larr; Вернуться назад</a></div>
    						<h1 class="_czr__ip-note-heading"><? the_title();?></h1>
    					</div>
						<? the_content(); ?>
	    			</div>
	    			<div class="_czr__pips__preview">
	    				<?if(get_field('productpage-img', $id)){?><img src="<?=get_field('productpage-img', $id);?>" alt=""><?}?>
	    			</div>
	    		</div> 
	    	</div>
	    	<div class="item slide2">
	    		<div class="_czr__pips__flex _cb__flex">
	    			<div class="_czr__pips__note-block">
						<div class="_czr__pips__heading">
							<div class="_czr__pips__history-back"><a href="javascript:history.back();" >&larr; Вернуться назад</a></div>
    						<h2 class="_czr__ip-note-heading"><? the_title();?></h2>
    					</div>
	    				<div class="_czr__pip__note">
							<?=get_field('preview', $id);?>
						</div>
	    			</div>
	    		</div> 
	    	</div> 
			<? if(get_field('slide-three', $id)){ ?>
	    	<div class="item slide2">
	    		<div class="_czr__pips__flex _cb__flex">
	    			<div class="_czr__pips__note-block">
						<div class="_czr__pips__heading">
							<div class="_czr__pips__history-back"><a href="javascript:history.back();" >&larr; Вернуться назад</a></div>
    						<h2 class="_czr__ip-note-heading"><? the_title();?></h2>
    					</div>
	    				<div class="_czr__pip__note">
							<?=get_field('slide-three', $id);?>
						</div>
	    			</div>
	    		</div> 
	    	</div>
			<? } ?>
	    </div>
	    <ol class="_czr__pips__carousel-indicators carousel-indicators">
		    <li data-target="#pips-carousel-note" data-slide-to="0" class="active"></li>
		    <li data-target="#pips-carousel-note" data-slide-to="1"></li>
			<? if(get_field('slide-three', $id)){ ?><li data-target="#pips-carousel-note" data-slide-to="2"></li><? } ?>
		  </ol>
	</div>
</div>
<?if(get_field('advantage', $id)){?>
<div class="products-item-advantage _czr__products-item-advantage">
	<div class="container">
		<div id="pipa-carousel-advantage" class="carousel _czr__pipa__carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner"> 
		    	<div class="item">
		    		<div class="_czr__pipa__flex _cb__flex">
			    		<?=(get_field('advantage', $id));?>
			    	</div>
			    </div>
		    </div>
		</div>
	</div>
</div>
<?}?>
<div class="products-item-contacts _czr__products-item-contacts ">
	<div class="container">
		<h3 class="_czr__pipc__heading">Информация о покупке препарата</h3>
		<div class="_czr__pipc__content">
			<div class="_cb__flex _col _czr__pipc__flex">
				<div class="_cb__col _czr__pipc__address">
					<div>
						<div><a href="tel:+<?=phone(get_field('phone', 10));?>" class="icon icon-phone"><?=get_field('phone', 10);?></a></div>
						<div><a href="mailto:<?=get_field('email', 10);?>" class="icon icon-mail"><span><?=get_field('email', 10);?></span></a></div>
					</div>
				</div>
				<div class="_cb__col _czr__pipc__reviews">
					<form action="<?=l(54);?>" method="POST" >
						<input type="hidden" name="f[Страница заявки]" value="<?=t($this->post['id']);?>" >
						<input type="hidden" name="f[Информация о продукте]" value="<? the_title();?>" >
						<div class="_czr__pipc__reviews-note">Оставьте свой e-mail, и мы вышлем на него актуальные цены на этот и другие продукты компании</div>
						<div><input type="email" class=" validate[[required],custom[email]] "  name="f[Email]" placeholder="Введите e-mail"></div>
						<div><button type="submit" class="btn-line">Отправить</button></div>
					</form>
				</div>
			</div>
		</div> 
	</div>
</div> 

<?}?>