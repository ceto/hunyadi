<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

    <header class="banner" role="banner" id="banner">
      <?php get_template_part('templates/post', 'header'); ?>
    </header>
    <section class="pagesection pagesection--singlepost">
      <div class="row">
        <div class="columns medium-8 medium-centered">
          <?php the_content(); ?>
        </div>
        <?php // comments_template('/templates/comments.php'); ?>
        <footer class="postfooter columns medium-8 medium-centerd">
          <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
      </div>
    </section>
    <?php get_template_part('templates/section','relatedprods'); ?>
    <?php get_template_part('templates/section','postlist'); ?>
    <?php get_template_part('templates/section','reflist'); ?>

  </article>
<?php endwhile; ?>

