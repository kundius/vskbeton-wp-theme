<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head');?>
  </head>
  <body <?php body_class() ?>>
    <?php wp_body_open() ?>

    <div class="page">
      <?php get_template_part('partials/header') ?>
      
      <main class="main">
        <div class="container">
          <?php if (have_posts()): ?>
            <div class="views" data-views="<?php echo get_the_ID() ?>" data-views-increase></div>

            <div class="document">
              <h1 class="document__title"><?php the_title() ?></h1>
              <div class="document__content">
                <?php the_content() ?>
              </div>
            </div>
          <?php else : ?>
          Результатов не найдено
          <?php endif; ?>
        </div>
      </main>
    
      <?php get_template_part('partials/footer') ?>
    </div>

    <?php wp_footer() ?>
  </body>
</html>
