<article class="articles-large">
  <figure class="articles-large__image">
    <img src="<?php the_post_thumbnail_url('article-large') ?>" alt="<?php the_title() ?>" />
    <?php if ($time = get_field('time')): ?>
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
        <?php the_date('j.m.Y') ?>
      </div>
    </div>
  </div>
</article>