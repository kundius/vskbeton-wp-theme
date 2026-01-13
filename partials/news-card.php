<article class="news-card">
  <figure class="news-card__image">
    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
  </figure>
  <div class="news-card__content">
    <div class="news-card__date">
      <?php echo get_the_date('j.m.Y'); ?>
    </div>
    <div class="news-card__title">
      <?php the_title(); ?>
    </div>
    <div class="news-card__desc">
      <?php the_excerpt(); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="more-link news-card__more">
      <span>Подробнее</span>
      <span></span>
    </a>
  </div>
</article>