<section class="banner" role="banner" id="banner">
  <?php get_template_part('templates/page', 'header'); ?>
</section>
<main class="main" role="main">
  <div class="row">
    <div class="columns medium-10 medium-centered">
      <?php if (!have_posts()) : ?>
        <div class="alert alert-warning">
          <?php _e('Sorry, no results were found.', 'sage'); ?>
        </div>
        <?php get_search_form(); ?>
      <?php endif; ?>

      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
      <?php endwhile; ?>

      <?php the_posts_navigation(); ?>
    </div>
  </div>
</main><!-- /.main -->