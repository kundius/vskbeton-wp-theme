<?php
function more_certificates_get_posts()
{
  $args = unserialize(stripslashes($_POST['query']));
  $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';

  query_posts($args);

  if (have_posts()) {
    while (have_posts()) {
      the_post();
      echo '<div class="certificates-list__item">';
      get_template_part('partials/certificate');
      echo '</div>';
    }
  }
  die();
}

add_action('wp_ajax_more_certificates', 'more_certificates_get_posts');
add_action('wp_ajax_nopriv_more_certificates', 'more_certificates_get_posts');