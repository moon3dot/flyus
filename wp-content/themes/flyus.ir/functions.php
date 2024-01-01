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
    wp_enqueue_style('main', THEME_STYLES . '/main.css', '1.3.1');
    wp_enqueue_style('style', get_stylesheet_uri(),'1.1.1');


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
    
    // $infoFly = get_post_meta( $post_id ,'fly_info_tuor_meta', true );
    // $fly_tours_name_airline_company_one = $infoFly[0]['fly_tours_name_airline_company_one_meta'];
    // if(!empty($fly_tours_name_airline_company_one)){ update_post_meta( $post_id, 'fly_tours_name_airline_company_one', sanitize_text_field($fly_tours_name_airline_company_one));}
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

//woo
// add_action( 'woocommerce_checkout_billing', 'customise_checkout_field' );
// function customise_checkout_field( $checkout ) {
//   $checkout = WC()->checkout;
//   echo '<div id="customise_checkout_field"><h2>' . __('Heading') . '</h2>';
//   woocommerce_form_field( 'customised_field_name', array( 'type' => 'text','class' => array('my-field-class form-row-wide') ,'label' => __('Customise Additional Field') ,'placeholder' => __('Guidence') ,'required' => false,) , $checkout->get_value( 'customised_field_name' ) );
//   echo '</div>';
// }

// پاک کردن فیلد ها
add_filter( 'woocommerce_checkout_fields' , 'remove_billing_first_name_field' );
 
function remove_billing_first_name_field( $fields ) {
 unset($fields['billing']['billing_first_name']); // نام 
 unset($fields['billing']['billing_last_name']); // نام خانوادگی
 unset($fields['billing']['billing_company']); // اسم شرکت
 unset($fields['billing']['billing_country']); // اسم کشور
 unset($fields['billing']['billing_address_1']);
 unset($fields['billing']['billing_address_2']);
 unset($fields['billing']['billing_state']);
 unset($fields['billing']['billing_city']);
 unset($fields['billing']['billing_postcode']);
 unset($fields['billing']['billing_phone']);
 unset($fields['billing']['billing_email']);
 return $fields;
}

// اضافه کردن قیمت
add_action( 'woocommerce_checkout_order_review', 'customise_checkout_order_review' );
function customise_checkout_order_review() {

}

//  صفحه بندی مطالب 

function cpt_pagination() {
 
	if( is_singular() )
		return;
 
	global $wp_query;
 
	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;
 
	$paged = get_query_var( 'tuors' ) ? absint( get_query_var( 'tuors' ) ):1;
	$max   = intval( $wp_query->max_num_pages );
 
	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;
 
	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
 
	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
 
	echo '<div class="navigation" style="display: flex; justify-content: center;"><ul>' . "\n";
 
	/**	Previous Post Link */
	
	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';
 
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}
 
	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
 
	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";
 
		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
 
	/**	Next Post Link */
	
	echo '</ul></div>' . "\n";
 
}
