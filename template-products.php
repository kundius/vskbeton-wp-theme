<?php
/*
Template Name: Продукция и услуги
*/

global $post;

$args = array(
    'post_type' => 'page',
    'post_parent' => $post->ID,
);

$productsQuery = new WP_Query($args);
print_r($productsQuery->post_count);
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head');?>
  </head>
  <body <?php body_class() ?>>
    <?php wp_body_open() ?>

    <div class="page">
      <?php get_template_part('partials/header') ?>

      <div class="main">
        <div class="container">
          <?php if ($productsQuery->have_posts()): ?>
          <div class="products">
            <div class="products-grid">
              <?php while ($productsQuery->have_posts()): $productsQuery->the_post(); ?>
              <div class="products-grid__cell<?php if (($productsQuery->post_count % 2) > 0): ?>  products-grid__cell_wide<?php endif ?>">
                <div class="products-item">
                  <div class="products-item__image">
                    <?php the_post_thumbnail('full') ?>
                  </div>
                  <div class="products-item__title">
                    <?php echo (get_field('title_in_list') ?: get_the_title()) ?>
                  </div>
                  <div class="products-item__section">
                    <a href="<?php the_permalink() ?>" class="products-item__section-link">
                      <span>Подробнее</span>
                    </a>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
          <?php endif; wp_reset_postdata(); ?>
        </div>
      </div>
    
      <?php get_template_part('partials/footer') ?>
    </div>

    <?php wp_footer() ?>
  </body>
</html>
