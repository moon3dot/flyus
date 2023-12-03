<?php add_action('cmb2_admin_init', 'cmb2_tour_metaboxes');
/**
 * Define the metabox and field configurations.
 */
function cmb2_tour_metaboxes()
{

    /**
     * Initiate the metabox
     */
    $cmb_tour = new_cmb2_box(array(
        'id' => 'tour_metabox',
        'title' => __('Metabox', 'cmb2'),
        'object_types' => array('tours'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
// 'cmb_styles' => false, // false to disable the CMB stylesheet
// 'closed'     => true, // Keep the metabox closed by default
    ));



    $banner_tour = $cmb_tour->add_field(array(
        'id' => 'fly_tour_gallery_meta',
        'type' => 'group',
        'repeatable' => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => 'گالری عکس',
            'add_button' => 'Add Item',
            'remove_button' => 'Delete ',
            'closed' => true,  // Repeater fields closed by default - neat & compact.
            'sortable' => true,  // Allow changing the order of repeated groups.
        ),
    ));
    $cmb_tour->add_group_field($banner_tour, array(
        'name' => 'تصویر  بزرگ',
        'id' => 'fly_tour_gallery_img_meta',
        'type' => 'file',
        'query_args' => array('type' => 'image'),
    ));
    
    $cmb_tour->add_group_field($banner_tour, array(
        'name' => 'اولین تصویر کوچک',
        'id' => 'fly_tour_gallery_one_meta',
        'type' => 'file',
        'query_args' => array('type' => 'image'),
    ));
    $cmb_tour->add_group_field($banner_tour, array(
        'name' => 'دومین تصویر کوچک',
        'id' => 'fly_tour_gallery_two_meta',
        'type' => 'file',
        'query_args' => array('type' => 'image'),
    ));
    $cmb_tour->add_group_field($banner_tour, array(
        'name' => 'سومین تصویر کوچک',
        'id' => 'fly_tour_gallery_three_meta',
        'type' => 'file',
        'query_args' => array('type' => 'image'),
    ));
    $cmb_tour->add_group_field($banner_tour, array(
        'name' => 'چهارمین تصویر کوچک',
        'id' => 'fly_tour_gallery_four_meta',
        'type' => 'file',
        'query_args' => array('type' => 'image'),
    ));

    //شروع تنظیمات بخش هتل

    $hotel_tour = $cmb_tour->add_field(array(
        'id' => 'fly_tour_hotel_meta',
        'type' => 'group',
        'repeatable' => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => 'مشخصات هتل',
            'add_button' => 'Add Item',
            'remove_button' => 'Delete ',
            'closed' => true,  // Repeater fields closed by default - neat & compact.
            'sortable' => true,  // Allow changing the order of repeated groups.
        ),
    ));
    $cmb_tour->add_group_field(  $hotel_tour, array(
        'name' => 'نام هتل ',
        'id'   => 'fly_tour_hotel_name_meta',
        'type'    => 'text',
        
    ) );
    $cmb_tour->add_group_field(  $hotel_tour, array(
        'name' => 'مشخصات تور',
        'id'   => 'fly_tour_detail_meta',
        'type'    => 'text',
        
    ) );
    $cmb_tour->add_group_field(  $hotel_tour, array(
        'name' => 'نقشه ی هتل ',
        'id'   => 'fly_tour_hotel_map_meta',
        'type'    => 'text',
        
    ) );
    $cmb_tour->add_group_field(  $hotel_tour, array(
        'name' => 'تعداد ستاره های هتل ',
        'id'   => 'fly_tour_hotel_star_meta',
        'type'    => 'text',
        
    ) );

        // شروع تنظیمات بخش  چرا ایده آل پرواز
        $cmb_tour->add_field( array(
            'name'    => 'عنوان چرا ایده آل پرواز ',
            'default' => ' چرا ایده آل پرواز ',
            'id'      => 'fly_tour_services_main_title_meta',
            'type'    => 'text'
        ) );
        $services_tour = $cmb_tour->add_field( array(
            'id'          => 'fly_tour_services_meta',
            'type'        => 'group',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'چرا ایده آل پرواز ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_tour->add_group_field( $services_tour, array(
            'name' => ' آیکون',
            'id'   => 'fly_tour_services_svg_meta',
            'type'    => 'file',
    
        ) );
        $cmb_tour->add_group_field(  $services_tour, array(
            'name' => 'عنوان ',
            'id'   => 'fly_tour_services_title_meta',
            'type'    => 'text',
            
        ) );

        // شروع تنظیمات بخش  مکان های نزدیک هتل
        $cmb_tour->add_field( array(
            'name'    => 'عنوان مکان های نزدیک هتل ',
            'default' => ' مکان های نزدیک هتل ',
            'id'      => 'fly_tour_location_main_title_meta',
            'type'    => 'text'
        ) );
        $location_tour = $cmb_tour->add_field( array(
            'id'          => 'fly_tour_location_meta',
            'type'        => 'group',
            'repeatable'  => true, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( ' مکان های نزدیک هتل ', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_tour->add_group_field( $location_tour, array(
            'name' => ' آیکون',
            'id'   => 'fly_tour_location_svg_meta',
            'type'    => 'file',
    
        ) );
        $cmb_tour->add_group_field(  $location_tour, array(
            'name' => 'عنوان ',
            'id'   => 'fly_tour_location_title_meta',
            'type'    => 'text',
            
        ) );

        
        // شروع تنظیمات بخش مشخصات بلیط
        
        $ticket_tour = $cmb_tour->add_field( array(
            'id'          => 'fly_tour_ticket_meta',
            'type'        => 'group',
            'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'       => __( 'مشخصات بلیط', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'sortable'          => true,
                'closed'         => true, // true to have the groups closed by default
                'add_button'        => __( 'افزودن ', 'cmb2' ),
                'remove_button'     => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );
    
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'مشخصات قیمت',
            'id'   => 'fly_tour_ticket_price_meta',
            'type'    => 'text',
            'desc' => '
            قیمت برای ۳ شب ، ۲ نفر
            ',
    
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'شروع قیمت',
            'id'   => 'fly_tour_ticket_start_price_meta',
            'type'    => 'text',
            'desc' => '349 دلار',
    
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'مبدا',
            'id'   => 'fly_tour_origin_meta',
            'type'    => 'text',
            
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'مقصد',
            'id'   => 'fly_tour_destination_meta',
            'type'    => 'text',
            
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'ساعت حرکت',
            'id'   => 'fly_tour_departure_time_meta',
            'type'    => 'text',
            
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'مدت زمان حرکت',
            'id'   => 'fly_tour_duration_of_movement_time_meta',
            'type'    => 'text',
            
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'تاریخ پرواز',
            'id'   => 'fly_tour_date_meta',
            'type'    => 'text_date',
            
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'تعداد توقوف',
            'id'   => 'fly_tour_number_stop_meta',
            'type'    => 'text',
            
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'نوع پرواز',
            'id'   => 'fly_tour_type_meta',
            'type'    => 'text',
            
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'شماره صندلی',
            'id'   => 'fly_tour_number_chair_meta',
            'type'    => 'text',
            
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => 'میزان بار مجاز',
            'id'   => 'fly_tour_kg_meta',
            'type'    => 'text',
            
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => ' 1 کلاس نرخی',
            'id'   => 'fly_tour_economy1_meta',
            'type'    => 'text',
            
        ) );
        $cmb_tour->add_group_field( $ticket_tour, array(
            'name' => ' 2 کلاس نرخی',
            'id'   => 'fly_tour_economy2_meta',
            'type'    => 'text',
            
        ) );




       
        
//شروع تنظیمات بخش پاراگراف های پایین
                        $paragraph_tour = $cmb_tour->add_field( array(
                            'id'          => 'fly_tour_paragraph_meta',
                            'type'        => 'group',
                            'repeatable'  => true, // use false if you want non-repeatable group
                            'options'     => array(
                                'group_title'       => __( 'پاراگراف های پایین', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                                'sortable'          => false,
                                'closed'         => true, // true to have the groups closed by default
                                'add_button'        => __( 'افزودن ', 'cmb2' ),
                                'remove_button'     => __( 'حذف ', 'cmb2' ),
                                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
                            ),
                        ) );
                    
                        $cmb_tour->add_group_field( $paragraph_tour, array(
                            'name' => 'عنوان',
                            'id'   => 'fly_tour_paragraph_title_meta',
                            'type'    => 'text',
                    
                        ) );
                        $cmb_tour->add_group_field( $paragraph_tour, array(
                            'name' => 'توضیحات',
                            'id'   => 'fly_tour_paragraph_desc_meta',
                            'type'    => 'textarea',
                            
                        ) );
                     
// عنوان لیست تورهای داخلی

$cmb_tour->add_field( array(
    'name'    => 'عنوان لیست تورهای داخلی ',
    'default' => ' لیست تورهای داخلی ',
    'id'      => 'fly_tour_list_main_title_meta',
    'type'    => 'text'
) );
                     
 




}

