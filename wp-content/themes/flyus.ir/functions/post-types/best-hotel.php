<?php

function cptui_register_my_cpts_hotel() {

	/**
	 * Post Type: hotel.
	 */

	$labels = [
		"name" => __( "بهترین هتل ها", "flyus-ir" ),
		"singular_name" => __( "هتل ها", "flyus-ir" ),
		"menu_name" => __( "بهترین هتل ها", "flyus-ir" ),
		"all_items" => __( "همه ی هتل ها", "flyus-ir" ),
		"add_new" => __( "اضافه کردن", "flyus-ir" ),
		"add_new_item" => __( "اضافه کردن", "flyus-ir" ),
		"edit_item" => __( "ویرایش", "flyus-ir" ),
		"new_item" => __( "اضافه کردن", "flyus-ir" ),
		"view_item" => __( "نمایش", "flyus-ir" ),
		"view_items" => __( "نمایش", "flyus-ir" ),
		"search_items" => __( "جستوجو", "flyus-ir" ),
		"not_found" => __( "موردی یافت نشد", "flyus-ir" ),
		"not_found_in_trash" => __( "موردی یافت نشد", "flyus-ir" ),
		"parent" => __( "Parent hotel:", "flyus-ir" ),
		"featured_image" => __( "Featured image for this hotel", "flyus-ir" ),
		"set_featured_image" => __( "Set featured image for this hotel", "flyus-ir" ),
		"remove_featured_image" => __( "Remove featured image for this hotel", "flyus-ir" ),
		"use_featured_image" => __( "Use as featured image for this hotel", "flyus-ir" ),
		"archives" => __( "hotel archives", "flyus-ir" ),
		"insert_into_item" => __( "Insert into hotel", "flyus-ir" ),
		"uploaded_to_this_item" => __( "Uploaded to this hotel", "flyus-ir" ),
		"filter_items_list" => __( "Filter hotel list", "flyus-ir" ),
		"items_list_navigation" => __( "hotel list navigation", "flyus-ir" ),
		"items_list" => __( "hotel list", "flyus-ir" ),
		"attributes" => __( "hotel Attributes", "flyus-ir" ),
		"name_admin_bar" => __( "hotel", "flyus-ir" ),
		"item_published" => __( "hotel published", "flyus-ir" ),
		"item_published_privately" => __( "hotel published privately", "flyus-ir" ),
		"item_reverted_to_draft" => __( "hotel reverted to draft", "flyus-ir" ),
		"item_scheduled" => __( "hotel scheduled", "flyus-ir" ),
		"item_updated" => __( "hotel updated", "flyus-ir" ),
		"parent_item_colon" => __( "Parent hotel:", "flyus-ir" ),
	];

	$args = [
		"label" => __( "hotel", "flyus-ir" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => false,
		"rewrite" => [ "slug" => "hotel", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-id",
		"supports" => [ "title", "editor", "thumbnail", "trackbacks", "revisions", "author", "page-attributes", "post-formats" ],
		"show_in_graphql" => false,
	    'taxonomies'=>array('cities')
	];

	register_post_type( "hotel", $args );
}

add_action( 'init', 'cptui_register_my_cpts_hotel' );

