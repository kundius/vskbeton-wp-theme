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
          
			
	<div class="prods">
		<div class="prods-title-line">
			<div class="prods__title">
				<span>Наша</span><br> продукция
			</div>
			<a href="/czeny/" class="prods-title-btn">Смотреть прайс</a>
		</div>
        
		<div class="prods-grid">
		
            <div class="prods-left-side">
			
                <div class="prods-item">
                    <div class="prods-item__title">
                        Товарный бетон
					</div>
					<div class="prods-item__image">
                        <img src="/wp-content/themes/vskbeton-wp-theme/dist/images/betn-img.png">
					</div>
					<div class="prods-item__section">
                        <a href="/czeny/#tovbet" class="prods-item__section-link">
							<span>Подробнее</span>
                        </a>
                    </div>
                </div>
				
            </div>
        

			<div class="prods-right-side">
			
                <div class="prods-item half">
                    <div class="prods-item__title">
                        Пескобетон
					</div>
					<div class="prods-link-line">
						<div class="prods-item__section">
							<a href="/czeny/#peskbet" class="prods-item__section-link">
								<span>Подробнее</span>
							</a>
						</div>
						<div class="prods-item__image">
							<img src="/wp-content/themes/vskbeton-wp-theme/dist/images/pesk-img.png">
						</div>
					</div>
                </div>
            
                <div class="prods-item half">
                    <div class="prods-item__title">
                        Цементный раствор
					</div>
					<div class="prods-link-line">
						<div class="prods-item__section">
							<a href="/czeny/#cemrast" class="prods-item__section-link">
								<span>Подробнее</span>
							</a>
						</div>
						<div class="prods-item__image">
							<img src="/wp-content/themes/vskbeton-wp-theme/dist/images/rast-img.png">
						</div>
					</div>
                </div>
            
                <div class="prods-item full">
					<div class="prods-link-line">
						<div class="prods-item__title">
							<span>Калькулятор</span> стоимости бетона
						</div>
						<div class="prods-item__section">
							<a href="/kalkulyator/" class="prods-item__section-link">
								<span>Рассчитать онлайн</span>
							</a>
						</div>
					</div>
					<div class="prods-item__image">
                        <img src="/wp-content/themes/vskbeton-wp-theme/dist/images/calc-img.png">
					</div>
                </div>
				
            </div>
			
        </div>
		
    </div>
			
		<?php if ($items = get_field('advantages')): ?>
            <div class="advantages">
				<div class="geography__title">
					<span>НАШИ</span><br>
					ПРЕИМУЩЕСТВА
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
                <div class="technologies__title">
                  <?php echo $group['title'] ?>
                </div>
              </div>
              <?php if ($link = $group['link']): ?>
                <div class="technologies__section">
                  <a href="<?php echo $link['url'] ?>" class="technologies__section-link">
                    <span>
                      <?php echo $link['title'] ?>
                    </span>
                  </a>
                </div>
              <?php endif ?>
            </div>
          <?php endif ?>

          <?php if ($productsQuery->have_posts()): ?>
            <div class="products">
				<div class="geography__title">
					<span>НАШИ</span><br>
					УСЛУГИ
				</div>
              <div class="products-grid">
                <?php $key = 0;
                while ($productsQuery->have_posts()):
                  $productsQuery->the_post();
                  $key++; ?>
                  <div
                    class="products-grid__cell<?php if (($productsQuery->post_count % 2) > 0 && $key === $productsQuery->post_count): ?> products-grid__cell_wide<?php endif ?>">
                    <div class="products-item">
                      <div class="products-item__image">
                        <?php the_post_thumbnail('full') ?>
                      </div>
                      <div class="products-item__title">
                        <?php echo (get_field('title_in_list') ?: get_the_title()) ?>
                      </div>
						<?if(get_field('czena') != ''):?>
							<div class="products-item__price">
								<span>Цена: </span><?php echo get_field('czena')?>
							</div>
						<?endif;?>
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
          <?php endif;
          wp_reset_postdata(); ?>

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