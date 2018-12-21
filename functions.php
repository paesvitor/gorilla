<?php
/**
 * Gridworks Funções e definições
 *
 * @package Gridworks
 */

/*------------------------------------*\
    Requires
\*------------------------------------*/
require_once("inc/wp/create-post-types.php");
require_once("inc/wp/create-fields.php");
require_once("inc/wp/remove-styles.php");
/*------------------------------------*\
    Enqueue
\*------------------------------------*/
function gw_scripts()
{
    wp_enqueue_style('gw-css', get_template_directory_uri() . '/dist/main.css');
    wp_enqueue_script('gw-js', get_template_directory_uri() . '/dist/main.js', array(), false, true);
}
/*------------------------------------*\
    Theme Supports
\*------------------------------------*/
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true);
    add_image_size('medium', 250, '', true);
    add_image_size('small', 120, '', true);
    add_image_size('custom-size', 700, 200, true);
}
/*------------------------------------*\
    Functions
\*------------------------------------*/
function gw_login()
{
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/inc/wp/custom-login-styles.css" />';
}

function gw_svg_support($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

function gw_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'nav',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => '',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}

function gw_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

function gw_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

/*------------------------------------*\
    Theme Actions
\*------------------------------------*/
add_action('wp_enqueue_scripts', 'gw_scripts');
add_action('login_head', 'gw_login');
add_action('init', 'gw_menu');
add_action('init', 'gw_pagination'); // Add our HTML5 Pagination
/*------------------------------------*\
    Theme Filters
\*------------------------------------*/
add_filter('upload_mimes', 'gw_svg_support');
add_filter('show_admin_bar', '__return_false');
