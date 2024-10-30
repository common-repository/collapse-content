<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<script>
	var j = 1000;
	function add_new_accordion(){
	var output = 	'<li class="wpsm_ac-panel single_acc_box" >'+
		'<span class="ac_label"><?php _e("Collapsed Title",wpshopmart_collapsed_c_text_domain); ?></span>'+
		'<input type="text" id="collapsed_title[]" name="collapsed_title[]" value="" placeholder="Enter Collapsed Title Here" class="wpsm_ac_label_text">'+
		'<span class="ac_label"l><?php _e("Collapsed Description",wpshopmart_collapsed_c_text_domain); ?></span>'+
		'<textarea  id="collapsed_desc[]" name="collapsed_desc[]"  placeholder="Enter Collapsed Description Here" class="wpsm_ac_label_text"></textarea>'+
		'<a type="button" class="btn btn-primary btn-block html_editor_button" data-remodal-target="modal" href="#"  id="'+j+'" onclick="open_editor('+j+')">Use WYSIWYG Editor </a>'+
		'<a class="remove_button" href="#delete" id="remove_bt"><i class="fa fa-trash-o"></i></a>'+
		'</li>';
	jQuery(output).hide().appendTo("#accordion_panel").slideDown("slow");
	j++;
	call_icon();
	}
	jQuery(document).ready(function(){

	  jQuery('#accordion_panel').sortable({
	  
	   revert: true,
	 
	  });
	});
	
	
</script>
<script>
	jQuery(function(jQuery)
		{
			var accordion = 
			{
				accordion_ul: '',
				init: function() 
				{
					this.accordion_ul = jQuery('#accordion_panel');

					this.accordion_ul.on('click', '.remove_button', function() {
					if (confirm('Are you sure you want to delete this?')) {
						jQuery(this).parent().slideUp(600, function() {
							jQuery(this).remove();
						});
					}
					return false;
					});
					 jQuery('#delete_all_acc').on('click', function() {
						if (confirm('Are you sure you want to delete all the Accordions?')) {
							jQuery(".single_acc_box").slideUp(600, function() {
								jQuery(".single_acc_box").remove();
							});
							jQuery('html, body').animate({ scrollTop: 0 }, 'fast');
							
						}
						return false;
					});
					
			   }
			};
		accordion.init();
	});
</script>


<script>
	
	
	function open_editor(id){
		

		var value = jQuery("#"+id).closest('li').find('textarea').val();
		
		 jQuery("#get_text-html").click();
		jQuery("#get_text").val(value);
		
		jQuery("#get_id").val(jQuery("#"+id).attr('id'));
	 }
	
	
	function insert_html(){
		jQuery("#get_text-html").click();
		var html_text = jQuery("#get_text").val();
		var id = jQuery("#get_id").val();
		jQuery("#"+id).closest('li').find('textarea').val(html_text);
			
	}
	
	
</script>