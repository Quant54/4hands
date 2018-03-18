<?php 
/*
Plugin Name: Услуги салона [Quant]
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  Услуги салона для 4hands
Version:      20180212
Author:       Quant
Author URI:   https://developer.wordpress.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
License:     GPL2

*/
//Exit if accessd directly 
if (! defined( 'ABSPATH' )) {
	exit;
}




// add_option( 'myhack_extraction_length', '255', '', 'yes' );
// var_dump(get_option( 'myhack_extraction_length' ));
$dir = plugin_dir_path(__FILE__);
require ($dir.'wp-service-cpt.php');
require ($dir.'wp-house-render-admin.php');
require ($dir.'wp-service-fields.php');
require ($dir.'wp-studio-fields.php');
require ($dir.'wp-service-shortcode.php');

function dwwp_admin_enqueue_scripts(){
global $pagenow, $typenow;
$screen  = get_current_screen();
	// wp_enqueue_style('bootstrap-css','http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
	// 	wp_enqueue_style('bootstrap-css-theme','http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
	// 	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), '3.3.6', true );


	

//if ( ($pagenow=='post.php' || $pagenow=='post-new.php' || $pagenow=='edit.php') && ($typenow == 'house')  ) {
//
//		wp_enqueue_style('dwwp-admin-css',plugins_url('css/admin-houses.css',__FILE__));
//
//		wp_enqueue_script('dwwp-admin-js',plugins_url('js/admin-houses.js',__FILE__),array('jquery', 'jquery-ui-sortable'),'20170122',true);
//
//
//   wp_localize_script('dwwp-admin-js','WP_HOUSE_LISTING',array(
//'security'=>wp_create_nonce('wp-house-order'),
//'success'=>__('Список сохранен успешно'),
//'error'=> __('Ошибка сохранения списка')
//   ));
//}




//var_dump($screen->post_type);
//die;
}
//function remove_slug( $post_link, $post, $leavename ) {
//if ( 'studios' != $post->post_type || 'studios' != $post->post_status ) {
//    return $post_link;
//}
//$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
//return $post_link;
//}
//add_filter( 'post_type_link', 'remove_slug', 10, 3 );
//add_action( 'admin_enqueue_scripts','dwwp_admin_enqueue_scripts');
//
function dwwp_add_submenu_page() {
add_submenu_page(
	'edit.php?post_type=studio',
	 'Настройки',
	 'Настройки',
	 'manage_options',
	 'settings_house',
	 'settings_admin_studios_callback'
	);
}

add_action( 'admin_menu','dwwp_add_submenu_page');



function plugin_admin_init(){
//	$args1 = array(
//		'type' => 'string',
//		'sanitize_callback' => 'sanitize_text_field',
//		'default' => 'none',
//	);
	register_setting( 'studios_group_settings', 'studios_city_options' );

}

add_action('admin_init', 'plugin_admin_init');