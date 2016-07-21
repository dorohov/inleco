<?php
/* Template Name: form - Обработчик форм */

$b_tpl = 'form';

function __azbn_check($str) {
	return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}

if(count($_POST['f'])) {
	$f = array();
	$f_str = array();
	
	foreach($_POST['f'] as $k => $v) {
		$f[$k] = __azbn_check($v);
		$f_str[] = '<p>'.$k.': '.$f[$k].'</p>';
	}
	
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
		$headers[] = 'From: Сайт Endurancerobots <info@endurancerobots.com>';
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
		wp_mail(array('gf@endurancerobots.com', '3603210@gmail.com', 'reangeorge@mail.ru', 'gfomitchev@gmail.com'), 'Новая форма на сайте #'.$post_id, $body, $headers, $attachments);
	}
	
	the_post();
	$Azbn->post['id'] = get_the_ID();
	$Azbn->lng = 'en';
	
	$Azbn->tpl('_/header', array());
	$Azbn->tpl($b_tpl.'/'.$Azbn->lng, $f);
	$Azbn->tpl('_/footer', array());
	
} else {
	
	Header('Location: /');
	wp_die();
	
}