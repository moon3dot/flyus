<?php

function cptui_register_my_cpts_food() {

	/**
	 * Post Type: food.
	 */

	$labels = [
		"name" => __( "بهترین غذا ها", "flyus-ir" ),
		"singular_name" => __( "غذا ها", "flyus-ir" ),
		"menu_name" => __( "بهترین غذا ها", "flyus-ir" ),
		"all_items" => __( "همه ی غذا ها", "flyus-ir" ),
		"add_new" => __( "اضافه کردن", "flyus-ir" ),
		"add_new_item" => __( "اضافه کردن", "flyus-ir" ),
		"edit_item" => __( "ویرایش", "flyus-ir" ),
		"new_item" => __( "اضافه کردن", "flyus-ir" ),
		"view_item" => __( "نمایش", "flyus-ir" ),
		"view_items" => __( "نمایش", "flyus-ir" ),
		"search_items" => __( "جستوجو", "flyus-ir" ),
		"not_found" => __( "موردی یافت نشد", "flyus-ir" ),
		"not_found_in_trash" => __( "موردی یافت نشد", "flyus-ir" ),
		"parent" => __( "Parent food:", "flyus-ir" ),
		"featured_image" => __( "Featured image for this food", "flyus-ir" ),
		"set_featured_image" => __( "Set featured image for this food", "flyus-ir" ),
		"remove_featured_image" => __( "Remove featured image for this food", "flyus-ir" ),
		"use_featured_image" => __( "Use as featured image for this food", "flyus-ir" ),
		"archives" => __( "food archives", "flyus-ir" ),
		"insert_into_item" => __( "Insert into food", "flyus-ir" ),
		"uploaded_to_this_item" => __( "Uploaded to this food", "flyus-ir" ),
		"filter_items_list" => __( "Filter food list", "flyus-ir" ),
		"items_list_navigation" => __( "food list navigation", "flyus-ir" ),
		"items_list" => __( "food list", "flyus-ir" ),
		"attributes" => __( "food Attributes", "flyus-ir" ),
		"name_admin_bar" => __( "food", "flyus-ir" ),
		"item_published" => __( "food published", "flyus-ir" ),
		"item_published_privately" => __( "food published privately", "flyus-ir" ),
		"item_reverted_to_draft" => __( "food reverted to draft", "flyus-ir" ),
		"item_scheduled" => __( "food scheduled", "flyus-ir" ),
		"item_updated" => __( "food updated", "flyus-ir" ),
		"parent_item_colon" => __( "Parent food:", "flyus-ir" ),
	];

	$args = [
		"label" => __( "food", "flyus-ir" ),
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
		"rewrite" => [ "slug" => "food", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-id",
		"supports" => [ "title", "editor", "thumbnail", "trackbacks", "revisions", "author", "page-attributes", "post-formats" ],
		"show_in_graphql" => false,
	    
	];

	register_post_type( "food", $args );
}

add_action( 'init', 'cptui_register_my_cpts_food' );
add_action( 'init', 'build_taxonomies_city', 0 );
function build_taxonomies_city() {
    register_taxonomy( 'cities', 'food', array( 'hierarchical' => true, 'label' => 'دسته بندی شهر ها', 'query_var' => true, 'rewrite' => true ) );
}

