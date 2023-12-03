<?php

add_action( 'cmb2_admin_init', 'fly_register_theme_options_tour' );

function fly_register_theme_options_tour() {

    $touroptions = new_cmb2_box( array(
        'id'           => 'fly_option_tour',
        'title'        => esc_html__( 'تنظیمات صفحه تور', 'fly' ),
        'object_types' => array( 'options-page' ),
        'option_key'      => 'fly_tour_options', // The option key and admin menu page slug.
        'parent_slug'     => 'fly-settings-theme',
        'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
    ) );

// شروع تنظیمات بنر صفحه تور 

    $banner_tour = $touroptions->add_field( array(
        'id'          => 'fly_tour_banner_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'تنظیمات بنر ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $touroptions->add_group_field( $banner_tour, array(
        'name' => 'تصویر بک گراند',
        'id'   => 'fly_tour_banner_img_option',
        'type' => 'file',
    ) );
    
    $touroptions->add_group_field( $banner_tour, array(
        'name' => ' عنوان اول',
        'id'   => 'fly_tour_banner_title1_option',
        'type' => 'text',
        
    ) );
    $touroptions->add_group_field( $banner_tour, array(
        'name' => 'عنوان دوم',
        'id'   => 'fly_tour_banner_title2_option',
        'type' => 'text',
        
    ) );


 // شروع تنظیمات بخش  سایر خدمات
 $touroptions->add_field( array(
    'name'    => 'عنوان سایر خدمات ',
    'default' => 'سایر خدمات فلای آس  ',
    'id'      => 'fly_tour_services_main_title_options',
    'type'    => 'text',
) );
$touroptions->add_field( array(
    'name'    => ' توضیحات پایین عنوان  ',
    'id'      => 'fly_tour_services_main_desc_options',
    'type'    => 'textarea',
) );
$services_tour = $touroptions->add_field( array(
    'id'          => 'fly_tour_services_options',
    'type'        => 'group',
    'repeatable'  => true, // use false if you want non-repeatable group
    'options'     => array(
        'group_title'       => __( 'سایر خدمات ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'sortable'          => true,
        'closed'         => true, // true to have the groups closed by default
        'add_button'        => __( 'افزودن خدمت', 'cmb2' ),
        'remove_button'     => __( 'حذف خدمت', 'cmb2' ),
        // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
    ),
) );

$touroptions->add_group_field( $services_tour, array(
    'name' => ' آیکون',
    'id'   => 'fly_tour_services_svg_option',
    'type' => 'file',

) );
$touroptions->add_group_field(  $services_tour, array(
    'name' => 'عنوان خدمت',
    'id'   => 'fly_tour_services_title_option',
    'type'    => 'text',
    
) );
$touroptions->add_group_field(  $services_tour, array(
    'name' => 'توضیحات خدمت',
    'id'   => 'fly_tour_services_desc_option',
    'type'    => 'textarea',
    
) );
$touroptions->add_group_field(  $services_tour, array(
    'name' => 'لینک خدمت',
    'id'   => 'fly_tour_services_link_option',
    'type'    => 'text_url',
    
) );

$touroptions->add_field( array(
    'name'    => 'عنوان  گارانتی بهترین قیمت ',
    'default' => 'گارانتی بهترین قیمت',
    'id'      => 'fly_tour_guaranti_main_title_options',
    'type'    => 'text'
) );
$touroptions->add_field( array(
    'name'    => '  توضیحات پایین عنوان بهترین قیمت  ',
    'id'      => 'fly_tour_guaranti_main_desc_options',
    'type'    => 'textarea'
) );

}
    
 

function fly_tour_get_option( $key = '', $default = false ) {
    if ( function_exists( 'cmb2_get_option' ) ) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option( 'fly_tour_options', $key, $default );
    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option( 'fly_tour_options', $default );

    $val = $default;

    if ( 'all' == $key ) {
        $val = $opts;
    } elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
        $val = $opts[ $key ];
    }

    return $val;
}