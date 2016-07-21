<?php
/*  */

$b_tpl = 'default';

if ( have_posts() ) {
	
	if ( is_home() && ! is_front_page() ) {
		
	}
	
	//while ( have_posts() ) {
		the_post();
		$Azbn->post['id'] = get_the_ID();
		$Azbn->post['meta'] = $Azbn->getMeta($Azbn->post['id']);
		
		$Azbn->tpl('_/header', array());
		if(isset($Azbn->post['meta']['azbn_page_tpl']) && $Azbn->post['meta']['azbn_page_tpl'] != '') {
			$Azbn->tpl($Azbn->post['meta']['azbn_page_tpl'], array());
		} else {
			$Azbn->tpl($b_tpl.'/index', array());
		}
		$Azbn->tpl('_/footer', array());
	//}
}


/*
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
	'post_type' => 'post',
	'posts_per_page' => '10',
	'paged' => $paged,
);
$the_query = new WP_Query($args);
if($the_query->have_posts()) {
	while($the_query->have_posts()) {
		$the_query->the_post();
		
		$url = wp_get_attachment_url(get_post_thumbnail_id($the_query->post->ID));
		$image = vt_resize(null, $url, 220, 220, true);
		if (!$image['url']) $image['url'] = 'http://placehold.it/220x220&text=NO IMAGE';
		echo $image['url'];
		
		
		//Вывод заголовка и контента, с читать далее (в визуальном редакторе тег more).
		//Если не работает, то после $the_query->the_post(); выше втыкаем global $more;$more=0;
		//Или с настройками WP шаманим по части вывода анонсов.
		
		the_title();
		the_content('Читать далее...');
	}
	
	wp_corenavi($the_query);
	wp_reset_postdata();
}
*/