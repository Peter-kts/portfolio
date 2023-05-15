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
?>