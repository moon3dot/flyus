<?php

function cptui_register_my_cpts_place() {

	/**
	 * Post Type: place.
	 */

	$labels = [
		"name" => __( "بهترین مکان های تفریحی", "flyus-ir" ),
		"singular_name" => __( "مکان های تفریحی", "flyus-ir" ),
		"menu_name" => __( "بهترین مکان های تفریحی", "flyus-ir" ),
		"all_items" => __( "همه ی مکان های تفریحی", "flyus-ir" ),
		"add_new" => __( "اضافه کردن", "flyus-ir" ),
		"add_new_item" => __( "اضافه کردن", "flyus-ir" ),
		"edit_item" => __( "ویرایش", "flyus-ir" ),
		"new_item" => __( "اضافه کردن", "flyus-ir" ),
		"view_item" => __( "نمایش", "flyus-ir" ),
		"view_items" => __( "نمایش", "flyus-ir" ),
		"search_items" => __( "جستوجو", "flyus-ir" ),
		"not_found" => __( "موردی یافت نشد", "flyus-ir" ),
		"not_found_in_trash" => __( "موردی یافت نشد", "flyus-ir" ),
		"parent" => __( "Parent place:", "flyus-ir" ),
		"featured_image" => __( "Featured image for this place", "flyus-ir" ),
		"set_featured_image" => __( "Set featured image for this place", "flyus-ir" ),
		"remove_featured_image" => __( "Remove featured image for this place", "flyus-ir" ),
		"use_featured_image" => __( "Use as featured image for this place", "flyus-ir" ),
		"archives" => __( "place archives", "flyus-ir" ),
		"insert_into_item" => __( "Insert into place", "flyus-ir" ),
		"uploaded_to_this_item" => __( "Uploaded to this place", "flyus-ir" ),
		"filter_items_list" => __( "Filter place list", "flyus-ir" ),
		"items_list_navigation" => __( "place list navigation", "flyus-ir" ),
		"items_list" => __( "place list", "flyus-ir" ),
		"attributes" => __( "place Attributes", "flyus-ir" ),
		"name_admin_bar" => __( "place", "flyus-ir" ),
		"item_published" => __( "place published", "flyus-ir" ),
		"item_published_privately" => __( "place published privately", "flyus-ir" ),
		"item_reverted_to_draft" => __( "place reverted to draft", "flyus-ir" ),
		"item_scheduled" => __( "place scheduled", "flyus-ir" ),
		"item_updated" => __( "place updated", "flyus-ir" ),
		"parent_item_colon" => __( "Parent place:", "flyus-ir" ),
	];

	$args = [
		"label" => __( "place", "flyus-ir" ),
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
		"rewrite" => [ "slug" => "place", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-id",
		"supports" => [ "title", "editor", "thumbnail", "trackbacks", "revisions", "author", "page-attributes", "post-formats" ],
		"show_in_graphql" => false,
	    'taxonomies'=>array('cities')
	];

	register_post_type( "place", $args );
}

add_action( 'init', 'cptui_register_my_cpts_place' );

