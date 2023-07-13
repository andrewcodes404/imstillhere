<?php


function ish_enqueue_js()
{
  wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/dist/main.min.js', '', filemtime(get_template_directory() . '/assets/dist/main.min.js'), true);
}

add_action('wp_enqueue_scripts', 'ish_enqueue_js');


//Stylesheets
function ish_enqueue_styles()
{
  ///fonts
  wp_enqueue_style('rt-gfonts-css', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&display=swap');
  // internal style sheet
  wp_enqueue_style('rt-main-css', get_template_directory_uri() . '/assets/dist/main.min.css', array(), filemtime(get_template_directory() . '/assets/dist/main.min.css'), false);

  wp_enqueue_style('style-css', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
}

add_action('wp_enqueue_scripts', 'ish_enqueue_styles');
