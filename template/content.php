<?php 
	if ( ! defined( 'ABSPATH' ) ) exit;
    $ac_post_type = "collapsed_content";
	
    $AllCC = array(  'p' => $WPSM_CC_ID, 'post_type' => $ac_post_type, 'orderby' => 'ASC');
    $loop = new WP_Query( $AllCC );
	
	while ( $loop->have_posts() ) : $loop->the_post();
		//get the post id
		$post_id = get_the_ID();
		$De_Settings = unserialize(get_option('wpsm_cc_default_Settings'));
		$Wpsm_collapsed_Settings = unserialize(get_post_meta( $post_id, 'Wpsm_collapsed_Settings', true));
		if(count($Wpsm_collapsed_Settings)) 
		{
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
				if(isset($Wpsm_collapsed_Settings[$option_name])) 
					${"" . $option_name}  = $Wpsm_collapsed_Settings[$option_name];
				else
					${"" . $option_name}  = $default_value;
			}
		}		
		
		$collapsed_data = unserialize(get_post_meta( get_the_ID(), 'wpsm_collapse_data', true));
		$TotalCount =  get_post_meta( get_the_ID(), 'wpsm_collapse_count', true );
		if($TotalCount>0) 
		{
		?>
			
			<style>
				<?php require('style.php'); ?>	
			</style>
			<div class="wpsm_panel-group" id="wpsm_accordion_<?php echo $post_id; ?>" >
				<?php 	
				$i=1;
				foreach($collapsed_data as $collapsed_single_data)
				{
					$collapsed_title = $collapsed_single_data['collapsed_title'];
						 $collapsed_desc = $collapsed_single_data['collapsed_desc'];
					 $i;
					
					 switch($expand_option){
					    case "1":
						$j=1;
						break;
						case "2":
						 $j=$i;
						break;
						case "3":
						 $j=0;
						break;
					 }
					 
					?>
				
					<!-- Inner panel Start -->
					<div class="wpsm_panel wpsm_panel-default">
						<div class="wpsm_panel-heading" role="tab" >
						  <h4 class="wpsm_panel-title">
							<a  class="<?php if($i!=1){ echo "collapsed"; } ?>"  data-toggle="collapse" data-parent="<?php if($enable_toggle=="no") { ?>#wpsm_accordion_<?php echo $post_id; ?> <?php } ?>" href="#ac_<?php echo $post_id; ?>_collapse<?php echo $i; ?>"  >
								<?php if($op_cl_icon == 'yes' ) 
								{ ?>
									<span class="ac_open_cl_icon fa fa-<?php if($i==$j){ echo "angle-down"; } else { echo "angle-right"; } ?>"></span>
									
								<?php
								} ?> 
								<span class="ac_title_class">
									<?php if($collapsed_title == '' ) { echo "no title";  } else { echo esc_attr($collapsed_title); } ?>
								</span>
							</a>
						  </h4>
						</div>
						<div id="ac_<?php echo $post_id; ?>_collapse<?php echo $i; ?>" class="wpsm_panel-collapse collapse collapse_<?php echo $post_id; ?> <?php if($i==$j){ echo "in"; } ?>"  >
						  <div class="wpsm_panel-body">
							
							<?php
							$collapsed_desc = str_replace('&nbsp;', ' <br />', $collapsed_desc);
						  echo do_shortcode($collapsed_desc); ?>
						  </div>
						</div>
					</div>
					<!-- Inner panel End -->
					
				<?php
				 $i++;
				}
				?>
			</div>
			<?php
		}
		else{
			echo "<h3> No Collapse Content Data Found </h3>";
		}
	endwhile; ?>
	
	<script>
	jQuery(document).ready(function() {
		
			jQuery('.collapse_<?php echo $post_id; ?>').on('shown.bs.collapse', function(){jQuery(this).parent().find(".fa-angle-right").removeClass("fa-angle-down").addClass("fa-angle-down"); jQuery(this).parent().find(".wpsm_panel-heading").addClass("acc-a"); }).on('hidden.bs.collapse', function(){jQuery(this).parent().find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-right"); jQuery(this).parent().find(".wpsm_panel-heading").removeClass("acc-a");});
		
		});
	</script>