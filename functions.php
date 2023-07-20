<?php

function portfolio_theme_support(){
    add_theme_support('title-tag');
}

add_action( 'after_setup_theme', 'portfolio_theme_support');

// <!-- Theme CSS -->
function portfolio_register_styles(){

    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style( 'normalizecss', get_template_directory_uri() . '/assets/css/modern-normalize.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'generic-style', get_template_directory_uri() . '/assets/css/style.css', array(), $version, 'all' );

}

add_action( 'wp_enqueue_scripts', 'portfolio_register_styles' );

function portfolio_register_scripts(){

    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script( 'jQuery', 'https://code.jquery.com/jquery-3.6.4.slim.min.js', array(), '3.4.1', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/javascript/main.js', array(), '1', true );

}

add_action( 'wp_enqueue_scripts', 'portfolio_register_scripts' );

//Seperate menu generation function due to wanting active page to have black background
function gen_main_nav_list() {
    $all_page_ids_original = get_all_page_ids();
    echo(count($all_page_ids_original));
    count($all_page_ids_original) > 1 ? $all_page_ids = usort($all_page_ids_original) : $all_page_ids = $all_page_ids_original;
    $current_page_title = get_the_title();

    if (count($all_page_ids) > 0) {
        echo("<div class='main-nav__list'>");
            foreach ($all_page_ids as $page) {
                $page_title = get_the_title($page);
                $page_permalink = get_permalink($page);
                $active_modifier = '';
                $current_page_title == $page_title ? $active_modifier = 'main-nav__active' : $active_modifier = '';
                
                echo("<a class='main-nav__link main-nav__work {$active_modifier}' href='{$page_permalink}'>{$page_title}</a>");
            }
        echo("</div>");
    }
}

?>