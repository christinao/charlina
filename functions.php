<?php
/**
 * Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions including 
 * custom template tags, actions and filter hooks to change core functionality.
 *
 *
 * @package charlina
 */
 
 /**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) :
    $content_width = 600;
endif;

if ( ! function_exists( "charlina_setup" ) ):
    function charlina_setup() {

        // Make theme available for translation.
        // Translations can be filed in the /languages/ directory.
        load_theme_textdomain( "starter-theme", get_template_directory() . "/languages" );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( "automatic-feed-links" );

        // Enable support for Post Thumbnails on posts and pages
        //add_theme_support( "post-thumbnails" );

        // Enable support for Post Formats.
        add_theme_support( "post-formats", array( 
            "aside",
            "image",
            "video",
            "quote",
            "link"
        ) );

        // Enable support for HTML5 markup.
        add_theme_support( "html5", array(
            "comment-list",
            "search-form",
            "comment-form",
            "gallery",
        ) );

        // Enable support for editable menus via Appearance > Menus
        register_nav_menus( array(
            "primary" => __( "Primary Menu", "starter-theme" ),
        ) );
    }
endif; // charlina_setup
add_action( "after_setup_theme", "charlina_setup" );

/**
 * Register sidebars and widgetized areas
 */
function starter_theme_widgets_init() {
    register_sidebar( array(
        "name" => __( "Sidebar", "starter-theme" ),
        "id" => "sidebar-1",
        "before_widget" => "<aside id="%1$s" class="widget %2$s">",
        "after_widget" => "</aside>",
        "before_title" => "<h3 class="widget-title">",
        "after_title" => "</h3>",
    ) );
}
add_action( "widgets_init", "starter_theme_widgets_init" );

/**
 * Enqueue javascript files as needed
 */
function emitheme_scripts_method() {

    if ( is_singular() && comments_open() && get_option( "thread_comments" ) ) {
        wp_enqueue_script( "comment-reply" );
    }

    // wp_enqueue_script(
    //  "theme",
    //  get_template_directory_uri() . "/assets/theme.js",
    //  array("jquery")
    // );
}    
add_action("wp_enqueue_scripts", "emitheme_scripts_method");

/**
 * Add TinyMCE buttons that are disabled by default to 2nd row
 */
function starter_theme_mce_buttons($buttons) {    
  $buttons[] = "justify"; // fully justify text
  $buttons[] = "hr"; // insert HR

  return $buttons;
}
add_filter("mce_buttons_2", "starter_theme_mce_buttons");

/**
 * Remove from TinyMCE all colors except those specified
 */
//function starter_theme_change_mce_colors( $init ) {
//  $init["theme_advanced_text_colors"] = "8dc63f";
//  $init["theme_advanced_more_colors"] = false;
//return $init;
//}
//add_filter("tiny_mce_before_init", "starter_theme_change_mce_colors");