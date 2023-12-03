<?php add_action('cmb2_admin_init', 'cmb2_post_metaboxes');
/**
 * Define the metabox and field configurations.
 */
function cmb2_post_metaboxes()
{

    /**
     * Initiate the metabox
     */
    $cmb_post = new_cmb2_box(array(
        'id' => 'post_metabox',
        'title' => __('Metabox', 'cmb2'),
        'object_types' => array('post'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
// 'cmb_styles' => false, // false to disable the CMB stylesheet
// 'closed'     => true, // Keep the metabox closed by default
    ));
    $attach_post = $cmb_post->add_field( array(
        'id'          => 'fly_post_attach_meta',
        'type'        => 'group',
        'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'فایل های این مقاله', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => true,
            'closed'         => true, // true to have the groups closed by default
            'add_button'        => __( 'افزودن ', 'cmb2' ),
            'remove_button'     => __( 'حذف ', 'cmb2' ),
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $cmb_post->add_group_field( $attach_post, array(
        'name' => 'خلاصه مقاله',
        'id'   => 'fly_post_attach_excerpt_meta',
        'type'    => 'textarea',

    ) );


    $cmb_post->add_group_field( $attach_post, array(
        'name' => 'پادکست',
        'id'   => 'fly_post_attach_podcast_meta',
        'type'    => 'file',

    ) );
    $cmb_post->add_group_field( $attach_post, array(
        'name' => 'فایل pdf',
        'id'   => 'fly_post_attach_pdf_meta',
        'type'    => 'file',

    ) );
    $cmb_post->add_group_field( $attach_post, array(
        'name' => 'ویدئو',
        'id'   => 'fly_post_attach_video_meta',
        'type'    => 'file',

    ) );



    $content_post = $cmb_post->add_field( array(
        'id'          => 'fly_post_content_meta',
        'type'        => 'group',
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'محتوای مقاله', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable'          => true,
            'closed'         => true, // true to have the groups closed by default
            'add_button'        => __( 'افزودن ', 'cmb2' ),
            'remove_button'     => __( 'حذف ', 'cmb2' ),
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $cmb_post->add_group_field( $content_post, array(
        'name' => 'عنوان',
        'id'   => 'fly_post_content_title_meta',
        'type'    => 'text',

    ) );
    $cmb_post->add_group_field( $content_post, array(
        'name' => 'توضیحات',
        'id'   => 'fly_post_content_desc_meta',
        'type'    => 'textarea',
        
    ) );
    $cmb_post->add_group_field( $content_post, array(
        'name' => 'فایل صوتی',
        'id'   => 'fly_post_content_audio_meta',
        'type'    => 'file',
        
    ) );
    $cmb_post->add_group_field( $content_post, array(
        'name' => 'تصویر',
        'id'   => 'fly_post_content_img_meta',
        'type' => 'file',
        'query_args' => array('type' => 'image'),
        
    ) );
    $cmb_post->add_group_field( $content_post, array(
        'name' => 'توضیحات',
        'id'   => 'fly_post_content_desc1_meta',
        'type'    => 'textarea',
        
    ) );
    $cmb_post->add_group_field( $content_post, array(
        'name' => 'تصویر',
        'id'   => 'fly_post_content_img1_meta',
        'type' => 'file',
        'query_args' => array('type' => 'image'),
        
    ) );
   

}

