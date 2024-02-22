<article class="certificate-card">
  <div class="certificate-card__title">
    <div class="certificate-card__title-inner">
      <?php the_title() ?>
    </div>
  </div>

  <div class="certificate-card__image">
    <img src="<?php the_post_thumbnail_url('large') ?>" alt="<?php the_title() ?>" />
    <!-- <img src="<?php the_post_thumbnail_url('original') ?>" alt="<?php the_title() ?>" /> -->
  </div>

  <div class="certificate-card__actions">
    <?php if ($document = get_field('document')): ?>
      <a href="<?php echo $document['url'] ?>" class="certificate-card__action certificate-card__action_download" download>
        Скачать
      </a>
    <?php endif ?>
    <div></div>
    <?php if ($gallery = get_field('gallery')): ?>
      <?php foreach ($gallery as $key => $image): ?>
        <a href="<?php echo $image['url'] ?>" data-fslightbox="gallery-<?php echo get_the_ID() ?>"
          class="certificate-card__action certificate-card__action_view">
          Подробный просмотр
        </a>
      <?php endforeach ?>
    <?php endif ?>
  </div>
</article>