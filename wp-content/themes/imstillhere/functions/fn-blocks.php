<?php

// add_action('init', 'register_blocks');
//don't forget to add any new blocks to rt_allowed_block_types() below
// register_block_type(get_template_directory() . '/blocks/anchor-tabs/block.json');
// register_block_type(get_template_directory() . '/blocks/carousel/block.json');
// register_block_type(get_template_directory() . '/blocks/hero/block.json');
// register_block_type(__DIR__  . '/blocks/icon-banner/block.json');
// register_block_type(get_template_directory() . '/blocks/icon-title/block.json');
// register_block_type(get_template_directory() . '/blocks/jump-link-target/block.json');
// register_block_type(get_template_directory() . '/blocks/logos/block.json');
// register_block_type(get_template_directory() . '/blocks/programme/block.json');
// register_block_type(get_template_directory() . '/blocks/speaker/block.json');
register_block_type(get_template_directory() . '/blocks/team/block.json');


// register_block_type(get_template_directory() . '/blocks/mega-grid/block.json');
// register_block_type(get_template_directory() . '/blocks/session-single/block.json');
// register_block_type(get_template_directory() . '/blocks/list-speakers/block.json');
// register_block_type(get_template_directory() . '/blocks/theatre-button/block.json');
// register_block_type(get_template_directory() . '/blocks/hero-single-session/block.json');

// add_action('init', 'register_acf_blocks');
// function register_acf_blocks()
// {
// register_block_type(__DIR__ . '/blocks/youtube/block.json');
// }





// Registers category and pushes it up the list
function custom_block_category($categories)
{
  $custom_block = array(
    'slug'  => 'rethink-blocks',
    'title' => esc_html__('Rethink Blocks', 'rethink-blocks'),
    'icon'  => 'yes', // Slug of a WordPress Dashicon or custom SVG
  );

  $categories_sorted = array();
  $categories_sorted[0] = $custom_block;

  foreach ($categories as $category) {
    $categories_sorted[] = $category;
  }

  return $categories_sorted;
}
add_filter('block_categories_all', 'custom_block_category', 10, 2);



// function is_local_environment()
// {
//   $env = wp_get_environment_type();
//   return (defined('WP_ENVIRONMENT_TYPE') && $env === 'local');
// }
// if (is_local_environment()) {
//   add_filter('allowed_block_types_all', 'rt_allowed_block_types', 10, 2);
// }


// add_filter('allowed_block_types_all', 'rt_allowed_block_types', 10, 2);

// function rt_allowed_block_types($allowed_blocks)
// {
//   return array(

//     //ACF
//     'acf/team',

//     // plugins
//     // 'modula/gallery',
//     'gravityforms/form',
//     'pb/accordion-item',

//     // the wp-blocks
//     'core/paragraph',
//     'core/image',
//     'core/heading',
//     'core/gallery',
//     'core/list',
//     'core/quote',
//     'core/audio',
//     'core/cover',
//     'core/file',
//     'core/video',
//     'core/table',
//     'core/verse',
//     'core/code',
//     'core/html',
//     'core/preformatted',
//     'core/pullquote',
//     'core/buttons',
//     'core/text-columns',
//     'core/media-text',
//     'core/separator',
//     'core/spacer',
//     'core/shortcode',
//     'core/columns',
//     'core/column',
//     'core/row-block',
//     'core/group'

//   );
// }
