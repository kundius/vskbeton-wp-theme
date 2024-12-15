<?php
/*
Template Name: Главная
*/
$geography = get_field('geography');
$partners = get_field('partners');

$args = array(
  'post_type' => 'page',
  'post_parent' => 100,
  'posts_per_page' => -1,
  'meta_query' => array(
    'relation' => 'AND',
    array(
      'key' => 'show_at_home',
      'value' => '1',
      'compare' => '=',
    ),
  ),
);

$productsQuery = new WP_Query($args);
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

  <head>
    <?php get_template_part('partials/head'); ?>
  </head>

  <body <?php body_class() ?>>
    <?php wp_body_open() ?>

	<?wf_top_line()?>
	  
    <div class="page">
      <?php if ($group = get_field('presentation')): ?>
        <div class="intro">
          <div class="intro__slideshow">
            <div class="swiper intro-slideshow">
              <div class="swiper-wrapper">
                <?php foreach ($group['slideshow'] as $item): ?>
                  <div class="swiper-slide intro-slideshow__slide">
                    <?php if (!empty($item['video'])): ?>
                      <video class="intro-slideshow__video" muted playsinline autoplay
                        src="<?php echo $item['video']['url'] ?>"></video>
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
            <div class="intro__content-logo">
              <img src="<?php echo $group['content']['logo']['url'] ?>" alt="">
            </div>
            <h1 class="intro__content-after">
              <?php echo $group['content']['after'] ?>
            </h1>
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
          
			
    <div class="products">
      <div class="section-title">
        <span>Наша</span> продукция
      </div>

      <div class="products-grid">
        <div class="products-grid__cell">
          <div class="products-item">
            <div class="products-item__title">
              <strong>Товарный бетон</strong>
            </div>
            <a href="/czeny/#tovbet" class="products-item__section">
              <span>Подробнее</span>
            </a>
            <img src="/wp-content/themes/vskbeton-wp-theme/vendor/images/betn-img.png" class="products-item__image">
          </div>
        </div>

        <div class="products-grid__cell">
          <div class="products-item">
            <div class="products-item__title">
              <strong>Пескобетон</strong>
            </div>
            <a href="/czeny/#peskbet" class="products-item__section">
              <span>Подробнее</span>
            </a>
            <img src="/wp-content/themes/vskbeton-wp-theme/vendor/images/pesk-img.png" class="products-item__image">
          </div>
        </div>

        <div class="products-grid__cell">
          <div class="products-item">
            <div class="products-item__title">
              <strong>Цементный раствор</strong>
            </div>
            <a href="/czeny/#cemrast" class="products-item__section">
              <span>Подробнее</span>
            </a>
            <img src="/wp-content/themes/vskbeton-wp-theme/vendor/images/rast-img.png" class="products-item__image">
          </div>
        </div>

        <div class="products-grid__cell products-grid__cell_span products-grid__cell_no-mobile">
          <div class="products-item products-item_blue">
            <div class="products-item__group">
              <div class="products-item__title">
                <strong>Калькулятор</strong> стоимости бетона
              </div>
              <a href="/kalkulyator/" class="products-item__section">
                <span>Рассчитать онлайн</span>
              </a>
            </div>
            <img src="/wp-content/themes/vskbeton-wp-theme/vendor/images/calc-img.png" class="products-item__image">
          </div>
        </div>

        <div class="products-grid__cell products-grid__cell_on-mobile">
          <div class="products-item products-item_blue">
            <div class="products-item__title">
              <strong>Калькулятор</strong><br> стоимости бетона
            </div>
            <a href="/kalkulyator/" class="products-item__section">
              <span>Рассчитать онлайн</span>
            </a>
            <img src="/wp-content/themes/vskbeton-wp-theme/vendor/images/calc-img.png" class="products-item__image">
          </div>
        </div>

        <div class="products-grid__cell">
          <a href="/czeny/" class="products-price">
            <span>Смотреть прайс</span>
          </a>
        </div>
      </div>
    </div>
			
		<?php if ($items = get_field('advantages')): ?>
            <div class="advantages">
				<div class="section-title">
					<span>НАШИ</span> ПРЕИМУЩЕСТВА
				</div>
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
                <?php if ($link = $group['link']): ?>
                  <a href="<?php echo $link['url'] ?>" class="technologies__section">
                    <span>
                      <?php echo $link['title'] ?>
                    </span>
                  </a>
                <?php endif ?>
                <div class="technologies__title">
                  <?php echo $group['title'] ?>
                </div>
              </div>
            </div>
          <?php endif ?>

          <?php if ($productsQuery->have_posts()): ?>
            <div class="services">
              <div class="section-title">
                <span>НАШИ</span> УСЛУГИ
              </div>
              <div class="services-grid">
                <?php $key = 0;
                while ($productsQuery->have_posts()):
                  $productsQuery->the_post();
                  $key++; ?>
                  <div class="services-grid__cell<?php if (($productsQuery->post_count % 2) > 0 && $key === $productsQuery->post_count): ?> services-grid__cell_wide<?php endif ?>">
                    <div class="simple-card">
                      <div class="simple-card__image">
                        <?php the_post_thumbnail('article-medium') ?>
                      </div>
                      <a href="<?php the_permalink() ?>" class="simple-card__title">
                        <?php echo (get_field('title_in_list') ?: get_the_title()) ?>
                      </a>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          <?php endif;
          wp_reset_postdata(); ?>

          <?php if ($group = get_field('geography')): ?>
            <div class="geography">
              <div class="section-title">
                <?php echo $group['title'] ?>
              </div>
              <div class="geography-slideshow">
                <div class="swiper">
                  <div class="swiper-wrapper">
                    <?php foreach ($group['items'] as $item): ?>
                      <div class="swiper-slide geography-slideshow__slide">
                        <?php if ($link = $item['link']): ?>
                          <a href="<?php echo $link ?>" class="geography-slideshow__link" target="_blank">
                          <?php else: ?>
                            <a href="<?php echo $item['image']['url'] ?>" data-fslightbox="geography-lightbox"
                              class="geography-slideshow__link">
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

          <?php
          $list_query_params = [
            'post_type' => 'post',
            'posts_per_page' => 2,
            'order' => 'DESC',
            'orderby' => 'date',
            'tax_query' => [
              'relation' => 'OR',
              [
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => [3]
              ]
            ]
          ];
          $list_query = new WP_Query($list_query_params);
          ?>
          <div class="home-news">
            <div class="home-news__headline">
              <div class="home-news__headline-title">Новости</div>
              <a href="<?php echo get_category_link(3) ?>" class="home-news__headline-all">Смотреть все</a>
            </div>
            <div class="home-news__list">
              <?php while ($list_query->have_posts()):
                $list_query->the_post(); ?>
                <div class="home-news__item">
                  <?php get_template_part('partials/article', null, ['thumb' => 'article-medium']) ?>
                </div>
              <?php endwhile ?>
            </div>
          </div>
          <?php wp_reset_query() ?>

          <?php if ($group = get_field('partners')): ?>
            <div class="partners">
              <div class="partners__title">
                <?php echo $group['title'] ?>
              </div>
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