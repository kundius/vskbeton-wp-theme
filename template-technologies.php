<?php
/*
Template Name: Технологии качества
*/
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head');?>
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
			
          <?php if ($group = get_field('equipment')): ?>
          <div class="equipment">
            <h1 class="equipment__title">
              <?php echo $group['title'] ?>
            </h1>
            <div class="equipment__content">
              <div class="equipment__description">
                <?php echo $group['description'] ?>
              </div>
              <div class="equipment__image">
                <?php if ($image = $group['image']): ?>
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                <?php endif ?>
              </div>
            </div>
          </div>
          <?php endif ?>

          <?php if ($group = get_field('products')): ?>
          <div class="technologies">
            <div class="technologies__image">
              <?php if ($image = $group['image']): ?>
              <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
              <?php endif ?>
            </div>
            <div class="technologies__content">
              <?php if ($link = $group['link']): ?>
              <a href="<?php echo $link['url'] ?>" class="technologies__section">
                <span><?php echo $link['title'] ?></span>
              </a>
              <?php endif ?>
              <div class="technologies__title">
                <?php echo $group['title'] ?>
              </div>
            </div>
          </div>
          <?php endif ?>

          <?php if ($group = get_field('quality')): ?>
          <div class="quality">
            <div class="quality__image">
              <?php if ($image = $group['image']): ?>
              <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
              <?php endif ?>
            </div>
            <div class="quality__content">
              <div class="quality__title">
                <?php echo $group['title'] ?>
              </div>
              <div class="quality__description">
                <?php echo $group['description'] ?>
              </div>
            </div>
            <?php if ($image = $group['image_after']): ?>
            <div class="quality__image-after">
              <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
            </div>
            <?php endif ?>
          </div>
          <?php endif ?>

          <div class="documents">
            <div class="documents__cards">
              <?php if ($organization_card = get_field('organization_card')): ?>
              <a href="<?php echo $organization_card['url'] ?>" class="documents__card documents__card_organization" target="_blank">
                <span class="documents__card-title">Карточка организации</span>
              </a>
              <?php endif ?>
              <?php if ($evidence = get_field('evidence')): ?>
              <a href="<?php echo $evidence['url'] ?>" class="documents__card documents__card_evidence" target="_blank">
                <span class="documents__card-title">Свидетельство об аккредитации испытательной лаборатории</span>
              </a>
              <?php endif ?>
              <?php if ($certificate = get_field('certificate')): ?>
              <a href="<?php echo $certificate['url'] ?>" class="documents__card documents__card_certificate" target="_blank">
                <span class="documents__card-title">Сертификат о калибровке средства измерения</span>
              </a>
              <?php endif ?>
            </div>
            <div class="documents__requisites">
              <div class="requisites">
                <div class="requisites__title">Реквизиты</div>
                <div class="requisites__content">
                  <?php echo get_field('requisites') ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <?php get_template_part('partials/footer') ?>
    </div>

    <?php wp_footer() ?>
  </body>
</html>
