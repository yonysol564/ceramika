<?php
	define("THEME_DIR",get_template_directory_uri());
	//define("LANG", ICL_LANGUAGE_CODE);
	define("CURRENT_YEAR",date('Y'));
	$lang = TEMPLATEPATH . '/lang';
	load_theme_textdomain('title', $lang);
	get_template_part('admin/types'); 

	// Add body classes
	if ( ! function_exists( 'add_body_class' ) ){
	    function add_body_class( $classes ) {
	        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	        if( $is_lynx ) $classes[] = 'lynx';
	        elseif( $is_gecko ) $classes[] = 'gecko';
	        elseif( $is_opera ) $classes[] = 'opera';
	        elseif( $is_NS4 ) $classes[] = 'ns4';
	        elseif( $is_safari ) $classes[] = 'safari';
	        elseif( $is_chrome ) $classes[] = 'chrome';
	        elseif( $is_IE ) {
	            $classes[] = 'ie';
	            if( preg_match( '/MSIE ( [0-11]+ )( [a-zA-Z0-9.]+ )/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) )
	            $classes[] = 'ie' . $browser_version[1];
	        } else $classes[] = 'unknown';
	        if( $is_iphone ) $classes[] = 'iphone';

	        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
	                 $classes[] = 'osx';
	        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
	                 $classes[] = 'linux';
	        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
	                 $classes[] = 'windows';
	        }

	        return $classes;
	    }
	    add_filter( 'body_class','add_body_class' );
	}

	// function lang_class($output) {
	//     return $output . ' class="no-js '.LANG.'"';
	// }
	// add_filter('language_attributes', 'lang_class');

	remove_action('wp_head', 'wp_generator');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-thumbnails' );

/******************************************************************************************
							A D D    I M A G E    S I Z E S
******************************************************************************************/

add_image_size( 'project_image', 465, 360, true );
add_image_size( 'gallery_small_cube', 115, 80, true );



/******************************************************************************************
							S T Y L E S    R E G I S T E R
******************************************************************************************/

	function enqueue_my_styles() {

	    $mainStyle          = THEME_DIR . '/css/style.css';
	    $queryStyle         = THEME_DIR . '/css/responsive.css';
	    $fonts 				= THEME_DIR . '/fonts/stylesheet.css';
	    $swiper				= THEME_DIR . '/css/swiper.min.css';
	    $fancyboxcss        = THEME_DIR . '/js/fancybox/jquery.fancybox.css';

	    wp_enqueue_style( 'swiper', $swiper, array(), 'v1', 'all' );
	    wp_enqueue_style( 'fancyboxcss', $fancyboxcss, array(), 'v1', 'all' );
	    //wp_enqueue_style( 'fonts', $fonts, array(), NULL, 'all' );
	    wp_enqueue_style( 'mainStyle', $mainStyle, array(), 'v1', 'all' );
	    wp_enqueue_style( 'queryStyle', $queryStyle, array(), 'v1', 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_my_styles' );



/******************************************************************************************
						S C R I P T S 	 R E G I S T E R
******************************************************************************************/

	function register_my_jscripts() {
	   wp_register_script( 'googleapi', 'https://maps.googleapis.com/maps/api/js?libraries=geometry&key=AIzaSyDTvjmuu7Iv1w3EVppDJ5oFWW9EI9iew1M', array( 'jquery' ), NULL, false );wp_enqueue_script( 'googleapi' );
	   wp_register_script( 'swiper', THEME_DIR .'/js/swiper.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'swiper' );
	   wp_register_script( 'swipe', THEME_DIR .'/js/fancybox/touchswip.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'swipe' );
	   wp_register_script( 'fancybox', THEME_DIR .'/js/fancybox/jquery.fancybox.pack.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'fancybox' );
	    wp_register_script( 'mousewheel', THEME_DIR .'/js/fancybox/jquery.mousewheel-3.0.6.pack.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'mousewheel' );
	   wp_register_script( 'scripts', THEME_DIR .'/js/functions.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'scripts' );
	}
	add_action('wp_enqueue_scripts', 'register_my_jscripts');


/******************************************************************************************
						N A V I G A T I O N S  -  M E N U
******************************************************************************************/

// Menu
function register_my_menu() {
    register_nav_menus(array(
    	'top_menu' 	  		=>  'Top Menu',
    	'top_menu_mobile'   =>  'Top Menu Mobile',
    	'footer_menu_one'   =>  'Footer Menu 1',
		'footer_menu_tow'   =>  'Footer Menu 2',
		'footer_menu_three' =>  'Footer Menu 3'
    ));
}

add_action( 'init', 'register_my_menu' );

/******************************************************************************************
								S  I  D  E  B  A  R  S
******************************************************************************************/
	// register_sidebar(array(
	//     'name' => __('Home Sidebar', 'sagive'),
	//     'id' => 'home-sidebar',
	//     'description' => __('Main Home Sidebar', 'sagive')
	// ));



	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}


	function acf_google_map_api( $api ){
	    //$key = get_field('google_maps_key', 'option');
	    $api['key'] = 'AIzaSyDTvjmuu7Iv1w3EVppDJ5oFWW9EI9iew1M';
	    return $api;
	}
	add_filter('acf/fields/google_map/api', 'acf_google_map_api');



	// function my_acf_init() {
	// 	acf_update_setting('google_api_key', 'AIzaSyDTvjmuu7Iv1w3EVppDJ5oFWW9EI9iew1M');
	// }

	// add_action('acf/init', 'my_acf_init');


/******************************************************************************************
								F 	 U 	 N 	C   T 	I 	O 	N 	S
******************************************************************************************/


	// Toutube
	function getYoutubeThumbUrl($id , $size="0") {
	    $data = "http://img.youtube.com/vi/".$id."/".$size.".jpg";
	    return $data;
	}

	// Background color
	function hex2rgba($color, $opacity = false) {

		$default = 'rgb(0,0,0)';

		//Return default if no color provided
		if(empty($color))
	          return $default;

		//Sanitize $color if "#" is provided
	        if ($color[0] == '#' ) {
	        	$color = substr( $color, 1 );
	        }

	        //Check if color has 6 or 3 characters and get values
	        if (strlen($color) == 6) {
	                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	        } elseif ( strlen( $color ) == 3 ) {
	                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	        } else {
	                return $default;
	        }

	        //Convert hexadec to rgb
	        $rgb =  array_map('hexdec', $hex);

	        //Check if opacity is set(rgba or rgb)
	        if($opacity){
	        	if(abs($opacity) > 1)
	        		$opacity = 1.0;
	        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	        } else {
	        	$output = 'rgb('.implode(",",$rgb).')';
	        }

	        //Return rgb(a) color string
	        return $output;
	}

	//D Y N A M I C    E X C E R P T
	function dynamic_excerpt($length) { // Variable excerpt length. Length is set in characters
	    global $post;
	    $text = $post->post_excerpt;
	    if ( '' == $text ) {
	    $text = get_the_content('');
	    $text = apply_filters('the_content', $text);
	    $text = str_replace(']]>', ']]>', $text);
	    }
	    $text = strip_shortcodes($text); // optional, recommended
	    $text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags
	    $text = mb_substr($text,0,$length).'';
	    echo $text;
	}

	// Pagination
	function my_pagination(){
	    global $wp_query;
	    $big = 999999999;
	    echo paginate_links(array(
	        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
	        'format' => '?paged=%#%',
	       	'prev_text'          => __('<'),
			'next_text'          => __('>'),
	        'current' => max(1, get_query_var('paged')),
	        'total' => $wp_query->max_num_pages
	    ));
	}
	add_action('init', 'my_pagination'); // Add our Pagination


	function custom_excerpt_length( $length ) {
	return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function new_excerpt_more( $more ) {
			return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');



	// change breadcrumb navxt homepage name to page name
	add_filter('bcn_breadcrumb_title', function($title, $type, $id) {
	    if ($type[0] === 'home') {
	        $title = get_the_title(get_option('page_on_front'));
	    }
	    return $title;
	},  42, 3);
