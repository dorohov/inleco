<?php
/* Template Name: formsave - Обработка форм */

$b_tpl = 'form';

function __azbn_check($str = '') {
	return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}


if(count($_POST['f'])) {
	$f = array();
	$f_str = array();
	
	the_post();
	$Azbn->post['id'] = get_the_ID();
	$Azbn->post['meta'] = $Azbn->getMeta($Azbn->post['id']);
	
	foreach($_POST['f'] as $k => $v) {
		$f[$k] = __azbn_check($v);
		$f_str[] = '<p>'.$k.': '.$f[$k].'</p>';
	}
	
	//var_dump($f_str);
	
	$post_data = array(
		'post_type'			=>	'azbnform',
		'post_title'		=>	wp_strip_all_tags('Форма '.date("Y-m-d H:i:s", date("U") + 10800)),
		'post_content'		=>	implode("\n", $f_str),
		'post_status'		=>	'pending',
		'post_author'		=>	1,
		'comment_status'	=>	'closed',
		'ping_status'		=>	'closed',
		//'post_date'			=>	date("Y-m-d H:i:s"),
		//'post_category'	=>	array( 8,39 ),
	);
	$post_id = wp_insert_post($post_data);
	
	if($post_id) {
		
		$headers = array();
		//$headers[] = 'From: '.get_field('from_email', $Azbn->post['id']);
		$headers[] = 'content-type: text/html';
		
		$attachments = array();
		//$attachments = array(WP_CONTENT_DIR . '/uploads/attach.zip');
		
		$body = '
		<html>
			<head></head>
			<body>
				<p>Получена новая форма</p>
				'.implode("\n", $f_str).'
			</body>
		</html>
		';//<p><a href="http://chesterpub.ru/wp-admin/post.php?post='.$post_id.'&action=edit" >Перейти к обработке</a></p>
		//wp_mail(array('devazbn@yandex.ru'), 'Новая форма на сайте #'.$post_id, $body, $headers, $attachments);
		wp_mail(get_field('to_email', $Azbn->post['id']), 'Новая форма на сайте #'.$post_id, $body, $headers, $attachments);
		//echo get_field('to_email', $Azbn->post['id']);die();
	}
	
	/*
	$Azbn->tpl('_/header', array());
	if(isset($Azbn->post['meta']['azbn_page_tpl']) && $Azbn->post['meta']['azbn_page_tpl'] != '') {
		$Azbn->tpl($Azbn->post['meta']['azbn_page_tpl'], $f);
	} else {
		$Azbn->tpl($b_tpl.'/index', $f);
	}
	$Azbn->tpl('_/footer', array());
	*/
	
} else {
	
	Header('Location: /');
	die();
	
}