<?php 

if ( site_url() == 'http://localhost/theme_dev3' ) {
  define( 'VERSION', time() );
} else {
  define( 'VERSION', wp_get_theme()->get( 'Version' ) );
}

function change_case( $text ){
  return strtoupper($text);
}

/*
* After Setup Theme bootstraping
*/
function alpha_bootstraping() {
    load_theme_textdomain( 'alpha' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    // add_theme_support( 'custom-header' );
    $alpha_custom_header_details = array(
      'header-text'  => true,
      'default-text-color'  => '#dd3333',
      'width'  => 1200,
      'height'  => 600,
      'flex-width'  => true,
      'flex-height'  => true,
    );
    add_theme_support( 'custom-header', $alpha_custom_header_details );
    $alpha_custom_logo_details = array(
      'width'  => 100,
      'height'  => 100,
    );
    add_theme_support( 'custom-logo', $alpha_custom_logo_details );
    add_theme_support( 'custom-background' );
    register_nav_menu( 'topmenu', __( 'Top Menu', 'alpha' ) );
    register_nav_menu( 'footermenu', __( 'Footer Menu', 'alpha' ) );
}
add_action( 'after_setup_theme', 'alpha_bootstraping' );

/** 
* Assets management
*/
function alpha_assets() {
    wp_enqueue_style( 'alpha', get_stylesheet_uri(), null, VERSION );
    wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'featherlight-css', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css' );
    wp_enqueue_script( 'featherlight-js', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array('jquery'), VERSION, true );
    wp_enqueue_script( 'bootstrap-js', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), VERSION, true );
    wp_enqueue_script( 'alpha-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'alpha_assets' );

function alpha_sidebar() {  
 register_sidebar(
  array(
    'name'           => sprintf( __( 'Single Post Sidebar', 'alpha' ) ),
    'id'             => "sidebar-1",
    'description'    => 'This is tha single post sidebar',
    'before_widget'  => '<section id="%1$s" class="widget %2$s">',
    'after_widget'   => "</section>\n",
    'before_title'   => '<h2 class="widgettitle">',
    'after_title'    => "</h2>\n",
  )
 );
}
add_action( 'widgets_init', 'alpha_sidebar' );

function alpha_the_excerpt( $excerpt ) {
  if( !post_password_required() ){
     return $excerpt;
  }else{
    echo get_the_password_form();
  }
}
add_action( 'the_excerpt', 'alpha_the_excerpt' );

function protected_title_format_cgange(){
  return "%s";
}
add_action( 'protected_title_format', 'protected_title_format_cgange' );


/**
 * Top menu ul li item css class add
 */
function alpha_menu_item_class( $classes ) {
  $classes[] = 'list-inline-item';
  return $classes;
}
add_filter( 'nav_menu_css_class', 'alpha_menu_item_class', 10, 2 );

/**
 * About page template banner
 * Homepage banner set use customizer
 */
function alpha_page_template_banner() {
  if ( is_page() ) {
    $alpha_feature_image = get_the_post_thumbnail_url( null, 'large' );
    ?>
    <style>
      .page-header{
        background-image: url(<?php echo $alpha_feature_image; ?>);
      }
    </style>
    <?php
  }

  if ( is_front_page() ) {

    ?>
    <style>
      .header{
        background-image: url(<?php echo header_image(); ?>);
        background-position: center;
        background-size: cover;
        margin-bottom: 30px;
        padding: 100px 0px;
      }
      .header h1 a, p{
        color: #<?php echo get_header_textcolor()?>;

        <?php  if ( ! display_header_text() ) { 
                  echo 'display: none';
               } 
        ?>
      }
     
    </style>
    <?php
  }

}
add_action( 'wp_head', 'alpha_page_template_banner' );
