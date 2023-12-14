<?php $data = get_field('header', 'option') ?>

<div class="header">
    <div class="container header__container">
        <div class="header__background" style="background-image: url('<?php echo $data['background']['url'] ?>')"></div>
        <a href="/" class="header__logo">
            <img src="<?php echo $data['logo']['url'] ?>" alt="<?php bloginfo('name') ?>" width="<?php echo $data['logo']['width'] ?>" height="<?php echo $data['logo']['height'] ?>">
        </a>
        <div class="header__menu">
          <div class="main-nav">
            <button class="main-nav__close"></button>
            <?php wp_nav_menu([
              'theme_location' => 'main',
              'container' => false
            ]) ?>
          </div>
        </div>
        <button class="header__toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</div>
