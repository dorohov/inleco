
<meta charset="utf-8">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<title>
<?
if(is_category()) {
	single_cat_title();
} else {
	the_title();
}
?>
</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta HTTP-EQUIV="Cache-Control" content="no-cache" />

<link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
<link type="image/x-icon" href="/favicon.ico" rel="icon" />

<link href="<?=$this->path('css');?>/site.css" rel="stylesheet">
