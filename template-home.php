<?php
/*
Template Name: Главная
*/
$geography = get_field("geography");
$partners = get_field("partners");

$args = [
  "post_type" => "page",
  "post_parent" => 100,
  "posts_per_page" => -1,
  "meta_query" => [
    "relation" => "AND",
    [
      "key" => "show_at_home",
      "value" => "1",
      "compare" => "=",
    ],
  ],
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

  <?php get_template_part("partials/header"); ?>

  <?php if ($presentation = get_field("presentation")): ?>
    <section class="intro">
      <?php if ($bg_video = $presentation['bg_video']): ?>
        <video class="intro__video" muted playsinline autoplay loop src="<?php echo $bg_video['url'] ?>"></video>
      <?php endif; ?>

      <div class="container">
        <div class="intro__logo">
          <?php if ($discount = $presentation['discount']): ?>
            <div class="intro__discount">
              <?php echo nl2br($discount); ?>
            </div>
          <?php endif; ?>
          <div class="intro__logo-wrap">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/big-white-logo.png" alt="<?php bloginfo('name') ?>" class="intro__logo-img">
          </div>
        </div>
        <div class="intro__order">
          <?php if ($conditions = $presentation['conditions']): ?>
            <div class="intro__conditions">
              <?php echo nl2br($conditions); ?>
            </div>
          <?php endif; ?>
          <a href="/kontakty/" class="intro__order-btn">
            Получить консультацию <span class="icon icon-arrow-right"></span>
          </a>
        </div>
        <div class="intro__texts">
          <div class="intro__text intro__text_1">
            <div class="intro__text-content">
              Испытание образцов бетона на прочность
            </div>
            <div class="intro__text-desc">
              ГОСТ 12730.1
            </div>
          </div>
          <div class="intro__text intro__text_2">
            <div class="intro__text-content">
              Определение морозостойкости образцов бетона
            </div>
            <div class="intro__text-desc">
              ГОСТ 10060-2012
            </div>
          </div>
          <div class="intro__text intro__text_3">
            <div class="intro__text-content">
              Измерение прочности бетонных конструкций на месте проведения строительных работ
            </div>
            <div class="intro__text-desc">
              Склерометр ИПС-МГ4.03
            </div>
          </div>
          <div class="intro__text intro__text_4">
            <div class="intro__text-content">
              Измерение подвижности бетона<br>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icon-wave.svg" alt="<?php bloginfo('name') ?>">
            </div>
            <div class="intro__text-desc">
              ГОСТ 10181
            </div>
          </div>
          <div class="intro__text intro__text_5">
            <div class="intro__text-content">
              Определение пористости бетонной смеси
            </div>
          </div>
          <div class="intro__text intro__text_6">
            <div class="intro__text-content">
              Измерение сохранности свойств бетонной смеси во времени<br>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icon-clock.svg" alt="<?php bloginfo('name') ?>">
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="products">
    <div class="container">
      <div class="products__title">
        Наша продукция
      </div>
      <div class="products-grid">
        <div class="products-grid__cell">
          <div class="products-item">
            <div class="products-item__title">
              <strong>Товарный бетон</strong>
            </div>
            <a href="/czeny/#tovbet" class="more-link">
              <span>Подробнее</span>
              <span></span>
            </a>
            <img src="/wp-content/themes/vskbeton-wp-theme/vendor/images/betn-img.png" class="products-item__image">
          </div>
        </div>

        <div class="products-grid__cell">
          <div class="products-item">
            <div class="products-item__title">
              <strong>Пескобетон</strong>
            </div>
            <a href="/czeny/#peskbet" class="more-link">
              <span>Подробнее</span>
              <span></span>
            </a>
            <img src="/wp-content/themes/vskbeton-wp-theme/vendor/images/pesk-img.png" class="products-item__image">
          </div>
        </div>

        <div class="products-grid__cell">
          <div class="products-item">
            <div class="products-item__title">
              <strong>Цементный раствор</strong>
            </div>
            <a href="/czeny/#cemrast" class="more-link">
              <span>Подробнее</span>
              <span></span>
            </a>
            <img src="/wp-content/themes/vskbeton-wp-theme/vendor/images/rast-img.png" class="products-item__image">
          </div>
        </div>

        <div class="products-grid__cell products-grid__cell--calc">
          <div class="products-item products-item--blue">
            <div class="products-item__title">
              <strong>Калькулятор</strong> стоимости бетона
            </div>
            <a href="/kalkulyator/" class="more-link">
              <span>Рассчитать онлайн</span>
              <span></span>
            </a>
            <img src="/wp-content/themes/vskbeton-wp-theme/vendor/images/calc-img.png" class="products-item__image">
          </div>
        </div>

        <div class="products-grid__cell">
          <div class="products-item">
            <div class="products-item__title">
              <strong>Полный прайс</strong>
            </div>
            <a href="/czeny/" class="more-link">
              <span>Подробнее</span>
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php if ($advantages = get_field("advantages")): ?>
    <section class="advantages">
      <div class="container">
        <div class="advantages__title">
          <span>НАШИ</span> ПРЕИМУЩЕСТВА
        </div>
        <div class="advantages-layout">
          <div class="advantages-equipment">
            <div class="advantages-equipment__body">
              <div class="advantages-equipment__title">
                <strong>Современное оборудование</strong>
              </div>
              <div class="advantages-equipment__desc">
                <?php echo nl2br($advantages['equipment']); ?>
              </div>
            </div>
          </div>
          <div class="advantages-assortment">
            <div class="advantages-assortment__title">
              Широкий<br>
              <strong>ассортимент</strong>
            </div>
          </div>
          <div class="advantages-schedule">
            <div class="advantages-schedule__title">
              Гибкий<br>
              <strong>график</strong>
            </div>
          </div>
          <div class="advantages-control">
            <div class="advantages-control__title">
              <strong>Контроль</strong><br>
              <strong>качества бетона</strong><br>
              на производстве
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if ($photogallery = get_field("photogallery")): ?>
    <section class="photogallery" data-photogallery>
      <div class="container">
        <div class="photogallery-header">
          <div class="photogallery-header__title">
            <span>
              <?php echo $photogallery['title']; ?>
            </span>
          </div>
          <div class="photogallery-header__controls">
            <?php if ($gallery = $photogallery['gallery']): ?>
              <div class="photogallery-controls">
                <button class="photogallery-controls__prev" type="button" data-photogallery-prev>
                  <span></span>
                  <span>Назад</span>
                </button>
                <button class="photogallery-controls__next" type="button" data-photogallery-next>
                  <span>Пролистать вперёд</span>
                  <span></span>
                </button>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php if ($gallery = $photogallery['gallery']): ?>
        <div class="photogallery-embla">
          <div class="photogallery-embla__viewport" data-photogallery-viewport>
            <div class="photogallery-embla__container">
              <?php foreach (array_chunk($gallery, 4) as $chunk): ?>
                <div class="photogallery-embla__slide">
                  <?php foreach ($chunk as $item): ?>
                    <div class="photogallery-embla__image-wrap">
                      <img src="<?php echo $item['url']; ?>" alt="<?php echo $item['alt']; ?>" class="photogallery-embla__image">
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </section>
  <?php endif; ?>

  <?php
  if ($productsQuery->have_posts()): ?>
    <section class="services">
      <div class="container">
        <div class="services__title">
          <span>
            <strong>НАШИ</strong><br>
            УСЛУГИ
          </span>
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
  <?php endif;
  wp_reset_postdata(); ?>

  <?php if ($geography = get_field("geography")): ?>
    <section class="geography">
      <div class="container">
        <div class="geography__title">
          <?php echo $geography["title"]; ?>
        </div>
        <div class="geography-embla" data-geography>
          <div class="geography-embla__viewport" data-geography-viewport>
            <div class="geography-embla__container">
              <?php foreach ($geography["items"] as $item): ?>
                <div class="geography-embla__slide">
                  <a href="<?php echo $item["image"]["url"]; ?>" data-fslightbox="geography-lightbox" class="geography-embla__lightbox">
                    <img class="geography-embla__image" src="<?php echo $item["image"]["url"]; ?>">
                  </a>
                  <?php if (!empty($item["description"])): ?>
                    <<?php echo ($item["link"] ? 'a href="' . $item["link"] . '"' : 'div'); ?> class="geography-embla__description">
                      <?php echo $item["description"]; ?>
                    </<?php echo ($item["link"] ? 'a' : 'div'); ?>>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <button class="geography-prev" type="button" data-geography-prev>
            <span></span>
            <span>Назад</span>
          </button>
          <button class="geography-next" type="button" data-geography-next>
            <span>Пролистать вперёд</span>
            <span></span>
          </button>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <div class="page">
    <div class="main">
      <div class="container">

        <?php
        $list_query_params = [
          "post_type" => "post",
          "posts_per_page" => 2,
          "order" => "DESC",
          "orderby" => "date",
          "tax_query" => [
            "relation" => "OR",
            [
              "taxonomy" => "category",
              "field" => "id",
              "terms" => [3],
            ],
          ],
        ];
        $list_query = new WP_Query($list_query_params);
        ?>
        <div class="home-news">
          <div class="home-news__headline">
            <div class="home-news__headline-title">Новости</div>
            <a href="<?php echo get_category_link(
                        3,
                      ); ?>" class="home-news__headline-all">Смотреть все</a>
          </div>
          <div class="home-news__list">
            <?php while ($list_query->have_posts()):
              $list_query->the_post(); ?>
              <div class="home-news__item">
                <?php get_template_part("partials/article", null, [
                  "thumb" => "article-medium",
                ]); ?>
              </div>
            <?php
            endwhile; ?>
          </div>
        </div>
        <?php wp_reset_query(); ?>

        <?php if ($group = get_field("partners")): ?>
          <div class="partners">
            <div class="section-title">
              <?php echo $group["title"]; ?>
            </div>
            <div class="partners-slideshow">
              <div class="swiper">
                <div class="swiper-wrapper">
                  <?php foreach ($group["items"] as $item): ?>
                    <div class="swiper-slide partners-slideshow__slide">
                      <a href="<?php echo $item["link"]; ?>" class="partners-slideshow__link" target="_blank">
                        <img class="partners-slideshow__image" src="<?php echo $item["logo"]["url"]; ?>">
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php get_template_part("partials/footer"); ?>
  </div>

  <?php wp_footer(); ?>
</body>

</html>