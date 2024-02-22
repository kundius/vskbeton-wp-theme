<?php
$category = get_queried_object();
$list_query_params = [
  'post_type' => 'post',
  'posts_per_page' => 4,
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
$list_query = new WP_Query($list_query_params);
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
          <div class="page-headline">
            <h1 class="page-headline__title">
              <?php single_cat_title() ?>
            </h1>
          </div>

          <div class="certificates-list" id="more-certificates-list">
            <?php while ($list_query->have_posts()):
              $list_query->the_post(); ?>
              <div class="certificates-list__item">
                <?php get_template_part('partials/certificate') ?>
              </div>
            <?php endwhile; ?>
          </div>

          <div class="articles-pagination">
            <?php if ($list_query->max_num_pages > 1): ?>
              <script>
                var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
                var posts_vars = '<?php echo serialize($list_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $list_query->max_num_pages; ?>';
              </script>
              <button id="more-certificates-button" class="articles-pagination__show-more">Показать ещё</button>
            <?php endif; ?>
            <div class="articles-pagination__spacer"></div>
            <div class="articles-pagination__nav">
              <?php echo paginate_links([
                'prev_text' => '<',
                'next_text' => '>',
                'current' => max(1, get_query_var('paged')),
                'total' => $list_query->max_num_pages,
              ]) ?>
            </div>
          </div>
        </div>
      </main>

      <?php get_template_part('partials/footer') ?>
    </div>

    <?php wp_footer() ?>
  </body>

</html>