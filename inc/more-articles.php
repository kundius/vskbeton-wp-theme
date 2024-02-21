<?php
function more_articles_get_posts()
{
  $args = unserialize(stripslashes($_POST['query']));
  $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';

  print_r($args);

  query_posts($args);

  if (have_posts()) {
    $idx = 0;
    while (have_posts()) {
      the_post();
      $idx++;
      if ($idx === 1) {
        echo '<div class="articles-list__item articles-list__item_large">';
        get_template_part('partials/article', 'large');
        echo '</div>';
      } else {
        echo '<div class="articles-list__item">';
        get_template_part('partials/article', 'medium');
        echo '</div>';
      }
    }
  }
  die();
}

add_action('wp_ajax_more_articles', 'more_articles_get_posts');
add_action('wp_ajax_nopriv_more_articles', 'more_articles_get_posts');