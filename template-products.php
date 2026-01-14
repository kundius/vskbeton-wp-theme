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
        <div class="page-headline" style="margin-bottom: 0;">
          <h1 class="page-headline__title"><?php the_title(); ?></h1>
        </div>

        <div class="page-content content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

    <?php if ($products = get_field("products", 2)): ?>
      <section class="products">
        <div class="container">
          <div class="products__title">
            Наша продукция
          </div>
          <div class="products-grid">
            <?php foreach ($products['list'] as $item): ?>
              <div class="products-grid__cell">
                <div class="products-item products-item--<?php echo $item['color']; ?>">
                  <div class="products-item__title">
                    <?php echo $item['name']; ?>
                  </div>
                  <a href="<?php echo $item['link_url']; ?>" class="more-link">
                    <span><?php echo $item['link_text']; ?></span>
                    <span></span>
                  </a>
                  <?php if ($icon = $item['icon']): ?>
                    <img src="<?php echo $icon['url']; ?>" class="products-item__image">
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <?php if ($productsQuery->have_posts()): ?>
      <section class="services">
        <div class="container">
          <div class="services__title-alt">
            НАШИ УСЛУГИ
          </div>
          <div class="services-grid">
            <?php while ($productsQuery->have_posts()): $productsQuery->the_post(); ?>
              <div class="services-grid__cell">
                <div class="services-item">
                  <div class="services-item__title">
                    <?php echo (get_field("title_in_list") ?: get_the_title()); ?>
                  </div>
                  <a href="<?php the_permalink(); ?>" class="more-link">
                    <span>Подробнее</span>
                    <span></span>
                  </a>
                  <div class="services-item__space"></div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <?php get_template_part("partials/footer"); ?>
  </div>

  <?php wp_footer(); ?>
</body>

</html>