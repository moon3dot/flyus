<?php

add_action( 'cmb2_admin_init', 'fly_register_theme_options_footer' );

function fly_register_theme_options_footer() {

    $footeroptions = new_cmb2_box( array(
        'id'           => 'fly_option_footer',
        'title'        => esc_html__( 'تنظیمات بخش فوتر', 'fly' ),
        'object_types' => array( 'options-page' ),
        'option_key'      => 'fly_footer_options', // The option key and admin menu page slug.
        'parent_slug'     => 'fly-settings-theme',
        'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
    ) );

// شروع تنظیمات بنر صفحه تور 

    $item_footer = $footeroptions->add_field( array(
        'id'          => 'fly_footer_item_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'تنظیمات فوتر ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

  
    
    $footeroptions->add_group_field( $item_footer, array(
        'name' => ' عنوان ستون اول',
        'id'   => 'fly_footer_title1_option',
        'default' => ' خدمات ',
        'type' => 'text',
        
    ) );
    $footeroptions->add_group_field( $item_footer, array(
        'name' => 'عنوان ستون دوم',
        'id'   => 'fly_footer_title2_option',
        'default' => ' قلم ها ',
        'type' => 'text',
        
    ) );
    $footeroptions->add_group_field( $item_footer, array(
        'name' => 'عنوان ستون سوم',
        'id'   => 'fly_footer_title3_option',
        'default' => ' خدمات پس از فروش ',
        'type' => 'text',
        
    ) );
    $footeroptions->add_group_field( $item_footer, array(
        'name' => 'عنوان ستون چهارم',
        'id'   => 'fly_footer_title4_option',
        'default' => ' پشتیبانی ',
        'type' => 'text',
        
    ) );
    $footeroptions->add_group_field( $item_footer, array(
        'name' => 'عنوان ستون پنجم',
        'id'   => 'fly_footer_title5_option',
        'default' => ' ارتباط با ما ',
        'type' => 'text',
        
    ) );
    $footeroptions->add_group_field( $item_footer, array(
        'name' => 'متن حق کپی رایت',
        'id'   => 'fly_footer_copy_option',
        'default' => ' تمام حقوق متعلق به شرکت فلای است © ',
        'type' => 'textarea',
        
    ) );




}
    
 

function fly_footer_get_option( $key = '', $default = false ) {
    if ( function_exists( 'cmb2_get_option' ) ) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option( 'fly_footer_options', $key, $default );
    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option( 'fly_footer_options', $default );

    $val = $default;

    if ( 'all' == $key ) {
        $val = $opts;
    } elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
        $val = $opts[ $key ];
    }

    return $val;
}