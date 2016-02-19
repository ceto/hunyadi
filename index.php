<section class="banner" role="banner" id="banner">
  <?php if (is_archive() || is_search() || is_home()) : ?>
    <?php get_template_part('templates/archive', 'header'); ?>
  <?php else: ?>
    <?php get_template_part('templates/page', 'header'); ?>
  <?php endif; ?>
</section>
<main class="main" role="main">
<?php if (!have_posts()) : ?>
<section class="pagesection">
  <div class="row">
    <div class="columns medium-8 medium-centered">
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
      </div>
      <?php get_search_form(); ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php if (is_home() || is_category()) { get_template_part('templates/catnav'); } ?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>
<nav class="pagesection pagesection--narrow">
  <div class="row">
    <div class="columns medium-8 medium-centered">
      <?php the_posts_navigation(); ?>
    </div>
  </div>
</nav>

</main><!-- /.main -->