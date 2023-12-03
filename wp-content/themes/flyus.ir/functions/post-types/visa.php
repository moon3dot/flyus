<?php

function cptui_register_my_cpts_visa() {

	/**
	 * Post Type: Visa.
	 */

	$labels = [
		"name" => __( "ویزا", "flyus-ir" ),
		"singular_name" => __( "ویزا", "flyus-ir" ),
		"menu_name" => __( "ویزا", "flyus-ir" ),
		"all_items" => __( "همه ی ویزاها", "flyus-ir" ),
		"add_new" => __( "اضافه کردن", "flyus-ir" ),
		"add_new_item" => __( "اضافه کردن", "flyus-ir" ),
		"edit_item" => __( "ویرایش", "flyus-ir" ),
		"new_item" => __( "اضافه کردن", "flyus-ir" ),
		"view_item" => __( "نمایش", "flyus-ir" ),
		"view_items" => __( "نمایش", "flyus-ir" ),
		"search_items" => __( "جستوجو", "flyus-ir" ),
		"not_found" => __( "موردی یافت نشد", "flyus-ir" ),
		"not_found_in_trash" => __( "موردی یافت نشد", "flyus-ir" ),
		"parent" => __( "Parent Visa:", "flyus-ir" ),
		"featured_image" => __( "Featured image for this Visa", "flyus-ir" ),
		"set_featured_image" => __( "Set featured image for this Visa", "flyus-ir" ),
		"remove_featured_image" => __( "Remove featured image for this Visa", "flyus-ir" ),
		"use_featured_image" => __( "Use as featured image for this Visa", "flyus-ir" ),
		"archives" => __( "Visa archives", "flyus-ir" ),
		"insert_into_item" => __( "Insert into Visa", "flyus-ir" ),
		"uploaded_to_this_item" => __( "Uploaded to this Visa", "flyus-ir" ),
		"filter_items_list" => __( "Filter Visa list", "flyus-ir" ),
		"items_list_navigation" => __( "Visa list navigation", "flyus-ir" ),
		"items_list" => __( "Visa list", "flyus-ir" ),
		"attributes" => __( "Visa Attributes", "flyus-ir" ),
		"name_admin_bar" => __( "Visa", "flyus-ir" ),
		"item_published" => __( "Visa published", "flyus-ir" ),
		"item_published_privately" => __( "Visa published privately", "flyus-ir" ),
		"item_reverted_to_draft" => __( "Visa reverted to draft", "flyus-ir" ),
		"item_scheduled" => __( "Visa scheduled", "flyus-ir" ),
		"item_updated" => __( "Visa updated", "flyus-ir" ),
		"parent_item_colon" => __( "Parent Visa:", "flyus-ir" ),
	];

	$args = [
		"label" => __( "Visa", "flyus-ir" ),
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
		"rewrite" => [ "slug" => "visa", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-id",
		"supports" => [ "title", "editor", "thumbnail", "trackbacks", "revisions", "author", "page-attributes", "post-formats" ],
		"show_in_graphql" => false,
		//'taxonomies'=>array('tourcat')
	];

	register_post_type( "visa", $args );
}

add_action( 'init', 'cptui_register_my_cpts_visa' );

