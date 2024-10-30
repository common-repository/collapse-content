<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_shortcode( 'WPSM_CC', 'Wpsm_COllpase_Content_ShortCode' );
function Wpsm_COllpase_Content_ShortCode( $Id ) {
	ob_start();	
	if(!isset($Id['id'])) 
	 {
		$WPSM_CC_ID = "";
	 } 
	else 
	{
		$WPSM_CC_ID = $Id['id'];
	}
	require("content.php"); 
	wp_reset_query();
    return ob_get_clean();
}
?>