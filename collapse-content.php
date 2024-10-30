<?php
/**
 * Plugin Name: Collapse Content
 * Version: 1.1.7
 * Description: collapse Content is display your content in collpase style like FAq page or Accordion page. 
 * Author: wpshopmart
 * Author URI: https://www.wpshopmart.com
 * Plugin URI: https://www.wpshopmart.com/plugins
 *
 */

/**
 * DEFINE PATHS
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;
define("wpshopmart_collapsed_c_directory_url", plugin_dir_url(__FILE__));
define("wpshopmart_collapsed_c_text_domain", "wpsm_collapse");

function wpsm_cc_default_data() {
	
	$Settings_Array = serialize( array(
		"op_cl_icon"     	 => 'yes',
		"enable_toggle"    	 => 'no',
		"enable_ac_border"   => 'yes',
		"acc_op_cl_align"    => 'left',
		"acc_title_icon_clr" => '#6b6b6b',
		"acc_desc_font_clr"  => '#7a7a7a',
		"title_size"         => '22',
		"des_size"     		 => '18',
		"font_family"     	 => 'Verdana',
		"expand_option"      => '1',
		"custom_css"         => '',
		) );

	add_option('wpsm_cc_default_Settings', $Settings_Array);
}
register_activation_hook( __FILE__, 'wpsm_cc_default_data' );


/**
 * PLUGIN Install
 */
require_once("lib/install.php");


/**
 * CPT CLASS
 */
require_once("lib/admin/menu.php");
/**
 * SHORTCODE
 */
require_once("template/shortcode.php"); 
 
?>