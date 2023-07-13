<?php
// Editor Styles (also see editor.css for more style overides)

function rt_editor_theme()
{
  add_theme_support('editor-styles');

  add_editor_style([
    // 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&display=swap',
    'assets/dist/main.min.css',
    'assets/dist/editor.css'
  ]);
}
add_action('after_setup_theme', 'rt_editor_theme');


// Upload size
// @ini_set('upload_max_size', '256M');
// @ini_set('post_max_size', '256M');
// @ini_set('max_execution_time', '300');


// Remove comments --- Remove comments --- Remove comments --- Remove comments ---

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);
// Remove comments page in menu
add_action('admin_menu', function () {
  remove_menu_page('edit-comments.php');
});
// Remove comments links from admin bar
add_action('init', function () {
  if (is_admin_bar_showing()) {
    remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
  }
});
// Remove comments from #wpadminbar
add_action('wp_before_admin_bar_render', function () {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
});
// hides 'latest comments' and icons in 'At a Glance' from the dashboard
add_action('admin_head', 'hide_comments_icons_and_links');
function hide_comments_icons_and_links()
{
  echo '<style>
          #latest-comments,
          #dashboard_right_now .comment-count,
          #dashboard_right_now .comment-mod-count {
            display:none;
          }
       </style>';
}


// shove YOAST settings panel in editor to bottom
add_filter('wpseo_metabox_prio', function () {
  return 'low';
});
