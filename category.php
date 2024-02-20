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
      <?php //get_template_part('partials/header')   ?>

      <main class="main">
        <div class="container">

          <div class="projects-layout__list">
            <div class="projects-list">
              <?php foreach ($query->posts as $item): ?>
                <div class="projects-list__item">
                  <article class="projects-card">
                    <figure class="projects-card__image">
                      <img src="<?php echo get_the_post_thumbnail_url($item, 'theme-medium') ?>"
                        alt="<?php echo get_the_title($item) ?>" />
                    </figure>

                    <?php if ($description = get_field('description', $item->ID)): ?>
                      <div class="projects-card__date">
                        <?php echo $description ?>
                      </div>
                    <?php endif ?>

                    <div class="projects-card__title">
                      <a href="<?php the_permalink($item->ID) ?>">
                        <?php echo get_the_title($item) ?>
                      </a>
                    </div>
                  </article>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="projects-layout__pagination">
            <?php wp_pagenavi(['query' => $query]) ?>
          </div>
          
        </div>
      </main>

      <?php get_template_part('partials/footer') ?>
    </div>

    <?php wp_footer() ?>
  </body>

</html>