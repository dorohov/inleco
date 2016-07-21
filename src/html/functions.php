<?php
/**
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * Theme's functions.php file.
 *
 * This file bootstrap the entire framework.
 *
 * @package Yithemes
 *
 */


/*
 * WARNING: This file is part of the Your Inspiration Themes framework core.
 * Edit this section at your own risk.
 */

/*
remove_action('load-update-core.php','wp_update_themes');
add_filter('pre_site_transient_update_themes',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_update_themes');

remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );

add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');
*/

/*
add_action( 'admin_init', '_azbn_dp' );
function _azbn_dp() {
	deactivate_plugins(array(
		'all-in-one-seo-pack\all_in_one_seo_pack.php',
		'captcha\captcha.php',
		'contact-form-7\wp-contact-form-7.php',
		'cyr3lat\cyr-to-lat.php',
		
		'duplicate-post\',
		'envato-wordpress-toolkit\',
		'error-log-monitor\',
		'essential-grid\',
		'favicon-xt-manager\',
		'force-regenerate-thumbnails\',
		'google-sitemap-generator\',
		'hyper-cache\',
		'js_composer\',
		'LayerSlider\',
		'manual-image-crop\',
		'nimble-portfolio\',
		'recent-tweets-widget\',
		'revslider\',
		'saphali-woocommerce-lite\',
		'strong-testimonials\',
		'tablepress\',
		'tinymce-advanced\',
		'title-rus-to-eng\',
		'Ultimate_VC_Addons\',
		'woocommerce\',
		'wordpress-social-login\',
		'wp-optimize\',
		'wp-polls\',
		'wp-super-cache\',
		'yit-backup-reset\',
		'yit-contact-form\',
		'yit-faq\',
		'yit-feature-tabs\',
		'yit-logos\',
		'yit-newsletter\',
		'yit-portfolio\',
		'yit-shortcodes\',
		'yit-sidebar\',
		'yit-sitemap\',
		'yit-slider\',
		'yit-team\',
		'yit-testimonial\',
		'yith-pre-launch\',
		'yith-woocommerce-ajax-navigation\',
		'yith-woocommerce-ajax-search\',
		'yith-woocommerce-colors-labels-variations\',
		'yith-woocommerce-hide-price\',
		'yith-woocommerce-wishlist\',
		'yith-woocommerce-zoom-magnifier\',
	));
}
*/

//let's start the game!
function _azbn_get_social_widget($param = array('vk-widget-width' => 260,)) {

$w = ($param['vk-widget-width'])?$param['vk-widget-width']:260;
?>

<?
/*
<!-- Виджет ВКонтакте -->

<style >
#vk_groups {
	
}
#vk_groups > iframe {
	
}
</style>

<script type="text/javascript" src="//vk.com/js/api/openapi.js?121"></script>
<!-- VK Widget -->
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 0, width: "<?=$w;?>", height: "400", color1: 'FFFFFF', color2: '2b338f', color3: '2b338f'}, 98148256);
</script>

<!-- /Виджет ВКонтакте -->
*/
?>


<!-- Виджет Facebook -->

<a href="https://www.facebook.com/groups/227885744219716/" target="_blank" ><img src="/wp-content/themes/regency/img/fb-widget.png" style="max-width:100%;margin:2em 0;display:block;" /></a>

<!-- /Виджет Facebook -->



<!-- Виджет Instagram -->

<a href="https://www.instagram.com/orion_print/" target="_blank" ><img src="/wp-content/themes/regency/img/inst-widget.png" style="max-width:100%;margin:2em 0;display:block;" /></a>

<!-- /Виджет Instagram -->

<?
}

/*
add_action( 'init', 'my_deregister_heartbeat', 1 );
function my_deregister_heartbeat() {
	global $pagenow;
	
	if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow ) {
		wp_deregister_script('heartbeat');
	}
}
*/
//__setPoint('до core/yit.php');
require_once('core/yit.php');
//__setPoint('после/yit.php');
//__getPoints();
