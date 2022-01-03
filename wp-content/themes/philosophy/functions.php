<?php
require_once get_theme_file_path( "inc/tgm.php" );
require_once get_theme_file_path( "inc/attachments.php" );
require_once get_theme_file_path( "template-parts/widgets/social-icons-widget.php" );

if ( !isset( $content_width ) ) {
   $content_width = 960;
}
function philosophy_theme_setup() {
   load_theme_textdomain( "philosophy" );
   add_theme_support( "title-tag" );
   add_theme_support( "post-thumbnails" );
   add_theme_support( "html5", array( "search-form", "comment-list" ) );
   add_theme_support( "post-formats", array( "image", "audio", "video", "quote", "link", "gallery" ) );
   add_editor_style( "assets/css/editor-style.css" );
   add_theme_support( "custom-logo" );
   add_theme_support( 'automatic-feed-links' );


   add_image_size( "philosophy_home_square", 400, 400, true );

   register_nav_menu( "topmenu", __( "Top Menu", "philosophy" ) );
   register_nav_menus(
      array(
         "footer-left"   => __( "Footer Left", "philosophy" ),
         "footer-middle" => __( "Footer Middle", "philosophy" ),
         "footer-right"  => __( "Footer Right", "philosophy" ),
      )
   );
}
add_action( "after_setup_theme", "philosophy_theme_setup" );
function philosophy_assets() {
   wp_enqueue_style( "fontawesome-css", get_theme_file_uri( "assets/css/font-awesome/css/font-awesome.min.css" ), null, "1.0" );
   wp_enqueue_style( "fonts-css", get_theme_file_uri( "assets/css/fonts.css" ), null, "1.0" );
   wp_enqueue_style( "base-css", get_theme_file_uri( "assets/css/base.css" ), null, "1.0" );
   wp_enqueue_style( "vendor-css", get_theme_file_uri( "assets/css/vendor.css" ), null, "1.0" );
   wp_enqueue_style( "main-css", get_theme_file_uri( "assets/css/main.css" ), null, "1.0" );
   wp_enqueue_style( "philosophy-css", get_stylesheet_uri(), null, time() );

   wp_enqueue_script( "modernizr-js", get_theme_file_uri( "assets/js/modernizr.js" ), null, "1.0" );
   wp_enqueue_script( "pace-js", get_theme_file_uri( "assets/js/pace.min.js" ), null, "1.0" );
   wp_enqueue_script( "plugins-js", get_theme_file_uri( "assets/js/plugins.js" ), array( "jquery" ), "1.0", true );
   wp_enqueue_script( "main-js", get_theme_file_uri( "assets/js/main.js" ), array( "jquery" ), "1.0", true );
   if ( is_singular() ) {
      wp_enqueue_script( "comment-reply" );
   }
}
add_action( "wp_enqueue_scripts", "philosophy_assets" );
function philosophy_pagination() {
   global $wp_query;
   $links = paginate_links(
      array(
         "current"  => max( 1, get_query_var( "paged" ) ),
         "total"    => $wp_query->max_num_pages,
         "type"     => "list",
         "mid_size" => 3,
      )
   );
   $links = str_replace( "page-numbers", "pgn__num", $links );
   $links = str_replace( "<ul class='pgn__num'>", "<ul>", $links );
   $links = str_replace( "next pgn__num", "pgn__next", $links );
   $links = str_replace( "prev pgn__num", "pgn__prev", $links );
   echo wp_kses_post( $links );
}
remove_action( "term_description", "wpautop" );
function philosophy_widgets() {
   register_sidebar(
      array(
         'id'            => 'about-us',
         'name'          => __( 'About Section', 'philosophy' ),
         'description'   => __( 'About page section', 'philosophy' ),
         'before_widget' => '<div id="%1s" class="col-block %2s">',
         'after_widget'  => '</div>',
         'before_title'  => '<h3 class="quarter-top-margin">',
         'after_title'   => '</h3>',
      )
   );
   register_sidebar(
      array(
         'id'            => 'wp-google-maps',
         'name'          => __( 'Contact Page Maps Section', 'philosophy' ),
         'description'   => __( 'Contact page wp google maps section', 'philosophy' ),
         'before_widget' => '<div id="%1s" class=" %2s">',
         'after_widget'  => '</div>',
         'before_title'  => '',
         'after_title'   => '',
      )
   );
   register_sidebar(
      array(
         'id'            => 'contact-info',
         'name'          => __( 'Contact Info Section', 'philosophy' ),
         'description'   => __( 'Contact page Info section', 'philosophy' ),
         'before_widget' => '<div id="%1s" class="col-six tab-full %2s">',
         'after_widget'  => '</div>',
         'before_title'  => '<h3 class="quarter-top-margin">',
         'after_title'   => '</h3>',
      )
   );
   register_sidebar(
      array(
         'id'            => 'befor-footer-section',
         'name'          => __( 'Before Footer Section', 'philosophy' ),
         'description'   => __( 'Before footer section', 'philosophy' ),
         'before_widget' => '<div id="%1s" class=" %2s">',
         'after_widget'  => '</div>',
         'before_title'  => '<h3>',
         'after_title'   => '</h3>',
      )
   );
   register_sidebar(
      array(
         'id'            => 'footer-right',
         'name'          => __( 'Footer Section', 'philosophy' ),
         'description'   => __( ' footer section', 'philosophy' ),
         'before_widget' => '<div id="%1s" class=" %2s">',
         'after_widget'  => '</div>',
         'before_title'  => '<h4>',
         'after_title'   => '</h4>',
      )
   );
   register_sidebar(
      array(
         'id'            => 'footer-bottom',
         'name'          => __( 'Footer Copyright Section', 'philosophy' ),
         'description'   => __( 'footer copyright section', 'philosophy' ),
         'before_widget' => '<div id="%1s" class=" %2s">',
         'after_widget'  => '</div>',
         'before_title'  => '',
         'after_title'   => '',
      )
   );

}
add_action( "widgets_init", "philosophy_widgets" );

function philosophy_search_form( $form ) {
   $label = __( "Search for:", "philosophy" );
   $homedir = home_url( "/" );
   $button_label = __( "Search", "philosophy" );
   $newform = <<<FORM
  <form role="search" method="get" class="header__search-form" action="{$homedir}">
      <label>
          <span class="hide-content">{$label}</span>
          <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$label}" autocomplete="off">
      </label>
      <input type="submit" class="search-submit" value="{$button_label}">
  </form>
FORM;
   return $newform;
}
add_filter( "get_search_form", "philosophy_search_form" );