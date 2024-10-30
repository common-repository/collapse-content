<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class wpsm_collapsed {
	private static $instance;
    public static function forge() {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }
	
	private function __construct() {
		
		add_action('admin_enqueue_scripts', array(&$this, 'wpsm_collapsed_admin_scripts'));
        if (is_admin()) {
			add_action('init', array(&$this, 'collapsed_content_cpt'), 1);
			add_action('add_meta_boxes', array(&$this, 'wpsm_collapsed_meta_boxes_group'));
			add_action('admin_init', array(&$this, 'wpsm_collapsed_meta_boxes_group'), 1);
			add_action('save_post', array(&$this, 'add_collapsed_meta_box_save'), 9, 1);
			add_action('save_post', array(&$this, 'collapsed_settings_meta_box_save'), 9, 1);
		}
    }
	//admin script
	public function wpsm_collapsed_admin_scripts(){
		if(get_post_type()=="collapsed_content"){
			require_once('script.php');
		}
	}
	public function collapsed_content_cpt(){
		require_once('cpt-reg.php');
		add_filter( 'manage_edit-collapsed_content_columns', array(&$this, 'collapsed_content_columns' )) ;
		add_action( 'manage_collapsed_content_posts_custom_column', array(&$this, 'collapsed_content_manage_columns' ), 10, 2 );
	}
	function collapsed_content_columns( $columns ){
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Collapsed Content' ),
            'shortcode' => __( 'Collapsed Content Shortcode' ),
            'date' => __( 'Date' )
        );
        return $columns;
    }

    function collapsed_content_manage_columns( $column, $post_id ){
        global $post;
        switch( $column ) {
          case 'shortcode' :
            echo '<input type="text" value="[WPSM_CC id='.$post_id.']" readonly="readonly" />';
            break;
          default :
            break;
        }
    }
	
	function wpsm_collapsed_meta_boxes_group(){
		add_meta_box('add_collapsed', __('Add Collapsed Content', wpshopmart_collapsed_c_text_domain), array(&$this, 'wpsm_add_cc_meta_box_function'), 'collapsed_content', 'normal', 'low' );
		add_meta_box ('collapsed_shortcode', __('Collapsed Content Shortcode', wpshopmart_collapsed_c_text_domain), array(&$this, 'wpsm_pic_cc_shortcode'), 'collapsed_content', 'normal', 'low');
		add_meta_box('collapsed_rateus', __('Rate Us If You Like This Plugin', wpshopmart_collapsed_c_text_domain), array(&$this, 'wpsm_cc_rateus_meta_box_function'), 'collapsed_content', 'side', 'low');
		add_meta_box('collapsed_setting', __('Collapsed Content Settings', wpshopmart_collapsed_c_text_domain), array(&$this, 'wpsm_add_cc_setting_meta_box_function'), 'collapsed_content', 'side', 'low');
		add_meta_box('wpsm_cc_accordion_designs', __('Accordion/Faq Design', wpshopmart_collapsed_c_text_domain), array(&$this, 'wpsm_add_cc_designs_meta_box_function'), 'collapsed_content', 'normal', 'low');
		
		add_meta_box ('wpsm_cc_more_pro', __('More Pro Plugin From Wpshopmart', wpshopmart_collapsed_c_text_domain), array(&$this, 'wpsm_pic_cc_more_pro'), 'collapsed_content', 'normal', 'low');
		
	}
	function wpsm_add_cc_meta_box_function($post){
		require_once('add-cc.php');
	}
	function wpsm_pic_cc_shortcode(){
		require_once('cc-custom-css.php');
	}
	function wpsm_cc_rateus_meta_box_function(){
		?>
		<style>
		#collapsed_rateus{
			background-color: #E74B42;
			   text-align:center;
			}
			#collapsed_rateus .hndle , #collapsed_rateus .handlediv{
			display:none;
			}
			#collapsed_rateus h1{
			color:#fff;
			
			}
			 #collapsed_rateus h3 {
			color:#fff;
			font-size:15px;
			}
			#collapsed_rateus .button-hero{
			display:block;
			text-align:center;
			margin-bottom:15px;
			}
			.wpsm-rate-us{
			text-align:center;
			}
			.wpsm-rate-us span.dashicons {
				width: 40px;
				height: 40px;
				font-size:20px;
				color : #ffffff !important;
			}
			.wpsm-rate-us span.dashicons-star-filled:before {
				content: "\f155";
				font-size: 40px;
			}
			#collapsed_rateus .button-hero{
				    background: #fff;
					color: #000;
					box-shadow: none;
					text-shadow: none;
					font-weight: 900;
					font-size: 23px;
					border:1px solid #000;
				
			}
		</style>
		   <h1>Rate Us </h1>
			<h3>Show us some love, If you like our product then please give us some valuable feedback on wordpress</h3>
			<a href="https://wordpress.org/plugins/collapse-content/" target="_blank" class="button button-primary button-hero ">RATE HERE</a>
			<a class="wpsm-rate-us" style=" text-decoration: none; height: 40px; width: 40px;" href="https://wordpress.org/plugins/collapse-content/" target="_blank">
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
			</a>
		<?php 
	}
	function wpsm_add_cc_setting_meta_box_function($post){
		require_once('settings.php');
	}
	function add_collapsed_meta_box_save($PostID){
		require_once('data-post/cc-save-data.php');
	}
	function collapsed_settings_meta_box_save($PostID){
		require_once('data-post/cc-settings-save-data.php');
	}
	function wpsm_add_cc_designs_meta_box_function(){
		?>
		<style>
		#wpsm_cc_accordion_designs .hndle  , #wpsm_cc_accordion_designs .handlediv {
				display:none;
				
			}
			#wpsm_cc_accordion_designs{
				margin-top:20px;
				background:transparent;
				padding:0px;
				box-shadow:none;
				border:0px;
				border-bottom: 2px dashed rgba(0,0,0,0.2);
				margin-bottom:30px;
			}
			#wpsm_cc_accordion_designs  h1{
				
				font-weight:900;
				margin-bottom:30px;
			}
			#wpsm_cc_accordion_designs .wpsm_ribbon{
				right: 10px;
			}
			
		</style>
		<h1>Pro Version Designs template</h1>
			<div style="overflow:hidden;display:block;width:100%;padding-top:20px">
				<?php for($i=1;$i<=8;$i++){ 
				if($i==2){
					$var = "Available In Pro";
					
				}
				else{
					$var = "Available In Pro";
				}
				?>
				<div class="col-md-3">
					<div class="demoftr">	
						
						<div class="">
							<div class="wpsm_home_portfolio_showcase">
								<div class="wpsm_ribbon"><a target="_blank" href="http://wpshopmart.com/plugins/accordion-pro/"><span><?php echo $var; ?></span></a></div>
								<img class="wpsm_img_responsive ftr_img" src="<?php echo wpshopmart_collapsed_c_directory_url.'assets/images/design/accordion-'.$i.'.png'?>">
								</div>
						</div>
						<div style="padding:13px;overflow:hidden; background: #EFEFEF; border-top: 1px dashed #ccc;">
							<h3 class="text-center pull-left" style="margin-top: 10px;margin-bottom: 10px;font-weight:900">Design <?php echo $i; ?></h3>
							<a type="button"  class="pull-right btn btn-danger design_btn" id="templates_btn<?php echo $i; ?>" target="_blank" href="http://demo.wpshopmart.com/accordion-pro/accordion-template-<?php echo $i; ?>/" >Check Demo</a>
								</div>		
					</div>	
				</div>
				<?php } ?>
				<a class="btn btn-success btn-lg " href="http://wpshopmart.com/plugins/accordion-pro/" target="_blank">Get Accordion/Collapse Pro Only In $6</a>
			</div>
		<?php		
		
	}
	function wpsm_pic_cc_more_pro(){
		?>
		<style>
			#wpsm_cc_more_pro{
			background:#fff!important;
			box-shadow: 0 0 20px rgba(0,0,0,.2);
			margin-top:40px;
			}
			#wpsm_cc_more_pro .hndle , #wpsm_cc_more_pro .handlediv{
			display:none;
			}
			#wpsm_cc_more_pro p{
			color:#000;
			font-size:15px;
			}
			.wpsm-theme-container {
				background: #fff;
				padding-left: 0px;
				padding-right: 0px;
				box-shadow: 0 0 20px rgba(0,0,0,.2);
			}
			.wpsm_site-img-responsive {
				display: block;
				width: 100%;
				height: auto;
			}
			.wpsm_product_wrapper {
				padding: 20px;
				overflow: hidden;
			}
			.wpsm_product_wrapper h3 {
				float: left;
				margin-bottom: 0px;
				color: #000 !important;
				letter-spacing: 0px;
				text-transform: uppercase;
				font-size: 18px;
				font-weight: 700;
				text-align: left;
				margin:0px;
			}
			.wpsm_product_wrapper h3 span {
				display: block;
				float: left;
				width: 100%;
				overflow: hidden;
				font-size: 14px;
				color: #919499;
				margin-top: 6px;
			}
			.wpsm_product_wrapper .price {
				float: right;
				font-size: 24px;
				color: #000;
				font-family: sans-serif;
				font-weight: 500;
			}
			.wpsm-btn-block {
				overflow: hidden;
				float: left;
				width: 100%;
				margin-top: 20px;
				display: block;
			}
			.portfolio_read_more_btn {
				border: 1px solid #1e73be;
				border-radius: 0px;
				margin-bottom: 10px;
				text-transform: uppercase;
				font-weight: 700;
				font-size: 15px;
				padding: 12px 12px;
				display: block;
				text-align:center;
				width:100%;
				border-radius: 2px;
				cursor: pointer;
				letter-spacing: 1px;
				outline: none;
				position: relative;
				text-decoration: none !important;
				color: #fff !important;
				-webkit-transition: all ease 0.5s;
				-moz-transition: all ease 0.5s;
				transition: all ease 0.5s;
				background: #1e73be;
				padding-left: 22px;
				padding-right: 22px;
			}
			.portfolio_demo_btn {
				border: 1px solid #919499;
				border-radius: 0px;
				margin-bottom: 10px;
				text-transform: uppercase;
				font-weight: 700;
				font-size: 15px;
				padding: 12px 12px;
				display: block;
				text-align:center;
				width:100%;
				border-radius: 2px;
				cursor: pointer;
				letter-spacing: 1px;
				outline: none;
				position: relative;
				text-decoration: none !important;
				background-color: #242629;
				border-color: #242629;
				color: #fff !important;
				-webkit-transition: all ease 0.5s;
				-moz-transition: all ease 0.5s;
				transition: all ease 0.5s;
				padding-left: 22px;
				padding-right: 22px;
			}
		</style>
		<h1>More Recommended Premium Plugin From Wpshopmart</h1>
			<div style="overflow:hidden;display:block;width:100%;padding-top:20px;padding-bottom:20px">
				<div class="col-md-12">
					<div class="col-md-4"> 
						<a href="http://wpshopmart.com/plugins/colorbox-pro/" target="_blank" title="ColorBox Pro">
							<div class="wpsm-theme-container" style="">
								<img width="700" height="394" src="<?php echo wpshopmart_collapsed_c_directory_url.'assets/images/cb.png'; ?>" class="wpsm_site-img-responsive wp-post-image" alt="Colorbox and panels pro plugin">
								<div class="wpsm_product_wrapper">
									<h3>ColorBox Pro <span>wordpress</span></h3>
									<span class="price"><span class="amount">$5</span></span>
									<div class="wpsm-btn-block" style="">
																		
										<a title="Check Detail" target="_blank" href="http://wpshopmart.com/plugins/colorbox-pro/" class="portfolio_read_more_btn pull-left">Check Detail</a>
										<a title="View Demo" target="_blank" href="http://demo.wpshopmart.com/colorbox-pro/" class="portfolio_demo_btn pull-right">View Demo</a>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4"> 
						<a href="http://wpshopmart.com/plugins/accordion-pro/" target="_blank" title="Accordion Pro">
							<div class="wpsm-theme-container" style="">
								<img width="700" height="394" src="<?php echo wpshopmart_collapsed_c_directory_url.'assets/images/ac.png'; ?>" class="wpsm_site-img-responsive wp-post-image" alt="Colorbox and panels pro plugin">
								<div class="wpsm_product_wrapper">
									<h3>Accordion Pro<span>wordpress</span></h3>
									<span class="price"><span class="amount">$6</span></span>
									<div class="wpsm-btn-block" style="">
																		
										<a title="Check Detail" target="_blank" href="http://wpshopmart.com/plugins/accordion-pro/" class="portfolio_read_more_btn pull-left">Check Detail</a>
										<a title="View Demo" target="_blank" href="http://demo.wpshopmart.com/accordion-pro/" class="portfolio_demo_btn pull-right">View Demo</a>
									</div>
								</div>
							</div>
						</a>
					</div>
					
					<div class="col-md-4"> 
						<a href="http://wpshopmart.com/plugins/coming-soon-pro/" target="_blank" title="Coming Soon Pro">
							<div class="wpsm-theme-container" style="">
								<img width="700" height="394" src="<?php echo wpshopmart_collapsed_c_directory_url.'assets/images/csp.png'; ?>" class="wpsm_site-img-responsive wp-post-image" alt="Colorbox and panels pro plugin">
								<div class="wpsm_product_wrapper">
									<h3>Coming Soon Pro <span>wordpress</span></h3>
									<span class="price"><span class="amount">$19</span></span>
									<div class="wpsm-btn-block" style="">
										<a title="Check Detail" target="_blank" href="http://wpshopmart.com/plugins/coming-soon-pro/" class="portfolio_read_more_btn pull-left">Check Detail</a>
										<a title="View Demo" target="_blank" href="http://wpshopmart.com/coming-soon-pro-demo-page/" class="portfolio_demo_btn pull-right">View Demo</a>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>		
	<?php 	
	}
	
} 
 
global $wpsm_collapsed;
$wpsm_collapsed = wpsm_collapsed::forge();
?>