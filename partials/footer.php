<?php $data = get_field('footer', 'option') ?>

<section class="feedback">
  <div class="container">
    <form
      class="feedback-form"
      action="<?php echo admin_url('admin-ajax.php'); ?>"
      data-feedback-form
      data-feedback-form-goal=""
      data-feedback-form-action="feedback_form">
      <input type="hidden" name="submitted" value="">
      <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce'); ?>">
      <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
      <input type="hidden" name="subject" value="Обратная связь">

      <div class="feedback-form__body">
        <div class="feedback-form__title">
          Сделать заказ просто —<br>
          оставьте контактный номер телефона, и мы Вам перезвоним
        </div>

        <div class="feedback-form__errors" data-feedback-form-errors></div>

        <div class="feedback-form__fields">
          <input type="text" id="name" name="name" class="flat-input" placeholder="Ваше имя">
          <input type="text" id="phone" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required class="flat-input">
          <button class="feedback-form__submit" type="submit">
            Заказать бетон
            <span class="icon icon-arrow-right"></span>
          </button>
        </div>

        <div class="feedback-form__rules">
          Нажимая на кнопку, вы даете согласие на <a href="#">обработку персональных данных</a> и соглашаетесь c <a href="#">политикой конфиденциальности</a>
        </div>
      </div>
    </form>
  </div>
</section>

<section class="footer">
  <div class="container">
    <div class="footer-layout">
      <div class="footer-layout__first">
        <div class="footer-contacts">
          <?php if ($phone_number = $data['phone_number']): ?>
            <div class="footer-contacts__item">
              <div class="footer-contacts__item-icon">
                <div class="icon icon-phone"></div>
              </div>
              <div class="footer-contacts__item-body">
                <div class="footer-contacts__item-val">
                  <?php echo $phone_number; ?>
                </div>
                <?php if ($phone_caption = $data['phone_caption']): ?>
                  <div class="footer-contacts__item-desc">
                    <?php echo $phone_caption; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if ($max_number = $data['max_number']): ?>
            <div class="footer-contacts__item">
              <div class="footer-contacts__item-icon">
                <div class="icon icon-max"></div>
              </div>
              <div class="footer-contacts__item-body">
                <div class="footer-contacts__item-val">
                  <?php echo $max_number; ?>
                </div>
                <?php if ($max_caption = $data['max_caption']): ?>
                  <div class="footer-contacts__item-desc">
                    <?php echo $max_caption; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <a href="/" class="footer-logo" target="_blank">
          <img src="<?php bloginfo('template_url'); ?>/assets/big-white-logo.png" alt="" />
        </a>
      </div>

      <div class="footer-layout__second">
        <?php wp_nav_menu([
          'theme_location' => 'menu-footer',
          'container' => null,
          'menu_class' => 'footer-nav',
        ]); ?>
      </div>

      <div class="footer-layout__third">
        <?php wp_nav_menu([
          'theme_location' => 'menu-rules',
          'container' => null,
          'menu_class' => 'footer-links',
        ]); ?>

        <div class="footer-notice">
          <?php echo $data['no_oferta']; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="footbar">
  <div class="container">
    <div class="footbar-layout">
      <div class="footbar-layout__copyright">
        <?php echo $data['copyright']; ?>
      </div>
      <a href="<?php the_permalink(1755); ?>" class="footbar-layout__sitemap">
        Карта сайта
      </a>
      <div class="footbar-layout__counters">
        <?php echo $data['counters']; ?>
      </div>
      <a href="https://domenart-studio.ru/" class="footbar-layout__creator" target="_blank">
        <img src="<?php bloginfo('template_url'); ?>/assets/creator.png" alt="creator" width="138" height="30" />
      </a>
    </div>
  </div>
</section>