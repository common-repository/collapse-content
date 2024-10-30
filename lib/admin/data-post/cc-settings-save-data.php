<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if(isset($PostID) && isset($_POST['wpsm_cc_setting_save_action'])) {
			$op_cl_icon      	= sanitize_option('op_cl_icon', $_POST['op_cl_icon']);
			$acc_op_cl_align    = sanitize_option('acc_op_cl_align', $_POST['acc_op_cl_align']);
			$enable_toggle      = sanitize_option('enable_toggle', $_POST['enable_toggle']);
			$enable_ac_border   = sanitize_option('enable_ac_border',$_POST['enable_ac_border']);
			$expand_option      = sanitize_option('expand_option',$_POST['expand_option']);
			$acc_title_icon_clr = sanitize_text_field($_POST['acc_title_icon_clr']);
			$acc_desc_font_clr  = sanitize_text_field($_POST['acc_desc_font_clr']);
			$title_size 		= sanitize_text_field($_POST['title_size']);
			$des_size         	= sanitize_text_field($_POST['des_size']);
			$font_family        = sanitize_text_field($_POST['font_family']);
			$custom_css         = stripslashes($_POST['custom_css']);
			
			$Accordion_Settings_Array = serialize( array(
			"op_cl_icon" 		 => $op_cl_icon,
			"enable_toggle"    	 => $enable_toggle,
			"enable_ac_border"   => $enable_ac_border,
			"acc_op_cl_align"    => $acc_op_cl_align,
			"acc_title_icon_clr" => $acc_title_icon_clr,
			"acc_desc_font_clr"  => $acc_desc_font_clr,
			"title_size"         => $title_size,
			"des_size"     		 => $des_size,
			"font_family"     	 => $font_family,
			"expand_option"      =>$expand_option,
			"custom_css"         =>$custom_css,
				) );

			update_post_meta($PostID, 'Wpsm_collapsed_Settings', $Accordion_Settings_Array);
		}
?>