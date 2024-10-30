<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
$De_Settings = unserialize(get_option('wpsm_cc_default_Settings'));
 $PostId = $post->ID;
 $Settings = unserialize(get_post_meta( $PostId, 'Wpsm_collapsed_Settings', true));

		$option_names = array(
			"op_cl_icon" 		 => $De_Settings['op_cl_icon'],
			"enable_toggle"    	 => $De_Settings['enable_toggle'],
			"enable_ac_border"   => $De_Settings['enable_ac_border'],
			"acc_op_cl_align"    => $De_Settings['acc_op_cl_align'],
			"acc_title_icon_clr" => $De_Settings['acc_title_icon_clr'],
			"acc_desc_font_clr"  => $De_Settings['acc_desc_font_clr'],
			"title_size"         => $De_Settings['title_size'],
			"des_size"     		 => $De_Settings['des_size'],
			"font_family"     	 => $De_Settings['font_family'],
			"expand_option"      =>$De_Settings['expand_option'],
			"custom_css"         =>$De_Settings['custom_css'],
			);
			foreach($option_names as $option_name => $default_value) {
				if(isset($Settings[$option_name])) 
					${"" . $option_name}  = $Settings[$option_name];
				else
					${"" . $option_name}  = $default_value;
			}


			
		?>
<style>

</style>
<Script>

 //font slider size script
  jQuery(function() {
    jQuery( "#title_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 30,
		min:5,
		slide: function( event, ui ) {
		jQuery( "#title_size" ).val( ui.value );
      }
		});
		
		jQuery( "#title_size_id" ).slider("value",<?php  if($title_size!=""){ echo $title_size; } else{ echo "22"; } ?> );
		jQuery( "#title_size" ).val( jQuery( "#title_size_id" ).slider( "value") );
    
  });
</script>
<Script>

 //font slider size script
  jQuery(function() {
    jQuery( "#des_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 30,
		min:5,
		slide: function( event, ui ) {
		jQuery( "#des_size" ).val( ui.value );
      }
		});
		
		jQuery( "#des_size_id" ).slider("value",<?php  if($des_size!=""){ echo $des_size; } else{ echo "22"; } ?>);
		jQuery( "#des_size" ).val( jQuery( "#des_size_id" ).slider( "value") );
    
  });
</script> 
<Script>
function wpsm_update_default(){
	 jQuery.ajax({
		url: location.href,
		type: "POST",
		data : {
			    'action_cc':'default_settins_action',
			     },
                success : function(data){
									alert("Default Settings Updated");
									location.reload(true);
                                   }	
	});
	
}
</script>
<?php

if(isset($_POST['action_cc']) == "default_settins_action")
	{
	
		$Settings_Array2 = serialize( array(
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

			update_option('wpsm_cc_default_Settings', $Settings_Array2);
}

 ?> 

 
<input type="hidden" id="wpsm_cc_setting_save_action" name="wpsm_cc_setting_save_action" value="wpsm_faq_setting_save_action">
		
<table class="form-table acc_table">
	<tbody>
		
	<tr >
			<th scope="row"><label><?php _e('Collapse Title Color',wpshopmart_collapsed_c_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_icon_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="acc_title_icon_clr" name="acc_title_icon_clr" type="text" value="<?php echo $acc_title_icon_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
				<!-- Tooltip -->
				<div id="acc_title_icon_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Collapse Title Color',wpshopmart_collapsed_c_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_collapsed_c_directory_url.'assets/tooltip/img/ac-style.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		
		
		
	
		
		<tr >
			<th scope="row"><label><?php _e('Collapse Description Color',wpshopmart_collapsed_c_text_domain); ?></label>
				
			</th>
			<td>
				<input id="acc_desc_font_clr" name="acc_desc_font_clr" type="text" value="<?php echo $acc_desc_font_clr; ?>" class="my-color-field" data-default-color="#000000" />
			
			</td>
		</tr>
		<tr class="setting_color">
			<th><?php _e('Collapse Title Font Size',wpshopmart_collapsed_c_text_domain); ?> 
				
			</th>
			<td>
				<div id="title_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="title_size" name="title_size"  readonly="readonly">
				
			</td>
		</tr>
		
		<tr class="setting_color">
			<th><?php _e('Collapse Description Font Size',wpshopmart_collapsed_c_text_domain); ?> 
				
			</th>
			<td>
				<div id="des_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="des_size" name="des_size"  readonly="readonly">
				
			</td>
		</tr>
		<tr >
			<th><?php _e('Collapse Font Style/Family',wpshopmart_collapsed_c_text_domain); ?> 
				
			</th>
			<td>
				<?php if(!isset($font_family)) $font_family = "Open Sans";?>	
				<select name="font_family" id="font_family" class="standard-dropdown" style="width:100%" >
					<optgroup label="Default Fonts">
						<option value="Arial"           <?php if($font_family == 'Arial' ) { echo "selected"; } ?>>Arial</option>
						<option value="Arial Black"    <?php if($font_family == 'Arial Black' ) { echo "selected"; } ?>>Arial Black</option>
						<option value="Courier New"     <?php if($font_family == 'Courier New' ) { echo "selected"; } ?>>Courier New</option>
						<option value="Georgia"         <?php if($font_family == 'Georgia' ) { echo "selected"; } ?>>Georgia</option>
						<option value="Grande"          <?php if($font_family == 'Grande' ) { echo "selected"; } ?>>Grande</option>
						<option value="Helvetica" 	<?php if($font_family == 'Helvetica' ) { echo "selected"; } ?>>Helvetica Neue</option>
						<option value="Impact"         <?php if($font_family == 'Impact' ) { echo "selected"; } ?>>Impact</option>
						<option value="Lucida"         <?php if($font_family == 'Lucida' ) { echo "selected"; } ?>>Lucida</option>
						<option value="Lucida Grande"         <?php if($font_family == 'Lucida Grande' ) { echo "selected"; } ?>>Lucida Grande</option>
						<option value="Open Sans"   <?php if($font_family == 'Open Sans' ) { echo "selected"; } ?>>Open Sans</option>
						<option value="OpenSansBold"   <?php if($font_family == 'OpenSansBold' ) { echo "selected"; } ?>>OpenSansBold</option>
						<option value="Palatino Linotype"       <?php if($font_family == 'Palatino Linotype' ) { echo "selected"; } ?>>Palatino</option>
						<option value="Sans"           <?php if($font_family == 'Sans' ) { echo "selected"; } ?>>Sans</option>
						<option value="sans-serif"           <?php if($font_family == 'sans-serif' ) { echo "selected"; } ?>>Sans-Serif</option>
						<option value="Tahoma"         <?php if($font_family == 'Tahoma' ) { echo "selected"; } ?>>Tahoma</option>
						<option value="Times New Roman"          <?php if($font_family == 'Times New Roman' ) { echo "selected"; } ?>>Times New Roman</option>
						<option value="Trebuchet"      <?php if($font_family == 'Trebuchet' ) { echo "selected"; } ?>>Trebuchet</option>
						<option value="Verdana"        <?php if($font_family == 'Verdana' ) { echo "selected"; } ?>>Verdana</option>
					</optgroup>
				</select>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="http://wpshopmart.com/plugins/accordion-pro/" target="_balnk">Get 500+ Google Fonts In Premium Version</a> </div>
			
				
			</td>
		</tr>
		
		
		<tr>
			<th scope="row"><label><?php _e('Display Open Close Icon ',wpshopmart_collapsed_c_text_domain); ?></label>
				
			</th>
			<td>
				
				<div class="switch">
					<input type="radio" class="switch-input" name="op_cl_icon" value="yes" id="enable_op_cl_icon" <?php if($op_cl_icon == 'yes' ) { echo "checked"; } ?>  >
					<label for="enable_op_cl_icon" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_collapsed_c_text_domain); ?></label>
					<input type="radio" class="switch-input" name="op_cl_icon" value="no" id="disable_op_cl_icon" <?php if($op_cl_icon == 'no' ) { echo "checked"; } ?> >
					<label for="disable_op_cl_icon" class="switch-label switch-label-on"><?php _e('No',wpshopmart_collapsed_c_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				
				
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Accordion Open/Close Icon Alignment',wpshopmart_collapsed_c_text_domain); ?></label>
			
			</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="acc_op_cl_align" value="left" id="enable_acc_op_cl_align" <?php if($acc_op_cl_align == 'left' ) { echo "checked"; } ?>  >
					<label for="enable_acc_op_cl_align" class="switch-label switch-label-off"><?php _e('left',wpshopmart_collapsed_c_text_domain); ?></label>
					<input type="radio" class="switch-input" name="acc_op_cl_align" value="right" id="disable_acc_op_cl_align" <?php if($acc_op_cl_align == 'right' ) { echo "checked"; } ?> >
					<label for="disable_acc_op_cl_align" class="switch-label switch-label-on"><?php _e('right',wpshopmart_collapsed_c_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				
			</td>
		</tr>
		
		
		
		
		
		<tr>
			<th scope="row"><label><?php _e('Collapse title bottom border Enable',wpshopmart_collapsed_c_text_domain); ?></label>
				
			</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="enable_ac_border" value="yes" id="enable_enable_ac_border" <?php if($enable_ac_border == 'yes' ) { echo "checked"; } ?>  >
					<label for="enable_enable_ac_border" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_collapsed_c_text_domain); ?></label>
					<input type="radio" class="switch-input" name="enable_ac_border" value="no" id="disable_enable_ac_border" <?php if($enable_ac_border == 'no' ) { echo "checked"; } ?> >
					<label for="disable_enable_ac_border" class="switch-label switch-label-on"><?php _e('No',wpshopmart_collapsed_c_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				
			</td>
		</tr>
		
		
		
		<tr>
			<th scope="row"><label><?php _e('Enable Collapse more then one content',wpshopmart_collapsed_c_text_domain); ?></label>
				
			</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="enable_toggle" value="yes" id="enable_acc_toggle" <?php if($enable_toggle == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_acc_toggle" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_collapsed_c_text_domain); ?></label>
					<input type="radio" class="switch-input" name="enable_toggle" value="no" id="disable_acc_toggle"  <?php if($enable_toggle == 'no' ) { echo "checked"; } ?> >
					<label for="disable_acc_toggle" class="switch-label switch-label-on"><?php _e('No',wpshopmart_collapsed_c_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				
			</td>
		</tr>
		
		
		
		
		
		<tr>
			<th scope="row"><label><?php _e('Expand/Collapse Faq Option On Page Load',wpshopmart_collapsed_c_text_domain); ?></label>
				
			</th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="expand_option" id="expand_option" value="1" <?php if($expand_option == '1' ) { echo "checked"; } ?> /> First FAQ Open </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="expand_option" id="expand_option2" value="2" <?php if($expand_option == '2' ) { echo "checked"; } ?>  /> Open All FAQ </span>
				<span style="display:block"><input type="radio" name="expand_option" id="expand_option2" value="3"  <?php if($expand_option == '3' ) { echo "checked"; } ?> /> Hide/close All FAQ </span>
				
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Page Scroll To Accordion',wpshopmart_collapsed_c_text_domain); ?></label></th>
			<td>
				<div class="switch wpsm_off">
					<input type="radio" class="switch-input" name="acc_scroll" value="yes" id="enable_acc_scroll"   checked>
					<label for="enable_acc_scroll" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_collapsed_c_text_domain); ?></label>
					<input type="radio" class="switch-input" name="acc_scroll" value="no" id="disable_acc_scroll"  >
					<label for="disable_acc_scroll" class="switch-label switch-label-on"><?php _e('No',wpshopmart_collapsed_c_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="http://wpshopmart.com/plugins/accordion-pro/" target="_balnk">Available In Premium Version</a> </div>
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('ON Hover Accordion ',wpshopmart_collapsed_c_text_domain); ?></label></th>
			<td>
				<div class="switch wpsm_off">
					<input type="radio" class="switch-input" name="acc_hover" value="yes" id="enable_acc_hover"   checked>
					<label for="enable_acc_hover" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_collapsed_c_text_domain); ?></label>
					<input type="radio" class="switch-input" name="acc_hover" value="no" id="disable_acc_hover"  >
					<label for="disable_acc_hover" class="switch-label switch-label-on"><?php _e('No',wpshopmart_collapsed_c_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="http://wpshopmart.com/plugins/accordion-pro/" target="_balnk">Available In Premium Version</a> </div>
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Open Close Icons',wpshopmart_collapsed_c_text_domain); ?></label></th>
			<td>
				<img class="wpsm_img_responsive"  src="<?php echo wpshopmart_collapsed_c_directory_url.'assets/images/snap-1.png'; ?>" />
				<a style="margin-top:10px" href="http://wpshopmart.com/plugins/accordion-pro/" target="_balnk">Available In Premium Version</a>
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Content Animation ',wpshopmart_collapsed_c_text_domain); ?></label></th>
			<?php $content_animation = "0" ?>
			<td><select name="content_animation" id="content_animation" class="standard-dropdown" style="width:100%" >
					
					<option value="0"  <?php if($content_animation == '0' ) { echo "selected"; } ?> >Content Animation</option>
					<option disabled value="fadeIn"  <?php if($content_animation == 'fadeIn' ) { echo "selected"; } ?> >fadeIn</option>
					<option disabled value="fadeInLeft"    <?php if($content_animation == 'fadeInLeft' ) { echo "selected"; } ?> >fadeInLeft</option>
					<option disabled value="fadeInRight"    <?php if($content_animation == 'fadeInRight' ) { echo "selected"; } ?> >fadeInRight</option>
					<option disabled value="fadeInUp"    <?php if($content_animation == 'fadeInUp' ) { echo "selected"; } ?> >fadeInUp</option>
					<option disabled value="fadeInDown"    <?php if($content_animation == 'fadeInDown' ) { echo "selected"; } ?> >fadeInDown</option>
					<option disabled value="flip"    <?php if($content_animation == 'flip' ) { echo "selected"; } ?> >flip</option>
					<option disabled value="flipX"    <?php if($content_animation == 'flipX' ) { echo "selected"; } ?> >flipX</option>
					<option disabled value="flipY"    <?php if($content_animation == 'flipY' ) { echo "selected"; } ?> >flipY</option>
					<option disabled value="zoomIn"    <?php if($content_animation == 'zoomIn' ) { echo "selected"; } ?> >ZoomIn</option>
					<option disabled value="zoomInLeft"    <?php if($content_animation == 'zoomInLeft' ) { echo "selected"; } ?> >ZoomInLeft</option>
					<option disabled value="zoomInRight"    <?php if($content_animation == 'zoomInRight' ) { echo "selected"; } ?> >ZoomInRight</option>
					<option  disabled value="zoomInUp"    <?php if($content_animation == 'zoomInUp' ) { echo "selected"; } ?> >ZoomInUp</option>
					<option disabled value="zoomInDown"    <?php if($content_animation == 'zoomInDown' ) { echo "selected"; } ?> >ZoomInDown</option>
					<option  disabled value="bounce"    <?php if($content_animation == 'bounce' ) { echo "selected"; } ?> >bounce</option>
					<option disabled value="bounceIn"    <?php if($content_animation == 'bounceIn' ) { echo "selected"; } ?> >bounceIn</option>
					<option disabled value="bounceInLeft"    <?php if($content_animation == 'bounceInLeft' ) { echo "selected"; } ?> >bounceInLeft</option>
					<option disabled value="bounceInRight"    <?php if($content_animation == 'bounceInRight' ) { echo "selected"; } ?> >bounceInRight</option>
					<option disabled value="bounceInUp"    <?php if($content_animation == 'bounceInUp' ) { echo "selected"; } ?> >bounceInUp</option>
					<option disabled value="bounceInDown"    <?php if($content_animation == 'bounceInDown' ) { echo "selected"; } ?> >bounceInDown</option>
					<option disabled value="flash"    <?php if($content_animation == 'flash' ) { echo "selected"; } ?> >flash</option>
					<option disabled value="pulse"    <?php if($content_animation == 'pulse' ) { echo "selected"; } ?> >pulse</option>
					<option disabled value="rubberBand"    <?php if($content_animation == 'rubberBand' ) { echo "selected"; } ?> >rubberBand</option>
					<option disabled value="shake"    <?php if($content_animation == 'shake' ) { echo "selected"; } ?> >shake</option>
					<option disabled value="swing"    <?php if($content_animation == 'swing' ) { echo "selected"; } ?> >swing</option>
					<option disabled value="tada"    <?php if($content_animation == 'tada' ) { echo "selected"; } ?> >tada</option>
					<option disabled value="wobble"    <?php if($content_animation == 'wobble' ) { echo "selected"; } ?> >wobble</option>
					<option disabled value="lightSpeedIn"    <?php if($content_animation == 'lightSpeedIn' ) { echo "selected"; } ?> >lightSpeedIn</option>
					<option disabled value="rollIn"    <?php if($content_animation == 'rollIn' ) { echo "selected"; } ?> >rollIn</option>
						
				</select>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px" href="http://wpshopmart.com/plugins/accordion-pro/" target="_balnk">Available In Premium Version</a> </div>
			
			</td>	
		</tr>
		
		
		
		<script>
		jQuery(function() {
		jQuery(".wpsm_off *").attr("disabled", "disabled").off('click');
		  
		 

		});
		
		</script>
	</tbody>
</table>