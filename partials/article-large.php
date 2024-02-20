<article class="articles-large">
  <figure class="articles-large__image">
    <img src="<?php the_post_thumbnail_url('article-large') ?>" alt="<?php the_title() ?>" />
    <?php if ($time = get_field('reading_time')): ?>
      <div class="articles-large__time">
        <?php echo $time ?>
      </div>
    <?php endif ?>
  </figure>

  <div class="articles-large__content">
    <div class="articles-large__title">
      <a href="<?php the_permalink() ?>">
        <?php the_title() ?>
      </a>
    </div>
    <div class="articles-large__meta">
      <div class="articles-large__date">
        <?php echo get_the_date('j.m.Y') ?>
      </div>
      <div class="articles-large__views" data-views="<?php echo get_the_ID() ?>" data-views-increase></div>
    </div>
  </div>
</article>