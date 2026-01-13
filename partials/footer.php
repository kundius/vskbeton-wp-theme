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
          <div class="input-field">
            <label for="name" class="input-field__label">Ваше имя</label>
            <input type="text" id="name" name="name" class="input-field__input">
          </div>
          <div class="input-field">
            <label for="phone" class="input-field__label">Ваш телефон*</label>
            <input type="text" id="phone" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required class="input-field__input">
          </div>
          <button class="feedback-form__submit" type="submit">
            Заказать бетон
            <span></span>
          </button>
        </div>

        <div class="feedback-form__rules">
          Нажимая на кнопку, вы даете согласие на <a href="#">обработку персональных данных</a> и соглашаетесь c <a href="#">политикой конфиденциальности</a>
        </div>
      </div>
    </form>
  </div>
</section>

<div class="footer">
  <div class="container footer-layout">
    <div class="footer-layout__feedback">
      <div class="footer-feedback">
        <div class="footer-feedback__logo">
          <img src="<?php echo $data['logo']['url'] ?>" alt="<?php echo $data['logo']['title'] ?>">
        </div>
        <div class="footer-feedback__form">
          <?php echo do_shortcode('[contact-form-7 id="10bd85d" title="Контактная форма"]'); ?>
        </div>
      </div>
    </div>
    <div class="footer-layout__contacts">
      <div class="footer-contacts">
        <div class="footer-contacts__address">
          <?php echo $data['address'] ?>
        </div>
        <div class="footer-contacts__shedule">
          <?php echo $data['shedule'] ?>
        </div>
        <div class="footer-contacts__phone">
          <?php echo $data['phone'] ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="footer-secondary">
  <div class="container footer-secondary-layout">
    <div class="footer-secondary-layout__copyright">
      <div class="footer-secondary__copyright">
        <?php echo $data['copyright'] ?>
      </div>
    </div>
    <div class="footer-secondary-layout__info">
      <div class="footer-secondary__counters">
        <?php echo $data['counters'] ?>
      </div>
      <?php if ($privacy_policy = $data['privacy_policy']): ?>
        <div class="footer-secondary__rules">
          <a href="<?php echo $privacy_policy['url'] ?>" target="_blank"><?php echo $privacy_policy['title'] ?></a>
        </div>
      <?php endif ?>
      <div class="footer-secondary__creator">
        <a href="https://domenart-studio.ru/" target="_blank">Created by DOMENART</a>
      </div>
    </div>
  </div>
</div>