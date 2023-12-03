<?php

add_action( 'cmb2_admin_init', 'fly_register_theme_options_insurance' );

function fly_register_theme_options_insurance() {

    $insuranceoptions = new_cmb2_box( array(
        'id'           => 'fly_option_insurance',
        'title'        => esc_html__( 'تنظیمات صفحه بیمه', 'fly' ),
        'object_types' => array( 'options-page' ),
        'option_key'      => 'fly_insurance_options', // The option key and admin menu page slug.
        'parent_slug'     => 'fly-settings-theme',
        'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
    ) );

// شروع تنظیمات بنر صفحه بیمه 

    $banner_insurance = $insuranceoptions->add_field( array(
        'id'          => 'fly_insurance_banner_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'تنظیمات بنر ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $insuranceoptions->add_group_field( $banner_insurance, array(
        'name' => 'تصویر بک گراند',
        'id'   => 'fly_insurance_banner_img_option',
        'type' => 'file',
    ) );
    
    $insuranceoptions->add_group_field( $banner_insurance, array(
        'name' => 'عنوان',
        'id'   => 'fly_insurance_banner_title_option',
        'type' => 'text',
        
    ) );
    $insuranceoptions->add_group_field( $banner_insurance, array(
        'name' => 'زیر عنوان',
        'id'   => 'fly_insurance_banner_subtitle_option',
        'type' => 'text',
        
    ) );
    
   



    // شروع تنظیمات بخش  سایر خدمات
    $insuranceoptions->add_field( array(
        'name'    => 'عنوان سایر خدمات ',
        'default' => 'سایر خدمات ایده آل پرواز',
        'id'      => 'fly_insurance_services_main_title_options',
        'type'    => 'text'
    ) );
    $services_insurance = $insuranceoptions->add_field( array(
        'id'          => 'fly_insurance_services_options',
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

    $insuranceoptions->add_group_field( $services_insurance, array(
        'name' => ' آیکون',
        'id'   => 'fly_insurance_services_svg_option',
        'type'    => 'file',
        

    ) );
    $insuranceoptions->add_group_field(  $services_insurance, array(
        'name' => 'عنوان خدمت',
        'id'   => 'fly_insurance_services_title_option',
        'type'    => 'text',
        
    ) );
    $insuranceoptions->add_group_field(  $services_insurance, array(
        'name' => 'توضیحات خدمت',
        'id'   => 'fly_insurance_services_desc_option',
        'type'    => 'textarea',
        
    ) );
    $insuranceoptions->add_group_field(  $services_insurance, array(
        'name' => 'لینک خدمت',
        'id'   => 'fly_insurance_services_link_option',
        'type'    => 'text_url',
        
    ) );
   





    // شروع تنظیمات بخش چرا فلای آس
    $insuranceoptions->add_field( array(
        'name'    => 'عنوان چرا فلای آس ',
        'default' => 'چرا فلای آس ؟',
        'id'      => 'fly_insurance_why_main_title_options',
        'type'    => 'text'
    ) );
    $why_insurance = $insuranceoptions->add_field( array(
        'id'          => 'fly_insurance_why_options',
        'type'        => 'group',
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'چرا فلای آس', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            'add_button'        => __( 'افزودن ', 'cmb2' ),
            'remove_button'     => __( 'حذف ', 'cmb2' ),
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $insuranceoptions->add_group_field( $why_insurance, array(
        'name' => 'تصویر آیکون',
        'id'   => 'fly_insurance_why_img_options',
        'type' => 'file',
    ) );
    
    $insuranceoptions->add_group_field( $why_insurance, array(
        'name' => 'عنوان',
        'id'   => 'fly_insurance_why_title_option',
        'type' => 'text',
        
    ) );
   








    // تنظیمات بخش باکس های راهنمایی
    $boxes_insurance = $insuranceoptions->add_field( array(
        'id'          => 'fly_insurance_boxes_options',
        'type'        => 'group',
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'باکس راهنما', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            'add_button'        => __( 'افزودن ', 'cmb2' ),
            'remove_button'     => __( 'حذف ', 'cmb2' ),
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );


    $insuranceoptions->add_group_field( $boxes_insurance, array(
        'name' => 'عنوان ',
        'id'   => 'fly_insurance_boxes_title_option',
        'type'    => 'text',
        
    ) );
    $insuranceoptions->add_group_field( $boxes_insurance, array(
        'name' => 'توضیحات ',
        'id'   => 'fly_insurance_boxes_desc_option',
        'type'    => 'textarea',
        
    ) );


   
     // شروع تنظیمات توضیحات بلیط هواپیما 

     $ticket_insurance = $insuranceoptions->add_field( array(
        'id'          => 'fly_insurance_ticket_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'بلیط هواپیما', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );
    $insuranceoptions->add_group_field( $ticket_insurance, array(
        'name' => 'عنوان',
        'id'   => 'fly_insurance_ticket_title_option',
        'type'    => 'text',
        
    ) );
    
   
    $insuranceoptions->add_group_field( $ticket_insurance, array(
        'name' => 'توضیحات',
        'id'   => 'fly_insurance_ticket_desc_option',
        'type'    => 'wysiwyg',
        
    ) );


     // تنظیمات بخش سوالات متداول
     $insuranceoptions->add_field( array(
        'name'    => 'عنوان سوالات متداول',
        'default' => 'سوالات متداول',
        'id'      => 'fly_insurance_faq_main_title_options',
        'type'    => 'text'
    ) );
    $insuranceoptions->add_field( array(
        'name'    => 'عکس سوالات متداول',
        'id'      => 'fly_insurance_faq_main_img_options',
        'type'    => 'file'
    ) );
     $faq_insurance = $insuranceoptions->add_field( array(
        'id'          => 'fly_insurance_faq_options',
        'type'        => 'group',
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'سوال متداول', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            'add_button'        => __( 'افزودن ', 'cmb2' ),
            'remove_button'     => __( 'حذف ', 'cmb2' ),
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $insuranceoptions->add_group_field( $faq_insurance, array(
        'name' => 'سوال ',
        'id'   => 'fly_insurance_faq_question_option',
        'type'    => 'text',
        
    ) );
    $insuranceoptions->add_group_field( $faq_insurance, array(
        'name' => 'پاسخ ',
        'id'   => 'fly_insurance_faq_answer_option',
        'type'    => 'textarea',
        
    ) );
   


}







function fly_insurance_get_option( $key = '', $default = false ) {
    if ( function_exists( 'cmb2_get_option' ) ) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option( 'fly_insurance_options', $key, $default );
    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option( 'fly_insurance_options', $default );

    $val = $default;

    if ( 'all' == $key ) {
        $val = $opts;
    } elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
        $val = $opts[ $key ];
    }

    return $val;
}