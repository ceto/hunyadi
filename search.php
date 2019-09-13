<section class="banner" role="banner" id="banner">
  <?php get_template_part('templates/archive', 'header'); ?>
</section>

<main class="main" role="main">
  <?php if (!have_posts()) : ?>
    <section class="pagesection pagesection--inverse pagesection--intro">
     <div class="row">
       <div class="columns medium-10 medium-centered">
          <div class="row">
            <div class="columns medium-9 medium-push-3">
              <div class="alert alert-warning">
                <?php _e('Nincs találat', 'sage'); ?>
              </div>
              <?php get_search_form(); ?>
            </div>
          </div>
       </div>
     </div>


  </section>
  <?php endif; ?>

  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content'); ?>
  <?php endwhile; ?>

  <nav class="pagesection pagesection--narrow">
    <div class="row">
      <div class="columns medium-8 medium-centered">
        <?php the_posts_navigation(); ?>
      </div>
    </div>
  </nav>
</main>
