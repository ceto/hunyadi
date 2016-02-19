<article <?php post_class('pagesection'); ?>>
  <div class="row">
    <div class="columns medium-8 medium-centered">
      <div class="row">
        <div class="columns medium-3 medium-push-9">
           <figure class="post__fig">
             <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumb43'); ?>
             </a>
           </figure>
        </div>
        <div class="columns medium-9 medium-pull-3">
          <header class="post__header">
          <?php get_template_part('templates/entry-meta'); ?>
            <h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

          </header>
          <div class="post__summary">
            <?php the_excerpt(); ?>
          </div>
        </div>

      </div>

    </div>
  </div>
</article>
