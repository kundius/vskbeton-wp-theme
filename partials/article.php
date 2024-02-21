<article class="articles-card">
  <figure class="articles-card__image">
    <img src="<?php the_post_thumbnail_url($args['thumb']) ?>" alt="<?php the_title() ?>" />
    <?php if ($time = get_field('reading_time')): ?>
      <div class="articles-card__time">
        <?php echo $time ?>
      </div>
    <?php endif ?>
  </figure>

  <div class="articles-card__content">
    <div class="articles-card__meta">
      <div class="articles-card__date">
        <?php echo get_the_date('j.m.Y') ?>
      </div>
      <div class="articles-card__views" data-views="<?php echo get_the_ID() ?>">...</div>
    </div>

    <div class="articles-card__title">
      <a href="<?php the_permalink() ?>">
        <?php the_title() ?>
      </a>
    </div>
  </div>
</article>