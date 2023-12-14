<?php
/*
Template Name: Продукция и услуги
*/
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
          <?php if ($items = get_field('products')): ?>
          <div class="products">
            <?php foreach ($items as $item): ?>
            <div class="products-item">
              <?php if ($image = $item['image']): ?>
              <div class="products-item__image">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
              </div>
              <?php endif ?>
              <div class="products-item__body">
                <div class="products-item__title">
                  <?php echo $item['title'] ?>
                </div>
                <div class="products-item__description">
                  <?php echo $item['description'] ?>
                </div>
                <div class="products-item__link">
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
