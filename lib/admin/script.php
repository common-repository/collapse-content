<?php
			wp_enqueue_media();
			wp_enqueue_script('jquery-ui-datepicker');
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wpsm_ac-color-pic', wpshopmart_collapsed_c_directory_url.'assets/js/color-picker.js', array( 'wp-color-picker' ), false, true );
			wp_enqueue_style('wpsm_ac-panel-style', wpshopmart_collapsed_c_directory_url.'assets/css/panel-style.css');
			
			wp_enqueue_style('wpsm_ac_remodal-css', wpshopmart_collapsed_c_directory_url .'assets/modal/remodal.css');
			wp_enqueue_style('wpsm_ac_remodal-default-theme-css', wpshopmart_collapsed_c_directory_url .'assets/modal/remodal-default-theme.css');
		
			
			//font awesome css
			wp_enqueue_style('wpsm_ac-font-awesome', wpshopmart_collapsed_c_directory_url.'assets/css/font-awesome/css/font-awesome.min.css');
			wp_enqueue_style('wpsm_ac_bootstrap', wpshopmart_collapsed_c_directory_url.'assets/css/bootstrap.css');
			wp_enqueue_style('font-awesome-picker', wpshopmart_collapsed_c_directory_url.'assets/css/fontawesome-iconpicker.css');
			wp_enqueue_style('ac_jquery-css', wpshopmart_collapsed_c_directory_url .'assets/css/ac_jquery-ui.css');
			
			
			//line editor
			wp_enqueue_style('wpsm_ac_line-edtor', wpshopmart_collapsed_c_directory_url.'assets/css/jquery-linedtextarea.css');
			wp_enqueue_script( 'wpsm_ac-line-edit-js', wpshopmart_collapsed_c_directory_url.'assets/js/jquery-linedtextarea.js');
			
			wp_enqueue_script( 'wpsm_ac-bootstrap-js', wpshopmart_collapsed_c_directory_url.'assets/js/bootstrap.js');
			
			
			// settings
			wp_enqueue_style('wpsm_ac_settings-css', wpshopmart_collapsed_c_directory_url.'assets/css/settings.css');
			
			//icon picker	
			wp_enqueue_script('font-icon-picker-js',wpshopmart_collapsed_c_directory_url.'assets/js/fontawesome-iconpicker.js',array('jquery'));
			wp_enqueue_script('call-icon-picker-js',wpshopmart_collapsed_c_directory_url.'assets/js/call-icon-picker.js',array('jquery'), false, true);
			
			wp_enqueue_script('remodal-min-js',wpshopmart_collapsed_c_directory_url.'assets/modal/remodal.min.js',array('jquery'), false, true);
	

 ?>