<article class="postsquare">
  <figure class="postsquare__fig">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('banner_small'); ?>
    </a>
  </figure>
  <!-- <time class="postsquare__updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time> -->
  <h3 class="postsquare__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <div class="postsquare__summary"><?php the_excerpt(); ?></div>
</article>
