<?php
// $category = get_queried_object();
// $query_params = [
//   'post_type' => 'post',
//   'posts_per_page' => 3,
//   'order' => 'DESC',
//   'orderby' => 'date',
//   'paged' => get_query_var('paged') ?: 1,
//   'tax_query' => [
//     'relation' => 'OR',
//     [
//       'taxonomy' => $category->taxonomy,
//       'field' => 'id',
//       'terms' => [$category->term_id]
//     ]
//   ]
// ];
// $query = new WP_Query($query_params);
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
          <div class="articles-list" id="more-articles-list">
            <?php $idx = 0;
            while (have_posts()):
              the_post();
              $idx++;
              if ($idx === 1): ?>
                <div class="articles-list__item articles-list__item_large">
                  <?php get_template_part('partials/article', 'large') ?>
                </div>
              <?php else: ?>
                <div class="articles-list__item">
                  <?php get_template_part('partials/article', 'medium') ?>
                </div>
              <?php endif; endwhile ?>
          </div>

          <div class="articles-pagination">
            <?php if ($wp_query->max_num_pages > 1): ?>
              <script>
                var ajaxurl = '<?php echo site_url(); ?>/wp-admin/admin-ajax.php';
                var posts_vars = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
              </script>
              <button id="more-articles-button" class="articles-pagination__loadmore">Показать ещё</button>
            <?php endif; ?>
            <div class="articles-pagination__nav">
              <?php echo paginate_links([
                'prev_text' => '<',
                'next_text' => '>',
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