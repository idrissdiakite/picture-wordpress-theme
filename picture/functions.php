<?php
add_theme_support('post-thumbnails');

function enregistre_mon_menu()
{
    register_nav_menu('menu_principal', __('Menu principal'));
}
add_action('init', 'enregistre_mon_menu');

add_filter( 'excerpt_length', function( $length ) { return 20; } );

add_action('template_include','change_on_p2');
function change_on_p2( $template ){
    if( is_front_page() && is_paged() ){
        $template = locate_template(array('pagination.php','index.php'));
    }
    return $template;
}

function prefix_auto_featured_image() {
    global $post;
    if (!has_post_thumbnail($post->ID)) {
        $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
         
      if ($attached_image) {
              foreach ($attached_image as $attachment_id => $attachment) {
                   set_post_thumbnail($post->ID, $attachment_id);
              }
         }
    }
}
add_action('the_post', 'prefix_auto_featured_image');
add_action('save_post', 'prefix_auto_featured_image');
add_action('draft_to_publish', 'prefix_auto_featured_image');
add_action('new_to_publish', 'prefix_auto_featured_image');
add_action('pending_to_publish', 'prefix_auto_featured_image');
add_action('future_to_publish', 'prefix_auto_featured_image');