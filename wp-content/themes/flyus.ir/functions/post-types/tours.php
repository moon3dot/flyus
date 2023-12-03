<?php

function cptui_register_my_cpts_tours() {

	/**
	 * Post Type: Tours.
	 */

	$labels = [
		"name" => __( "تور ", "flyus-ir" ),
		"singular_name" => __( "تور", "flyus-ir" ),
		"menu_name" => __( "تور", "flyus-ir" ),
		"all_items" => __( "همه ی تور ها", "flyus-ir" ),
		"add_new" => __( "اضافه کردن", "flyus-ir" ),
		"add_new_item" => __( "اضافه کردن", "flyus-ir" ),
		"edit_item" => __( "ویرایش", "flyus-ir" ),
		"new_item" => __( "اضافه کردن", "flyus-ir" ),
		"view_item" => __( "نمایش", "flyus-ir" ),
		"view_items" => __( "نمایش", "flyus-ir" ),
		"search_items" => __( "جستوجو", "flyus-ir" ),
		"not_found" => __( "موردی یافت نشد", "flyus-ir" ),
		"not_found_in_trash" => __( "موردی یافت نشد", "flyus-ir" ),
		"parent" => __( "Parent Tours:", "flyus-ir" ),
		"featured_image" => __( "Featured image for this Tour", "flyus-ir" ),
		"set_featured_image" => __( "Set featured image for this Tour", "flyus-ir" ),
		"remove_featured_image" => __( "Remove featured image for this Tour", "flyus-ir" ),
		"use_featured_image" => __( "Use as featured image for this Tour", "flyus-ir" ),
		"archives" => __( "Tours archives", "flyus-ir" ),
		"insert_into_item" => __( "Insert into Tour", "flyus-ir" ),
		"uploaded_to_this_item" => __( "Uploaded to this Tour", "flyus-ir" ),
		"filter_items_list" => __( "Filter Tours list", "flyus-ir" ),
		"items_list_navigation" => __( "Tours list navigation", "flyus-ir" ),
		"items_list" => __( "Tours list", "flyus-ir" ),
		"attributes" => __( "Tours Attributes", "flyus-ir" ),
		"name_admin_bar" => __( "Tours", "flyus-ir" ),
		"item_published" => __( "Tour published", "flyus-ir" ),
		"item_published_privately" => __( "Tour published privately", "flyus-ir" ),
		"item_reverted_to_draft" => __( "Tour reverted to draft", "flyus-ir" ),
		"item_scheduled" => __( "Tour scheduled", "flyus-ir" ),
		"item_updated" => __( "Tour updated", "flyus-ir" ),
		"parent_item_colon" => __( "Parent Tours:", "flyus-ir" ),
	];

	$args = [
		"label" => __( "Tours", "flyus-ir" ),
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
		"rewrite" => [ "slug" => "tours", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-multisite",
		"supports" => [ "title", "editor", "thumbnail", "trackbacks", "revisions", "author", "page-attributes", "post-formats" ],
		"show_in_graphql" => false,
	];

	register_post_type( "tours", $args );
}

add_action( 'init', 'cptui_register_my_cpts_tours' );

add_action( 'init', 'build_taxonomies_tour', 0 );
function build_taxonomies_tour() {
    register_taxonomy( 'tourcat', 'tours', array( 'hierarchical' => true, 'label' => 'دسته بندی تور ها', 'query_var' => true, 'rewrite' => true ) );
}