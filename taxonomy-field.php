<section class="banner" role="banner" id="banner">
  <?php get_template_part('templates/listpage', 'header'); ?>
</section>

<main class="main" role="main">
<section class="pagesection pagesection--intro pagesection--darken">
  <div class="row">
    <div class="columns medium-8 columns medium-centered">
      <?php
        $akterm= get_term_by( 'slug', get_query_var('term'), 'field');
      ?>
      <?= term_description(  $akterm->term_id ,'field') ?>
       <a class="right-off-canvas-toggle button small" href="#">Ajánlat kérése</a>
    </div>
  </div>
</section>
  <section id="termekblokk" class="pagesection pagesection--lighten pagesection--termekblokk">
    <div class="row">
      <div class="columns medium-10 medium-centered">
        <ul class="block-grid-1 small-block-grid-2 large-block-grid-3 miniprodblock">
          <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/mini', 'prod' ); ?>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </section>
</main><!-- /.main -->

