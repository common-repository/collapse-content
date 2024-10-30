<?php

			$labels = array(
				'name'                => _x( 'Collapse Content', 'Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'singular_name'       => _x( 'Collapse Content', 'Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'menu_name'           => __( 'Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'parent_item_colon'   => __( 'Parent Item:', wpshopmart_collapsed_c_text_domain ),
				'all_items'           => __( 'All Collapse', wpshopmart_collapsed_c_text_domain ),
				'view_item'           => __( 'View Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'add_new_item'        => __( 'Add New Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'add_new'             => __( 'Add New Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'edit_item'           => __( 'Edit Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'update_item'         => __( 'Update Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'search_items'        => __( 'Search Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'not_found'           => __( 'No Collapse Content Found', wpshopmart_collapsed_c_text_domain ),
				'not_found_in_trash'  => __( 'No Collapse Content found in Trash', wpshopmart_collapsed_c_text_domain ),
			);
			$args = array(
				'label'               => __( 'Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'description'         => __( 'Collapse Content', wpshopmart_collapsed_c_text_domain ),
				'labels'              => $labels,
				'supports'            => array( 'title', '', '', '', '', '', '', '', '', '', '', ),
				//'taxonomies'          => array( 'category', 'post_tag' ),
				 'hierarchical'        => false,
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => false,
				'show_in_admin_bar'   => false,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-feedback',
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => false,
				'capability_type'     => 'page',
			);
			register_post_type( 'collapsed_content', $args );
			
 ?>