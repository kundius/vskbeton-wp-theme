<?php $data = get_field('header', 'option') ?>
<div class="header" data-sticky-header>
  <div class="container">
    <div class="header-primary">
      <div class="header-contacts">
        <?php if ($schedule = $data['schedule']): ?>
          <div class="header-contacts__schedule">
            <?php echo nl2br($schedule); ?>
          </div>
        <?php endif; ?>
        <?php if ($address = $data['address']): ?>
          <div class="header-contacts__address">
            <span class="icon icon-marker"></span>
            <?php echo nl2br($address); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="header-phones">
        <?php if ($max_number = $data['max_number']): ?>
          <a href="<?php echo $data['max_link']; ?>" class="header-phones__item" target="_blank">
            <span class="header-phones__item-ico">
              <span class="icon icon-max"></span>
            </span>
            <span class="header-phones__item-num">
              <?php echo $max_number; ?>
            </span>
          </a>
        <?php endif; ?>
        <?php if ($phone_number = $data['phone_number']): ?>
          <a href="tel:<?php echo $phone_number; ?>" class="header-phones__item" target="_blank">
            <span class="header-phones__item-ico">
              <span class="icon icon-phone"></span>
            </span>
            <span class="header-phones__item-num">
              <?php echo $phone_number; ?>
            </span>
          </a>
        <?php endif; ?>
      </div>

      <button type="button" class="header-callback">Заказать звонок</button>
    </div>

    <div class="header-secondary">
      <a href="/" class="header-logo">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logo.svg" alt="<?php bloginfo('name') ?>" width="119" height="28" class="header-logo__image">
      </a>

      <?php wp_nav_menu([
        'theme_location' => 'main',
        'menu_class' => 'header-menu',
        'container' => false
      ]); ?>
    </div>
  </div>
</div>
<div class="header-anchor" data-sticky-header-anchor></div>