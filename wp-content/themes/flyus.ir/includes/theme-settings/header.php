<?php

add_action( 'cmb2_admin_init', 'fly_register_theme_options_header' );

function fly_register_theme_options_header() {

    $headeroptions = new_cmb2_box( array(
        'id'           => 'fly_option_header',
        'title'        => esc_html__( 'تنظیمات بخش هدر', 'fly' ),
        'object_types' => array( 'options-page' ),
        'option_key'      => 'fly_header_options', // The option key and admin menu page slug.
        'parent_slug'     => 'fly-settings-theme',
        'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
    ) );


    $item_header = $headeroptions->add_field( array(
        'id'          => 'fly_header_item_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'تنظیمات هدر ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

  
    
    $headeroptions->add_group_field( $item_header, array(
        'name' => ' عنوان دکمه  پیگیری خرید ',
        'id'   => 'fly_header_btn1_title_option',
        'default' => '  پیگیری خرید  ',
        'type' => 'text',
        
    ) );
    $headeroptions->add_group_field( $item_header, array(
        'name' => ' لینک دکمه  پیگیری خرید ',
        'id'   => 'fly_header_btn1_link_option',
        'type' => 'text_url',
        
    ) );
    $headeroptions->add_group_field( $item_header, array(
        'name' => 'عنوان دکمه  ورود و ثبت نام ',
        'id'   => 'fly_header_btn2_title_option',
        'default' => '  ورود و ثبت نام  ',
        'type' => 'text',
        
    ) );
    $headeroptions->add_group_field( $item_header, array(
        'name' => 'لینک دکمه  ورود و ثبت نام ',
        'id'   => 'fly_header_btn2_link_option',
        'type' => 'text_url',
        
    ) );

    $headeroptions->add_group_field( $item_header, array(
        'name' => 'عنوان دکمه  ورود در منوی مویابل ',
        'id'   => 'fly_header_btn3_title_option',
        'default' => '  ورود ',
        'type' => 'text',
        
    ) );
    $headeroptions->add_group_field( $item_header, array(
        'name' => 'لینک دکمه  ورود در منوی مویابل ',
        'id'   => 'fly_header_btn3_link_option',
        'type' => 'text_url',
        
    ) );

    $headeroptions->add_group_field( $item_header, array(
        'name' => 'عنوان دکمه  ثبت نام در منوی مویابل ',
        'id'   => 'fly_header_btn4_title_option',
        'default' => '  ثبت نام ',
        'type' => 'text',
        
    ) );
    $headeroptions->add_group_field( $item_header, array(
        'name' => 'لینک دکمه  ثبت نام در منوی مویابل ',
        'id'   => 'fly_header_btn4_link_option',
        'type' => 'text_url',
        
    ) );
    $headeroptions->add_group_field( $item_header, array(
        'name' => 'عنوان  تماس با ما در منوی مویابل ',
        'id'   => 'fly_header_contact_title_option',
        'default' => ' تماس با ما ',
        'type' => 'text',
        
    ) );
    $headeroptions->add_group_field( $item_header, array(
        'name' => 'لینک  تماس با ما در منوی مویابل ',
        'id'   => 'fly_header_contact_link_option',
        'type' => 'text_url',
        
    ) );
    $headeroptions->add_group_field( $item_header, array(
        'name' => 'عنوان درباره ما در منوی مویابل ',
        'id'   => 'fly_header_about_title_option',
        'default' => '  درباره ما ',
        'type' => 'text',
        
    ) );
    $headeroptions->add_group_field( $item_header, array(
        'name' => 'لینک  دریاره ما در منوی مویابل ',
        'id'   => 'fly_header_about_link_option',
        'type' => 'text_url',
        
    ) );




}
    
 

function fly_header_get_option( $key = '', $default = false ) {
    if ( function_exists( 'cmb2_get_option' ) ) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option( 'fly_header_options', $key, $default );
    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option( 'fly_header_options', $default );

    $val = $default;

    if ( 'all' == $key ) {
        $val = $opts;
    } elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
        $val = $opts[ $key ];
    }

    return $val;
}