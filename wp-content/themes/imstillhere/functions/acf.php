<?php


add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths)
{
  unset($paths[0]);
  $paths[] = get_template_directory() . '/acf-json';
  return $paths;
}

// create options page
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'  => 'Site options',
    'menu_title'  => 'Site options',
    'menu_slug'   => 'theme-options',
    'capability'  => 'edit_posts',
    'redirect'    => false,
    'icon_url'    => 'dashicons-admin-generic',
    'position'    => 22,
  ));
}


//  ***** ***** ***** ***** ***** ***** ***** ***** ***** /
//  Sets the headings formats in WYSIWYG - TinyMCe
//  Basically remove h1 an h5 as options in wysiwyg
//  ***** ***** ***** ***** ***** ***** ***** ***** ***** /

add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats');
function tiny_mce_remove_unused_formats($init)
{
  // Add block format elements you want to show in dropdown
  $init['block_formats'] = 'Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4 =h4;';
  return $init;
}
