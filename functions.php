<?php


load_theme_textdomain('irhi-theme', TEMPLATEPATH . '/languages');

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if (is_readable($locale_file))
    require_once($locale_file);


function get_page_number()
{
    if (get_query_var('paged')) {
        print ' | ' . __('Page ', 'irhi-theme') . get_query_var('paged');
    }
}

//Define Assets
define('ECM_ASSETS_URL', trailingslashit(get_template_directory_uri()) . 'assets/');
function irhi_theme_style_et_scripts()
{
    //Jquery
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);

    //Slick Slider
    wp_enqueue_style('slick-style', ECM_ASSETS_URL . 'js/slick/slick.css');
    wp_enqueue_style('slick-style-theme', ECM_ASSETS_URL . 'js/slick/slick-theme.css');
    wp_enqueue_script('slick-js', ECM_ASSETS_URL . 'js/slick/slick.js');

    //Bootstrap
    wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
    wp_enqueue_script('boot3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), '', true);

    //Font Awesome
    wp_enqueue_style('custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css');

    //Stylesheet
    wp_enqueue_style('style', get_stylesheet_uri());

    //Script
    wp_enqueue_script('script', ECM_ASSETS_URL . '/js/custom.js', array('jquery'), 1.1, true);
}
add_action('wp_enqueue_scripts', 'irhi_theme_style_et_scripts');

//SETUP
function irhi_theme_setup()
{
    add_theme_support('custom-logo', array(
        'height'      => 400,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    add_theme_support('custom-header');
    add_theme_support('align-wide');
    add_theme_support('post-thumbnails');

    add_post_type_support('page', 'excerpt');

    pll_register_string('more', 'En savoir plus');

    pll_register_string('temoignages', 'Témoignages');
    pll_register_string('services', 'Services');

    pll_register_string('up', 'Aller vers le haut');
    pll_register_string('copyright', 'Copyright');
    pll_register_string('reserved', 'All Rights Reserved');

    pll_register_string('email', 'Courriel');
    pll_register_string('phone', 'Téléphone');
}
add_action('after_setup_theme', 'irhi_theme_setup');

function irhi_theme_the_custom_logo()
{

    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
}
//PREPARATION DES MENUS
//Ajouts des menus
function register_my_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __('Principal'),
            'pieds_page' => __('Pieds de Page'),
        )
    );
}
add_action('init', 'register_my_menus');

//add phone number to users
add_filter('user_contactmethods', 'custom_user_contactmethods');
function custom_user_contactmethods($user_contact)
{
    $user_contact['ext_phone'] = 'Phone number';

    return $user_contact;
}
