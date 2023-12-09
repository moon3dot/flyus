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

    //شروع تنظیمات بررسی کلی

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
        'name' => 'مدت اقامت',
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

        // شروع تنظیمات بخش مشخصات پرواز

        $infoFly = $cmb_tour->add_field( array(
            'id'=> 'fly_info_tuor_meta',
            'type'=> 'group',
            'repeatable'  => false, // use false if you want non-repeatable group
            'options'=> array(
                'group_title'=> __('مشخصات پرواز'),
                'sortable' => true,
                'closed' => true, // true to have the groups closed by default
                'add_button' => __( 'افزودن ', 'cmb2' ),
                'remove_button' => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );

            $cmb_tour->add_group_field( $infoFly, array(
              'name' => 'اسم شرکت هواپیمایی رفت',
              'id'   => 'fly_tours_name_airline_company_one_meta',
              'type'    => 'text',
              ) );

            $cmb_tour->add_group_field( $infoFly, array(
                'name' => 'لوگوی شرکت  هوایپمایی پرواز رفت',
                'id' => 'fly_tour_logo__airline_company_one_meta',
                'type' => 'file',
                 'query_args' => array('type' => 'image'),
                ) );

            $cmb_tour->add_group_field( $infoFly, array(
                    
                'name' => 'مدت زمان پرواز',
                'id'   => 'fly_tour_time_flight_one_meta',
                'type'    => 'text',
                'desc' => ' 
                   ۴ ساعت ۴۵ دقیقه                  
                    ',
                    ) );

            $cmb_tour->add_group_field( $infoFly, array(
                 'name' => ' مبدا پرواز و ساعت',
                 'id'   => 'Origin_flight_and_time_one_meta',
                'type'    => 'text',
                'desc' => '
                کیش (IST) ۱۱:۰۰                 
                 ',
                 ) );

            $cmb_tour->add_group_field( $infoFly, array(
                'name' => ' مقصد پرواز و ساعت',
                'id'   => 'Destination_flight_and_time_one_meta',
                'type'    => 'text',
                'desc' => '
                کیش (IST) ۱۴:۰۰                 
                ',
                ) );

            $cmb_tour->add_group_field( $infoFly, array(
                'name' => 'Economy',
                'id'   => 'Economy_one_meta',
                'type'    => 'text',
                'desc' => '
                Economy              
                ',
                ) );

            $cmb_tour->add_group_field( $infoFly, array(
                'name' => 'میزان بار',
                'id'   => 'amount_of_load_one_meta',
                'type'    => 'text',
                'desc' => '
                20 kg              
                ',
                ) );

             $cmb_tour->add_group_field( $infoFly, array(
                'name' => 'توقف در مسیر',
                'id'   => 'Stopping_is_possible_one_meta',
                'type'    => 'text',
                'desc' => '
                دارد              
                ',
                ) );

                // پرواز برگشت

                
            $cmb_tour->add_group_field( $infoFly, array(
                'name' => 'برگشت اسم شرکت هواپیمایی',
                'id'   => 'fly_tour_name_airline_company_two_meta',
                'type'    => 'text',
                 'desc' => '
               ترکیش ایر لاین
               ',
                ) );
  
              $cmb_tour->add_group_field( $infoFly, array(
                  'name' => 'لوگوی شرکت  هوایپمایی پرواز رفت',
                  'id' => 'fly_tour_logo__airline_company_two_meta',
                  'type' => 'file',
                   'query_args' => array('type' => 'image'),
                  ) );
  
              $cmb_tour->add_group_field( $infoFly, array(
                      
                  'name' => 'مدت زمان پرواز برگشت',
                  'id'   => 'fly_tour_time_flight_two_meta',
                  'type'    => 'text',
                  'desc' => ' 
                     ۴ ساعت ۴۵ دقیقه                  
                      ',
                      ) );
  
              $cmb_tour->add_group_field( $infoFly, array(
                   'name' => ' مبدا پرواز و ساعت برگشت',
                   'id'   => 'Origin_flight_and_time_two_meta',
                  'type'    => 'text',
                  'desc' => '
                  کیش (IST) ۱۱:۰۰                 
                   ',
                   ) );
  
              $cmb_tour->add_group_field( $infoFly, array(
                  'name' => '  مقصد پرواز و ساعت برگشت',
                  'id'   => 'Destination_flight_and_time_two_meta',
                  'type'    => 'text',
                  'desc' => '
                  کیش (IST) ۱۴:۰۰                 
                  ',
                  ) );
  
              $cmb_tour->add_group_field( $infoFly, array(
                  'name' => 'Economy',
                  'id'   => 'Economy_two_meta',
                  'type'    => 'text',
                  'desc' => '
                  Economy              
                  ',
                  ) );
  
              $cmb_tour->add_group_field( $infoFly, array(
                  'name' => 'میزان بار برگشت',
                  'id'   => 'amount_of_load_two_meta',
                  'type'    => 'text',
                  'desc' => '
                  20 kg              
                  ',
                  ) );
  
               $cmb_tour->add_group_field( $infoFly, array(
                  'name' => ' توقف در مسیر برگشت',
                  'id'   => 'Stopping_is_possible_two_meta',
                  'type'    => 'text',
                  'desc' => '
                  دارد              
                  ',
                  ) );
  
              

        // شروع تنظیمات بخش  هزینه ها
       
        $infoPaments = $cmb_tour->add_field( array(
            'id'=> 'fly_paments_tuor_meta',
            'type'=> 'group',
            'repeatable'  => false, // use false if you want non-repeatable group
            'options'=> array(
                'group_title'=> __(' مشخصات هزینه ها '),
                'sortable' => true,
                'closed' => true, // true to have the groups closed by default
                'add_button' => __( 'افزودن ', 'cmb2' ),
                'remove_button' => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );

        $cmb_tour->add_group_field( $infoPaments, array(
            'name' => ' هزنیه 1 تخته',
            'id'   => 'Cost_of_1_bed_meta',
            'type'    => 'text',
            'desc' => '
            ۱۲،۰۰۰،۰۰۰ ریال             
            ',
            ) );

            $cmb_tour->add_group_field( $infoPaments, array(
                'name' => ' هزنیه 2 تخته',
                'id'   => 'Cost_of_2_bed_meta',
                'type'    => 'text',
                'desc' => '
                ۱۲،۰۰۰،۰۰۰ ریال             
                ',
                ) );

                $cmb_tour->add_group_field( $infoPaments, array(
                    'name' => ' هزنیه  تخته کودک',
                    'id'   => 'cost_of_child_bed_meta',
                    'type'    => 'text',
                    'desc' => '
                    ۱۲،۰۰۰،۰۰۰ ریال             
                    ',
                    ) );

                    $cmb_tour->add_group_field( $infoPaments, array(
                        'name' => ' هزنیه بدون تخته کودک',
                        'id'   => 'Cost_without_baby_board_meta',
                        'type'    => 'text',
                        'desc' => '
                        ۱۲،۰۰۰،۰۰۰ ریال             
                        ',
                        ) );

                        $cmb_tour->add_group_field( $infoPaments, array(
                            'name' => 'کودک زیر 2 سال',
                            'id'   => 'child_under_2_years_old_meta',
                            'type'    => 'text',
                            'desc' => '
                            ۱۲،۰۰۰،۰۰۰ ریال             
                            ',
                            ) );

        // شروع تنظیمات بخش خدمات تور

        $toursServices = $cmb_tour->add_field( array(
            'id'=> 'fly_tours-Services_meta',
            'type'=> 'group',
            'repeatable'  => false, // use false if you want non-repeatable group
            'options'=> array(
                'group_title'=> __(' خدمات تور '),
                'sortable' => true,
                'closed' => true, // true to have the groups closed by default
                'add_button' => __( 'افزودن ', 'cmb2' ),
                'remove_button' => __( 'حذف ', 'cmb2' ),
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
        ) );

        $cmb_tour->add_group_field( $toursServices, array(
            'name' => 'وعده غدایی',
            'id'   => 'Meal_tour_services_meta',
            'type'    => 'text',
            'desc' => '
            دارد            
            ',
            ) );

            $cmb_tour->add_group_field( $toursServices, array(
                     'name' => 'ترنسفر فرودگاهی',
                     'id'   => 'airport_transfer_tour_services_meta',
                     'type'    => 'text',
                     'desc' => '
                     دارد             
                     ',
                     ) );

                $cmb_tour->add_group_field( $toursServices, array(
                    'name' => 'بیمه مسافرتی',
                    'id'   => 'travel_insurance_tour_services_meta',
                    'type'    => 'text',
                    'desc' => '
                    دارد            
                    ',
                    ) );

                    $cmb_tour->add_group_field( $toursServices, array(
                        'name' => 'تور لیدر',
                        'id'   => 'tour_leader_tour_services_meta',
                        'type'    => 'text',
                        'desc' => '
                        دارد            
                        ',
                        ) );


                        $cmb_tour->add_group_field( $toursServices, array(
                            'name' => 'ویزا',
                            'id'   => 'visa_tour_services_meta',
                            'type'    => 'text',
                            'desc' => '
                            دارد           
                            ',
                            ) );

                            $cmb_tour->add_group_field( $toursServices, array(
                                'name' => 'گشت شهری',
                                'id'   => 'city_tour_tour_services_meta',
                                'type'    => 'text',
                                'desc' => '
                                دارد             
                                ',
                                ) );

                                $cmb_tour->add_group_field( $toursServices, array(
                                    'name' => 'سیم کارت',
                                    'id'   => 'SIM_card_tour_services_meta',
                                    'type'    => 'text',
                                    'desc' => '
                                    دارد             
                                    ',
                                    ) );
                                
    // شروع تنظیمات بخش توضیحات تور    
 $tourDescription = $cmb_tour->add_field( array(
    'id'=> 'fly_pament_tuor_meta',
    'type'=> 'group',
    'repeatable'  => false, // use false if you want non-repeatable group
    'options'=> array(
    'group_title'=> __(' توضیحات تور '),
    'sortable' => true,
    'closed' => true, // true to have the groups closed by default
    'add_button' => __( 'افزودن ', 'cmb2' ),
    'remove_button' => __( 'حذف ', 'cmb2' ),
          // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
      ),
  ) );

    $cmb_tour->add_group_field( $tourDescription, array(
        'name' => 'ساعت ورود',
        'id'   => 'entrance_time_tour_description_meta',
        'type'    => 'text',
        'desc' => '
        ساعت ورود به هتل ساعت ۱۴ است              
        ',
        ) );
        
        $cmb_tour->add_group_field( $tourDescription, array(
            'name' => 'ساعت خروج',
            'id'   => 'leaving_hour_tour_description_meta',
            'type'    => 'text',
            'desc' => '
            ساعت خروج به هتل ساعت ۱۲ ظهر است              
            ',
            ) );

            $cmb_tour->add_group_field( $tourDescription, array(
                'name' => 'پاسپورت',
                'id'   => 'passport_tour_description_meta',
                'type'    => 'text',
                'desc' => '
                گذرنامه با ۷ ماه اعتبار              
                ',
                ) );

                $cmb_tour->add_group_field( $tourDescription, array(
                    'name' => 'قوانین کنسلی',
                    'id'   => 'cancellation_rules_tour_description_meta',
                    'type'    => 'text',
                    'desc' => '
                    تور چارتر و غیر قابل استرداد میباشد              
                    ',
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

