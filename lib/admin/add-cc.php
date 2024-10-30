<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div style=" overflow: hidden;padding: 10px;display:block;">
<style>
	.html_editor_button{
		border-radius:0px;
		background-color: #9C9C9C;
		border-color: #9C9C9C;
		margin-bottom:20px;
	}
	</style>
	<h3><?php _e('Add Collapsed Content ',wpshopmart_collapsed_c_text_domain); ?></h3>
	<input type="hidden" name="cc_save_data_action" value="cc_save_data_action" />
	<ul class="clearfix" id="accordion_panel">
	<?php
			$i=1;
			$collapsed_data = unserialize(get_post_meta( $post->ID, 'wpsm_collapse_data', true));
			$TotalCount =  get_post_meta( $post->ID, 'wpsm_collapse_count', true );
			if($TotalCount) 
			{
				if($TotalCount!=-1)
				{
					foreach($collapsed_data as $collapsed_single_data)
					{
						 $collapsed_title = $collapsed_single_data['collapsed_title'];
						 $collapsed_desc = $collapsed_single_data['collapsed_desc'];
						?>
						<li class="wpsm_ac-panel single_acc_box" >
							<span class="ac_label"><?php _e('Collapsed Content Title',wpshopmart_collapsed_c_text_domain); ?></span>
							<input type="text" id="collapsed_title[]" name="collapsed_title[]" value="<?php echo esc_attr($collapsed_title); ?>" placeholder="Enter Collapsed Title Here" class="wpsm_ac_label_text">
							<span class="ac_label"><?php _e('Collapsed Content Description',wpshopmart_collapsed_c_text_domain); ?></span>
							<textarea  id="collapsed_desc[]" name="collapsed_desc[]"  placeholder="Enter Collapsed Description Here" class="wpsm_ac_label_text"><?php echo htmlentities($collapsed_desc); ?></textarea>
							<a type="button" class="btn btn-primary btn-block html_editor_button" data-remodal-target="modal" href="#" id="<?php echo $i; ?>"  onclick="open_editor(<?php echo $i; ?>)">Use WYSIWYG Editor </a>
							
							
							
							<a class="remove_button" href="#delete" id="remove_bt" ><i class="fa fa-trash-o"></i></a>
							
						</li>
						<?php 
						$i++;
					} // end of foreach
				}else{
				echo "<h2>No Collapsed Content Found</h2>";
				}
			}
			else 
			{
				  for($i=1; $i<=3; $i++)
				  {
					  ?>
					 <li class="wpsm_ac-panel single_acc_box" >
						<span class="ac_label"><?php _e('Collapsed Title',wpshopmart_collapsed_c_text_domain); ?></span>
						<input type="text" id="collapsed_title[]" name="collapsed_title[]" value="Collapsed Sample Title" placeholder="Enter Collapsed Title Here" class="wpsm_ac_label_text">
						<span class="ac_label"><?php _e('Collapsed Description',wpshopmart_collapsed_c_text_domain); ?></span>
						
						<textarea  id="collapsed_desc[]" name="collapsed_desc[]"  placeholder="Enter Collapsed Description Here" class="wpsm_ac_label_text">Collapsed Sample Description</textarea>
						<a type="button" class="btn btn-primary btn-block html_editor_button" data-remodal-target="modal" href="#" id="<?php echo $i; ?>"  onclick="open_editor(<?php echo $i; ?>)">Use WYSIWYG Editor </a>
						
						<a class="remove_button" href="#delete" id="remove_bt" ><i class="fa fa-trash-o"></i></a>
						
					</li>
					 <?php
				}
			}
			?>
	</ul>

<!-- Modal Popup For Editor -->
<div class="remodal" data-remodal-options=" closeOnOutsideClick: false" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
	<h2 id="modal1Title">Collapse Content Editor</h2>
	<p id="modal1Desc">
	  <?php
		$content = '';
		$editor_id = 'get_text';
		wp_editor( $content, $editor_id );
	?>
	<input type="hidden" value="" id="get_id" />
	</p>
  </div>
  <br>
  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
  <button data-remodal-action="confirm" class="remodal-confirm" onclick="insert_html()">OK</button>
</div>
	
	</div>
	<div style=" overflow: hidden;padding: 10px;display:block;">  


<a class="wpsm_ac-panel add_wpsm_ac_new" id="add_new_ac" onclick="add_new_accordion()"   >
	<?php _e('Add New Collapse', wpshopmart_collapsed_c_text_domain); ?>
</a>
<a  style="float: left;padding:10px !important;background:#31a3dd;" class=" add_wpsm_ac_new delete_all_acc" id="delete_all_acc"    >
	<i style="font-size:57px;"class="fa fa-trash-o"></i>
	<span style="display:block"><?php _e('Delete All',wpshopmart_collapsed_c_text_domain); ?></span>
</a>
</div>


<?php require('add-cc-js-footer.php'); ?>