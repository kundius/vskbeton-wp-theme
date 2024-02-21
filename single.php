<?php
$next_post = get_next_post();
$previous_post = get_previous_post();
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

  <head>
    <?php get_template_part('partials/head'); ?>
  </head>

  <body <?php body_class() ?>>
    <?php wp_body_open() ?>

    <div class="page">
      <?php get_template_part('partials/header') ?>

      <main class="main">
        <div class="container">
          <?php if (have_posts()): ?>
            <div class="article-headline">
              <div class="article-headline__content">
                <h1 class="article-headline__title">
                  <?php the_title() ?>
                </h1>
                <div class="article-headline__meta">
                  <div class="article-headline__date">
                    <?php echo get_the_date('j.m.Y') ?>
                  </div>
                  <div class="article-headline__views" data-views="<?php echo get_the_ID() ?>" data-views-increase>...
                  </div>
                  <?php if ($time = get_field('reading_time')): ?>
                    <div class="article-headline__time">
                      <?php echo $time ?>
                    </div>
                  <?php endif ?>
                </div>
              </div>
              <figure class="article-headline__image">
                <img src="<?php the_post_thumbnail_url('article-large') ?>" alt="<?php the_title() ?>" />
              </figure>
            </div>

            <div class="article-content">
              <?php the_content() ?>
            </div>

            <div class="article-nav">
              <?php if (!empty($previous_post)): ?>
                <a href="<?php echo get_permalink($previous_post); ?>" class="article-nav__previous">Предыдущая статья</a>
              <?php endif ?>
              <?php if (!empty($next_post)): ?>
                <a href="<?php echo get_permalink($next_post); ?>" class="article-nav__next">Следующая статья</a>
              <?php endif ?>
            </div>

            <?php if ($read_also = get_field('read_also')): ?>
              <?php
              $read_also_query = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'post__in',
                'post__in' => $read_also,
              ]);
              ?>
              <div class="article-read-also">
                <div class="article-read-also__title">Читайте также</div>
                <div class="articles-list">
                  <?php while ($read_also_query->have_posts()):
                    $read_also_query->the_post(); ?>
                    <div class="articles-list__item">
                      <?php get_template_part('partials/article', null, ['thumb' => 'article-medium']) ?>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
            <?php endif ?>
          <?php else: ?>
            Результатов не найдено
          <?php endif; ?>
        </div>
      </main>

      <?php get_template_part('partials/footer') ?>
    </div>

    <?php wp_footer() ?>
  </body>

</html>