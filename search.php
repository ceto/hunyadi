<section class="banner" role="banner" id="banner">
  <?php get_template_part('templates/archive', 'header'); ?>
</section>

<main class="main" role="main">
  <?php if (!have_posts()) : ?>
    <section class="pagesection pagesection--intro">
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

  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content'); ?>
  <?php endwhile; ?>

  <?php the_posts_navigation(); ?>
</main>
