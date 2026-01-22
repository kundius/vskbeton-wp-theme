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
            Заказать бетон <span class="icon icon-arrow-right"></span>
          </a>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if ($products = get_field("products")): ?>
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
                <button class="btn-arrow-left" type="button" data-photogallery-prev>
                  <span></span>
                  <span>Назад</span>
                </button>
                <button class="btn-arrow-right" type="button" data-photogallery-next>
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

  <?php if ($productsQuery->have_posts()): ?>
    <section class="services services--with-bg-logo">
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
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

  <?php if ($geography = get_field("geography")): ?>
    <section class="geography">
      <div class="container">
        <div class="geography__title">
          <?php echo $geography["title"]; ?>
        </div>
        <div class="geography-gl" data-geography-gl>
          <div class="geography-gl__emblas">
            <div class="geography-gl-before" data-geography-gl-before>
              <div class="geography-gl-before__viewport" data-geography-gl-before-viewport>
                <div class="geography-gl-before__container">
                  <?php foreach ($geography["items"] as $item): ?>
                    <div class="geography-gl-before__slide">
                      <a href="<?php echo $item["image"]["url"]; ?>" data-fslightbox="geography-gl-before" class="geography-gl-before__lightbox">
                        <img class="geography-gl-before__image" src="<?php echo $item["image"]["url"]; ?>">
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="geography-gl-main" data-geography-gl-main>
              <div class="geography-gl-main__viewport" data-geography-gl-main-viewport>
                <div class="geography-gl-main__container">
                  <?php foreach ($geography["items"] as $item): ?>
                    <div class="geography-gl-main__slide">
                      <a href="<?php echo $item["image"]["url"]; ?>" data-fslightbox="geography-gl-main" class="geography-gl-main__lightbox">
                        <img class="geography-gl-main__image" src="<?php echo $item["image"]["url"]; ?>">
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <button class="geography-gl-main__prev" type="button" data-geography-gl-main-prev></button>
              <button class="geography-gl-main__next" type="button" data-geography-gl-main-next></button>
            </div>
            <div class="geography-gl-after" data-geography-gl-after>
              <div class="geography-gl-after__viewport" data-geography-gl-after-viewport>
                <div class="geography-gl-after__container">
                  <?php foreach ($geography["items"] as $item): ?>
                    <div class="geography-gl-after__slide">
                      <a href="<?php echo $item["image"]["url"]; ?>" data-fslightbox="geography-gl-after" class="geography-gl-after__lightbox">
                        <img class="geography-gl-after__image" src="<?php echo $item["image"]["url"]; ?>">
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="geography-gl-desc" data-geography-gl-desc>
            <div class="geography-gl-desc__viewport" data-geography-gl-desc-viewport>
              <div class="geography-gl-desc__container">
                <?php foreach ($geography["items"] as $item): ?>
                  <div class="geography-gl-desc__slide">
                    <?php if (!empty($item["description"])): ?>
                      <<?php echo ($item["link"] ? 'a href="' . $item["link"] . '"' : 'div'); ?> class="geography-gl-desc__content">
                        <?php echo $item["description"]; ?>
                      </<?php echo ($item["link"] ? 'a' : 'div'); ?>>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

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
  <?php if ($list_query->have_posts()): ?>
    <section class="news">
      <div class="container">
        <div class="news-header">
          <div class="news-header__title">Новости</div>
          <a href="<?php echo get_category_link(3); ?>" class="btn-arrow-right">
            <span>Смотреть все</span>
            <span></span>
          </a>
        </div>
        <div class="news-list">
          <?php while ($list_query->have_posts()): ?>
            <?php $list_query->the_post(); ?>
            <?php get_template_part("partials/news-card"); ?>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <?php wp_reset_query(); ?>

  <?php if ($group = get_field("partners")): ?>
    <section class="partners">
      <div class="container">
        <div class="partners-header">
          <div class="partners-header__more">
            <a href="/partnyory/" class="btn-arrow-right">
              <span>Смотреть все</span>
              <span></span>
            </a>
          </div>
          <div class="partners-header__title">
            <span>
              <?php echo $group["title"]; ?>
            </span>
          </div>
        </div>
        <div class="partners-embla" data-partners-embla>
          <div class="partners-embla__viewport" data-partners-embla-viewport>
            <div class="partners-embla__container">
              <?php foreach ($group["items"] as $item): ?>
                <div class="partners-embla__slide">
                  <a href="<?php echo $item["link"]; ?>" class="partners-embla__link" target="_blank">
                    <img class="partners-embla__image" src="<?php echo $item["logo"]["url"]; ?>">
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <button class="partners-embla__prev" type="button" data-partners-embla-prev></button>
          <button class="partners-embla__next" type="button" data-partners-embla-next></button>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php get_template_part("partials/footer"); ?>
  </div>

  <?php wp_footer(); ?>
</body>

</html>