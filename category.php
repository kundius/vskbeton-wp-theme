<?php
$category = get_queried_object();
$query_params = [
  'post_type' => 'post',
  'posts_per_page' => 3,
  'order' => 'DESC',
  'orderby' => 'date',
  'paged' => get_query_var('paged') ?: 1,
  'tax_query' => [
    'relation' => 'OR',
    [
      'taxonomy' => $category->taxonomy,
      'field' => 'id',
      'terms' => [$category->term_id]
    ]
  ]
];
$query = new WP_Query($query_params);
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

  <head>
    <?php get_template_part('partials/head'); ?>
  </head>

  <body <?php body_class() ?>>
    <?php wp_body_open() ?>

    <div class="page">
      <?php get_template_part('partials/header') ?>

      <main class="main">
        <div class="container">
          <div class="articles-list">
          </div>

          <div class="articles-pagination">
            <button class="articles-pagination__show-more">Показать еще</button>
            <div class="articles-pagination__nav">
              <?php wp_pagenavi(['query' => $query]) ?>
            </div>
          </div>

          <?php wp_reset_postdata() ?>
        </div>
      </main>

      <?php get_template_part('partials/footer') ?>
    </div>

    <?php wp_footer() ?>
  </body>

</html>