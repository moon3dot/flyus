<?php add_action('cmb2_admin_init', 'cmb2_trip_metaboxes');
/**
 * Define the metabox and field configurations.
 */
function cmb2_trip_metaboxes()
{

    /**
     * Initiate the metabox
     */
    $cmb_trip = new_cmb2_box(array(
        'id' => 'trip_metabox',
        'title' => __('Metabox', 'cmb2'),
        'object_types' => array('trip','food','shop','hotel','place','restaurant'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
// 'cmb_styles' => false, // false to disable the CMB stylesheet
// 'closed'     => true, // Keep the metabox closed by default
    ));



    $banner_trip = $cmb_trip->add_field(array(
        'id' => 'fly_trip_banner_meta',
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
    
    $cmb_trip->add_group_field($banner_trip, array(
        'name' => ' عنوان اصلی',
        'id' => 'fly_trip_banner_title_meta',
        'type' => 'text',      
    ));
    $cmb_trip->add_group_field($banner_trip, array(
        'name' => 'پادکست مقاله',
        'id' => 'fly_trip_banner_podcast_meta',
        'type' => 'file',
        
    ));
    $cmb_trip->add_group_field($banner_trip, array(
        'name' => 'ویدئوی مقاله',
        'id' => 'fly_trip_banner_video_meta',
        'type' => 'file',
        
    ));

    $cmb_trip->add_group_field($banner_trip, array(
        'name' => ' عنوان مخاطب این محتوا',
        'default' => 'مخاطب این محتوا',
        'id' => 'fly_trip_banner_user_title_meta',
        'type' => 'text',      
    ));


    $description_trip = $cmb_trip->add_field( array(
        'id'          => 'fly_trip_description_meta',
        'type'        => 'group',
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'توضیحات زیر عنوان اصلی ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => true,
            'closed'         => true, // true to have the groups closed by default
            'add_button'        => __( 'افزودن ', 'cmb2' ),
            'remove_button'     => __( 'حذف ', 'cmb2' ),
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $cmb_trip->add_group_field(  $description_trip, array(
        'name' => 'عنوان ',
        'id'   => 'fly_trip_description_title_meta',
        'type'    => 'text',
        
    ) );


    $user_trip = $cmb_trip->add_field( array(
        'id'          => 'fly_trip_description_user_meta',
        'type'        => 'group',
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'توضیحات زیر مخاطب این محتوا  ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => true,
            'closed'         => true, // true to have the groups closed by default
            'add_button'        => __( 'افزودن ', 'cmb2' ),
            'remove_button'     => __( 'حذف ', 'cmb2' ),
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $cmb_trip->add_group_field(  $user_trip, array(
        'name' => 'عنوان ',
        'id'   => 'fly_trip_description_user_title_meta',
        'type'    => 'text',
        
    ) );


 
    

        // شروع تنظیمات بخش  دلایل محبوبیت
        $cmb_trip->add_field( array(
            'name'    => 'عنوان دلایل محبوبیت  ',
            'default' => 'دلایل محبوبیت',
            'id'      => 'fly_trip_popular_main_title_meta',
            'type'    => 'text'
        ) );
        $cmb_trip->add_field( array(
            'name'    => 'توضیحات پایین دلایل محبوبیت  ',
            'id'      => 'fly_trip_popular_main_des_meta',
            'type'    => 'textarea'
        ) );
        $popular_trip = $cmb_trip->add_field( array(
            'id'          => 'fly_trip_popular_meta',
            'type'        => 'group',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'دلایل محبوبیت ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_trip->add_group_field( $popular_trip, array(
            'name' => ' آیکون',
            'id'   => 'fly_trip_popular_svg_meta',
            'type'    => 'file',
    
        ) );
        $cmb_trip->add_group_field(  $popular_trip, array(
            'name' => 'عنوان ',
            'id'   => 'fly_trip_popular_title_meta',
            'type'    => 'text',
            
        ) );

        
        // شروع تنظیمات بخش تاریخچه 
       
        $history_trip = $cmb_trip->add_field( array(
            'id'          => 'fly_trip_history_meta',
            'type'        => 'group',
            'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'تاریخچه  ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_trip->add_group_field( $history_trip, array(
            'name' => 'عتوان',
            'id'   => 'fly_trip_history_title_meta',
            'type'    => 'text',
    
        ) );
        $cmb_trip->add_group_field( $history_trip, array(
            'name' => 'توضیحات',
            'id'   => 'fly_trip_history_des_meta',
            'type'    => 'textarea',
            
        ) );
       


           // شروع تنظیمات بخش باکس های زیر تاریخچه
         
        $boxes = $cmb_trip->add_field( array(
            'id'          => 'fly_trip_boxes_meta',
            'type'        => 'group',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'باکس های زیر تاریخچه', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_trip->add_group_field( $boxes, array(
            'name' => 'عنوان',
            'id'   => 'fly_trip_boxes_title_meta',
            'type'    => 'text',
    
        ) );
        $cmb_trip->add_group_field( $boxes, array(
            'name' => 'توضیحات',
            'id'   => 'fly_trip_boxes_des_meta',
            'type'    => 'textarea',
            
        ) );
        


              // شروع تنظیمات بخش سکشن بعد از باکس ها
              
            $section_trip = $cmb_trip->add_field( array(
                'id'          => 'fly_trip_section_meta',
                'type'        => 'group',
                'repeatable'  => false, // use false if you want non-repeatable group
                'options'     => array(
                    'group_title'       => __( 'سکشن بعد از باکس ها', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                    'sortable'          => true,
                    'closed'         => true, // true to have the groups closed by default
                    'add_button'        => __( 'افزودن ', 'cmb2' ),
                    'remove_button'     => __( 'حذف ', 'cmb2' ),
                    // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
                ),
            ) );
        
            $cmb_trip->add_group_field( $section_trip, array(
                'name' => 'عنوان',
                'id'   => 'fly_trip_section_title_meta',
                'type'    => 'text',
        
            ) );
            $cmb_trip->add_group_field( $section_trip, array(
                'name' => 'توضیحات',
                'id'   => 'fly_trip_section_des_top_meta',
                'type'    => 'textarea',
                
            ) );
            $cmb_trip->add_group_field( $section_trip, array(
                'name' => 'زیر عنوان',
                'id'   => 'fly_trip_section_subtitle_meta',
                'type'    => 'text',
                
            ) );
            $cmb_trip->add_group_field( $section_trip, array(
                'name' => 'توضیحات',
                'id'   => 'fly_trip_section_des_down_meta',
                'type'    => 'textarea',
                
            ) );
            $cmb_trip->add_group_field($section_trip, array(
                'name' => 'تصویر  ',
                'id' => 'fly_trip_section_img_meta',
                'type' => 'file',
                'query_args' => array('type' => 'image'),
            ));

          // شروع تنظیمات بخش مراحل تصویری 
        $cmb_trip->add_field( array(
            'name'    => 'عنوان اصلی مراحل  ',
            'id'      => 'fly_trip_step_main_title_meta',
            'type'    => 'text'
        ) );
        $cmb_trip->add_field( array(
            'name'    => 'توضیحات پایین مراحل   ',
            'id'      => 'fly_trip_step_main_des_meta',
            'type'    => 'textarea'
        ) );
        $step_trip = $cmb_trip->add_field( array(
            'id'          => 'fly_trip_step_meta',
            'type'        => 'group',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'مراحل تصویری', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_trip->add_group_field( $step_trip, array(
            'name' => ' آیکون',
            'id'   => 'fly_trip_step_svg_meta',
            'type'    => 'file',
    
        ) );
        $cmb_trip->add_group_field(  $step_trip, array(
            'name' => 'عنوان ',
            'id'   => 'fly_trip_step_title_meta',
            'type'    => 'text',
            
        ) );



                     
                     
          // شروع تنظیمات بخش  ویزا چیست         
        $visa_trip = $cmb_trip->add_field( array(
            'id'          => 'fly_trip_section_visa_meta',
            'type'        => 'group',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( '  ویزا چیست', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_trip->add_group_field( $visa_trip, array(
            'name' => 'عنوان',
            'id'   => 'fly_trip_section_visa_title_meta',
            'type'    => 'text',
    
        ) );
        $cmb_trip->add_group_field( $visa_trip, array(
            'name' => 'توضیحات',
            'id'   => 'fly_trip_section_visa_des_meta',
            'type'    => 'textarea',
            
        ) );
        $cmb_trip->add_group_field($visa_trip, array(
            'name' => 'تصویر  ',
            'id' => 'fly_trip_section_visa_img_meta',
            'type' => 'file',
            'query_args' => array('type' => 'image'),
        ));

//شروع تنظیمات بخش زیر ویزا چیست  
        $section_video_trip = $cmb_trip->add_field( array(
            'id'          => 'fly_trip_section_video_meta',
            'type'        => 'group',
            'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'اطلاعات زیر ویزا چیست', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => false,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
       
        $cmb_trip->add_group_field( $section_video_trip, array(
            'name' => 'توضیحات بالای عنوان',
            'id'   => 'fly_trip_section_video_desc_meta',
            'type'    => 'textarea',
            
        ) );
        $cmb_trip->add_group_field( $section_video_trip, array(
            'name' => 'عنوان',
            'id'   => 'fly_trip_section_video_title_meta',
            'type'    => 'text',
    
        ) );
        $cmb_trip->add_group_field($section_video_trip, array(
            'name' => 'تصویر  ',
            'id' => 'fly_trip_section_video_img_meta',
            'type' => 'file',
            'query_args' => array('type' => 'image'),
        ));
        $cmb_trip->add_group_field( $section_video_trip, array(
            'name' => 'توضیحات کنار عکس',
            'id'   => 'fly_trip_section_video_des_img_meta',
            'type'    => 'textarea',
            
        ) );
        $cmb_trip->add_group_field($section_video_trip, array(
            'name' => 'ویدئو  ',
            'id' => 'fly_trip_section_video_video_meta',
            'type' => 'file',
        ));
        $cmb_trip->add_group_field($section_video_trip, array(
            'name' => 'پوستر ویدئو  ',
            'id' => 'fly_trip_section_video_poster_meta',
            'type' => 'file',
            'query_args' => array('type' => 'image'),
        ));
        $cmb_trip->add_group_field( $section_video_trip, array(
            'name' => 'توضیحات کنار ویدئو',
            'id'   => 'fly_trip_section_video_des_video_meta',
            'type'    => 'textarea',
            
        ) );


        
     // تنظیمات بخش سوالات متداول
     $cmb_trip->add_field( array(
        'name'    => 'عنوان سوالات متداول',
        'default' => 'سوالات متداول',
        'id'      => 'fly_trip_faq_main_title_meta',
        'type'    => 'text'
    ) );
    $cmb_trip->add_field( array(
        'name'    => 'عکس سوالات متداول',
        'id'      => 'fly_trip_faq_main_img_meta',
        'type'    => 'file'
    ) );
     $faq_trip = $cmb_trip->add_field( array(
        'id'          => 'fly_trip_faq_meta',
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

    $cmb_trip->add_group_field( $faq_trip, array(
        'name' => 'سوال ',
        'id'   => 'fly_trip_faq_question_meta',
        'type'    => 'text',
        
    ) );
    $cmb_trip->add_group_field( $faq_trip, array(
        'name' => 'پاسخ ',
        'id'   => 'fly_trip_faq_answer_meta',
        'type'    => 'textarea',
        
    ) );







}

