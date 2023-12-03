<?php

add_action( 'cmb2_admin_init', 'fly_register_theme_options_visa' );

function fly_register_theme_options_visa() {

    $visaoptions = new_cmb2_box( array(
        'id'           => 'fly_option_visa',
        'title'        => esc_html__( 'تنظیمات صفحه ویزا', 'fly' ),
        'object_types' => array( 'options-page' ),
        'option_key'      => 'fly_visa_options', // The option key and admin menu page slug.
        'parent_slug'     => 'fly-settings-theme',
        'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
    ) );

// شروع تنظیمات بنر صفحه بیمه 

    $banner_visa = $visaoptions->add_field( array(
        'id'          => 'fly_visa_banner_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'تنظیمات بنر ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $visaoptions->add_group_field( $banner_visa, array(
        'name' => 'تصویر بک گراند',
        'id'   => 'fly_visa_banner_img_option',
        'type' => 'file',
    ) );
    
    $visaoptions->add_group_field( $banner_visa, array(
        'name' => 'عنوان',
        'id'   => 'fly_visa_banner_title_option',
        'type' => 'text',
        
    ) );
    $visaoptions->add_group_field( $banner_visa, array(
        'name' => 'زیر عنوان',
        'id'   => 'fly_visa_banner_subtitle_option',
        'type' => 'text',
        
    ) );
    $visaoptions->add_group_field(  $banner_visa, array(
        'name' => 'توضیحات ',
        'id'   => 'fly_visa_banner_desc_option',
        'type'    => 'textarea',
        
    ) );
    
   



    // شروع تنظیمات بخش  سایر خدمات
    $visaoptions->add_field( array(
        'name'    => 'عنوان سایر خدمات ',
        'default' => 'سایر خدمات ایده آل پرواز',
        'id'      => 'fly_visa_services_main_title_options',
        'type'    => 'text'
    ) );
    $services_visa = $visaoptions->add_field( array(
        'id'          => 'fly_visa_services_options',
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

    $visaoptions->add_group_field( $services_visa, array(
        'name' => ' آیکون',
        'id'   => 'fly_visa_services_svg_option',
        'type'    => 'file',

    ) );
    $visaoptions->add_group_field(  $services_visa, array(
        'name' => 'عنوان خدمت',
        'id'   => 'fly_visa_services_title_option',
        'type'    => 'text',
        
    ) );
    
   

    // شروع تنظیمات عنوان
    $visaoptions->add_field( array(
        'name'    => 'عنوان ویزاهای قابل دریافت توسط مجموعه فلای آس  ',
        'default' => 'ویزاهای قابل دریافت توسط مجموعه فلای آس',
        'id'      => 'fly_visa_main_title_options',
        'type'    => 'text'
    ) );

   

    // تنظیمات بخش باکس های ویزا چیست ؟
    $boxes_visa = $visaoptions->add_field( array(
        'id'          => 'fly_visa_boxes_options',
        'type'        => 'group',
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'باکس ویزا چیست ؟', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            'add_button'        => __( 'افزودن ', 'cmb2' ),
            'remove_button'     => __( 'حذف ', 'cmb2' ),
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );
    $visaoptions->add_group_field( $boxes_visa, array(
        'name' => 'تصویر ',
        'id'   => 'fly_visa_boxes_img_options',
        'type' => 'file',
    ) );

    $visaoptions->add_group_field( $boxes_visa, array(
        'name' => 'عنوان ',
        'id'   => 'fly_visa_boxes_title_option',
        'type'    => 'text',
        
    ) );
    $visaoptions->add_group_field( $boxes_visa, array(
        'name' => 'توضیحات ',
        'id'   => 'fly_visa_boxes_desc_option',
        'type'    => 'textarea',
        
    ) );


   //شروع تنظیمات زمان پردازش ویزای بالای صفحه
    $time_visa_top = $visaoptions->add_field( array(
        'id'          => 'fly_visa_time_top_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'زمان پردازش ویزا بالا ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );
    $visaoptions->add_group_field( $time_visa_top, array(
        'name' => 'عنوان',
        'id'   => 'fly_visa_time_top_title_option',
        'type' => 'text',
        
    ) );
    
    $visaoptions->add_group_field($time_visa_top, array(
        'name' => 'توضیحات ',
        'id'   => 'fly_visa_time_top_desc_option',
        'type'    => 'textarea',
        
    ) );


    //شروع تنظیمات زمان پردازش ویزای پایین صفحه
    $time_visa_down = $visaoptions->add_field( array(
        'id'          => 'fly_visa_time_down_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'زمان پردازش ویزا پایین ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );
    $visaoptions->add_group_field( $time_visa_down, array(
        'name' => 'عنوان',
        'id'   => 'fly_visa_time_down_title_option',
        'type' => 'text',
        
    ) );
    
    $visaoptions->add_group_field($time_visa_down, array(
        'name' => 'توضیحات ',
        'id'   => 'fly_visa_time_down_desc_option',
        'type'    => 'textarea',
        
    ) );
    


   
     // شروع تنظیمات توضیحات انواع ویزا 

     $ticket_visa = $visaoptions->add_field( array(
        'id'          => 'fly_visa_type_options',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'متن انواع ویزا', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => false,
            'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );
  
     
    $visaoptions->add_group_field( $ticket_visa, array(
        'name' => 'متن ',
        'id'   => 'fly_visa_type_desc_option',
        'type'    => 'wysiwyg',
        
    ) );


     // تنظیمات بخش سوالات متداول
     $visaoptions->add_field( array(
        'name'    => 'عنوان سوالات متداول',
        'default' => 'سوالات متداول',
        'id'      => 'fly_visa_faq_main_title_options',
        'type'    => 'text'
    ) );
    $visaoptions->add_field( array(
        'name'    => 'عکس سوالات متداول',
        'id'      => 'fly_visa_faq_main_img_options',
        'type'    => 'file'
    ) );
     $faq_visa = $visaoptions->add_field( array(
        'id'          => 'fly_visa_faq_options',
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

    $visaoptions->add_group_field( $faq_visa, array(
        'name' => 'سوال ',
        'id'   => 'fly_visa_faq_question_option',
        'type'    => 'text',
        
    ) );
    $visaoptions->add_group_field( $faq_visa, array(
        'name' => 'پاسخ ',
        'id'   => 'fly_visa_faq_answer_option',
        'type'    => 'textarea',
        
    ) );
   


}







function fly_visa_get_option( $key = '', $default = false ) {
    if ( function_exists( 'cmb2_get_option' ) ) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option( 'fly_visa_options', $key, $default );
    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option( 'fly_visa_options', $default );

    $val = $default;

    if ( 'all' == $key ) {
        $val = $opts;
    } elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
        $val = $opts[ $key ];
    }

    return $val;
}