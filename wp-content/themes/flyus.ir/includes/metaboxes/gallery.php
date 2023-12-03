<?php add_action('cmb2_admin_init', 'cmb2_gallery_metaboxes');
/**
 * Define the metabox and field configurations.
 */
function cmb2_gallery_metaboxes()
{

    /**
     * Initiate the metabox
     */
    $cmb_gallery = new_cmb2_box(array(
        'id' => 'gallery_metabox',
        'title' => __('Metabox', 'cmb2'),
        'object_types' => array('gallery'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
// 'cmb_styles' => false, // false to disable the CMB stylesheet
// 'closed'     => true, // Keep the metabox closed by default
    ));

    $cmb_gallery->add_field( array(
        'name' => 'تصاویر',
        'id' => 'fly_gallery_img_meta',
        'type' => 'file_list',
        'query_args' => array('type' => 'image'),
    ));
    
   

}

