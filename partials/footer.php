<?php $data = get_field('footer', 'option') ?>

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
        <a href="<?php echo $privacy_policy['url'] ?>"><?php echo $privacy_policy['title'] ?></a>
      </div>
      <?php endif ?>
      <div class="footer-secondary__creator">
        <a href="https://domenart-studio.ru/" target="_blank">Created by DOMENART</a>
      </div>
    </div>
  </div>
</div>
