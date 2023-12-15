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

if ($productsQuery->have_posts()):
    while ($productsQuery->have_posts()):
        $productsQuery->the_post();
        // Здесь ваш код
        echo $post->post_title; // Например, вывод названия страницы
        // Вывод кастомных полей
    endwhile;
endif; wp_reset_postdata();
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
              <div class="products-grid__cell">
                <div class="products-item">
                  <div class="products-item__image">
                    <?php the_post_thumbnail('full') ?>
                  </div>
                  <div class="products-item__content">
                    <div class="products-item__title">
                      <?php the_title() ?>
                    </div>
                    <div class="products-item__description">
                      <?php the_excerpt() ?>
                    </div>
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
          
          <?php if ($items = get_field('products')): ?>
          <div class="goods">
            <?php foreach ($items as $item): ?>
            <div class="goods-item">
              <?php if ($image = $item['image']): ?>
              <div class="goods-item__image">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
              </div>
              <?php endif ?>
              <div class="goods-item__body">
                <div class="goods-item__title">
                  <?php echo $item['title'] ?>
                </div>
                <div class="goods-item__description">
                  <?php echo $item['description'] ?>
                </div>
                <div class="goods-item__link">
                  <?php if ($link = $item['link']): ?>
                  <a href="<?php echo $link['url'] ?>" class="primary-button"><?php echo $link['title'] ?></a>
                  <?php endif ?>
                </div>
              </div>
            </div>
            <?php endforeach ?>
          </div>
          <?php endif ?>
          
          <?php if ($group = get_field('rent')): ?>
          <div class="rent">
            <div class="rent__title">
              <?php echo $group['title'] ?>
            </div>
            <div class="rent__content">
              <div class="rent__image">
                <?php if ($image = $group['image']): ?>
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                <?php endif ?>
              </div>
              <div class="rent__description">
                <?php echo $group['description'] ?>
              </div>
              <?php if ($link = $item['link']): ?>
              <div class="rent__link">
                <a href="<?php echo $link['url'] ?>" class="primary-button"><?php echo $link['title'] ?></a>
              </div>
              <?php endif ?>
            </div>
          </div>
          <?php endif ?>
          
          <?php if ($group = get_field('services')): ?>
          <div class="services">
            <div class="services__title">
              <?php echo $group['title'] ?>
            </div>
            <div class="services__list">
              <?php foreach ($group['items'] as $item): ?>
              <div class="services__item">
                <div class="services__item-image">
                  <?php if ($image = $item['image']): ?>
                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                  <?php endif ?>
                </div>
                <div class="services__item-body">
                  <div class="services__item-description">
                    <?php echo $item['description'] ?>
                  </div>
                  <?php if ($link = $item['link']): ?>
                  <div class="services__item-link">
                    <a href="<?php echo $link['url'] ?>" class="primary-button"><?php echo $link['title'] ?></a>
                  </div>
                  <?php endif ?>
                </div>
              </div>
              <?php endforeach ?>
            </div>
          </div>
          <?php endif ?>
        </div>
      </div>
    
      <?php get_template_part('partials/footer') ?>
    </div>

    <?php wp_footer() ?>
  </body>
</html>
