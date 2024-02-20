<article class="articles-medium">
  <figure class="articles-medium__image">
    <img src="<?php the_post_thumbnail_url('article-medium') ?>" alt="<?php the_title() ?>" />
    <?php if ($time = get_field('reading_time')): ?>
      <div class="articles-medium__time">
        <?php echo $time ?>
      </div>
    <?php endif ?>
  </figure>

  <div class="articles-medium__meta">
    <div class="articles-medium__date">
      <?php echo get_the_date('j.m.Y') ?>
    </div>
  </div>

  <div class="articles-medium__title">
    <a href="<?php the_permalink() ?>">
      <?php the_title() ?>
    </a>
  </div>
</article>