<?

// шаблон
$cat_slug_arr = array();

$cat_arr = get_field('default-cat', $this->post['id']);

if(count($cat_arr)) {
	foreach($cat_arr as $_cat) {
		$cat_slug_arr[] = $_cat->slug;
	}
}

query_posts(array(
	'post_type' => 'product',
	//'post_parent' => $id,
	'order' => 'ASC',
	'orderby' => 'menu_order',
	'posts_per_page' => -1,
	'tax_query' => array(array(
		'taxonomy' => 'product_taxonomies',
		'field' => 'slug',
		'terms' => $cat_slug_arr,//array($cat->slug),//array('is-product',),
		//operator
		//include_children
	)),
));

?>

<div class="skw-pages">
	<button type="button" class="_czr__btn-pub _czr__btn__resize" data-toggle="modal" data-target="#modal-products">
		<span>Продукция</span>
	</button>
	
	<?
	
	$this->tpl('production/item_list', array());
	
	?>
	 
</div>




<?

$this->tpl('production/modal', array());

wp_reset_postdata();