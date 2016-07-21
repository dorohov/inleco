<?

// шаблон

$cat = get_queried_object();

?>

<div class="skw-pages">
	<button type="button" class="_czr__btn-pub _czr__btn__resize" data-toggle="modal" data-target="#modal-products">
		<span><?=$cat->name;?></span>
	</button>
	
	<?
	
	$this->tpl('production/item_list', array());
	
	?>
	 
</div>



<?

$this->tpl('production/modal', array());
