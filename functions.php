<?php
/**
 * Brza Dostava functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Brza_Dostava
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'brzadostava_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brzadostava_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Brza Dostava, use a find and replace
		 * to change 'brzadostava' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'brzadostava', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'brzadostava'), 
				 'footer_menu'=>__('footer','brzadostava'),
				 'special'=> __('default','brzadostava'),
			)
		);
		require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
		
		/**
		 * Register Custom Navigation Walker
		 */
		function register_navwalker(){
			// wordpress\wp-content\themes\brzadostava\class-wp-bootstrap-navwalker.php
			require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
			

		}
		add_action( 'after_setup_theme', 'register_navwalker' );	

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'brzadostava_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'brzadostava_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function brzadostava_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'brzadostava_content_width', 640 );
}
add_action( 'after_setup_theme', 'brzadostava_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function brzadostava_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'brzadostava' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'brzadostava' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'brzadostava_widgets_init' );

/**
 * Register widget area Shoping cart
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function brzadostava_widgets_init2() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Basket', 'brzadostava' ),
			'id'            => 'basket',
			'description'   => esc_html__( 'Add widgets here.', 'brzadostava' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'brzadostava_widgets_init2' );

/**
 * Enqueue scripts and styles.
 */
 
 function themebs_enqueue_styles() {

  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );
  wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'themebs_enqueue_styles');

 
function brzadostava_scripts() {
	wp_enqueue_style( 'brzadostava-style', get_stylesheet_uri(), array(), _S_VERSION );
	  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/inc/js/bootstrap.bundle.min.js', array( 'jquery' ) );


	wp_enqueue_style('radio','/www.radiojar.com/wrappers/api-plugins/v1/css/player.css');


	wp_style_add_data( 'brzadostava-style', 'rtl', 'replace' );

	wp_enqueue_script( 'brzadostava-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    
	wp_enqueue_script('fontawesome','https://kit.fontawesome.com/7acd338b68.js');

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'brzadostava_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add Custom classes to menu items
 */
add_filter( 'nav_menu_link_attributes', 'nav_menu_link_class', 10, 2 );
function nav_menu_link_class( $atts, $item ) {
    if( !$item->has_children && $item->menu_item_parent > 0 ) {
        $class         = 'homeNav__nav--item';
        $atts['class'] = $class;
    }

    return $atts;
}

function modify_read_more_link() {
    return '';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * Woocommerce
*/

// Add new constant that returns true if WooCommerce is active
define( 'WPEX_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );

// Checking if WooCommerce is active
if ( WPEX_WOOCOMMERCE_ACTIVE ) {
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
    
    // Do something...
    // Such as including a new file with all your Woo edits.
    
    // Remove the result count from WooCommerce
    remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
    //Remove Images from products
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    
    add_filter( 'woocommerce_show_page_title', '__return_false' );


// product view in gallery

 
 remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
// remove_action('')
 
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); 
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );


add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
 
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
 


add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 
add_filter( 'woocommerce_cart_item_thumbnail', '__return_false' );
add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false');



}

add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );


remove_action( 
  'woocommerce_before_shop_loop_item',
  'woocommerce_template_loop_product_link_open',
  10
);





 add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="main">';
}

function my_theme_wrapper_end() {
    echo '</section>';
}


// add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );



add_action('woocommerce_archive_description', 'custom_archive_description', 2 );
function custom_archive_description(){
    if( is_product_category() ) :
        remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
        add_action( 'woocommerce_before_main_content', 'woocommerce_taxonomy_archive_description', 5 );
    endif;
}





/**
* Adding additional markup before product list
*/

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
if ( ! function_exists( 'add_product_item_title' ) ) {
/**
* Adding product item title markup
*/
function add_product_item_title() {
echo '<p class="my-product-item-title" style="text-transform: uppercase;font-weight:bold;">' . get_the_title() . '</p>';
} 
add_action( 'woocommerce_shop_loop_item_title', 'add_product_item_title' );
}


//Remove single page
add_filter( 'woocommerce_register_post_type_product','hide_product_page',12,1);
function hide_product_page($args){
    $args["publicly_queryable"]=false;
    $args["public"]=false;
    return $args;
}


add_action( 'woocommerce_after_shop_loop_item_title', 'wc_add_long_description' );
/**
 * WooCommerce, Add Long Description to Products on Shop Page
 *
 * @link https://wpbeaches.com/woocommerce-add-short-or-long-description-to-products-on-shop-page
 */
function wc_add_long_description() {
	global $product;

	?>
        <div itemprop="description">
            <?php echo apply_filters( 'the_content', $product->post->post_content ) ?>
        </div>
	<?php
}



function woocommerce_after_shop_loop_item_title_short_description() {
	global $product;

	if ( ! $product->post->post_excerpt ) return;
	?>
	<div itemprop="description">
		<!--<?php echo apply_filters( 'woocommerce_short_description', $product->post->post_excerpt ) ?>-->
		 <?php echo apply_filters( 'the_content', $product->post->post_content ) ?>
	</div>
	<?php
}
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_after_shop_loop_item_title_short_description', 5);



  if ( ! function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {

  function woocommerce_template_loop_add_to_cart() {
    global $product;

    if ($product->product_type == "variable" && (is_product() || is_product_category() || is_product_tag())) {
      woocommerce_variable_add_to_cart();
    }
    if($product->product_type == "simple" && (is_product() || is_product_category() || is_product_tag() )){
        woocommerce_simple_add_to_cart();
    }

    else {
      woocommerce_get_template( 'loop/add-to-cart.php' );
    }
  }

}



// 1. Split product quantities into multiple cart items
// Note: this is not retroactive - empty cart before testing
 
function bbloomer_split_product_individual_cart_items( $cart_item_data, $product_id ){
  $unique_cart_item_key = uniqid();
  $cart_item_data['unique_key'] = $unique_cart_item_key;
  return $cart_item_data;
}
 
add_filter( 'woocommerce_add_cart_item_data', 'bbloomer_split_product_individual_cart_items', 10, 2 );
 
// -------------------
// 2. Force add to cart quantity to 1 and disable +- quantity input
// Note: product can still be added multiple times to cart
 
add_filter( 'woocommerce_is_sold_individually', '__return_true' );





//
// Split items in cart
//
add_action( 'woocommerce_add_to_cart', 'mai_split_multiple_quantity_products_to_separate_cart_items', 10, 6 );
function mai_split_multiple_quantity_products_to_separate_cart_items( $cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data ) {

    // If product has more than 1 quantity
    if ( $quantity > 1 ) {

        // Keep the product but set its quantity to 1
        WC()->cart->set_quantity( $cart_item_key, 1 );

        // Run a loop 1 less than the total quantity
        for ( $i = 1; $i <= $quantity -1; $i++ ) {
            /**
             * Set a unique key.
             * This is what actually forces the product into its own cart line item
             */
            $cart_item_data['unique_key'] = md5( microtime() . rand() . "Hi Mom!" );

            // Add the product as a new line item with the same variations that were passed
            WC()->cart->add_to_cart( $product_id, 1, $variation_id, $variation, $cart_item_data );
        }

    }

}



//
//Bussines hours change
//
// Utility conditional funtion for store open hours (returns boolean true when store is open)
// 
// function is_store_open() {
//     // Set Your shop time zone (http://php.net/manual/en/timezones.php)
//     date_default_timezone_set('Europe/Paris');

//     // Below your shop time and dates settings
//     $start_time = mktime('08', '00', '00', date('m'), date('d'), date('Y')); // 12:00:00
//     $end_time   = mktime('23', '55', '00', date('m'), date('d'), date('Y')); // 22:00:00
//     $now        = time(); // Current timestamp in seconds

//     return ( $now >= $start_time && $now <= $end_time ) ? true : false;
// }

// Disable purchases on closing shop time
// add_filter( 'woocommerce_variation_is_purchasable', 'disable_purchases_on_shop', 10, 2 );
// add_filter( 'woocommerce_is_purchasable', 'disable_purchases_on_shop', 10, 2 );
// function disable_purchases_on_shop( $purchasable, $product ) {
//     // Disable purchases on closing shop time
//     if( ! is_store_open() )
//         $purchasable = false;

//     return $purchasable;
// }

// Cart and checkout validation
// add_action( 'woocommerce_check_cart_items', 'conditionally_allowing_checkout' );
// add_action( 'woocommerce_checkout_process', 'conditionally_allowing_checkout' );
// function conditionally_allowing_checkout() {
//     if ( ! is_store_open() ) {
//         // Store closed
//         wc_add_notice( __("Trenutno odmaramo… Nase radno vreme je od 08:00  to 00:00 "), 'error' );
//     }
// }

// add_action( 'template_redirect', 'closing_shop_notice' );
// function closing_shop_notice(){
//     if ( ! ( is_cart() || is_checkout() ) && ! is_store_open() ) {
//         // Store closed notice
//         wc_add_notice( __("Trenutno odmaramo… Nase radno vreme je od 08:00  to 00:00 "), 'notice' );
//     }
// }
	
	
	
	
	
//
//Add reply-to to admin email
//

add_filter('woocommerce_email_header', 'spigot_reply_to_mail_filter', 11, 3);


function spigot_reply_to_mail_filter($headers = '', $ordertype = 'new_order', $order = '') {

	if(!is_object($order) || empty($order) || $ordertype !== 'new_order') { return $headers; }

	$name = $order->get_billing_first_name().' '.$order->get_billing_last_name();
	$email = $order->get_billing_email();

	if(is_array($headers)) {
		$headers['Reply-To'] = "{$name} <{$email}>";
	} else {
		$headers .= "Reply-To: {$name} <{$email}>\r\n";
	}
}

//
// Empty cart after some time (this works for wp-admin login)
//
// add_filter('wc_session_expiring', 'so_26545001_filter_session_expiring' );

// function so_26545001_filter_session_expiring($seconds) {
//     return 60 * 5; // 23 hours = 60*60 *23
// }

// add_filter('wc_session_expiration', 'so_26545001_filter_session_expired' );

// function so_26545001_filter_session_expired($seconds) {
//     return 60 * 5; // 24 hours = 60*60*24
// }



/**
 * Custom currency and currency symbol
 */
add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {
     $currencies['ABC'] = __( 'Currency name', 'RSD' );
     return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'ABC': $currency_symbol = 'RSD'; break;
     }
     return $currency_symbol;
}


/******************
 * CART AND CHECKOUT SECTION
 * ******************/
 
//  add_filter( 'woocommerce_order_needs_shipping_address', '__return_true' );
 


//
//Empty Cart on logout
//
function your_function() {
    if( function_exists('WC') ){
        WC()->cart->empty_cart();
    }
}
add_action('wp_logout', 'your_function');
 
 
 // Tested on WooCommerce version 2.6.x and 3+ — For simple products only.
add_action('woocommerce_email_after_order_table', 'wcv_ingredients_email', 10, 4);
function wcv_ingredients_email( $order,  $sent_to_admin,  $plain_text,  $email ){
   
}
 
 
 add_action('woocommerce_checkout_billing','get_billing',10,1);
 function get_billing($checkout_fields){
     $current_user = wp_get_current_user();
     $user_id = $current_user->ID;
     
      $fname = get_user_meta( $current_user->ID, 'first_name', true );
    $lname = get_user_meta( $current_user->ID, 'last_name', true );
    $phone = get_user_meta($current_user->ID, 'billing_phone',true);
    $address_1 = get_user_meta( $current_user->ID, 'billing_address_1', true ); 
    $address_2 = get_user_meta( $current_user->ID, 'billing_address_2', true );
    $city = get_user_meta( $current_user->ID, 'billing_city', true );
    $postcode = get_user_meta( $current_user->ID, 'billing_postcode', true );
    
    echo $fname ." ".$lname. "<BR>";
    echo $phone . "<BR>";
    echo $address_1 ." ".$address_2 . "<BR>";
    echo $city . "<BR>";
    echo $postcode . "<BR>";
     
     
     
 }
 
 


 


//
// Add category name to cart item
//
add_filter( 'woocommerce_cart_item_name', 'bbloomer_cart_item_category', 99, 3);
 
function bbloomer_cart_item_category( $name, $cart_item, $cart_item_key ) {
 
$product_item = $cart_item['data'];
 
// make sure to get parent product if variation
if ( $product_item->is_type( 'variation' ) ) {
$product_item = wc_get_product( $product_item->get_parent_id() );
} 
 
$cat_ids = $product_item->get_category_ids();
 
// if product has categories, concatenate cart item name with them
if ( $cat_ids ) $name .= '</br>' . wc_get_product_category_list( $product_item->get_id(), ', ', '<span class="posted_in">' . _n( 'Restoran:', 'Restorani:', count( $cat_ids ), 'woocommerce' ) . ' ', '</span>' );
 
return $name;
 
}



//
// Add category name  to email
//
function modfuel_woocommerce_before_order_add_cat($name, $item){

   $product_id = $item['product_id'];

   $_product = wc_get_product( $product_id );
   $htmlStr = "";
   $cats = "";
   $terms = get_the_terms( $product_id, 'product_cat' );

   $count = 0;
   foreach ( $terms as $term) {
    $count++;

    if($count > 1){
      $cats .= $term->name;
    }
    else{
      $cats .= $term->name . ',';
    }

   }

   $cats = rtrim($cats,',');

//    $htmlStr .= $_product->get_title();

//    $htmlStr .= "<p><u>Restoran: " . $cats . "</u></p>";
//    

   $htmlStr .= "<h3><u>Restoran: " . $cats . "</u></h3>";
	
   $htmlStr .= $_product->get_title();

   return $htmlStr;
}

add_filter('woocommerce_order_item_name','modfuel_woocommerce_before_order_add_cat', 10, 2);



//
// Remove Flat rate label
//
add_filter( 'woocommerce_cart_shipping_method_full_label', 'bbloomer_remove_shipping_label', 9999, 2 );
function bbloomer_remove_shipping_label( $label, $method ) {
    $new_label = preg_replace( '/^.+:/', '', $label );
    return $new_label;
}


//
// Notice for the shipping costs
//
add_action( 'woocommerce_after_shipping_rate', 'action_after_shipping_rate', 20, 2 );
function action_after_shipping_rate ( $method, $index ) {
    // Targeting checkout page only:
    if( is_cart() ) return; // Exit on cart page

        echo __("<p>Svako Dodatno stajanje se doplacuje 50din vise</p>");
    
}




//
// Shipping Costs calculation
//
add_filter( 'woocommerce_package_rates', 'filter_shipping_rates_costs', 10, 2 );
function filter_shipping_rates_costs( $rates, $package ) {
    $step_cost = 50;
    $term_ids  = array();
    
    
    // Loop through cart items for the current shipping package
    foreach( $package['contents'] as $cart_item ){
        $terms = wp_get_post_terms( $cart_item['product_id'], 'product_cat' );

        // Loop through product categories terms for current cart item
        foreach ($terms as $term ) {
            // Only top level product category terms
            if ( $term->parent == 0 ) {
                
                // Set the term id in the array
                $term_ids[] = $term->term_id; 
               
                
            }
        }
    }
    $unique_terms = array_unique($term_ids,SORT_REGULAR);

    $terms_count = count( $unique_terms );

    // Loop through shipping rates
    foreach ( $rates as $rate_key => $rate ) {
        // Excluding free shipping methods
        if ( 'free_shipping' !== $rate->method_id && $terms_count > 1 ) {
            // Set rate cost
            $rates[$rate_key]->cost = $rate->cost + ($step_cost * ($terms_count - 1));
        }
    }

    return $rates;
}

/**
 * Hide category product count in product archives
 */
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );




add_filter( 'get_terms', 'ts_get_subcategory_terms', 10, 3 );
function ts_get_subcategory_terms( $terms, $taxonomies, $args ) {
$new_terms = array();
// if it is a product category and on the shop page
if ( in_array( 'product_cat', $taxonomies ) && ! is_admin() &&is_shop() ) {
foreach( $terms as $key => $term ) {
if ( !in_array( $term->slug, array( 'borneo' ) ) ) { //pass the slug name here
$new_terms[] = $term;
}}
$terms = $new_terms;
}
return $terms;
}

