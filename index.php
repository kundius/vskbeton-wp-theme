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
            <div class="page-headline">
              <h1 class="page-headline__title">
                <?php the_title() ?>
              </h1>
            </div>

            <div class="page-content content">
              <?php the_content() ?>
            </div>
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