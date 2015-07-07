<?php

require_once('wp_bootstrap_navwalker.php');

function theme_setup(){
    add_theme_support( 'post-thumbnails' );
    
    /* define image sizes */
    add_image_size('home_box_image', 242, 195);
    add_image_size('blog_listing_image', 248, 195);
    
    /* set default timezone */
    date_default_timezone_set('Asia/Kolkata');
}
add_action('after_setup_theme', 'theme_setup');

register_nav_menus( array(
    'header'   => __( 'Header Menu' ),
    'footer' => __( 'Footer Menu' ),
    'services' => __( 'Services Menu' ),
    'need_help' => __( 'Need Help Menu' ),
    'company_info' => __( 'Company Info Menu' )
) );

add_action('init', 'slider');

function slider(){
    $slider_args = array(
        'label'	=> __('Slider'),
        'singular_label' =>	__('Slider'),
        'public'	=>	true,
        'show_ui'	=>	true,
        'capability_type'	=>	'post',
        'hierarchical'	=>	false,
        'rewrite'	=>	true,
        'supports'	=>	array('title', 'editor','page-attributes','thumbnail')
    );
    register_post_type('slider', $slider_args);
    
    register_post_type('events',
            array(
                'public' => true,
                'label' => 'Events',
                'labels'  => array(
                    'name' => __('Events'),
                    'add_new'  => __('Add New Event'),
                    'all_items'  => __('All Events'),
                    'add_new_item'  => __('Add New Event'),
                ),
                'rewrite' => array("slug" => "event"),
                'supports' => array( 'title', 'editor', 'thumbnail')
            )
    );
    flush_rewrite_rules();
}

function custom_excerpt($new_length = 20, $new_more = '') {
  add_filter('excerpt_length', function () use ($new_length) {
    return $new_length;
  }, 999);
  add_filter('excerpt_more', function () use ($new_more) {
    return $new_more;
  });
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

function smghealth_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer One' ),
        'id'            => 'footer-1',
        'description'   => __( 'Appears in the footer section of the site.' ),
        'before_widget' => '<div class="col-md-2 blog_con_left">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Two' ),
        'id'            => 'footer-2',
        'description'   => __( 'Appears in the footer section of the site.' ),
        'before_widget' => '<div class="footer-block footer-company-info">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Three' ),
        'id'            => 'footer-3',
        'description'   => __( 'Appears in the footer section of the site.' ),
        'before_widget' => '<div class="footer-block footer-fllow">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Four' ),
        'id'            => 'footer-4',
        'description'   => __( 'Appears in the footer section of the site.' ),
        'before_widget' => '<div class="footer-block footer-newsletter">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4><div class="newsletter-block">',
    ) );

}
add_action( 'widgets_init', 'smghealth_widgets_init' );


function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
    if ( $attach_id ) {
        $image_src = wp_get_attachment_image_src( $attach_id, 'full' );
        $file_path = get_attached_file( $attach_id );
    } else if ( $img_url ) {
        $file_path = parse_url( $img_url );
        $file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
        if(file_exists($file_path) === false){
            global $blog_id;
            $file_path = parse_url( $img_url );
            if (preg_match("/files/", $file_path['path'])) {
                $path = explode('/',$file_path['path']);
                foreach($path as $k=>$v){
                    if($v == 'files'){
                        $path[$k-1] = 'wp-content/blogs.dir/'.$blog_id;
                    }
                }
                $path = implode('/',$path);
            }
            $file_path = $_SERVER['DOCUMENT_ROOT'].$path;
        }
        $orig_size = getimagesize( $file_path );
        $image_src[0] = $img_url;
        $image_src[1] = $orig_size[0];
        $image_src[2] = $orig_size[1];
    }
    $file_info = pathinfo( $file_path );
    $base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
    if ( !file_exists($base_file) )
    return;
    $extension = '.'. $file_info['extension'];
    $no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
    $cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
    if ( $image_src[1] > $width ) {
        if ( file_exists( $cropped_img_path ) ) {
            $cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
            $vt_image = array (
                'url' => $cropped_img_url,
                'width' => $width,
                'height' => $height
            );
            return $vt_image;
        }
        if ( $crop == false OR !$height ) {
            $proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
            $resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;
            if ( file_exists( $resized_img_path ) ) {
                $resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
                $vt_image = array (
                'url' => $resized_img_url,
                'width' => $proportional_size[0],
                'height' => $proportional_size[1]
                );
                return $vt_image;
            }
        }
        $img_size = getimagesize( $file_path );
        if ( $img_size[0] <= $width ) $width = $img_size[0];
        if (!function_exists ('imagecreatetruecolor')) {
            echo 'GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library';
            return;
        }
        $new_img_path = image_resize( $file_path, $width, $height, $crop );
        $new_img_size = getimagesize( $new_img_path );
        $new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
        $vt_image = array (
            'url' => $new_img,
            'width' => $new_img_size[0],
            'height' => $new_img_size[1]
        );
        return $vt_image;
    }
    $vt_image = array (
        'url' => $image_src[0],
        'width' => $width,
        'height' => $height
    );
    return $vt_image;
}

add_action('admin_menu','wphidenag');

function wphidenag() {
    remove_action( 'admin_notices', 'update_nag', 3 );
}
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_field('logo', 'options'); ?>);
            background-size: 277px 65px;
            width:277px;
        }
    </style>
<?php }
add_action( 'login_head', 'my_login_logo' );
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_option('blogname');
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
function my_footer_shh() {
    remove_filter( 'update_footer', 'core_update_footer' ); 
}
add_action( 'admin_menu', 'my_footer_shh' );
function my_footer_text() {
	echo '';
}
add_action('admin_footer_text', 'my_footer_text');

function edit_admin_menus() {  
    global $submenu;  
    unset($submenu['index.php'][10]);
    return $submenu;
}  
add_action( 'admin_menu', 'edit_admin_menus' ); 
function remove_dashboard_meta(){
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );
function remove_admin_update_option() {
    echo '<script>
            (function($){
                $(function(){
                    $("ul#wp-admin-bar-root-default li").each(function(){
                        if($(this).attr("id") == "wp-admin-bar-updates")
                        {
                            $(this).remove();
                        }
                    });	
                });
            })(jQuery);  
        </script>';
}
add_action('admin_head', 'remove_admin_update_option');

add_action( 'wp_enqueue_scripts', 'ays_setup', 9 );

function ays_setup() {

    /* no Open Sans font in TinyMCE */
    remove_filter( 'mce_css', 'twentytwelve_mce_css' );

    /* no Open Sans font for the page */
    remove_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );
    add_action( 'wp_enqueue_scripts', 'ays_scripts_styles' );
}

function ays_scripts_styles() {
    global $wp_styles;

    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    // Adds JavaScript for handling the navigation menu hide-and-show behavior.
    wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

    // Loads our main stylesheet.
    wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

    // Loads the Internet Explorer specific stylesheet.
    wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
    $wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}

function DBUG($param){
    if(is_array){
        echo '<pre>';
        print_r($param);
    }else{
        var_dump($param);
    }
}

function common_banner_for_pages($page_id){
    $banner = '';
    $banner .='<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
    $banner .= '<img src="'.get_template_directory_uri().'/images/about_us_banner.png" alt="..." class="img-responsive">';
    $banner .='</div>';
    return $banner;
}

function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=$ret;
}

function event_sorting_by_date(){
    query_posts(array(
        'post_type' => 'events',
        'post_status' => 'publish' 
    ));
    $dates_array = array();
    if(have_posts()){
        while(have_posts()){
            the_post();
            $data = array(
                'post_id' => get_the_ID(),
                'start_date' => get_field('start_date'),
                'end_date' => get_field('end_date')
            );
            array_push($dates_array, $data);
        }
        wp_reset_query();
        aasort($dates_array, 'start_date');
        return $dates_array;
    }
    return 0;
}
?>