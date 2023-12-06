<?php
//theme support
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


//add file css and js
function flyus_scripts()
{
    wp_enqueue_style('main', THEME_STYLES . '/main.css', '1.1.8');
    wp_enqueue_style('style', get_stylesheet_uri(),'1.1.0');


    wp_enqueue_script('swiper', THEME_JS . '/swiper.js','' , '1.1.0', true);
	wp_enqueue_script('main', THEME_JS . '/main.js','' , '1.1.', true);
    wp_enqueue_script('my-script', THEME_JS .'/script.js', array('jquery'), '1.1.0',[1] ,true);
    wp_localize_script('my-script', 'data', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'flyus_scripts');



//remove google font
function remove_google_fonts_stylesheet() {  
    wp_dequeue_style( 'google-fonts-roboto' );
}
add_action( 'wp_enqueue_scripts', 'remove_google_fonts_stylesheet', 999 );


//add menu settings theme
add_action('admin_menu', 'fly_settings_theme');

function fly_settings_theme() {
    $menu_slug = 'fly-settings-theme';
    add_menu_page( 'تنظیمات قالب', 'تنظیمات قالب', 'manage_options',$menu_slug,'fly_settings_page', false );
}
function fly_settings_page(){
    require_once THEME_INCLUDES . '/theme-settings/settings.php';
}


function get_post_view($post_id){

    if(intval($post_id)){

        $post_view = get_post_meta($post_id,'views',true);
        return intval($post_view);

    }

    return 0;

}
function set_post_view($post_id){

    if( intval( $post_id ) ){

        $views = get_post_view($post_id);
        $views++;
        update_post_meta($post_id,'views',$views);
    }

}

add_action( 'save_post_tours', 'tours_meta', 20, 2 );
function tours_meta( $post_id, $post ) {
	// bail out if this is an autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// bail out if this is not an event item
	if ( 'tours' !== $post->post_type ) {
		return ("post type ?!");
	}

	// ... do override stuff
    $hotel=get_post_meta( $post_id , 'fly_tour_hotel_meta', true );
    $name=$hotel[0]['fly_tour_hotel_name_meta'];
    $star=$hotel[0]['fly_tour_hotel_star_meta'];
    if(!empty($name)){ update_post_meta( $post_id, 'hotel_name', sanitize_text_field( $name ) );}
    if(!empty($star)){ update_post_meta( $post_id, 'hotel_star', sanitize_text_field( $star ) );}

}


register_nav_menus(
    array('main-menu' => __( ' منوی اصلی' ),'footerCol1' =>__('ستون اول فوتر') ,'footerCol2' =>__('ستون دوم فوتر') ,'footerCol3' =>__('ستون سوم فوتر') , 'footerCol4' =>__('ستون چهارم فوتر') ,'footerCol5' =>__('ستون پنجم فوتر'))
);


add_action('init', 'insurance_start_session',1);
function insurance_start_session(){
	if(!session_id()) {
		session_start();
	}
}




//add file php
require_once get_template_directory() . '/functions/constants.php';
require_once THEME_FUNCTION . '/register-posttypes.php';
require_once THEME_INCLUDES . '/ajax.php';
require_once THEME_INCLUDES . '/settings.php';
require_once THEME_INCLUDES . '/metabox.php';
require_once THEME_INCLUDES . '/ajax-insurance/travel-insurance.php';
