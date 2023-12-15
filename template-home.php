<?php
/*
Template Name: Главная
*/
$geography = get_field('geography');
$partners = get_field('partners');
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head');?>
  </head>
  <body <?php body_class() ?>>
    <?php wp_body_open() ?>

    <div class="page">
      <?php if ($group = get_field('presentation')): ?>
      <div class="intro">
        <div class="intro__slideshow">
          <div class="swiper intro-slideshow">
            <div class="swiper-wrapper">
              <?php foreach ($group['slideshow'] as $item): ?>
              <div class="swiper-slide intro-slideshow__slide">
                <?php if (!empty($item['video'])): ?>
                <video class="intro-slideshow__video" muted playsinline autoplay src="<?php echo $item['video']['url'] ?>"></video>
                <?php endif ?>
                <?php if (!empty($item['image'])): ?>
                <img class="intro-slideshow__image" src="<?php echo $item['image']['url'] ?>">
                <?php endif ?>
              </div>
              <?php endforeach ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
        <div class="intro__nav">
          <div class="main-nav">
            <button class="main-nav__close"></button>
            <?php wp_nav_menu([
              'theme_location' => 'main',
              'container' => false
            ]) ?>
          </div>
        </div>
        <div class="intro__content">
          <div class="intro__content-before">
            <?php echo $group['content']['before'] ?>
          </div>
          <div class="intro__content-logo">
            <img src="<?php echo $group['content']['logo']['url'] ?>" alt="">
          </div>
          <div class="intro__content-after">
            <?php echo $group['content']['after'] ?>
          </div>
          <a href="<?php echo $group['content']['link'] ?>" class="intro__content-description">
            <?php echo $group['content']['description'] ?>
          </a>
        </div>
        <button class="header__toggle intro__toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
      </div>
      <?php endif ?>

      <div class="main">
        <div class="container">
            <?php if ($items = get_field('advantages')): ?>
            <div class="advantages">
              <div class="advantages-grid">
                <?php foreach ($items as $key => $item): ?>
                <div class="advantages-grid__cell">
                  <div class="advantages-item advantages-item_<?php echo ($key + 1) ?>">
                    <div class="advantages-item__icon">
                      <img src="<?php echo $item['icon']['url'] ?>" alt="<?php echo $item['icon']['title'] ?>">
                    </div>
                    <div class="advantages-item__content">
                      <div class="advantages-item__title">
                        <?php echo $item['title'] ?>
                      </div>
                      <div class="advantages-item__description">
                        <?php echo $item['description'] ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
              </div>
            </div>
            <?php endif ?>

            <?php if ($group = get_field('technologies')): ?>
              <div class="technologies">
                <div class="technologies__image">
                  <?php if ($image = $group['image']): ?>
                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                  <?php endif ?>
                </div>
                <div class="technologies__content">
                  <div class="technologies__title">
                    <?php echo $group['title'] ?>
                  </div>
                </div>
                <?php if ($link = $group['link']): ?>
                <div class="technologies__section">
                <a href="<?php echo $link['url'] ?>" class="technologies__section-link">
                  <span><?php echo $link['title'] ?></span>
                </a>
                </div>
                <?php endif ?>
              </div>
            <?php endif ?>

            <?php if ($group = get_field('directions')): ?>
            <div class="directions">
              <?php foreach ($group as $item): ?>
              <div class="directions-item">
                <?php if ($image = $item['image']): ?>
                <div class="directions-item__image">
                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                </div>
                <?php endif ?>
                <div class="directions-item__body">
                  <div class="directions-item__title">
                    <?php echo $item['title'] ?>
                  </div>
                  <div class="directions-item__description">
                    <?php echo $item['description'] ?>
                  </div>
                </div>
              </div>
              <?php endforeach ?>
            </div>
            <?php endif ?>

            <?php if ($group = get_field('escort')): ?>
            <div class="escort">
              <div class="escort__image">
                <?php if ($image = $group['image']): ?>
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                <?php endif ?>
              </div>
              <div class="escort__content">
                <div class="escort__title">
                  <?php echo $group['title'] ?>
                </div>
                <div class="escort__description">
                  <?php echo $group['description'] ?>
                </div>
              </div>
              <?php if ($link = $group['link']): ?>
              <div class="escort__section">
              <a href="<?php echo $link['url'] ?>" class="escort__section-link">
                <span><?php echo $link['title'] ?></span>
              </a>
              </div>
              <?php endif ?>
            </div>
            <?php endif ?>

            <?php if ($group = get_field('geography')): ?>
              <div class="geography">
                <div class="geography__title">
                  <?php echo $group['title'] ?>
                </div>
                <div class="geography-slideshow">
                  <div class="swiper">
                    <div class="swiper-wrapper">
                      <?php foreach ($group['items'] as $item): ?>
                      <div class="swiper-slide geography-slideshow__slide">
                        <?php if ($link = $item['link']): ?>
                        <a href="<?php echo $link ?>" class="geography-slideshow__link">
                        <?php else: ?>
                        <a href="<?php echo $item['image']['url'] ?>" data-fslightbox="geography-lightbox" class="geography-slideshow__link">
                        <?php endif ?>
                          <img class="geography-slideshow__image" src="<?php echo $item['image']['url'] ?>">
                        </a>
                        <?php if (!empty($item['description'])): ?>
                        <div class="geography-slideshow__description">
                          <?php echo $item['description'] ?>                    
                        </div>
                        <?php endif ?>
                      </div>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
                </div>
              </div>
            <?php endif ?>

            <?php if ($group = get_field('partners')): ?>
              <div class="partners">
                <div class="partners__title"><?php echo $group['title'] ?></div>
                <div class="partners-slideshow">
                  <div class="swiper">
                    <div class="swiper-wrapper">
                      <?php foreach ($group['items'] as $item): ?>
                      <div class="swiper-slide partners-slideshow__slide">
                        <a href="<?php echo $item['link'] ?>" class="partners-slideshow__link">
                          <img class="partners-slideshow__image" src="<?php echo $item['logo']['url'] ?>">
                        </a>
                      </div>
                      <?php endforeach ?>
                    </div>
                  </div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
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
