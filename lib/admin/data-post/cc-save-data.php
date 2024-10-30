<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if(isset($PostID) && isset($_POST['cc_save_data_action']) ) {
			$TotalCount = count($_POST['collapsed_title']);
			$DataArray = array();
			if($TotalCount) {
				for($i=0; $i < $TotalCount; $i++) {
					$collapsed_title = stripslashes(sanitize_text_field($_POST['collapsed_title'][$i]));
					$collapsed_desc = stripslashes($_POST['collapsed_desc'][$i]);

					$DataArray[] = array(
						'collapsed_title' => $collapsed_title,
						'collapsed_desc' => $collapsed_desc,
					);
				}
				update_post_meta($PostID, 'wpsm_collapse_data', serialize($DataArray));
				update_post_meta($PostID, 'wpsm_collapse_count', $TotalCount);
			} else {
				$TotalCount = -1;
				update_post_meta($PostID, 'wpsm_collapse_count', $TotalCount);
				$DataArray = array();
				update_post_meta($PostID, 'wpsm_collapse_data', serialize($DataArray));
			}
		}
 ?>