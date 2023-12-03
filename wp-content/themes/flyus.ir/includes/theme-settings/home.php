<?php

add_action( 'cmb2_admin_init', 'fly_register_theme_options_home' );

function fly_register_theme_options_home() {

    $homeoptions = new_cmb2_box( array(
        'id'           => 'fly_option_home',
        'title'        => esc_html__( 'تنظیمات صفحه اصلی', 'fly' ),
        'object_types' => array( 'options-page' ),
        'option_key'      => 'fly_home_options', // The option key and admin menu page slug.
        'parent_slug'     => 'fly-settings-theme',
        'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
    ) );

// شروع تنظیمات بنر صفحه اصلی 

    $banner = $homeoptions->add_field( array(
        'id'          => 'fly_home_banner_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'تنظیمات بنر ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $homeoptions->add_group_field( $banner, array(
        'name' => 'تصویر بک گراند',
        'id'   => 'fly_home_banner_img_option',
        'type' => 'file',
    ) );
    
    $homeoptions->add_group_field( $banner, array(
        'name' => 'عنوان',
        'id'   => 'fly_home_banner_title_option',
        'type' => 'text',
        
    ) );
    $homeoptions->add_group_field( $banner, array(
        'name' => 'زیر عنوان',
        'id'   => 'fly_home_banner_subtitle_option',
        'type' => 'text',
        
    ) );
    
   



    // شروع تنظیمات بخش  سایر خدمات
    $homeoptions->add_field( array(
        'name'    => 'عنوان سایر خدمات ',
        'default' => 'سایر خدمات ایده آل پرواز',
        'id'      => 'fly_home_services_main_title_options',
        'type'    => 'text'
    ) );
    $services = $homeoptions->add_field( array(
        'id'          => 'fly_home_services_options',
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

    $homeoptions->add_group_field( $services, array(
        'name' => ' آیکون',
        'id'   => 'fly_home_services_svg_option',
        'type' => 'file',

    ) );
    $homeoptions->add_group_field(  $services, array(
        'name' => 'عنوان خدمت',
        'id'   => 'fly_home_services_title_option',
        'type'    => 'text',
        
    ) );
    $homeoptions->add_group_field(  $services, array(
        'name' => 'توضیحات خدمت',
        'id'   => 'fly_home_services_desc_option',
        'type'    => 'textarea',
        
    ) );
    $homeoptions->add_group_field(  $services, array(
        'name' => 'لینک خدمت',
        'id'   => 'fly_home_services_link_option',
        'type'    => 'text_url',
        
    ) );
   





    // شروع تنظیمات بخش چرا ایده آل پرواز
    $homeoptions->add_field( array(
        'name'    => 'عنوان چرا ایده آل پرواز ',
        'default' => 'چرا ایده آل پرواز',
        'id'      => 'fly_home_why_main_title_options',
        'type'    => 'text'
    ) );
    $why = $homeoptions->add_field( array(
        'id'          => 'fly_home_why_options',
        'type'        => 'group',
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'چرا ایده آل پرواز', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            'add_button'        => __( 'افزودن ', 'cmb2' ),
            'remove_button'     => __( 'حذف ', 'cmb2' ),
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $homeoptions->add_group_field( $why, array(
        'name' => 'تصویر آیکون',
        'id'   => 'fly_home_why_img_options',
        'type' => 'file',
    ) );
    
    $homeoptions->add_group_field( $why, array(
        'name' => 'عنوان',
        'id'   => 'fly_home_why_title_option',
        'type' => 'text',
        
    ) );
   








    // تنظیمات بخش باکس های راهنمایی
    $boxes = $homeoptions->add_field( array(
        'id'          => 'fly_home_boxes_options',
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
    
    $homeoptions->add_group_field( $boxes, array(
        'name' => 'عنوان ',
        'id'   => 'fly_home_boxes_title_option',
        'type'    => 'text',
        
    ) );
    $homeoptions->add_group_field( $boxes, array(
        'name' => 'توضیحات ',
        'id'   => 'fly_home_boxes_desc_option',
        'type'    => 'textarea',
        
    ) );


     // تنظیمات بخش چرا ما را انتخاب کنید
     $homeoptions->add_field( array(
        'name'    => 'عنوان چرا ما را انتخاب کنید ',
        'default' => 'چرا مارا انتخاب کنید',
        'id'      => 'fly_home_advantages_main_title_options',
        'type'    => 'text'
    ) );
     $advantages = $homeoptions->add_field( array(
        'id'          => 'fly_home_advantages_options',
        'type'        => 'group',
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'چرا ما را انتخاب کنید', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            'add_button'        => __( 'افزودن ', 'cmb2' ),
            'remove_button'     => __( 'حذف ', 'cmb2' ),
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );
    $homeoptions->add_group_field( $advantages, array(
        'name' => 'تصویر آیکون',
        'id'   => 'fly_home_advantages_img_options',
        'type' => 'file',
    ) );

    $homeoptions->add_group_field( $advantages, array(
        'name' => 'عنوان ',
        'id'   => 'fly_home_advantages_title_option',
        'type'    => 'text',
        
    ) );
    $homeoptions->add_group_field( $advantages, array(
        'name' => 'توضیحات ',
        'id'   => 'fly_home_advantages_desc_option',
        'type'    => 'textarea',
        
    ) );


    // شروع تنظیمات معرفی مجموعه 

    $introduce = $homeoptions->add_field( array(
        'id'          => 'fly_home_introduce_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'معرفی مجموعه ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $homeoptions->add_group_field( $introduce, array(
        'name' => 'ویدئو معرفی',
        'id'   => 'fly_home_introduce_video_option',
        'type' => 'file',
    ) );
    $homeoptions->add_group_field( $introduce, array(
        'name' => 'عکس پوستر ویدئو',
        'id'   => 'fly_home_introduce_img_option',
        'type' => 'file',
    ) );
    
    $homeoptions->add_group_field( $introduce, array(
        'name' => 'عنوان معرفی مجموعه',
        'default' => 'معرفی مجموعه',
        'id'   => 'fly_home_introduce_main_title_option',
        'type'    => 'text',
        
    ) );

    $homeoptions->add_group_field( $introduce, array(
        'name' => 'توضیحات',
        'id'   => 'fly_home_introduce_desc_option',
        'type'    => 'textarea',
        
    ) );


     // شروع تنظیمات توضیحات بلیط هواپیما 

     $ticket = $homeoptions->add_field( array(
        'id'          => 'fly_home_ticket_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'بلیط هواپیما', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );
    $homeoptions->add_group_field( $ticket, array(
        'name' => 'عنوان',
        'id'   => 'fly_home_ticket_title_option',
        'type'    => 'text',
        
    ) );
    
   
    $homeoptions->add_group_field( $ticket, array(
        'name' => 'توضیحات',
        'id'   => 'fly_home_ticket_desc_option',
        'type'    => 'wysiwyg',
        'options' =>array(
            'wpautop' => true, // use wpautop?
        ),
        
    ) );


     // تنظیمات بخش سوالات متداول
     $homeoptions->add_field( array(
        'name'    => 'عنوان سوالات متداول',
        'default' => 'سوالات متداول',
        'id'      => 'fly_home_faq_main_title_options',
        'type'    => 'text'
    ) );
    $homeoptions->add_field( array(
        'name'    => 'عکس سوالات متداول',
        'id'      => 'fly_home_faq_main_img_options',
        'type'    => 'file'
    ) );
     $faq = $homeoptions->add_field( array(
        'id'          => 'fly_home_faq_options',
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

    $homeoptions->add_group_field( $faq, array(
        'name' => 'سوال ',
        'id'   => 'fly_home_faq_question_option',
        'type'    => 'text',
        
    ) );
    $homeoptions->add_group_field( $faq, array(
        'name' => 'پاسخ ',
        'id'   => 'fly_home_faq_answer_option',
        'type'    => 'textarea',
        
    ) );
   


}







function fly_home_get_option( $key = '', $default = false ) {
    if ( function_exists( 'cmb2_get_option' ) ) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option( 'fly_home_options', $key, $default );
    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option( 'fly_home_options', $default );

    $val = $default;

    if ( 'all' == $key ) {
        $val = $opts;
    } elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
        $val = $opts[ $key ];
    }

    return $val;
}