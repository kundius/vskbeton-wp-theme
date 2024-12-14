<?php
/*
Template Name: Контакты
*/
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
      <?php get_template_part('partials/header') ?>

      <div class="main">
        <div class="container">
			<div class="page-headline">
					<h1 class="page-headline__title"><?php the_title(); ?></h1>
				</div>
			
          <?php if ($group = get_field('contacts')): ?>
            <div class="contacts">
              <div class="contacts__side">
                <div class="contacts__image">
                  <?php if ($image = $group['image']): ?>
                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                  <?php endif ?>
                </div>
                <div class="contacts__map">
                  <?php echo $group['map'] ?>
                </div>
              </div>
              <div class="contacts__content">
                <div class="contacts__title">
                  <?php echo $group['title'] ?>
                </div>
                <div class="contacts__description">
                  <?php echo $group['description'] ?>
                </div>
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