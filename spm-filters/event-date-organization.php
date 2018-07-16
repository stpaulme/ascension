<?php
//////////////////////////////////////////////
//  ORGANIZE EVENTS BY DATE (ASC)
//////////////////////////////////////////////

function spm_rearrange_trainings_date ( $wp_query ) {
  if (is_admin()) {
    // Get the post type from the query
    $post_type = $wp_query->query['post_type'];
    if ( $post_type == 'trainings') {
      $wp_query->set('orderby', 'training_date');
      $wp_query->set('order', 'ASC');
    }
  }
}
add_filter('pre_get_posts', 'spm_rearrange_trainings_date');