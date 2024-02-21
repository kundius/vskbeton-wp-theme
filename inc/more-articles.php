<?php
function more_articles_get_posts()
{
  $args = unserialize(stripslashes($_POST['query']));
  $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';

  query_posts($args);

  if (have_posts()) {
    while (have_posts()) {
      the_post();
      echo '<div class="articles-list__item">';
      get_template_part('partials/article', 'medium');
      echo '</div>';
    }
  }
  die();
}

add_action('wp_ajax_more_articles', 'more_articles_get_posts');
add_action('wp_ajax_nopriv_more_articles', 'more_articles_get_posts');