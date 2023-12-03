<?php add_action('cmb2_admin_init', 'cmb2_visa_metaboxes');
/**
 * Define the metabox and field configurations.
 */
function cmb2_visa_metaboxes()
{

    /**
     * Initiate the metabox
     */
    $cmb_visa = new_cmb2_box(array(
        'id' => 'visa_metabox',
        'title' => __('Metabox', 'cmb2'),
        'object_types' => array('visa'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
// 'cmb_styles' => false, // false to disable the CMB stylesheet
// 'closed'     => true, // Keep the metabox closed by default
    ));

    $cmb_visa->add_field( array(
        'name' => 'دومین تصویر شاخص',
        'id' => 'fly_visa_second_img_meta',
        'type' => 'file',
        'query_args' => array('type' => 'image'),
    ));

    $banner_visa = $cmb_visa->add_field(array(
        'id' => 'fly_visa_banner_meta',
        'type' => 'group',
        'repeatable' => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => 'بنر',
            'add_button' => 'Add Item',
            'remove_button' => 'Delete ',
            'closed' => true,  // Repeater fields closed by default - neat & compact.
            'sortable' => true,  // Allow changing the order of repeated groups.
        ),
    ));
    $cmb_visa->add_group_field($banner_visa, array(
        'name' => 'تصویر بک گراند',
        'id' => 'fly_visa_banner_img_meta',
        'type' => 'file',
        'query_args' => array('type' => 'image'),
    ));
    $cmb_visa->add_group_field($banner_visa, array(
        'name' => 'عنوان',
        'id' => 'fly_visa_banner_title_meta',
        'type' => 'text',      
    ));
    $cmb_visa->add_group_field($banner_visa, array(
        'name' => 'عکس پرچم کشور',
        'id' => 'fly_visa_banner_flag_meta',
        'type' => 'file',
        'query_args' => array('type' => 'image'),
    ));
    $cmb_visa->add_group_field( $banner_visa, array(
        'name' => 'زیر عنوان',
        'id'   => 'fly_visa_banner_subtitle_meta',
        'type' => 'text',
        
    ) );
    $cmb_visa->add_group_field( $banner_visa, array(
        'name' => 'توضیحات ',
        'id'   => 'fly_visa_banner_desc_meta',
        'type'    => 'textarea',
        
    ) );

        // شروع تنظیمات بخش پردازش ویزا
        $cmb_visa->add_field( array(
            'name'    => 'عنوان پردازش ویزا ',
            'default' => 'پردازش ویزای توریستی',
            'id'      => 'fly_visa_services_main_title_meta',
            'type'    => 'text'
        ) );
        $services_visa = $cmb_visa->add_field( array(
            'id'          => 'fly_visa_services_meta',
            'type'        => 'group',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'پردازش ویزا ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_visa->add_group_field( $services_visa, array(
            'name' => ' آیکون',
            'id'   => 'fly_visa_services_svg_meta',
            'type'    => 'file',
    
        ) );
        $cmb_visa->add_group_field(  $services_visa, array(
            'name' => 'عنوان ',
            'id'   => 'fly_visa_services_title_meta',
            'type'    => 'text',
            
        ) );

        
        // شروع تنظیمات بخش قیمت ویزا
        $cmb_visa->add_field( array(
            'name'    => 'عنوان قیمت ویزا ',
            'default' => 'قیمت ویزای',
            'id'      => 'fly_visa_price_main_title_meta',
            'type'    => 'text'
        ) );
        $price_visa = $cmb_visa->add_field( array(
            'id'          => 'fly_visa_price_meta',
            'type'        => 'group',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'قیمت ویزا ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_visa->add_group_field( $price_visa, array(
            'name' => 'نوع',
            'id'   => 'fly_visa_price_type_meta',
            'type'    => 'text',
    
        ) );
        $cmb_visa->add_group_field( $price_visa, array(
            'name' => 'ده روزه',
            'id'   => 'fly_visa_price_ten_day_meta',
            'type'    => 'text',
            
        ) );
        $cmb_visa->add_group_field( $price_visa, array(
            'name' => 'یک ماهه',
            'id'   => 'fly_visa_price_one_month_meta',
            'type'    => 'text',
            
        ) );
        $cmb_visa->add_group_field( $price_visa, array(
            'name' => 'دو ماهه',
            'id'   => 'fly_visa_price_tow_month_meta',
            'type'    => 'text',
            
        ) );



           // شروع تنظیمات بخش قیمت ویزا زیر 18 سال
           $cmb_visa->add_field( array(
            'name'    => 'عنوان قیمت ویزا ',
            'default' => ' قیمت ویزای زیر 18 سال',
            'id'      => 'fly_visa_price_under_18_main_title_meta',
            'type'    => 'text'
        ) );
        $price_visa_under_18 = $cmb_visa->add_field( array(
            'id'          => 'fly_visa_price_under_18_meta',
            'type'        => 'group',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'قیمت ویزا زیر 18 سال ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_visa->add_group_field( $price_visa_under_18, array(
            'name' => 'نوع',
            'id'   => 'fly_visa_price_under_18_type_meta',
            'type'    => 'text',
    
        ) );
        $cmb_visa->add_group_field( $price_visa_under_18, array(
            'name' => 'ده روزه',
            'id'   => 'fly_visa_price_under_18_ten_day_meta',
            'type'    => 'text',
            
        ) );
        $cmb_visa->add_group_field( $price_visa_under_18, array(
            'name' => 'یک ماهه',
            'id'   => 'fly_visa_price_under_18_one_month_meta',
            'type'    => 'text',
            
        ) );
        $cmb_visa->add_group_field( $price_visa_under_18, array(
            'name' => 'دو ماهه',
            'id'   => 'fly_visa_price_under_18_tow_month_meta',
            'type'    => 'text',
            
        ) );


              // شروع تنظیمات بخش قیمت تمدید ویزا
              $cmb_visa->add_field( array(
                'name'    => 'عنوان قیمت تمدید ویزا ',
                'default' => 'قیمت تمدید ویزای',
                'id'      => 'fly_visa_price_renewal_main_title_meta',
                'type'    => 'text'
            ) );
            $price_renewal_visa = $cmb_visa->add_field( array(
                'id'          => 'fly_visa_price_renewal_meta',
                'type'        => 'group',
                'repeatable'  => true, // use false if you want non-repeatable group
                'options'     => array(
                    'group_title'       => __( 'قیمت تمدید ویزا ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                    'sortable'          => true,
                    'closed'         => true, // true to have the groups closed by default
                    'add_button'        => __( 'افزودن ', 'cmb2' ),
                    'remove_button'     => __( 'حذف ', 'cmb2' ),
                    // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
                ),
            ) );
        
            $cmb_visa->add_group_field( $price_renewal_visa, array(
                'name' => 'نوع',
                'id'   => 'fly_visa_price_renewal_type_meta',
                'type'    => 'text',
        
            ) );
            $cmb_visa->add_group_field( $price_renewal_visa, array(
                'name' => 'ده روزه',
                'id'   => 'fly_visa_price_renewal_ten_day_meta',
                'type'    => 'text',
                
            ) );
            $cmb_visa->add_group_field( $price_renewal_visa, array(
                'name' => 'یک ماهه',
                'id'   => 'fly_visa_price_renewal_one_month_meta',
                'type'    => 'text',
                
            ) );
            $cmb_visa->add_group_field( $price_renewal_visa, array(
                'name' => 'دو ماهه',
                'id'   => 'fly_visa_price_renewal_tow_month_meta',
                'type'    => 'text',
                
            ) );

          // شروع تنظیمات بخش مدارک لازم
                          $cmb_visa->add_field( array(
                            'name'    => 'عنوان مدارک لازم ',
                            'default' => 'مدارک لازم برای ویزای توریستی',
                            'id'      => 'fly_visa_documents_main_title_meta',
                            'type'    => 'text'
                        ) );
                        $documents_visa = $cmb_visa->add_field( array(
                            'id'          => 'fly_visa_documents_meta',
                            'type'        => 'group',
                            'repeatable'  => true, // use false if you want non-repeatable group
                            'options'     => array(
                                'group_title'       => __( 'مدارک لازم', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                                'sortable'          => true,
                                'closed'         => true, // true to have the groups closed by default
                                'add_button'        => __( 'افزودن ', 'cmb2' ),
                                'remove_button'     => __( 'حذف ', 'cmb2' ),
                                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
                            ),
                        ) );
                    
                        $cmb_visa->add_group_field( $documents_visa, array(
                            'name' => 'مدرک',
                            'id'   => 'fly_visa_documents_type_meta',
                            'type'    => 'text',
                    
                        ) );
                        $cmb_visa->add_group_field( $documents_visa, array(
                            'name' => 'توضیحات',
                            'id'   => 'fly_visa_documents_desc_meta',
                            'type'    => 'textarea',
                            
                        ) );

//شروع تنظیمات بخش شرط صدور
                        $condition_visa = $cmb_visa->add_field( array(
                            'id'          => 'fly_visa_condition_meta',
                            'type'        => 'group',
                            'repeatable'  => false, // use false if you want non-repeatable group
                            'options'     => array(
                                'group_title'       => __( 'شرط صدور', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                                'sortable'          => false,
                                'closed'         => true, // true to have the groups closed by default
                                'add_button'        => __( 'افزودن ', 'cmb2' ),
                                'remove_button'     => __( 'حذف ', 'cmb2' ),
                                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
                            ),
                        ) );
                    
                        $cmb_visa->add_group_field( $condition_visa, array(
                            'name' => 'عنوان',
                            'id'   => 'fly_visa_condition_title_meta',
                            'type'    => 'text',
                    
                        ) );
                        $cmb_visa->add_group_field( $condition_visa, array(
                            'name' => 'توضیحات',
                            'id'   => 'fly_visa_condition_desc_meta',
                            'type'    => 'textarea',
                            
                        ) );
                     
                     
          // شروع تنظیمات بخش مراحل اخذ ویزا
          $cmb_visa->add_field( array(
            'name'    => 'عنوان مراحل اخذ ویزا ',
            'default' => 'مراحل اخذ  ویزای توریستی',
            'id'      => 'fly_visa_steps_main_title_meta',
            'type'    => 'text'
        ) );
        $steps_visa = $cmb_visa->add_field( array(
            'id'          => 'fly_visa_steps_meta',
            'type'        => 'group',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'مراحل اخذ ویزا', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_visa->add_group_field( $steps_visa, array(
            'name' => 'مرحله',
            'id'   => 'fly_visa_steps_step_meta',
            'type'    => 'text',
    
        ) );
        $cmb_visa->add_group_field( $steps_visa, array(
            'name' => 'توضیحات',
            'id'   => 'fly_visa_steps_desc_meta',
            'type'    => 'textarea',
            
        ) );

//شروع تنظیمات بخش زمان پردازش ویزا
        $time_visa = $cmb_visa->add_field( array(
            'id'          => 'fly_visa_time_meta',
            'type'        => 'group',
            'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'زمان پردازش ویزا', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => false,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_visa->add_group_field( $time_visa, array(
            'name' => 'عنوان',
            'id'   => 'fly_visa_time_title_meta',
            'type'    => 'text',
    
        ) );
        $cmb_visa->add_group_field( $time_visa, array(
            'name' => 'توضیحات',
            'id'   => 'fly_visa_time_desc_meta',
            'type'    => 'wysiwyg',
            
        ) );


        
     // تنظیمات بخش سوالات متداول
     $cmb_visa->add_field( array(
        'name'    => 'عنوان سوالات متداول',
        'default' => 'سوالات متداول',
        'id'      => 'fly_visa_faq_main_title_meta',
        'type'    => 'text'
    ) );
    $cmb_visa->add_field( array(
        'name'    => 'عکس سوالات متداول',
        'id'      => 'fly_visa_faq_main_img_meta',
        'type'    => 'file'
    ) );
     $faq_visa = $cmb_visa->add_field( array(
        'id'          => 'fly_visa_faq_meta',
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

    $cmb_visa->add_group_field( $faq_visa, array(
        'name' => 'سوال ',
        'id'   => 'fly_visa_faq_question_meta',
        'type'    => 'text',
        
    ) );
    $cmb_visa->add_group_field( $faq_visa, array(
        'name' => 'پاسخ ',
        'id'   => 'fly_visa_faq_answer_meta',
        'type'    => 'textarea',
        
    ) );







}

