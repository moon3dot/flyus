<?php

function cptui_register_my_cpts_trip() {

	/**
	 * Post Type: city.
	 */

	$labels = [
		"name" => __( "راهنمای سفر", "flyus-ir" ),
		"singular_name" => __( "راهنمای سفر", "flyus-ir" ),
		"menu_name" => __( "راهنمای سفر", "flyus-ir" ),
		"all_items" => __( "همه ی سفرها", "flyus-ir" ),
		"add_new" => __( "اضافه کردن", "flyus-ir" ),
		"add_new_item" => __( "اضافه کردن", "flyus-ir" ),
		"edit_item" => __( "ویرایش", "flyus-ir" ),
		"new_item" => __( "اضافه کردن", "flyus-ir" ),
		"view_item" => __( "نمایش", "flyus-ir" ),
		"view_items" => __( "نمایش", "flyus-ir" ),
		"search_items" => __( "جستوجو", "flyus-ir" ),
		"not_found" => __( "موردی یافت نشد", "flyus-ir" ),
		"not_found_in_trash" => __( "موردی یافت نشد", "flyus-ir" ),
		"parent" => __( "Parent city:", "flyus-ir" ),
		"featured_image" => __( "Featured image for this city", "flyus-ir" ),
		"set_featured_image" => __( "Set featured image for this city", "flyus-ir" ),
		"remove_featured_image" => __( "Remove featured image for this city", "flyus-ir" ),
		"use_featured_image" => __( "Use as featured image for this city", "flyus-ir" ),
		"archives" => __( "city archives", "flyus-ir" ),
		"insert_into_item" => __( "Insert into city", "flyus-ir" ),
		"uploaded_to_this_item" => __( "Uploaded to this city", "flyus-ir" ),
		"filter_items_list" => __( "Filter city list", "flyus-ir" ),
		"items_list_navigation" => __( "city list navigation", "flyus-ir" ),
		"items_list" => __( "city list", "flyus-ir" ),
		"attributes" => __( "city Attributes", "flyus-ir" ),
		"name_admin_bar" => __( "city", "flyus-ir" ),
		"item_published" => __( "city published", "flyus-ir" ),
		"item_published_privately" => __( "city published privately", "flyus-ir" ),
		"item_reverted_to_draft" => __( "city reverted to draft", "flyus-ir" ),
		"item_scheduled" => __( "city scheduled", "flyus-ir" ),
		"item_updated" => __( "city updated", "flyus-ir" ),
		"parent_item_colon" => __( "Parent city:", "flyus-ir" ),
	];

	$args = [
		"label" => __( "trip", "flyus-ir" ),
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
		"rewrite" => [ "slug" => "trip", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-id",
		"supports" => [ "title", "editor", "thumbnail", "trackbacks", "revisions", "author", "page-attributes", "post-formats" ],
		"show_in_graphql" => false,
	];

	register_post_type( "trip", $args );
}

add_action( 'init', 'cptui_register_my_cpts_trip' );

add_action( 'init', 'build_taxonomies_trip', 0 );
function build_taxonomies_trip() {
    register_taxonomy( 'tripcat', 'trip', array( 'hierarchical' => true, 'label' => 'دسته بندی  راهنمای سفر', 'query_var' => true, 'rewrite' => true ) );
}
