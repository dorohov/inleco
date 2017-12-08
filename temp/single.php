<?php
/* Template Name: news/single - пост/новость */

$b_tpl = 'news';

the_post();
$Azbn->post['id'] = get_the_ID();
$Azbn->post['meta'] = $Azbn->getMeta($Azbn->post['id']);
		
$Azbn->tpl('_/header', array());
if(isset($Azbn->post['meta']['azbn_page_tpl']) && $Azbn->post['meta']['azbn_page_tpl'] != '') {
	$Azbn->tpl($Azbn->post['meta']['azbn_page_tpl'], array());
} else {
	$Azbn->tpl($b_tpl.'/item', array());
}
$Azbn->tpl($b_tpl.'/item-owl', array());
$Azbn->tpl('_/footer', array());