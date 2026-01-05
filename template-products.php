<?php
/*
Template Name: Продукция и услуги
*/

global $post;

$args = [
    "post_type" => "page",
    "post_parent" => $post->ID,
];

$productsQuery = new WP_Query($args);
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part("partials/head"); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div class="page">
      <?php get_template_part("partials/header"); ?>

      <div class="main">
        <div class="container">
			<div class="page-headline">
					<h1 class="page-headline__title"><?php the_title(); ?></h1>
				</div>

          <?php
          if ($productsQuery->have_posts()): ?>
          <div class="services">
            <div class="services-grid">
              <?php
              $key = 0;
              while ($productsQuery->have_posts()):

                  $productsQuery->the_post();
                  $key++;
                  ?>
              <div class="services-grid__cell<?php if (
                  $productsQuery->post_count % 2 > 0 &&
                  $key === $productsQuery->post_count
              ): ?> services-grid__cell_wide<?php endif; ?>">
                <div class="simple-card">
                  <div class="simple-card__image">
                    <?php the_post_thumbnail("article-medium"); ?>
                  </div>
                  <a href="<?php the_permalink(); ?>" class="simple-card__title">
                    <?php echo get_field("title_in_list") ?: get_the_title(); ?>
                  </a>
                </div>
              </div>
              <?php
              endwhile;
              ?>
            </div>
          </div>
          <?php endif;
          wp_reset_postdata();
          ?>
        </div>
      </div>

      <?php get_template_part("partials/footer"); ?>
    </div>

    <?php wp_footer(); ?>
  </body>
</html>
